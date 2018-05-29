<?php 
    require "connexion_db.php";

    $id = $_POST['id'];

    $mois = $_POST['mois'];
    $annee = $_POST['annee'];

    $etape = $_POST['etape'];
    $nuit = $_POST['nuitee'];
    $repas = $_POST['repas'];
    $km = $_POST['km'];

    /*
    echo $etape."<br />";
    echo $nuit."<br />";
    echo $repas."<br />";
    echo $km."<br />";
    */

    if(isset($_POST['fraisAuForfait'])) {
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
        //echo $montantValide;

       // $insertFicheFrais = $db->prepare("insert into fichefrais (idVisiteur, mois, annee, montantValide, idEtat) 
         //                               values (:idVisiteur, :mois, :annee, :montantValide, :idEtat);");
      	$sql = $db->query("INSERT INTO fichefrais (idVisiteur, mois, annee, montantValide, idEtat) VALUES ('$id',  $mois, $annee, $montantValide,'CR');");

                                        
      /*  $insertFicheFrais->execute(array(
            "idVisiteur" => $id,
            "mois" => $mois,
            "annee" => $annee,
            "montantValide" => $montantValide,
            "idEtat" => "CR"
        ));
*/
        $sqlIdFicheFrais = $db->query("select max(id) from fichefrais;");
        while($row = $sqlIdFicheFrais->fetch_array(MYSQLI_BOTH)){
            $idFicheFrais = $row[0];
            //echo $idFicheFrais;
        }

        $sql = $db->query("INSERT INTO lignefraisforfait (idFicheFrais, idForfait, quantite) VALUES ('$idFicheFrais', 'ETP' , $etape);");

        /*$insertLigneFraisForfaitETP = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite);");
        $insertLigneFraisForfaitETP->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "ETP",
            "quantite" => $etape
        ));
*/

$sql = $db->query("INSERT INTO lignefraisforfait (idFicheFrais, idForfait, quantite) VALUES ('$idFicheFrais', 'NUI' , $nuit);");

     /*   $insertLigneFraisForfaitNUI = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite)");
        $insertLigneFraisForfaitNUI->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "NUI",
            "quantite" => $nuit
        ));
*/
$sql = $db->query("INSERT INTO lignefraisforfait (idFicheFrais, idForfait, quantite) VALUES ('$idFicheFrais', 'REP' , $repas);");
/*
        $insertLigneFraisForfaitREP = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite)");
        $insertLigneFraisForfaitREP->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "REP",
            "quantite" => $repas
        ));
*/

$sql = $db->query("INSERT INTO lignefraisforfait (idFicheFrais, idForfait, quantite) VALUES ('$idFicheFrais', 'KM' , $km);");
/*
        $insertLigneFraisForfaitKM = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite)");
        $insertLigneFraisForfaitKM->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "KM",
            "quantite" => $km
        ));
*/
        echo "<script>document.location.replace('formRenseignerFicheFrais.php');</script>";
    } else {
        $montant = $_POST['montant'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $libelle = $_POST['libelle'];

        $sql = $db->query("INSERT INTO fraishorsforfait (montant, date, libelle, idVisiteur) VALUES ($montant, date , '$libelle',$id);");
 /*
        $insertHorsForfait = $db->prepare("insert into fraishorsforfait (montant, date, libelle, idVisiteur)
                                            values (:montant, :date, :libelle, :idVisiteur);");
        $insertHorsForfait->execute(array(
            "montant" => $montant,
            "date" => $date,
            "libelle" => $libelle,
            "idVisiteur" => $id
        ));
*/
        //echo "<script>document.location.replace('formRenseignerFicheFrais.php');</script>";
    }

?>