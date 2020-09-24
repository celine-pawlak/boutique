<?php
     require_once 'inc/initialisation.php';    
     $bdd = App::getDatabase();    
     Session::getInstance(); 

     if(!isset($_SESSION['current_user']))
        {
            App::redirect('connexion.php');
        }

     if(isset($_POST['retour_panier']))
        {
            $_SESSION['retour_panier'] = $_POST['retour_panier'];
            App::redirect('verification.php');
        }
    
    // Si l'utilisateur choisi la même adresse que celle de facturation
    if(isset($_POST['valid_adresse'], $_POST['meme_adresse']) && empty($_POST['adresse']) && empty($_POST['ville']) && empty($_POST['cp']))
        {            
            
            $adresse = $_SESSION['current_user']['adresse_facturation'];
            $ville = $_SESSION['current_user']['ville_facturation'];
            $cp = $_SESSION['current_user']['code_postal_facturation'];
            $id =$_SESSION['current_user']['id'];

            $adresseLivraison = new Auth($bdd);
            $adresseLivraison->update_livraison($adresse, $ville, $cp, $id);  
            $isUser = $bdd->query('SELECT * FROM utilisateurs WHERE id=?', [$id])->fetch(PDO::FETCH_ASSOC);            
            Session::getInstance()->setSession('current_user', $isUser); 
            Session::getInstance()->setSession('accesPaiement', true);
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
            $adresseLivraison = new Auth($bdd);
            $adresseLivraison->update_livraison($adresse, $ville, $cp, $id); 
            //Update les données de la sesion user
            $isUser = $bdd->query('SELECT * FROM utilisateurs WHERE id=?', [$id])->fetch(PDO::FETCH_ASSOC);            
            Session::getInstance()->setSession('current_user', $isUser);                         
            Session::getInstance()->setSession('accesPaiement', true);           
            Session::getInstance()->setFlash('success', "Adresse de livraison enregistrée"); 
            App::redirect('paiement.php');
        }
    else if(isset($_POST['valid_adresse']) && (empty($_POST['adresse']) || empty($_POST['ville']) || empty($_POST['cp']) || isset($_POST['meme_adresse'])))
        {
            Session::getInstance()->setFlash('warning', "Veuilliez remplir tous les champs ogligatoires");
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
                                    $isUser = $bdd->query('SELECT * FROM utilisateurs WHERE id=?', [$id])->fetch(PDO::FETCH_ASSOC);            
                                    Session::getInstance()->setSession('current_user', $isUser);
                                    Session::getInstance()->setSession('accesPaiement', true);
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