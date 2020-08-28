<?php
    require_once 'inc/initialisation.php'; //permet de require tous les fichiers class nécessaires

    if(Session::getInstance()->hasSession('current_user'))
        {
            App::redirect('index.php');
        }
    else
        {
            $bdd = App::getDatabase(); //pour créer une connection à la bdd

                if(isset($_POST['valid_insc']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['cp']))
                    {           
                        $login = $_POST['username'];
                        $islogin = $bdd->query("SELECT * FROM utilisateurs WHERE username = ?", [$login])->fetch();
                        
                        if(empty($islogin))
                            {
                                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                                    {
                                        if($_POST['password'] == $_POST['password_confirm'])
                                            {
                                                $password = $_POST['password'];
                                                $email = $_POST['email'];
                                                $nom = $_POST['nom'];
                                                $prenom = $_POST['prenom'];
                                                $adresse = $_POST['adresse'];
                                                $ville = $_POST['ville'];
                                                $cp = $_POST['cp'];
                                                $register = new Auth($bdd);
                                                $register->register($login, $password, $email, $nom, $prenom, $adresse, $ville, $cp);
                                                Session::getInstance()->setFlash('success', "Inscription prise en compte"); 
                                                App::redirect('connexion.php');
                                            }
                                        else                                
                                            Session::getInstance()->setFlash('danger', "Les mots de passe ne sont pas identiques");                                
                                    }
                                else    
                                    Session::getInstance()->setFlash('danger', "Le mail n'est pas valide");
                            }
                        else                
                            Session::getInstance()->setFlash('danger', "Ce login existe déjà");                
                    }
                else if(isset($_POST['valid_insc']) && (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) || empty($_POST['ville']) || empty($_POST['cp'])))
                    {
                        Session::getInstance()->setFlash('danger', "Veuilliez remplir tous les champs ogligatoires");
                    }
        }
    
?>