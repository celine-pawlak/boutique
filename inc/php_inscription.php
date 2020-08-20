<?php
    require '../class/database.php';
    $bdd = new Database('boutique', 'root', '');
    $test = $bdd->query('SELECT COUNT(id) FROM utilisateur', [])->fetch();
?>