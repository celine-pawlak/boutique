<?php
    class class_panier
        {
            public function __construct()
                {
                    if(!isset($_SESSION['panier']))
                        {
                            $_SESSION['panier'] = [];
                            // lien vers l'ajout au panier :panier.php?id=id_produit
                        }
                }           
            public function add($produit_id, $quantite)
                {
                    if(isset( $_SESSION['panier'][$produit_id]))
                        {
                            $quantite_conf = $_SESSION['panier'][$produit_id]['quantite'];
                            $_SESSION['panier'][$produit_id] = ['id'=>$produit_id, 'quantite' =>($quantite_conf + $quantite)];
                        }
                    else                        
                        $_SESSION['panier'][$produit_id] = ['id'=>$produit_id, 'quantite' =>$quantite];                
                }
            public function getPanier()
                {
                    return $_SESSION['panier'];
                }
        }
?>