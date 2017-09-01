<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Controllers\Controller;
use App\Models\Page;
use App\Models\Article;
use App\Models\Author;
use App\Exceptions\UploaderException;
use App\Exceptions\NotFoundException;

/*
 * Class Admin\Index
 * Класс контроллера админ-панели Index
 *
 * @package App\Controllers\Admin
 */
class Uploader
{
    /* Имя формы */
    protected $formName;
    /* Данные о файле из массива $_FILES */
    protected $file;
    /* Имя нового файла */
    public $name;
    /* Путь для загрузки */
    public $path;
    /* Директория для загрузки */
    public $destination;
    /* Ошибка при загрузке */
    protected $error;
    /* Разрешенные типы файлов */
    protected static $allowedType = [
        'image/jpeg'  => 'jpg',
        'image/pjpeg' => 'jpg',
        'image/png'   => 'png',
        'image/x-png' => 'png',
        'image/gif'   => 'gif'
    ];
    /* Виды ошибок */
    protected static $errors = [
        1 => 'Размер принятого файла превысил максимально допустимый размер',
        2 => 'Размер загружаемого файла превысил значение',
        3 => 'Загружаемый файл был получен только частично',
        4 => 'Файл не был загружен',
        6 => 'Отсутствует временная папка',
        7 => 'Не удалось записать файл на диск',
        8 => 'Расширение остановило загрузку файла'
    ];

    public function __construct($formName)
    {
        $this->formName    = $formName;
        $this->file        = $_FILES[$this->formName];
        $this->destination = $_POST['dir'] . '/';
    }

    public function path($path)
    {
        $this->path = $path;
        return $this;
    }

    protected function getExtension(): string
    {
        return self::$allowedType[$this->file['type']];
    }

    protected function getFileName(): string
    {
        return bin2hex(random_bytes(10)) . '.' . $this->getExtension();
    }

    protected function checkDir()
    {
        if (empty($this->path)) {
            $exc = new UploaderException('Путь не задан');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        if (!is_dir($this->path . $this->destination)) {
            $exc = new UploaderException(sprintf('Директории %s не существует', $this->destination));
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        return true;
    }

    protected function checkFile()
    {
        if ('' === $this->file['name'] || '' === $this->file['type'] || 0 === $this->file['size']) {
            $exc = new UploaderException('Не передан файл для загрузки');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        if (0 !== $this->file['error']) {
            $exc = new UploaderException(self::$errors[$this->file['error']]);
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        if (!array_key_exists($this->file['type'], self::$allowedType)) {
            $exc = new UploaderException(sprintf('Файлы с типом %s не разрешенны к загрузке.', $this->file['type']));
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $type = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        if (!in_array($type, self::$allowedType, true)) {
            $exc = new UploaderException(sprintf('Файлы с расширением %s не разрешенны к загрузке.', $type));
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        if (5242880 < $this->file['size']) {
            $exc = new UploaderException('Слишком большой размер файла.');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        return true;
    }

    public function upload(): bool
    {
        if (true === $this->checkDir() && true === $this->checkFile()) {
            $this->name = $this->getFileName();
            if (false === move_uploaded_file($this->file['tmp_name'], $this->path . $this->destination . $this->name)) {
                $exc = new UploaderException('Невозможно перенести файл.');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
            return true;
        } else {
            return false;
        }
    }
}
