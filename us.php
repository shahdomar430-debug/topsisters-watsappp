<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>اختيار القسم - Top Sisters</title>
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
      box-sizing: border-box;
    }

    /* الهيدر */
    header {
      width: 100%;
      background: linear-gradient(90deg, #ffc0cb, #fff, #ffe4ec);
      padding: 15px 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      font-size: 28px;
      font-weight: bold;
      color: #a64d79;
      text-shadow: 0 0 15px #ff69b4, 0 0 25px #ffc0cb;
      border-bottom: 3px solid rgba(255,105,180,0.6);
      animation: headerGlow 6s infinite alternate;
    }

    @keyframes headerGlow {
      0% { text-shadow: 0 0 12px #ffb6c1; }
      50% { text-shadow: 0 0 25px #ff69b4; }
      100% { text-shadow: 0 0 15px #ffc0cb; }
    }

    /* زر العودة */
    .back-button {
      position: absolute;
      left: 20px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 16px;
      background: linear-gradient(90deg, #ff69b4, #ffc0cb);
      color: #fff;
      font-weight: bold;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(255,105,180,0.6);
      text-decoration: none;
    }

    .back-button:hover {
      background: linear-gradient(90deg, #ff1493, #ff69b4);
      box-shadow: 0 0 15px rgba(255,105,180,0.8);
      transform: scale(1.05);
    }

    /* زر العروض */
    .offers-btn {
      position: absolute;
      right: 20px;
      background: linear-gradient(90deg, #ff69b4, #ffc0cb);
      color: #fff;
      padding: 8px 16px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0 0 12px rgba(255,105,180,0.6);
    }

    .offers-btn:hover {
      background: linear-gradient(90deg, #ff1493, #ff69b4);
      box-shadow: 0 0 18px rgba(255,105,180,0.8);
      transform: scale(1.05);
    }

    /* أقسام */
    .sections {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 80px;
      flex-wrap: wrap;
    }

    .section-card {
      background: #fff;
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(255,105,180,0.4);
      text-align: center;
      width: 220px;
      transition: 0.3s;
      font-size: 22px;
    }

    .section-card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 35px rgba(255,20,147,0.6);
    }

    .section-card h2 {
      color: #902b6d;
      margin-bottom: 15px;
    }

    .section-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: linear-gradient(90deg, #ff69b4, #ffc0cb);
      color: #fff;
      text-decoration: none;
      border-radius: 25px;
      font-size: 20px;
      font-weight: bold;
      transition: 0.3s;
    }

    .section-card a:hover {
      background: linear-gradient(90deg, #ff1493, #ff69b4);
      box-shadow: 0 0 15px rgba(255,105,180,0.7);
      transform: scale(1.05);
    }

    /* قسم التعليقات */
    .comments-section {
      margin-top: 60px;
      width: 80%;
      max-width: 700px;
      background: #fff;
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(255,105,180,0.4);
    }

    .comments-section h2 {
      text-align: center;
      color: #a64d79;
      margin-bottom: 20px;
      text-shadow: 0 0 10px #ffc0cb;
    }

    .comment-item {
      background: #fdfdfd;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 0 10px rgba(255,182,193,0.4);
      text-align: right;
    }

    .comment-item h4 {
      margin: 0;
      color: #902b6d;
    }

    .comment-item p {
      margin: 5px 0;
    }

    .comment-item small {
      color: #999;
    }
  </style>
</head>
<body>

<header>
  <div>✨ اختاري قسمك ✨</div>
  <a href="login.php" class="back-button">⬅️ رجوع</a>
  <a href="offers.php" class="offers-btn">صفحة العروض</a>
</header>

<div class="sections">
  <div class="section-card">
    <h2>قسم البشرة 🌸</h2>
    <a href="facialtwo.php">دخول</a>
  </div>
  <div class="section-card">
    <h2>قسم الأظافر 💅</h2>
    <a href="nailstwo.php">دخول</a>
  </div>
  <div class="section-card">
    <h2>قسم البديكير 🦶✨</h2>
    <a href="pedicuretwo.php">دخول</a>
  </div>
</div>

<!-- قسم التعليقات -->
<div class="comments-section">
  <h2>💬 آراء الزبائن</h2>
  <div class="comment-list">
    <?php
    $conn = new mysqli("sql208.infinityfree.com", "if0_41150950", "123456789MASa", "if0_41150950_topsisters");
    if ($conn->connect_error) { die("فشل الاتصال: " . $conn->connect_error); }
    $result = $conn->query("SELECT * FROM comments WHERE department='us' ORDER BY created_at DESC");
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment-item'>";
        echo "<h4>👩‍🦰 ".htmlspecialchars($row['customer_name'])."</h4>";
        echo "<p>".htmlspecialchars($row['comment_text'])."</p>";
        echo "<small>🕒 ".htmlspecialchars($row['created_at'])."</small>";
        echo "</div>";
    }
    ?>
  </div>
</div>

</body>
</html>
