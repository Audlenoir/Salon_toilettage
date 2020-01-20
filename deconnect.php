<?php
    require_once('inc/init.php');

    # déconnecte de la session
    unset($_SESSION['user']);

    

    # retourne a la page d'acceuil
    header('location:index.php');

?>