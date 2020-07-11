<?php
include_once "model/CategoryModel.php";

class HomeController extends BaseController
{
    public $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
        );
        $this->loadView("client/home/index", array());
        $this->setTemplate("base/client/index", $data);
    }
}
