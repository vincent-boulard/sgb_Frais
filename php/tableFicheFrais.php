<?php
    require "connexion_db.php";

    $id = $_POST['id'];

    $date = $db->query("select mois, annee from fichefrais where id = ".$id.";");
    while($row = $date->fetch_array(MYSQLI_BOTH)) {
        $mois = $row['mois'];
        $annee = $row['annee'];
    }
    if ($id != 0) {
?>
    <table class="table">
        <theader>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Etape</th>
                <th scope="col">Kilomètre</th>
                <th scope="col">Nuitée</th>
                <th scope="col">Repas</th>
            </tr>
        </theader>
        <tbody>
            <?php 
                $sqlEtape = $db->query("select quantite from lignefraisforfait where idFicheFrais = ".$id." and idForfait = \"ETP\";");
                while($row = $sqlEtape->fetch_array(MYSQLI_BOTH)) {
                    $etape = $row['quantite'];
                }

                $sqlKm = $db->query("select quantite from lignefraisforfait where idFicheFrais = ".$id." and idForfait = \"KM\";");
                while($row = $sqlKm->fetch_array(MYSQLI_BOTH)) {
                    $km = $row['quantite'];
                }

                $sqlNuit = $db->query("select quantite from lignefraisforfait where idFicheFrais = ".$id." and idForfait = \"NUI\";");
                while($row = $sqlNuit->fetch_array(MYSQLI_BOTH)) {
                    $nuit = $row['quantite'];
                }

                $sqlRepas = $db->query("select quantite from lignefraisforfait where idFicheFrais = ".$id." and idForfait = \"REP\";");
                while($row = $sqlRepas->fetch_array(MYSQLI_BOTH)) {
                    $repas = $row['quantite'];
                }

                echo "<tr>";
                    echo "<td>".$mois."/".$annee."</td>";
                    echo "<td>".$etape."</td>";
                    echo "<td>".$km."</td>";
                    echo "<td>".$nuit."</td>";
                    echo "<td>".$repas."</td>";
                echo "</tr>";
            ?>
        </tbody>
    </table>
<?php 
    }
?>