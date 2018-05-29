<?php

    require "connexion_db.php";

    $sql = $db->query("update fichefrais set idEtat = \"RB\" where idEtat = \"VA\";");

    echo "<script>document.location.replace('formMiseEnPaiement.php');</script>";