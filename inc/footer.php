<?php
    if(isset($_POST['deco']))
        {
            session_destroy();
            App::redirect('index.php');
        }
?>
<!-- <footer>
    <form action="" method="POST">
        <input type="submit" value="Déconnexion" name="deco">
    </form>
</footer> -->
<footer class="page-footer green lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"><a  href="index.php">Coq Etique</a></h5>
                <p class="grey-text text-lighten-4">Boutique de vêtements 100% Made in France</p>                
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Liens</h5>
                <ul>
                    <li><a  href="categories.php">Categories</a></li>
                    <li><a  href="panier.php">Panier</a></li>
                    <?php
                        if(isset($_SESSION['current_user']))
                            {
                                ?>
                                <li><a  href="profil.php">Mon compte</a></li>                                
                                <?php
                            }
                        else
                            {
                                ?>
                                <li><a  href="inscription.php">Inscription</a></li>
                                <li><a  href="connexion.php">Connexion</a></li>
                                <?php
                            }
                    ?>
                
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container center ">
                <p class="text_footer">© 2020 Copyright Céline Pawlak - Martin Bozon</p>
            </div>
          </div>
        </footer>