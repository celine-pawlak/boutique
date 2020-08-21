<?php
    class Auth
        {
            private $bdd;
            public function __construct($bdd)
                {
                    $this->bdd = $bdd;
                }
            public function register($username, $password, $email)
                {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $token = Str::random(60);
                    $this->bdd->query("INSERT INTO utilisateurs SET username = ?, password = ?, email = ?, remember_token = ?", 
                    [
                        $username,
                        $password,
                        $email,
                        $token
                    ]);                    
                }
        }
?>