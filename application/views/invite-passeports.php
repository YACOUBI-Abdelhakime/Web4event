<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Passeports et postes</h2>
        </div>

        
 
          <?php
		  	if($error != null){
				echo "<div class='text-center'><h3>".$error."</h3></div>";
			}
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
								echo $pas["pas_id"];?>
								<br><a href="<?php echo base_url();?>index.php/invite/modifier_passe/<?php echo $pas['pas_id'];?>">Modifier <i class="bi bi-pencil-square"></i></a>
            					<br><a href="<?php echo base_url();?>index.php/invite/desactiver_passe/<?php echo $pas['pas_id'];?>">Désactiver <i class="bi bi-trash-fill"></i></a>
								<?php
							echo "</td>";
							echo "<td>";
								$post0 = true;
								echo "<ul>";
									foreach($passeports as $post){
										if(strcmp($pas_id,$post["pas_id"])==0){
											if($post["pos_libelle"] != null && $post["pos_etat"] =='a'){
												$post0 = false;
												echo "<li>";
												echo "<b style='margin-right:50px;'><u>".$post["pos_datePost"]." : </u></b>"?>
												<a style='margin-right:10px;' href="<?php echo base_url();?>index.php/invite/modifier_post/<?php echo $post['pos_id'];?>">Modifier <i class="bi bi-pencil-square"></i></a>
												<a href="<?php echo base_url();?>index.php/invite/desactiver_post/<?php echo $post['pos_id'];?>">Désactiver <i class="bi bi-trash-fill"></i></a>
												<?php
												echo "<br>".$post["pos_libelle"];
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

    </section>