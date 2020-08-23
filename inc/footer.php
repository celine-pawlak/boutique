<?php
    if(isset($_POST['deco']))
        {
            unset($_SESSION['current_user']);
            App::redirect('index.php');
        }
?>
<footer>
    <form action="" method="POST">
        <input type="submit" value="Déconnexion" name="deco">
    </form>
</footer>