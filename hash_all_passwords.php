<?php
define('ROOT_PATH', __DIR__);

require ROOT_PATH . '/vendor/autoload.php';
require_once(ROOT_PATH . '/helper/functions.php'); // برای تابع redirect و view اگر نیاز باشد

// استفاده از Eloquent
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Model\User; // مطمئن شوید که مدل User را use کرده‌اید

echo "Starting password hashing process...\n";

try {
    // اتصال دیتابیس (همانند index.php)
    $config = require_once ROOT_PATH . '/config/database.php';
    $capsule = new Capsule;
    $capsule->addConnection($config);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    echo "Database connection established.\n";

    // واکشی تمام کاربران
    $users = User::all();
    $hashedCount = 0;

    if ($users->isEmpty()) {
        echo "No users found in the database. Exiting.\n";
    } else {
        echo "Found " . count($users) . " users. Processing...\n";
        foreach ($users as $user) {
                       if (!empty($user->password)) {
                // هش کردن رمز عبور با PASSWORD_BCRYPT
                $hashedPassword = password_hash($user->password, PASSWORD_BCRYPT);

                if ($hashedPassword) {
                    // به‌روزرسانی رمز عبور کاربر در دیتابیس
                    $user->password = $hashedPassword;
                    $user->save(); // ذخیره تغییرات
                    $hashedCount++;
                    echo "User ID: " . $user->id . " - Email: " . $user->email . " password hashed successfully.\n";
                } else {
                    echo "Failed to hash password for user ID: " . $user->id . " - Email: " . $user->email . "\n";
                }
            } else {
                echo "User ID: " . $user->id . " - Email: " . $user->email . " has an empty password. Skipping.\n";
            }
        }
        echo "Finished. " . $hashedCount . " passwords hashed and updated.\n";
    }

} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile() . "\n";
}

echo "Script finished.\n";
?>