<?php

namespace App;

use App\Traits\Singleton;

/*
 * Class Config
 * Хранит конфигурацию подключения к БД
 *
 * @package App
 */
class Config
{
    public $data = [];

    use Singleton;

    private function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }
}