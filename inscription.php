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
    <header></header>
    <main>
        <h2></h2>
        <form action="" method="POST">
            <section>
                <section class="form-group">
                    <label for="username">Login: </label>
                    <input type="text" class="form-control" name="username" id="username">
                </section>
                <section class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" name="email" id="email">
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
            <section>
                <section class="form-group">
                    <label for="nom">Nom: </label>
                    <input type="text" class="form-control" name="nom" id="nom">
                </section>
                <section class="form-group">
                    <label for="prenom">Prénom: </label>
                    <input type="text" class="form-control" name="prenom" id="prenom">
                </section>
                <section class="form-group">
                    <label for="telephone">Téléphone: </label>
                    <input type="text" class="form-control" name="telephone" id="telephone">
                </section>
                <section class="form-group">
                    <label for="adresse">Adresse: </label>
                    <input type="text" class="form-control" name="adresse" id="adresse">
                </section>
                <section class="form-group">
                    <label for="ville">Ville: </label>
                    <input type="text" class="form-control" name="ville" id="ville">
                </section>
                <section class="form-group">
                    <label for="cp">Code postal: </label>
                    <input type="text" class="form-control" name="cp" id="cp">
                </section>                
            </section>
            <input type="submit" class="btn btn-primary" name="valid_insc" value="Inscription">
        </form>
    </main>
    <footer></footer>
</body>
</html>