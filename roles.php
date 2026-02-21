<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  
  <title>صفحة القواعد - Top Sisters</title>
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
  font-size: 22px;
}

/* الهيدر */
header {
  width: 100%;
  background: linear-gradient(90deg, #ffc0cb, #fff, #ffe4ec);
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
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

/* المقدمة */
.intro {
  margin: 30px;
  font-size: 20px;
  color: #6a1b9a;
  text-align: center;
  max-width: 700px;
  line-height: 1.8;
  background: rgba(255,182,193,0.25);
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 0 15px rgba(255,105,180,0.3);
  animation: fadeIn 1.5s ease;
}

/* قائمة القواعد */
ul {
  list-style: none;
  padding: 0;
  margin: 20px auto;
  max-width: 700px;
  text-align: right;
}

ul li {
  background: #fff;
  margin: 12px 0;
  padding: 18px;
  border-radius: 14px;
  font-size: 18px;
  line-height: 1.9;
  color: #333;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  transition: 0.3s;
}

ul li:hover {
  transform: scale(1.02);
  box-shadow: 0 4px 12px rgba(255,105,180,0.4);
}

/* زر العودة */
.button {
  display: inline-block;
  margin: 40px auto;
  padding: 14px 30px;
  background: linear-gradient(90deg, #ff69b4, #ffc0cb);
  color: #fff;
  text-decoration: none;
  border-radius: 50px;
  font-size: 20px;
  transition: 0.3s;
  font-weight: bold;
  box-shadow: 0 0 15px rgba(255,105,180,0.5);
}

.button:hover {
  background: linear-gradient(90deg, #ff1493, #ff69b4);
  box-shadow: 0 0 20px rgba(255,105,180,0.8);
  transform: scale(1.05);
}

/* حركة الظهور */
@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

/* استجابة للشاشات الصغيرة */
@media (max-width: 768px) {
  body { font-size: 20px; }
  header { font-size: 24px; }
  .intro { font-size: 18px; }
  ul li { font-size: 16px; }
  .button { font-size: 18px; }
}

  </style>
</head>
<body>

 <header>
   <div>صفحة القواعد - Top Sisters</div>
   
 </header>

  <div class="intro">
    نرجو من زبوناتنا العزيزات قراءة هذه القواعد بعناية والالتزام بها، فهي وضعت لتضمن للجميع تجربة راقية ومريحة داخل مركز Top Sisters.
  </div>

  <ul>
    <li>نرجو من زبوناتنا العزيزات عدم اصطحاب الأطفال داخل المركز، حفاظًا على أجواء الراحة والهدوء.</li>
    <li>الالتزام بمواعيد الحجز أمر أساسي، وفي حال التأخير لأكثر من نصف ساعة يُعتبر الحجز ملغى تلقائيًا.</li>
    <li>نحرص دائمًا على نظافة ورقي المكان، ونرجو من الجميع المساهمة في الحفاظ على هذه الأجواء.</li>
    <li>لضمان تجربة مريحة للجميع، نرجو الحفاظ على الهدوء داخل المركز وتجنب الأصوات العالية.</li>
    <li>الدفع يتم في نفس يوم الخدمة، ونعتذر عن عدم إمكانية تأجيل الحساب.</li>
    <li>الخدمات تُقدَّم بالحجز المسبق فقط، وذلك لتفادي الازدحام وضمان أفضل خدمة.</li>
    <li>في حال الرغبة بإلغاء الحجز، نرجو إبلاغنا قبل 24 ساعة على الأقل.</li>
    <li>نؤمن أن الاحترام أساس التعامل، لذا نرجو من الجميع الحفاظ على أسلوب راقٍ مع الموظفات والزبونات.</li>
    <li>نعتذر عن إدخال المأكولات والمشروبات داخل المركز، حفاظًا على نظافة المكان وراحته.</li>
  </ul>

  <a href="customer.php" class="button">✨ ادخلي لعالم Top Sisters ✨</a>

</body>
</html>
