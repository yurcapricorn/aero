<?php

namespace App;

use App\Exceptions\DbException;

/*
 * Class Db
 * Класс базы данных
 *
 * @package App
 */
class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::getInstance()->data;
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'];
        try {
            $this->dbh = new \PDO($dsn, $config['db']['user'], $config['db']['password']);
        } catch (\PDOException $e) {
            $exc = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->emergency($exc);
            throw $exc;
        }
    }

    /*
     * Выполняет запрос к БД
     *
     * @param string $sql
     * @param string $class
     * @param array $params
     * @return mixed
     */
    public function query(string $sql, string $class, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            $exc = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->error($exc);
            throw $exc;
        }
    }
    /*
     * Выполняет запрос к БД. Генерирует запись за записью из ответа сервера базы данных, не делая fetchAll(), а построчно исполняя fetch()
     *
     * @param string $sql
     * @param string $class
     * @param array $params
     * @return mixed
     */
    public function queryEach(string $sql, string $class, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);

            while ($row = $sth->fetch()) {
                yield $row;
            };
        } catch (\PDOException $e) {
            $exc = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->error($exc);
            throw $exc;
        }
    }

    /*
     * Выполняет запрос к БД
     *
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        try {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        } catch (\PDOException $e) {
            $exc = new DbException($e->getMessage(), $e->getCode());
            Logger::getInstance()->error($exc);
            throw $exc;
        }
    }

    /*
     * Возвращает последний вставленный в БД id
     *
     * @return int
     */
    public function lastInsertId(): int
    {
        return $this->dbh->lastInsertId();
    }
}