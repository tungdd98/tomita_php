<?php
include_once "model/ProductModel.php";
include_once "model/ImportModel.php";

class ImportController extends BaseController
{
    public $model;
    public $modelProduct;
    public $linkUrl = "admin/import";
    public $path = "admin.php?controller=import";

    public function __construct()
    {
        $this->model = new ImportModel();
        $this->modelProduct = new ProductModel();

        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        switch ($action) {
            case 'add':
                $this->addItem();
                break;
            case 'do_add':
                $this->doAddItem();
                break;
            case 'edit':
                $this->showItem($id);
                break;
            case 'do_edit':
                $this->doEditItem($id);
                break;
            case 'delete':
                $this->deleteItem($id);
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
        $data = $this->model->getListAll();
        $result = array(
            'data' => $data,
            'title' => 'Quản lý đơn hàng nhập',
            'path' => 'import',
        );

        $this->loadView("$this->linkUrl/index", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Mở trang thêm phần tử
     */
    public function addItem()
    {
        $result = array(
            'formAction' => "$this->linkUrl/do_add",
            'data' => $this->model->getListAll(),
            'products' => $this->modelProduct->getListAll(),
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Thêm phần tử
     */
    public function doAddItem()
    {
        $this->model->addRecord(array(
            'product_id' => $_POST['product_id'],
            'quantity' => $_POST['quantity'],
            'price' => $_POST['price']
        ));
        $product = $this->modelProduct->getRecord($_POST['product_id']);
        if ($product) {
            $this->modelProduct->updateRecord($_POST['product_id'], array(
                'quantity' => (int) $_POST['quantity'] + (int) $product->quantity,
            ));
        } else {
            $this->modelProduct->updateRecord($_POST['product_id'], array(
                'quantity' => $_POST['quantity'],
            ));
        }
        global $APP_URL;
        header("location:$APP_URL/$this->path&status=add");
    }
    /**
     * Hiển thị chi tiết phần tử
     */
    public function showItem($id)
    {
        $result = array(
            'formAction' => "$this->linkUrl/do_edit/$id",
            'record' => $this->model->getRecord($id),
            'products' => $this->modelProduct->getListAll(),
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Cập nhật phần tử
     */
    public function doEditItem($id)
    {
        $import = $this->model->getRecord($id);
        $product = $this->modelProduct->getRecord($import->product_id);
        $this->model->updateRecord($id, array(
            'product_id' => $_POST['product_id'],
            'quantity' => (int) $_POST['quantity'],
            'price' => $_POST['price']
        ));
        $this->modelProduct->updateRecord($product->id, array(
            'quantity' => (int) $_POST['quantity'] + (int) $product->quantity - (int) $import->quantity,
        ));
        global $APP_URL;
        header("location:$APP_URL/$this->path&status=update");
    }
    /**
     * Xoá phần tử
     */
    public function deleteItem($id)
    {
        $import = $this->model->getRecord($id);
        $product = $this->modelProduct->getRecord($import->product_id);
        $this->modelProduct->updateRecord($import->product_id, array(
            'quantity' => (int) $product->quantity - (int) $import->quantity,
        ));
        $this->model->deleteRecord($id);
        global $APP_URL;
        header("location:$APP_URL/$this->linkUrl");
    }
}
