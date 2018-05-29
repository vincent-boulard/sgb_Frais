<?php

    require "connexion_db.php";

    $sql = $db->query("update fichefrais set idEtat = \"CL\" where idEtat = \"CR\";");

    echo "<script>document.location.replace('formClotureFiche.php');</script>";