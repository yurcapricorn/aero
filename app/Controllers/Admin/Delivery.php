<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Models\Page;
use App\Controllers\Controller;
use App\Exceptions\NotFoundException;

/*
 * Class Company
 * Класс контроллера Company
 *
 * @package App\Controllers
 */
class Delivery extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('delivery');
        $this->view->display(__DIR__ . '/../../../views/admin/page.php');
    }

    /*
     * Метод actionSave
     * Сохраняет статью в БД
     */
    protected function actionSave()
    {
        if (!empty($_POST['title']) && !empty($_POST['meta_d']) && !empty($_POST['meta_k']) && !empty($_POST['text'])) {
            $item = Page::findByName('delivery');
            $item->fill($_POST);

            if (true === $item->save()) {
                header('Location: /admin/delivery');
                die();
            }
        }
    }
}
