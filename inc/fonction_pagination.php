<?php    
    function prepaPagination($p, $t, $g, $o, $bdd, $champ, $id)//nombre par page, table choisie, numero de la page, colonne pour le tri, colonne pour le where, id utilisateur
        {                                                                                              
            $count = $bdd->query("SELECT COUNT(id) as count_ FROM $t")->fetch(PDO::FETCH_ASSOC);
            
           $nb_total = $count["count_"];                     
           $nb_page = ceil($nb_total/$p);

           if(!empty($g) && $g>0 && $g<=$nb_page)
                {
                    $page = (int) strip_tags($g);
                }
            else
                {
                    $page = 1;
                }  
            
            $a_partir_du = (($page-1)*$p);

            
            $recup = $bdd->query("SELECT * FROM $t WHERE $champ = ? ORDER BY $o LIMIT $a_partir_du, $p", [$id])->fetchAll(PDO::FETCH_ASSOC);
            $nb_ = count($recup);                                                                        
                         
            $infos['recup'] = $recup;
            $infos['compte'] = $nb_;
            $infos['nb_total'] = $nb_total;
            $infos['nb_page'] = $nb_page;
            $infos['par_page'] = $p;            
            $infos['page'] = $page;            
            return $infos;
        }
    function pagination($pp ,$nt, $n, $p, $s, $a='')
        {            
            if($nt>$pp)
                {                  
                ?>
                <section id="affiche_pagi">
                    <section>
                        <?php
                            if($p>1)
                                {                                                               
                                    ?>
                                    <a class="button" href="admin.php?<?= $s ?>=<?=$p-1 ?><?= $a ?>">Précédent</a>
                                    <?php
                                }
                            else
                                {                                
                                    ?>
                                    <p></p>
                                    <?php
                                }
                        ?>
                    </section>                
                    <section>
                        <?php
                            if($p < $n)
                                {                               
                                    ?>
                                    <a class="button" href="admin.php?<?= $s ?>=<?= $p+1 ?><?= $a ?>">Suivant</a>
                                    <?php
                                }                       
                        ?>
                    </section>
                </section>
                
                <?php
            }
        }        
?>