<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Détailles<?php //echo $date;?></h2>
</div>


    <table class="table table-striped table table-bordered table-hover"> 
        <tbody>

    <?php
    if($invite != null){
    ?>
        <div class="text-center"><img class="info-img card-img-top" src="<?php echo base_url().''.$invite[0]['inv_photo']?>" alt="Card image cap"></div>
    <?php
    foreach($invite as $a){
        if (!isset($traite[$a["inv_id"]])){
            $inv_id=$a["inv_id"];
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
                    echo "Nom complet"; 
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
                /*$resNotexist = true;
                echo "<ul>";
                    foreach($invite as $inv){
                        if(strcmp($inv_id,$inv["inv_id"])==0){
                            $resNotexist = false;
                            echo "<li>";
                            echo $inv["res_libelle"]." : ".$inv["res_url"];
                            echo "</li>";                           
                        }
                    } 
                echo "</ul>"; */
                $reseauxExist = false;
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
                echo "</div>";
                if(!$reseauxExist){
                    echo "<h5>Aucune Reseaux Sociaux</h5>";
                }
                echo "</td>";
            echo "</tr>";
            $traite[$a["inv_id"]]=1;
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