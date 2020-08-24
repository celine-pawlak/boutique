<?php
    require 'inc/initialisation.php';
    $bdd = App::getDatabase();
    $panier = new class_panier;

    if(isset($_GET['id_produit']))
        {
            $produit_ajoute = $bdd->query('SELECT * FROM produits WHERE id=?', [$_GET['id_produit']])->fetch();                        
            if(empty($produit_ajoute))
                {
                    Session::getInstance()->setFlash('danger', "Ce produit n'existe pas");                    
                }
            $panier->add($produit_ajoute->id);
            Session::getInstance()->setFlash('success', "Produit bien ajouté au panier");                    
        }
    else
        die('pas encore de produits');
?>