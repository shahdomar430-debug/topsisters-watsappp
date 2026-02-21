<?php
$conn = new mysqli("sql208.infinityfree.com", "if0_41150950", "123456789MASa", "if0_41150950_topsisters");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استلام البيانات من الفورم
$customer_name = $_POST['customer_name'];
$phone         = $_POST['phone'];
$booking_date  = $_POST['booking_date'];
$booking_time  = $_POST['booking_time'];
$dapartment    = $_POST['dapartment'];
$service       = $_POST['service'];

// البحث عن الحجز
$sql = "SELECT * FROM bookings 
        WHERE customer_name='$customer_name' 
        AND phone='$phone' 
        AND booking_date='$booking_date' 
        AND booking_time='$booking_time' 
        AND dapartment='$dapartment' 
        AND service='$service'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // تحديث الحالة إلى ملغى بدل الحذف
    $update = "UPDATE bookings SET status='cancelled' 
               WHERE customer_name='$customer_name' 
               AND phone='$phone' 
               AND booking_date='$booking_date' 
               AND booking_time='$booking_time' 
               AND dapartment='$dapartment' 
               AND service='$service'";
    if ($conn->query($update) === TRUE) {
        // إضافة إشعار
        $notif_msg = "تم إلغاء الحجز من الزبونة: $customer_name في قسم $dapartment لخدمة $service بتاريخ $booking_date";
        $conn->query("INSERT INTO notifications (type, message) VALUES ('cancel', '$notif_msg')");

        header("Location: customer.php?cancel=1");
        exit();
    } else {
        die("خطأ في إلغاء الحجز: " . $conn->error);
    }
} else {
    die("❌ لم يتم العثور على الحجز المطلوب للإلغاء");
}
?>
