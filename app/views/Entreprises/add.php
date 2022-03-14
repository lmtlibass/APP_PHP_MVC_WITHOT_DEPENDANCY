<?php require APPROOT . '/views/inc/header.php'; ?>
            <a href="<?php echo URLROOT; ?>/Entreprises" class="btn btn-primary"><i class="bi bi-skip-backward"></i> Retour</a>
           <div class="card card-body bg-light mt-5">
               <h2>Ajoutez une entreprise</h2>
                <form action="<?php echo URLROOT; ?>/Entreprises/Add" method="post">               
                    <div class="form-group">
                        <label for="nom"> Nome de l'entreprise: <sup>*</sup></label>
                        <input type="text" name="nom_entreprise" class="form-control form-control-lg is-invalid <?php echo (!empty($data['nom_entreprise_err'])) ? 'is-valid' : ''; ?> value=<?php echo $data['nom_entreprise']; ?>">
                        <span class="invalid-feedback"><?php echo $data['nom_entreprise_err'];?></span>
                    </div>
    
                    <div class="form-group">
                        <label for="siege_social"> Siege Sociale: <sup>*</sup></label>
                        <input type="text" name="siege_social" class="form-control form-control-lg is-invalid <?php echo (!empty($data['siege_social_err'])) ? 'is-valid' : ''; ?> value=<?php echo $data['siege_social']; ?>">
                        <span class="invalid-feedback"><?php echo $data['siege_social_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="date_creation"> Date de création: <sup>*</sup></label>
                        <input type="date" name="date_creation" class="form-control form-control-lg is-invalid <?php echo (!empty($data['date_creation_err'])) ? 'is-valid' : ''; ?> value=<?php echo $data['date_creation']; ?>">
                        <span class="invalid-feedback"><?php echo $data['date_creation_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="registre_commerce"> Registre Commerce: <sup>*</sup></label>
                        <input type="text" name="registre_commerce" class="form-control form-control-lg is-invalid <?php echo (!empty($data['registre_commerce_err'])) ? 'is-valid' : ''; ?> value=<?php echo $data['registre_commerce']; ?>">
                        <span class="invalid-feedback"><?php echo $data['registre_commerce_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="ninea"> NINEA: <sup>*</sup></label>
                        <input type="text" name="ninea" class="form-control form-control-lg is-invalid <?php echo (!empty($data['ninea_err'])) ? 'is-valid' : ''; ?> value=<?php echo $data['ninea']; ?>">
                        <span class="invalid-feedback"><?php echo $data['ninea_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="page_web"> Page web: <sup>*</sup></label>
                        <input type="text" name="page_web" class="form-control form-control-lg is-invalid <?php echo (!empty($data['page_web_err'])) ? 'is-valid' : ''; ?> value=<?php echo $data['page_web']; ?>">
                        <span class="invalid-feedback"><?php echo $data['page_web_err'];?></span>
                    </div>
                    <div class="form-group">
                       <input type="submit" class="btn btn-outline-success" value="enregistrer">
                    </div>
                </form>
            </div>

<?php require APPROOT . '/views/inc/footer.php';?>