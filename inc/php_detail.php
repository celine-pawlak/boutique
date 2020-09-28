<?php
require_once 'inc/initialisation.php';
if(Session::getInstance()->hasSession('current_user'))
     {
          if(isset($_GET['id_commande']) && is_numeric($_GET['id_commande']))
               {
                    $bdd = App::getDatabase();
                    $id_commande = $_GET['id_commande'];
                    $is_com = $bdd->query('SELECT id, numero FROM commandes WHERE id=?', [$id_commande])->fetch();
                    if(!empty($is_com))
                         {
                              $commande = $bdd->query('SELECT * FROM produits_commandes INNER JOIN commandes ON commandes.numero = produits_commandes.num_commande WHERE commandes.id=?', [$id_commande])->fetchAll();                                                                                                              
                              $id_user = $commande[0]->id_utilisateurs;;
                              $user = $bdd->query('SELECT nom, prenom, email FROM utilisateurs WHERE id=?', [$id_user])->fetch();                                                                                                                                                                            
                         }
                    else
                         App::redirect('profil.php');//Créer page erreur ?                    
               }
          else
               App::redirect('profil.php');//Créer page erreur ?
     }
else     
     App::redirect('index.php');     
     
?>