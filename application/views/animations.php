<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Programmation des animations</h2>
</div>

<?php
if ($anims != NULL){
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
    foreach($anims as $a){
        // Affichage d’une ligne de tableau pour un pseudo non encore traité
        if (!isset($traite[$a["ani_id"]])){
            $inv_id=$a["ani_id"];
            echo "<tr>";
            echo "<td>";echo $a["ani_libelle"];echo "</td>";
            echo "<td>";echo $a["ani_description"];echo "</td>";
            echo "<td>";echo $a["ani_dateDebut"];echo "</td>";
            echo "<td>";echo $a["ani_dateFin"];echo "</td>";
            echo "<td>";
            // Boucle d’affichage des actualités liées au pseudo
            foreach($anims as $anim){
                echo "<ul>";
                if(strcmp($inv_id,$anim["ani_id"])==0){
                    if($anim["inv_nom"] != null){
                        echo "<li>";
                        echo $anim["inv_nom"]."</br>";
                        echo "</li>";
                    }else{
                        echo "Aucun invité";
                    }
                    
                }
                echo "</ul>";
            }
            echo "</td>";
            echo "<td>";
            // Boucle d’affichage des actualités liées au pseudo
            foreach($anims as $anim){
                echo "<ul>";
                if(strcmp($inv_id,$anim["ani_id"])==0){
                    if($anim["inv_discipline"] != null){
                        echo "<li>";
                        echo $anim["inv_discipline"]."</br>";
                        echo "</li>";
                    }else{
                        echo "...";
                    }
                    
                }
                echo "</ul>";
            }
            echo "</td>";
            if($a["lie_nom"] != null){
                echo "<td>";echo $a["lie_nom"];echo "</td>";
            }else{
                echo "<td>";echo "Aucun lieu";echo "</td>";
            }
            
            // Conservation du traitement du pseudo
            // (dans un tableau associatif dans cet exemple !)
            $traite[$a["ani_id"]]=1;
            echo "</tr>";
        }
    }
}else {
    echo "<br />";
    echo "<h3>Aucune animation pour l'instant !</h3>";
}
?>
    </tbody>
    </table>
</section>