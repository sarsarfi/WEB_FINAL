<?php
namespace App\Controller;

use App\Model\User;

class AuthController
{
    public static function login()
    {
        if (self::isLoggedIn()) {
            redirect('/webfinal/home'); // تغییر مسیر: اگر لاگین بود، به home برود
        }
        view('login.php');
    }

    public static function register()
    {
        if (self::isLoggedIn()) {
            redirect('/webfinal/home'); // تغییر مسیر: اگر لاگین بود، به home برود
        }
        view('register.php');
    }

    public static function storeUser()
    {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = 'لطفا تمام فیلدها را پر کنید';
            redirect('/webfinal/register');
            return;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'فرمت ایمیل نامعتبر است';
            redirect('/webfinal/register');
            return;
        }

        if (User::where('email', $_POST['email'])->exists()) {
            $_SESSION['error'] = 'این ایمیل قبلا ثبت شده است';
            redirect('/webfinal/register');
            return;
        }

        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        if (!$hashedPassword) {
            $_SESSION['error'] = 'خطا در ایجاد رمز عبور';
            redirect('/webfinal/register');
            return;
        }

        $user = User::create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $hashedPassword
        ]);

        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['success'] = 'ثبت‌نام با موفقیت انجام شد';

        redirect('/webfinal/home'); // **اصلاح مسیر ریدایرکت پس از ثبت نام موفق**
    }

     public static function loginUser()
    {
        // اعتبارسنجی ورودی‌ها
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = 'لطفا ایمیل و رمز عبور را وارد کنید';
            redirect('/webfinal/login');
            return;
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // --- شروع کدهای دیباگ ---
        error_log("Attempting login for email: " . $email); // ثبت در لاگ سرور
        
        $user = User::where('email', $email)->first();

        if (!$user) {
            error_log("User not found for email: " . $email); // ثبت در لاگ سرور
            $_SESSION['error'] = 'کاربری با این ایمیل یافت نشد';
            redirect('/webfinal/login');
            return;
        }

        // اگر کاربر پیدا شد، ادامه دیباگ
        error_log("User found. Checking password for user ID: " . $user->id); // ثبت در لاگ سرور
        
        $passwordMatches = password_verify($password, $user->password);
        
        error_log("Password verification result: " . ($passwordMatches ? "TRUE" : "FALSE")); // ثبت در لاگ سرور
        // --- پایان کدهای دیباگ ---

        if (!$passwordMatches) { // حالا از متغیر passwordMatches استفاده می‌کنیم
            $_SESSION['error'] = 'رمز عبور نادرست است';
            redirect('/webfinal/login');
            return;
        }

        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        
        $_SESSION['success'] = 'با موفقیت وارد شدید';
        redirect('/webfinal/home');
    }

    private static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        redirect('/webfinal/login');
    }
}