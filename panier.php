<?php    
    include 'inc/php_add_panier.php';       
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Panier</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_panier">                                 
        <form action="" method="POST">
            <table class="table">
                <thead class="thead-light">
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
                    var_dump($_SESSION['panier']);
                        $ids = array_keys($_SESSION['panier']);   
                        if(empty($ids))             
                            {
                                $produits = [];
                            }
                        else
                            {
                                $produits = $bdd->query('SELECT * FROM produits WHERE id IN ('.implode(',', $ids).')')->fetchAll();
                            }                                                                                                                    
                            // var_dump($_SESSION['panier']);
                            foreach($produits as $produit)
                            {                                                                                  
                                ?>
                                <tr>
                                    <td><?= $produit->image_path ?></td>
                                    <td><?= $produit->nom ?></td>
                                    <td><?= number_format($produit->prix, 2, ',', '') ?> €</td>
                                    <td><input type="text" value="<?=$_SESSION['panier'][$produit->id] ?>" name="panier[quantite][<?= $produit->id ?>]"><input type="submit" value="Recalculer"></td>
                                    <td><?= number_format(($produit->prix * $_SESSION['panier'][$produit->id]), 2, ',', '')?> €</td>
                                    <td><a href="panier.php?delPanier=<?= $produit->id ?>">supprimer</a></td>
                                </tr>
                                <?php 
                            }
                    ?>
                                <tr>
                                    <td>Prix total : <?= number_format($panier->total(), 2, ',', '') ?></td>
                                </tr>
                </tbody>
            </table>        
        </form>
    </main>
    <?php include 'inc/footer.php';?>
</body>
</html>