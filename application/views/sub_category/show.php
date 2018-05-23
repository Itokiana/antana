<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h4 class="classic-title"><span>Détails du catégorie</span></h4>
    <div class="row">
    <div class=" col-md-6 col-lg-6">
      <p>
        <strong>Libelle: </strong>&nbsp;<?php echo $sub_category->name;?>
      </p><br>
      <p>
        <strong>Catégorie: </strong>&nbsp;<?php echo $category->name;?>
      </p><br>
      <a href="<?php echo base_url(); ?>sub_categories" class="btn btn-primary btn-sm">Retour</a>
      <a href="<?php echo base_url(); ?>sub_categories/<?php echo $sub_category->id; ?>" class="btn btn-success btn-sm">Modifier</a>
    </div>
    </div>
  </div>
</div>