<?php 
    require 'connexion_db.php';

    $id = $_POST['id'];
    
    echo "<select class=\"form-control\" id=\"mois\">";
        $result = $db->query("select distinct mois from fichefrais where idEtat = \"CR\" and idVisiteur = ".$id.";");
        echo $result->queryString."<br />";
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $mois = $row['mois'];

            echo "<option id=\"".$mois."\">".$mois."</option>";
        }
    echo "</select>";
?>