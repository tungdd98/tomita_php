<?php
class LogoutController
{
    public function __construct()
    {
        unset($_SESSION["email"]);
        unset($_SESSION['registerUser']);
        global $APP_URL;
        header("location:$APP_URL/login");
    }
}
