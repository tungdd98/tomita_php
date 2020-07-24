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
        $size = isset($_GET['size']) ? $_GET['size'] : '';
        switch ($action) {
            case 'add':
                $this->addCart($id, $number, $size);
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
                $size = isset($_GET['size']) ? $_GET['size'] : '';
                $this->updateSize($id, $size);
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
    public function addCart($id, $number = 0, $sizeSelect = '')
    {
        $size = $this->model->_getListAll("Select * from product_size where product_id = $id");
        $arrSize = array();
        foreach ($size as $key => $val) {
            $arrSize[] = $this->model->_getRecord("Select * from sizes where id = $val->size_id")->size;
        }
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['number'] += $number;
            $_SESSION['cart'][$id]['size'] = $sizeSelect;
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
                'selectSize' => json_encode($arrSize),
                'size' => $sizeSelect,
            );
        }
    }
    /**
     * Update size
     */
    public function updateSize($id, $size)
    {
        if (isset($_SESSION['cart'][$id]['size'])) {
            $_SESSION['cart'][$id]['size'] = $size;
        } else {
            $this->addCart($id);
        }
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