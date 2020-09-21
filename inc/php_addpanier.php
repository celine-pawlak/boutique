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
                            $inStock = $bdd->query('SELECT stock, prix FROM produits WHERE id=?', [$id_produit])->fetch();                            
                            $isInpanier = $bdd->query('SELECT id_produit, quantite FROM panier WHERE id_produit=? AND id_utilisateur=?', [$id_produit, $id_user])->fetch();                        
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
                                    if(!empty($isInpanier))                 
                                        {
                                            $updateQuantite = $isInpanier->quantite + $quantite;
                                            $prix_total = $inStock->prix * $updateQuantite;
                                            $addquantite = $bdd->query('UPDATE panier set quantite=?, prix_total=? WHERE id_produit=?', [$updateQuantite, $prix_total, $id_produit]);
                                            Session::getInstance()->setFlash('success', 'Produit ajouté au panier');                                            
                                        }
                                    else
                                        {                                           
                                            $prix_total = $inStock->prix * $quantite;                                            
                                            $addpanier = $bdd->query('INSERT INTO panier (id_utilisateur, id_produit, quantite, prix_total) VALUES (?,?,?,?)', [$id_user, $id_produit, $quantite, $prix_total]);                           
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