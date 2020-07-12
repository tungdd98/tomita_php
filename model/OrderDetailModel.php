<?php
class OrderDetailModel extends Model
{
    public $table = 'orders_detail';
    public function getListAll($id)
    {
        $result = parent::_getListAll("Select * from `$this->table` where order_id = $id");
        return $result;
    }
}
