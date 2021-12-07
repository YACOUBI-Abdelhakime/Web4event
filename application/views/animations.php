<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Programmation des animations <?php //echo $date;?></h2>
</div>

<?php
//if ($anims != NULL){
    ?>
    <table class="table table-bordered table-hover"> 
        <thead>
            <tr>
            <th>Animation</th>
            <th>Description</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Invités</th>
            <th>Invités discipline</th>
            <th>Lieu</th>
            </tr>
        </thead>
        <tbody>

    <?php
    // Boucle de parcours de toutes les lignes du résultat obtenu
    $avenir = true;
    $encours = true;
    $passe = true;
    foreach($anims as $a){
        //break;//comme si on a pes des animations
        // Affichage d’une ligne de tableau pour un pseudo non encore traité
        if (!isset($traite[$a["ani_id"]])){
            $inv_id=$a["ani_id"];
            if($avenir && date_diff(date_create($a["ani_dateDebut"] ), date_create($date))->format('%R%a') < 0){
                $avenir = false ;
                echo "<tr><th colspan='7' class='center-txt bg-grey'>Animations à venir</th></tr>";
            }
            if($encours && date_diff(date_create($a["ani_dateFin"] ), date_create($date))->format('%R%a') <=0  &&  date_diff(date_create($a["ani_dateDebut"]), date_create($date))->format('%R%a')  >= 0){ 
                $encours = false ;
                echo "<tr><th colspan='7' class='center-txt bg-grey'>Animations en cours</th></tr>";
            }
            if($passe && date_diff(date_create($a["ani_dateFin"] ), date_create($date))->format('%R%a') > 0){ 
                $passe = false ;
                echo "<tr><th colspan='7' class='center-txt bg-grey'>Animations passées</th></tr>";
            }
            echo "<tr>";
            echo "<td>";echo $a["ani_libelle"]; ?> <br><a href="<?php echo base_url();?>index.php/animation/detaille/<?php echo $a['ani_id'];?>">Détails <i class="bi bi-arrow-up-right-square-fill"></i></a><?php echo "</td>";
            echo "<td>";
            echo $a["ani_description"];
            echo "</td>";
            echo "<td>";echo $a["ani_dateDebut"];echo "</td>";
            echo "<td>";echo $a["ani_dateFin"];echo "</td>";
            echo "<td>";
            // Boucle d’affichage des actualités liées au pseudo
            $invit = false;
            $pasinv = true;
            echo "<ul>";
            foreach($anims as $anim){
                if(strcmp($inv_id,$anim["ani_id"])==0 && $anim["inv_etat"] == 'a'){
                    if($anim["inv_nom"] != null){
                        $invit = true;
                        $pasinv = false;
                        echo "<li>";
                        echo $anim["inv_nom"]."</br>";
                        echo "</li>";
                        
                    }
                    
                }
               
            } 
            
            if($pasinv){
                echo "Aucun invité";
            } 
            echo "</ul>";
            if($invit){
                ?> <a href="<?php echo base_url();?>index.php/animation/galerie/<?php echo $a['ani_id'];?>">Galerie <i class="bi bi-arrow-up-right-square-fill"></i></a><?php 
            }  
            echo "</td>";
            echo "<td>";
            // Boucle d’affichage des actualités liées au pseudo
            echo "<ul>";
            foreach($anims as $anim){
                if(strcmp($inv_id,$anim["ani_id"])==0 && $anim["inv_etat"] == 'a'){
                    echo "<li>";
                    if($anim["inv_discipline"] != null){
                        echo $anim["inv_discipline"]."</br>";
                    }else{
                        echo ".......";
                    }
                    echo "</li>";
                    
                }
            }
            echo "</ul>";
            if($pasinv){
                echo "......";
            } 
            echo "</td>";
            if($a["lie_nom"] != null){
                echo "<td>";echo $a["lie_nom"];?> <br><a href="<?php echo base_url();?>index.php/animation/lieu/<?php echo $a['lie_id'];?>">Détails <i class="bi bi-arrow-up-right-square-fill"></i></a><?php echo "</td>";
            }else{
                echo "<td>";echo "Aucun lieu";echo "</td>";
            }
            
            // Conservation du traitement du pseudo
            // (dans un tableau associatif dans cet exemple !)
            $traite[$a["ani_id"]]=1;
            echo "</tr>";
        }
    }
    if($avenir){ 
        $avenir = false ;
        echo "<tr><td colspan='7' class='center-txt bg-grey'>Animations à venir</td></tr>";
        echo "<tr><td colspan='7' class='center-txt'><h3>Aucune animation pour l'instant !</h3></td></tr>";
    }
    if($encours){ 
        $encours = false ;
        echo "<tr><td colspan='7' class='center-txt bg-grey'>Animations en cours</td></tr>";
        echo "<tr><td colspan='7' class='center-txt'><h3>Aucune animation pour l'instant !</h3></td></tr>";
    }
    if($passe){ 
        $passe = false ;
        echo "<tr><td colspan='7' class='center-txt bg-grey'>Animations passées</td></tr>";
        echo "<tr><td colspan='7' class='center-txt'><h3>Aucune animation pour l'instant !</h3></td></tr>";
    }
/*}else {
    echo "<br />";
    echo "<h3>Aucune animation pour l'instant !</h3>";
}*/
?>
    </tbody>
    </table>
</section>