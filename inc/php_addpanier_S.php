<?php
   require_once '../class/App.php';   
   require_once '../class/Database.php'; 
   require_once '../class/session.php';   
   $bdd = App::getDatabase();  
   Session::getInstance();     
   //Ajoute un produit au panier
    if(isset($_GET['id_utilisateur'], $_GET['id_produit'], $_GET['quantite']))
        {            
        $id_user = $_GET['id_utilisateur'];
        $id_produit = $_GET['id_produit'];
        $quantite = $_GET['quantite'];               
           
            if(filter_var($id_produit, FILTER_VALIDATE_INT) && filter_var($quantite, FILTER_VALIDATE_INT))
                {
                    if($id_user==$_SESSION['current_user']['id'])
                        {                           
                            $inStock = $bdd->query('SELECT * FROM produits WHERE id=?', [$id_produit])->fetch(); 
                            //Si la session panier n'est pas créée
                            if(!isset($_SESSION['panier']['id_produit']))
                                {echo 'tu rentre pas la dedans';
                                    $_SESSION['panier'] = [];
                                    $_SESSION['panier']['id_produit'] = [];
                                    $_SESSION['panier']['quantite'] = [];                                                                
                                    $_SESSION['panier']['prix'] = [];    
                                    $_SESSION['panier']['image'] = [];
                                    $_SESSION['panier']['total_panier'] = [];
                                }                                               
                            if($inStock->stock == 0)
                                {
                                    Session::getInstance()->setFlash('danger', "Il n'y a plus de stock pour ce produit");                                    
                                }
                            else if($quantite > $inStock->stock)
                                {
                                    Session::getInstance()->setFlash('danger', "Il n'y a pas assez de stock sur ce produit");                                    
                                }
                            //Si la session panier est créée
                            else
                                {           
                                    $IsInPanier = in_array($id_produit, $_SESSION['panier']['id_produit']);     
                                    //Si le produit est déjà dans le panier                                                          
                                    if($IsInPanier==true)                 
                                        {
                                            $taille = count($_SESSION['panier']['id_produit']);
                                            for($i=0; $i<$taille; $i++)
                                                {                                                  
                                                    if($id_produit==$_SESSION['panier']['id_produit'][$i])
                                                        {                                                                                                                  
                                                            $_SESSION['panier']['quantite'][$i] = $_SESSION['panier']['quantite'][$i]+$quantite;                                                           
                                                        }
                                                }                                            
                                        }
                                    //Si le produit n'est pas encore dans le panier
                                    else
                                        {                                           
                                            $prix_total = $inStock->prix * $quantite;                                            
                                            array_push($_SESSION['panier']['id_produit'],$inStock->id);                                           
                                            array_push($_SESSION['panier']['quantite'],$quantite);                                                                                                                                 
                                            array_push($_SESSION['panier']['prix'],$inStock->prix); 
                                            array_push($_SESSION['panier']['image'], $inStock->image_path);                                            
                                            Session::getInstance()->setFlash('success', 'Produit ajouté au panier');                                            
                                        }                                                                        
                                }
                        }
                }
            else
                {
                    Session::getInstance()->setFlash('danger', 'Les valeurs ne sont pas correctes');                    
                }
        } 

    if(isset($_GET['index_idP']))
        {
            echo $_GET['index_idP'];
        }
    
    //Mets à jour les quantités des produits dans le panier
    if(isset($_GET['moins'], $_GET['index']))
        {                                       
            $produit = $_GET['index'];
            echo $produit;
            $majquantite = ($_SESSION['panier']['quantite'][$produit]) - 1;    
            echo $majquantite;        
            if($majquantite==0)
                {echo 'unset';
                    unset($_SESSION['panier']['quantite'][$produit]);
                    unset($_SESSION['panier']['prix'][$produit]);
                    unset($_SESSION['panier']['image'][$produit]);
                    unset($_SESSION['panier']['id_produit'][$produit]);
                    unset($_SESSION['panier']['total_panier'][$produit]);
                    // if(empty($_SESSION['panier']['quantite'][$produit]))
                    //     {
                    //         unset($_SESSION['panier']);
                    //     }
                    Session::getInstance()->setFlash('info', 'Produit supprimé du panier');
                }
            else         
                {
                    echo 'moins';
                    $_SESSION['panier']['quantite'][$produit]--;                                                          
                }             
        }   
    if(isset($_GET['plus'], $_GET['produit_id'], $_GET['index']))
        {          
            $produit_id = $_GET['produit_id'];
            $produit = $_GET['index'];
            $inStock = $bdd->query('SELECT stock FROM produits WHERE id=?', [$produit_id])->fetch();                       
            $majquantite = ($_SESSION['panier']['quantite'][$produit]) + 1;            
            if($majquantite > $inStock->stock)
                {
                    Session::getInstance()->setFlash('danger', "Il n'y a pas assez de stock sur ce produit");                            
                }
            else
                $_SESSION['panier']['quantite'][$produit]++; 
        } 
    App::redirect('../panier.php');                      
?> 