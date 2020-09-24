<?php include 'inc/php_compte.php'; var_dump($_SESSION['panier']);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Adresse livraison</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_compte">
    <section class="nav_etape">
            <nav class="green lighten-2">                
                <div id="navbarNav">
                    <ul class="etape navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link">1 - Vérification du Panier</a>
                        </li>
                        <li class="nav-item active">
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
        <?php 
            if(isset($_SESSION['current_user']['id']))
                {
                    ?>
                    <section id="adresse_L">                        
                        <form action="" method="POST" class="form_adresse">
                            <section class="formulaire form_adresse">     
                                <section>
                                    <h5>Adresse de facturation</h5>
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
                                    <p>
                                        <label for="meme_adresse">
                                            <input type="checkbox" id="meme_adresse" name="meme_adresse">
                                            <span>Choisir comme adresse de livraison</span>
                                        </label>
                                    </p>                                    
                                </section>                       
                                <section id="info_user">         
                                    <h5>Si adresse de livraison différente de l'adresse de facturation</h5>                                                          
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="adresse">Adresse: <span class="oblig">*</span></label>
                                            <input type="text" class="validate" name="adresse" id="adresse" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="ville">Ville: <span class="oblig">*</span></label>
                                            <input type="text" class="validate" name="ville" id="ville" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="cp">Code postal: <span class="oblig">*</span></label>
                                            <input type="text" class="validate" name="cp" id="cp" >
                                        </div>
                                    </div>                                                                              
                                </section>
                            </section>    
                            <section class="next">                                                          
                                    <input type="submit" name="retour_panier" value="Retour" class="btn bouton">                               
                                    <input type="submit" class="btn bouton" name="valid_adresse" value="Valider">                                                                                                                                                                                                  
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
</body>
</html>