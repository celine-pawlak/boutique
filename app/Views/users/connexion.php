<section id="main_connexion">
    <h4 class="center">Connexion</h4>
    <p class="flow-text">Inscrivez-vous et connectez-vous pour valider votre panier</p>
    <section class="row">
        <form class="col s12" method="POST" action="">
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Email: <span class="oblig">*</span></label>
                    <input type="email" class="validate" name="email" id="email" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="password">password: <span class="oblig">*</span></label>
                    <input type="password" class="validate" name="password" id="password" required>
                </div>
            </div>
            <div class="valid_form">
                <input type="submit" class="btn bouton" name="valid_con" value="Connexion">
            </div>
        </form>
    </section>
    <small>Si vous n'avez pas encore de compte => <a href="inscription.php">inscription</a></small>
</section>
