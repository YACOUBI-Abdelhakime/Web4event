<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Comptes</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
 
          <?php
            if($comptes != NULL) {
              ?>
              <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Psudo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">statut</th>
                    <th scope="col">Etat</th>
                  </tr>
                </thead>
                <tbody>
                <?php
				$org = true ;
				$inv = true ;
                  foreach($comptes as $cmp){ 

						if($org && $cmp['com_status'] == 'o'){
							$org = false ;
							echo "<tr><th colspan='7' class='center-txt bg-grey'>Les Administrateurs</th></tr>";
						}
						if($inv && $cmp['com_status'] == 'i'){
							$inv = false ;
							echo "<tr><th colspan='7' class='center-txt bg-grey'>Les Invités</th></tr>";
						}
                    ?>
                    <tr>
						<td><?php echo $cmp["com_login"];?></td>
						<?php
							if($cmp["com_status"] == 'i'){
								echo "<td colspan='2'><div class='text-center'>".$cmp["inv_nom"]."</div></td>";
							}else{
								echo "<td>".$cmp["org_nom"]."</td>";
							}
							
						?>
						<?php
							if($cmp["com_status"] == 'i'){
								//echo $cmp["inv_nom"];
							}else{
								echo "<td>".$cmp["org_prenom"]."</td>";
							}
							
						?>
						<td><?php
							if($cmp["com_status"] == 'i'){
								//echo $cmp["inv_nom"];
							}else{
								echo $cmp["org_email"];
							}
							
						?></td>
						<td><?php
							if($cmp["com_status"] == 'i'){
								echo "Invité";
							}else{
								echo "Administrateur";
							}
							
						?></td>
						<td><?php
							if($cmp["com_etat"] == 'a'){
								echo "Activé";
							}else{
								echo "Désactivé";
							}
							
						?></td>
                    </tr>
                    <?php
                    
                }//fin foreach
				if($inv){ 
					$inv = false ;
					echo "<tr><td colspan='7' class='center-txt bg-grey'>Les Invités</td></tr>";
					echo "<tr><td colspan='7' class='center-txt'><h3>Aucune Invité pour l'instant !</h3></td></tr>";
				}
				if($org){ 
					$org = false ;
					echo "<tr><td colspan='7' class='center-txt bg-grey'>Les Administrateurs</td></tr>";
					echo "<tr><td colspan='7' class='center-txt'><h3>Aucune Administrateur pour l'instant !</h3></td></tr>";
				}
				
				?>
                    </tbody>
                  </table>
            <?php
            }else {
              ?>
              <h3>Aucune comptes pour l'instant !</h3>
              <?php
            }
          ?>

        </div>
      </div>

    </section>