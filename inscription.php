<?php
    include 'inc/php_inscription.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">       
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Inscription</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_inscription">
        <h2>Forulaire d'inscription</h2>
        <!-- Nouveau form -->
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                    </div>
                </div>               
                <div class="row">
                    <div class="input-field col s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                    This is an inline input field:
                    <div class="input-field inline">
                        <input id="email_inline" type="email" class="validate">
                        <label for="email_inline">Email</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Ancien form -->
            <form action="" method="POST">
                <section class="formulaire">
                    <section id="info_log">
                        <section class="form-group">
                            <label for="username">Login: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $username = (isset($_POST['username']))? $_POST['username'] : '' ?>" required>
                        </section>
                        <section class="form-group">
                            <label for="email">Email: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email = (isset($_POST['email']))? $_POST['email'] : '' ?>" required>
                        </section>
                        <section class="form-group">
                            <label for="password">Mot de passe: <span class="oblig">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $password = (isset($_POST['password']))? $_POST['password'] : '' ?>" required>
                        </section>  
                        <section class="form-group">
                            <label for="password_confirm">Confirmer mot de passe: <span class="oblig">*</span></label>
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="<?php echo $password_confirm = (isset($_POST['password_confirm']))? $_POST['password_confirm'] : '' ?>" required>
                        </section>              
                    </section>
                    <section id="info_user">
                        <section class="form-group">
                            <label for="nom">Nom: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom = (isset($_POST['nom']))? $_POST['nom'] : '' ?>" required>
                        </section>
                        <section class="form-group">
                            <label for="prenom">Prénom: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom = (isset($_POST['prenom']))? $_POST['prenom'] : '' ?>" required>
                        </section>
                        <section class="form-group">
                            <label for="telephone">Téléphone: </label>
                            <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $telephone = (isset($_POST['telephone']))? $_POST['telephone'] : '' ?>">
                        </section>
                        <section class="form-group">
                            <label for="adresse">Adresse: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $adresse = (isset($_POST['adresse']))? $_POST['adresse'] : '' ?>" required>
                        </section>
                        <section class="form-group">
                            <label for="ville">Ville: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $ville = (isset($_POST['ville']))? $_POST['ville'] : '' ?>" required>
                        </section>
                        <section class="form-group">
                            <label for="cp">Code postal: <span class="oblig">*</span></label>
                            <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp = (isset($_POST['cp']))? $_POST['cp'] : '' ?>" required>
                        </section>                
                    </section>
                </section>    
                <section class="valid_form">
                    <input type="submit" class="btn bouton" name="valid_insc" value="Inscription">
                    <small><span class="oblig">*</span>Champs obligatoires</small>
                </section>                          
            </form>
    </main>
    <?php include 'inc/footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>