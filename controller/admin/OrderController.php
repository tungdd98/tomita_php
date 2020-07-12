<?php
include_once "model/OrderModel.php";

class OrderController extends BaseController
{
    public $model;
    public $linkUrl = "admin/order";

    public function __construct()
    {
        $this->model = new OrderModel();

        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case 'add':
                $this->addItem();
                break;
            case 'do_add':
                $this->doAddItem();
                break;
            case 'edit':
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $this->showItem($id);
                break;
            case 'do_edit':
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $this->doEitItem($id);
                break;
            case 'delete':
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $this->deleteItem($id);
                break;

            default:
                $this->getList();
                break;
        }
    }

    public function getList()
    {
        $data = $this->model->getListAll();
        $result = array(
            'data' => $data,
        );

        $this->loadView("$this->linkUrl/index", $result);
        $this->setTemplate("base/admin/index");
    }
    public function addItem()
    {
        $result = array(
            'formAction' => "$this->linkUrl/do_add",
            'data' => $this->model->getListAll(),
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    public function doAddItem()
    {
        $this->model->addRecord(array(
            'title' => $_POST['title'],
            'parent_id' => !empty($_POST['parentId']) ? $_POST['parentId'] : '',
        ));
        global $APP_URL;
        header("location:$APP_URL/$this->linkUrl");
    }
    public function showItem($id)
    {
        $result = array(
            'formAction' => "$this->linkUrl/do_edit/$id",
            'record' => $this->model->getRecord($id),
            'data' => $this->model->getListEdit($id)
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    public function doEitItem($id)
    {
        $this->model->updateRecord($id, array(
            'title' => $_POST['title'],
            'parent_id' => !empty($_POST['parentId']) ? $_POST['parentId'] : '',
        ));
        global $APP_URL;
        header("location:$APP_URL/$this->linkUrl");
    }
    public function deleteItem($id)
    {
        $this->model->deleteRecord($id);
        global $APP_URL;
        header("location:$APP_URL/$this->linkUrl");
    }
}
