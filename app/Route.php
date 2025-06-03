<?php
namespace App;

class Route
{
    private $routes = [];
    private $basePath = '/webfinal'; // مسیر پایه پروژه شما

    public function addRoute($method = "GET", $path = "/", $handle = null)
    {
        // مسیر را با base path ترکیب می‌کنیم و / انتهایی را حذف می‌کنیم.
        // اگر $path از قبل شامل $this->basePath باشد، آن را اضافه نمی‌کنیم.
        $fullPath = rtrim($this->basePath . $path, "/");
        if ($path === "/") { // برای مسیر ریشه، فقط base path کافی است
            $fullPath = rtrim($this->basePath, "/");
        } elseif (strpos($path, $this->basePath) === 0) { // اگر مسیر از قبل با base path شروع شده
             $fullPath = rtrim($path, "/");
        }


        $this->routes[] = [
            'method' => strtoupper($method),
            'path'   => $fullPath,
            'handle' => $handle
        ];
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        // URL درخواست را تمیز می‌کنیم و / اضافی را حذف می‌کنیم
        $uri    = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

        // اگر URI دقیقاً برابر با base path باشد (مثلاً /webfinal)، آن را به /webfinal/login هدایت می‌کنیم
        if ($uri === rtrim($this->basePath, "/")) {
            header("Location: " . $this->basePath . "/login");
            exit();
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                $handle = $route['handle'];

                if (is_callable($handle)) {
                    call_user_func($handle);
                } elseif (is_array($handle)) {
                    if (!class_exists($handle[0])) {
                        die("Class {$handle[0]} not found!");
                    }

                    $controller = new $handle[0];
                    $methodName = $handle[1];

                    if (method_exists($controller, $methodName)) {
                        $controller->$methodName();
                    } else {
                        die("Method {$methodName} not found in " . get_class($controller));
                    }
                }

                return;
            }
        }

        // اگر هیچ مسیری پیدا نشد، 404 نمایش داده شود.
        // اگر می‌خواهید در 404 هم به لاگین بروید، می‌توانید این خط را تغییر دهید.
        http_response_code(404);
        view('404.php');
    }
}
