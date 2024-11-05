<?php
include ('Database.php');
include ('User.php');

session_start(); // بدء الجلسة

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // حاول تسجيل الدخول
    $loginResult = $user->login($email, $password);
    
    if (strpos($loginResult, 'تسجيل دخول ناجح') !== false) {
        // إذا كان تسجيل الدخول ناجحًا، يمكنك إعادة توجيه المستخدم إلى الصفحة المطلوبة
        header("Location: TT2.php");
        exit();
    } else {
        // إذا كان هناك خطأ، قم بتخزين رسالة الخطأ في الجلسة
        $_SESSION['error'] = $loginResult;
    }
}

// تحقق من وجود رسالة خطأ في الجلسة وعرضها
if (isset($_SESSION['error'])) {
    echo '<div style="color: red;">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // قم بإزالة الرسالة بعد عرضها
}
?>
