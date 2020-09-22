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
                            if(!isset($_SESSION['panier']['id_produit']))
                                {
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
                            else
                                {           
                                    $IsInPanier = in_array($id_produit, $_SESSION['panier']['id_produit']);                                                               
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
                                    else
                                        {                                           
                                            $prix_total = $inStock->prix * $quantite;                                            
                                            array_push($_SESSION['panier']['id_produit'],$inStock->id);                                           
                                            array_push($_SESSION['panier']['quantite'],$quantite);                                                                                                                                 
                                            array_push($_SESSION['panier']['prix'],$inStock->prix); 
                                            array_push($_SESSION['panier']['image'], $inStock->image_path);                                            
                                            Session::getInstance()->setFlash('success', 'Produit ajouté au panier');                                            
                                        }                                    
                                    // array_push($_SESSION['panier']['total_panier'], (array_sum($_SESSION['panier']['prix'])*array_sum($_SESSION['panier']['quantite'])));                                                                        
                                }
                        }
                }
            else
                {
                    Session::getInstance()->setFlash('danger', 'Les valeurs ne sont pas correctes');                    
                }
        } 
    
    //Mets à jour les quantités des produits dans le panier
    if(isset($_GET['moins'], $_GET['id_produit_panier']))
        {               
            $produit_id = $_GET['produit_id'];        
            $id_produit_panier = $_GET['id_produit_panier'];            
            $quantite = $bdd->query('SELECT quantite FROM panier WHERE id=?', [$id_produit_panier])->fetch();            
            $prix = $bdd->query('SELECT prix FROM produits WHERE id=?', [$produit_id])->fetch();
            $majquantite = ($quantite->quantite) - 1;
            $prix_total = $prix->prix * $majquantite;
            if($majquantite==0)
                {
                    $supProduit = $bdd->query('DELETE FROM panier WHERE id=?', [$id_produit_panier]);
                    Session::getInstance()->setFlash('info', 'Produit supprimé du panier');
                }
            else                                    
                $moinsProduit = $bdd->query('UPDATE panier SET quantite=?, prix_total=? WHERE id=?', [$majquantite, $prix_total, $id_produit_panier]);           
        }   
    if(isset($_GET['plus'], $_GET['id_produit_panier']))
        {                       
            $id_produit_panier = $_GET['id_produit_panier'];   
            $produit_id = $_GET['produit_id'];
            $inStock = $bdd->query('SELECT stock FROM produits WHERE id=?', [$produit_id])->fetch();
            $quantite = $bdd->query('SELECT quantite FROM panier WHERE id=?', [$id_produit_panier])->fetch();            
            $prix = $bdd->query('SELECT prix FROM produits WHERE id=?', [$produit_id])->fetch();
            $majquantite = ($quantite->quantite) + 1;
            echo $prix_total = $prix->prix * $majquantite;
            if($majquantite > $inStock->stock)
                {
                    Session::getInstance()->setFlash('danger', "Il n'y a pas assez de stock sur ce produit");                            
                }
            else
                $moinsProduit = $bdd->query('UPDATE panier SET quantite=?, prix_total=? WHERE id=?', [$majquantite, $prix_total, $id_produit_panier]);                     
        } 
    App::redirect('../panier.php');      
    
        
    
?> 