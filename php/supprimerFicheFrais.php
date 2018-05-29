<?php
    require "connexion_db.php";

    $id = $_GET['id'];

    //echo "id = ".$id;

    $sql = $db->query("delete from fichefrais where id=".$id.";");

    echo "<script>document.location.replace('formListeFicheFrais.php');</script>";