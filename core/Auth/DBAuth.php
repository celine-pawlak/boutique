<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId(){
        if ($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
<<<<<<< HEAD
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare("SELECT * FROM utilisateurs WHERE username = ?", [$username], null, true);
=======
     * @param $password
     * @return boolean
     */
    public function login($email, $password)
    {
        $user = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = ?", [$email], null, true);
>>>>>>> test
        if ($user) {
            if (password_verify($password, $user->password)){
                $_SESSION['auth'] = $user;
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    public function admin()
    {
        if ($_SESSION['auth']->is_admin == 1){
            return true;
        }
        return false;
    }
}