<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Models\Article;
use App\Exceptions\NotFoundException;

/*
 * Class News
 * Класс контроллера Index
 *
 * @package App\Controllers
 */
class Index
    extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список последних новостей
     */
    protected function actionDefault()
    {
        $this->view->news = Article::findLatest(3);
        $this->view->page = Page::findByName('index');
        $this->view->display(__DIR__ . '/../../views/default/index.php');
    }
}