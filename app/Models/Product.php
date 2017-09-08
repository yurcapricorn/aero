<?php

namespace App\Models;

use App\Logger;
use App\Exceptions\NotFoundException;

/*
 * Class Product
 * Модель товара
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $date
 * @property int $author_id
 * @property string $header
 * @property Author $text
 */
class Product extends Model
{
    protected static $table = 'product';

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function filterId($id)
    {
        return (int)$id;
    }

    public function filterHeader($header)
    {
        return strip_tags(trim($header));
    }

    public function filterText($text)
    {
        return strip_tags(trim($text), '<p><br>');
    }
}
