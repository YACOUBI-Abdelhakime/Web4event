<h1><?php echo $titre;?></h1>
<br />
<?php
    if($pseudos != NULL) {
        foreach($pseudos as $login){
            echo "<br />";
            echo " -- ";
            echo $login["com_login"];
            echo " -- ";
            echo "<br />";
        }
    }else {echo "<br />";
        echo "Aucun compte !";
    }
?>