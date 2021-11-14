<div>
<h1><?php echo $titre;?></h1>
<br />
<?php
    if(isset($actu)) {
        echo $actu->act_id;
        echo(" -- ");
        echo $actu->act_libelle;
    }
    else {echo "<br />";
        echo "pas d’actualité !";
    }
?>
</div>
