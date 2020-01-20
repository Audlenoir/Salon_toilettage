
<?php
require_once("inc/header.php");

if($_POST)
{ 
    //debug($_POST);
    
    # Vérification du mdp
    if(!empty($_POST['password']))
        {
            # J'autorise les mdp comprenant un min, maj, chiffre et symbole entre 6 et 20 caracteres
            $password_verif = preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*\'\?$@%_])([-+!*\?$\'@%_\w]{4,20})$#', $_POST['password']);

            if(!$password_verif)
            {
                $msg .="<div class='alert'>Votre mdp n'est pas valide</div>";

            }
        } else {
            $msg .="<div class='alert'>Veuillez rentrer un mot de passe</div>";
        }

        # Je vérifie la validite du mail
        if(!empty($_POST['mail']))
        {
            $email_verif = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
            #J'exclu les domaine provisoire
            $not_mail = [
                'mailinator.com',
                'yopmail.com',
                'mail.com'
            ];

            $domain = explode("@", $_POST['mail']);
        }

        

        # Si toutes les conditions sont ok
        if(empty($msg))
        {
            $msg .= "<div class='alert alert-success'>il y a eu un probleme, rééssayez</div>";
            
        } else {
            
            $pdoST_user = $pdo->prepare("INSERT INTO user (nom, telephone, mail, `password`, animal, nom_animal, age_animal) 
            VALUES (:nom, :telephone, :mail, :password, :animal, :nom_animal, :age_animal)");

            # Je hash le mdp pour le rendre incracable
            $hash_pwd = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $pdoST_user->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
            $pdoST_user->bindValue(":telephone", $_POST['telephone'], PDO::PARAM_STR);
            $pdoST_user->bindValue(":mail", $_POST['mail'], PDO::PARAM_STR);
            $pdoST_user->bindValue(":password", $hash_pwd, PDO::PARAM_STR);
            $pdoST_user->bindValue(":animal", $_POST['animal'], PDO::PARAM_STR);
            $pdoST_user->bindValue(":nom_animal", $_POST['nom_animal'], PDO::PARAM_STR);
            $pdoST_user->bindValue(":age_animal", $_POST['age_animal'], PDO::PARAM_STR);

            if($pdoST_user->execute())
            {
                //$msg .= "<div class='alert alert-success'>Vous êtes bien enregistré</div>";
                header("location:login.php?m=success");  
            } 


               

        }

        

}









?>

<div class="container">
    <form method="POST">
        <h2>Informations personnelles</h2>
        <div class="row">
            <div class="form-group col-3">
                <label >Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="form-group  col-3">
                <label >téléphone</label>
                <input type="text" class="form-control" name="telephone">
            </div>
            <div class="form-group col-3">
                <label>Mail</label>
                <input type="email" class="form-control" name="mail">
            </div>
            <div class="form-group col-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <h3>Animal</h3> 
        
            <div class="form-check">
                <input class="form-check-input" type="radio" name="animal" id="chat" value="chat" checked>
                <label class="form-check-label">
            Chat
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="animal" id="chien" value="chien">
                <label class="form-check-label">
            Chien
                </label>
            </div>
       <div class="row justify-content-center">
            <div class="form-group col-4">
                <label >Nom de l'animal</label>
                <input type="text" class="form-control" name="nom_animal">
            </div>
            <div class="form-group col-4">
                <label >Age de l'animal</label>
                <input type="text" class="form-control" name="age_animal">
            </div>
        </div>
        <button type="submit" class="btn btn-info">Inscription</button>
    </form>
    <?= $msg?>
</div>


<?php
require_once("inc/footer.php");

?>