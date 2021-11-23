<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Modifier le Profile</h2>
</div>
<?php
if($error != null){
    echo "<h3>".$error."</h3>";
}

?>

<?php echo validation_errors(); ?>
<?php echo form_open('invite/modifier'); ?>
    <label>Mot de passe : </label>
    <input type="text" name="mdp"/><br>
    <label>Confirmation du mot de passe :</label>
    <input type="text" name="cnfmdp"/>
    <div class="text-center">
        <button type="submit" class="btn btn-primary clr"> Valider </button>
        <button type="button" class="btn btn-primary clrAnnuler"> <a href="<?php echo base_url();?>index.php/invite/profile" > Annuler </a> </button>
    </div>
</form>
    
</section>