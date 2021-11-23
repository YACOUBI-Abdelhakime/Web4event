<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Profile <?php //echo $date;?></h2>
</div>


    <table class="table table-striped table table-bordered table-hover"> 
        <tbody>

    <?php

    foreach($invite as $a){
        if (!isset($traite[$a["inv_id"]])){
            $inv_id=$a["inv_id"];
            echo "<tr>";
                echo "<th>";
                    echo "Psudo"; 
                echo "</th>";
                echo "<td>";
                    echo $a["com_login"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Nom"; 
                echo "</th>";
                echo "<td>";
                    echo $a["inv_nom"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Discipline"; 
                echo "</th>";
                echo "<td>";
                    echo $a["inv_discipline"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Biographie"; 
                echo "</th>";
                echo "<td>";
                    echo $a["inv_biographie"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Reseaux Sociaux"; 
                echo "</th>";
                echo "<td>";
                // Boucle d’affichage des actualités liées au pseudo
                $resNotexist = true;
                echo "<ul>";
                    foreach($invite as $inv){
                        if(strcmp($inv_id,$inv["inv_id"])==0){
                            $resNotexist = false;
                            echo "<li>";
                            echo $inv["res_libelle"]." : ".$inv["res_url"];
                            echo "</li>";                           
                        }
                    } 
                echo "</ul>"; 
                if($resNotexist){
                    echo "<h5>Aucune Reseaux Sociaux</h5>";
                }
                echo "</td>";
            echo "</tr>";
            $traite[$a["inv_id"]]=1;
        }
    }
?>
    </tbody>
    </table>
    <!-- <div class="text-center"><button type="button" class="btn"> <a src="<?php //echo base_url();?>index.php/invite/modifier" > Modifier </a></button></div> -->
    <div class="text-center"> <a href="<?php echo base_url();?>index.php/invite/modifier" ><button type="button" class="btn btn-primary clr"> Modifier </button></a> </div>
</section>