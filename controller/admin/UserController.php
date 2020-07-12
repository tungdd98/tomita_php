<?php
include_once "model/UserModel.php";

class UserController extends BaseController
{
    public $model;
    public $linkUrl = "admin/user";

    public function __construct()
    {
        $this->model = new UserModel();

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
                $this->doEditItem($id);
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
        $thumbnail = "";
        if ($_FILES["thumbnail"]["name"] != "") {
            $thumbnail = time() . $_FILES["thumbnail"]["name"];
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "public/upload/user/$thumbnail");
        }
        $this->model->addRecord(array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'thumbnail' => $thumbnail,
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
        );
        $this->loadView("$this->linkUrl/edit", $result);
        $this->setTemplate("base/admin/index");
    }
    public function doEditItem($id)
    {
        $this->model->updateRecord(array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
        ));
        if ($_FILES["thumbnail"]["name"] != "") {
            $oldThumbnail = $this->model->getRecord($id)->thumbnail;
            if (isset($oldThumbnail) && $oldThumbnail != "" && file_exists("public/upload/user/" . $oldThumbnail)) {
                unlink("public/upload/user/" . $oldThumbnail);
            }
            $thumbnail = "";
            $thumbnail = time() . $_FILES["thumbnail"]["name"];
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "public/upload/user/$thumbnail");
            $this->model->updateRecord($id, array(
                'thumbnail' => $thumbnail,
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
