<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("sql208.infinityfree.com","if0_41150950","123456789MASa","if0_41150950_topsisters");
if ($conn->connect_error) { die("فشل الاتصال: " . $conn->connect_error); }
$conn->set_charset("utf8mb4");

// جلب الخدمات والعروض الخاصة بقسم البشرة
$sql = "SELECT s.service_name, s.price AS original_price,
       o.offer_price,
       DATE_FORMAT(o.end_date, '%Y-%m-%dT%H:%i:%s') AS end_date
     FROM services s
     LEFT JOIN offers o ON s.id = o.service_id
      WHERE s.category_id = 1;
"; // رقم الكاتيجوري للبشرة
$result = $conn->query($sql);

$offers = [];
while($row = $result->fetch_assoc()) {
    $offers[$row['service_name']] = $row;
}
?>


<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>قسم البشره- Top Sisters</title>
 <style>
  body {
  margin: 0;
  font-family: 'Lateef', 'Amiri', serif;
  background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  direction: rtl;
  padding-top: 100px; /* مسافة تحت الهيدر */
  font-size: 22px;
}

/* الهيدر */
header {
  flex-direction: row-reverse;
  width: 100%;
  background: linear-gradient(90deg, #ffc0cb, #fff, #ffe4ec);
  padding: 15px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  box-sizing: border-box;
  box-shadow: 0 4px 20px rgba(255,182,193,0.5);
  border-bottom: 3px solid rgba(255,105,180,0.4);
  animation: headerGlow 6s infinite alternate;
}

@keyframes headerGlow {
  0% { box-shadow: inset 0 0 25px rgba(255,182,193,0.6); }
  50% { box-shadow: inset 0 0 80px rgba(255,105,180,1); }
  100% { box-shadow: inset 0 0 40px rgba(255,182,193,0.7); }
}

.logo {
  font-size: 28px;
  font-weight: bold;
  color: #a64d79;
  text-shadow: 0 0 15px #ff69b4, 0 0 25px #ffc0cb;
  display: flex;
  align-items: center;
  gap: 8px;
}

nav {
  display: flex;
  gap: 30px;
}

nav a {
  text-decoration: none;
  color: #a64d79;
  font-weight: bold;
  transition: 0.3s;
  font-size: 18px;
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  border-radius: 12px;
}

nav a:hover {
  color: #ff1493;
  background: rgba(255,182,193,0.3);
  box-shadow: 0 0 12px rgba(255,105,180,0.7);
  transform: scale(1.1);
}

/* العنوان */
.page-title {
  margin-top: 20px;
  text-align: center;
}

.page-title h1 {
  font-size: 36px;
  color: #a64d79;
  text-shadow: 0 0 15px #ff69b4, 0 0 25px #ffc0cb;
  background: rgba(255,255,255,0.7);
  display: inline-block;
  padding: 15px 40px;
  border-radius: 25px;
  box-shadow: 0 0 25px rgba(255,105,180,0.4);
  animation: glowTitle 4s infinite alternate;
}

@keyframes glowTitle {
  0% { text-shadow: 0 0 15px #ff69b4; }
  50% { text-shadow: 0 0 25px #ff1493, 0 0 35px #ffc0cb; }
  100% { text-shadow: 0 0 20px #ff69b4; }
}

/* الجلسات */
.sessions {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
  margin: 40px 0;
  width: 90%;
}

.session {
  flex: 1 1 40%;
  text-align: center;
  background: rgba(255,255,255,0.95);
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(255,105,180,0.4);
  transition: 0.3s;
}

.session:hover {
  transform: scale(1.03);
  box-shadow: 0 0 35px rgba(255,105,180,0.6);
}

.session img {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  box-shadow: 0 0 25px rgba(255,255,255,1);
  transition: 0.4s;
}

.session img:hover {
  transform: scale(1.1);
  box-shadow: 0 0 40px rgba(255,255,255,1), 0 0 50px rgba(255,182,193,0.9);
}

.session h3 {
  margin-top: 15px;
  font-size: 28px;
  color: #902b6d;
}

.session p {
  font-size: 20px;
  color: #333;
  line-height: 1.6;
  margin-top: 10px;
}

/* الأسعار */
.price-box {
  margin-top: 15px;
  font-size: 18px;
  color: #902b6d;
}

.old-price {
  text-decoration: line-through;
  color: #999;
  margin-right: 10px;
  font-size: 22px;
}

.new-price {
  color: #ff1493;
  font-weight: bold;
  font-size: 26px;
}

.session-time {
  margin-top: 8px;
  font-size: 18px;
  color: #6a1b9a;
}

/* أزرار العودة */
.back-buttons {
  width: 100%;
  display: flex;
  justify-content: space-between;
  padding: 30px 60px;
  margin-top: 40px;
}

.back-btn {
  text-decoration: none;
  font-size: 18px;
  font-weight: bold;
  color: #fff;
  background: linear-gradient(90deg, #ff69b4, #ffc0cb);
  padding: 12px 25px;
  border-radius: 25px;
  box-shadow: 0 0 15px rgba(255,105,180,0.6);
  transition: 0.3s;
}

.back-btn:hover {
  background: linear-gradient(90deg, #ffc0cb, #ff69b4);
  box-shadow: 0 0 25px rgba(255,20,147,0.8);
  transform: scale(1.05);
}

.back-btn.right {
  align-self: flex-start;
}

.back-btn.left {
  align-self: flex-end;
}

/* استجابة للشاشات الصغيرة */
@media (max-width: 768px) {
  header { flex-direction: column; text-align: center; padding: 10px; }
  nav { flex-direction: column; gap: 15px; margin-top: 10px; }
  .sessions { gap: 20px; }
  .session { flex: 1 1 100%; }
  .session img { width: 160px; height: 160px; }
  .page-title h1 { font-size: 28px; padding: 10px 25px; }
}



  </style>
</head>
<body>
  <header>
  <div class="logo">👑 Top Sisters</div>
  <nav>
    
    <a href="location.php">📍 Location</a>
    <a href="ourwork.php">📸 our work</a>
    <a href="contact.php">📞 Contact</a>
    <a href="coments.php">💬 Comments</a>
    <a href="roles.php">📜 Rules</a>
    <a href="customer.php">🏠 Home</a>
  </nav>
</header>

  <!-- عنوان الصفحة -->
  <section class="page-title">
    <h1>قسم البشره 💅✨ </h1>
  </section>

  


<section class="sessions">


<!-- جلسة ميزوثيرابي -->
<div class="session" data-end="<?php echo $offers['جلسة ميزوثيرابي']['end_date'] ?? ''; ?>">
  <img src="ميزوو.jpg" alt="جلسة ميزوثيرابي">
  <div class="price-box">
    <?php
    $s = $offers['جلسة ميزوثيرابي'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']." ₪</span>";
        echo "<span class='new-price'>".$s['offer_price']." ₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "150")." ₪";
    }
    ?>
  </div>
  <h3>جلسة ميزوثيرابي 💉✨</h3>
  <p>جلسة تعتمد على حقن الفيتامينات والمعادن مباشرة في الطبقة الوسطى للجلد لتجديد البشرة.</p>
  <p>فوائد الجلسة 💖<br>
    • تغذية البشرة بالفيتامينات والأحماض الأمينية<br>
    • تحفيز إنتاج الكولاجين والإيلاستين<br>
    • تقليل علامات التعب والخطوط الدقيقة<br>
    • تجديد شباب البشرة ومنحها مظهر صحي
  </p>
  <p class="session-time">⏱️ المدة: ساعة</p>
</div>

<!-- جلسة هايدروفشل -->
<div class="session" data-end="<?php echo $offers['جلسة هايدروفشل']['end_date'] ?? ''; ?>">
  <img src="هايدروو.jpg" alt="جلسة هايدروفشل">
  <div class="price-box">
    <?php
    $s = $offers['جلسة هايدروفشل'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']." ₪</span>";
        echo "<span class='new-price'>".$s['offer_price']." ₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "130")." ₪";
    }
    ?>
  </div>
  <h3>جلسة هايدروفشل 💦✨</h3>
  <p>جلسة متطورة لتنظيف البشرة بعمق وتقشيرها مع إدخال سيرومات مغذية.</p>
  <p>فوائد الجلسة 💖<br>
    • تنظيف المسام بعمق وإزالة الدهون الزائدة<br>
    • تقشير لطيف يحفّز تجديد الخلايا<br>
    • ترطيب فوري مع إدخال سيرومات مفيدة<br>
    • تحسين ملمس البشرة وتوحيد لونها
  </p>
  <p class="session-time">⏱️ المدة: ساعه ونصف</p>
</div>

<!-- جلسة تقشير الطحالب -->
<div class="session" data-end="<?php echo $offers['جلسة تقشير الطحالب']['end_date'] ?? ''; ?>">
  <img src="تقشير طحالب.jpg" alt="جلسة تقشير الطحالب">
  <div class="price-box">
    <?php
    $s = $offers['جلسة تقشير الطحالب'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']." ₪</span>";
        echo "<span class='new-price'>".$s['offer_price']." ₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "150")." ₪";
    }
    ?>
  </div>
  <h3>جلسة تقشير الطحالب 🌿✨</h3>
  <p>جلسة طبيعية لتجديد خلايا البشرة وتحفيز الكولاجين وعلاج مشاكل الجلد.</p>
  <p>فوائد الجلسة 💖<br>
    • تجديد خلايا البشرة وتحفيز الكولاجين<br>
    • علاج التصبغات والبقع الداكنة<br>
    • تقليل الحبوب والندبات<br>
    • تحسين ملمس البشرة وتوحيد لونها
  </p>
  <p class="session-time">⏱️ المدة: ساعة</p>
</div>

<!-- جلسة نضارة -->
<div class="session" data-end="<?php echo $offers['جلسة نضارة']['end_date'] ?? ''; ?>">
  <img src="نضاره معتمد.jpg" alt="جلسة نضارة">
  <div class="price-box">
    <?php
    $s = $offers['جلسة نضارة'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']." ₪</span>";
        echo "<span class='new-price'>".$s['offer_price']." ₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "100")." ₪";
    }
    ?>
  </div>
  <h3>جلسة نضارة ✨</h3>
  <p>جلسة تهدف لتنظيف البشرة وإعادة إشراقها وترطيبها بعمق.</p>
  <p>فوائد الجلسة 💖<br>
    • إزالة الشوائب والخلايا الميتة<br>
    • ترطيب البشرة ومنحها نعومة وانتعاش<br>
    • إعادة الحيوية والإشراق الطبيعي للوجه
  </p>
  <p class="session-time">⏱️ المدة: ساعه ونصف </p>
</div>

<!-- جلسة قفع الرموش -->
<div class="session" data-end="<?php echo $offers['جلسة قفع الرموش']['end_date'] ?? ''; ?>">
  <img src="قفع رموش.jpg" alt="جلسة قفع الرموش">
  <div class="price-box">
    <?php
    $s = $offers['جلسة قفع الرموش'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']." ₪</span>";
        echo "<span class='new-price'>".$s['offer_price']." ₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "50")." ₪";
    }
    ?>
  </div>
  <h3>جلسة قفع الرموش ✨</h3>
  <p>جلسة خاصة لتعزيز جمال العينين بشكل طبيعي من خلال رفع الرموش وإبراز طولها وكثافتها.</p>
  <p>فوائد الجلسة 💖<br>
    • رفع الرموش بشكل طبيعي لإبراز جمال العينين<br>
    • تمنح العينين مظهراً واسعاً ومشرقاً<br>
    • بديل مثالي للمسكارا اليومية<br>
    • نتائج تدوم لأسابيع مع مظهر أنيق ومرتب
  </p>
  <p class="session-time">⏱️ المدة: ساعه ونصف </p>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const sessions = document.querySelectorAll(".session");

  sessions.forEach(session => {
    const endDate = session.getAttribute("data-end");
    const countdownElem = session.querySelector(".countdown");
    const priceBox = session.querySelector(".price-box");

    if (!endDate || !countdownElem) return;

    const endTime = new Date(endDate).getTime();

    const interval = setInterval(() => {
      const now = new Date().getTime();
      const distance = endTime - now;

      if (distance < 0) {
        clearInterval(interval);
        // نحذف السعر المخفض والعداد ونرجع السعر الأصلي
        priceBox.innerHTML = "💰 السعر: " + 
          (priceBox.querySelector(".old-price")?.textContent.replace("₪","") || "—") + " ₪";
        return;
      }

      const days = Math.floor(distance / (1000*60*60*24));
      const hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
      const minutes = Math.floor((distance % (1000*60*60)) / (1000*60));
      const seconds = Math.floor((distance % (1000*60)) / 1000);

      countdownElem.innerHTML =
        " (" + days + " يوم " +
        hours.toString().padStart(2,"0") + ":" +
        minutes.toString().padStart(2,"0") + ":" +
        seconds.toString().padStart(2,"0") + ")";
    }, 1000);
  });
});
</script>

 <div class="back-buttons">
    <a href="nails.php" class="back-btn right"> ➡️قسم الاضافر</a>
    <a href="pedicure.php" class="back-btn left">قسم البديكير⬅️</a>
  </div>

  
</body>
</html>

