<?php
    require_once 'inc/initialisation.php'; //permet de require tous les fichiers class nécessaires
    $bdd = App::getDatabase(); //pour créer une connection à la bdd
    
    $validation = new Validation($_POST);

    $validation->isAlpha('martin', "Votre pseudo n'est pas valide");
    if($validation->isValid())
        {
            $validation->isUniq('username', $bdd, 'utilisateurs', 'Ce pseudo est déjà prit');
        }
    
    $validation->isEmail('email', "Votre email n'est pas valide");
    if($validation->isValid())
        {
            $validation->isUniq('email', $bdd, 'utilisateurs', 'Cet email est déjà prit');
        }
    
    $validation->isConfirm('password', "Vous devez rentrer un mot de passe valide");

    if($validation->isValid())
        {

        }
    else
        {
            $error = $validation->getError();
        }
    var_dump($validation);
?>