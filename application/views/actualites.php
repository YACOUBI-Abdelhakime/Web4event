
<div>
<h1><?php echo $titre;?></h1>
<br />
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Num</th>
        <th scope="col">Libelle</th>
        </tr>
    </thead>
    <tbody>

<?php
    if($actus != NULL) {
        foreach($actus as $actu){
            echo "<tr> <th scope='row'>";
            echo $actu["act_id"];
            echo " </th> <td>";
            echo $actu["act_libelle"];
            echo " </td> <tr>";
        }
    }else {echo "<br />";
        echo "Aucun Actualité !";
    }
?>
</tbody>
</table>
</div>