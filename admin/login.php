<?php
session_start();
include('credentials.php');

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];
    $captcha = $_POST['captcha'];

    if ($input_user === $username && $input_pass === $password && $captcha === 'saudi') {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit();
    } elseif ($captcha !== 'saudi') {
        $message = 'رمز التحقق غير صحيح.';
    } else {
        $message = 'تم التسجيل بنجاح. شكراً لك!';
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول</title>
</head>
<body>
    <h2>تسجيل دخول / تسجيل شكلي</h2>
    <?php if (!empty($message)) echo "<p style='color:red;'>$message</p>"; ?>
    <form method="post">
        <label>اسم المستخدم: <input type="text" name="username" required></label><br><br>
        <label>كلمة السر: <input type="password" name="password" required></label><br><br>
        <label>اكتب كلمة "saudi" للتحقق: <input type="text" name="captcha" required></label><br><br>
        <button type="submit">دخول</button>
    </form>
</body>
</html>
