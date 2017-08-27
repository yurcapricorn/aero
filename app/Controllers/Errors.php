<?php

namespace App\Controllers;

use App\Models\Page;

/*
 * class Errors
 *
 * @package App\Controllers
 */
class Errors extends Controller
{
    /*
     * Выводит страницу с ошибкой, если доступ запрещен
     */
    protected function action403()
    {
        header('HTTP/1.1 403 Forbidden', 403);
        $this->view->page  = Page::findByName('error403');
        $this->view->display(__DIR__ . '/../../views/errors/error.php');
        die();
    }

    /*
     * Выводит страницу с ошибкой, если элемент не найден
     */
    protected function action404()
    {
        header('HTTP/1.1 404 Not Found', 404);
        $this->view->page  = Page::findByName('error404');
        $this->view->display(__DIR__ . '/../../views/errors/error.php');
        die();
    }

    /*
     * Выводит страницу с ошибкой, если проблемы с БД
     */
    protected function action500()
    {
        header('HTTP/1.1 500 Internal Server Error', 500);
        $this->view->display(__DIR__ . '/../../views/errors/error500.php');
        die();
    }
}