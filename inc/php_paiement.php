<?php
    require_once 'inc/initialisation.php';    
    $bdd = App::getDatabase();    
    Session::getInstance(); 
    if(Session::getInstance()->hasSession('accesPaiement'))
        {
           
        }
    else
        {
            Session::getInstance()->setFlash('warning', 'Vous devez renseinger une adresse de livraison');
            App::redirect('creer-compte.php');
        }
?>