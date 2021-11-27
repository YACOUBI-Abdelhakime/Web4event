<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Passeports</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
 
          <?php
            if($passeports != NULL) {
              ?>
              <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Passeport</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Etat</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach($passeports as $pas){ 
                    ?>
                    <tr>
						<td><?php echo $pas["pas_id"];?></td>
                        <td><?php echo $pas["pas_mdp"];?></td>						
						<td><?php
							if($pas["pas_etat"] == 'a'){
								echo "Activé";
							}else{
								echo "Désactivé";
							}
							
						?></td>
                    </tr>
                    <?php
                    
                }//fin foreach
				
				?>
                    </tbody>
                  </table>
            <?php
            }else {
              ?>
              <h3>Aucune Passeport pour l'instant !</h3>
              <?php
            }
          ?>

        </div>
      </div>

    </section>