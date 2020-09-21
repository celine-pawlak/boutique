<?php 
require_once 'inc/php_index.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
    <link rel="stylesheet" href="styles/css/style.css"/>
    <title>Coq Ethique</title>
</head>
<body>
    <?php include 'inc/header.php';?>
    <main>
        <section id="encart" class="row">  
            <div id="titre" class="col-sm12 col-lg12 col-xl12">
                <h1>Coq Etique</h1>
            </div>          
        </section>
        <h2 class="center display-3">Nouveautés</h2>     
        <section class="row produit_index">   
            <?php affiche_produit($dernier, $taille_d);?>            
        </section>
        <section id="encart2"></section>
        <h2 class="center">Meilleures ventes</h2>
        <section class="row produit_index">
            <?php affiche_produit($meilleur, $taille_m);?>  
        </section>
    </main>
    <?php include 'inc/footer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>