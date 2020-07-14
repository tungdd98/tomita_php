<?php
include_once "model/CategoryModel.php";
include_once "model/UserModel.php";

class AccountController extends BaseController
{
    public $modelUser;
    public $modelCategory;
    public function __construct()
    {
        $this->modelUser = new UserModel();
        $this->modelCategory = new CategoryModel();
        $this->loadView("client/account/index", array('user' => $this->modelUser->getRecord($_SESSION['id'])));
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
