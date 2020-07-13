<?php
include_once "model/CategoryModel.php";

class FaqController extends BaseController
{
    public $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
        );
        $this->loadView("client/faq/index", $data);
        $this->setTemplate("base/client/index", $data);
    }
}
