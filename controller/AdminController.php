<?php
class AdminController extends BaseController
{
    public function __construct()
    {
        $this->loadView("admin/dashboard/index", array());
        $this->setTemplate("base/admin/index");
    }
}
