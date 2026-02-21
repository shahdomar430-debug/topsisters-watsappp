<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// الاتصال بقاعدة البيانات
$conn = new mysqli("sql208.infinityfree.com", "if0_41150950", "123456789MASa", "if0_41150950_topsisters");
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "❌ فشل الاتصال: " . $conn->connect_error]));
}
$conn->set_charset("utf8mb4");

// استلام البيانات من الفورم
$customer_name  = $_POST['customer_name'];
$phone          = $_POST['phone'];
$date           = $_POST['booking_date'];   // تاريخ الجلسة
$time           = $_POST['booking_time'];
$category_id    = $_POST['category_id'];
$service_id     = $_POST['service']; // القيمة هي ID الخدمة
$notes          = $_POST['notes'];

// معالجة الصورة إذا تم رفعها
$image = "";
if (!empty($_FILES['image']['name'])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $image = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
}

// جلب بيانات الخدمة + السعر الأصلي + آخر عرض مرتبط بالخدمة (فعّال فقط)
$sql_service = "SELECT s.service_name, s.duration, s.price AS original_price, o.offer_price
                FROM services s
                LEFT JOIN offers o ON s.id = o.service_id AND o.active = 1
                WHERE s.id = ?
                ORDER BY o.id DESC LIMIT 1"; 

$stmt = $conn->prepare($sql_service);
$stmt->bind_param("i", $service_id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if (!$row) {
    echo json_encode(["status" => "error", "message" => "❌ الخدمة غير موجودة أو الـ ID غير صحيح"]);
    exit;
}

$service_name   = $row['service_name'];
$duration       = (int)$row['duration']; 
$original_price = $row['original_price'];
$offer_price    = $row['offer_price'];

// تحديد السعر النهائي: إذا فيه عرض فعّال → نستخدمه، وإلا السعر الأصلي
$final_price = (!empty($offer_price)) ? $offer_price : $original_price;

// وقت بداية ونهاية الحجز الجديد
$newStart = strtotime("$date $time");
$newEnd   = $newStart + ($duration * 60);

// التحقق من التداخل مع حجوزات أخرى
$sql_check = "SELECT booking_date, booking_time, duration 
              FROM bookings 
              WHERE booking_date = ? AND category_id = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("si", $date, $category_id);
$stmt->execute();
$result = $stmt->get_result();

$conflict = false;
while ($row = $result->fetch_assoc()) {
    $existingStart = strtotime($row['booking_date']." ".$row['booking_time']);
    $existingEnd   = $existingStart + ($row['duration'] * 60);

    if ($newStart < $existingEnd && $newEnd > $existingStart) {
        $conflict = true;
        break;
    }
}

if ($conflict) {
    echo json_encode([
        "status" => "error",
        "message" => "❌ هذا الوقت محجوز بالفعل."
    ]);
} else {
    // إدخال الحجز الجديد مع السعر النهائي
    $sql_insert = "INSERT INTO bookings 
        (customer_name, phone, booking_date, booking_time, category_id, service, notes, image, duration, booking_price) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssssssssid", $customer_name, $phone, $date, $time, $category_id, $service_name, $notes, $image, $duration, $final_price);

    if ($stmt->execute()) {
        // ربط الأقسام بالأرقام
        $numbersByCategory = [
            1 => "+970594919652", // قسم الأظافر
            2 => "+970594158977", // قسم البشرة
            3 => "+970567341217"  // قسم الشعر
        ];

        $targetNumber = $numbersByCategory[$category_id] ?? null;

        if ($targetNumber) {
            $payload = [
                "name" => $customer_name,
                "service" => $service_name,
                "time" => $date . " " . $time
            ];

            $options = [
                "http" => [
                    "header"  => "Content-Type: application/json",
                    "method"  => "POST",
                    "content" => json_encode($payload),
                ]
            ];
            $context  = stream_context_create($options);
            @file_get_contents("https://topsisters-watsapp.onrender.com/notify?to=" . urlencode($targetNumber), false, $context);
        }

        echo json_encode(["status" => "success", "message" => "✅ تم تسجيل الحجز بالسعر: ".$final_price." ₪"]);
    } else {
        echo json_encode(["status" => "error", "message" => "❌ خطأ في حفظ الحجز: " . $conn->error]);
    }
}
?>
