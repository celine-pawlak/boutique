<?php
    require 'inc/initialisation.php';
    require_once 'class/class_panier.php';
    $bdd = App::getDatabase();
    // $panier = new class_panier;

    // if(!isset($_SESSION['panier']))
        // {
            Session::getInstance()->setSession('panier', []);            
        // }
    // else
        // {
            // $_SESSION['panier'] = [1];
        // }
   add(1, 1);
   add(1, 1);
   add(1, 3);
   add(2, 2);
   add(2, 2);
   add(3, 1);
   add(3, 5);
   

    // if(!empty($_SESSION['panier']))
    //     {            
    //         $vuPanier = $panier->getPanier();    
    //     }    

?>