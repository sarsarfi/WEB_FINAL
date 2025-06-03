<?php
namespace App\Controller;

use App\Model\Post; // مطمئن شوید که مدل Post را use کرده‌اید
use App\Model\User; // اگر نیاز به User دارید

class PostController
{
    public function create()
    {
        // نمایش فرم ایجاد پست
        view('create_post.php');
    }

    public function store()
    {
        // --- شروع کدهای دیباگ ---
        error_log("Attempting to store a new post.");
        error_log("POST data received: " . print_r($_POST, true));
        error_log("User ID from session: " . ($_SESSION['user_id'] ?? 'Not set'));
        // --- پایان کدهای دیباگ ---

        // 1. اعتبارسنجی ورودی‌ها
        if (empty($_POST['title']) || empty($_POST['content'])) {
            $_SESSION['error'] = 'لطفا عنوان و محتوای پست را پر کنید.';
            redirect('/webfinal/posts/create');
            return;
        }

        // 2. بررسی لاگین بودن کاربر
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = 'برای ارسال پست باید وارد شوید.';
            redirect('/webfinal/login');
            return;
        }

        try {
            // 3. ایجاد پست جدید
            $post = Post::create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_SESSION['user_id'], // اطمینان از وجود user_id در سشن
            ]);

            // --- شروع کدهای دیباگ ---
            if ($post) {
                error_log("Post created successfully with ID: " . $post->id);
                $_SESSION['success'] = 'پست شما با موفقیت ارسال شد.';
                redirect('/webfinal/posts'); // ریدایرکت به صفحه لیست پست‌ها
            } else {
                error_log("Failed to create post. Post object is null.");
                $_SESSION['error'] = 'خطا در ارسال پست. لطفا دوباره تلاش کنید.';
                redirect('/webfinal/posts/create');
            }
            // --- پایان کدهای دیباگ ---

        } catch (\Exception $e) {
            // --- شروع کدهای دیباگ: گرفتن استثنائات ---
            error_log("Exception caught during post creation: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
            $_SESSION['error'] = 'خطا در ارسال پست: ' . $e->getMessage();
            redirect('/webfinal/posts/create');
            // --- پایان کدهای دیباگ ---
            return;
        }
    }
}