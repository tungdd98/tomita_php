<?php
include_once "model/CategoryModel.php";
include_once "model/Model.php";

class SaleController extends BaseController
{
    public $modelCategory;
    public $model;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $this->model = new Model();
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
            'products' => $this->model->_getListAll("Select * from products where sale > 0")
        );
        $this->loadView("client/sale/index", $data);
        $this->setTemplate("base/client/index", $data);
    }
}
