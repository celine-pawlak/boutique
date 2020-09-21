<?php
    require_once 'inc/initialisation.php';    
    $bdd = App::getDatabase();    
    Session::getInstance();    

    // if(isset($_POST['valid_pay']))
    //     {
            $id_user = $_SESSION['current_user']['id'];
            $commande = $bdd->query('SELECT * FROM commandes WHERE id_utilisateurs=? ORDER BY id DESC LIMIT 1', [$id_user])->fetch();            

            $produits = $bdd->query('SELECT * FROM produits_commandes INNER JOIN produits ON produits_commandes.id_produit=produits.id WHERE num_commande=?', [$commande->numero])->fetchAll();            
    //     }
    // else
    //     App::redirect('index.php');
?>