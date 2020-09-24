<?php
    require_once 'inc/initialisation.php';        
    $bdd = App::getDatabase();    
    Session::getInstance(); 
    var_dump($_SESSION['panier']);
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
                                            // Vérifier que le stock soit bon avant de valider la commande
                                            $n_commande = mt_rand(); 
                                            $adresse = $_SESSION['current_user']['adresse_livraison'];
                                            $ville = $_SESSION['current_user']['ville_livraison'];
                                            $cp = $_SESSION['current_user']['code_postal_livraison'];
                                            $id = $_SESSION['current_user']['id'];                                                                                   
                                            
                                            foreach($_SESSION['panier']['id_produit'] as $index => $Quant)
                                                {      
                                                    $id_produit = $_SESSION['panier']['id_produit'][$index];                                                    
                                                    $stockProduit = $bdd->query('SELECT stock FROM produits WHERE id=?', [$id_produit])->fetch();
                                                    if($_SESSION['panier']['quantite'][$index] <= $stockProduit->stock)
                                                        {
                                                            $quantite_P = $_SESSION['panier']['quantite'][$index];                                                            
                                                            $id_P = $_SESSION['panier']['id_produit'][$index];
                                                            
                                                            $addproduitCo = $bdd->query('INSERT INTO produits_commandes SET id_produit=?, quantite=?, num_commande=?', [$id_P, $quantite_P, $n_commande]);
                                                                                                                        
                                                            $majStock = ($stockProduit->stock) - ($quantite_P);                                                   
                                                            $decreProduit = $bdd->query('UPDATE produits SET stock=? WHERE id=?', [$majStock, $id_P]);                                                                                                                        
                                                        }
                                                    else
                                                        {
                                                            $id_P = $_SESSION['panier']['id_produit'][$index];
                                                            $nom = $bdd->query('SELECT nom FROM produits WHERE id=?', [$id_P])->fetch();                                                           
                                                            Session::getInstance()->setFlash('danger', "il n'y a plus assez de stock pour : <b>$nom->nom</b>, veuillez modifier votre commande");      
                                                            $retourpanier = true;                                                                                                                    
                                                        }
                                                }       
                                            $total_P = array_sum($_SESSION['panier']['total_panier']);  
                                            $addCommande = $bdd->query('INSERT INTO commandes SET numero=?, prix_commande=?, adresse_livraison=?, ville_livraison=?, code_postal_livraison=?, id_utilisateurs=?', [$n_commande, $total_P, $adresse, $ville, $cp, $id]);
                                            unset($_SESSION['panier']);                                                            
                                            App::redirect('confirmation.php');                                            
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