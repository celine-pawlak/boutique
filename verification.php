<?php
include 'inc/php_verification.php';    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Vérification</title>
</head>
<body>
    <header>
        <? include 'inc/header.php';?>
    </header>
    <main id="main_verification">
        <section class="nav_etape">
            <nav class="green lighten-2">                
                <div class="" id="navbarNav">
                    <ul class="etape navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link">1 - Vérification du Panier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">2 - Adresse livraison</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">3 - Paiement</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link">4 - Confirmation</a>
                        </li>                        
                    </ul>
                </div>
            </nav>
        </section>
        <h2>Récapitulatif du panier</h2>
        <table class="table_verification">
            <thead class="grey lighten-4">
                <tr>
                    <th colspan="2">Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Prix total</th>                
                </tr>
            </thead>
            <tbody>
                <?php                                               
                    foreach($_SESSION['panier']['id_produit'] as $index => $Quant)
                    {                                                                                              
                        ?>
                        <tr>
                            <?php                                                        
                            ?>
                            <td><img src="<?= $_SESSION['panier']['image'][$index]?>" alt="nom" class="img_panier"></td>
                            <td><?= $_SESSION['panier']['nom'][$index]?></td>
                            <td><?= number_format($_SESSION['panier']['prix'][$index], 2, ',', '') ?>€</td>                                                       
                            <td><?=$_SESSION['panier']['quantite'][$index] ?></td>                           
                            <td><?= number_format(($_SESSION['panier']['prix'][$index]*$_SESSION['panier']['quantite'][$index]), 2, ',', '') ?>€</td>                            
                        </tr>                                
                        <?php                                                                                     
                        $_SESSION['panier']['total_panier'][$index] = ($_SESSION['panier']['prix'][$index]*$_SESSION['panier']['quantite'][$index]);                                                                                    
                    }                                                             
                ?> 
                    <tr>
                        <td colspan="6" class="center">Grand total : <b><?= number_format(array_sum($_SESSION['panier']['total_panier']), 2,',','')?>€</b></td>
                    </tr>                                                                                                                                              
            </tbody>
        </table>     
        <section class="suivant">           
            <form action="panier.php" method="POST">                       
                <input type="submit" name="valid_panier" value="Retour" class="btn bouton">
            </form>               
            <form action="creer-compte.php" method="POST">                       
                <input type="submit" name="valid_panier" value="Suivant" class="btn bouton">
            </form>               
        </section>
    </main>
    <?php include 'inc/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

                              