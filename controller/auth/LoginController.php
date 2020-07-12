<?php
include_once "model/LoginModel.php";
class LoginController
{
    public $model;
    public function __construct()
    {
        $this->model = new LoginModel();

        if (isset($_SESSION["email"])) {
            header("location:index.php");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password = md5($password);
            $check = $this->model->getRecord($email);

            if (isset($check->email) && $check->password == $password) {
                $_SESSION["email"] = $email;
                $_SESSION["id"] = $check->id;
                global $APP_URL;
                if ($check->rule == 1) {
                    header("location:$APP_URL/admin");
                } else {
                    header("location:$APP_URL/index");
                }
            }
        }

        include "view/login.php";
    }
}
