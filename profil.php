<?php
    include 'inc/php_profil.php';
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
                        <input type="submit" class="btn bouton" name="valid_modif" value="Inscription">
                        <small><span class="oblig">*</span> Champs obligatoires</small>
                    </section>                          
                </form>                
        </section>
        <section id="historique">
            <h2>Historique des achats</h2>
                <section id="tableau_historique">
                    <table class="table table-striped histo">
                        <thead>
                            <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Numéro de commande</th>
                            <th scope="col">Nombre de produits</th>
                            <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i = 0; $i< $infos_commandes['compte'] ; $i++)
                                    {
                                        $count_produit = $bdd->query('SELECT COUNT(id) as nb_produit_com FROM produits_commandes WHERE id_commandes = ?' , [$infos_commandes['recup'][$i]['id']])->fetch(PDO::FETCH_ASSOC);                                    
                                        ?>
                                        <tr>
                                            <td><?= $infos_commandes['recup'][$i]['date_commande'] = date('d-m-Y') ?></td>
                                            <td><a href="detail.php?id=<?= $infos_commandes['recup'][$i]['id'] ?>"><?= $infos_commandes['recup'][$i]['numero'] ?></a></td>
                                            <td><?= $count_produit['nb_produit_com'] ?></td>
                                            <td><?= $infos_commandes['recup'][$i]['prix_commande'] ?></td>
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
</body>
</html>