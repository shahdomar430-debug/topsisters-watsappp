<?php 
session_start();
$conn = new mysqli("sql208.infinityfree.com", "if0_41150950", "123456789MASa", "if0_41150950_topsisters");
if ($conn->connect_error) { die("فشل الاتصال: " . $conn->connect_error); } 
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("Location: us.php"); exit(); 
    } else { 
        $error = "❌ اسم المستخدم أو كلمة المرور غير صحيحة"; 
    } 
} 
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تسجيل دخول المسؤول</title>
  <style>
  body {
  margin: 0;
  padding: 0;
  font-family: 'Lateef', 'Amiri', serif;
  min-height: 100vh;
  background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  box-sizing: border-box;
  padding-top: 100px; /* مسافة تحت الهيدر */
}

/* الهيدر */
header {
  width: 100%;
  background: linear-gradient(90deg, #ffc0cb, #fff, #ffe4ec);
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  font-size: 32px;
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

/* صندوق تسجيل الدخول */
.login-box {
  margin: 60px auto;
  background: rgba(255, 255, 255, 0.95);
  padding: 40px;
  border-radius: 25px;
  text-align: center;
  box-shadow: 0 10px 25px rgba(255,105,180,0.4);
  width: 90%;
  max-width: 500px;
  animation: fadeIn 1s ease;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(-30px);}
  to {opacity: 1; transform: translateY(0);}
}

.login-box h1 {
  font-size: 28px;
  margin-bottom: 25px;
  color: #a64d79;
  text-shadow: 0 0 10px rgba(255, 182, 193, 0.8);
}

/* الحقول */
.login-box input {
  width: 100%;
  padding: 12px;
  margin: 12px 0;
  border: none;
  border-radius: 12px;
  font-size: 18px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: 0.3s;
}

.login-box input:focus {
  outline: none;
  box-shadow: 0 0 12px rgba(255,105,180,0.7);
}

/* زر الدخول */
.login-box button {
  margin-top: 20px;
  padding: 12px 30px;
  font-size: 20px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  background: linear-gradient(90deg, #ff69b4, #ffc0cb);
  color: #fff;
  font-weight: bold;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(255,105,180,0.4);
}

.login-box button:hover {
  background: linear-gradient(90deg, #ff1493, #ff69b4);
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(255,105,180,0.8);
}

/* استجابة للشاشات الصغيرة */
@media (max-width: 768px) {
  header { font-size: 24px; padding: 15px; }
  .login-box { width: 95%; padding: 25px; }
  .login-box h1 { font-size: 24px; }
  .login-box input { font-size: 16px; }
  .login-box button { font-size: 18px; }
}

  </style>
</head>
<body>
  <header>
    <div>صفحة تسجيل الدخول - Top Sisters</div>
    <a href="index.php" class="back-button">⬅️ رجوع</a>
  </header>

  <div class="login-box">
    <h1>🔑 تسجيل دخول المسؤول</h1>
    <form method="POST" action="login.php">
      <input type="text" name="username" placeholder="اسم المستخدم" required>
      <input type="password" name="password" placeholder="كلمة المرور" required>
      <button type="submit">دخول</button>
    </form>
    <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
  </div>
</body>
</html>
