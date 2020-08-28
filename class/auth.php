<?php
    class Auth
        {
            private $bdd;
            public function __construct($bdd)
                {
                    $this->bdd = $bdd;
                }
            public function register($username, $password, $email, $nom, $prenom, $adresse, $ville, $cp, $telephone=null)
                {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $token = Str::random(60);
                    $this->bdd->query("INSERT INTO utilisateurs SET username = ?, password = ?, email = ?, remember_token = ?, nom = ?, prenom = ?, adresse_facturation = ?, ville_facturation = ?, code_postal_facturation = ?, telephone=?", 
                    [
                        $username,
                        $password,
                        $email,
                        $token,
                        $nom, 
                        $prenom,
                        $adresse, 
                        $ville, 
                        $cp,
                        $telephone
                    ]);                    
                }
            public function register_compte($username, $password, $email, $nom, $prenom, $adresse, $ville, $cp, $telephone, $adresse_l, $ville_l, $cp_l)
                {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $token = Str::random(60);
                    $this->bdd->query("INSERT INTO utilisateurs SET username = ?, password = ?, email = ?, remember_token = ?, nom = ?, prenom = ?, adresse_facturation = ?, ville_facturation = ?, code_postal_facturation = ?, telephone=?, adresse_livraison=?, ville_livraison=?, code_postal_livraison=?", 
                    [
                        $username,
                        $password,
                        $email,
                        $token,
                        $nom, 
                        $prenom,
                        $adresse, 
                        $ville, 
                        $cp,
                        $telephone,
                        $adresse_l,
                        $ville_l,
                        $cp_l
                    ]);                    
                }
            public function update_livraison($adresse, $ville, $cp, $id)
                {
                    $this->bdd->query("UPDATE utilisateurs SET adresse_livraison=?, ville_livraison=?, code_postal_livraison=? WHERE id=?", 
                    [$adresse, $ville, $cp, $id]);
                }
        }
?>