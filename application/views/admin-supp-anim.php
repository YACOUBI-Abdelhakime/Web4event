<div class="nav-space"></div>

<section id="contact" class="section-with-bg">
<div class="container" data-aos="fade-up">
    <div class="section-header">
    <?php 
    echo "<h2>Supprimer une animation</h2>";
        
    ?>
    </div>
    <br />
    <br /><?php
        if($error != null){
            echo "<div class='text-center'><h3>".$error." </h3></div>";?>
            <div class="text-center"> <a href="<?php echo base_url();?>index.php/animation/admin" ><button type="button" class="btn btn-primary clr"> Page Programmation </button></a> </div><br>
            <?php
        }else{
            echo "<div class='text-center'><h3> Animation supprimer avec succès </h3></div>";?>
            <div class="text-center"> <a href="<?php echo base_url();?>index.php/animation/admin" ><button type="button" class="btn btn-primary clr"> Page Programmation </button></a> </div><br>
            <?php
        }
    ?>
    
</div>
</section>
