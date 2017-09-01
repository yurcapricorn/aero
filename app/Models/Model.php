<?php

namespace App\Models;

use App\Db;
use App\Traits\Magic;
use App\Exceptions\MultiExceptions;

/*
 * Class Model
 * Класс модели
 *
 * @package App\Models
 *
 * @property int $id
 */
abstract class Model
{
    protected static $table = null;

    use Magic;

    /*
     * Находит и возвращает все записи из БД
     *
     * @return mixed
     */
    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id';

        $db = new Db();
        $data = $db->query($sql, static::class);
        if (empty($data)) {
            return false;
        }
        return $data;
    }

    /*
     * Находит и возвращает все записи из БД в обратном порядке
     *
     * @return mixed
     */
    public static function findAllLast()
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';

        $db = new Db();
        $data = $db->query($sql, static::class);
        if (empty($data)) {
            return false;
        }
        return $data;
    }

    /*
     * Находит и возвращает все записи из БД по-строчно
     *
     * @return mixed
     */
    public static function findAllLines()
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';

        $db = new Db();
        $data = $db->queryEach($sql, static::class);
        if (empty($data)) {
            return false;
        }
        return $data;
    }

    /*
     * Находит и возвращает последние записи из БД
     * отсортированные по id в обратном порядке
     *
     * @param int $count
     * @return mixed
     */
    public static function findLatest(int $count): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count;

        $db = new Db();
        $data = $db->query($sql, static::class);
        if (empty($data)) {
            return false;
        }
        return $data;
    }

    /*
     * Находит и возвращает одну запись из БД
     *
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $params = [
            ':id' => $id
        ];

        $db = new Db();
        $data = $db->query($sql, static::class, $params);
        if (empty($data)) {
            return null;
        }
        return array_shift($data);
    }

    /*
     * Находит и возвращает одну запись из БД
     *
     * @param string $name
     * @return mixed
     */
    public static function findByName(string $name)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE name=:name';
        $params = [
            ':name' => $name
        ];

        $db = new Db();
        $data = $db->query($sql, static::class, $params);
        if (empty($data)) {
            return null;
        }
        return array_shift($data);
    }

    /*
     * Добавляет запись в БД
     *
     * @return bool
     */
    public function insert(): bool
    {
        $cols = [];
        $params = [];
        foreach ($this->data as $key => $val){
            $cols[] = $key;
            $params[':' . $key] = $val;
        }
        $sql =  'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . ':' . implode(', :', $cols) . ')';

        $db = new Db();
        $result = $db->execute($sql, $params);
        $this->id = $db->lastInsertId();
        return $result;
    }

    /*
     * Обновляет запись в БД
     *
     * @return bool
     */
    public function update(): bool
    {
        $binds = [];
        $params = [];
        foreach ($this->data as $key => $val) {
            if ('id' !== $key) {
                $binds[] = $key . '=:' . $key;
            }
            $params[':' . $key] = $val;
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $binds) . ' WHERE id=:id';

        $db = new Db();
        return $db->execute($sql, $params);
    }

    /*
     * Сохраняет запись в БД
     *
     * @return bool
     */
    public function save(): bool
    {
        if (true === $this->isNew()) {
            return $this->insert();
        }
        return $this->update();
    }

    /*
     * Удаляет запись из БД
     *
     * @return bool
     */
    public function delete(): bool
    {
        $params = [
            ':id' => $this->id
        ];
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

        $db = new Db();
        return $db->execute($sql, $params);
    }

    /*
     * Проверяет добавляется новый элемент или редактируется существующий
     *
     * @return bool
     */
    public function isNew() {
        return empty($this->id);
    }

    /*
     * Заполняет свойства модели данными из массива
     *
     * @param array $data
     */
    public function fill(array $data)
    {
        $errors = new MultiExceptions();

        foreach ($data as $key => $value) {

            $method = 'filter' . ucfirst($key);
            if (method_exists($this, $method)) {
                $value = $this->$method($value);
            }

            try {
                $this->$key = $value;
            } catch(\Exception $e) {
                $errors->add($e);
            }
        }

        if (!$errors->empty()) {
            throw $errors;
        }

        return $this;
    }
}