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
        <p class="flow-text">Inscrivez-vous et connectez-vous pour valider votre panier</p>
        <!-- Nouveau form -->
        <div class="row">
            <form class="col s12" method="POST" action="">
                <div class="row">
                    <div class="input-field col s12 m12 l6 xl6">
                        <input type="text" class="validate" name="username" id="username" value="<?php echo $username = (isset($_POST['username']))? $_POST['username'] : '' ?>" required>
                        <label for="username">Login <span class="oblig">*</span></label>
                    </div>                                                  
                    <div class="input-field col s12 m12 l6 xl6">
                        <input type="text" class="validate" name="email" id="email" value="<?php echo $email = (isset($_POST['email']))? $_POST['email'] : '' ?>" required>
                        <label for="email">Email <span class="oblig">*</span></label>
                    </div>                                
                    <div class="input-field col s12 m12 l6 xl6">
                    <label for="password">Mot de passe: <span class="oblig">*</span></label>
                        <input type="password" class="validate" name="password" id="password" value="<?php echo $password = (isset($_POST['password']))? $_POST['password'] : '' ?>" required>
                        <label for="password">Mot de passe <span class="oblig">*</span></label>
                    </div>                                
                    <div class="input-field col s12 m12 l6 xl6">
                        <input type="password" class="validate" name="password_confirm" id="password_confirm" value="<?php echo $password_confirm = (isset($_POST['password_confirm']))? $_POST['password_confirm'] : '' ?>" required>
                        <label for="password_confirm">Confirmer Mot de passe <span class="oblig">*</span></label>
                    </div>   
                </div>        
                <h5 class="center">Informations personnelles</h5>      
                <div class="row">
                    <div class="input-field col s12">
                        <label for="nom">Nom: <span class="oblig">*</span></label>
                        <input type="text" class="validate" name="nom" id="nom" value="<?php echo $nom = (isset($_POST['nom']))? $_POST['nom'] : '' ?>" required>
                    </div>                    
                    <div class="input-field col s12">
                        <label for="prenom">Prénom: <span class="oblig">*</span></label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom = (isset($_POST['prenom']))? $_POST['prenom'] : '' ?>" required>
                    </div>                    
                    <div class="input-field col s12">
                        <label for="telephone">Téléphone: </label>
                        <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $telephone = (isset($_POST['telephone']))? $_POST['telephone'] : '' ?>">
                    </div>                    
                    <div class="input-field col s12">
                        <label for="adresse">Adresse: <span class="oblig">*</span></label>
                        <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $adresse = (isset($_POST['adresse']))? $_POST['adresse'] : '' ?>" required>
                    </div>                    
                    <div class="input-field col s12">
                        <label for="ville">Ville: <span class="oblig">*</span></label>
                        <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $ville = (isset($_POST['ville']))? $_POST['ville'] : '' ?>" required>
                    </div>                    
                    <div class="input-field col s12">
                        <label for="cp">Code postal: <span class="oblig">*</span></label>
                        <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp = (isset($_POST['cp']))? $_POST['cp'] : '' ?>" required>
                    </div>                    
                </div>          
                <div class="valid_form">
                    <input type="submit" class="btn bouton" name="valid_insc" value="Inscription">
                    <small><span class="oblig">*</span>Champs obligatoires</small>
                </div>                
            </form>
        </div>       
    </main>
    <?php include 'inc/footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>