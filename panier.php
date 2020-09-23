<?php    
    include 'inc/initialisation.php';   
    include 'inc/php_panier.php';  
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
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_panier">  
        <!-- A supprimer -->
        <form action="inc/php_addpanier_S.php" method="GET">
            <input type="text" name="id_utilisateur">
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
                        if(empty($_SESSION['panier']))
                            {                                
                                ?>
                                <tr>
                                    <td colspan="6">Vous n'avez pas encore de produit dans votre panier</td>
                                </tr>
                                <?php
                            }
                        else    
                            {                                
                                $taille = count($_SESSION['panier']['id_produit']);                                    
                                for($i=0; $i<$taille; $i++)
                                    {                                                 
                                        ?>
                                        <tr>
                                            <td><img src="<?= $_SESSION['panier']['image'][$i]?>" alt="nom" class="img_panier"></td>
                                            <td>Nom</td>
                                            <td><?= number_format($_SESSION['panier']['prix'][$i], 2, ',', '') ?>€</td>   
                                            <td><button class="moins" value="<?=$i?> - <?=$_SESSION['panier']['id_produit'][$i]?>">Moins</button></td>                                                                                 
                                            <td><a href="inc/php_addpanier_S.php?moins&produit_id=<?= $_SESSION['panier']['id_produit'][$i] ?>&index=<?= $i ?>" class="moins<?=$i?> btn-floating btn-small waves-effect waves-light"  value="<?=$i ?>">-</a>&nbsp <?=$_SESSION['panier']['quantite'][$i] ?>
                                            &nbsp<a href="inc/php_addpanier_S.php?plus&produit_id= <?=$_SESSION['panier']['id_produit'][$i] ?>&index=<?= $i ?>" class="btn-floating btn-small waves-effect waves-light" id="plus<?=$i?>">+</a></td>                                   
                                            <td><?= number_format(($_SESSION['panier']['prix'][$i]*$_SESSION['panier']['quantite'][$i]), 2, ',', '') ?>€</td>
                                            <td><a href="inc/suppression.php?delPanier=<?= $_SESSION['panier']['id_produit'][$i] ?>">supprimer</a></td>                                    
                                        </tr>                                
                                        <?php                                                                                     
                                        $_SESSION['panier']['total_panier'][$i] = ($_SESSION['panier']['prix'][$i]*$_SESSION['panier']['quantite'][$i]);                                        
                                    }                                    
                                ?> 
                                    <tr>
                                        <td colspan="6">Grand total : <?= number_format(array_sum($_SESSION['panier']['total_panier']), 2,',','')?>€</b></td>
                                    </tr>                                 
                                <?php                      
                            }
                    ?>                               
                </tbody>
            </table>                                    
            <?php
                if(!empty($_SESSION['panier']))
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/majquantite.js"></script>
</body>
</html>