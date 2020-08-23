<?php
    include 'inc/php_connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Connexion</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php';?>
    </header>
    <main id="main_connexion">
        <h2>Formulaire de Conenxion</h2>
            <form action="" method="POST">                
                <section class="form-group">
                    <label for="login">Login ou Email: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </section>
                <section class="form-group">
                    <label for="password">password: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="password" id="password" required>
                </section>      
                <section class="valid_form">
                    <input type="submit" class="btn bouton" name="valid_con" value="Connexion">
                </section>              
                
            </form>
            <small>Si vous n'avez pas encore de compte => <a href="inscription.php">inscription</a></small>
    </main>
   <?php include 'inc/footer.php';?>
</body>
</html>