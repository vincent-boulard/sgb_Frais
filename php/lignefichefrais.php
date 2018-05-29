<?php 
    require "connexion_db.php";

    $id = $_POST['id'];
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];

    /*
    echo "id : ".$id."<br />";
    echo "mois : ".$mois."<br />";
    echo "annee : ".$annee."<br />";
    */

    //ID FICHE FRAIS
    $sqlId = $db->query('select fichefrais.id
                          from lignefraisforfait, fichefrais 
                          where fichefrais.id = lignefraisforfait.idFicheFrais 
                          and fichefrais.idvisiteur = '.$id." 
                          and mois = \"".$mois."\" 
                          and annee = \"".$annee."\"
                          and fichefrais.idEtat = \"CR\";");

    while ($row = $sqlId->fetch_array(MYSQLI_BOTH)) {
        $idFicheFrais = $row[0];
    }

    //ETAPE
    $etape = $db->query('select quantite 
                          from lignefraisforfait, fichefrais 
                          where fichefrais.id = lignefraisforfait.idFicheFrais 
                          and fichefrais.idvisiteur = '.$id." 
                          and mois = \"".$mois."\" 
                          and annee = \"".$annee."\"
                          and idForfait = \"ETP\"
                          and fichefrais.idEtat = \"CR\";");

    while ($row = $etape->fetch_array(MYSQLI_BOTH)) {
        $quantiteEtape = $row['quantite'];
    }

    //NUITEE
    $nuitee = $db->query('select quantite 
                          from lignefraisforfait, fichefrais 
                          where fichefrais.id = lignefraisforfait.idFicheFrais 
                          and fichefrais.idvisiteur = '.$id." 
                          and mois = \"".$mois."\" 
                          and annee = \"".$annee."\"
                          and idForfait = \"NUI\"
                          and fichefrais.idEtat = \"CR\";");

    while ($row = $nuitee->fetch_array(MYSQLI_BOTH)) {
        $quantiteNuitee = $row['quantite'];
    }

    //REPAS
    $repas = $db->query('select quantite 
                          from lignefraisforfait, fichefrais 
                          where fichefrais.id = lignefraisforfait.idFicheFrais 
                          and fichefrais.idvisiteur = '.$id." 
                          and mois = \"".$mois."\" 
                          and annee = \"".$annee."\"
                          and idForfait = \"REP\"
                          and fichefrais.idEtat = \"CR\";");

    while ($row = $repas->fetch_array(MYSQLI_BOTH)) {
        $quantiteRepas = $row['quantite'];
    }

    //KM
    $km = $db->query('select quantite 
                          from lignefraisforfait, fichefrais 
                          where fichefrais.id = lignefraisforfait.idFicheFrais 
                          and fichefrais.idvisiteur = '.$id." 
                          and mois = \"".$mois."\" 
                          and annee = \"".$annee."\"
                          and idForfait = \"KM\"
                          and fichefrais.idEtat = \"CR\";");

    while ($row = $km->fetch_array(MYSQLI_BOTH)) {
        $quantiteKm = $row['quantite'];
    }
    
    echo "<tr>";
        echo "<td id=\"idFicheFrais\" ficheFrais=\"".$idFicheFrais."\">".$idFicheFrais."</td>";
        echo "<td>".$quantiteRepas."</td>";
        echo "<td>".$quantiteNuitee."</td>";
        echo "<td>".$quantiteEtape."</td>";
        echo "<td>".$quantiteKm."</td>";
        echo "<td>";
            echo "<label class=\"radio-inline\"><input value=\"VA\" type=\"radio\" name=\"choix\"> Validée</label>&nbsp;";
            echo "<label class=\"radio-inline\"><input value=\"CR\" type=\"radio\" name=\"choix\"> Non validée</label>";
        echo "</td>";
    echo "</tr>";