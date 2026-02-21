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
      WHERE s.category_id = 2;
"; 
// رقم الكاتيجوري للبشرة
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
  <title>قسم الاظافر - Top Sisters</title>
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
    }

   header {
  width: 100%;
  background: linear-gradient(90deg, #ffe4e9, #fff, #ffc0cb);
  padding: 15px 40px;
  display: flex;
  flex-direction: row-reverse; /* هذا هو المفتاح */
  justify-content: space-between;
  align-items: center;
  box-shadow: inset 0 0 60px rgba(255,182,193,0.9);
  border-bottom: 3px solid rgba(255,105,180,0.6);
  animation: headerGlow 6s infinite alternate;
}



    @keyframes headerGlow {
      0% { box-shadow: inset 0 0 25px rgba(255,182,193,0.6); }
      50% { box-shadow: inset 0 0 80px rgba(255,105,180,1); }
      100% { box-shadow: inset 0 0 40px rgba(255,182,193,0.7); }
    }

    .logo {
      font-size: 30px;
      font-weight: bold;
      color: #a64d79;
      text-shadow: 0 0 15px #ff69b4, 0 0 25px #ffc0cb;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav {
      display: flex;
      gap: 35px;
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
      background: rgba(255,255,255,0.9);
      padding: 20px;
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
      font-size: 20px;
      color: #902b6d;
    }

    .session p {
      font-size: 16px;
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
      font-size: 18px;
    }

    .new-price {
      color: #ff1493;
      font-weight: bold;
      font-size: 20px;
    }

    .session-time {
      margin-top: 8px;
      font-size: 16px;
      color: #6a1b9a;
    }
    .page-title {
  margin-top: 40px;
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
    <h1>قسم الاضافر 💅✨ </h1>
  </section>

<section class="sessions">
<div class="session" data-end="<?php echo $offers['جلسة تنظيف اللحمية']['end_date'] ?? ''; ?>">
  <img src="تنضيف لحمية الايدين.jpg" alt="تنضيف اللحمية">
  <div class="price-box">
    <?php
    $s = $offers['جلسة تنظيف اللحمية'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "35")."₪";
    }
    ?>
  </div>
  <h3>جلسة تنضيف اللحمية ✨</h3>
    <p>دلّلي أظافرك بجلسة تنظيف دقيقة للجلد الزائد حول الأظافر، تمنحك مظهرًا مرتبًا وصحيًا.</p>
    <p>فوائد الجلسة 💖<br>
    • إزالة الجلد الزائد حول الأظافر<br>
    • تحسين شكل الأظافر ومظهر اليدين<br>
    • تحضير الأظافر لأي جلسة تجميل لاحقة</p>
  <p class="session-time">⏱️ المدة: نصف ساعة</p>
</div>
<!-- جلسة جل طبيعي -->
<div class="session" data-end="<?php echo $offers['جلسة جل على أظافر طبيعي']['end_date'] ?? ''; ?>">
  <img src="جل طبيعي للايدين.jpg" alt="جل طبيعي">
  <div class="price-box">
    <?php
    $s = $offers['جلسة جل على أظافر طبيعي'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "70")."₪";
    }
    ?>
  </div>
   <h3>جلسة جل على أظافر طبيعي 💅✨</h3>
    <p>احصلي على أظافر لامعة وأنيقة مع طبقة جل مباشرة على أظافرك الطبيعية.</p>
    <p>فوائد الجلسة 💖<br>
    • لمعان جذاب يدوم طويلًا<br>
    • حماية الأظافر الطبيعية<br>
    • مظهر مرتب وأنيق يناسب كل الأوقات</p>
  <p class="session-time">⏱️ المدة: ساعة</p>
</div>

<!-- جلسة جل مع تركيب -->
<div class="session" data-end="<?php echo $offers['جلسة جل مع تركيب']['end_date'] ?? ''; ?>">
  <img src="تركيب ايدين.jpg" alt="جل مع تركيب">
  <div class="price-box">
    <?php
    $s = $offers['جلسة جل مع تركيب'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "90")."₪";
    }
    ?>
  </div>
  <h3>جلسة جل مع تركيب 💅✨</h3>
    <p>جلسة تمنحك طولًا مثاليًا للأظافر مع لمعة الجل الفاخرة.</p>
    <p>فوائد الجلسة 💖<br>
    • أظافر طويلة ومرتبة<br>
    • تثبيت الجل لفترة طويلة<br>
    • إطلالة أنيقة وفاخرة</p>
  <p class="session-time">⏱️المدة: ساعة ونصف</p>
</div>
<!-- جلسة جل روسي -->
<div class="session" data-end="<?php echo $offers['جلسة جل روسي']['end_date'] ?? ''; ?>">
  <img src="جل روسيييي.jpg" alt="جل روسي">
  <div class="price-box">
    <?php
    $s = $offers['جلسة جل روسي'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "130")."₪";
    }
    ?>
  </div>
  <h3>جلسة جل روسي 💅✨</h3>
    <p>جلسة أنيقة بتصميم رسمي وراقي، مثالية للمناسبات الخاصة.</p>
    <p>فوائد الجلسة 💖<br>
    • تمنحك نفخه طبيعيه لمظهر اظافرك<br>
    • الجل الروسي اقوى من الجل العادي لذلك يمنع تكسر وضعف اظافرك ويمنحها قوه لوقت اطول <br>
    • ألوان كلاسيكية أو فرنش مرتب<br>
    • لمعان أنيق يدوم طويلًا<br>
    • إطلالة رسمية متقنة</p>
  <p class="session-time">⏱️ المدة: ساعة ونصف</p>
</div>

<!-- جلسة اكستنشن -->
<div class="session" data-end="<?php echo $offers['جلسة اكستنشن']['end_date'] ?? ''; ?>">
  <img src="اكستنشنن.jpg" alt="اكستنشن">
  <div class="price-box">
    <?php
    $s = $offers['جلسة اكستنشن'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "130")."₪";
    }
    ?>
  </div>
  <h3>جلسة اكستنشن 💅✨</h3>
    <p>جلسة لإطالة الأظافر بشكل طبيعي وفخم باستخدام تقنيات خاصة.</p>
    <p>فوائد الجلسة 💖<br>
    • طول إضافي للأظافر بشكل مرتب<br>
    • مظهر طبيعي وفاخر<br>
    • مثالية للمناسبات والإطلالات المميزة</p>
    •  تدوم طويلا</p>
  <p class="session-time">⏱️ المدة: ساعه ونصف - ساعتين</p>
</div>
<!-- جلسة جل مع تركيب مدعم -->
<div class="session" data-end="<?php echo $offers['جلسة جل مع تركيب مدعم']['end_date'] ?? ''; ?>">
  <img src="تركيب مدعم.jpg" alt="جل مع تركيب مدعم">
  <div class="price-box">
    <?php
    $s = $offers['جلسة جل مع تركيب مدعم'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "130")."₪";
    }
    ?>
  </div>
  <h3>جلسة جل مع تركيب مدعم 💅✨</h3>
    <p>جلسة خاصة لتركيب الأظافر مع دعم إضافي يمنحها قوة وثبات أكبر.</p>
    <p>فوائد الجلسة 💖<br>
    • أظافر قوية ومقاومة للتكسر<br>
    • لمعان جذاب يدوم طويلًا<br>
    • مظهر فاخر ومثالي للمناسبات</p>
  <p class="session-time">⏱️ المدة: ساعه ونصف - ساعتين</p>
</div>

<!-- جلسة بولي جل -->
<div class="session" data-end="<?php echo $offers['جلسة بولي جل']['end_date'] ?? ''; ?>">
  <img src="بولي جل.jpg" alt="بولي جل">
  <div class="price-box">
    <?php
    $s = $offers['جلسة بولي جل'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "130")."₪";
    }
    ?>
  </div>
 <h3>جلسة بولي جل 💅✨</h3>
    <p>تقنية حديثة تجمع بين قوة الأكريلك ومرونة الجل، تمنحك أظافر قوية وخفيفة.</p>
    <p>فوائد الجلسة 💖<br>
    • أظافر قوية ومرنة<br>
    • مظهر طبيعي وأنيق<br>
    • ثبات طويل مع راحة في الاستخدام</p>
  <p class="session-time">⏱️ المدة: ساعه ونصف - ساعتين</p>
</div>

<!-- جلسة حناء الأظافر -->
<div class="session" data-end="<?php echo $offers['جلسة حناء الأظافر لون أسود']['end_date'] ?? ''; ?>">
  <img src="حنا اسود.jpg" alt="حناء الأظافر">
  <div class="price-box">
    <?php
    $s = $offers['جلسة حناء الأظافر لون أسود'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "50")."₪";
    }
    ?>
  </div>
   <h3>جلسة حناء الأظافر لون أسود ✨</h3>
    <p>جلسة تمنح أظافرك لونًا أسود طبيعي باستخدام الحناء مع تنظيف اللحمية.</p>
    <p>فوائد الجلسة 💖<br>
    • لا يمنعك من الصلاة او الوضوء<br>
    • لون جذاب وثابت<br>
    • تنظيف اللحمية مع حماية الأظافر<br>
    • مظهر أنيق ومميز</p>
  <p class="session-time">⏱️ المدة: ساعة</p>
</div>

<!-- إزالة جل قديم مع تنظيف اللحمية -->
<div class="session" data-end="<?php echo $offers['جلسة إزالة جل قديم مع تنظيف اللحمية']['end_date'] ?? ''; ?>">
  <img src="ازالة جل مع تنضيف لحميه.jpg" alt="إزالة جل قديم مع تنظيف اللحمية">
  <div class="price-box">
    <?php
    $s = $offers['جلسة إزالة جل قديم مع تنظيف اللحمية'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "45")."₪";
    }
    ?>
  </div>
   <h3>جلسة إزالة جل قديم مع تنضيف اللحمية 💅✨</h3>
    <p>جلسة لإزالة الجل القديم وتنضيف اللحمية .</p>
    <p>فوائد الجلسة 💖<br>
    • إزالة الجل القديم بلطف<br>
    • تنظيف اللحمية وحماية الأظافر<br>
    •  تجهيز الأظافر لجلسة جديدة او جعل الاضافر تبدوا اكثر حيويه في حال عدم الرغبه بجلسه جديده</p>
  <p class="session-time">⏱️ المدة: 40 دقيقة</p>
</div>

<!-- إزالة جل قديم بدون تنظيف اللحمية -->
<div class="session" data-end="<?php echo $offers['جلسة إزالة جل قديم بدون تنظيف اللحمية']['end_date'] ?? ''; ?>">
  <img src="ازالة جل بدون تنضيف لحميه.jpg" alt="إزالة جل قديم بدون تنظيف اللحمية">
  <div class="price-box">
    <?php
    $s = $offers['جلسة إزالة جل قديم بدون تنظيف اللحمية'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "20")."₪";
    }
    ?>
  </div>
   <h3>جلسة إزالة جل قديم بدون تنضيف اللحمية 💅✨</h3>
      <p>جلسة سريعة لإزالة الجل القديم فقط مع الحفاظ على الأظافر الطبيعية.</p>
      <p>فوائد الجلسة 💖<br>
      • إزالة الجل القديم بأمان<br>
      • الحفاظ على صحة الأظافر الطبيعية<br>
      •  تجهيز الأظافر لتطبيق جديد او جعلها اكثر حيويه في حال عدم الرغبه بجلسه جديده</p>
  <p class="session-time">⏱️ المدة: نص ساعه</p>
</div>

<!-- جلسة البرافين لليدين -->
<div class="session" data-end="<?php echo $offers['جلسة البرافين لليدين']['end_date'] ?? ''; ?>">
  <img src="برافينن يدين.jpg" alt="البرافين">
  <div class="price-box">
    <?php
    $s = $offers['جلسة البرافين لليدين'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "40")."₪";
    }
    ?>
  </div>
  <h3>جلسة البرافين لليدين 🕯️✨</h3>
      <p>جلسة برافين دافئة لترطيب عميق وتغذية البشرة والتخلص من الجفاف.</p>
      <p>تساهم في علاج بعض الامراض الجلديه .</p>
       <p>تساهم في تخفيف الضغط وتخفيف الاوجاع عن الايدي.</p>
  <p class="session-time">⏱️ المدة: نصف ساعة</p>
</div>
<div class="session" data-end="<?php echo $offers['جلسة تنظيف اللحمية مع تقشير وترطيب']['end_date'] ?? ''; ?>">
  <img src="تقشير لليدين.jpg" alt="تنظيف اللحمية مع تقشير وترطيب">
  <div class="price-box">
    <?php
    $s = $offers['جلسة تنظيف اللحمية مع تقشير وترطيب'] ?? null;
    if ($s && $s['offer_price']) {
        echo "<span class='old-price'>".$s['original_price']."₪</span>";
        echo "<span class='new-price'>".$s['offer_price']."₪</span>";
        echo "<span class='countdown'></span>";
    } else {
        echo "💰 السعر: ".($s['original_price'] ?? "50")."₪";
    }
    ?>
  </div>
  <h3>جلسة تنظيف اللحمية مع تقشير وترطيب (بديكير يدين) ✨</h3>
  <p>جلسة شاملة تجمع بين تنظيف اللحمية وتقشير اليدين وترطيبها لتنعمي بلمسة ناعمة وصحية.</p>
  <p>فوائد الجلسة 💖<br>
    • تنظيف اللحمية بعناية<br>
    • تقشير اليدين لإزالة الخلايا الميتة<br>
    • ترطيب عميق يمنح اليدين نعومة وانتعاش
  </p>
  <p class="session-time">⏱️ المدة: 45 دقيقة</p>
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
        // إرجاع السعر الأصلي فقط
        const oldPrice = priceBox.querySelector(".old-price")?.textContent || "—";
        priceBox.innerHTML = "💰 السعر: " + oldPrice;
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
    <a href="facial.php" class="back-btn right"> ➡️قسم البشره</a>
    <a href="pedicure.php" class="back-btn left">قسم البديكير⬅️</a>
  </div>



  
</body>
</html>

