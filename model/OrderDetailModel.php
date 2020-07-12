<?php
class OrderDetailModel extends Model
{
    public $table = 'orders_detail';
    public function getListAll()
    {
        $result = parent::_getListAll("Select * from `$this->table` order by created_at DESC");
        return $result;
    }
    public function getListEdit($id) {
        $result = parent::_getListAll("Select * from `$this->table` where id != $id");
        return $result;
    }
    public function getRowCount()
    {
        $result = parent::_getRowCount("Select id from `$this->table`");
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
