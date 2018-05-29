<?php @session_start();
    // echo $_SESSION['connect'];
    require "connexion_db.php";

    $id = $_GET['id'];

    $sql = $db->query("SELECT * FROM users WHERE id = ".$id.";");
    
    // echo $sql->queryString."<br />";
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
                    <h2>Modifier un utilisateur</h2>
                    <br />
                    <form method="POST" action="modifierUtilsateur.php">
                        <?php 
                            while($row = $sql->fetch_array(MYSQLI_BOTH)) { 
                                $id = $row['id'];
                                $nom = $row ['nom'];
                                $prenom = $row['prenom'];
                                $adresse = $row['adresse'];
                                $cp = $row['cp'];
                                $ville = $row['ville'];
                                $dateEmbauche = $row['dateEmbauche'];
                                $pwd = $row['pwd'];        
                        ?>
                        <div class="form-group col-md-12">
                            <input type="text" value="<?php echo $id; ?>" class="hidden" name="id">
                            <div class="form-group row">
                                <label for="nom" class="col-sm-2 col-form-label">Nom : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  name="nom" placeholder="<?php echo $nom; ?>">
                                </div>
                            </div>
                            <br />
                            <div class="form-group row">
                                <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  name="prenom" placeholder="<?php echo $prenom; ?>">
                                </div>
                            </div>
                            <br />
                            <div class="form-group row">
                                <label for="dateEmbauche" class="col-sm-2 col-form-label">Date d'embauche : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="dateEmbauche"  name="dateEmbauche" placeholder="<?php if ($dateEmbauche == NULL) { echo ''; } else { echo date('d/m/Y', strtotime($dateEmbauche)); } ?>">
                                </div>
                            </div>
                            <br />
                            <div class="form-group row">
                                <label for="adresse" class="col-sm-2 col-form-label">Adresse :  </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  name="adresse" placeholder="<?php echo $adresse; ?>">
                                </div>
                            </div>
                            <br />
                            <div class="form-group row">
                                <label for="cp" class="col-sm-2 col-form-label">Code postal :  </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  name="cp" placeholder="<?php echo $cp; ?>">
                                </div>
                            </div>
                            <br />
                            <div class="form-group row">
                                <label for="ville" class="col-sm-2 col-form-label">Ville :  </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  name="ville" placeholder="<?php echo $ville; ?>">
                                </div>
                            </div>
                            <br />
                            <div class="form-group row">
                                <label for="pwd" class="col-sm-2 col-form-label">Mot de passe :  </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  name="pwd" placeholder="<?php echo $pwd; ?>">
                                </div>
                            </div>
                            <br />
                            <input type="submit" class="btn btn-success" value="Modifier l'utilisateur">
                        </div>
                    </form>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
        <script>
            $('#dateEmbauche').datepicker({
                //dateFormat: "dd/mm/yy"
            });
        </script>
    </body>
</html>