<?php
   require_once '../class/App.php';   
   require_once '../class/Database.php'; 
   require_once '../class/session.php';
   $bdd = App::getDatabase();
       
    if(isset($_GET['id_utilisateur'], $_GET['id_produit'], $_GET['quantite']))
        {
            $id_user = $_GET['id_utilisateur'];
            $id_produit = $_GET['id_produit'];
            $quantite = $_GET['quantite'];

            $inStock = $bdd->query('SELECT quantite FROM produits WHERE id=?', [$id_produit])->fetch();
            
            if($inStock->quantite == 0)
                {
                    Session::getInstance()->setFlash('danger', "Il n'y a plus de stock pour ce produit");
                    App::redirect('../panier.php');
                }
            else
                {
                    $addpanier = $bdd->query('INSERT INTO panier (id_utilisateur, id_produit, quantite) VALUES (?,?,?)', [$id_user, $id_produit, $quantite]);
                    $moinsStock = ($inStock->quantite - $quantite);
                    $destock = $bdd->query('UPDATE produits SET quantite=? WHERE id=?', [$moinsStock, $id_produit]);
                    Session::getInstance()->setFlash('success', 'Produit ajouté au panier');
                    App::redirect('../panier.php');
                }

        }        
    else
       echo 'tata';
                
        
    
?> 