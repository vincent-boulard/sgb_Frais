<?php @session_start();
    // echo $_SESSION['connect'];
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
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-bleu fixed-top">
            <a class="navbar-brand" href="#">
                <span class="gras">GSB</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!-- CONTROLE DU STATUS -->
                    <!-- ADMINISTRATEUR -->
                    <?php 
                        if ($_SESSION['connect'] == "Administrateur") { 
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Module administration
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="listeVisiteur.php">Liste des utilisateurs</a>
                            <a class="dropdown-item" href="formAjoutVisiteur.php">Ajouter un utilisateur</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formClotureFiche.php">Clôturer les fiches de frais</a>
                    </li>
                    <!-- COMPTABLE -->
                    <?php    
                        } elseif ($_SESSION['connect'] == "Comptable") { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="formValiderFicheFrais.php">Validation des fiches de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formMiseEnPaiement.php">Mettre en paiement</a>
                    </li><!--
                    <li class="nav-item">
                        <a class="nav-link" href="formListFraishorsForfait.php">Voir les frais hors forfait</a>
                    </li>-->
                    <!-- VISITEUR -->
                    <?php    
                        } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="formListeFicheFrais.php">Lister ses fiches de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formRenseignerFicheFrais.php">Renseigner sa fiche de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formSuivreFicheFrais.php">Suivre une fiche de frais</a>
                    </li>
                    <?php        
                        }
                    ?>
                    <!-- FIN DU CONTROLE DU STATUS -->
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
        <div class="centre corps-accueil">
            <?php 
                if ($_SESSION['connect'] == "Administrateur") { 
            ?>
                <a class="btn btn-primary btn-lg" href="listeVisiteur.php">Liste des utilisateurs</a>
                <br />
                <br />
                <br />
                <a class="btn btn-primary btn-lg" href="formAjoutVisiteur.php">Ajouter un utilisateur</a>
                <br />
                <br />
                <br />
                <a class="btn btn-primary btn-lg" href="formClotureFiche.php">Clôturer les fiches de frais</a>
            <?php
                }
            ?>
        </div>
    </body>
</html>