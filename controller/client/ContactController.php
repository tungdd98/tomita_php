<?php
include_once "model/CategoryModel.php";

class ContactController extends BaseController
{
    public $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
        );
        $this->loadView("client/contact/index", $data);
        $this->setTemplate("base/client/index", $data);
    }
}
