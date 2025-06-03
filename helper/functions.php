<?php

function view($viewPath, $data = []) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $viewFile = __DIR__ . '/../views/' . ltrim($viewPath, '/');
    
    if (!file_exists($viewFile)) {
        throw new Exception("View file not found: {$viewFile}");
    }

    $data['session_error'] = $_SESSION['error'] ?? null;
    $data['session_success'] = $_SESSION['success'] ?? null;
    
    unset($_SESSION['error']);
    unset($_SESSION['success']);


    extract($data); // حالا $session_error و $session_success هم در ویو در دسترس هستند
    ob_start();
    require $viewFile;
    $content = ob_get_clean();
    
    // بررسی وجود فایل layout
    $layoutFile = __DIR__ . '/../views/layout.php';
    if (file_exists($layoutFile)) {
        
        include $layoutFile;
    } else {
        echo $content; // اگر layout نیست، فقط محتوای ویو را نمایش می‌دهیم
    }
}

function redirect($path) {
    // 3. **این بلوک کد جدید را اضافه کنید:**
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    header("Location: $path");
    exit(); // این خط حیاتی است
}

