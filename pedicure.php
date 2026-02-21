<?php
$conn = new mysqli("sql208.infinityfree.com","if0_41150950","123456789MASa","if0_41150950_topsisters");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// جلب خدمات البديكير مع العروض
$sql = "SELECT s.service_name, s.price AS original_price, o.offer_price, o.start_date, o.end_date
        FROM services s
        LEFT JOIN offers o ON s.id = o.service_id
        WHERE s.category_id = 3";
$result = $conn->query($sql);

// نخزن الخدمات في مصفوفة باسم الخدمة
$offers = [];
while($row = $result->fetch_assoc()) {
    $offers[$row['service_name']] = $row;
}

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>قسم البديكير - Top Sisters</title>
  <style>
    /* نفس التنسيقات الأصلية */
    body { margin: 0; font-family: 'Lateef','Amiri',serif; background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb); min-height:100vh; display:flex; flex-direction:column; align-items:center; direction:rtl; }
    header { width: 100%; background: linear-gradient(90deg,#ffe4e9,#fff,#ffc0cb); padding: 15px 40px; display:flex; flex-direction: row-reverse; justify-content:space-between; align-items:center; box-shadow: inset 0 0 60px rgba(255,182,193,0.9); border-bottom:3px solid rgba(255,105,180,0.6); animation: headerGlow 6s infinite alternate; }
    @keyframes headerGlow { 0%{box-shadow:inset 0 0 25px rgba(255,182,193,0.6);} 50%{box-shadow:inset 0 0 80px rgba(255,105,180,1);} 100%{box-shadow:inset 0 0 40px rgba(255,182,193,0.7);} }
    .logo { font-size:30px; font-weight:bold; color:#a64d79; text-shadow:0 0 15px #ff69b4,0 0 25px #ffc0cb; display:flex; align-items:center; gap:8px; }
    nav { display:flex; gap:35px; }
    nav a { text-decoration:none; color:#a64d79; font-weight:bold; transition:0.3s; font-size:18px; display:flex; align-items:center; gap:6px; padding:6px 12px; border-radius:12px; }
    nav a:hover { color:#ff1493; background:rgba(255,182,193,0.3); box-shadow:0 0 12px rgba(255,105,180,0.7); transform:scale(1.1); }
    .sessions { display:flex; flex-wrap:wrap; justify-content:center; gap:40px; margin:40px 0; width:90%; }
    .session { flex:1 1 40%; text-align:center; background:rgba(255,255,255,0.9); padding:20px; border-radius:20px; box-shadow:0 0 25px rgba(255,105,180,0.4); transition:0.3s; }
    .session:hover { transform:scale(1.03); box-shadow:0 0 35px rgba(255,105,180,0.6); }
    .session img { width:200px; height:200px; border-radius:50%; box-shadow:0 0 25px rgba(255,255,255,1); transition:0.4s; }
    .session img:hover { transform:scale(1.1); box-shadow:0 0 40px rgba(255,255,255,1),0 0 50px rgba(255,182,193,0.9); }
    .session h3 { margin-top:15px; font-size:25px; color:#902b6d; }
    .session p { font-size:23px; color:#333; line-height:1.6; margin-top:10px; }
    .price-box { margin-top:25px; font-size:20px; color:#902b6d; }
    .old-price { text-decoration:line-through; color:#999; margin-right:10px; font-size:25px; }
    .new-price { color:#ff1493; font-weight:bold; font-size:25px; }
    .page-title { margin-top:40px; text-align:center; }
    .page-title h1 { font-size:36px; color:#a64d79; text-shadow:0 0 15px #ff69b4,0 0 25px #ffc0cb; background:rgba(255,255,255,0.7); display:inline-block; padding:15px 40px; border-radius:25px; box-shadow:0 0 25px rgba(255,105,180,0.4); animation: glowTitle 4s infinite alternate; }
    @keyframes glowTitle { 0%{text-shadow:0 0 15px #ff69b4;} 50%{text-shadow:0 0 25px #ff1493,0 0 35px #ffc0cb;} 100%{text-shadow:0 0 20px #ff69b4;} }
    .back-buttons { width:100%; display:flex; justify-content:space-between; padding:30px 60px; margin-top:40px; }
    .back-btn { text-decoration:none; font-size:18px; font-weight:bold; color:#fff; background:linear-gradient(90deg,#ff69b4,#ffc0cb); padding:12px 25px; border-radius:25px; box-shadow:0 0 15px rgba(255,105,180,0.6); transition:0.3s; }
    .back-btn:hover { background:linear-gradient(90deg,#ffc0cb,#ff69b4); box-shadow:0 0 25px rgba(255,20,147,0.8); transform:scale(1.05); }
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

<section class="page-title">
  <h1>قسم البديكير 🦶✨</h1>
</section>


<section class="sessions">
  <!-- 1 جلسة البديكير -->
  <div class="session" data-end="<?php echo $offers['جلسة البديكير']['end_date'] ?? ''; ?>">
    <img src="بدكيرر.jpeg" alt="جلسة البديكير">
    <div class="price-box">
      <?php
      $s = $offers['جلسة البديكير'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "90")."₪";
      }
      ?>
    </div>
    <h3>جلسة البديكير 🦶✨</h3> <p>دلّلي قدميك بجلسة بديكير متكاملة تهدف إلى العناية بالصحة والجمال معًا. تشمل الجلسة تنظيف القدمين بعمق، إزالة الجلد الميت، العناية بالأظافر وترطيب القدمين لمنحك إحساسًا بالانتعاش والراحة من أول جلسة.</p> <p>فوائد جلسة البديكير 💖<br> • تنعيم القدمين والتخلّص من التشققات<br> • تحسين مظهر الأظافر وترتيبها<br> • تعزيز الراحة والاسترخاء<br> • الحفاظ على صحة القدمين ونظافتهما<br> • إحساس فوري بالانتعاش والنعومة </p>
    <p>⏱️ مدة الجلسة: ساعة - ساعة ونصف</p>
  </div>

  <!-- 2 Foot Spa -->
  <div class="session" data-end="<?php echo $offers['جلسة Foot Spa']['end_date'] ?? ''; ?>">
    <img src="سبا.jpeg" alt="Foot Spa">
    <div class="price-box">
      <?php
      $s = $offers['جلسة Foot Spa'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "100")."₪";
      }
      ?>
    </div>
    <h3>جلسة الـ Foot Spa 🦶💦</h3> <p>استمتعي بتجربة استرخاء فاخرة مع جلسة الـ Foot Spa المصمّمة لتجديد حيوية قدميك. تبدأ الجلسة بنقع القدمين بمياه دافئة مهدّئة تساعد على الاسترخاء، تليها عناية لطيفة تساهم في تفتيح البشرة وتترك قدميك ناعمتين ومنتعشتين بإشراقة واضحة.</p> <p>فوائد جلسة الـ Foot Spa ✨<br> • تخفيف التعب والإجهاد عن القدمين<br> • تنشيط الدورة الدموية<br> • تفتيح البشرة وتوحيد لونها<br> • ترطيب وتنعيم الجلد<br> • تهدئة الأعصاب ومنح شعور عميق بالاسترخاء </p>
    <p>⏱️ مدة الجلسة: ساعة</p>
  </div>

  <!-- 3 تقشير الأقدام -->
  <div class="session" data-end="<?php echo $offers['جلسة تقشير الأقدام']['end_date'] ?? ''; ?>">
    <img src="تقشير.jpeg" alt="تقشير الأقدام">
    <div class="price-box">
      <?php
      $s = $offers['جلسة تقشير الأقدام'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "60")."₪";
      }
      ?>
    </div>
   <h3>جلسة تقشير الأقدام 🦶✨</h3> <p>امنحي قدميك العناية التي تستحقها مع جلسة تقشير الأقدام المصمّمة لإزالة الجلد الميت والتشققات الخفيفة، وتجديد البشرة لتصبح أنعم، أفتح، وأكثر حيوية من أول جلسة.</p> <p>فوائد جلسة تقشير الأقدام 💖<br> • إزالة الجلد الميت والخشن<br> • تفتيح بشرة القدمين وتوحيد لونها<br> • تنعيم ملمس القدمين<br> • تحسين مظهر القدمين العام<br> • تعزيز الإحساس بالراحة والانتعاش </p>
    <p>⏱️ مدة الجلسة: نصف ساعة - 45 دقيقة</p>
  </div>

  <!-- 4 الجل الطبيعي -->
  <div class="session" data-end="<?php echo $offers['جلسة الجل الطبيعي للأقدام']['end_date'] ?? ''; ?>">
    <img src="جل على اضافر طبيعي.jpeg" alt="الجل الطبيعي">
    <div class="price-box">
      <?php
      $s = $offers['جلسة الجل الطبيعي للأقدام'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "70")."₪";
      }
      ?>
    </div>
   <h3>جلسة الجل الطبيعي للأقدام 💅✨</h3> <p>استمتعي بمظهر أنيق وطبيعي لقدميك مع جلسة الجل الطبيعي المصمّمة لمنح الأظافر لونًا ناعمًا ولمعانًا راقيًا يدوم لفترة أطول، مع عناية دقيقة بالأظافر تبرز جمالها بشكل صحي ومرتب.</p> <p>فوائد جلسة الجل الطبيعي للأقدام 💖<br> • مظهر طبيعي وأنيق للأظافر<br> • ثبات ولمعان يدومان لفترة أطول<br> • حماية الأظافر وتقويتها<br> • ترتيب شكل الأظافر وتحسين مظهرها<br> • إطلالة نظيفة وناعمة تناسب كل الأوقات </p>
    <p>⏱️ مدة الجلسة: ساعة</p>
  </div>

  <!-- 5 البرافين -->
  <div class="session" data-end="<?php echo $offers['جلسة البرافين للأقدام']['end_date'] ?? ''; ?>">
    <img src="برافين.jpg" alt="البرافين">
    <div class="price-box">
      <?php
      $s = $offers['جلسة البرافين للأقدام'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "40")."₪";
      }
      ?>
    </div>
    <h3>جلسة البرافين للأقدام 🕯️✨</h3> <p>دلّلي قدميك بجلسة البرافين الدافئة المصمّمة لترطيب عميق وتغذية البشرة، حيث يساعد شمع البرافين على تنعيم القدمين، تفتيح البشرة، والتخلّص من الجفاف والتشققات، ليمنحك إحساسًا فوريًا بالراحة والنعومة.</p> <p>فوائد جلسة البرافين للأقدام 💖<br> • ترطيب عميق للبشرة<br> • تنعيم القدمين والتخفيف من التشققات<br> • تفتيح البشرة وتوحيد لونها<br> • تهدئة القدمين ومنح إحساس بالاسترخاء<br> • تحسين مرونة الجلد ولمسه الحريري </p>
    <p>⏱️ مدة الجلسة: نصف ساعة</p>
  </div>

  <!-- 6 جل تركيب الأظافر -->
  <div class="session" data-end="<?php echo $offers['جلسة جل تركيب الأظافر للأقدام']['end_date'] ?? ''; ?>">
    <img src="تركيب.jpeg" alt="جل تركيب الأظافر">
    <div class="price-box">
      <?php
      $s = $offers['جلسة جل تركيب الأظافر للأقدام'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "90")."₪";
      }
      ?>
    </div>
    <h3>جلسة جل تركيب الأظافر للأقدام 💅✨</h3> <p>دلّلي قدميك بأظافر مرتبة وأنيقة مع جلسة جل تركيب الأظافر للأقدام، التي تمنح أظافرك طولًا متناسقًا ولمعانًا جذابًا يدوم طويلاً، مع حماية الأظافر الطبيعية وإبراز جمال القدمين بطريقة صحية وفاخرة.</p> <p>فوائد جلسة جل تركيب الأظافر للأقدام 💖<br> • أظافر قدمين مرتبة وطويلة بشكل مثالي<br> • تثبيت الجل لفترة طويلة ولمعان جذاب<br> • حماية ودعم الأظافر الطبيعية<br> • تحسين مظهر القدمين وإطلالة أنيقة<br> • مثالية لأي مناسبة لإطلالة فاخرة ومتقنة </p>
    <p>⏱️ مدة الجلسة: ساعة وربع</p>
  </div>

  <!-- 7 إزالة الجل القديم -->
  <div class="session" data-end="<?php echo $offers['جلسة إزالة الجل القديم للأقدام']['end_date'] ?? ''; ?>">
    <img src="ازالة جل.jpeg" alt="إزالة الجل القديم">
    <div class="price-box">
      <?php
      $s = $offers['جلسة إزالة الجل القديم للأقدام'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "30")."₪";
      }
      ?>
    </div>
   <h3>جلسة إزالة الجل القديم للأقدام 💅🧴</h3> <p>احصلي على أظافر نظيفة وجاهزة لتجديد إطلالتك مع جلسة إزالة الجل القديم للأقدام. الجلسة مصمّمة لإزالة الجل بلطف دون الإضرار بالأظافر الطبيعية، لتصبح قدميك جاهزة لأي جلسة جديدة مع الحفاظ على صحتها وقوتها.</p> <p>فوائد جلسة إزالة الجل القديم للأقدام 💖<br> • إزالة الجل القديم بلطف وأمان<br> • حماية الأظافر الطبيعية من التلف<br> • تجهيز الأظافر لجلسة جديدة بأفضل شكل<br> • تحسين مظهر القدمين ونظافتهما<br> • إحساس بالراحة والانتعاش بعد الإزالة </p>
    <p>⏱️ مدة الجلسة: نصف ساعة</p>
  </div>

   <!-- 8 تنظيف اللحمية وبرد الأظافر -->
  <div class="session" data-end="<?php echo $offers['جلسة تنظيف اللحمية وبرد الأظافر للأقدام']['end_date'] ?? ''; ?>">
    <img src="تنضيف لحميه.jpeg" alt="تنظيف اللحمية وبرد الأظافر">
    <div class="price-box">
      <?php
      $s = $offers['جلسة تنظيف اللحمية وبرد الأظافر للأقدام'] ?? null;
      if ($s && $s['offer_price']) {
          echo "<span class='old-price'>".$s['original_price']."₪</span>";
          echo "<span class='new-price'>".$s['offer_price']."₪</span>";
          echo "<span class='countdown'></span>";
      } else {
          echo "💰 السعر: ".($s['original_price'] ?? "30")."₪";
      }
      ?>
    </div>
   <h3>جلسة تنظيف اللحميّة وبرد الأظافر للأقدام ✨💅</h3> <p>دلّلي قدميك بجلسة دقيقة تمنح أظافرك مظهرًا مرتبًا وصحيًا. تشمل الجلسة تنظيف اللحميّة بعناية، وتقليم وبرد الأظافر لتصبح نظيفة، متساوية، ومهيأة لأي جلسة تجميل لاحقة، مع الحفاظ على صحة القدمين وطبيعتها.</p> <p>فوائد جلسة تنظيف اللحميّة وبرد الأظافر للأقدام 💖<br> • تنظيف دقيق للحميّة وحماية الأظافر<br> • تقليم وبرد الأظافر للحصول على شكل مرتب ومتساوي<br> • تحسين مظهر القدمين وجعلها أكثر جاذبية<br> • تهيئة الأظافر لأي جلسة تجميل لاحقة مثل الجل أو الطلاء<br> • إحساس بالراحة والنظافة والانتعاش </p>
    <p>⏱️ مدة الجلسة: نصف ساعة</p>
  </div>
</section>

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
        // إرجاع السعر الأصلي فقط بعد انتهاء العرض
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
    <a href="nails.php" class="back-btn right"> ➡️قسم الاظافر</a>
    <a href="facial.php" class="back-btn left">قسم البشره ⬅️ </a>
  </div>
</body>
</html>