

<div class="nav-space"></div> 
<section id="contact" class="section-with-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Connexion</h2>
        </div>
		<?php
			if($error != null){
				echo "<div class='text-center'><h3>".$error."</h3></div>";
			}
			//echo "<div class='text-center'><h3> pas ou login pas correct !</h3></div>";
		?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('compte/connecter'); ?>
				<div class="text-center"><input type="text" id="pseudo" class="fadeIn second" name="pseudo" placeholder="Identifiant"></div>
				<div class="text-center"><input type="password" id="mdp" class="fadeIn third" name="mdp" placeholder="Mot de passe"></div>
				<div class="text-center"><input id="btn-sub"  type="submit" class="fadeIn fourth" value="Connexion"></div>
			</form>
	</div> 
</section>

<script>

document.getElementById("btn-sub").addEventListener("click", function() {
	if(document.getElementById("pseudo").value == '' && document.getElementById("mdp").value == ''){
		document.getElementById("pseudo").value = "  ";
	}
  
});

</script>