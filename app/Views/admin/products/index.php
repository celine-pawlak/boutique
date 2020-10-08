<h4 class="center">Administrer les produits</h4>

<p class="center">
    <a href="?p=admin.products.add" class="btn btn-medium waves-effect waves-light green"><i
                class="left material-icons">add_circle</i>Ajouter un produit</a>
</p>

<table class="highlight">
    <thead>
    <tr>
        <td>#</td>
        <td>Catégorie</td>
        <td>Sous-catégorie</td>
        <td>Image</td>
        <td>Produit</td>
        <td><i class="material-icons">euro_symbol</i></td>
        <td>En stock</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach ($products as $product) :
        $i++; ?>
        <tr>
            <td><?= $i ?></td>
            <?php
            $subcategory_exist = false;
            $category_exist = false;
            foreach ($subcategories as $subcategory) {
                if ($subcategory->id == $product->id_sous_categories) {
                    $subcategory_exist = true;
                    foreach ($categories as $category) {
                        if ($category->id == $subcategory->id_categories) { ?>
                            <?php $category_exist = true; ?>
                            <td><?= $category->gender ?> / <?= $category->nom ?></td>
                            <?php $subcategory_exist_without_category = $subcategory->nom ?>
                            <td><?= $subcategory->nom ?></td>
                            <?php
                        }
                    }
                }
            } ?>
            <?php if (!$category_exist): ?>
            <td><i class="material-icons left red-text">warning</i> La catégorie n'existe plus, veuillez éditer !</td>
            <?php endif ?>
            <?php if (!$subcategory_exist): ?>
            <td><i class="material-icons left red-text">warning</i> La sous-catégorie n'existe plus, veuillez éditer !</td>
            <?php elseif (!$category_exist AND $subcategory_exist) : ?>
                <td><?= $subcategory_exist_without_category ?></td>
            <?php endif ?>
            <td><img class="image_admin" src="../app/src/images/<?= $product->image_path ?>"></td>
            <td class="center"><?= $product->nom ?></td>
            <td class="center"><?= $product->prix ?> €</td>
            <td class="center"><?= $product->stock ?></td>
            <td>
                <div class="center">
                    <a class="btn btn-small waves-effect waves-light teal"
                       href="?p=admin.products.edit&id=<?= $product->id ?>">Editer</a>
                    <form action="?p=admin.products.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <button type="submit" class="btn btn-small waves-effect waves-light red darken-3">
                            Supprimer
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>