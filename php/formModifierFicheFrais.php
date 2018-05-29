<?php @session_start();
    // echo $_SESSION['connect'];
    require "connexion_db.php";

    $id = $_GET['id'];

    $sqlEtape = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"ETP\";");
    while ($row = $sqlEtape->fetch_array(MYSQLI_BOTH)) {
        $etape = $row['quantite'];
    }

    $sqlkm = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"KM\";");
    while ($row = $sqlkm->fetch_array(MYSQLI_BOTH)) {
        $km = $row['quantite'];
    }

    $sqlNuit = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"NUI\";");
    while ($row = $sqlNuit->fetch_array(MYSQLI_BOTH)) {
        $nuit = $row['quantite'];
    }

    $sqlRepas = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"REP\";");
    while ($row = $sqlRepas->fetch_array(MYSQLI_BOTH)) {
        $repas = $row['quantite'];
    }
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, links, icons">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>
			GSB - Galaxy Swiss Bourdin
		</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/default.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container corps">
            <div class="row">
                <div class="col-md-12">
                    <h2>Modifier une fiche de frais</h2>
                    <br />
                    <h3>Fiche de frais n° <?php echo $id; ?></h3>
                    <br />
                    <form method="POST" action="modifierFicheFrais.php">
                        <input type="text" value="<?php echo $id; ?>" class="hidden" name="id">
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Etape : </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="etape" placeholder="<?php echo $etape; ?>">
                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Kilomètre : </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="km" placeholder="<?php echo $km; ?>">
                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nuitée : </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="nuit" placeholder="<?php echo $nuit; ?>">
                            </div>
                        </div>
                        <br />
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Repas : </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="repas" placeholder="<?php echo $repas; ?>">
                            </div>
                        </div>
                        <br />
                        <input type="submit" class="btn btn-success" value="Modifier la fiche de frais">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>