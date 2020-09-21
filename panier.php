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
        <form action="inc/php_addpanier.php" method="GET">
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
                        if(empty($produitPanier))
                            {
                                ?>
                                <tr>
                                    <td colspan="6">Vous n'avez pas encore de produit dans votre panier</td>
                                </tr>
                                <?php
                            }
                        else    
                            {
                                foreach($produitPanier as $nombre => $produit)
                                    {                                                                              
                                        ?>
                                        <tr>
                                            <td><img src="<?= $produit->image_path ?>" alt="<?= $produit->nom ?>" class="img_panier"></td>
                                            <td><?= $produit->nom ?></td>
                                            <td><?= number_format($produit->prix, 2, ',', '') ?>€</td>
                                            <td><a href="inc/php_addpanier.php?moins&id_produit_panier=<?= $produit->id?>&produit_id=<?= $produit->id_produit ?>" class="btn-floating btn-small waves-effect waves-light">-</a>&nbsp<?= $produit->quantite ?>
                                            &nbsp<a href="inc/php_addpanier.php?plus&id_produit_panier=<?= $produit->id?>&produit_id=<?= $produit->id_produit ?>" class="btn-floating btn-small waves-effect waves-light">+</a></td>                                   
                                            <td><?= $prixtotal = number_format(($produit->prix * $produit->quantite), 2, ',', '') ?>€</td>
                                            <td><a href="inc/suppression.php?delPanier=<?= $produit->id ?>">supprimer</a></td>                                    
                                        </tr>                                
                                        <?php                                         
                                    }                                   
                                ?> 
                                    <tr>
                                        <td colspan="6">Grand total : <b><?= $totalPanier ?>€</b></td>
                                    </tr>                                 
                                <?php                      
                            }
                    ?>                               
                </tbody>
            </table>                                    
            <?php
                if(!empty($produitPanier))
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
</body>
</html>