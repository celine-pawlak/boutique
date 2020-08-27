<?php
     require_once 'inc/initialisation.php';    
     $bdd = App::getDatabase();    
     Session::getInstance(); 
    
    // Si l'utilisateur choisi la même adresse que celle de facturation
    if(isset($_POST['valid_adresse'], $_POST['meme_adresse']) && empty($_POST['adresse']) && empty($_POST['ville']) && empty($_POST['cp']))
        {            
            $adresse = $_SESSION['current_user']['adresse_facturation'];
            $ville = $_SESSION['current_user']['ville_facturation'];
            $cp = $_SESSION['current_user']['code_postal_facturation'];
            $id =$_SESSION['current_user']['id'];

            $adresseLivraison = $bdd->query('INSERT INTO utilisateurs (adresse_livraison, ville_livraison, code_postal_livraison) VALUES (?,?,?) WHERE id=?', [$adresse, $ville, $cp, $id]);
            Session::getInstance()->setFlash('success', "Adresse de livraison enregistrée"); 
            App::redirect('paiement.php');
        }
        //  Si l'utilisateur rentre une adresse différente de celle de facturation
    else if(isset($_POST['valid_adresse']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['cp']) && !isset($_POST['meme_adresse']))
        {            
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $cp = $_POST['cp'];
            $id =$_SESSION['current_user']['id'];

            $adresseLivraison = $bdd->query('INSERT INTO utilisateurs (adresse_livraison, ville_livraison, code_postal_livraison) VALUES (?,?,?) WHERE id=?', [$adresse, $ville, $cp, $id]);
            Session::getInstance()->setFlash('success', "Adresse de livraison enregistrée"); 
            App::redirect('paiement.php');
        }
        // Si l'utilisateur n'avait pas encore de compte
    if(isset($_POST['valid_compte']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['cp']))
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
                                    $telephone = $_POST['telephone'];
                                    $ville = $_POST['ville'];
                                    $cp = $_POST['cp'];
                                    $register = new Auth($bdd);
                                    $register->register_compte($login, $password, $email, $nom, $prenom, $adresse, $ville, $cp, $telephone, $adresse, $ville, $cp);
                                    Session::getInstance()->setFlash('success', "Compte créer"); 
                                    App::redirect('paiement.php');
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
?>