

<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Connexion</h2>
</div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('compte/connecter'); ?>
    <label>Saisissez vos identifiants ici :</label><br> <?php //echo $mdp.'<-:->'.$password; ?>
    <input type="text" name="pseudo" required />
    <input type="text" name="mdp" required/>
    <input type="submit" value="Connexion"/>
    </form>

</section>

