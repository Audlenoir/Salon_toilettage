<?php
    require_once("inc/header.php");
    if(userConnect($_SESSION['user']['mail']))
    {
        $pdoST_maj = $pdo->prepare("UPDATE user SET nom = :nom, mail = :mail, telephone = :telephone, animal = :animal, nom_animal = :nom_animal WHERE id_user = :id_user");
        $pdoST_maj->bindValue(":mail", $_SESSION['user']['mail'], PDO::PARAM_STR); 
        $pdoST_maj->bindValue(":nom", $_SESSION['user']['nom'], PDO::PARAM_STR); 
        $pdoST_maj->bindValue(":telephone", $_SESSION['user']['telephone'], PDO::PARAM_STR); 
        $pdoST_maj->bindValue(":animal", $_SESSION['user']['animal'], PDO::PARAM_STR);
        $pdoST_maj->bindValue(":nom_animal", $_SESSION['user']['nom_animal'], PDO::PARAM_STR);
        $pdoST_maj->bindValue(":id_user", $_SESSION['user']['id_user'], PDO::PARAM_STR);
        
        
        $pdoST_maj -> execute();
        $maj = $pdoST_maj;
        
        
    }
    
    if(isset($_SESSION['user']['mail']))
    {
        $pdoST_user = $pdo->prepare("SELECT * FROM user WHERE mail = :mail");
        $pdoST_user->bindValue(":mail", $_SESSION['user']['mail'], PDO::PARAM_STR); 
        $pdoST_user->execute();
       
        $user = $pdoST_user->fetch();
    }




?>    


<section>
    <form method="post">
        <ul>
            <input>Nom  <?= $maj['user']['nom'] ?></input>
            <input>mail  <?=$maj['user']['mail'] ?></input>
            <input>téléphone  <?= $maj['user']['telephone'] ?></input>
            <input>Animal  <?= $maj['user']['animal'] ?></input>
            <input>Nom de mon animal  <?= $maj['user']['nom_animal'] ?></input>
           
            
        </ul>
        <button type="submit">Enregistrer</button>

    </form>
</section>




<?php
    require_once("inc/header.php");


?>   