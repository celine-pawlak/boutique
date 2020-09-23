<?php
    if(isset($_GET['index_idP']))
        {            
            $valeur = implode('-', $_GET['index_idP']);
            echo $_SESSION['panier']['quantite']; 
            // echo ($valeur[0]);
        }
?>