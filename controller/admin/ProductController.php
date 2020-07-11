<?php
include_once "model/ProductModel.php";
include_once "model/CategoryModel.php";

class ProductController extends BaseController
{
    public $model;
    public $modelCategory;
    public $linkUrl = "admin/product";

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->modelCategory = new CategoryModel();

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
            'categories' => $this->modelCategory->getListAll(),
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    public function doAddItem()
    {
        $thumbnail = "";
        if ($_FILES["thumbnail"]["name"] != "") {
            $thumbnail = time() . $_FILES["thumbnail"]["name"];
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "public/upload/product/$thumbnail");
        }
        $images = array();
        $images[] = $thumbnail;
        $totalImages = count($_FILES['images']['name']);
        for ($i = 0; $i < $totalImages; $i++) {
            $images[] = $_FILES['images']['name'][$i];
            $path = $_FILES['images']['tmp_name'][$i];
            if ($path != '') {
                move_uploaded_file($path, "public/upload/product/$images[$i]");
            }
        }
        $this->model->addRecord(array(
            'title' => $_POST['title'],
            'category_id' => $_POST['categoryId'],
            'description' => $_POST['description'],
            'content' => $_POST['content'],
            'price' => $_POST['price'],
            'sale' => $_POST['sale'],
            'quantity' => $_POST['quantity'],
            'thumbnail' => $thumbnail,
            'images' => json_encode($images),
        ));
        global $APP_URL;
        header("location:$APP_URL/$this->linkUrl");
    }
    public function showItem($id)
    {
        $result = array(
            'formAction' => "$this->linkUrl/do_edit/$id",
            'record' => $this->model->getRecord($id),
            'data' => $this->model->getListEdit($id),
            'categories' => $this->modelCategory->getListAll(),
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    public function doEitItem($id)
    {
        $this->model->updateRecord($id, array(
            'title' => $_POST['title'],
            'category_id' => $_POST['categoryId'],
            'description' => $_POST['description'],
            'content' => $_POST['content'],
            'price' => $_POST['price'],
            'sale' => $_POST['sale'],
            'quantity' => $_POST['quantity'],
        ));
        if ($_FILES["thumbnail"]["name"] != "") {
            $oldThumbnail = $this->model->getRecord($id)->thumbnail;
            if (isset($oldThumbnail) && $oldThumbnail != "" && file_exists("public/upload/product/" . $oldThumbnail)) {
                unlink("public/upload/product/" . $oldThumbnail);
            }
            $thumbnail = "";
            $thumbnail = time() . $_FILES["thumbnail"]["name"];
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "public/upload/product/$thumbnail");
            $this->model->updateRecord($id, array(
                'thumbnail' => $thumbnail
            ));
        }
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
