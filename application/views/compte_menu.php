<div class="nav-space"></div>

<section id="contact" class="section-with-bg">

    <h2>Espace d'administration</h2>
    <br />
    <h2>Session ouverte ! Bienvenue
    <?php
    echo $this->session->userdata('username');
    ?> !
    </h2>
    <h2>Status : 
    <?php echo $this->session->userdata('status');
    ?>  </h2>
</section>
