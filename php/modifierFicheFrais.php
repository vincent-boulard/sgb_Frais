<?php

    require "connexion_db.php";

    $id = $_POST['id'];
    $new_etape = $_POST['etape'];
    $new_km = $_POST['km'];
    $new_nuit = $_POST['nuit'];
    $new_repas = $_POST['repas'];

    /* ETAPE */
    $sqlEtape = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"ETP\";");
    while ($row = $sqlEtape->fetch_array(MYSQLI_BOTH)) {
        $old_etape = $row['quantite'];
    }
    if($new_etape == ""){
		$etape = $old_etape;
	} else {
		$etape = $new_etape;
    }
    $updateEtape = $db->query("update lignefraisforfait set quantite = $etape where idFicheFrais = $id and idForfait = \"ETP\";");
    

    /* KILOMETRE */
    $sqlKm = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"KM\";");
    while ($row = $sqlKm->fetch_array(MYSQLI_BOTH)) {
        $old_km = $row['quantite'];
    }
    if($new_km == ""){
		$km = $old_km;
	} else {
		$km = $new_km;
    }
    $updateKm = $db->query("update lignefraisforfait set quantite = $km where idFicheFrais = $id and idForfait = \"KM\";");
    

    /* NUITEE */
    $sqlNuit = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"NUI\";");
    while ($row = $sqlNuit->fetch_array(MYSQLI_BOTH)) {
        $old_nuit = $row['quantite'];
    }
    if($new_nuit == ""){
		$nuit = $old_nuit;
	} else {
		$nuit = $new_nuit;
    }
    $updateNuit = $db->query("update lignefraisforfait set quantite = $nuit where idFicheFrais = $id and idForfait = \"NUI\";");
   
    /* REPAS */
    $sqlRepas = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"REP\";");
    while ($row = $sqlRepas->fetch_array(MYSQLI_BOTH)) {
        $old_repas = $row['quantite'];
    }
    if($new_repas == ""){
		$repas = $old_repas;
	} else {
		$repas = $new_repas;
    }
    $updateRepas = $db->query("update lignefraisforfait set quantite = $repas where idFicheFrais = $id and idForfait = \"REP\";");
   

    /* MONTANT */
    $montantREP = $db->query("select montant from forfait where id = \"REP\";");
    $montantNUI = $db->query("select montant from forfait where id = \"NUI\";");
    $montantETP = $db->query("select montant from forfait where id = \"ETP\";");
    $montantKM = $db->query("select montant from forfait where id = \"KM\";");

    while($row = $montantETP->fetch_array(MYSQLI_BOTH)) {
        $ETP = $row['montant'];
        $prixETP = $ETP * $etape;
    }
    while($row = $montantNUI->fetch_array(MYSQLI_BOTH)) {
        $NUI = $row['montant'];
        $prixNUI = $NUI * $nuit;
    }
    while($row = $montantREP->fetch_array(MYSQLI_BOTH)) {
        $REP = $row['montant'];
        $prixREP = $REP * $repas;
    }
    while($row = $montantKM->fetch_array(MYSQLI_BOTH)) {
        $KM = $row['montant'];
        $prixKM = $KM * $km;
    } 

    /*
    echo $prixREP."<br />";
    echo $prixNUI."<br />";
    echo $prixETP."<br />";
    echo $prixKM."<br />";
    */

    $montantValide = $prixREP + $prixNUI + $prixETP + $prixKM;

    $updateMontant = $db->query("update fichefrais set montantValide = ".$montantValide.";");

    echo "<script>document.location.replace('formListeFicheFrais.php');</script>";