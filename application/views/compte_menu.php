<div class="nav-space"></div>

<section id="contact" class="section-with-bg">
<div class="container" data-aos="fade-up">
    <div class="section-header">
    <?php 
        if($this->session->userdata('status') == 'i'){
            echo "<h2>Espace d'invité</h2>";
        }else{
            echo "<h2>Espace d'administration</h2>";
        }
    ?>
    </div>
    <br />
    <br />
    <div class='text-center'><h3>Bienvenue <?php echo $nom;?> </h3></div>
</div>
</section>
