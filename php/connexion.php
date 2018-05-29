<?php @session_start();
    
    require "connexion_db.php";

    $login = $_POST['login'];
    $pwd = md5($_POST['pwd']);

    $result = $db->query("select id, nom, prenom, login, pwd, status from users where login = '".$login."' and pwd = '".$pwd."'");

    $count = $result->num_rows."<br />";
    // echo $count."<br />";

    // echo $result->queryString."<br />";

    if ($count == 0) {
        echo "ERREUR<br />";
        echo "<a href=\"../index.php\">Retourner à la page de connexion</a>";
    } else {    
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {

            if ($row['status'] == 'administrateur') {
                $_SESSION['connect'] = "Administrateur";
            } elseif ($row['status'] == "comptable") {
                $_SESSION['connect'] = "Comptable";
            } else {
                $_SESSION['connect'] = "Visiteur";
            }
            /*
            echo "C'est bon<br />";
            echo $row['idStatus']."<br />";
            echo $_SESSION['connect'];
            */
            $_SESSION['id'] = $row['id'];   
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];

            echo "<script>document.location.replace('accueil.php')</script>";
        }
    }

    //print_r($db->errorInfo());

    