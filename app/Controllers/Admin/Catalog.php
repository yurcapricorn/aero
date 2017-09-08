<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Config;
use App\Models\Page;
use App\Models\Product;
use App\Models\Author;
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
}
