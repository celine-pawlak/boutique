<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController
{

    protected $auth = '';

    public function login()
    {
        $errors = false;
        if (!empty($_POST)) {
            if (empty($auth)){
                $auth = new DBAuth(App::getInstance()->getDb());
            }else{
                $auth = $this->auth;
            }
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('location:index.php?p=admin.products.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    public function isLogged(){
        if (empty($auth)){
            $auth = new DBAuth(App::getInstance()->getDb());
        }else{
            $auth = $this->auth;
        }
        return $auth->logged();
    }

}