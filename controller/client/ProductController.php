<?php
include_once "model/ProductModel.php";
include_once "model/CategoryModel.php";

class ProductController extends BaseController {
    public $model;
    public $modelCategory;
    public function __construct() {
        $this->model = new ProductModel();
        $this->modelCategory = new CategoryModel();
        
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $data['categories'] = $this->modelCategory->getListAll();
        switch ($action) {
            case 'detail':
                $productId = isset($_GET['id']) ? $_GET['id'] : '';
                $data['product'] = $this->model->getRecord($productId);
                $data['category'] = $this->modelCategory->getRecord($data['product']->category_id);
                $data['related'] = $this->model->getListRelate($data['product']->category_id);
                $this->loadView("client/product-detail/index", $data);
                break;
            
            default:
                $categoryId = isset($_GET['id']) ? $_GET['id'] : '';
                $data['products'] = $this->getList($categoryId);
                $data['categoryId'] = $categoryId;
                $data['breadcrumbs'] = $this->modelCategory->getRecord($categoryId)->title;
                $this->loadView("client/product-list/index", $data);
                break;
        }
        
        $this->setTemplate("base/client/index", $data); 
    }
    public function getList($id) {
        $recordPerPage = 9;
        $totalRecord = $this->model->getRowCount($id);
        $numberPage = ceil($totalRecord/$recordPerPage);
        $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] - 1 : 0;
        $from = $page * $recordPerPage;
        $data = $this->model->getListHasPagination($from, $recordPerPage, $id);
        
        return array(
            'data' => $data,
            'numberPage' =>$numberPage
        );
    }
}