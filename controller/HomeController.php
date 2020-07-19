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
        $data = array(
            'products' => $this->model->_getListAll("Select * from products limit 12"),
            'mens' => $this->model->_getListAll("Select * from products where id = 99 limit 12"),
            'womens' => $this->model->_getListAll("Select * from products where id = 98 limit 12"),
        );
        $this->loadView("client/home/index", $data);
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
