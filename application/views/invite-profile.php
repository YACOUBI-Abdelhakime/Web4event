<?php /*<div class="nav-space"></div>
<section id="hotels" class="section-with-bg">

    <div class="container" data-aos="fade-up">
    <div class="section-header">
        <h2>Profile</h2>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
    

        <?php
        if($invite != NULL) {
            ?>
            <table class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Psudo</th>
                        <td><?php echo $invite->com_login;?></td>
                    </tr>
                    <tr>
                        <th>Nom et Prénom</th>
                        <td><?php echo $invite->inv_nom;?></td>
                    </tr>
                    <tr>
                        <th>Discipline</th>
                        <td><?php echo $invite->inv_discipline;?></td>
                    </tr>
                    <tr>
                        <th>Biographie</th>
                        <td><?php echo '<b>'.$invite->inv_nom.'</b> '.$invite->inv_biographie;?></td>
                    </tr>
                    <tr>
                        <th>Reseaux Sociaux</th>
                        <td>facebooc : ..... <br>twitter : ..... </td>
                    </tr>
                </tbody>
            </table>
        <?php
        }else {
            ?>
            <h3>Aucune information pour l'instant !</h3>
            <?php
        }
        ?>

    </div>
    </div>

</section> */?>

<div class="nav-space"></div>
<section id="actualites" class="section-with-bg">
<div class="section-header">
    <h2>Profile <?php //echo $date;?></h2>
</div>


    <table class="table table-striped table table-bordered table-hover"> 
        <tbody>

    <?php

    foreach($invite as $a){
        if (!isset($traite[$a["inv_id"]])){
            $inv_id=$a["inv_id"];
            echo "<tr>";
                echo "<th>";
                    echo "Psudo"; 
                echo "</th>";
                echo "<td>";
                    echo $a["com_login"]; 
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>";
                    echo "Nom"; 
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
                $invit = false;
                $pasinv = true;
                echo "<ul>";
                    foreach($invite as $inv){
                        if(strcmp($inv_id,$inv["inv_id"])==0){
                            echo "<li>";
                            echo $inv["res_libelle"]." : ".$inv["res_url"];
                            echo "</li>";                           
                        }
                    } 
                echo "</ul>"; 
                echo "</td>";
            echo "</tr>";
            $traite[$a["inv_id"]]=1;
        }
    }
?>
    </tbody>
    </table>
</section>