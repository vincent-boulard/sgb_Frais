<?php @session_start();

    echo "<script>document.location.replace(\"../index.php\");</script>";

    session_destroy();