<?php
class CartController
{
    public $model;
    public function __construct()
    {
        $this->model = new Model();
        if (isset($_SESSION["cart"]) == false) {
            $_SESSION["cart"] = array();
        }

        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        switch ($action) {
            case 'add':
                # code...
                break;

            case 'delete':
                # code...
                break;

            case 'update':

                break;
            default:
                # code...
                break;
        }
    }
    public function addCart($id) {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['number']++;
        } else {
            $product = $this->model->_getRecord("Select * from products where id = $id");
            $_SESSION['cart'][$id] = array(
                'id' => $id,
                'title' => $product->title,
                'description' => $product->description,
                'thumbnail' => $product->thumbnail,
                'price' => $product->price,
                'sale' => $product->sale,
                'quantity' => $product->quantity
            );
        }
    }
}
