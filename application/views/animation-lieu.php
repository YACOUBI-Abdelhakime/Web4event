<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="container" data-aos="fade-up">
<div class="section-header">
    <h2>LIEU ET SERVICES<?php //echo $date;?></h2>
</div>

<?php
if ($lieux != NULL){
    ?>
    <table class="table table-bordered table-striped table-hover"> 
        <thead>
            <tr>
            <th>Lieu</th>
            <th>Description</th>
            <th>Services</th>
            </tr>
        </thead>
        <tbody>

    <?php
    foreach($lieux as $lie){
        if (!isset($traite[$lie["lie_id"]])){
            $inv_id=$lie["lie_id"];
            echo "<tr>";
                echo "<td>";
                    echo $lie["lie_nom"];
                echo "</td>";
                echo "<td>";
                    echo $lie["lie_description"];
                echo "</td>";
                echo "<td>";
                    $pasinv = true;
                    echo "<ul>";
                        foreach($lieux as $l){
                            if(strcmp($inv_id,$l["lie_id"])==0){
                                if($l["ser_nom"] != null){
                                    $pasinv = false;
                                    echo "<li>";
                                    echo $l["ser_nom"];
                                    echo "</li>";
                                }
                            }                        
                        } 
                        
                        if($pasinv){
                            echo "Pas de service dans ce lieu !";
                        } 
                    echo "</ul>"; 
                echo "</td>";
                $traite[$lie["lie_id"]]=1;
            echo "</tr>";
        }
    }
}else {
    echo "<br />";
    echo "<h3>Aucun lieu pour l'instant !</h3>";
}
?>
    </tbody>
    </table>
</div>
</section>