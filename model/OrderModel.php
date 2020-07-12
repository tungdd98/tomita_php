<?php
class OrderModel extends Model
{
    public $table = 'orders';
    /**
     * Lấy danh sách phần tử
     */
    public function getListAll()
    {
        return parent::_getListAll("Select * from `$this->table` order by created_at DESC");
    }
    /**
     * Lấy số bản ghi
     */
    public function getRowCount()
    {
        return parent::_getRowCount("Select id from `$this->table`");
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
    /**
     * Thống kê: lấy tổng tiền 
     */
    public function getTotal() {
        $data = parent::_getListAll("Select total from `$this->table`");
        $sum = 0;
        foreach($data as $key => $val) {
            $sum += $val->total;
        }
        return $sum;
    }
    /**
     * Thống kê: lấy tổng khách hàng
     */
    public function getTotalCustomer() {
        return parent::_getRowCount("Select DISTINCT user_id from`$this->table`");
    }
}
