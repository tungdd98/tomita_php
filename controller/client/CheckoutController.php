<?php
include_once "model/CategoryModel.php";
include_once "model/UserModel.php";

class CheckoutController extends BaseController
{
    public $model;
    public $modelCategory;
    public $modelUser;

    public function __construct()
    {
        $this->model = new Model();
        $this->modelCategory = new CategoryModel();
        $this->modelUser = new UserModel();
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
            'user' => $this->modelUser->getRecord($_SESSION['id'])
        );

        $this->loadView("client/checkout/index", $data);
        $this->setTemplate("base/client/index", $data);
    }
}
