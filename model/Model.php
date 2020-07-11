<?php

$db = mysqli_connect($hostname, $username, $password, $database);
mysqli_set_charset($db, "UTF8");

class Model
{
    public function _getListAll($sql)
    {
        global $db;
        $result = mysqli_query($db, $sql);
        $arr = array();

        while ($rows = mysqli_fetch_object($result)) {
            $arr[] = $rows;
        }
        return $arr;
    }

    public function _execute($sql)
    {
        global $db;

        if (mysqli_query($db, $sql)) {
            return mysqli_insert_id($db);
        }
    }

    public function _getRecord($sql)
    {
        global $db;
        $result = mysqli_query($db, $sql);
        $record = mysqli_fetch_object($result);

        return $record;
    }

    public function _getRowCount($sql)
    {
        global $db;
        $result = mysqli_query($db, $sql);
        return mysqli_num_rows($result);
    }
}
