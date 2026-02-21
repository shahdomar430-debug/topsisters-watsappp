<?php
$conn = new mysqli("sql208.infinityfree.com", "if0_41150950", "123456789MASa", "if0_41150950_topsisters");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$customer_name = !empty($_POST['customer_name']) ? $_POST['customer_name'] : "مجهول";
$comment_text = $_POST['comment_text'];
$department = isset($_POST['department']) ? $_POST['department'] : "us";

$sql = "INSERT INTO comments (customer_name, comment_text, department) 
        VALUES ('$customer_name', '$comment_text', '$department')";
        

if ($conn->query($sql) === TRUE) {
    header("Location: coments.php?success=1");
    exit();
} else {
    die("خطأ في حفظ التعليق: " . $conn->error);
}
?>
