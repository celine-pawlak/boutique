<?php
    require_once 'inc/initialisation.php';    
    $bdd = App::getDatabase();    
    Session::getInstance();    

    if(isset($_POST['valid_panier']))
        {           
            $produitPanier = $bdd->query('SELECT panier.id_produit, produits.nom, prix, image_path, quantite, panier.id FROM panier INNER JOIN produits ON panier.id_produit = produits.id WHERE id_utilisateur=?', [$_SESSION['current_user']['id']])->fetchAll();    
            $prixPanier = $bdd->query('SELECT SUM(prix_total) as prix FROM panier WHERE id_utilisateur=?', [$_SESSION['current_user']['id']])->fetch();    
            
            $totalPanier = $prixPanier->prix; 
            Session::getInstance()->setSession('prixpanier', $totalPanier);           
            $produitPanier = $bdd->query('SELECT panier.id_produit, produits.nom, prix, image_path, quantite, panier.id FROM panier INNER JOIN produits ON panier.id_produit = produits.id WHERE id_utilisateur=?', [$_SESSION['current_user']['id']])->fetchAll();               
        }
    else
        {
            App::redirect('panier.php');
        }
?>