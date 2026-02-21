<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>📍 موقع المركز - Top Sisters</title>
  <style>
body {
  margin: 0;
  font-family: 'Lateef', 'Amiri', serif;
  background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding-top: 90px; /* مسافة تحت الهيدر */
  overflow-x: hidden;
  font-size: 22px;
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
  padding: 6px 12px;
  border-radius: 12px;
}

nav a:hover {
  color: #ff1493;
  background: rgba(255,182,193,0.3);
  box-shadow: 0 0 12px rgba(255,105,180,0.7);
  transform: scale(1.1);
}

/* قسم الخريطة */
.map-section {
  margin-top: 50px;
  text-align: center;
  background: #fff;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 35px rgba(255,105,180,0.4);
  width: 90%;
  max-width: 900px;
  animation: fadeIn 1.5s ease;
}

.map-section h2 {
  color: #a64d79;
  text-shadow: 0 0 12px #ff69b4, 0 0 20px #ffc0cb;
  margin-bottom: 15px;
  font-size: 26px;
}

.map-section p {
  font-size: 20px;
  font-weight: bold;
  color: #4a4a4a;
  margin-bottom: 25px;
}

iframe {
  border: 0;
  border-radius: 15px;
  box-shadow: 0 0 25px rgba(255,105,180,0.4);
  width: 100%;
  height: 500px;
}

/* حركة الظهور */
@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

/* استجابة للشاشات الصغيرة */
@media (max-width: 768px) {
  header { flex-direction: column; text-align: center; padding: 10px; }
  nav { flex-direction: column; gap: 15px; margin-top: 10px; }
  .map-section { width: 95%; }
  iframe { height: 350px; }
}

  </style>
</head>
<body>
  <header>
    <div class="logo">👑 Top Sisters</div>
    <nav>
      <a href="customer.php">🏠 Home</a>
      <a href="roles.php">📜rules</a>
      <a href="coments.php">💬 Comments</a>
      <a href="contact.php">📞 Contact</a>
      <a href="ourwork.php">📸 our work</a>
      <a href="location.php">📍 Location</a>
    </nav>
  </header>

  <div class="map-section">
    <h2>📍 موقع المركز</h2>
    <p>العنوان:
        طولكرم:
        كفرجمال :الشارع الرئيسي(شارع جيوس) تحت صالون القمه بجانب صالة الماسه
    </p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d383.57138146697736!2d35.0464714183675!3d32.22435277911014!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1770665960772!5m2!1sen!2sus" width="800" height="800" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</body>
</html>
