<?php
require 'pdo.php'; // تضمين ملف الاتصال بـ PDO

$errors = ['email' => '', 'password' => ''];
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (!array_filter($errors)) {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: welcome.php");
                exit;
            } else {
                $errors['password'] = "Incorrect password!";
            }
        } else {
            $errors['email'] = "Email not registered!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                <span class="error"><?= $errors['email'] ?></span>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error"><?= $errors['password'] ?></span>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
