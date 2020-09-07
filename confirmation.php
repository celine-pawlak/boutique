<?php
include 'inc/php_confirmation.php';    
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
    <title>Confirmation</title>
</head>
<body>
    <header>
        <? include 'inc/header.php';?>
    </header>
    <main id="main_verification">
        <section class="nav_etape">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">                
                <div class="collapse navbar-collapse" id="navbarNav">
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
                            <a class="nav-link">4 - Confirmation<span class="sr-only">(current)</span></a>
                        </li>                        
                    </ul>
                </div>
            </nav>
        </section>
        <h2>Confirmation de la commande n°<?= $commande->numero ?></h2>
        <section>
            <article class="alert alert-info">En raion du Covid-19, nous avons prit du retard sur nos livraisons. Merci de votre compréhension</article>
            <h4>Adresse de livraison</h4>
                <section>
                    <p>Chez <?= $_SESSION['current_user']['nom']. ' '. $_SESSION['current_user']['prenom']?></p>
                    <p><?= $commande->adresse_livraison ?></p>
                    <p><?= $commande->ville_livraison ?></p>
                    <p><?= $commande->code_postal_livraison ?></p>
                </section>
        </section>
        <table class="table table_verification">
            <thead class="thead-light">
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
                                <td><?= $produit->image_path ?></td>
                                <td><?= $produit->nom ?></td>
                                <td><?= number_format($produit->prix, 2, ',', '') ?>€</td>
                                <td><?= $produit->quantite ?></td>
                                <td><?= $prixtotal = number_format(($produit->prix * $produit->quantite), 2, ',', '') ?>€</td>                                                                  
                            </tr>                                
                            <?php                                         
                        }                                   
                    ?> 
                        <tr>
                            <td colspan="5">Grand total : <b><?= $commande->prix_commande ?>€</b></td>
                        </tr>                                                                                                       
            </tbody>
        </table>                                             
            <form action="profil.php" method="POST">                       
                <input type="submit" name="valid_panier" value="Retour boutique" class="btn bouton">
            </form>                       
    </main>
    <?php include 'inc/footer.php'; ?>
</body>
</html>