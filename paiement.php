<?php include 'inc/php_paiement.php'; var_dump($_SESSION['panier']); ?>
<!-- $moinsStock = ($inStock->quantite - $quantite);
$destock = $bdd->query('UPDATE produits SET quantite=? WHERE id=?', [$moinsStock, $id_produit]); -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Paiement</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php';?>
    </header>
    <main id="main_paiement">        
        <section class="nav_etape">
            <nav class="green lighten-2">                
                <div id="navbarNav">
                    <ul class="etape navbar-nav">
                        <li class="nav-item">                            
                            <a class="nav-link">1 - Vérification du Panier</a>
                        </li>
                        <li class="nav-item">                            
                            <a class="nav-link">2 - Adresse livraison</a>
                        </li>
                        <li class="nav-item active">                            
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
            if(isset($retourpanier) && $retourpanier==true)
                {
                    ?>
                    <button class="btn bouton modif_p"><a href="panier.php">Modifier le panier</a></button>
                    <?php
                    $retourpanier = false;                    
                }
        ?>
        <h2>Valider le paiement</h2>
        <section class="row">
            <form action="" method="POST" id="form_paiement" class="col s8 m8 l8 xl8">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="carte">Numero de carte: <span class="oblig">*</span></label>
                        <input type="text" class="validate" name="carte" id="carte" value="<?= $carte = (isset($_POST['carte'])?$_POST['carte']: '') ?>">
                    </div>
                </div>
                <div class="row">
                    <label for="date_p">Date d'expiration: <span class="oblig">*</span></label>
                    <div class="input-field col s12">
                        <input type="month" class="validate" name="date_p" id="date_p" value="<?= $carte = (isset($_POST['date_p'])?$_POST['date_p']: $date_min) ?>" min="<?= $date_min ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="crypto">Cryptogramme de sécurité: <span class="oblig">*</span></label>
                        <input type="text" class="validate" name="crypto" id="crypto" value="<?= $carte = (isset($_POST['crypto'])?$_POST['crypto']: '') ?>">
                    </div>
                </div>            
                <div class="valid_form">
                    <input type="submit" class="btn bouton" name="valid_pay" value="Payer">                              
                    <small><span class="oblig">*</span>Champs obligatoires</small>
                </div>    
            </form>            
        </section>
    </main>
    <?php include 'inc/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
</body>
</html>