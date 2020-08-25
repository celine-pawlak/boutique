<?php
    require 'inc/initialisation.php';    
    $bdd = App::getDatabase();
    $panier = new class_panier;

    if(isset($_GET['id_produit'], $_GET['quantite_produit']))
        {
            $id_prodduit = $_GET['id_produit'];
            $quantite_produit = $_GET['quantite_produit'];

            $session_panier = $panier->add($id_prodduit, $quantite_produit, $bdd);
        }    
        // $panier->add(1,1, $bdd);        

?>