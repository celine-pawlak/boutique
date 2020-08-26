<?php
   require_once '../class/App.php';   
   require_once '../class/Database.php'; 
   require_once '../class/session.php';
   $bdd = App::getDatabase();   
       
    if(isset($_GET['id_utilisateur'], $_GET['id_produit'], $_GET['quantite']))
        {            
            $id_user = $_GET['id_utilisateur'];
            $id_produit = $_GET['id_produit'];
            $quantite = $_GET['quantite'];
           

            if(filter_var($id_produit, FILTER_VALIDATE_INT) && filter_var($quantite, FILTER_VALIDATE_INT))
                {
                    $inStock = $bdd->query('SELECT stock FROM produits WHERE id=?', [$id_produit])->fetch();
                    $isInpanier = $bdd->query('SELECT id_produit, quantite FROM panier WHERE id_produit=?', [$id_produit])->fetch();
                    var_dump($isInpanier);
                    if($inStock->stock == 0)
                        {
                            Session::getInstance()->setFlash('danger', "Il n'y a plus de stock pour ce produit");
                            App::redirect('../panier.php');
                        }
                    else if($quantite > $inStock->stock)
                        {
                            Session::getInstance()->setFlash('danger', "Il n'y a pas assez de stock sur ce produit");
                            App::redirect('../panier.php');
                        }
                    else
                        {           
                            if(!empty($isInpanier))                 
                                {
                                    $updateQuantite = $isInpanier->quantite + $quantite;
                                    $addquantite = $bdd->query('UPDATE panier set quantite=? WHERE id_produit=?', [$updateQuantite, $id_produit]);
                                    Session::getInstance()->setFlash('success', 'Produit ajouté au panier');
                                    App::redirect('../panier.php');
                                }
                            else
                                {
                                    $addpanier = $bdd->query('INSERT INTO panier (id_utilisateur, id_produit, quantite) VALUES (?,?,?)', [$id_user, $id_produit, $quantite]);                           
                                    Session::getInstance()->setFlash('success', 'Produit ajouté au panier');
                                    App::redirect('../panier.php');
                                }
                        }
                }
            else
                {
                    Session::getInstance()->setFlash('danger', 'Les valeurs ne sont pas correctes');
                    App::redirect('../panier.php');
                }
        }        
    
        
    
?> 