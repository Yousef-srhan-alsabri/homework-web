<?php
$host = 'localhost';
$dbname = 'testdb';
$username = 'root';
$password = '';


try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    // إعدادات إضافية للاتصال
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "تم الاتصال بنجاح بقاعدة البيانات!".'<br/>';
} catch (PDOException $e) {
    // معالجة الأخطاء
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>
<?php
try {
    $stmt = $pdo->query("SELECT * FROM user");
    while ($row = $stmt->fetch()) {
        echo $row['id'].' ||| ' .$row['email'].' ||| ' .$row['name'].' ||| ' .$row['password'] . "<br/>";
    }
} catch (PDOException $e) {
    echo "خطأ أثناء استرجاع البيانات: " . $e->getMessage().'<br/>';
}
?>
