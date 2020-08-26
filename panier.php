<?php    
    include 'inc/initialisation.php';       
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
    <form action="inc/php_addpanier.php" method="GET">
            <input type="text" name="id_utilisateur">
            <input type="text" name="id_produit">
            <input type="text" name="quantite">
            <input type="submit">
        </form>                               
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
                            // foreach($produits as $produit)
                            {                                                                                  
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <!-- <td><a href="panier.php?delPanier=">supprimer</a></td> -->
                                </tr>
                                <?php 
                            }
                    ?>
                                <tr>
                                    <td></td>
                                </tr>
                </tbody>
            </table>        
        </form>
    </main>
    <?php include 'inc/footer.php';?>
</body>
</html>