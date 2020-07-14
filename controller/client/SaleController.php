<?php
include_once "model/Model.php";
include_once "model/CategoryModel.php";

class SaleController extends BaseController
{
    public $model;
    public $modelCategory;
    public function __construct()
    {
        $this->model = new Model();
        $this->modelCategory = new CategoryModel();
        $this->loadView("client/sale/index", array('products' => $this->model->_getListAll("Select * from products where sale > 0")));
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
