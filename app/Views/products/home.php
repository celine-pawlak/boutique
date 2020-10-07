<section id="encart">
    <h1 class="white-text">Coqu'Etique</h1>
</section>
<h2 class="center display-3">Nouveautés</h2>
<section class="row produit_index">
    <?php
    foreach ($derniers as $dernier): ?>
        <div class="col s12 m6 l4 xl4">
            <div class="card">
                <div class="card-image">
                    <img class="image_admin" src="../app/src/images/<?= $dernier->image_path ?>"
                         alt="<?= $dernier->nom ?>">
                </div>
                <div class="card-content">
                    <span class="card-title"><?= $dernier->nom ?></span>                    
                </div>
                <div class="card-action">
                    <a href="produits.php?id=<?= $dernier->id ?>">Voir le Produit</a>
                    <p class="btn-floating btn-large teal"><?= $dernier->prix ?> €</p>
                </div>
            </div>
        </div>
    <?php
    endforeach; ?>
</section>
<section id="encart2"></section>
<h2 class="center">Meilleures ventes</h2>
<section class="row produit_index">
    <?php
    foreach ($meilleurs as $meilleur) : ?>
        <div class="col s12 m6 l4 xl4">
            <div class="card">
                <div class="card-image">
                    <img class="image_admin" src="../app/src/images/<?= $meilleur->image_path ?>"
                         alt="<?= $meilleur->nom ?>">
                </div>
                <div class="card-content">
                    <span class="card-title"><?= $meilleur->nom ?></span>                    
                </div>
                <div class="card-action">
                    <a href="produits.php?id=<?= $meilleur->id ?>">Voir le Produit</a>
                    <p class="btn-floating btn-large teal"><?= $meilleur->prix ?> €</p>
                </div>
            </div>
        </div>
    <?php
    endforeach; ?>
</section>