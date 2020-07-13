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
            case 'destroy':
                $this->destroyCart();
                echo $this->getCartList();
                break;
            case 'delete':
                $this->deleteCart($id);
                echo $this->getCartList();
                break;
            case 'size':
                $this->updateSize($id);
                echo $this->getCartList();
                break;
            default:
                echo $this->getCartList();
                break;
        }
    }

    /**
     * Thêm mới sản phẩm vào giỏ hàng
     */
    public function addCart($id, $number = 0)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['number'] += $number;
            if ($_SESSION['cart'][$id]['number'] == 0) {
                $this->deleteCart($id);
            }
        } else {
            $product = $this->model->_getRecord("Select * from products where id = $id");
            $_SESSION['cart'][$id] = array(
                'id' => $id,
                'title' => $product->title,
                'description' => $product->description,
                'thumbnail' => $product->thumbnail,
                'price' => $product->price,
                'priceSale' => getPrice($product->price, (int) $product->sale),
                'sale' => $product->sale,
                'number' => $number,
            );
        }
    }
    /**
     * Update size
     */
    public function updateSize($id)
    {

    }
    /**
     * Xoá phần tử trong giỏ hàng
     */
    public function deleteCart($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    /**
     * Lấy danh sách giỏ hàng
     */
    public function getCartList()
    {
        return !empty($_SESSION['cart']) ? json_encode($_SESSION['cart']) : json_encode(array());
    }

    /**
     * Xoá giỏ hàng
     */
    public function destroyCart()
    {
        unset($_SESSION['cart']);
    }
}
