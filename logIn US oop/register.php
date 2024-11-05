<?php
include ('Database.php');
include ('User.php');

session_start(); // بدء الجلسة

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isset($_POST['registration'])) {
    $user->first_name = $_POST['FName'];
    $user->last_name = $_POST['Lname'];
    $user->email = $_POST['Email'];
    $user->password = $_POST['pws'];
    $user->address = $_POST['Add'];
    $user->phone_number = $_POST['Phone'];
    $user->dob = $_POST['dob'];

    // تحقق من تطابق كلمة المرور
    if ($_POST['pws'] !== $_POST['pwer']) {
        $_SESSION['error'] = "كلمة المرور وتأكيد كلمة المرور لا تتطابق.";
    } else {
        // حاول تسجيل المستخدم
        $registrationResult = $user->register();
        
        if (strpos($registrationResult, 'تم تسجيل الحساب بنجاح') !== false) {
            // إذا كان التسجيل ناجحًا، أعد توجيه المستخدم
            header("Location: TT.php");
            exit();
        } else {
            // إذا كان هناك خطأ، قم بتخزين رسالة الخطأ في الجلسة
            $_SESSION['error'] = $registrationResult;
        }
    }
}

// تحقق من وجود رسالة خطأ في الجلسة وعرضها
if (isset($_SESSION['error'])) {
    echo '<div style="color: red;">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // قم بإزالة الرسالة بعد عرضها
}
?>
