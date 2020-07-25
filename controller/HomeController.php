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
            'products' => $this->model->_getListAll("Select * from products limit 8"),
            'mens' => $this->model->_getListAll("Select * from products inner join category_product on products.id = category_product.product_id where category_product.category_id = 99 limit 8"),
            'womens' => $this->model->_getListAll("Select * from products inner join category_product on products.id = category_product.product_id where category_product.category_id = 98 limit 8"),
        );
        $this->loadView("client/home/index", $data);
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
