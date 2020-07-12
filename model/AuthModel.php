<?php
include_once "model/UserModel.php";

class AuthModel extends Model
{
    public $model;
    public function __construct() {
        $this->model = new UserModel();
    }
    /**
     * Lấy thông tin user qua email
     */
    public function getRecord($email)
    {
        return parent::_getRecord("Select * from users where email = '$email'");
    }
    /**
     * Đăng ký
     */
    public function register()
    {
        $userId = $this->model->addRecord(array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
        ));
        $_SESSION['registerUser'] = $this->model->getRecord($userId)->email;
        header("location:admin.php?controller=login&type=auth&action=register-success");
    }
}
