<?php
require 'pdo.php'; // تضمين ملف الاتصال بـ PDO

$errors = ['name' => '', 'phone' => '', 'email' => '', 'password' => '', 'confirm_password' => '', 'gender' => ''];
$name = $phone = $email = $password = $confirm_password = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $gender = $_POST['gender'];

    if (empty($name)) $errors['name'] = "Name is required.";
    if (empty($phone)) {
        $errors['phone'] = "Phone number is required.";
    } elseif (!preg_match('/^\d{9}$/', $phone)) {
        $errors['phone'] = "Phone number must be exactly 9 digits.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) $errors['password'] = "Password is required.";
    if (empty($confirm_password)) $errors['confirm_password'] = "Confirm password is required.";
    if ($password !== $confirm_password) $errors['confirm_password'] = "Passwords do not match.";
    if (empty($gender)) $errors['gender'] = "Gender is required.";

    if (!array_filter($errors)) {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $errors['email'] = "Email is already registered.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = 'INSERT INTO users (name, phone, email, password, gender) VALUES (?, ?, ?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $phone, $email, $hashed_password, $gender]);

            session_start();
            $_SESSION['user'] = ['name' => $name, 'email' => $email, 'gender' => $gender];
            header("Location: welcome.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
                <span class="error"><?= $errors['name'] ?></span>
            </div>
            <div class="input-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>">
                <span class="error"><?= $errors['phone'] ?></span>
            </div>
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
            <div class="input-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <span class="error"><?= $errors['confirm_password'] ?></span>
            </div>
            <div class="input-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="Male" <?= $gender === 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $gender === 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
                <span class="error"><?= $errors['gender'] ?></span>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
