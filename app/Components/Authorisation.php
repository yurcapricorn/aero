<?php

namespace App\Components;

use App\Config;
use App\Exceptions\DbException;
use App\Logger;

/**
 * Class Authorisation
 * @package App\Components
 */
class Authorisation
{
    /**
     * @var \PDO
     */
    protected $dbh;

    /**
     * Authorisation constructor.
     */
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

    /**
     * @param $email
     * @param $pass
     * @return string
     */
    public function register($email, $pass)
    {
        $sth = $this->dbh->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
        $sth->execute([':email' => $email, ':password' => password_hash($pass, PASSWORD_DEFAULT)]);
        return $this->dbh->lastInsertId();
    }

    /**
     * @param $email
     * @param $pass
     * @return bool
     */
    public function authenticate($email, $pass)
    {
        $user = $this->isEmailExist($email);
        if (!empty($user) && password_verify($pass, $user['password']) === true) {
            return $user['id'];
        }
        return false;
    }

    public function isEmailExist($email){
        $sth = $this->dbh->prepare('SELECT * FROM user WHERE email=:email');
        $sth->execute([':email' => $email]);
        $user = $sth->fetch();
        if (!empty($user)){
            return $user;
        }
        return false;
    }

    /**
     * @param $user_id
     */
    public function setUserSession($user_id)
    {
        $session_id = hash('sha256', microtime(true) . uniqid());
        $sth = $this->dbh->prepare('UPDATE user SET session_id=:session_id WHERE id=:id');
        $sth->execute([':session_id' => $session_id, ':id' => $user_id]);
        setcookie('MYSESSID', $session_id);
    }

    /**
     * @return mixed|null
     */
    public function getCurrentUser()
    {
        $session_id = $_COOKIE['MYSESSID'] ?? null;
        if (empty($session_id)) {
            return null;
        } else {
            $sth = $this->dbh->prepare('SELECT * FROM user WHERE session_id=:session_id');
            $sth->execute([':session_id' => $session_id]);
            $user = $sth->fetch();
            if (empty($user)) {
                return null;
            } else {
                return $user;
            }
        }
    }
}