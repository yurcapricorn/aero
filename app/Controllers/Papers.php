<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Models\Paper;
use App\Exceptions\NotFoundException;

/*
 * Class News
 * Класс контроллера News
 *
 * @package App\Controllers
 */
class Papers
    extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех статей
     */
    protected function actionDefault()
    {
        $this->view->items = Paper::findAllLast();
        $this->view->page  = Page::findByName('papers');
        $this->view->display(__DIR__ . '/../../views/default/news.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную статью
     */
    protected function actionShow()
    {
        $this->view->item  = Paper::findById($_GET['id']);
        $this->view->items = Paper::findLatest(5);
        $this->view->page  = Page::findByName('papers');

        if (empty($this->view->item)) {
            $exc = new NotFoundException('Статья не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $this->view->display(__DIR__ . '/../../views/default/article.php');
    }
}