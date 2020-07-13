<?php
include_once "model/CategoryModel.php";
include_once "model/ProductModel.php";

class HomeController extends BaseController
{
    public $modelCategory;
    public $modelProduct;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $this->modelProduct = new ProductModel();
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
            'products' => $this->modelProduct->getListAll()
        );
        $this->loadView("client/home/index", $data);
        $this->setTemplate("base/client/index", $data);
    }
}
