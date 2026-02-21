

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>Top Sisters</title>
  <style>
body {
  margin: 0;
  font-family: 'Lateef', 'Amiri', serif;
  background: linear-gradient(135deg, #ffe4ec, #fff, #ffc0cb);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 18px;
}

/* الهيدر */
header {
  width: 100%;
  background: linear-gradient(90deg, #ffc0cb, #fff, #ffe4ec);
  padding: 15px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 4px 20px rgba(255,182,193,0.5);
  border-bottom: 3px solid rgba(255,105,180,0.4);
  animation: headerGlow 6s infinite alternate;
  font-size: 22px;
}

@keyframes headerGlow {
  0% { box-shadow: inset 0 0 25px rgba(255,182,193,0.6); }
  50% { box-shadow: inset 0 0 80px rgba(255,105,180,1); }
  100% { box-shadow: inset 0 0 40px rgba(255,182,193,0.7); }
}

.logo {
  font-size: 26px;
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
  padding: 6px 12px;
  border-radius: 12px;
}

nav a:hover {
  color: #ff1493;
  background: rgba(255,182,193,0.3);
  box-shadow: 0 0 12px rgba(255,105,180,0.7);
  transform: scale(1.1);
}

/* الخدمات */
.services {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
  margin-top: 120px;
}

.service {
  text-align: center;
  background: #fff;
  padding: 20px;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(255,105,180,0.3);
  transition: 0.4s;
}

.service:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 35px rgba(255,105,180,0.5);
}

.service img {
  width: 220px;
  height: 220px;
  border-radius: 50%;
  object-fit: cover;
  box-shadow: 0 0 25px rgba(255,255,255,1);
  transition: 0.4s;
}

.service img:hover {
  transform: scale(1.1);
  box-shadow: 0 0 40px rgba(255,255,255,1),
              0 0 50px rgba(255,182,193,0.9);
}

.service p {
  margin-top: 12px;
  font-size: 22px;
  font-weight: bold;
  color: #902b6d;
}

/* صندوق الحجز */
.booking-box {
  margin: 60px auto;
  background: rgba(255,255,255,0.95);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 35px rgba(255,105,180,0.6);
  width: 90%;
  max-width: 700px;
  transition: 0.4s;
}

.booking-box:hover {
  transform: scale(1.02);
  box-shadow: 0 0 45px rgba(255,105,180,0.8);
}

.booking-box h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #a64d79;
  text-shadow: 0 0 12px #ff69b4, 0 0 20px #ffc0cb;
}

.booking-box input, 
.booking-box select, 
.booking-box textarea {
  width: 100%;
  padding: 12px;
  margin: 10px 0;
  border-radius: 10px;
  border: none;
  box-shadow: 0 2px 8px rgba(255,182,193,0.6);
  font-size: 18px;
}

/* زر تأكيد الحجز */
.booking-box button {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 50px;
  background: linear-gradient(90deg, #ff69b4, #ffc0cb);
  font-size: 20px;
  cursor: pointer;
  transition: 0.3s;
  color: #fff;
  font-weight: bold;
}

.booking-box button:hover {
  background: linear-gradient(90deg, #ff1493, #ff69b4);
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(255,105,180,0.8);
}

/* زر رفع الملف (يبقى كما هو) */
input[type="file"] { display: none; }

.custom-file-upload {
  display: inline-block;
  padding: 8px 18px;
  cursor: pointer;
  background: linear-gradient(90deg, #ff69b4, #ffc0cb);
  color: #fff;
  font-weight: bold;
  border-radius: 20px;
  font-size: 20px;
  transition: 0.3s;
  box-shadow: 0 0 10px rgba(255,105,180,0.5);
  margin-top: 30px;
  margin-bottom: 10px;
}

.custom-file-upload:hover {
  background: linear-gradient(90deg, #ff1493, #ff69b4);
  box-shadow: 0 0 15px rgba(255,105,180,0.7);
  transform: scale(1.05);
}

/* الإشعار وزر الإغلاق يبقوا كما كانوا (يغطي الشاشة كاملة) */
.notification {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  z-index: 9999;
  justify-content: center;
  align-items: center;
}

.notification-content {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  font-size: 18px;
  color: #333;
  box-shadow: 0 0 20px rgba(0,0,0,0.5);
}

.notification-content button {
  margin-top: 10px;
  padding: 8px 16px;
  border: none;
  border-radius: 20px;
  background: linear-gradient(90deg, #ff69b4, #ffc0cb);
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

.notification-content button:hover {
  background: linear-gradient(90deg, #ff1493, #ff69b4);
  transform: scale(1.05);
}

/* استجابة للشاشات الصغيرة */
@media (max-width: 768px) {
  header { flex-direction: column; text-align: center; padding: 10px; }
  nav { flex-direction: column; gap: 15px; margin-top: 10px; }
  .services { gap: 20px; }
  .service img { width: 160px; height: 160px; }
  .booking-box { width: 95%; }
}

  </style>


</head>
<body>
  <div id="toast"></div>
   <div id="notification" class="notification">
    <div class="notification-content">
     <span id="notification-message"></span>
     <button onclick="closeNotification()">إغلاق</button>
    </div>
  </div>


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

  <div class="container">
    <!-- الصور -->
    <section class="services">
      <div class="service">
        <a href="facial.php">
          <img src="بشره.jpg" alt="Facial">
        </a>
        <p>Facial</p>
      </div>
      <div class="service">
        <a href="nails.php">
          <img src="اضافر.jpg" alt="Nail Services">
        </a>
        <p>Nail Services</p>
      </div>
      <div class="service">
        <a href="pedicure.php">
          <img src="download.jpg" alt="Pedicure">
        </a>
        <p>Pedicure</p>
         </section>
      </div>
   

    <!-- المربع -->
   <div class="booking-box">
  <h2>احجزي موعدك</h2>
  <form id="bookingForm" enctype="multipart/form-data">
    <input type="text" name="customer_name" placeholder="اسم الزبونة" required>
    <input type="text" name="phone" placeholder="رقم الهاتف" required>

    <label for="booking_date">📅 التاريخ</label>
    <input type="date" id="booking_date" name="booking_date" required>

    <label for="booking_time">⏰ الوقت</label>
    <input type="time" id="booking_time" name="booking_time" required>

    <!-- الأقسام -->
   <select name="category_id" id="department" required>
  <option value="">-- اختاري القسم --</option>
  <option value="1">بشرة</option>
  <option value="2">أظافر</option>
  <option value="3">بديكير</option>
</select>


    <!-- الخدمات -->
    <select name="service" id="service" required>
      <option value="">-- اختاري الخدمة --</option>
    </select>

    <textarea name="notes" placeholder="ملاحظات"></textarea>
    <label for="image" class="custom-file-upload">📷 ارفعي صورة</label>
    <input type="file" name="image" id="image">

    <div class="button-group">
      <button type="submit">تأكيد الحجز</button>
    </div>
  </form>
</div>

<script>
  // دالة عرض الإشعار
  function showNotification(message, success=true) {
    const notification = document.getElementById("notification");
    const msg = document.getElementById("notification-message");
    msg.textContent = message;
    msg.style.color = success ? "#28a745" : "#dc3545"; // أخضر أو أحمر
    notification.style.display = "flex"; // يظهر فوق الشاشة
  }

  function closeNotification() {
    document.getElementById("notification").style.display = "none";
  }

  // إرسال الفورم مع شرط التحقق من الرقم
  document.getElementById("bookingForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    const phone = formData.get("phone");

    // الشرط: إما 10 أرقام محلية أو رقم دولي يبدأ بـ +972 أو +970
    const localRegex = /^[0-9]{10}$/;              // رقم محلي 10 أرقام
    const intlRegex = /^(\+972|\+970)[0-9]{6,}$/;  // رقم دولي يبدأ بـ +972 أو +970 ويكمل بأرقام

    if (!(localRegex.test(phone) || intlRegex.test(phone))) {
      showNotification("❌ رقم الهاتف غير صالح.", false);
      return; // إيقاف الإرسال نهائياً
    }

    // إذا الرقم صحيح فقط، نكمل ونرسل للسيرفر
    fetch("addbooking.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === "success") {
        showNotification(data.message, true);
        this.reset();
      } else {
        showNotification(data.message, false);
      }
    })
    .catch(error => {
      showNotification("❌ خطأ في الاتصال بالسيرفر", false);
    });
  });
</script>


<script>
  const servicesByDepartment = {
    1: [
      {id: 1, name: "جلسة ميزوثيرابي"},
      {id: 2, name: "جلسة هايدروفشل"},
      {id: 3, name: "جلسة تقشير الطحالب"},
      {id: 4, name: "جلسة نضارة"},
      {id: 5, name: "جلسة قفع الرموش"}
    ],
    2: [
      {id: 6, name: "جلسة تنظيف اللحمية"},
      {id: 7, name: "جلسة تنظيف اللحمية مع تقشير وترطيب"},
      {id: 8, name: "جلسة جل على أظافر طبيعي"},
      {id: 9, name: "جلسة جل مع تركيب"},
      {id: 10, name: "جلسة جل مع تركيب مدعم"},
      {id: 11, name: "جلسة جل روسي"},
      {id: 12, name: "جلسة اكستنشن"},
      {id: 13, name: "جلسة بولي جل"},
      {id: 14, name: "جلسة حناء الأظافر لون أسود"},
      {id: 15, name: "جلسة إزالة جل قديم مع تنظيف اللحمية"},
      {id: 16, name: "جلسة إزالة جل قديم بدون تنظيف اللحمية"},
      {id: 17, name: "جلسة البرافين لليدين"}
    ],
    3: [
      {id: 18, name: "جلسة البديكير"},
      {id: 19, name: "جلسة Foot Spa"},
      {id: 20, name: "جلسة تقشير الأقدام"},
      {id: 21, name: "جلسة الجل الطبيعي للأقدام"},
      {id: 22, name: "جلسة البرافين للأقدام"},
      {id: 23, name: "جلسة جل تركيب الأظافر للأقدام"},
      {id: 24, name: "جلسة إزالة الجل القديم للأقدام"},
      {id: 25, name: "جلسة تنظيف اللحمية وبرد الأظافر للأقدام"}
    ]
  };

  const departmentSelect = document.getElementById("department");
  const serviceSelect = document.getElementById("service");

  departmentSelect.addEventListener("change", function() {
    const selectedDept = this.value;
    serviceSelect.innerHTML = "<option value=''>-- اختاري الخدمة --</option>";
    if (servicesByDepartment[selectedDept]) {
      servicesByDepartment[selectedDept].forEach(service => {
        const option = document.createElement("option");
        option.value = service.id; // القيمة هي ID الخدمة
        option.textContent = service.name;
        serviceSelect.appendChild(option);
      });
    }
  });
</script>




</body>
</html> 