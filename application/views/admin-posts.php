<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="container" data-aos="fade-up">
<div class="section-header">
    <h2>LIEUX ET SERVICES<?php //echo $date;?></h2>
</div>

<?php
if ($posts != NULL){
    ?>
    <table class="table table-bordered table-striped table-hover"> 
        <thead>
            <tr>
            <th>Post</th>
            <th>Date de post</th>
            <th>Etat</th>
            <th>Invité</th>
            </tr>
        </thead>
        <tbody>

    <?php
    foreach($posts as $pos){
        echo "<tr>";
            echo "<td>";
                echo $pos["pos_libelle"];
            echo "</td>";
            echo "<td>";
                echo $pos["pos_datePost"];
            echo "</td>";
            echo "<td>";
                if($pos["pos_etat"] == 'a'){
                    echo "Activé";?>
                    <a href="<?php echo base_url();?>index.php/admin/post_chang_etat/<?php echo $pos['pos_id'].'/'.$pos['pos_etat'];?>">Désactiver <i class="bi bi-hand-thumbs-down-fill"></i></a>
                    <?php
                }else{
                    echo "Désactivé";?>
                    <a href="<?php echo base_url();?>index.php/admin/post_chang_etat/<?php echo $pos['pos_id'].'/'.$pos['pos_etat'];?>">Activer <i class="bi bi-hand-thumbs-up-fill"></i></a>
                    <?php
                }
            echo "</td>";
            echo "<td>";
                echo $pos["inv_nom"];
            echo "</td>";

        echo "</tr>";
    }
}else {
    echo "<br />";
    echo "<h3>Aucun post pour l'instant !</h3>";
}
?>
    </tbody>
    </table>
</div>
</section>