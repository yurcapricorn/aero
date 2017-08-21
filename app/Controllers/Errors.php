<?php

namespace App\Controllers;

use App\Controller;

/*
 * class Errors
 *
 * @package App\Controllers
 */
class Errors
    extends Controller
{
    /*
     * Выводит страницу с ошибкой, если доступ запрещен
     */
    protected function action403()
    {
        header('HTTP/1.1 403 Forbidden', 403);
        $this->view->display(__DIR__ . '/../../templates/errors/403.php');
        die();
    }

    /*
     * Выводит страницу с ошибкой, если элемент не найден
     */
    protected function action404()
    {
        header('HTTP/1.1 404 Not Found', 404);
        $this->view->display(__DIR__ . '/../../templates/errors/404.php');
        die();
    }

    /*
     * Выводит страницу с ошибкой, если проблемы с БД
     */
    protected function action500()
    {
        header('HTTP/1.1 500 Internal Server Error', 500);
        $this->view->display(__DIR__ . '/../../templates/errors/500.php');
        die();
    }
}