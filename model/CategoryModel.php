<?php
class CategoryModel extends Model
{
    public $table = 'categories';
    /**
     * Lấy danh sách phần tử
     */
    public function getListAll()
    {
        $result = parent::_getListAll("Select * from `$this->table` order by created_at desc");
        return $result;
    }
    /**
     * Lấy danh sách phần tử khi cập nhật sản phẩm
     */
    public function getListEdit($id) {
        $result = parent::_getListAll("Select * from `$this->table` where id != $id");
        return $result;
    }
    /**
     * Lấy số bản ghi
     */
    public function getRowCount()
    {
        $result = parent::_getRowCount("Select id from `$this->table`");
        return $result;
    }
    /**
     * Lấy thông tin phần tử
     */
    public function getRecord($id)
    {
        $result = parent::_getRecord("Select * from `$this->table` where id = $id");
        return $result;
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
