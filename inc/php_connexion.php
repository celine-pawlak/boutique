<?php
    require_once 'inc/initialisation.php';    
    $bdd = App::getDatabase();
    if(Session::getInstance()->hasCurrentUser())
        {            
            App::redirect('index.php');
        }
    else
        {
            if(isset($_POST['valid_con']) && !empty($_POST['login']) && !empty($_POST['password']))
                {
                    $login = $_POST['login'];
                    $password = $_POST['password'];

                    $sisUser = $bdd->query('SELECT * FROM utilisateurs WHERE username = ? OR email = ?', [$login, $login])->fetch(PDO::FETCH_ASSOC);
                    
                    if(!empty($isUser))
                        {                                                       
                            if(password_verify($password, $isUser['password']))
                                {                                                                                                         
                                    Session::getInstance()->setFlash('success', "Vous êtes maintenant connecté"); 
                                    Session::getInstance()->setSession('current_user', $isUser);                                                                                                        
                                    App::redirect('index.php');                                                                        
                                }
                            else
                                Session::getInstance()->setFlash('danger', "Ce n'est pas le bon mot de passe"); 
                        }
                    else
                        Session::getInstance()->setFlash('danger', "Ce login ou email n'existe pas"); 
                }
        }
?>