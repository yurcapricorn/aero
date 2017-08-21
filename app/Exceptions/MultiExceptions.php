<?php

namespace App\Exceptions;

class MultiExceptions
    extends \Exception
{
    protected $data = [];

    public function add(\Throwable $e)
    {
        $this->data[] = $e;
    }

    public function all()
    {
        return $this->data;
    }

    public function empty() {
        return empty($this->data);
    }
}