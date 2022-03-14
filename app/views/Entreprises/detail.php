<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT; ?>/Entreprises" class="btn btn-primary"><i class="bi bi-skip-backward"></i> Retour</a>
<br>
<h1><?php echo $data['entreprise']->nom_entreprise; ?></h1>

<div class="card w-50">
  <div class="card-header">
  <?php echo $data['entreprise']->nom_entreprise; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Siege Sociale: <?php echo $data['entreprise']->siege_social; ?></h5>
    <p class="card-title">Créé le:<?php echo $data['entreprise']->date_creation; ?></p>
    <p class="card-title">Régistre de commerce  :<?php echo $data['entreprise']->registre_commerce; ?></p>
    <p class="card-title">NINEA  :<?php echo $data['entreprise']->ninea; ?></p>
    <p class="card-title">Page web  :<?php echo $data['entreprise']->page_web; ?></p>
    <div class="row">
    <div class="col-4">
        <a href="<?php echo URLROOT; ?>/entreprises/edit/<?php echo $data['entreprise']->id; ?>" class="btn btn-outline-primary">Modifier</a>
    </div>
    <div class="col-6 pull-right">
        <form class="pull-right" action="<?php echo URLROOT; ?>/entreprises/delete/<?php echo $data['entreprise']->id; ?>" method="post">
            <input type="submit" value="delete" class="btn btn-outline-danger">
        </form>
    </div>
    </div>
    
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>