<?php
include_once "model/CategoryModel.php";
include_once "model/UserModel.php";
include_once "model/OrderModel.php";
include_once "model/OrderDetailModel.php";

class CheckoutController extends BaseController
{
    public $model;
    public $modelCategory;
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

        $data = array(
            'categories' => $this->modelCategory->getListAll(),
            'user' => $this->modelUser->getRecord($_SESSION['id']),
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
                    ));
                }
                unset($_SESSION['cart']);
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
            $sum += $val['priceSale'];
        }
        return $sum;
    }
}
