<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Models\Faq;
use App\Exceptions\NotFoundException;

/*
 * Class Faq
 * Класс контроллера Faq
 *
 * @package App\Controllers
 */
class Faqs extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->items = Faq::findAll();
        $this->view->page  = Page::findByName('faqs');
        $this->view->display(__DIR__ . '/../../views/default/faq.php');
    }
}