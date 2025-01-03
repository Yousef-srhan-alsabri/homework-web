<?php
$host = "localhost";
$db = "signup_db";
$user = "root";
$pass = "";
$charset = 'utf8mb4';
try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\PDOException $e) {
    echo "CONNECTION FAILED: ". $E->GETMESSAGE();
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
