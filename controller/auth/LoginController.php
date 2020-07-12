<?php
include_once "model/AuthModel.php";
class LoginController
{
    public $model;
    public function __construct()
    {
        $this->model = new AuthModel();
        if (isset($_SESSION["email"])) {
            header("location:index.php");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password = md5($password);
            $user = $this->model->getRecord($email);

            if (isset($user->email) && $user->password == $password) {
                $_SESSION["email"] = $email;
                $_SESSION["id"] = $user->id;
                $_SESSION['thumbnail'] = $user->thumbnail;
                $_SESSION['rule'] = $user->rule;
                global $APP_URL;
                if ($user->rule == 1) {
                    header("location:$APP_URL/admin");
                } else {
                    header("location:$APP_URL");
                }
            } else {
                header("location:admin.php?controller=login&type=auth&action=fail");
            }
        }

        include "view/login.php";
    }
}
