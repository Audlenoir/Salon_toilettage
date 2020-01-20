<?php
    require_once("inc/header.php");

    # recuperation des données bdd
    if(isset($_SESSION['user']['mail']))
    {
        $pdoST_user = $pdo->prepare("SELECT * FROM user WHERE mail = :mail");
        $pdoST_user->bindValue(":mail", $_SESSION['user']['mail'], PDO::PARAM_STR); 
        $pdoST_user->execute();
       
        $user = $pdoST_user->fetch();
    } else {
        header("location:index.php");
    }

    
 

?>

<section>
    <form method="post">
        <ul>
            <li>Nom : <?= $user['nom'] ?></li>
            <li>mail : <?= $user['mail'] ?></li>
            <li>téléphone : <?= $user['telephone'] ?></li>
            <li>Animal : <?= $user['animal'] ?></li>
            <li>Nom de mon animal : <?= $user['nom_animal'] ?></li>
            <li>Age de mon <?= $user['animal'] ?> : <?= $user['age_animal'] ?></li>
        </ul>

        <button class="btn btn-info"><a href="soins.php">Je prends rendez pour <?= $user['nom_animal'] ?> </a></button>
        <button class="btn btn-info">Mettre a jour mon profil</button>
        <button class="btn btn-info">Supprimer mon profil</button>
    </form>
</section>






<?php
    require_once("inc/footer.php");
?>


