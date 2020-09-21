<?php
    include 'inc/php_connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Connexion</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php';?>
    </header>
    <main id="main_connexion">
        <h2>Formulaire de Conenxion</h2>        
        <section class="row">
            <form class="col s12" method="POST" action="">               
                <div class="row">
                    <div class="input-field col s12">
                        <label for="login">Login ou Email: <span class="oblig">*</span></label>
                        <input type="text" class="validate" name="login" id="login" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="password">password: <span class="oblig">*</span></label>
                        <input type="password" class="validate" name="password" id="password" required>
                    </div>
                </div>      
                <div class="valid_form">
                    <input type="submit" class="btn bouton" name="valid_con" value="Connexion">
                </div>                                    
            </form>
        </section>                   
        <small>Si vous n'avez pas encore de compte => <a href="inscription.php">inscription</a></small>
    </main>
   <?php include 'inc/footer.php';?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>