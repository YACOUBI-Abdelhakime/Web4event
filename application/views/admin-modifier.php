<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Modifier le Profile</h2>
</div>

<table class="table table-striped table table-bordered table-hover"> 
        <tbody>

    <?php
    
        echo "<tr>";
            echo "<th>";
                echo "Psudo"; 
            echo "</th>";
            echo "<td>";
                echo $admin->com_login; 
            echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<th>";
                echo "Nom"; 
            echo "</th>";
            echo "<td>";
                echo $admin->org_nom; 
            echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<th>";
                echo "Prénom"; 
            echo "</th>";
            echo "<td>";
                echo $admin->org_prenom; 
            echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<th>";
                echo "Email"; 
            echo "</th>";
            echo "<td>";
                echo  $admin->org_email; 
            echo "</td>";
        echo "</tr>"; 

    
?>
    </tbody>
    </table>

<?php
if($error != null){
    echo "<div class='text-center'><h3>".$error."</h3></div>";
}

?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/modifier'); ?>
        <!-- <label for="lname">Mot de passe:</label><br> -->
        <div class="text-center"><input type="password" id="mdp" class="fadeIn second" name="mdp" placeholder="Mot de passe"></div>
        <!-- <label for="lname">Confirmation du mot de passe:</label><br> -->
        <div class="text-center"><input type="password" id="cnfmdp" class="fadeIn third" name="cnfmdp" placeholder="Confirmation du mot de passe"></div>
        <div class="text-center">
            <input type="submit" class="fadeIn fourth" value="Valider">
            <a href="<?php echo base_url();?>index.php/admin/profile" ><button type="button" class="fadeIn fourth clrAnuler">  Annuler </button> </a>
        </div>
    </form>
    
</section>