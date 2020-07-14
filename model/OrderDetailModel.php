<?php
class OrderDetailModel extends Model
{
    public $table = 'orders_detail';
    /**
     * Lấy danh sách phần tử
     */
    public function getListAll($id)
    {
        $result = parent::_getListAll("Select * from `$this->table` where order_id = $id");
        return $result;
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
}
