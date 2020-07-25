<?php
class ProductModel extends Model
{
    public $table = 'products';
    /**
     * Lấy danh sách phần tử
     */
    public function getListAll($orderBy = 'created_at', $orderDir = 'DESC')
    {
        return parent::_getListAll("Select * from `$this->table` order by $orderBy $orderDir");
    }
    /**
     * Lấy danh sách phần tử ngoài trang client
     */
    public function getListHasPagination($from, $recordPerPage, $categoryId, $orderBy = 'created_at', $orderDir = 'DESC', $start = 0, $end = 0, $flag = true)
    {
        if($flag) {
            return parent::_getListAll("Select * from `$this->table` inner join category_product on products.id = category_product.product_id where category_id = $categoryId order by $orderBy $orderDir limit $from, $recordPerPage");
        } else {
            return parent::_getListAll("Select * from `$this->table` inner join category_product on products.id = category_product.product_id where category_id = $categoryId and price between $start and $end limit $from, $recordPerPage");
        }
    }
    /**
     * Lấy danh sách sản phẩm liên quan
     */
    public function getListRelate($id)
    {
        return parent::_getListAll("Select * from `$this->table` inner join category_product on products.id = category_product.product_id where id = $id");
    }
    /**
     * Lấy số bản ghi
     */
    public function getRowCount($id)
    {
        return parent::_getRowCount("Select products.id from `$this->table` inner join category_product on products.id = category_product.product_id where category_id = $id");
    }
    /**
     * Lấy thông tin phần tử
     */
    public function getRecord($id)
    {
        return parent::_getRecord("Select * from `$this->table` where id = $id");
    }
    /**
     * Thêm mới phần tử
     */
    public function addRecord($fields)
    {
        $values = array();
        foreach ($fields as $key => $val) {
            $values[] = "`$key`='$val'";
        }
        $sql = "Insert into `$this->table` SET " . implode(',', $values);
        return parent::_execute($sql);
    }
    /**
     * Update phần tử
     */
    public function updateRecord($id, $fields)
    {
        $values = array();
        foreach ($fields as $key => $val) {
            $values[] = "`$key`='$val'";
        }
        $sql = "Update `$this->table` SET " . implode(',', $values) . " WHERE id = $id";
        return parent::_execute($sql);
    }
    /**
     * Xoá phần tử
     */
    public function deleteRecord($id)
    {
        parent::_execute("Delete from `$this->table` where id = $id");
    }
}
