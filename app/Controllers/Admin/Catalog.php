<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Config;
use App\Models\Page;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Controllers\Controller;
use App\Components\Uploader;
use App\Components\ImageProcessor;
use App\Exceptions\DbException;
use App\Exceptions\NotFoundException;
use App\Exceptions\UploaderException;

/*
 * Class Admin\Catalog
 * Класс контроллера админ-панели Catalog
 *
 * @package App\Controllers\Admin
 */
class Catalog extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех товаров
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('catalog');
        $this->view->items = Product::findAll();
        $this->view->display(__DIR__ . '/../../../views/admin/default/catalog.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму добавления/редактирования товара
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $this->view->item = Product::findById((int)$_GET['id'] ?? null);
            if (empty($this->view->item)) {
                $exc = new NotFoundException('Новость не найдена!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }
        $this->view->page    = Page::findByName('catalog');
        $this->view->vendors = Vendor::findAll();
        $this->view->categories = Category::findAll();
        $this->view->display(__DIR__ . '/../../../views/admin/default/product.php');
    }
}
