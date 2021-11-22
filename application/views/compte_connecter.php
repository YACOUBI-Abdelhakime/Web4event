



<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Connexion</h2>
</div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('compte/connecter'); ?>
    <label>Saisissez vos identifiants ici :</label><br>
    <input type="text" name="pseudo" />
    <input type="text" name="mdp" />
    <input type="submit" value="Connexion"/>
    </form>

</section>

