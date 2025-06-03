<?php
session_start();

define('ROOT_PATH', __DIR__);

require ROOT_PATH . '/vendor/autoload.php';
require_once(ROOT_PATH . '/helper/functions.php');
require_once(ROOT_PATH . '/app/Route.php');

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Route;
use App\Controller\FrontController;
use App\Controller\AuthController;
// اگر از PostController هم استفاده می‌کنید، اینجا آن را include کنید
use App\Controller\PostController; 


// اتصال دیتابیس
$config = require_once ROOT_PATH . '/config/database.php';
$capsule = new Capsule;
$capsule->addConnection($config);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// تعریف روت‌ها
$route = new Route();

// مسیر پیش‌فرض: اگر به ریشه /webfinal درخواست آمد، به /webfinal/login ریدایرکت شود
// این بخش در متد dispatch در کلاس Route مدیریت می‌شود.
// بنابراین نیازی به تعریف صریح addRoute برای "/" نیست،
// اما اگر بخواهید به صورت صریح برای ریشه هم یک addRoute داشته باشید:
// $route->addRoute("GET", "/", [AuthController::class, 'login']); 
// یا اگر base path را در addRoute هم لحاظ کردید:
// $route->addRoute("GET", "/webfinal", [AuthController::class, 'login']);


// مسیرهای مربوط به Auth
$route->addRoute("GET", "/login", [AuthController::class, 'login']);
$route->addRoute("POST", "/login", [AuthController::class, 'loginUser']); // فرض می‌کنیم متد loginUser برای پردازش فرم لاگین است
$route->addRoute("GET", "/register", [AuthController::class, 'register']);
$route->addRoute("POST", "/register", [AuthController::class, 'storeUser']); // فرض می‌کنیم متد storeUser برای ثبت‌نام است
$route->addRoute("GET", "/logout", [AuthController::class, 'logout']);


// مسیرهای مربوط به FrontController
$route->addRoute("GET", "/home", [FrontController::class, 'home']);
$route->addRoute("GET", "/posts", [FrontController::class, 'posts']);
$route->addRoute("GET", "/matrix", [FrontController::class, 'matrix']);
$route->addRoute("GET", "/ranking", [FrontController::class, 'ranking']);


// مسیرهای مربوط به PostController (اگر وجود دارد)
$route->addRoute("GET", "/posts/create", [PostController::class, 'create']);
$route->addRoute("POST", "/posts/store", [PostController::class, 'store']);


$route->dispatch();
?>


