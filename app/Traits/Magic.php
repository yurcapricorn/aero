<?php

namespace App\Traits;

/*
 * trait Magic
 * Реализует магические методы __set(), __get() и __isset()
 *
 * @package App\Traits
 */
trait Magic
{
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}