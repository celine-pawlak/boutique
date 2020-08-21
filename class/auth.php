<?php
    class Auth
        {
            private $bdd;
            public function __construct($bdd)
                {
                    $this->bdd = $bdd;
                }
            public function register($username, $password, $email, $nom, $prenom, $adresse, $ville, $cp)
                {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $token = Str::random(60);
                    $this->bdd->query("INSERT INTO utilisateurs SET username = ?, password = ?, email = ?, remember_token = ?, nom = ?, prenom = ?, adresse_facturation = ?, ville_factuation = ?, code_postal_faturation = ?", 
                    [
                        $username,
                        $password,
                        $email,
                        $token,
                        $nom, 
                        $prenom,
                        $adresse, 
                        $ville, 
                        $cp
                    ]);                    
                }
        }
?>