<?php
    include 'inc/php_inscription.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main>
        <h2>Forulaire d'inscription</h2>
        <form action="" method="POST">
            <section>
                <section class="form-group">
                    <label for="username">Login: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $username = (isset($_POST['username']))? $_POST['username'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="email">Email: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email = (isset($_POST['email']))? $_POST['email'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="password">Mot de passe: <span class="oblig">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $password = (isset($_POST['password']))? $_POST['password'] : '' ?>">
                </section>  
                <section class="form-group">
                    <label for="password_confirm">Confirmer mot de passe: <span class="oblig">*</span></label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="<?php echo $password_confirm = (isset($_POST['password_confirm']))? $_POST['password_confirm'] : '' ?>">
                </section>              
            </section>
            <section>
                <section class="form-group">
                    <label for="nom">Nom: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom = (isset($_POST['nom']))? $_POST['nom'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="prenom">Prénom: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom = (isset($_POST['prenom']))? $_POST['prenom'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="telephone">Téléphone: </label>
                    <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $telephone = (isset($_POST['telephone']))? $_POST['telephone'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="adresse">Adresse: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $adresse = (isset($_POST['adresse']))? $_POST['adresse'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="ville">Ville: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $ville = (isset($_POST['ville']))? $_POST['ville'] : '' ?>">
                </section>
                <section class="form-group">
                    <label for="cp">Code postal: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp = (isset($_POST['cp']))? $_POST['cp'] : '' ?>">
                </section>                
            </section>
            <input type="submit" class="btn btn-primary" name="valid_insc" value="Inscription">
        </form>
        <small><span class="oblig">*</span>Champs obligatoires</small>
    </main>
    <?php include 'inc/footer.php';?>
</body>
</html>