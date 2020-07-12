<?php
include_once "model/OrderModel.php";
class AdminController extends BaseController
{
    public $modelOrder;
    public function __construct()
    {
        $this->modelOrder = new OrderModel();
        $data = array(
            'totalOrder' => $this->modelOrder->getRowCount(),
            'totalMoney' => $this->modelOrder->getTotal(),
            'totalCustomer' => $this->modelOrder->getTotalCustomer()
        );
        $this->loadView("admin/dashboard/index", $data);
        $this->setTemplate("base/admin/index");
    }
}
