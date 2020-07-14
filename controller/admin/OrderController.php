<?php
include_once "model/OrderModel.php";
include_once "model/ProductModel.php";
include_once "model/OrderDetailModel.php";
include_once "model/UserModel.php";

class OrderController extends BaseController
{
    public $model;
    public $modelProduct;
    public $modelOrderDetail;
    public $modelUser;
    public $linkUrl = "admin/order";

    public function __construct()
    {
        $this->model = new OrderModel();
        $this->modelProduct = new ProductModel();
        $this->modelOrderDetail = new OrderDetailModel();
        $this->modelUser = new UserModel();

        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        switch ($action) {
            case 'view':
                $this->showItem($id);
                break;
            case 'update':
                $this->doEditItem($id);
                break;
            default:
                $this->getList();
                break;
        }
    }

    /**
     * Lấy danh sách phần tử
     */
    public function getList()
    {
        $result = array(
            'data' => $this->model->getListAll(),
            'title' => 'Quản lý đơn hàng',
            'path' => 'order',
        );

        $this->loadView("$this->linkUrl/index", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Hiển thị chi tiết đơn hàng
     */
    public function showItem($id)
    {
        $userId = $this->model->getRecord($id)->user_id;
        $listProductOrder = $this->modelOrderDetail->getListAll($id);
        $products = array();
        foreach ($listProductOrder as $key => $val) {
            $products[] = $this->modelProduct->getRecord($val->product_id);
            $products[$key]->number = $val->number;
            $products[$key]->size = $val->size;
        }
        $result = array(
            'record' => $this->model->getRecord($id),
            'products' => $products,
            'user' => $this->modelUser->getRecord($userId),
        );
        $this->loadView("$this->linkUrl/view", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Cập nhật phần tử 
     */
    public function doEditItem($id)
    {
        $this->model->updateRecord($id, array(
            'status' => $_GET['status'],
        ));
    }
}
