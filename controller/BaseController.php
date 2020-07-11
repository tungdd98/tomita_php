<?php
class BaseController
{
    public $view;
    public $template;
    public $content;
    public function loadView($_view, $var)
    {
        ob_start();
        $this->view = $_view;
        extract($var);
        include "view/{$this->view}.php";
        $this->content = ob_get_contents();
        ob_clean();
        ob_end_flush();
    }
    public function setTemplate($_template, $var = [])
    {
        $this->template = $_template;
        extract($var);
        include "view/{$this->template}.php";
    }
}
