<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>Contact - Top Sisters</title>
  <style>
    body {
      margin: 0;
      font-family: 'Lateef', 'Amiri', serif;
      background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* الهيدر الموحد */
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

    /* صندوق التواصل */
    .contact-box {
      margin-top: 180px;
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(255,105,180,0.3);
      width: 90%;
      max-width: 600px;
      text-align: center;
      animation: fadeIn 1.5s ease;
    }

    .contact-box h2 {
      margin-bottom: 25px;
      color: #d63384;
      font-size: 26px;
      font-weight: bold;
      text-shadow: 0 0 8px #ffc0cb;
    }

    .contact-option {
      margin: 20px 0;
      font-size: 22px;
    }

    .contact-option a {
      display: inline-block;
      text-decoration: none;
      color: #fff;
      background: linear-gradient(135deg, #ff69b4, #d63384);
      padding: 12px 25px;
      border-radius: 30px;
      font-weight: bold;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .contact-option a:hover {
      background: linear-gradient(135deg, #d63384, #ff69b4);
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    }

    /* الحركات */
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @keyframes headerGlow {
      from {box-shadow: inset 0 0 20px rgba(255,182,193,0.6);}
      to {box-shadow: inset 0 0 40px rgba(255,105,180,0.8);}
    }

    /* استجابة للشاشات الصغيرة */
    @media (max-width: 768px) {
      header { flex-direction: column; text-align: center; padding: 10px; }
      nav { flex-direction: column; gap: 15px; margin-top: 10px; }
      .contact-box { width: 95%; margin-top: 150px; }
      .contact-option a { width: 100%; font-size: 18px; }
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

  <div class="contact-box">
    <h2>📞 تواصلي معنا عبر واتساب</h2>
    <div class="contact-option">
      <a href="https://wa.me/970594158977" target="_blank">🌸 حجز البشرة</a>
    </div>
    <div class="contact-option">
      <a href="https://wa.me/970594919652" target="_blank">💅 حجز الأظافر</a>
    </div>
    <div class="contact-option">
      <a href="https://wa.me/970567341217" target="_blank">🦶 حجز الباديكير</a>
    </div>
  </div>
</body>
</html>
