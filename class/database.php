<?php
    class Database
        {
            private $pdo;
            public function __construct($db_name, $login, $password, $host='localhost')
                {
                    $this->pdo = new PDO ("mysql:dbname=$db_name;host=$host", $login, $password);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
                    $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                }
            public function query($query, $parametres)
                {
                    $requete = $this->pdo->prepare($query);
                    $requete->execute($parametres);
                    return $requete;
                }
        }
?>