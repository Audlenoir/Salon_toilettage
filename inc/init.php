<?php
    # J'initalise ma session
    session_start();

    #je connecte a ma BDD
    $dsn = "mysql:host=localhost; dbname=salon_toilettage";
    $log = "root";
    $pwd = ""; 
    $attributs = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = new PDO($dsn,$log, $pwd, $attributs);

    
    # Afficher les messages d'erreurs ou de succes
    $msg = "";
    # Affichage du titre de la page
    $webpage = (!empty($webpage)) ? $webpage : "la ligue des super heros";
  

    
    
    # Conservation de mon url
    define("RACINE", $_SERVER['DOCUMENT_ROOT'] . "/PHP/salon/");
    # COnservation de ma racine server lie au projet
    define( "URL", "http://localhost/PHP/salon/");
   

        //print"<pre>";
            //print_r($_SERVER);
        //print"</pre>";

   


?>