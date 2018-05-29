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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <h2>liste des utilisateurs</h2>
                    <br />
                    <table class="table">
                        <theader>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Date d'embauche</th>
                                <th scope="col">Status</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </theader>
                        <tbody>
                            <?php
                                $result = $db->query("select users.id, nom, prenom, dateEmbauche, status from users;");
                                while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                                    $id = $row['id'];
                                    $nom = $row['nom'];
                                    $prenom = $row['prenom'];
                                    $date = $row['dateEmbauche'];
                                    $status = $row['status'];

                                    echo "<tr>";
                                    echo "<td scope=\"row\">".$id."</td>";
                                    echo "<td>".$nom."</td>";
                                    echo "<td>".$prenom."</td>";
                                    if ($date == '') { echo "<td></td>"; } else { echo "<td>".date('d/m/Y', strtotime($date))."</td>"; }
                                    echo "<td>".$status."</td>";
                                    echo "<td><a href=\"formModifVisiteur.php?id=".$id."\" class=\"btn btn-primary\"><i class=\"fa fa-wrench\"></i> Modifier</a>";
                                    echo "<td><a href=\"supprimerVisiteur.php?id=".$id."\" class=\"btn btn-danger\" onclick=\"return(confirm('Le visiteur va être supprimée. Êtes-vous sûr de vouloir continuer ?'))\"><i class=\"	fa fa-user-times\"></i> Supprimer</a>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        <tfooter>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Date d'embauche</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>