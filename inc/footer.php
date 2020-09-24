<?php
    if(isset($_POST['deco']))
        {
            session_destroy();
            App::redirect('index.php');
        }
?>
<footer>
    <form action="" method="POST">
        <input type="submit" value="Déconnexion" name="deco">
    </form>
</footer>