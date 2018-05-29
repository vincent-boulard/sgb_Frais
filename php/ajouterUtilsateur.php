<?php

    require "connexion_db.php";

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    if ($_POST['dateEmbauche'] == "1970-01-01" OR $_POST['dateEmbauche'] == "" OR $_POST['dateEmbauche'] == "0000-00-00") {
        $dateEmbauche = "null";
    } else {
        $dateEmbauche = date('Y-m-d', strtotime($_POST['dateEmbauche']));
    }
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $login = strtolower($_POST['nom']);
    $pwd = md5($_POST['pwd']);
    $status = "visiteur";

    
    echo "nom : ".$nom."<br />";
    echo "prenom : ".$prenom."<br />";
    echo "dateEmbauche : ".$dateEmbauche."<br />";
    echo "adresse : ".$adresse."<br />";
    echo "cp : ".$cp."<br />";
    echo "ville : ".$ville."<br />";
    echo "login : ".$login."<br />";
    echo "pwd : ".$pwd."<br />";
    echo "status : ".$status."<br />";
    

    //echo "INSERT INTO users (nom, prenom, adresse, cp, ville, status, login, pwd, dateEmbauche) VALUES ('$nom',  '$prenom', '$adresse', '$cp', '$ville', '$status',  '$login', '$pwd', '$dateEmbauche');";
    if ($dateEmbauche == "null") {
        $sql = $db->query("INSERT INTO users (nom, prenom, adresse, cp, ville, status, login, pwd, dateEmbauche) VALUES ('$nom',  '$prenom', '$adresse', '$cp', '$ville', '$status',  '$login', '$pwd', $dateEmbauche);");
    } else {
        $sql = $db->query("INSERT INTO users (nom, prenom, adresse, cp, ville, status, login, pwd, dateEmbauche) VALUES ('$nom',  '$prenom', '$adresse', '$cp', '$ville', '$status',  '$login', '$pwd', '$dateEmbauche');");
    }
    
 
    header('location: listeVisiteur.php');

    