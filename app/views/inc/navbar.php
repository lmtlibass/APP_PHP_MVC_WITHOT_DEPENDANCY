
<div class="container-fluid bg-dark-light">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4" ><?php echo SITENAME;?></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link active" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link">Entreprises</a></li>
        <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link">Contacts</a></li>
        <?php if(isset($_SESSION['user_id'])){ ?>
          <li class="nav-item"><a href="<?php echo URLROOT; ?>/users/login" class="nav-link">Se deconnecter</a></li>
        <?php }else{ ?>
          <li class="nav-item"><a href="<?php echo URLROOT; ?>/users/login" class="nav-link">Se connecter</a></li>
          <li class="nav-item"><a href="<?php echo URLROOT; ?>/users/register" class="nav-link">S'enregistrer</a></li>
        <?php } ?>
      </ul>
    </header>
  </div>
