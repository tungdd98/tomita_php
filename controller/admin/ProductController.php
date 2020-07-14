<?php
include_once "model/ProductModel.php";
include_once "model/CategoryModel.php";
include_once "model/SizeModel.php";
include_once "model/ProductSizeModel.php";

class ProductController extends BaseController
{
    public $model;
    public $modelCategory;
    public $modelSize;
    public $modelProductSize;
    public $linkUrl = "admin/product";
    public $path = "admin.php?controller=product";
    public $imagePath = 'upload/product';

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->modelCategory = new CategoryModel();
        $this->modelSize = new SizeModel();
        $this->modelProductSize = new ProductSizeModel();

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
    public function getList($orderBy = 'created_at', $orderDir = 'DESC')
    {
        $data = $this->model->getListAll($orderBy, $orderDir);
        $result = array(
            'data' => $data,
            'title' => 'Quản lý sản phẩm',
            'path' => 'product',
            'imagePath' => $this->imagePath,
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
            'categories' => $this->modelCategory->getListAll(),
            'sizes' => $this->modelSize->getListAll()
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    /**
     * Thêm phần tử
     */
    public function doAddItem()
    {
        $thumbnail = "";
        if ($_FILES["thumbnail"]["name"] != "") {
            $thumbnail = time() . $_FILES["thumbnail"]["name"];
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "public/$this->imagePath/$thumbnail");
        }
        $images = array();
        $images[] = $thumbnail;
        $totalImages = count($_FILES['images']['name']);
        for ($i = 0; $i < $totalImages; $i++) {
            $images[] = $_FILES['images']['name'][$i];
            $path = $_FILES['images']['tmp_name'][$i];
            if ($path != '') {
                move_uploaded_file($path, "public/$this->imagePath/$images[$i]");
            }
        }
        $productId = $this->model->addRecord(array(
            'title' => $_POST['title'],
            'category_id' => $_POST['categoryId'],
            'description' => $_POST['description'],
            'content' => $_POST['content'],
            'price' => $_POST['price'],
            'sale' => $_POST['sale'],
            'quantity' => 0,
            'thumbnail' => $thumbnail,
            'images' => json_encode($images),
        ));
        foreach($_POST['size'] as $key => $val) {
            $this->modelProductSize->addRecord(array(
                'product_id' => $productId,
                'size_id' => $val
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
        $productSize = $this->modelProductSize->getListByField('product_id', $id);
        $listSize = $this->modelSize->getListAll();
        foreach($productSize as $key => $val) {
            foreach($listSize as $k => $v) {
                if($val->size_id == $v->id) {
                    $v->checked = true;
                }
            }
        }
        $result = array(
            'formAction' => "$this->linkUrl/do_edit/$id",
            'record' => $this->model->getRecord($id),
            'categories' => $this->modelCategory->getListAll(),
            'sizes' => $listSize
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
            'category_id' => $_POST['categoryId'],
            'description' => $_POST['description'],
            'content' => $_POST['content'],
            'price' => $_POST['price'],
            'sale' => $_POST['sale'],
            'quantity' => 0,
        ));
        if ($_FILES["thumbnail"]["name"] != "") {
            $oldThumbnail = $this->model->getRecord($id)->thumbnail;
            if (isset($oldThumbnail) && $oldThumbnail != "" && file_exists("public/$this->imagePath/" . $oldThumbnail)) {
                unlink("public/$this->imagePath/" . $oldThumbnail);
            }
            $thumbnail = "";
            $thumbnail = time() . $_FILES["thumbnail"]["name"];
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "public/$this->imagePath/$thumbnail");
            $this->model->updateRecord($id, array(
                'thumbnail' => $thumbnail,
            ));
        }
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
