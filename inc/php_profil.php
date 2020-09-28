<?php
    require_once 'inc/initialisation.php';
    require_once 'fonctions/fonction_pagination.php';

    if(Session::getInstance()->hasSession('current_user'))
        {           
            $bdd = App::getDatabase();

            // Partie modification de profil
            $id = $_SESSION['current_user']['id'];
            $now_password = $_SESSION['current_user']['password'];
            $info_user = $bdd->query('SELECT * FROM utilisateurs WHERE id=?', [$id])->fetch(PDO::FETCH_ASSOC);
            if(isset($_POST['valid_modif']) && !empty($_POST['now_password']) && !empty($_POST['username']) && !empty($_POST['email']))
                {
                    if(password_verify($_POST['now_password'], $now_password))
                        {
                            $username = $_POST['username'];
                            $email = $_POST['email'];                            
                            $isLoginFree = $bdd->query('SELECT * FROM utilisateurs WHERE username = ? OR email = ?', [$username, $email]);
                            //Vérifie que l'username n'est pas déjà prit ou qu'il est le même que celui de la session en cours et l'insère dans la bdd
                            if(empty($isLoginFree) || $username = $_SESSION['current_user']['username'])
                                {
                                    $new_username = $_POST['username'];
                                    //Vérifie que le email n'est pas déjà prit ou qu'il est le même que celui de la session en cours et l'insère dans la bdd
                                    if(empty($isLoginFree) || $username = $_SESSION['current_user']['email'])
                                        {
                                            $new_email = $_POST['email'];
                                            if(!empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['cp']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
                                                {
                                                    $new_adresse = $_POST['adresse'];
                                                    $new_ville = $_POST['ville'];                                                    
                                                    $new_nom = $_POST['nom'];
                                                    $new_prenom = $_POST['prenom'];
                                                    $new_cp = $_POST['cp'];
                                                    $new_telephone = (!empty($_POST['telephone'] && (is_int($_POST['telephone']) == true))?$_POST['telephone'] : null);                                                   
                                                    
                                                    //Met à jour les info de l'utilisateur dans la bdd et les info de la session en cours
                                                    $insert_info = $bdd->query('UPDATE utilisateurs SET username = ?, email = ?, adresse_facturation = ?, ville_facturation = ?, code_postal_facturation = ?, telephone = ?, nom = ?, prenom = ? WHERE id = ?', 
                                                    [
                                                        $new_username,
                                                        $new_email,
                                                        $new_adresse,
                                                        $new_ville,
                                                        $new_cp,
                                                        $new_telephone,
                                                        $new_nom,
                                                        $new_prenom,
                                                        $id
                                                    ]);
                                                    $_SESSION['current_user']['username'] = $new_username;
                                                    $_SESSION['current_user']['email'] = $new_email;
                                                    $_SESSION['current_user']['adresse_facturation'] = $new_adresse;
                                                    $_SESSION['current_user']['ville_facturation'] = $new_ville;
                                                    $_SESSION['current_user']['code_postal_facturation'] = $new_cp;
                                                    $_SESSION['current_user']['telephone'] = $new_telephone;
                                                    $_SESSION['current_user']['nom'] = $new_nom;
                                                    $_SESSION['current_user']['prenom'] = $new_prenom;
                                                    Session::getInstance()->setFlash('success', "Modification des informations prise en compte");
                                                }
                                                    else                                                        
                                                            Session::getInstance()->setFlash('danger', "Code postal: mauvais format");                                                                                                                                                                                                                                                              
                                        }
                                    else
                                        Session::getInstance()->setFlash('danger', "Cet email correspond à un autre compte");
                                }
                            else
                                Session::getInstance()->setFlash('danger', "Ce Pseudo est déjà prit");
                            //Vérifie le nouveau mot de passe et l'insère dans la bdd
                            if(!empty($_POST['password']) && !empty($_POST['password_confirm']))
                                {
                                    if($_POST['password'] == $_POST['password_confirm'])
                                        {                                    
                                            $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                                            $update_password = $bdd->query('UPDATE utilisateurs SET password = ? WHERE id = ?' ,
                                            [
                                                $new_password,
                                                $id
                                            ]);
                                            $_SESSION['current_user']['password'] = $new_password;
                                            Session::getInstance()->setFlash('success', "Modification de mot de passe prise en compte");
                                        }
                                    else
                                        Session::getInstance()->setFlash('danger', "Les mot de passe ne correspondent pas");
                                }                            
                        }
                    else
                        Session::getInstance()->setFlash('danger', "Le mot de passe actuel n'est pas bon");
                }      
                
            // Partie Historique des achats
                // Récupère les commandes de l'utilisateur et prépare pour la pagination                
                $get_page = (isset($_GET["commande"])? $_GET["commande"] : 1);
                $infos_commandes = prepaPagination(5, 'commandes', $get_page, 'date_commande', $bdd, 'id_utilisateurs', $id);                                
                $pp = $infos_commandes['par_page'];
                $nb_total = $infos_commandes['nb_total'];
                $nb_page = $infos_commandes['nb_page'];
                $page = $infos_commandes['page'];   
        }
    else
        {
            App::redirect('index.php');
        }
?>