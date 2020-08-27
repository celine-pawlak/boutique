<?php include 'inc/php_compte.php'; ?>
<!DOCTYPE html><html">
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Adresse livraison</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_compte">
        <section class="nav_etape">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="etape navbar-nav">
                        <li class="nav-item">
                            <p class="nav-link">1 - Vérification du Panier</p>
                        </li>
                        <li class="nav-item active">
                            <p class="nav-link">2 - Adresse livraison<span class="sr-only">(current)</span></p>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">3 - Paiement</p>
                        </li>                        
                        <li class="nav-item">
                            <p class="nav-link">4 - Confirmation</p>
                        </li>                        
                    </ul>
                </div>
            </nav>
        </section>
        <?php 
            if(isset($_SESSION['current_user']['id']))
                {
                    ?>
                    <section>
                        <section>
                            <form action="" method="POST">
                                </form>
                            </section>
                            <form action="" method="POST">
                                <section class="formulaire">     
                                    <section>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Adresse</th>
                                                    <th>Ville</th>
                                                    <th>Code Postal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $_SESSION['current_user']['adresse_facturation'] ?></td>                                        
                                                    <td><?= $_SESSION['current_user']['ville_facturation'] ?></td>                                        
                                                    <td><?= $_SESSION['current_user']['code_postal_facturation'] ?></td>                                        
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="checkbox" id="meme_adresse" name="meme_adresse">
                                        <label for="meme_adresse">Choisir cette adresse</label>
                                    </section>                       
                                    <section id="info_user">                                
                                        <section class="form-group">
                                            <label for="adresse">Adresse (livraison / facturation): <span class="oblig">*</span></label>
                                            <input type="text" class="form-control" name="adresse" id="adresse" >
                                        </section>
                                        <section class="form-group">
                                            <label for="ville">Ville (livraison / facturation): <span class="oblig">*</span></label>
                                            <input type="text" class="form-control" name="ville" id="ville" >
                                        </section>
                                        <section class="form-group">
                                            <label for="cp">Code postal (livraison / facturation): <span class="oblig">*</span></label>
                                            <input type="text" class="form-control" name="cp" id="cp" >
                                        </section>                
                                    </section>
                            </section>    
                            <section class="valid_form">
                                <input type="submit" class="btn bouton" name="valid_adresse" value="Valider">
                                <small><span class="oblig">*</span>Champs obligatoires</small>
                            </section>                          
                        </form>
                    </section>
                    <?php
                }
            else
                {
                    ?>
                    <form action="" method="POST">
                        <section class="formulaire">
                            <section id="info_log">
                                <section class="form-group">
                                    <label for="username">Login: <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="username" id="username" required>
                                </section>
                                <section class="form-group">
                                    <label for="email">Email: <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" required>
                                </section>
                                <section class="form-group">
                                    <label for="password">Mot de passe: <span class="oblig">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </section>  
                                <section class="form-group">
                                    <label for="password_confirm">Confirmer mot de passe: <span class="oblig">*</span></label>
                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
                                </section>              
                            </section>
                            <section id="info_user">
                                <section class="form-group">
                                    <label for="nom">Nom: <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="nom" id="nom" required>
                                </section>
                                <section class="form-group">
                                    <label for="prenom">Prénom: <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="prenom" id="prenom"  required>
                                </section>
                                <section class="form-group">
                                    <label for="telephone">Téléphone: <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="telephone" id="telephone" required>
                                </section>
                                <section class="form-group">
                                    <label for="adresse">Adresse (livraison / facturation): <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="adresse" id="adresse" required>
                                </section>
                                <section class="form-group">
                                    <label for="ville">Ville (livraison / facturation): <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="ville" id="ville" required>
                                </section>
                                <section class="form-group">
                                    <label for="cp">Code postal (livraison / facturation): <span class="oblig">*</span></label>
                                    <input type="text" class="form-control" name="cp" id="cp" required>
                                </section>                
                            </section>
                        </section>    
                        <section class="valid_form">
                            <input type="submit" class="btn bouton" name="valid_compte" value="Créer un compte">
                            <small><span class="oblig">*</span>Champs obligatoires</small>
                        </section>                          
                    </form>
                    <?php
                }
        ?>
    </main>
    <?php include 'inc/footer.php'; ?>
</body>
</html>