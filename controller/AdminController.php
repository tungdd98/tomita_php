<?php
include_once "model/OrderModel.php";
class AdminController extends BaseController
{
    public $modelImport;
    public $modelOrder;
    public function __construct()
    {
        $this->modelOrder = new OrderModel();
        $month = isset($_GET['month']) ? $_GET['month'] : date("m");
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $data = array(
            'totalOrder' => $this->modelOrder->getToTalOrderByMonth($month),
            'totalMoney' => $this->modelOrder->getTotal($month),
            'totalCustomer' => $this->modelOrder->getTotalCustomer($month),
            'interest' => $this->modelOrder->getInterest()
        );
        switch ($action) {
            case 'filter':
                echo json_encode($data);
                break;

            default:
                $this->loadView("admin/dashboard/index", $data);
                $this->setTemplate("base/admin/index");
                break;
        }
    }
}
