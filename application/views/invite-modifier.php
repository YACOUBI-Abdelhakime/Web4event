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
                echo $invite->com_login; 
            echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<th>";
                echo "Nom"; 
            echo "</th>";
            echo "<td>";
                echo $invite->inv_nom; 
            echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<th>";
                echo "Discipline"; 
            echo "</th>";
            echo "<td>";
                echo $invite->inv_discipline; 
            echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<th>";
                echo "Biographie"; 
            echo "</th>";
            echo "<td>";
                echo $invite->inv_biographie; 
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
    <?php echo form_open('invite/modifier'); ?>
        <!-- <label for="lname">Mot de passe:</label><br> -->
        <div class="text-center"><input type="password" id="mdp" class="fadeIn second" name="mdp" placeholder="Mot de passe"></div>
        <!-- <label for="lname">Confirmation du mot de passe:</label><br> -->
        <div class="text-center"><input type="password" id="cnfmdp" class="fadeIn third" name="cnfmdp" placeholder="Confirmation du mot de passe"></div>
        <div class="text-center">
            <input id="btn-sub" type="submit" class="fadeIn fourth" value="Valider">
            <a href="<?php echo base_url();?>index.php/invite/profile" ><button type="button" class="fadeIn fourth clrAnuler">  Annuler </button> </a>
        </div>
    </form>
    
</section>

<script>

document.getElementById("btn-sub").addEventListener("click", function() {
	if(document.getElementById("cnfmdp").value == '' && document.getElementById("mdp").value == ''){
		document.getElementById("cnfmdp").value = " ";
	}
  
});

</script>