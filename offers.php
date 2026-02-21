<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("sql208.infinityfree.com","if0_41150950","123456789MASa","if0_41150950_topsisters");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// إضافة عرض جديد
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "add") {
    $service_id  = $_POST['service_id'];
    $offer_price = $_POST['offer_price'];
    $start_date  = $_POST['start_date'];
    $end_date    = $_POST['end_date'];

    // أي عرض جديد ينضاف يكون active = 1
    $sql = "INSERT INTO offers (service_id, offer_price, start_date, end_date, active)
            VALUES ('$service_id', '$offer_price', '$start_date', '$end_date', 1)";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-msg'>✅ تم إضافة العرض بنجاح</div>";
    } else {
        echo "<div class='error-msg'>❌ خطأ: " . $conn->error . "</div>";
    }
}

// إلغاء عرض (تحديث active = 0)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "cancel") {
    $service_id = $_POST['service_id'];
    $sql = "UPDATE offers SET active = 0 WHERE service_id = '$service_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='cancel-msg'>🛑 تم إلغاء العرض لهذه الجلسة</div>";
    } else {
        echo "<div class='error-msg'>❌ خطأ: " . $conn->error . "</div>";
    }
}

// جزء AJAX داخل نفس الصفحة
if (isset($_GET['get_services'])) {
    $category_id = $_GET['category_id'];
    $sql = "SELECT id, service_name AS name, price FROM services WHERE category_id='$category_id'";
    $result = $conn->query($sql);

    $services = [];
    while($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
    echo json_encode($services, JSON_UNESCAPED_UNICODE);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>إدارة العروض - Top Sisters</title>
  <style>
    body {font-family:'Lateef','Amiri',serif; background:linear-gradient(135deg,#ffe4ec,#fff,#ffc0cb); padding:40px; font-size:22px; text-align:center;}
    h2 {color:#a64d79; text-shadow:0 0 12px #ff69b4,0 0 20px #ffc0cb; margin-bottom:20px;}
    form {background:#fff; padding:25px; border-radius:20px; max-width:500px; margin:30px auto; box-shadow:0 0 25px rgba(255,105,180,0.4); text-align:right;}
    label {display:block; margin-top:10px; font-weight:bold; color:#902b6d;}
    select,input {width:100%; padding:10px; margin-top:5px; border:1px solid #ddd; border-radius:12px; font-size:18px;}
    button {background:linear-gradient(90deg,#ff69b4,#ffc0cb); color:#fff; padding:12px; border:none; border-radius:30px; cursor:pointer; width:100%; margin-top:15px; font-size:20px; font-weight:bold; transition:0.3s; box-shadow:0 0 12px rgba(255,105,180,0.6);}
    button:hover {background:linear-gradient(90deg,#ff1493,#ff69b4); transform:scale(1.05); box-shadow:0 0 18px rgba(255,105,180,0.8);}
    .success-msg,.error-msg,.cancel-msg {margin:15px auto; padding:10px; border-radius:12px; max-width:500px; font-weight:bold;}
    .success-msg {background:#e0ffe0; color:green;}
    .error-msg {background:#ffe0e0; color:red;}
    .cancel-msg {background:#e0f0ff; color:#004080;}
  </style>
</head>
<body>
  <h2>✨ إضافة عرض جديد ✨</h2>
  <form method="POST" action="">
    <input type="hidden" name="action" value="add">

    <label>القسم:</label>
    <select id="department" required>
      <option value="">-- اختاري القسم --</option>
      <?php
      $sql = "SELECT id, category_name FROM categories";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['id']."'>".$row['category_name']."</option>";
      }
      ?>
    </select>

    <label>الخدمة:</label>
    <select name="service_id" id="service" required>
      <option value="">-- اختاري الخدمة --</option>
    </select>

    <label>السعر الأصلي:</label>
    <input type="text" id="original_price" readonly>

    <label>سعر العرض:</label>
    <input type="number" step="0.01" name="offer_price" required>

    <label>تاريخ بداية العرض:</label>
    <input type="date" name="start_date" required>

    <label>تاريخ نهاية العرض:</label>
    <input type="date" name="end_date" required>

    <button type="submit">➕ إضافة العرض</button>
  </form>

  <h2>🛑 إلغاء عرض</h2>
  <form method="POST" action="" class="cancel-form">
    <input type="hidden" name="action" value="cancel">
    <label>الجلسة:</label>
    <select name="service_id" required>
      <?php
      $sql = "SELECT id, service_name FROM services";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['id']."'>".$row['service_name']."</option>";
      }
      ?>
    </select>
    <button type="submit">إلغاء العرض</button>
  </form>

  <script>
    const departmentSelect = document.getElementById("department");
    const serviceSelect = document.getElementById("service");
    const originalPriceInput = document.getElementById("original_price");

    departmentSelect.addEventListener("change", function() {
      const selectedDept = this.value;
      serviceSelect.innerHTML = "<option value=''>-- اختاري الخدمة --</option>";

      if (selectedDept) {
        fetch("?get_services=1&category_id=" + selectedDept)
          .then(response => response.json())
          .then(data => {
            data.forEach(service => {
              const option = document.createElement("option");
              option.value = service.id;
              option.textContent = service.name;
              option.setAttribute("data-price", service.price);
              serviceSelect.appendChild(option);
            });
          });
      }
      originalPriceInput.value = "";
    });

    serviceSelect.addEventListener("change", function() {
      const selectedOption = this.options[this.selectedIndex];
      const price = selectedOption.getAttribute("data-price");
      originalPriceInput.value = price ? price + " ₪" : "";
    });
  </script>
</body>
</html>
