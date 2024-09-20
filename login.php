<?php
$dsn = 'sqlite:users.db';
$db = new PDO($dsn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        echo "تسجيل الدخول ناجح!";
        header('Location: home.html');
    } else {
        echo "البريد الإلكتروني أو كلمة المرور غير صحيحة!";
    }
}
?>
