<?php

namespace App\Models;

use App\Logger;
use App\Exceptions\NotFoundException;

/*
 * Class Faq
 * Модель вопросов и ответов
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $date
 * @property int $author_id
 * @property string $header
 * @property Author $text
 */
class Faq extends Model
{
    protected static $table = 'faqs';

    public function __get($name)
    {
        if ($name === 'author' && null !== $this->author_id) {
            $author = Author::findById($this->author_id);
            if (empty($author)) {
                $exc = new NotFoundException('Автор не найден!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
            return $author;
        }
        return $this->data[$name];
    }

    public function filterId($id)
    {
        return (int)$id;
    }

    public function filterAuthor_id($id)
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