<?php
include_once "model/CategoryModel.php";
include_once "model/ProductModel.php";
include_once "model/UserModel.php";
include_once "model/OrderModel.php";
include_once "model/OrderDetailModel.php";

class CheckoutController extends BaseController
{
    public $model;
    public $modelCategory;
    public $modelProduct;
    public $modelUser;
    public $modelOrder;
    public $modelOrderDetail;

    public function __construct()
    {
        $this->model = new Model();
        $this->modelCategory = new CategoryModel();
        $this->modelUser = new UserModel();
        $this->modelOrder = new OrderModel();
        $this->modelOrderDetail = new OrderDetailModel();
        $this->modelProduct = new ProductModel();

        $data = array(
            'categories' => $this->modelCategory->getListAll(),
            'user' => isset($_SESSION['id']) ? $this->modelUser->getRecord($_SESSION['id']) : null,
        );
        $action = !empty($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case 'checkout':
                $order_id = $this->modelOrder->addRecord(array(
                    'user_id' => $_SESSION['id'],
                    'status' => 0,
                    'total' => $this->getTotalMoney(),
                ));
                foreach ($_SESSION['cart'] as $key => $val) {
                    $this->modelOrderDetail->addRecord(array(
                        'order_id' => $order_id,
                        'number' => $val['number'],
                        'product_id' => $val['id'],
                        'size' => $val['size'],
                    ));
                    $product = $this->modelProduct->getRecord($val['id']);
                    $this->modelProduct->updateRecord($val['id'], array(
                        'quantity' => (int) $product->quantity - (int) $val['number'],
                    ));
                }
                unset($_SESSION['cart']);
                return json_encode(array());
                break;

            default:
                $this->loadView("client/checkout/index", $data);
                $this->setTemplate("base/client/index", $data);
                break;
        }
    }
    public function getTotalMoney()
    {
        $sum = 0;
        foreach ($_SESSION['cart'] as $key => $val) {
            $sum += $val['priceSale'] * $val['number'];
        }
        return $sum;
    }
}