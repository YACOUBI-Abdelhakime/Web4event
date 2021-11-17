<div class="nav-space"></div>

<!-- ======= Actualites Section ======= -->
<section id="speakers" class="section-with-bg">

    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Galerie des invités</h2>
        </div>
        <div class="row">
        <?php
            //if($invs != NULL) {
                foreach($invs as $inv){
                    if (!isset($traite[$inv["inv_id"]])){
                        $inv_id=$inv["inv_id"];
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?php echo base_url()."../../".$inv["inv_photo"];?>" alt="photo invite" class="img-fluid">
                            <div class="details">
                                <h3><a href="#"><?php echo $inv["inv_nom"];?></a></h3>
                                <!-- <p>Quas alias incidunt</p> -->
                                <div class="social">
                                    <?php 
                                    foreach($invs as $inv){
                                        if(strcmp($inv_id,$inv["inv_id"])==0){
                                            //if($inv["inv_nom"] != null){
                                                if($inv["res_libelle"] == "Twitter")
                                    ?>
                                    <a href="<?php echo $inv["res_url"];?>"><i class="bi bi-twitter"></i></a>
                                                <?php if($inv["res_libelle"] == "Facebook") ?>
                                    <a href="<?php echo $inv["res_url"];?>"><i class="bi bi-facebook"></i></a>
                                                <?php if($inv["res_libelle"] == "Linkedin") ?>
                                    <a href="<?php echo $inv["res_url"];?>"><i class="bi bi-linkedin"></i></a>
                                    <?php
                                            // }else{
                                            //     echo "Aucun invité";
                                            // } 
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php $traite[$inv["inv_id"]]=1;?>
                    <?php
                    }
                }
            /*}else {
                ?>
                <h3><a>Aucun Invités !</a></h3>
                <?php
            }*/
            ?>
        </div> 
    </div>


</section><!-- End Actualites Section -->