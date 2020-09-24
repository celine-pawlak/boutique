<?php
    require_once 'inc/initialisation.php';    
    $bdd = App::getDatabase();    
    Session::getInstance();    

    if(isset($_POST['valid_panier']) || isset($_SESSION['retour_panier']))
        {                       
            unset($_SESSION['retour_panier']);
        }
    else
        {
            App::redirect('panier.php');
        }
?>