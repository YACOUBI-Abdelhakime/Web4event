<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">

<div class="nav-space"></div> 
<section id="contact" class="section-with-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Créer un compte</h2>
        </div>
		<?php
			if($error != null){
				echo "<div class='text-center'><h3>".$error."</h3></div>";
			}
			//echo "<div class='text-center'><h3> pas ou login pas correct !</h3></div>";
		?>
			</form>
            <?php echo validation_errors(); ?>
            <?php echo form_open('compte_creer'); ?>
            <div class="text-center"><input type="text" id="id" class="fadeIn second" name="id" placeholder="Identifiant"></div>
            <div class="text-center"><input type="password" id="mdp" class="fadeIn third" name="mdp" placeholder="Mot de passe"></div>
            <div class="text-center"><input type="submit" class="fadeIn fourth" value="Créer"></div>
            </form>
	</div> 
</section>