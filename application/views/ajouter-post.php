

<div class="nav-space"></div> 
<section id="contact" class="section-with-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Créer un post</h2>
        </div>
		<?php
			if($error != null){
				echo "<div class='text-center'><h3>".$error."</h3></div>";
			}
			//echo "<div class='text-center'><h3> pas ou login pas correct !</h3></div>";
		?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('accueil/ajouter_post'); ?>
				<div class="text-center"><input type="text" id="pasId" class="fadeIn second" name="pasId" placeholder="Identifiant"></div>
				<div class="text-center"><input type="password" id="pasMdp" class="fadeIn third" name="pasMdp" placeholder="Mot de passe"></div>
				<div class="text-center"><input type="text" id="post" class="fadeIn third" name="post" placeholder="Post"></div>
				<div class="text-center">
					<input id="btn-sub" type="submit" class="fadeIn fourth" value="Ajouter">
					<a href="<?php echo base_url();?>" ><button type="button" class="fadeIn fourth clrAnuler">  Annuler </button> </a>
				</div>
			</form>
	</div> 
</section>

<script>

document.getElementById("btn-sub").addEventListener("click", function() {
	if(document.getElementById("pasId").value == '' && document.getElementById("pasMdp").value == ''&& document.getElementById("post").value == ''){
		document.getElementById("pasId").value = "  ";
	}
  
});

</script>