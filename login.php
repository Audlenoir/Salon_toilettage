<?php
    require_once("inc/header.php");

    # Si compte enregistré msg 1 si deja créé au préalable msg 2
    if(isset($_POST['m']))
    {
        switch($_POST['m'])
        {
            case "success":
                $msg .="<div class='alert alert-warning'>Vous êtes bien inscrit, veuillez vous connecter</div>";
            break;
            default:
                $msg .="<div class='alert alert-success'>Veuillez vous connecter</div>";
            break;
        }   
    }

    # Je cherche dans ma bdd si une correspndance exsite avec mon mail
    if($_POST)
    {
     

        $req = "SELECT * FROM user WHERE mail = :mail";

        $pdoST_userOk = $pdo->prepare($req);
        $pdoST_userOk->bindValue(":mail", $_POST['mail'], PDO::PARAM_STR); 
        $pdoST_userOk->execute();

        if($pdoST_userOk->rowCount()==1)
        {
            $user = $pdoST_userOk->fetch();

            if(password_verify($_POST['password'], $user['password']))
            {
               
                foreach($user as $key=> $value)
                {
                    if($key!= "password")
                    {
                        $_SESSION["user"][$key] = $value;
                    }
                }
         
            header("location:soins.php");

            } else { 
           
               $msg .="<div> Erreur lors de la connexion</div>";
            }
        } else {
        
            $msg .="<div> Erreur lors du log</div>";   
        }

    }
    //debug($_SESSION);
?>

<div class="container">
    <?= $msg ?>
    <h2>Connectez vous</h2>

    <form  method="POST">
        <div class="row justify-content-center">
            <div class="form-group col-4">
                <label>Entrez votre adresse mail</label>
                <input type="email" class="form-control" id="connect" name="mail">
            </div>
            <div class="form-group col-4">
                <label >Entrez votre mot de passe</label>
                <input type="password" class="form-control" id="connect" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-info">Connexion</button>
</form>
</div>







<?php
    require_once("inc/footer.php");
?>