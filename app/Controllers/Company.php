<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Exceptions\NotFoundException;

/*
 * Class Company
 * Класс контроллера Company
 *
 * @package App\Controllers
 */
class Company extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('company');
        $this->view->display(__DIR__ . '/../../views/default/page.php');
    }
}
