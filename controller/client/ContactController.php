<?php
include_once "model/CategoryModel.php";

class ContactController extends BaseController
{
    public $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $this->loadView("client/contact/index", array());
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
