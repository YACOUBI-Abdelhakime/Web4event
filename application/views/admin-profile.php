<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="container" data-aos="fade-up">
<div class="section-header">
    <h2>Profile <?php //echo $date;?></h2>
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
                    echo $admin->org_email; ; 
                echo "</td>";
            echo "</tr>";
?>
    </tbody>
    </table>
    <!-- <div class="text-center"><button type="button" class="btn"> <a src="<?php //echo base_url();?>index.php/invite/modifier" > Modifier </a></button></div> -->
    <div class="text-center"> <a href="<?php echo base_url();?>index.php/admin/modifier" ><button type="button" class="btn btn-primary clr"> Modifier </button></a> </div>
</div>
</section>