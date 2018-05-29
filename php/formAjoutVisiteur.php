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
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Module administration
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="listeVisiteur.php">liste des utilisateurs</a>
                            <a class="dropdown-item" href="formAjoutVisiteur.php">Ajouter un utilisateur</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formClotureFiche.php">Clôturer les fiches de frais</a>
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
                    <h2>Ajouter un utilisateur</h2>
                    <br />
                    <form method="POST" action="ajouterUtilsateur.php">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Nom de l'utilisateur *" required="required" name="nom">
                            <br />
                            <input type="text" class="form-control" placeholder="Prénom de l'utilisateur *" required="required" name="prenom">
                            <br />
                            <input type="text" class="form-control" id="dateEmbauche" placeholder="Date d'embauche" name="dateEmbauche">
                            <br />
                            <input type="text" class="form-control" placeholder="Adresse" name="adresse">
                            <br />
                            <input type="text" class="form-control" placeholder="CP" name="cp">
                            <br />
                            <input type="text" class="form-control" placeholder="Ville" name="ville">
                            <br />
                            <input type="text" class="form-control" placeholder="Mot de passe *" required="required" name="pwd">
                            <br />
                            <input type="submit" class="btn btn-success" value="Ajouter l'utilisateur">
                        </div>
                    </form>
                    <small>* Les champs marqué d'une étoile sont obligatoires</small><br />
                    <small>** le login sera le nom de famille de l'utilisateur en minuscule</small>
                </div>
            </div>
        </div>
        <script>
            $('#dateEmbauche').datepicker({
                dateFormat: "dd/mm/yy"
            });
        </script>
    </body>
</html>