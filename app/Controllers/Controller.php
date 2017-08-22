<?php

namespace App\Controllers;

use App\Views\View;
use App\Exceptions\NotFoundException;

/*
 * Class Controller
 * Класс контроллера
 *
 * @package App
 *
 * @property $view
 */
abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /*
     * Метод access
     * Устанавливает "флаг" доступа
     */
    protected function access($action)
    {
        return true;
    }

    /*
     * Метод action
     * Проверяет доступ и формирует полное имя action
     */
    public function action(string $name)
    {
        if ($this->access($name)) {
            $methodName = 'action' . $name;

            if (method_exists($this, $methodName)) {
                $this->$methodName();
            } else {
                $exc = new NotFoundException('Метод не найден!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        } else {
            header('HTTP/1.1 403 Forbidden', 403);
            die('Доступ запрещен!');
        }
    }
}