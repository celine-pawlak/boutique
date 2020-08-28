<?php
    require_once 'inc/initialisation.php';        
    $bdd = App::getDatabase();    
    Session::getInstance(); 
    if(Session::getInstance()->hasSession('accesPaiement'))
        {
            $date_min = date('Y-m', strtotime('now'));
            $mois_min = date('m', strtotime('now'));
            if(isset($_POST['valid_pay']) && !empty($_POST['carte']) && !empty($_POST['date_p']) && !empty($_POST['crypto']))
                {
                    $carte = $_POST['carte'];
                    $date_p = $_POST['date_p'];
                    $crypto = $_POST['crypto']; 
                    $longueur = 4;        
                    $id_user = $_SESSION['current_user']['id'];           

                    if(preg_match("#^[0-9]{4}[-/ ]?[0-9]{4}[-/ ]?[0-9]{4}[-/ ]?[0-9]{4}?$#", $carte))
                        {                                              
                            if(preg_match("#^[2]{1}?[0-9]{3}?#", $date_p) && ($date_p >= $date_min))
                                {
                                    if(preg_match("#^[0-9]{3}?$#", $crypto))
                                        {
                                            $panier_user = $bdd->query('SELECT * FROM panier WHERE id_utilisateur=?', [$id_user])->fetchAll();
                                            var_dump($panier_user);
                                            foreach($panier_user as $nombre => $produit)
                                                {
                                                    echo $produit->id;
                                                }
                                            //transferer les données du pannier dans commande et produit commandé
                                            //Vider le panier de l'utilisateur
                                            //rediriger vers la page confirmation
                                            //décrémenter le stock des produits commandé
                                        }
                                    else                                        
                                            Session::getInstance()->setFlash('danger', "Le cryptogramme n'est pas valide");                                        
                                }
                            else                                
                                    Session::getInstance()->setFlash('danger', 'La date est dépassée ou invalide');                                                                                                                         
                        }
                    else
                        Session::getInstance()->setFlash('danger', "Le format de la carte n'est pas valide");   
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