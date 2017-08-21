<?php

namespace App\Traits;

/*
 * trait Iterator
 * Реализует интерфейс Iterator
 *
 * @package App\Traits
 */
trait Iterator
{
    protected $data = [];

    /*
     * Возвращает значение на который указывает внутренний указатель
     *
     *  @return mixed
     */
    function current() {
        return current($this->data);
    }

    /*
     * Сдвигает внутренний указатель на следующий элемент
     *
     * @return mixed
     */
    function next() {
        return next($this->data);
    }

    /*
     * Возвращает ключ на который указывает внутренний указатель
     *
     * @return mixed
     */
    function key() {
        return key($this->data);
    }

    /*
     * Проверяет не вышел ли внутренний указатель за пределы массива
     *
     * @return bool
     */
    function valid() {
        return key($this->data) !== null;
    }

    /*
     * Сбрасывает внутренний указатель
     *
     * @return mixed
     */
    function rewind() {
        return reset($this->data);
    }
}