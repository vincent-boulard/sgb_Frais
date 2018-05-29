<?php 
    require 'connexion_db.php';

    $id = $_POST['id'];
    
    echo "<select class=\"form-control\" id=\"annee\">";
        $result = $db->query("select distinct annee from fichefrais where idEtat = \"CR\" and idVisiteur = ".$id.";");
        echo $result->queryString."<br />";
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $annee = $row['annee'];

            echo "<option id=\"".$annee."\">".$annee."</option>";
        }
    echo "</select>";
?>