
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0"><span>SALON de L'AUTOMOBILE 2022</span></h1>
      <p class="mb-4 pb-0">20-30 December à Capucins Brest,France</p>
      <a href="https://youtu.be/Cxn-kVaKNF4" class="glightbox play-btn mb-4"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12">
            <h2>Caractéristiques de l'événement</h2>
            <p><?php echo $info;?></p>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Actualites Section ======= -->
    <section id="actualites" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Actualités</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
        

          <?php
            if($actus != NULL) {
              ?>
              <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Libelle</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date Publication</th>
                    <th scope="col">Auteur</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach($actus as $actu){ 
                    //if($actu["act_etat"] == 'a' && $actu["org_etat"] == 'a'){
                    ?>
                    <tr>
                      <td><?php echo $actu["act_libelle"];?></td>
                      <td><?php echo $actu["act_description"];?></td>
                      <td><?php echo $actu["act_datePublication"];?></td>
                      <td><?php echo $actu["org_nom"]." ".$actu["org_prenom"];?></td>
                    </tr>
                    <?php
                    //}
                  }?>
                    </tbody>
                  </table>
            <?php
            }else {
              ?>
              <h3>Aucune actualité pour l'instant !</h3>
              <?php
            }
          ?>

        </div>
      </div>

    </section><!-- End Actualites Section -->
  </main><!-- End #main -->