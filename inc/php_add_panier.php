<?php
    require 'inc/initialisation.php';
    $bdd = App::getDatabase();
    $panier = new class_panier;

    if(isset($_GET['id_produit']))
        {
            $produit_ajoute = $bdd->query('SELECT * FROM produits WHERE id=?', [$_GET['id_produit']])->fetch();            
            var_dump($produit_ajoute);
            if(empty($produit_ajoute))
                {
                    Session::getInstance()->setFlash('danger', "Ce produit n'existe pas");                    
                }
            $panier->add($produit_ajoute->id);
        }
    else
        die('pas encore de produits');
?>