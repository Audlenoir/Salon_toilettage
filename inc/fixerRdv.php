<?php
require_once("init.php");

class RendezVous
{
    public $id;
    public $date;
    public $idSoin;
    public $idUser;
};



$date_rdv = $_POST['date_rdv']; 
$idSoin = $_SESSION['idSoin'];
$idUser = $_SESSION['user']["id_user"];





try {
    $pdo = new PDO('mysql:host=localhost;dbname=salon_toilettage', 'root', '');
    } catch(Exception $e) {
    exit('Impossible de se connecter à la base de données.');
    }

$insert_rdv = $pdo->prepare("INSERT INTO rendez_vous (date_rdv, id_soin, id_user) VALUES (:date_rdv, :id_soin, :id_user)");
$insert_rdv -> bindValue(':date_rdv', $date_rdv, PDO::PARAM_STR);
$insert_rdv -> bindValue(':id_soin', $idSoin, PDO::PARAM_STR);
$insert_rdv -> bindValue(':id_user',$idUser, PDO::PARAM_STR);
$nbLignesInserees = $insert_rdv -> execute();
//echo $nbLignesInserees;
if($nbLignesInserees == 1)
{
//Récupération de l'ID du rdv créé
$id_rdv_cree = $pdo->lastInsertId();

$rdv = new RendezVous();
$rdv->id = $id_rdv_cree;
$rdv->date = $date_rdv;
$rdv->idSoin = $idSoin;
$rdv->idUser = $idUser;

echo JSON_ENCODE($rdv);

} else {
    $msg .="<div>Erreur dans le prise de rdv</div>";
}














?>
