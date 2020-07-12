<?php
include_once "model/CategoryModel.php";

class CategoryController extends BaseController
{
    public $model;
    public $linkUrl = "admin/category";
    public $path = "admin.php?controller=category";

    public function __construct()
    {
        $this->model = new CategoryModel();

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
            'title' => 'Quản lý danh mục',
            'path' => 'category'
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
            'title' => $_POST['title'],
            'parent_id' => !empty($_POST['parentId']) ? $_POST['parentId'] : '',
        ));
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
            'data' => $this->model->getListEdit($id),
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Cập nhật phần tử 
     */
    public function doEditItem($id)
    {
        $this->model->updateRecord($id, array(
            'title' => $_POST['title'],
            'parent_id' => !empty($_POST['parentId']) ? $_POST['parentId'] : '',
        ));
        global $APP_URL;
        header("location:$APP_URL/$this->path&status=update");
    }
    /**
     * Xoá phần tử
     */
    public function deleteItem($id)
    {
        $this->model->deleteRecord($id);
        global $APP_URL;
        header("location:$APP_URL/$this->linkUrl");
    }
}
