<?php
    require "connexion_db.php";

    $id = $_GET['id'];

    echo $id;

    $sql = $db->query("DELETE FROM users WHERE id=".$id);

    echo "<script>document.location.replace('listeVisiteur.php');</script>";