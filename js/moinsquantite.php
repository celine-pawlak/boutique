<?php
 require_once '../class/App.php';   
 require_once '../class/Database.php'; 
 require_once '../class/session.php';  
 $bdd = App::getDatabase();    
 Session::getInstance(); 
    if(isset($_GET['index_idP']))
        {        echo 'totoajax';
            $produit = $_GET['index_idP'];
            $valeur = explode('-', $produit);
            
            $majquantite = ($_SESSION['panier']['quantite'][$valeur[0]]) - 1;            
            if($majquantite<=0)
                {
                    unset($_SESSION['panier']['quantite'][$valeur[0]]);
                    unset($_SESSION['panier']['prix'][$valeur[0]]);
                    unset($_SESSION['panier']['image'][$valeur[0]]);
                    unset($_SESSION['panier']['id_produit'][$valeur[0]]);
                    unset($_SESSION['panier']['total_panier'][$valeur[0]]);
                    Session::getInstance()->setFlash('info', 'Produit supprimé du panier');
                }
            else      
                {                        
                    $_SESSION['panier']['quantite'][$valeur[0]]--;     
                    echo $_SESSION['panier']['quantite'][$valeur[0]]; 
                }                
        }
?>