<div class="nav-space"></div>
<?php echo "<h1>".$titre."</h1>";?>
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