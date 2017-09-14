<?php

namespace App\Components;

use App\Db;
use App\Models\User;

/**
 * Class Authorisation
 * @package App\Components
 */
class Authorisation
{
    /**
     * @var Db
     */
    protected $db;

    /**
     * Authorisation constructor.
     */
    public function __construct()
    {
        $this->db = new Db();
    }

    /**
     * @param $email
     * @param $pass
     * @return bool
     */
    public function authenticate($email, $pass)
    {
        $user = $this->isEmailExist($email);
        if (!empty($user) && password_verify($pass, $user->password) === true) {
            return $user->id;
        }
        return false;
    }

    public function isEmailExist($email)
    {

        $users = $this->db->query('SELECT * FROM user WHERE email=:email', User::class, [':email' => $email]);
        if (!empty($users)) {
            return $users[0];
        }
        return false;
    }

    /**
     * @param $user_id
     */
    public function setUserSession($user_id)
    {
        $session_id = hash('sha256', microtime(true) . uniqid());
        $this->db->execute('UPDATE user SET session_id=:session_id WHERE id=:id', [':session_id' => $session_id, ':id' => $user_id]);
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
            $users = $this->db->query('SELECT * FROM user WHERE session_id=:session_id', User::class, [':session_id' => $session_id]);
            if (empty($users)) {
                return null;
            } else {
                return $users[0];
            }
        }
    }
}