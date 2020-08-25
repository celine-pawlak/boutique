<?php
    require 'inc/initialisation.php';
    $bdd = App::getDatabase();
    $panier = new class_panier;
    $panier->add(1, 1);
    $panier->add(1, 1);
    $panier->add(1, 3);
    $panier->add(2, 2);
    $panier->add(2, 2);
    $panier->add(3, 1);
    $panier->add(3, 1);

    if(!empty($_SESSION['panier']))
        {            
            var_dump($panier->getPanier());
        }
    else
        {

        }

?>