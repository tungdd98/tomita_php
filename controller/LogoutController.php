<?php
class LogoutController
{
    public function __construct()
    {
        unset($_SESSION["email"]);
        global $APP_URL;
        header("location:$APP_URL/admin");
    }
}
