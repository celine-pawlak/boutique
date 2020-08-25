<?php
    class class_panier
        {
            public function __construct()
                {
                    if(!isset($_SESSION['panier']))
                        {
                            Session::getInstance()->setSession('panier', []);                            
                        }
                    return $_SESSION['panier'];
                }           
            public function add($produit_id, $quantite, $bdd)
                {                                                     
                    if(isset($_SESSION['panier'][$produit_id]))
                        {                            
                            $quantite_conf = $_SESSION['panier'][$produit_id]['quantite'];
                            Session::getInstance()->addSession('panier', $produit_id, ['id'=>$produit_id, 'quantite' =>($quantite_conf + $quantite)]);
                            // $_SESSION['panier'][$produit_id] = ['id'=>$produit_id, 'quantite' =>($quantite_conf + $quantite)];
                        }
                        else        
                        {                           
                            Session::getInstance()->addSession('panier', $produit_id, ['id'=>$produit_id, 'quantite' =>$quantite]);
                            // $_SESSION['panier'][$produit_id] = ['id'=>$produit_id, 'quantite' =>$quantite];                                                                  
                        }                                       
                }
            public function getPanier()
                {                    
                    return $_SESSION['panier'];                        
                }
            public function affichagePanier($getpanier, $bdd)
                {
                    if(!empty($getpanier))
                        {                            
                            ?>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($getpanier as $nombre => $produit)
                                            {            
                                                $info_produit = $bdd->query('SELECT * FROM produits WHERE id=?', [$produit['id']])->fetch();
                                                ?>
                                                <tr>
                                                    <td><?= $info_produit->nom ?></td>
                                                    <td><?= $produit['quantite'] ?></td>
                                                    <td><?= ($info_produit->prix * $produit['quantite']) ?></td>                                        
                                                    <td></td>                                        
                                                </tr>
                                                <?php
                                            }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }
                    else
                        {
                            ?>
                             <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th>#</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                }
            }
?>