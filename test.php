<?php
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

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
    try {
        $twilio = new Client($sid, $token);
        $twilio->messages->create(
            "whatsapp:" . $to,
            [
                "from" => $from,
                "body" => "📢 حجز جديد: $name حجز $service الساعة $time"
            ]
        );
        echo "✅ تم إرسال الإشعار بنجاح";
    } catch (Exception $e) {
        echo "❌ خطأ في إرسال الإشعار: " . $e->getMessage();
    }
} else {
    echo "❌ لم يتم تحديد رقم القسم";
}

