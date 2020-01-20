<?php
    require_once("inc/header.php");


  # Je récupere ma table soin dans ma bdd

    $pdoST_soins = $pdo->prepare("SELECT * FROM soin");
    $pdoST_soins->execute();
    $soins = $pdoST_soins->fetchAll();
   
  //debug($soins);

  # mise a jour de mon catalogue de soins
  //$pdoST_MAJ = $pdo->prepare("UPDATE user WHERE id = id['user'] "); 
  //$pdoST_MAJ->execute

?>

<section class="container maCard">
  <div class="card-deck">
    <?php foreach ($soins as $soin) : ?>
    <div class="card">

      <img id="img_soins" src="<?= URL?>assets/img/<?= $soin['picture'] ?>" class="card-img-top" alt="Salon de toilettage">
      <div class="card-body">
        <h5 class="card-title"><?= $soin['category']?></h5>
        <p class="card-text"> <?= $soin['description']?></p>
        <p class="card-text">Durée du rendez-vous : <?= date_format(new DateTime($soin['temps']), 'G \h\e\u\r\e i \m\i\n\u\t\e\s'); ?></p>
        <span class="badge badge-info price"><?= $soin['prix']?>€</span>
        
      </div>

       <button> 
        <?php if(userConnect()) : ?> 
        <form method="post" > 
          <button class="btn btn-info"><a class="lien_soins" href="page_rdv.php?idSoin=<?=$soin['id_soin']?>">Prendre RDV</a></button>
        </form>
      
        <?php else : ?>
          <a href="login.php">Connectez vous pour prendre rendez-vous</a>
         
      <?php endif; ?>
      </button>
    </div>
    <?php endforeach ?>
   
  </div>

  
</section>




<?php
    require_once("inc/footer.php");
?>