<?php
include_once "model/CategoryModel.php";
include_once "model/OrderModel.php";

class HistoryController extends BaseController
{
    public $modelCategory;
    public $modelOrder;
    public $modelProduct;
    public $modelOrderDetail;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
        $this->modelOrder = new OrderModel();

        $data = array(
            'data' => $this->modelOrder->getListByField('user_id', $_SESSION['id']),
        );
        $this->loadView("client/history-order/index", $data);
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
