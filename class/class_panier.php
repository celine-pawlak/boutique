<?php
    class class_panier
        {
            private $bdd;
            public function __construct($bdd)
                {
                    if(!isset($_SESSION['panier']))
                        {
                            Session::getInstance()->setSession('panier', []); 
                            // lien vers l'ajout au panier :panier.php?id=id_produit
                        }
                    $this->bdd= $bdd;
                    
                    if(isset($_GET['delPanier']))
                        {                            
                            $this->del($_GET['delPanier']);
                        }                     
                }           
            public function add($produit_id, $quantite)
                {
                    if(isset($_SESSION['panier'][$produit_id]))
                        {
                            $quantite_panier = $_SESSION['panier'][$produit_id] = $quantite;
                            $_SESSION['panier'][$produit_id] = ($quantite_panier + $quantite);
                        }
                    else
                        {
                            $_SESSION['panier'][$produit_id] = $quantite;                
                        }
                }                       
            public function total()
                {                    
                    $total = 0;
                    $ids = array_keys($_SESSION['panier']);   
                    if(empty($ids))             
                        {
                            $produits = [];
                        }
                    else
                        {
                            $produits = $this->bdd->query('SELECT id,prix FROM produits WHERE id IN ('.implode(',', $ids).')')->fetchAll();
                        }
                    foreach($produits as $produit)
                        {
                            $total += $produit->prix*$_SESSION['panier'][$produit->id];
                        }
                    return $total;
                }
            public function del($produit_id)
                {
                    unset($_SESSION['panier'][$produit_id]);
                }
        }
?> 