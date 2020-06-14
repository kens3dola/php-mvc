<?php
class App
{

    protected $controller = "Home";
    protected $action = "index";
    protected $params = [];

    function __construct()
    {

        $arr = $this->UrlProcess();
        switch ($arr[0]) {
            case 'account':
                if (strcmp($arr[1], 'login') == 0) {
                    if (isset($_SESSION['account_id']) || !empty($_SESSION['account_id'])) {
                        header("Location: /php-mvc/home");
                    }
                }
                break;
            case 'admin':
                if (!isset($_SESSION['account_id']) || empty($_SESSION['account_id'])) {
                    $arr[0] = 'home';
                } else {
                    if (strcmp($_SESSION['role'], 'admin') != 0) {
                        echo '<script>alert("You do not have permission to access this page")</script>';
                        header("Location: /php-mvc/home");
                    }
                }
                break;
            case 'home':
                break;
            default:
                if (!isset($_SESSION['account_id']) || empty($_SESSION['account_id'])) {
                    header("Location: /php-mvc/account/login");
                }
                break;
        }
        // Controller
        if (isset($arr[0])) {
            if (file_exists("./mvc/controllers/" . $arr[0] . "Controller.php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./mvc/controllers/" . ucfirst($this->controller) . "Controller.php";
        $this->controller = new $this->controller;

        // Action
        if (isset($arr[1])) {
            if (isset($arr[1])) {
                if (method_exists($this->controller, $arr[1])) {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
        }

        // Params
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
