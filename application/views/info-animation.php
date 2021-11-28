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
                /*$reseauxExist = false;
                $facebook = true;
                $twitter = true;
                $linkedin = true;
                echo '<div class="text-center">';
                foreach($invite as $act){
                    if(strcmp($inv_id,$act["inv_id"])==0){

                        if($twitter && $act["res_libelle"] == "Twitter"){
                            $reseauxExist = true;
                            $twitter = false;
                            ?>
                            <a href="<?php echo $act["res_url"];?>"><i class="bi bi-twitter"></i></a>
                            <?php
                        }else if($facebook && $act["res_libelle"] == "Facebook"){
                            $reseauxExist = true;
                            $facebook = false;
                            ?>
                            <a href="<?php echo $act["res_url"];?>"><i class="bi bi-facebook"></i></a>
                            <?php
                        }else if($linkedin && $act["res_libelle"] == "LinkedIn"){
                            $reseauxExist = true;
                            $linkedin = false;
                            ?>
                            <a href="<?php echo $act["res_url"];?>"><i class="bi bi-linkedin"></i></a>
                            <?php
                        }
                    }
                }
                echo "</div>";*/
                if($Notexist){
                    echo "<h5>Aucune Invité</h5>";
                }
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>";
                    echo "Lieu"; 
                echo "</th>";
                echo "<td>";
                    echo $a["lie_nom"]; 
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