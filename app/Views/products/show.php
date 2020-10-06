<div class="row p-1">
    <div class="col s12">
        <span>
            <a class="disabled">
            <?= $product->getGender($subcategories, $categories); ?>
            </a>
            >
            <a href="index.php?p=products.category&id=<?= $product->getCategory($subcategories, $categories)[1] ?>">
                <?= $product->getCategory($subcategories, $categories)[0]; ?>
            </a>
            >
            <a href="index.php?p=products.subcategory&id=<?= $product->id_sous_categories ?>">
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
        <?php
        if ($product->stock == 0): ?>
            <button type="submit" class="btn" name="add_to_basket" disabled>Ajouter au panier</button>
            <p>Nous sommes désolé, il n'y a plus de stock pour ce produit :(</p>
        <?php
        else : ?>
            <form action="" method="POST">
                <?= $form->input('quantity', 'Quantité', ['type' => 'number']); ?>
                <button type="submit" class="btn" name="add_to_basket" value="1">Ajouter au panier</button>
            </form>
        <?php
        endif; ?>
    </div>
</div>
