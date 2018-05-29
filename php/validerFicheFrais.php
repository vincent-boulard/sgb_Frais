<?php 
    require "connexion_db.php";

    $choix = $_POST['choix'];
    $id = $_POST['id'];

    echo $choix;

    $sql = $db->query("update fichefrais set idEtat = '".$choix."' where id = ".$id.";");

    echo "<script>document.location.replace('formValiderFicheFrais.php');</script>";