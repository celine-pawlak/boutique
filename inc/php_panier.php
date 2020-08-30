<?php   
// require_once '../class/App.php';   
// require_once '../class/Database.php'; 
// require_once '../class/session.php';
    $bdd = App::getDatabase();    
    Session::getInstance();

    $produitPanier = $bdd->query('SELECT panier.id_produit, produits.nom, prix, image_path, quantite, panier.id FROM panier INNER JOIN produits ON panier.id_produit = produits.id WHERE id_utilisateur=?', [$_SESSION['current_user']['id']])->fetchAll();    
    $prixPanier = $bdd->query('SELECT SUM(prix_total) as prix FROM panier WHERE id_utilisateur=?', [$_SESSION['current_user']['id']])->fetch();    
    
    $totalPanier = $prixPanier->prix;  
    
    
    
?>