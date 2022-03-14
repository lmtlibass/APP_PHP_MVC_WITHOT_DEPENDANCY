<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('entreprise_message'); ?>
<div class="row">
<div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/Entreprises/Add" class="btn btn-primary pull-left">
        <i class="bi bi-plus-lg"></i> Ajouter une nouvelle Entriprise
        </a>
    </div>  
    <div class="col-md-6">
        <h2>Bienvenue dans votrre space</h2>
    </div>
</div>
<table class="styled-table table table-dark table-striped">
     <thead>
         <tr>
             <th>Entreprise</th>
             <th>Siege sociale</th>
             <th>Date création</th>
             <th>registre commerce</th>
             <th>NINEA</th>
             <th>Page web</th>
         </tr>
     </thead>
     <tbody>
     <?php foreach ($data['entreprise'] as $entreprise ) : ?>
         <tr>
            <td><?php echo $entreprise->nom_entreprise?></td>
            <td><?php echo $entreprise->siege_social?></td>
            <td><?php echo $entreprise->date_creation?></td>
            <td><?php echo $entreprise->registre_commerce?></td>
            <td><?php echo $entreprise->ninea?></td>
            <td><?php echo $entreprise->page_web?></td>
            <td>
                <a href="<?php echo URLROOT; ?>/entreprises/detail/<?php echo $entreprise->id?>" class="btn btn-primary">
                <i class="bi bi-eye"></i> Plus
                </a>
            </td>
         </tr>
    <?php endforeach; ?>
     </tbody>
 </table>


<?php require APPROOT . '/views/inc/footer.php';?>