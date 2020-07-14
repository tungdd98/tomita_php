<?php
include_once "model/CategoryModel.php";
include_once "model/Model.php";

class HomeController extends BaseController
{
    public $model;
    public $modelCategory;
    public function __construct()
    {
        $this->model = new Model();
        $this->modelCategory = new CategoryModel();
        $this->loadView("client/home/index", array('products' => $this->model->_getListAll("Select * from products limit 12")));
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
