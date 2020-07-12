<?php
session_start();

include_once "config.php";
include_once "controller/BaseController.php";
include_once "model/Model.php";
include_once "helper/index.php";

$type = isset($_GET["type"]) ? $_GET["type"] : "";
$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
$controllerClass = "{$controller}Controller";

if ($type == 'auth') {
    $controller = "controller/auth/{$controller}Controller.php";
    include_once $controller;
    new $controllerClass();
} else {
    if (isset($_SESSION["email"]) == false) {
        include_once "controller/auth/LoginController.php";
        new LoginController();
    } else {
        $controller = "controller/admin/{$controller}Controller.php";
        if ($_SESSION['rule'] == 1) {
            if (file_exists($controller)) {
                include_once $controller;
                new $controllerClass();
            } else {
                include_once "controller/AdminController.php";
                new AdminController();
            }
        } else {
            include_once "controller/HomeController.php";
            new HomeController();
        }
    }
}
