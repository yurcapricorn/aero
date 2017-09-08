<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Controllers\Controller;
use App\Models\Page;
use App\Models\Article;
use App\Models\Author;
use App\Exceptions\NotFoundException;

/*
 * Class Admin\Contacts
 * Класс контроллера админ-панели Contacts
 *
 * @package App\Controllers\Admin
 */
class Contacts extends Controller
{
    /*
     * Метод actionAll
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('contacts');
        $this->view->display(__DIR__ . '/../../../views/admin/default/page.php');
    }

    /*
     * Метод actionSave
     * Сохраняет статью в БД
     */
    protected function actionSave()
    {
        if (!empty($_POST['title']) && !empty($_POST['meta_d']) && !empty($_POST['meta_k']) && !empty($_POST['text'])) {
            $item = Page::findByName('contacts');
            $item->fill($_POST);

            if (true === $item->save()) {
                header('Location: /admin/contacts');
                die();
            }
        }
    }
}