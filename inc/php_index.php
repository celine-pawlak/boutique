<?php
    require_once 'inc/initialisation.php';    
    $bdd = App::getDatabase();    
    Session::getInstance();    

    $dernier = $bdd->query("SELECT * FROM produits ORDER BY id DESC LIMIT 3")->fetchAll();
    $taille_d = count($dernier); 

    $meilleur = $bdd->query('SELECT * FROM produits_commandes INNER JOIN produits ON produits_commandes.id_produit=produits.id ORDER BY quantite DESC LIMIT 3')->fetchAll();    
    $taille_m = count($meilleur);       
    
    function affiche_produit($dernier, $taille)
        {
            for($i = 0; $i<$taille; $i++)
                {
                    ?>                     
                        <div class="col s12 m7 l3 xl3">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?=$dernier[$i]->image_path?>" alt="<?=$dernier[$i]->nom?>">                                    
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?=$dernier[$i]->nom?></span>
                                    <p><?=$dernier[$i]->prix?> €</p>
                                </div>
                                <div class="card-action">
                                    <a href="produits.php?id=<?=$dernier[$i]->id?>">Voir le Produit</a>
                                </div>
                            </div>
                        </div>                
                    <?php
                }
        }
?>