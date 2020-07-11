<?php
class ProductModel extends Model
{
    public $table = 'products';
    public function getListAll()
    {
        $result = parent::_getListAll("Select * from `$this->table` order by created_at DESC");
        return $result;
    }
    public function getListHasPagination($from, $recordPerPage, $categoryId)
    {
        $result = parent::_getListAll("Select * from `$this->table` where category_id = $categoryId order by created_at DESC limit $from, $recordPerPage");
        return $result;
    }
    public function getListEdit($id)
    {
        $result = parent::_getListAll("Select * from `$this->table` where id != $id");
        return $result;
    }
    public function getListRelate($id)
    {
        $result = parent::_getListAll("Select * from `$this->table` where category_id = $id");
        return $result;
    }
    public function getRowCount($id)
    {
        $result = parent::_getRowCount("Select id from `$this->table` where category_id = $id");
        return $result;
    }
    public function getRecord($id)
    {
        $result = parent::_getRecord("Select * from `$this->table` where id = $id");
        return $result;
    }
    public function addRecord($fields)
    {
        $values = array();
        foreach ($fields as $key => $val) {
            $values[] = "`$key`='$val'";
        }
        $sql = "Insert into `$this->table` SET " . implode(',', $values);
        parent::_execute($sql);
    }
    public function updateRecord($id, $fields)
    {
        $values = array();
        foreach ($fields as $key => $val) {
            $values[] = "`$key`='$val'";
        }
        $sql = "Update `$this->table` SET " . implode(',', $values) . " WHERE id = $id";
        parent::_execute($sql);
    }
    public function deleteRecord($id)
    {
        parent::_execute("Delete from `$this->table` where id = $id");
    }
}
