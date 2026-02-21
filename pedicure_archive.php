<?php
$conn = new mysqli("sql208.infinityfree.com", "if0_41150950", "123456789MASa", "if0_41150950_topsisters");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$today = date("Y-m-d");
// جلب الحجوزات القديمة (تاريخ أقل من اليوم الحالي)
$sql = "SELECT id, customer_name, phone, booking_date, booking_time, service, notes, image, booking_price 
        FROM bookings 
        WHERE category_id = 3 AND booking_date < ? 
        ORDER BY booking_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>أرشيف قسم البديكير - Top Sisters</title>
  <style>
    body {font-family:'Lateef','Amiri',serif; background:linear-gradient(135deg,#ffe4ec,#fff,#ffc0cb); text-align:center; font-size:22px; margin:0; padding:0;}
    h2 {color:#a64d79; text-shadow:0 0 12px #ff69b4,0 0 20px #ffc0cb; margin-top:30px;}
    table {width:95%; margin:30px auto; border-collapse:collapse; border-radius:12px; overflow:hidden; box-shadow:0 0 25px rgba(255,105,180,0.4); background:#fff;}
    th,td {padding:12px; border:1px solid #ddd; text-align:center;}
    th {background:linear-gradient(90deg,#ff69b4,#ffc0cb); color:#fff; font-size:18px;}
    td {font-size:16px; color:#333;}
    tr:hover {background-color:rgba(255,182,193,0.2); transition:0.3s;}
    img {border-radius:8px; box-shadow:0 0 10px rgba(255,105,180,0.5);}
  </style>
</head>
<body>
  <h2>📂 أرشيف حجوزات قسم البديكير</h2>
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
            echo "<tr>
                    <td>".htmlspecialchars($row['id'])."</td>
                    <td>".htmlspecialchars($row['customer_name'])."</td>
                    <td>".htmlspecialchars($row['phone'])."</td>
                    <td>".htmlspecialchars($row['booking_date'])."</td>
                    <td>".htmlspecialchars($row['booking_time'])."</td>
                    <td>بديكير</td>
                    <td>".htmlspecialchars($row['service'])."</td>
                    <td>".htmlspecialchars($row['booking_price'])." ₪</td>
                    <td>".(!empty($row['notes']) ? htmlspecialchars($row['notes']) : "-")."</td>
                    <td>".(!empty($row['image']) ? "<img src='".htmlspecialchars($row['image'])."' width='80'>" : "-")."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>لا يوجد حجوزات مؤرشفة</td></tr>";
    }
    ?>
  </table>
</body>
</html>
