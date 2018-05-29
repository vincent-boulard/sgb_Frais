<?php @session_start();
    // echo $_SESSION['connect'];
    require "connexion_db.php";

    /*
    $date = $db->query("select mois, annee from fichefrais where id = ".$id.";");
    while($row = $date->fetch_array(MYSQLI_BOTH)) {
        $mois = $row['mois'];
        $annee = $row['annee'];
    } 
    */
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
                    <h2>Suivre une fiche de frais</h2>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" id="idFiche">
                                <option id="0"></option>
                                <?php
                                    $result = $db->query("select distinct id from fichefrais;");

                                    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                                        $id = $row['id'];

                                        echo "<option id=\"".$id."\">Fiche n° ".$id."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br />
                    <h3 id="txtFiche">Fiche n° <span id="noFiche"></span></h3>
                    <br />
                    <div id="ficheFrais">
                        <!-- Fiche de frais -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            //console.log(txtFiche);
            $('#idFiche').on('change', function(){
                var txtFiche = $('#txtFiche').text();
                var id = $('#idFiche option:selected').attr('id');
                if (id == 0) {
                    $('#noFiche').html("");
                } else {
                    $('#noFiche').html(id);
                }
                //console.log(id);
                $.post('tableFicheFrais.php', {id:id}, function(data){
                    $('#ficheFrais').html(data);
                });
            });
        </script>
    </body>
</html>