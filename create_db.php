<?php
$dsn = 'sqlite:users.db';
$db = new PDO($dsn);
$db->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        phone TEXT,
        address TEXT
    );
");
echo "تم إنشاء قاعدة البيانات بنجاح!";
?>
