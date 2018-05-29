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
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
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
                        <a class="nav-link" href="formValiderFicheFrais.php">Validation des fiches de frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formMiseEnPaiement.php">Mettre en paiement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formListFraishorsForfait.php">Voir les frais hors forfait</a>
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
                    <h2>Valider les frais hors forfait</h2>
                    <form action="validerHorsForfait.php" method="POST">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>libelle</th>
                                    <th>Visiteur</th>
                                    <th>Valider</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = $db->query("select fraishorsforfait.id, montant, date, libelle, nom, prenom from fraishorsforfait, users where fraishorsforfait.idVisiteur = users.id;");
                                    while($row = $sql->fetch_array(MYSQLI_BOTH)) {
                                        $id = $row[0];
                                        $montant = $row['montant'];
                                        $date = date('d/m/Y', strtotime($row['date']));
                                        $libelle = $row['libelle'];
                                        $nom = $row['nom'];
                                        $prenom = $row['prenom'];
                                        
                                        echo "<tr>";
                                            echo "<td>".$id."</td>";
                                            echo "<td>".$montant."</td>";
                                            echo "<td>".$date."</td>";
                                            echo "<td>".$libelle."</td>";
                                            echo "<td>".$prenom." ".$nom."</td>";
                                            echo "<td><input type=\"submit\" class=\"btn btn-success\" value=\"Valider\" name=\"valider\" /><input type=\"submit\" class=\"btn btn-danger\" value=\"Supprimer\" name=\"supprimer\" /></td>";
                                        echo "</tr>";

                                    }   
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>