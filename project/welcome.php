<?php
session_start();

// إذا لم يتم تسجيل الدخول، إعادة التوجيه إلى صفحة تسجيل الدخول
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome  <?= htmlspecialchars($user['name'] ?? 'Guest') ?>!</h1>
        <table>
            <tr>
                <th>Name:</th>
                <td><?= htmlspecialchars($user['name'] ?? 'Not provided') ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?= htmlspecialchars($user['phone'] ?? 'Not provided') ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?= htmlspecialchars($user['email'] ?? 'Not provided') ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?= htmlspecialchars($user['gender'] ?? 'Not provided') ?></td>
            </tr>
        </table>
        <p>We are glad to have you on board!</p>
    </div>
</body>
</html>
