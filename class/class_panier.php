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
            public function add($produit_id)
                {
                    $_SESSION['panier'][$produit_id] = 1;                
                }
        }
?>