<?php
    function checkstock($bdd, $id, $index)
        {
            $inStock = $bdd->query('SELECT stock FROM produits WHERE id=?', [$id])->fetch();                                    
            if($_SESSION['panier']['quantite'][$index]==$inStock->stock)          
                {
                    return true;
                }  
            else
                return false;
        }
?>