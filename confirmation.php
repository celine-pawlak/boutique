<?php
include 'inc/php_confirmation.php';    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Confirmation</title>
</head>
<body>
    <header>
        <? include 'inc/header.php';?>
    </header>
    <main id="main_verification">
        <section class="nav_etape">
            <nav class="green lighten-2">                
                <div id="navbarNav">
                    <ul class="etape navbar-nav">
                        <li class="nav-item">                            
                            <a class="nav-link">1 - Vérification du Panier</a>
                        </li>
                        <li class="nav-item">                            
                            <a class="nav-link">2 - Adresse livraison</a>
                        </li>
                        <li class="nav-item">                            
                            <a class="nav-link">3 - Paiement</a>
                        </li>                        
                        <li class="nav-item active">                            
                            <a class="nav-link">4 - Confirmation</a>
                        </li>                        
                    </ul>
                </div>
            </nav>
        </section>
        <h2>Confirmation de la commande n°<?= $commande->numero ?></h2>
        <section>
            <article class="alert-info">En raion du Covid-19, nous avons prit du retard sur nos livraisons. Merci de votre compréhension</article>
            <div id="adresse_liv" class="grey lighten-5">
                <h4>Adresse de livraison</h4>
                    <div>
                        <p>Chez <?= $_SESSION['current_user']['nom']. ' '. $_SESSION['current_user']['prenom']?></p>
                        <p><?= $commande->adresse_livraison ?>&nbsp;<?= $commande->ville_livraison ?>&nbsp;<?= $commande->code_postal_livraison ?></p>                    
                    </div>
            </div>
        </section>
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
                    foreach($produits as $nombre => $produit)
                        {                                                                                         
                            ?>
                            <tr>
                            <td><img src="<?= $produit->image_path ?>" alt="<?= $produit->nom ?>" class="img_panier"></td>
                                <td><?= $produit->nom ?></td>
                                <td><?= number_format($produit->prix, 2, ',', '') ?>€</td>
                                <td><?= $produit->quantite ?></td>
                                <td><?= $prixtotal = number_format(($produit->prix * $produit->quantite), 2, ',', '') ?>€</td>                                                                  
                            </tr>                                
                            <?php                                         
                        }                                   
                    ?> 
                        <tr>
                            <td colspan="5" class="center">Grand total : <b><?= $commande->prix_commande ?>€</b></td>
                        </tr>                                                                                                       
            </tbody>
        </table>                                             
            <form action="index.php" method="POST">                       
                <input type="submit" name="valid_panier" value="Retour boutique" class="btn bouton">
            </form>                       
    </main>
    <?php include 'inc/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
</body>
</html>