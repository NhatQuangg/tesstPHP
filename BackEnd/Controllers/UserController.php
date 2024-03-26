<?php

namespace App\Controllers;

require_once __DIR__ . "/../Services/UserService.php";
require_once __DIR__ . "/Controller.php";

use Service\UserService;
use App\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $service = new UserService();

        if ($method == "POST") {
            if (isset($_POST["login_btn"])) {
                $un = $_POST["username"];
                $pw = $_POST["password"];

                $userLogin = $service->Login($un, $pw);
                if ($userLogin != null) {
                    $_SESSION["USER_LOGED"] = $userLogin;
                    header("Location: /dothithongminh_admin/home");
                }
                else
                    echo "hihi";

            }
        }
    }
}
$run = new UserController();
$run->GateWay();