<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>Comments - Top Sisters</title>
  <style>
    body {
      margin: 0;
      font-family: 'Lateef', 'Amiri', serif;
      background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 20px;
    }

    /* الهيدر */
    header {
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

    .logo {
      font-size: 28px;
      font-weight: bold;
      color: #a64d79;
    }

    nav {
      display: flex;
      gap: 25px;
    }

    nav a {
      text-decoration: none;
      color: #a64d79;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    nav a:hover {
      color: #d63384;
      transform: scale(1.1);
    }

    /* صندوق التعليقات */
    .comment-box {
      margin-top: 150px;
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(255,105,180,0.3);
      width: 90%;
      max-width: 700px;
      text-align: center;
      animation: fadeIn 1.5s ease;
    }

    .comment-box h2 {
      margin-bottom: 20px;
      color: #d63384;
      font-size: 28px;
      font-weight: bold;
    }

    textarea, input {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border-radius: 12px;
      border: 1px solid #ffc0cb;
      box-shadow: 0 2px 6px rgba(255,182,193,0.4);
      font-size: 18px;
      transition: all 0.3s ease;
    }

    textarea:focus, input:focus {
      outline: none;
      border-color: #d63384;
      box-shadow: 0 0 10px rgba(214,51,132,0.4);
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 50px;
      background: linear-gradient(90deg, #ff69b4, #ffc0cb);
      font-size: 20px;
      cursor: pointer;
      color: #fff;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    button:hover {
      background: linear-gradient(90deg, #d63384, #ff69b4);
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    }

    .message {
      margin-top: 20px;
      font-size: 18px;
      color: #a64d79;
      font-weight: bold;
      animation: fadeInUp 1.5s ease;
    }

    /* الحركات */
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @keyframes fadeInUp {
      from {transform: translateY(20px); opacity: 0;}
      to {transform: translateY(0); opacity: 1;}
    }

    @keyframes headerGlow {
      from {box-shadow: inset 0 0 20px rgba(255,182,193,0.6);}
      to {box-shadow: inset 0 0 40px rgba(255,105,180,0.8);}
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">👑 Top Sisters</div>
    <nav>
      <a href="customer.php">🏠 Home</a>
      <a href="roles.php">📜 Rules</a>
      <a href="coments.php">💬 Comments</a>
      <a href="contact.php">📞 Contact</a>
      <a href="ourwork.php">📸 Our Work</a>
      <a href="location.php">📍 Location</a>
    </nav>
  </header>

  <div class="comment-box">
    <h2>💬 رأيك بهمنا شاركينا ملاحظاتك بكل حب</h2>
    <form method="POST" action="addcoments.php">
      <input type="hidden" name="department" value="us">
      <input type="text" name="customer_name" placeholder="اسمك الكامل (اختياري)">
      <textarea name="comment_text" placeholder="اكتبي تعليقك هنا..." required></textarea>
      <button type="submit">💬 إرسال التعليق</button>
    </form>

    <?php if(isset($_GET['success'])) { ?>
      <div class="message">نشكرك من القلب على مشاركتك💕 نطّلع على جميع الملاحظات ونسعى دائمًا للتطوير بما يليق بكِ.💗</div>
    <?php } ?>
  </div>
</body>
</html>
