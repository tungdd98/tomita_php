<?php
class ProductSizeModel extends Model
{
    public $table = 'product_size';
    /**
     * Lấy danh sách phần tử
     */
    public function getListAll()
    {
        return parent::_getListAll("Select * from `$this->table`");
    }
    /**
     * Lấy danh sách theo field
     */
    public function getListByField($field, $id)
    {
        return parent::_getListAll("Select * from `$this->table` where $field = $id");
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
        $sql = "Update `$this->table` SET " . implode(',', $values) . " where id = $id";
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
