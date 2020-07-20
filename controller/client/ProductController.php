<?php
include_once "model/ProductModel.php";
include_once "model/CategoryModel.php";

class ProductController extends BaseController
{
    public $model;
    public $modelCategory;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->modelCategory = new CategoryModel();

        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $categories = $this->modelCategory->getListAll();
        switch ($action) {
            case 'detail':
                $product = $this->model->getRecord($id);
                $size = $this->model->_getListAll("Select * from product_size where product_id = $id");
                foreach ($size as $key => $val) {
                    $arrSize[] = $this->model->_getRecord("Select * from sizes where id = $val->size_id")->size;
                }
                $data = array(
                    'product' => $product,
                    'category' => $this->modelCategory->getRecord($product->category_id),
                    'related' => $this->model->getListRelate($product->category_id),
                    'sizes' => $arrSize,
                );
                $this->loadView("client/product-detail/index", $data);
                break;
            case 'filter':
                $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : '';
                $orderDir = isset($_GET['orderDir']) ? $_GET['orderDir'] : '';
                $data = array(
                    'products' => $this->getList($id, $orderBy, $orderDir),
                    'categoryId' => $id,
                    'breadcrumbs' => $this->modelCategory->getRecord($id)->title,
                    'categories' => $categories,
                );
                $this->loadView("client/product-list/index", $data);
                break;
            case 'price':
                $start = (float) $_POST['start'];
                $end = (float) $_POST['end'];
                $data = array(
                    'products' => $this->getList($id, "created_at", "DESC", $start, $end),
                    'categoryId' => $id,
                    'breadcrumbs' => $this->modelCategory->getRecord($id)->title,
                    'categories' => $categories,
                );
                $this->loadView("client/product-list/index", $data);
                
                break;
            default:
                $data = array(
                    'products' => $this->getList($id),
                    'categoryId' => $id,
                    'breadcrumbs' => $this->modelCategory->getRecord($id)->title,
                    'categories' => $categories,
                );
                $this->loadView("client/product-list/index", $data);
                break;
        }
        $this->setTemplate("base/client/index", array('categories' => $categories));
    }
    /**
     * Lấy danh sách sản phẩm
     */
    public function getList($id, $orderBy = 'created_at', $orderDir = 'DESC', $start = 0, $end = 0)
    {
        $recordPerPage = 9;
        $totalRecord = $this->model->getRowCount($id);
        $numberPage = ceil($totalRecord / $recordPerPage);
        $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] - 1 : 0;
        $from = $page * $recordPerPage;
        $data = $this->model->getListHasPagination($from, $recordPerPage, $id, $orderBy, $orderDir, $start, $end);

        return array(
            'data' => $data,
            'numberPage' => $numberPage,
            'start' => $start,
            'end' => $end
        );
    }
}
