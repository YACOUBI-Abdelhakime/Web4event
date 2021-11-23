<div class="nav-space"></div>

<!-- ======= Actualites Section ======= -->
<section id="hotels" class="section-with-bg">

    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Galerie des invités</h2>
        </div>
        <!-- <div class="row"> -->
        <?php
            if ($invs != NULL){
                ?>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <?php
                    // Boucle de parcours de toutes les lignes du résultat obtenu
                    foreach($invs as $a){
                        // Affichage d’une ligne de tableau pour un pseudo non encore traité
                        if (!isset($traite[$a["inv_id"]]) /*&& $a["inv_etat"] == 'a'*/){
                            $cpt_id=$a["inv_id"];?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card" >
                                    <img class="card-img-top" src="<?php echo base_url().''.$a['inv_photo']?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h3><a href="#"><?php echo $a["inv_nom"];?></a></h3>

                                        <div class="reseaux">
                                        <?php
                                        $reseauxExist = false;
                                        $facebook = true;
                                        $twitter = true;
                                        $linkedin = true;
                                        foreach($invs as $act){
                                            
                                            if(strcmp($cpt_id,$act["inv_id"])==0){
                                                if($twitter && $act["res_libelle"] == "Twitter"){
                                                    $reseauxExist = true;
                                                    $twitter = false;
                                                    ?>
                                                    <a href="<?php echo $act["res_url"];?>"><i class="bi bi-twitter"></i></a>
                                                    <?php
                                                }else if($facebook && $act["res_libelle"] == "Facebook"){
                                                    $reseauxExist = true;
                                                    $facebook = false;
                                                    ?>
                                                    <a href="<?php echo $act["res_url"];?>"><i class="bi bi-facebook"></i></a>
                                                    <?php
                                                }else if($linkedin && $act["res_libelle"] == "LinkedIn"){
                                                    $reseauxExist = true;
                                                    $linkedin = false;
                                                    ?>
                                                    <a href="<?php echo $act["res_url"];?>"><i class="bi bi-linkedin"></i></a>
                                                    <?php
                                                }
                                            }
                                        }
                                        if(!$reseauxExist){
                                            echo "<div class='reseaux'><p>Pas de réseau social pour cet invité !</p></div>";
                                        }
                                        //$traite[$a["inv_id"]]=1;
                                        ?>
                                        </div><!--fin reseaux-->

                                        <h3 class="titlePosts">Derniers Posts</h3>
                                        <div class="posts">
                                            
                                            <?php
                                            $postsExist = false;
                                            $postsId = array();
                                            $nbPosts = 0;
                                            foreach($invs as $act){                                               
                                                if($nbPosts <= 3 && strcmp($cpt_id,$act["inv_id"])==0 && $act["pos_libelle"] != null && $act["pos_etat"] == 'a' && $act["pas_etat"] == 'a' && !in_array($act["pos_id"],$postsId) ){
                                                    array_push($postsId, $act["pos_id"]);
                                                    $nbPosts++;
                                                    $postsExist = true;
                                                    ?>
                                                    <p><b><u><?php echo $act["pos_datePost"];?> : </u></b></p>
                                                    <p><?php echo $act["pos_libelle"];?></p>
                                                    <?php
                                                }
                                            }
                                            if(!$postsExist){
                                                echo "<div class='posts'><p>Pas de posts pour cet invité !</p></div>";
                                            }
                                            $traite[$a["inv_id"]]=1;
                                            ?>
                                        </div><!--fin posts-->

                                    </div>
                                </div>
                            </div>
                            <?php
                        } 
                    }
                ?></div><?php
            }else {
                echo "<br />";
                echo "<h3>Aucun invité pour l'instant !</h3>";
            }
                    ?>
                </tbody>
            </table>
        <!-- </div>  -->
    </div>


</section><!-- End Actualites Section -->

<!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div> -->