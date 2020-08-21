<?php
    require_once 'inc/initialisation.php'; //permet de require tous les fichiers class nécessaires
    $bdd = App::getDatabase(); //pour créer une connection à la bdd
    
    $validation = new Validation($_POST);

    $validation->isPseudo('martin', "Votre pseudo n'est pas valide");
    if($validation->isValid())
        {
            echo 'toto';
            $validation->isUniq('username', $bdd, 'utilisateurs', 'Ce pseudo est déjà prit');
        }
    
    $validation->isEmail('email', "Votre email n'est pas valide");
    if($validation->isValid())
        {
            echo 'tata';
            $validation->isUniq('email', $bdd, 'utilisateurs', 'Cet email est déjà prit');
        }
    
    $validation->isConfirm('password', "Vous devez rentrer un mot de passe valide");

    if($validation->isValid())
        {
            echo 'tutu';
            $auth = new Auth($bdd);
            $auth->register($_POST["username"], $_POST["password"], $_POST["email"], $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["ville"], $_POST["cp"]);
            $session = new Session();           
            App::redirect('connexion.php');            
        }
    else
        {
            $error = $validation->getError();
            var_dump($error);
        }
    var_dump($validation->isValid);
?>