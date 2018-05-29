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
                    </li><!--
                    <li class="nav-item">
                        <a class="nav-link" href="formListFraishorsForfait.php">Voir les frais hors forfait</a>
                    </li>-->
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
                    <h2>Valider une fiche de frais</h2>
                    <br />
                    <div class="form-group row">
                        <div class="col-md-">
                            <label>Choisir le visiteur : </label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="visiteur">
                                <?php
                                    $result = $db->query("select id, nom, prenom from users where status = \"visiteur\";");

                                    while($row = $result->fetch_array(MYSQLI_BOTH)) {
                                        $id = $row['id'];
                                        $nom = $row['nom'];
                                        $prenom = $row['prenom'];

                                        echo "<option id=\"".$id."\">".$prenom." ".strtoupper($nom)."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1">
                            <label>Mois : </label>
                        </div>
                        <div class="col-md-2">
                            <div id="mois">
                                
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>Année : </label>
                        </div>
                        <div class="col-md-2">
                            <div id="annee">
                                
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" id="ficheFrais">Valider la fiche de frais</button>
                    <br />
                    <h3>Frais au forfait</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="hidden">id</th>
                                <th scope="col">Repas midi</th>
                                <th scope="col">Nuitée</th>
                                <th scope="col">Etape</th>
                                <th scope="col">Km</th>
                                <th scope="col">Situation</th>
                            </tr>
                        </thead>
                        <tbody id="ligneFrais">

                        </tbody>
                    </table>
                    <div class="droite">
                        <button class="btn btn-primary" id="valider">Soumettre la requête</button>
                    </div>
                    <div id="test">

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //Recupère l'id du visteur pa défault
                var id = $('#visiteur option:selected').attr('id');
                //Requête AJAX pour faire la requête du mois
                $.post('mois.php', {id:id}, function(data){
                    $('#mois').html(data);
                });
                $.post('annee.php', {id:id}, function(data){
                    $('#annee').html(data);
                });
            });
            //Requête AJAX pour faire la requête de l'année
            
            //Au chngement du visiteur choisi, la valeur de l'input change ainsi que la requête SQL du mois et de l'année
            $('#visiteur').change(function(){
                var id = $('#visiteur option:selected').attr('id');
                console.log(id);
                $.post('mois.php', {id:id}, function(data){
                    $('#mois').html(data);
                });
                $.post('annee.php', {id:id}, function(data){
                    $('#annee').html(data);
                });
            });

            $('#ficheFrais').on('click', function(){
                var id = $('#visiteur option:selected').attr('id');
                var mois = $('#mois option:selected').attr('id');
                var annee = $('#annee option:selected').attr('id');

                $.post('lignefichefrais.php', {id:id, mois:mois, annee:annee}, function(data){
                    $('#ligneFrais').html(data);
                })
            });
            
            $('#valider').on('click', function(){
                var choix = $('input[name=choix]:checked').val();
                var id = $('#idFicheFrais').attr('ficheFrais');
                //alert(id);
                //alert(choix);
                $.post('validerFicheFrais.php', {choix:choix, id:id}, function(data){
                    $('#test').html(data);
                });
            });
        </script>
    </body>
</html>