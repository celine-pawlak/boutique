<?php

use Core\Auth\DBAuth;

$app = App::getInstance();
$auth = new DBAuth($app->getDb());


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App::getInstance()->title; ?></title>
    <!-- Materialize icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize and CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../public/css/style.css">

    <!-- Js & Jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../public/js/script.js"></script>

</head>
<body>
<header>
    <!-- Dropdown Categories nav -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a class='teal-text' href='index.php?p=categories.index'>Voir les catégories</a></li>
        <li><a class='teal-text' href='index.php?p=products.index'>Tous les produits</a></li>
        <li class='divider'></li>
        <div class="row">
            <div class="col s6">
                <ul>
                    <h6>FEMME</h6>
                    <?php
                    foreach ($categories as $category) : ?>
                        <?php
                        if ($category->gender == 'Femme') : ?>
                            <li>
                                <a href='index.php?p=products.category&id=<?= $category->id ?>'><?= $category->nom ?></a>
                            </li>
                        <?php
                        endif ?>
                    <?php
                    endforeach; ?>
                </ul>
            </div>
            <div class="col s6">
                <ul>
                    <h6>HOMME</h6>
                    <?php
                    foreach ($categories as $category) : ?>
                        <?php
                        if ($category->gender == 'Homme') : ?>
                            <li>
                                <a href='index.php?p=products.category&id=<?= $category->id ?>'><?= $category->nom ?></a>
                            </li>
                        <?php
                        endif; endforeach; ?>
                </ul>
            </div>
        </div>
    </ul>
    <!-- Dropdown Categories nav MOBILE-->
    <ul id="dropdown3" class="dropdown-content">
        <li><a href='index.php?p=categories.index'>Voir les catégories</a></li>
        <li><a href='index.php?p=products.index'>Tous les produits</a></li>
        <li class='divider'></li>
        <li>
            <ul>
                <li><em>Femme</em></li>
                <?php
                foreach ($categories as $category) : ?>
                    <?php
                    if ($category->gender == 'Femme') : ?>
                        <li>
                            <a href='index.php?p=products.category&id=<?= $category->id ?>'><?= $category->nom ?></a>
                        </li>
                    <?php
                    endif ?>
                <?php
                endforeach; ?>
            </ul>
        </li>
        <li>
            <ul>
                <li><em>Homme</em></li>
                <?php
                foreach ($categories as $category) : ?>
                    <?php
                    if ($category->gender == 'Homme') : ?>
                        <li>
                            <a href='index.php?p=products.category&id=<?= $category->id ?>'><?= $category->nom ?></a>
                        </li>
                    <?php
                    endif; endforeach; ?>
            </ul>
        </li>
    </ul>
    <!-- Dropdown Administrateur -->
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="index.php?p=admin.categories.index">Catégories</a></li>
        <li><a href="index.php?p=admin.subcategories.index">Sous-catégories</a></li>
        <li><a href="index.php?p=admin.products.index">Produits</a></li>
        <li class="divider"></li>
        <li><a href="index.php?p=admin.users.index">Utilisateurs</a></li>
    </ul>
    <!-- Dropdown Administrateur MOBILE -->
    <ul id="dropdown4" class="dropdown-content darken-3-text">
        <li><a href="index.php?p=admin.categories.index">Catégories</a></li>
        <li><a href="index.php?p=admin.subcategories.index">Sous-catégories</a></li>
        <li><a href="index.php?p=admin.products.index">Produits</a></li>
        <li class="divider"></li>
        <li><a href="index.php?p=admin.users.index">Utilisateurs</a></li>
    </ul>
    <!-- nav -->
    <nav class="teal lighten-5">
        <div class="nav-wrapper container teal lighten-5">
            <a href="#!" id="link_logo_header" class="brand-logo"><img class="logo_header"
                                                                       src="../app/src/images/CoqEthiqueLogo.png"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="text-darken-3">
                    <a class="text-darken-3 dropdown-trigger" href="#!" data-target="dropdown1">Catégories
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-trigger darken-3-text <?= $auth->logged() && $auth->admin() ? '' : 'd-none' ?>"
                       href="#!"
                       data-target="dropdown2">Espace administrateur
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a href="index.php?p=users.account"
                       class="navbar-brand <?= $auth->logged() ? '' : 'd-none' ?> align-items-center">
                        Mon compte
                    </a>
                </li>
                <li>
                    <a href="index.php?p=users.basket"
                       class="navbar-brand <?= $auth->logged() ? '' : 'd-none' ?> align-items-center">
                        <i class="material-icons left">shopping_cart</i>Panier
                    </a>
                </li>
                <li>
                    <a href="index.php?p=users.login"
                       class="navbar-brand <?= $auth->logged() ? 'd-none' : '' ?> align-items-center">
                        Se connecter
                    </a>
                </li>
                <li>
                    <a href="index.php?p=users.register"
                       class="navbar-brand <?= $auth->logged() ? 'd-none' : '' ?> align-items-center">
                        S'inscrire
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- nav mobile -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="#!" class="brand-logo center"><img class="logo_header2" src="../app/src/images/CoqEthiqueLogo.png"></a>
        </li>
        <li>
            <a class="dropdown-trigger" href="#!" data-target="dropdown3">Catégories<i
                        class="material-icons right">arrow_drop_down</i></a>
        <li class="<?= $auth->logged() && $auth->admin() ? '' : 'd-none' ?>">
            <a class="dropdown-trigger" href="#!"
               data-target="dropdown4">Espace administrateur<i
                        class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li class="<?= $auth->logged() ? '' : 'd-none' ?>">
            <a href="index.php?p=users.account"
               class="navbar-brand align-items-center">
                Mon compte
            </a>
        </li>
        <li class="<?= $auth->logged() ? '' : 'd-none' ?>">
            <a href="index.php?p=users.basket"
               class="navbar-brand align-items-center">
                <i class="material-icons">shopping_cart</i>
            </a>
        </li>
        <li class="<?= $auth->logged() ? 'd-none' : '' ?>">
            <a href="index.php?p=users.login"
               class="navbar-brand align-items-center">
                Se connecter
            </a>
        </li>
        <li class="<?= $auth->logged() ? 'd-none' : '' ?>">
            <a href="index.php?p=users.register"
               class="navbar-brand align-items-center">
                S'inscrire
            </a>
        </li>
    </ul>
</header>
<body>
<main role="main">

    <section class="container">
        <?= $content; ?>
    </section>

</main>
</body>
<footer class="text-muted">
</footer>
</html>
