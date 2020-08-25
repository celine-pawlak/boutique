<?php
    // class class_panier
        
            function __construct()
                {
                    if(!isset($_SESSION['panier']))
                        {
                            $_SESSION['panier'] = [];                            
                        }
                }           
            function add($produit_id, $quantite)
                {                                  
                    echo 'toto';
                    if(isset( $_SESSION['panier'][$produit_id]))
                        {
                            echo 'tata';
                            $quantite_conf = $_SESSION['panier'][$produit_id]['quantite'];
                            $_SESSION['panier'][$produit_id] = ['id'=>$produit_id, 'quantite' =>($quantite_conf + $quantite)];
                        }
                        else        
                        {
                            echo 'tutu';
                            $_SESSION['panier'][$produit_id] = ['id'=>$produit_id, 'quantite' =>$quantite];                
                        }                                       
                }
            function getPanier()
                {                    
                    return $_SESSION['panier'];                        
                }
            function affichagePanier($getpanier, $bdd)
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
                                                $info_produit = $bdd->query('SELECT * FROM produits')                             
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $produit['quantite'] ?></td>
                                                    <td></td>                                        
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
        
?>