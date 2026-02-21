<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("sql208.infinityfree.com","if0_41150950","123456789MASa","if0_41150950_topsisters");
if ($conn->connect_error) { die("فشل الاتصال: " . $conn->connect_error); }
$conn->set_charset("utf8mb4");

$today = date("Y-m-d");
// جلب الحجوزات المستقبلية لقسم الأظافر فقط
$sql = "SELECT id, customer_name, phone, booking_date, booking_time, service, notes, image, booking_price 
        FROM bookings 
        WHERE category_id = 2 AND booking_date >= ? 
        ORDER BY booking_date ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>حجوزات قسم الأظافر - Top Sisters</title>
  <style>
    body {
      font-family: 'Lateef', 'Amiri', serif;
      background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
      text-align: center;
      font-size: 22px;
      margin: 0;
      padding: 0;
    }
    h2 {
      color: #a64d79;
      text-shadow: 0 0 12px #ff69b4, 0 0 20px #ffc0cb;
      margin-top: 30px;
    }
    a.archive-link {
      font-size: 16px;
      background: linear-gradient(90deg, #ff69b4, #ffc0cb);
      color: white;
      padding: 8px 15px;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 0 12px rgba(255,105,180,0.6);
      transition: 0.3s;
    }
    a.archive-link:hover {
      background: linear-gradient(90deg, #ff1493, #ff69b4);
      box-shadow: 0 0 18px rgba(255,105,180,0.8);
      transform: scale(1.05);
    }
    table {
      width: 95%;
      margin: 30px auto;
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 25px rgba(255,105,180,0.4);
      background: #fff;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background: linear-gradient(90deg, #ff69b4, #ffc0cb);
      color: #fff;
      font-size: 18px;
    }
    td {
      font-size: 16px;
      color: #333;
    }
    tr:hover {
      background-color: rgba(255,182,193,0.2);
      transition: 0.3s;
    }
    .soon {
      background-color: #ffe4e9;
      font-weight: bold;
    }
    img {
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(255,105,180,0.5);
    }
  </style>
</head>
<body>
  <h2>💅 حجوزات قسم الأظافر</h2>
  <h2>
    <a href="nails_archive.php" class="archive-link">عرض الأرشيف</a>
  </h2>

  <table>
    <tr>
      <th>ID</th>
      <th>الاسم الكامل</th>
      <th>الهاتف</th>
      <th>تاريخ الحجز</th>
      <th>وقت الحجز</th>
      <th>القسم</th>
      <th>الخدمة</th>
      <th>السعر</th>
      <th>ملاحظات</th>
      <th>الصورة</th>
    </tr>
    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $todayDate = new DateTime();
            $bookingDate = new DateTime($row['booking_date']);
            $diff = $todayDate->diff($bookingDate)->days;

            $class = "";
            if ($bookingDate >= $todayDate && $diff <= 3) {
                $class = "soon";
            }

            echo "<tr class='$class'>
                    <td>".htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8')."</td>
                    <td>".htmlspecialchars($row['customer_name'], ENT_QUOTES, 'UTF-8')."</td>
                    <td>".htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8')."</td>
                    <td>".htmlspecialchars($row['booking_date'], ENT_QUOTES, 'UTF-8')."</td>
                    <td>".htmlspecialchars($row['booking_time'], ENT_QUOTES, 'UTF-8')."</td>
                    <td>أظافر</td>
                    <td>".htmlspecialchars($row['service'], ENT_QUOTES, 'UTF-8')."</td>
                    <td>".htmlspecialchars($row['booking_price'], ENT_QUOTES, 'UTF-8')." ₪</td>
                    <td>".(!empty($row['notes']) ? htmlspecialchars($row['notes'], ENT_QUOTES, 'UTF-8') : "-")."</td>
                    <td>".(!empty($row['image']) ? "<img src='".htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8')."' width='80'>" : "-")."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>لا يوجد حجوزات حالياً</td></tr>";
    }
    ?>
  </table>
</body>
</html>
