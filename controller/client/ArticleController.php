<?php
include_once "model/ArticleModel.php";
include_once "model/CategoryModel.php";

class ArticleController extends BaseController
{
    public $modelArticle;
    public $modelCategory;
    public function __construct()
    {
        $this->modelArticle = new ArticleModel();
        $this->modelCategory = new CategoryModel();
        $this->loadView("client/article-list/index", array('articles' => $this->modelArticle->getListAll()));
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
