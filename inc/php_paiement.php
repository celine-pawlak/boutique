<?php
    require_once 'inc/initialisation.php';    
    require_once 'class/fonction_preg.php';
    $bdd = App::getDatabase();    
    Session::getInstance(); 
    if(Session::getInstance()->hasSession('accesPaiement'))
        {
            $date_a = date('Y-m', strtotime('now'));
            if(isset($_POST['valid_pay']) && !empty($_POST['carte']) && !empty($_POST['date_p']) && !empty($_POST['crypto']))
                {
                    $carte = $_POST['carte'];
                    $date_p = $_POST['date_p'];
                    $crypto = $_POST['crypto']; 
                    $longueur = 4;                  

                    if(preg_match("#^[0-9]{4}[-/ ]?[0-9]{4}[-/ ]?[0-9]{4}[-/ ]?[0-9]{4}?$#", $carte))
                        {                   
                            if($date_p < $date_a)                    
                                {
                                    Session::getInstance()->setFlash('danger', 'La date est dépassée');
                                }
                            else
                                {
                                    if(preg_match("#^[0-9]{3}?$#", $crypto))
                                        {
                                            echo 'toto';
                                        }
                                    else
                                        {
                                            Session::getInstance()->setFlash('danger', "Le cryptogramme n'est pas valide");
                                        }
                                }
                        }
                }
            else if(isset($_POST['valid_pay']) && (empty($_POST['carte']) || empty($_POST['date_p']) || empty($_POST['crypto'])))
                {
                    $carte = $_POST['carte'];
                    $date_p = $_POST['date_p'];
                    $crypto = $_POST['crypto'];                  
                    Session::getInstance()->setFlash('danger', 'Veuillez remplir tous les champs');
                }
        }
    else
        {
            Session::getInstance()->setFlash('warning', 'Vous devez renseinger une adresse de livraison');
            App::redirect('creer-compte.php');
        }
?>