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
                    <th scope="col">Post</th>
                  </tr>
                </thead>
			  <tbody>
			<?php
				foreach($passeports as $pas){
					if (!isset($traite[$pas["pas_id"]])){
						$pas_id=$pas["pas_id"];
						echo "<tr>";
							echo "<td>";
								echo $pas["pas_id"];
							echo "</td>";
							echo "<td>";
								$post0 = true;
								echo "<ul>";
									foreach($passeports as $post){
										if(strcmp($pas_id,$post["pas_id"])==0){
											if($post["pos_libelle"] != null && $post["pos_etat"] =='a'){
												$post0 = false;
												echo "<li>";
												echo "<b><u>".$post["pos_datePost"]." :</u></b><br>".$post["pos_libelle"];
												echo "</li>";
											}
										}                        
									} 
									
									if($post0){
										echo "Pas de post pour l'instant !";
									} 
								echo "</ul>"; 
							echo "</td>";
							$traite[$pas["pas_id"]]=1;
						echo "</tr>";
					}
				}
			
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