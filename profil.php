<?php
    include 'inc/php_profil.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>  
    <title>Mon compte</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_profil">
        <section id="formulaire_profil">
            <h2>Modifier votre profil</h2>
                <form action="" method="POST">
                    <section class="formulaire">
                        <section id="info_login">                       
                            <section class="form-group">
                                <label for="username">Login<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= $_SESSION['current_user']['username']?>" required>
                            </section>
                            <section class="form-group">
                                <label for="email">Email<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="email" id="email" value="<?= $_SESSION['current_user']['email'] ?>" required>
                            </section>
                            <section class="form-group">
                                <label for="now_password">Mot de passe actuel<span class="oblig">*</span>: </label>
                                <input type="password" class="form-control input_oblig" name="now_password" id="now_password" required>
                            </section>  
                            <section class="form-group">
                                <label for="password">Mot de passe: </label>
                                <input type="password" class="form-control" name="password" id="password">
                            </section>  
                            <section class="form-group">
                                <label for="password_confirm">Confirmer mot de passe: </label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                            </section>         
                        </section>
                        <section id="info_profil">                            
                            <section class="form-group">
                                <label for="nom">Nom<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="nom" id="nom" value="<?= $_SESSION['current_user']['nom'] ?>" required>
                            </section>
                            <section class="form-group">
                                <label for="prenom">Prénom<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $_SESSION['current_user']['prenom'] ?>" required>
                            </section>
                            <section class="form-group">
                                <label for="telephone">Téléphone: </label>
                                <input type="text" class="form-control" name="telephone" id="telephone" value="<?= $_SESSION['current_user']['telephone'] ?>">
                            </section>
                            <section class="form-group">
                                <label for="adresse">Adresse<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="adresse" id="adresse" value="<?= $_SESSION['current_user']['adresse_facturation'] ?>" required>
                            </section>
                            <section class="form-group">
                                <label for="ville">Ville<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="ville" id="ville" value="<?= $_SESSION['current_user']['ville_facturation'] ?>" required>
                            </section>
                            <section class="form-group">
                                <label for="cp">Code postal<span class="oblig">*</span>: </label>
                                <input type="text" class="form-control" name="cp" id="cp" value="<?= $_SESSION['current_user']['code_postal_facturation'] ?>" required>
                            </section>                                        
                        </section>    
                    </section>
                    <section class="valid_form">
                        <input type="submit" class="btn bouton" name="valid_modif" value="Modifier">
                        <small><span class="oblig">*</span> Champs obligatoires</small>
                    </section>                          
                </form>                
        </section>
        <!-- Rajouter visibilité du panier -->
        <section id="historique">
            <h2>Historique des achats</h2>
                <section id="tableau_historique">
                    <table class="table table-striped histo">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Numéro de commande</th>
                                <th>Nombre de produits</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i = 0; $i< $infos_commandes['compte'] ; $i++)
                                    {                                        
                                        $count_produit = $bdd->query('SELECT COUNT(id) as nb_produit_com FROM produits_commandes WHERE num_commande = ?' , [$infos_commandes['recup'][$i]['numero']])->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <tr>
                                            <td><?= $infos_commandes['recup'][$i]['date_commande'] = date('d-m-Y') ?></td>
                                            <td><a href="detail.php?id=<?= $infos_commandes['recup'][$i]['id'] ?>"><?= $infos_commandes['recup'][$i]['numero'] ?></a></td>
                                            <td><?= $count_produit['nb_produit_com'] ?></td>
                                            <td><?= number_format($infos_commandes['recup'][$i]['prix_commande'], 2, ',', '') ?> €</td>
                                        </tr>
                                        <?php
                                    }
                            ?>
                        </tbody>
                    </table>
                    <?php pagination($pp, $nb_total, $nb_page, $page, 'commande', 'profil.php', '#tableau_historique') ?>                        
                </section>
        </section>
    </main>
    <?php include 'inc/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>