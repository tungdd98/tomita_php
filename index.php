<?php
session_start();

include_once "config.php";
include_once "controller/BaseController.php";
include_once "model/Model.php";
include_once "helper/index.php";

$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
$controller_class = "{$controller}Controller";
$controller = "controller/client/{$controller}Controller.php";

if (file_exists($controller)) {
    include_once $controller;
    new $controller_class();
} else {
    include_once "controller/HomeController.php";
    new HomeController();
}
