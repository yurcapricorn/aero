<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Exceptions\NotFoundException;

/*
 * Class Contacts
 * Класс контроллера Contacts
 *
 * @package App\Controllers
 */
class Contacts extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('contacts');
        $this->view->display(__DIR__ . '/../../views/default/contacts.php');
    }
}