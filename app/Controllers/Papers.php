<?php

namespace App\Controllers;

use App\Logger;
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
        $this->view->items = Paper::findAll();
        $this->view->display(__DIR__ . '/../../views/default/news.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную статью
     */
    protected function actionOne()
    {
        $news = $this->view->item = Paper::findById($_GET['id']);
        if (empty($news)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $this->view->display(__DIR__ . '/../../views/default/article.php');
    }
}