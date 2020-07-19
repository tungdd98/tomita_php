<?php
include_once "model/CategoryModel.php";
include_once "model/Model.php";

class SearchController extends BaseController
{
    public $model;
    public $modelCategory;
    public function __construct()
    {
        $this->model = new Model();
        $this->modelCategory = new CategoryModel();
        $query = isset($_POST['search']) ? $_POST['search'] : '';
        $data = array(
            'products' => $this->model->_getListAll("Select * from products where title LIKE '%$query%' limit 12"),
            'query' => $query
        );
        $this->loadView("client/search/index", $data);
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
