<?php
class LoginModel extends Model
{
    public function getRecord($email)
    {
        $arr = array();
        $arr = parent::_getRecord("Select id, email, password, name, rule from users where email='$email'");
        return $arr;
    }
}