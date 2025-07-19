<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

$filename = 'credentials.php';
include($filename);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_user = $_POST['username'];
    $new_pass = $_POST['password'];
    file_put_contents($filename, "<?php\n$username = '$new_user';\n$password = '$new_pass';\n?>");
    $message = "تم تحديث البيانات بنجاح";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات الدخول</title>
</head>
<body>
    <h2>تعديل اسم المستخدم وكلمة السر</h2>
    <?php if (isset($message)) echo "<p style='color:green;'>$message</p>"; ?>
    <form method="post">
        <label>اسم المستخدم الجديد: <input type="text" name="username" required value="<?php echo $username; ?>"></label><br><br>
        <label>كلمة السر الجديدة: <input type="text" name="password" required value="<?php echo $password; ?>"></label><br><br>
        <button type="submit">تحديث</button>
    </form>
    <p><a href="dashboard.php">الرجوع للوحة التحكم</a></p>
</body>
</html>
