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
        <!-- Nouveau -->
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
                    <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                    <label for="disabled">Disabled</label>
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
            </form>
        </div>
        <!-- Ancien -->
            <form action="" method="POST">                
                <section class="form-group">
                    <label for="login">Login ou Email: <span class="oblig">*</span></label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </section>
                <section class="form-group">
                    <label for="password">password: <span class="oblig">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </section>      
                <section class="valid_form">
                    <input type="submit" class="btn bouton" name="valid_con" value="Connexion">
                </section>              
                
            </form>
            <small>Si vous n'avez pas encore de compte => <a href="inscription.php">inscription</a></small>
    </main>
   <?php include 'inc/footer.php';?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>