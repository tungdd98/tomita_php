<?php
include_once "model/AuthModel.php";
class RegisterController
{
    public $model;
    public function __construct()
    {
        $this->model = new AuthModel();
        if (isset($_SESSION['email'])) {
            header("location:index.php");
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $user = $this->model->getRecord($email);
                if (isset($user->email)) {
                    header("location:admin.php?controller=register&type=auth&action=fail");
                } else {
                    $this->model->register();
                }
            }
        }
        include "view/register.php";
    }
}
