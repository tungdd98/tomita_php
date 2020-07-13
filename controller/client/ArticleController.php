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
        $data = array(
            'categories' => $this->modelCategory->getListAll(),
            'articles' => $this->modelArticle->getListAll()
        );
        $this->loadView("client/article-list/index", $data);
        $this->setTemplate("base/client/index", $data);
    }
}
