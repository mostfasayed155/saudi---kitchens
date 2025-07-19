<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head><meta charset="UTF-8"><title>لوحة التحكم</title></head>
<body>
<h2>أهلاً بك في لوحة التحكم يا مصطفى</h2>
<p>هنا تقدر تتحكم في الموقع</p>
<ul>
  <li><a href="#">إضافة صورة</a></li>
  <li><a href="#">إضافة فيديو</a></li>
  <li><a href="#">تعديل البيانات</a></li>
  <li><a href="logout.php">تسجيل الخروج</a></li>
</ul>
</body>
</html>