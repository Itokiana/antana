<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h4 class="classic-title"><span>Détails du produit</span></h4>
    <div class="row">
    <div class=" col-md-6 col-lg-6">
      <p>
        <strong>Libelle: </strong>&nbsp;<?php echo $product['product']->libelle;?>
      </p><br>
      <p>
        <strong>Catégorie: </strong>&nbsp;<?php echo $product['category']->name;?><br>
        <strong>Sous-catégorie: </strong>&nbsp;<?php echo $product['sub_category']->name;?>
      </p><br>
      <p>
        <strong>Référence: </strong>&nbsp;<?php echo $product['product']->reference;?>
      </p><br>
      <p>
        <strong>Couleur: </strong>&nbsp;<?php echo $product['product']->color;?><br>
        <strong>Matière: </strong>&nbsp;<?php echo $product['product']->matiere;?><br>
        <strong>Metal: </strong>&nbsp;<?php echo $product['product']->metal;?><br>
        <strong>Pierre: </strong>&nbsp;<?php echo $product['product']->pierre;?>
      </p><br>
      <p>
        <strong>Description: </strong><br><?php echo $product['product']->description;?>
      </p><br>
      <p>
        <strong>Stock: </strong>&nbsp;<?php echo $product['product']->stock;?>
      </p><br>
      <a href="<?php echo base_url(); ?>products" class="btn btn-primary btn-sm">Retour</a>
      <a href="<?php echo base_url(); ?>products/<?php echo $product['product']->id; ?>" class="btn btn-success btn-sm">Modifier</a>
    </div>
    <div class=" col-md-6 col-lg-6">
      <p>
      <?php echo img('uploads/'.$product['product']->picture); ?>
      </p>
    </div>
    </div>
  </div>
</div>