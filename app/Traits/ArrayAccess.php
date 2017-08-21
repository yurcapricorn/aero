<?php

namespace App\Traits;

/*
 * trait ArrayAccess
 * Реализация ArrayAccess
 * Делает возможным обращение к объекту как к массиву
 *
 * @package App\Traits
 */
trait ArrayAccess
{
    protected $data = [];

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}