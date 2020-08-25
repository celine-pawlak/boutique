<header>
    <?php
    if (Session::getInstance()->hasFlashes()) {
        foreach (Session::getInstance()->getFlashes() as $type => $message) {
            ?>
            <section class="alert alert-<?= $type ?>">
                <?= $message ?>
            </section>
            <?php
        }
    }
    ?>
    <nav>
        <div><a href="../index.php">Accueil</a></div>
        <div><a href="../categories.php">Catégories</a></div>
        <!--si non connecté-->
        <div><a class="<?= App::getAuth()->user() ? 'd-none' : '' ?>" href="inscription.php">S'inscrire</a></div>
        <div><a class="<?= App::getAuth()->user() ? 'd-none' : '' ?>" href="connexion.php">Se connecter</a></div>
        <!--si admin-->
        <div><a class="<?= App::getAuth()->user()->is_admin == 1 ? '' : 'd-none' ?>" href="admin.php">Gestion
                Admin</a></div>
        <!--si connecté-->
        <div><a class="<?= App::getAuth()->user() ? '' : 'd-none' ?>" href="profil.php">Mon compte</a></div>
        <!--fin si connecté-->
        <div><a href="panier.php">Panier</a></div>
    </nav>
</header>