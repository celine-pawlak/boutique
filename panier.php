<?php    
    include 'inc/initialisation.php';   
    include 'inc/php_panier.php';  
    require_once 'fonctions/checkstock.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Panier</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php';?>
    </header>
    <main id="main_panier">  
        <!-- A supprimer -->
        <form action="inc/php_addpanier_S.php" method="POST">            
            <input type="text" name="id_produit">
            <input type="text" name="quantite">
            <input type="submit">
        </form>      
        <!-- ------- -->
        <h2>Votre panier</h2>                         
        <form action="verification.php" method="POST" id="table_panier">
            <table class="highlight centered">
                <thead class="grey lighten-4">
                    <tr>
                        <th colspan="2">Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Prix total</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(empty($_SESSION['panier']['id_produit']))
                            {      
                                ?>
                                <tr>
                                    <td colspan="6">Vous n'avez pas encore de produit dans votre panier</td>
                                </tr>
                                <?php
                            }
                        else    
                            {                                                                                                                                                       
                                foreach($_SESSION['panier']['id_produit'] as $index => $Quant)
                                    {   
                                        if(checkstock($bdd, $_SESSION['panier']['id_produit'][$index], $index)==true)
                                            {
                                                $disable = 'disabled';
                                            }     
                                        else    
                                            $disable ='';
                                        ?>
                                        <tr>
                                            <?php                                                        
                                            ?>
                                            <td><img src="<?= $_SESSION['panier']['image'][$index]?>" alt="nom" class="img_panier"></td>
                                            <td><?= $_SESSION['panier']['nom'][$index]?></td>
                                            <td><?= number_format($_SESSION['panier']['prix'][$index], 2, ',', '') ?>€</td>                                                       
                                            <td><a href="inc/php_addpanier_S.php?moins&produit_id=<?= $_SESSION['panier']['id_produit'][$index] ?>&index=<?= $index ?>" class="btn-floating btn-small waves-effect waves-light">-</a>&nbsp <?=$_SESSION['panier']['quantite'][$index] ?>
                                            &nbsp<a href="inc/php_addpanier_S.php?plus&produit_id= <?=$_SESSION['panier']['id_produit'][$index] ?>&index=<?= $index ?>" class="btn-floating btn-small waves-effect waves-light <?= $disable?>" id="plus<?=$index?>">+</a></td>
                                            <td><?= number_format(($_SESSION['panier']['prix'][$index]*$_SESSION['panier']['quantite'][$index]), 2, ',', '') ?>€</td>
                                            <td><a href="inc/suppression.php?delPanier=<?= $_SESSION['panier']['id_produit'][$index] ?>">supprimer</a></td>                                    
                                        </tr>                                
                                        <?php                                                                                     
                                        $_SESSION['panier']['total_panier'][$index] = ($_SESSION['panier']['prix'][$index]*$_SESSION['panier']['quantite'][$index]);                                                                                    
                                    }                                                             
                                ?> 
                                    <tr>
                                        <td colspan="6">Grand total : <b><?= number_format(array_sum($_SESSION['panier']['total_panier']), 2,',','')?>€</b></td>
                                    </tr>                                 
                                <?php                      
                            }
                    ?>                               
                </tbody>
            </table>                                    
            <?php
                if(!empty($_SESSION['panier']['id_produit']))
                    {
                        ?>
                            <input type="submit" name="valid_panier" value="Valider" id="valid_panier" class="btn bouton">                            
                        <?php
                    }
            ?>
        </form>        
    </main>
    <?php include 'inc/footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>    
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/majquantite.js"></script> -->
</body>
</html>