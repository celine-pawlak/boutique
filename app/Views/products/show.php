<div class="row p-1">
    <div class="col s12">
        <span>
            <a class="disabled">
            <?= $product->getGender($subcategories, $categories); ?>
            </a>
            >
            <a href="index.php?p=products.category&id=<?=$product->getCategory($subcategories, $categories)[1]?>">
                <?= $product->getCategory($subcategories, $categories)[0]; ?>
            </a>
            >
            <a href="index.php?p=products.subcategory&id=<?=$product->id_sous_categories?>" >
                <?= $product->sous_categorie ?>
            </a>
            >
            <a class="disabled"><?= $product->nom ?></a>
        </span>
    </div>
    <div class="col s6">
        <img class="image_show" src="../app/src/images/<?= $product->image_path ?>">
    </div>
    <div class="col s6">
        <h3><?= $product->nom; ?></h3>
        <span><?= $product->prix ?> €</span>
        <p><em><?= $product->sous_categorie ?></em></p>
        <div class="divider"></div>
        <p class="justify description">Description :
            <br>
            <?= $product->description ?>
        </p>
        <!-- input + et - -->
        <?php  var_dump($_POST); ?>
        <form action="" method="POST">
            <input name="id_produit" value="<?= $product->id ?>" hidden>
            <button type="submit" class="btn" name="quantite" value="1">Ajouter au panier</button>
        </form>
    </div>
</div>
