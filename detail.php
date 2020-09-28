<?php
    include 'inc/php_detail.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>  
    <title>Commande</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_detail">
        <h2>Commande n° <?= $is_com->numero ?></h2>
        <section class="adresse_liv" id="livraison_d">
            <p><b>Livrée chez : </b> <?= $user->nom . ' ' . $user->prenom ?></p>
            <p><b>Au : </b><?= $commande[0]->adresse_livraison. ' '. $commande[0]->ville_livraison. ' '. $commande[0]->code_postal_livraison ?></p>
        </section>
        <table class="container">
            <thead class="grey lighten-4">
                <tr>
                    <th colspan="2">Nom</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>    
                <?php            
                foreach($commande as $info)
                    {
                        $produits = $bdd->query('SELECT nom, image_path, prix FROM produits WHERE id=?',[$info->id_produit])->fetch();
                        ?>
                        <tr>
                            <td><?= $produits->nom ?></td>                                                       
                            <td><img src="<?= $produits->image_path ?>" alt="<?= $produits->nom ?>" class="img_panier"></td>                                                       
                            <td><?= $info->quantite ?></td>
                            <td><?= number_format(($produits->prix*$info->quantite), 2, ',', '') ?> €</td>                                                       
                        </tr>
                        <?php                                                  
                    }      
                ?>
                <tr>
                    <td colspan="4" class="center"><b>Prix Total : </b><?= number_format($commande[0]->prix_commande, 2, ',', '')?> €</td>
                </tr>
            </tbody>
        </table>
        <form action="profil.php#historique">
            <input type="submit" value="Retour" class="btn bouton">
        </form>
    </main>
    <?php include 'inc/footer.php'?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>