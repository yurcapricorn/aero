<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Models\Article;
use App\Exceptions\NotFoundException;

/*
 * Class News
 * Класс контроллера News
 *
 * @package App\Controllers
 */
class News
    extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->items = Article::findAll();
        $this->view->page = Page::findByName('news');
        $this->view->display(__DIR__ . '/../../views/default/news.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную новость
     */
    protected function actionOne()
    {
        $news = $this->view->item = Article::findById($_GET['id']);
        if (empty($news)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $this->view->display(__DIR__ . '/../../views/default/article.php');
    }
}