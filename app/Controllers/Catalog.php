<?php

namespace App\Controllers;

use App\Logger;
use App\Models\Page;
use App\Models\Product;
use App\Exceptions\NotFoundException;

/*
 * Class Catalog
 * Класс контроллера Catalog
 *
 * @package App\Controllers
 */
class Catalog extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех товаров
     */
    protected function actionDefault()
    {
        $this->view->items = Product::findAll();
        $this->view->page  = Page::findByName('catalog');
        $this->view->display(__DIR__ . '/../../views/default/catalog.php');
    }

    /*
     * Метод actionShow
     * Выводит один конкретный товар
     */
    protected function actionShow()
    {
        $this->view->item  = Product::findById($_GET['id']);
        $this->view->page  = Page::findByName('catalog');

        if (empty($this->view->item)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $this->view->display(__DIR__ . '/../../views/default/product.php');
    }
}
