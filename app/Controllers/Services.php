<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Models\Service;
use App\Exceptions\NotFoundException;

/*
 * Class Services
 * Класс контроллера Services
 *
 * @package App\Controllers
 */
class Services
    extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->items = Service::findAll();
        $this->view->page  = Page::findByName('services');
        $this->view->display(__DIR__ . '/../../views/default/news.php');
    }

    /*
     * Метод actionOne
     * Выводит одну конкретную новость
     */
    protected function actionShow()
    {
        $this->view->item  = Service::findById($_GET['id']);
        $this->view->items = Service::findLatest(5);
        $this->view->page  = Page::findByName('services');

        if (empty($this->view->item)) {
            $exc = new NotFoundException('Услуга не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $this->view->display(__DIR__ . '/../../views/default/article.php');
    }
}