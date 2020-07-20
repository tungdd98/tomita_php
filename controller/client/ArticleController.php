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
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        switch ($action) {
            case 'detail':
                $data = array(
                    'data' => $this->modelArticle->getRecord($id)
                );
                $this->loadView("client/article-detail/index", $data);
                break;

            default:
                $this->loadView("client/article-list/index", array('articles' => $this->modelArticle->getListAll()));
                break;
        }
        $this->setTemplate("base/client/index", array('categories' => $this->modelCategory->getListAll()));
    }
}
