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
                                            // Vérifier que le stock soit bon avant de valider la commande
                                            $n_commande = mt_rand(); 
                                            $adresse = $_SESSION['current_user']['adresse_livraison'];
                                            $ville = $_SESSION['current_user']['ville_livraison'];
                                            $cp = $_SESSION['current_user']['code_postal_livraison'];
                                            $id = $_SESSION['current_user']['id'];                                                                                   

                                            $panier_user = $bdd->query('SELECT * FROM panier WHERE id_utilisateur=?', [$id_user])->fetchAll();                                          
                                            foreach($panier_user as $nombre => $produit)
                                            {                                                   
                                                    $stockProduit = $bdd->query('SELECT stock FROM produits WHERE id=?', [$produit->id_produit])->fetch();
                                                    if($produit->quantite <= $stockProduit->stock)
                                                        {
                                                            $addCommande = $bdd->query('INSERT INTO commandes SET numero=?, prix_commande=?, adresse_livraison=?, ville_livraison=?, code_postal_livraison=?, id_utilisateurs=?', [$n_commande, $_SESSION['prixpanier'], $adresse, $ville, $cp, $id]);
                                                            $addproduitCo = $bdd->query('INSERT INTO produits_commandes SET id_produit=?, quantite=?, num_commande=?', [$produit->id_produit, $produit->quantite, $n_commande]);                                                    
                                                            $majStock = ($stockProduit->stock) - ($produit->quantite);                                                   
                                                            $decreProduit = $bdd->query('UPDATE produits SET stock=? WHERE id=?', [$majStock, $produit->id_produit]);
                                                            $suppPanier = $bdd->query('DELETE FROM panier WHERE id_utilisateur=?', [$id]);
                                                            // App::redirect('confirmation.php');
                                                        }
                                                    else
                                                        {
                                                            Session::getInstance()->setFlash('danger', "Désole, le stock pour . <?= $produit n'est plus bon, veuillez modifier votre commande");      
                                                            $retourpanier = true;                                                                                                                    
                                                        }
                                                }   
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