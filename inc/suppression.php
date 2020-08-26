<?php
    require_once '../class/App.php';
    require_once '../class/Database.php';
    $bdd = App::getDatabase();

    if(isset($_GET['delPanier']))
        {
            $suppprodruit = $bdd->query('DELETE FROM panier WHERE id=?', [$_GET['delPanier']]);
            App::redirect('../panier.php');
        }
?>