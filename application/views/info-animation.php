<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Caractéristiques de l'animation<?php //echo $date;?></h2>
</div>


    <table class="table table-striped table table-bordered table-hover"> 
        <tbody>

    <?php
    if($anim != null){
    foreach($anim as $a){
        if (!isset($traite[$a["ani_id"]])){
            $ani_id=$a["ani_id"];
            /*echo "<tr>";
                echo "<th>";
                    echo "Psudo"; 
                echo "</th>";
                echo "<td>";
                    echo $a["com_login"]; 
                echo "</td>";
            echo "</tr>";*/

            echo "<tr>";
                echo "<th>";
                    echo "Animation"; 
                echo "</th>";
                echo "<td>";
                    echo $a["ani_libelle"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Description"; 
                echo "</th>";
                echo "<td>";
                    echo $a["ani_description"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Date Début"; 
                echo "</th>";
                echo "<td>";
                    echo $a["ani_dateDebut"]; 
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>";
                    echo "Date Fin"; 
                echo "</th>";
                echo "<td>";
                    echo $a["ani_dateFin"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Invités"; 
                echo "</th>";
                echo "<td>";
                // Boucle d’affichage des actualités liées au pseudo
                $Notexist = true;
                echo "<ul>";
                    foreach($anim as $inv){
                        if(strcmp($ani_id,$inv["ani_id"])==0 && $inv["inv_etat"]=='a'){
                            $Notexist = false;
                            echo "<li>";
                            echo $inv["inv_nom"]." : ".$inv["inv_discipline"];
                            echo "</li>";                           
                        }
                    } 
                echo "</ul>"; 
                if($Notexist){
                    echo "<h5>Aucune Invité pour l'instant !</h5>";
                }
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>";
                    echo "Lieu"; 
                echo "</th>";
                echo "<td>";
                if($a["lie_nom"] != null){
                    echo $a["lie_nom"]; 
                }else{
                    echo "<h5>Aucune Lieu pour l'instant !</h5>"; 
                }
                    
                echo "</td>";
            echo "</tr>";
            $traite[$a["ani_id"]]=1;
        }
    }
    }else{
        ?>
        <div class="section-header">
            <h2>Cet invité n'est existe pas !<?php //echo $date;?></h2>
        </div>
        <?php
    }
?>
    </tbody>
    </table>
    
</section>