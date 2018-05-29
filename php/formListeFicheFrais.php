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
                    <h2>Lister ses fiches de frais</h2>
                    <br />
                    <h3>Fiche de frais de <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h3>
                    <div class="droite">
                        <a class="btn btn-success" href="formRenseignerFicheFrais.php">+ Ajouter</a>
                    </div>
                    <br />
                    <table class="table">
                        <theader>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </theader>
                        <tbody>
                            <?php
                                require "connexion_db.php";

                                $result = $db->query("select fichefrais.id, mois, annee, montantValide, etat.libelle from fichefrais, users, etat where idVisiteur = users.id and idEtat = etat.id and nom = '".$_SESSION['nom']."' and prenom = '".$_SESSION['prenom']."';");

                                while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                                    $id = $row['id'];
                                    $mois = $row['mois'];
                                    $annee = $row['annee'];
                                    $montant = $row['montantValide'];
                                    $etat = $row['libelle'];

                                    echo "<tr>";
                                        echo "<td>".$mois."/".$annee."</td>";
                                        echo "<td>".$montant."</td>";
                                        echo "<td>".$etat."</td>";
                                        echo "<td><a class=\"btn btn-info\" href=\"formSuivreFicheFraisSpeciale.php?id=".$id."\">Voir</a></td>";
                                        echo "<td><a class=\"btn btn-primary\" href=\"formModifierFicheFrais.php?id=".$id."\">Modifier</a></td>";
                                        echo "<td><a class=\"btn btn-danger\" href=\"supprimerFicheFrais.php?id=".$id."\" onclick=\"return(confirm('La fiche de frais va être supprimée. Êtes-vous sûr de vouloir continuer ?'))\">Supprimer</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfooter>
                            <tr>
                                <th scope="row">Date</th>
                                <th scope="row">Montant</th>
                                <th scope="row">Etat</th>
                                <th scope="row">Voir</th>
                                <th scope="row">Modifier</th>
                                <th scope="row">Supprimer</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>