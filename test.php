<?php
// جلب المتغيرات من Render (لازم تكوني ضايفة هاي القيم في Environment Variables)
$sid    = getenv("TWILIO_SID");
$token  = getenv("TWILIO_AUTH");
$from   = "whatsapp:" . getenv("WHATSAPP_FROM");

// استقبال البيانات من InfinityFree
$input = json_decode(file_get_contents("php://input"), true);
$name    = $input["name"] ?? "زبونة";
$service = $input["service"] ?? "خدمة";
$time    = $input["time"] ?? "وقت غير محدد";

// الرقم المستهدف من الرابط (?to=...)
$to = $_GET["to"] ?? null;

if ($to) {
    $data = http_build_query([
        "From" => $from,
        "To"   => "whatsapp:" . $to,
        "Body" => "📢 حجز جديد: $name حجز $service الساعة $time"
    ]);

    $ch = curl_init("https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json");
    curl_setopt($ch, CURLOPT_USERPWD, "$sid:$token");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        echo "❌ خطأ في الاتصال بـ Twilio: " . $error;
    } else {
        echo "✅ تم إرسال الإشعار: " . $response;
    }
} else {
    echo "❌ لم يتم تحديد رقم القسم";
}
?>
