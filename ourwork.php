<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>Our Work - Top Sisters</title>
  <style>
  body {
  margin: 0;
  font-family: 'Lateef', 'Amiri', serif;
  background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 90px; /* مسافة تحت الهيدر */
  box-sizing: border-box;
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

/* عنوان الصفحة */
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

/* قسم الأعمال */
.work-section {
  margin: 50px auto;
  width: 90%;
  max-width: 1200px;
  text-align: center;
}

.work-section h2 {
  font-size: 28px;
  color: #902b6d;
  margin-bottom: 25px;
}

/* معرض الصور */
.gallery {
  display: flex;
  justify-content: center;
  gap: 25px;
  flex-wrap: wrap;
}

.gallery img {
  width: 220px;
  height: 220px;
  border-radius: 20px;
  box-shadow: 0 0 20px rgba(255,105,180,0.5);
  transition: 0.3s;
}

.gallery img:hover {
  transform: scale(1.05);
  box-shadow: 0 0 30px rgba(255,20,147,0.7);
}

/* نص وروابط السوشال */
.social-text {
  margin-top: 20px;
  font-size: 18px;
  color: #333;
}

.social-links {
  display: flex;
  justify-content: center;
  gap: 30px;
  margin-top: 20px;
}

.social-btn {
  text-decoration: none;
  font-size: 18px;
  font-weight: bold;
  padding: 12px 25px;
  border-radius: 25px;
  color: #fff;
  transition: 0.3s;
}

.social-btn.fb {
  background: #3b5998;
}

.social-btn.insta {
  background: linear-gradient(45deg, #feda75, #fa7e1e, #d62976, #962fbf, #4f5bd5);
}

.social-btn:hover {
  transform: scale(1.1);
  box-shadow: 0 0 20px rgba(255,105,180,0.7);
}

/* استجابة للشاشات الصغيرة */
@media (max-width: 768px) {
  header { flex-direction: column; text-align: center; padding: 10px; }
  nav { flex-direction: column; gap: 15px; margin-top: 10px; }
  .gallery img { width: 160px; height: 160px; }
  .page-title h1 { font-size: 28px; padding: 10px 25px; }
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
      <a href="ourwork.php">📸 our work</a>
      <a href="location.php">📍 Location</a>
    </nav>
  </header>

  <!-- عنوان الصفحة -->
  <section class="page-title">
    <h1>Our Work 💖✨</h1>
  </section>

  <!-- قسم البشرة -->
  <section class="work-section">
    <h2>قسم البشرة 🌸</h2>
    <div class="gallery">
      <img src="بشره صوره.jpg" alt="Skin Work">
      <img src="بشره صوره2.jpg" alt="Skin Work">
      <img src="بشره صوره3.jpg" alt="Skin Work">
      <img src="قفع رموش.jpg" alt="Skin Work">
    </div>
    <p class="social-text">للمزيد من أعمالنا وآراء زبوناتنا، زوروا حساباتنا ✨</p>
    <div class="social-links">
      <a href="https://www.facebook.com/share/1CS1pQbSJ2/?mibextid=wwXIfr" target="_blank" class="social-btn fb">📘 فيسبوك</a>
      <a href="https://www.instagram.com/larayahya_?igsh=MXIwZjQ0NG00NDY3eg==" target="_blank" class="social-btn insta">📸 إنستغرام</a>
    </div>
  </section>

  <!-- قسم الأظافر -->
  <section class="work-section">
    <h2>قسم الأظافر 💅</h2>
    <div class="gallery">
      <img src="اضافر صوره.jpg" alt="Nails Work">
      <img src="اضافر صوره 1.jpg" alt="Nails Work">
      <img src="اضافرصوره3.jpg" alt="Nails Work">
      <img src="اضافر صوره 2.jpg" alt="Nails Work">
    </div>
    <p class="social-text">للمزيد من أعمالنا وآراء زبوناتنا، زوروا حساباتنا ✨</p>
    <div class="social-links">
      <a href="https://www.facebook.com/share/1CFL95ockf/?mibextid=wwXIfr" target="_blank" class="social-btn fb">📘 فيسبوك</a>
      <a href="https://www.instagram.com/shahd.nails.26?igsh=MXIybjFtaHlwMzVxcg%3D%3D&utm_source=qr" target="_blank" class="social-btn insta">📸 إنستغرام</a>
    </div>
  </section>

  <!-- قسم البديكير -->
  <section class="work-section">
    <h2>قسم البديكير 🦶✨</h2>
    <div class="gallery">
      <img src="هههههههههههههااا.jpg" alt="Pedicure Work">
      <img src="بدكير بعد.jpg" alt="Pedicure Work">
      <img src="بدد.jpg" alt="Pedicure Work">
      <img src="مناكير رجلين 2.jpg" alt="Pedicure Work">
    </div>
   <p class="social-text">للمزيد من أعمالنا وآراء زبوناتنا، زوروا حساباتنا ✨</p>
    <div class="social-links">
      <a href="https://www.facebook.com/share/1BHvBMW6mL/?mibextid=wwXIfr" target="_blank" class="social-btn fb">📘 فيسبوك</a>
      <a href="https://www.instagram.com/konz_bedkir_?igsh=MXBuMzNweWxkMHh2eA==" target="_blank" class="social-btn insta">📸 إنستغرام</a>
    </div>
  </section>
</body>
</html>
