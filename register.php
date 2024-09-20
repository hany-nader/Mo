<?php
$dsn = 'sqlite:users.db';
$db = new PDO($dsn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo "البريد الإلكتروني مسجل بالفعل!";
    } else {
        $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $password]);
        echo "تم إنشاء الحساب بنجاح!";
        header('Location: login.html');
    }
}
?>
