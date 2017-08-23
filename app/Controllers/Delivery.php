<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Exceptions\NotFoundException;

/*
 * Class Delivery
 * Класс контроллера Delivery
 *
 * @package App\Controllers
 */
class Delivery
    extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('delivery');
        $this->view->display(__DIR__ . '/../../views/default/page.php');
    }
}