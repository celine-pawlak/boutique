<?php
    require 'inc/initialisation.php';   
    $bdd = App::getDatabase();
    $panier = new class_panier($bdd);   
    
    
    // $_GET['id_produit'] = 1;
    // $_GET['quantite']= 3;

    if(isset($_GET['id_produit'], $_GET['quantite']))
        {
            $id_produit = $_GET['id_produit'];   
            $quantite = $_GET['quantite'];

            $produit_ajoute = $bdd->query('SELECT * FROM produits WHERE id=?', [$id_produit])->fetch();                        
            if(empty($produit_ajoute))
                {
                    Session::getInstance()->setFlash('danger', "Ce produit n'existe pas");                    
                }
            $panier->add($produit_ajoute->id, $quantite);//ajoute le porduit dans le panier avec la quantité sélectionnée              
        }        
    else
        die('pas encore de produits');  
        
        if(isset($_POST['panier']['quantite']))                             
            {
                $panier->recalcul();
            }
        
    
?> 