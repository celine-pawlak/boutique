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
    </main>
    <?php include 'inc/footer.php'; ?>
</body>
</html>