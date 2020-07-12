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
        $number = isset($_GET['number']) ? $_GET['number'] : 0;
        switch ($action) {
            case 'add':
                $this->addCart($id, $number);
                echo $this->getCartList();
                break;
            case 'delete':
                # code...
                break;

            case 'update':

                break;
            case 'destroy':
                $this->destroyCart();
                echo $this->getCartList();
                break;
            default:
                echo $this->getCartList();
                break;
        }
    }
    public function addCart($id, $number = 1)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['number'] += $number;
        } else {
            $product = $this->model->_getRecord("Select * from products where id = $id");
            $_SESSION['cart'][$id] = array(
                'id' => $id,
                'title' => $product->title,
                'description' => $product->description,
                'thumbnail' => $product->thumbnail,
                'price' => $product->price,
                'sale' => $product->sale,
                'number' => $number,
            );
        }
    }

    public function updateCart($id, $number)
    {
        if ($number == 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $base = $_SESSION['cart'][$id];

        }
    }

    public function deleteCart($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    public function getCartList()
    {
        return !empty($_SESSION['cart']) ? json_encode($_SESSION['cart']) : json_encode(array());
    }

    public function destroyCart()
    {
        unset($_SESSION['cart']);
    }
}
