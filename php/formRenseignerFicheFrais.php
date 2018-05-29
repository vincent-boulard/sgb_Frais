<?php @session_start();
    // echo $_SESSION['connect'];
    require "connexion_db.php";
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-bleu fixed-top">
            <a class="navbar-brand" href="accueil.php">
                <span class="gras">GSB</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="formListeFicheFrais.php">Lister ses fiches de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formRenseignerFicheFrais.php">Renseigner sa fiche de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formSuivreFicheFrais.php">Suivre une fiche de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php">
                            Se déconnecter
                        </a>
                    </li>
                </ul>
                <h1 class="centre-nav">Bienvenue <?php echo $_SESSION['prenom']. " ".strtoupper($_SESSION['nom']); ?></h1>
                <span class="nav-link blanc status">status : <?php echo $_SESSION['connect']; ?></span>
            </div>
        </nav>
        <div class="container corps">
            <div class="row">
                <div class="col-md-12">
                    <form action="renseignerFicheFrais.php" method="POST">
                        <input type="text" name="id" class="hidden" value="<?php echo $_SESSION['id']; ?>"/>
                        <h2>Renseigner une fiche de frais</h2>
                        <br />
                        <h3>Saisie :</h3>
                        <br />
                        <h4>Période d'engagement :</h4>
                        <div class="form-group row">
                            <label for="mois" class="col-sm-2 col-form-label">mois (2 chiffres) : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="mois">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="annee" class="col-sm-2 col-form-label">année (4 chiffres) : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="annee">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Frais au forfaits :</h4>
                                <div class="form-group row">
                                    <label for="repas" class="col-sm-3 col-form-label">Repas de midi : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="repas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nuitee" class="col-sm-3 col-form-label">Nuitée : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nuitee">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="etape" class="col-sm-3 col-form-label">Etape : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="etape">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="km" class="col-sm-3 col-form-label">Kilométrage : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="km">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" name="fraisAuForfait">
                            </div><!--
                            <div class="col-md-6">
                                <h4>Frais hors forfaits :</h4>
                                <div class="form-group row">
                                    <label for="montant" class="col-sm-3 col-form-label">Montant : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="montant">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label">Date : </label>
                                    <div class="col-sm-3">
                                        <input type="text" id="date" class="form-control" name="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="libelle" class="col-sm-3 col-form-label">Libellé : </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="libelle">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" name="fraisHorsForfait">
                            </div>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $('#date').datepicker();
        </script>
    </body>
</html>