<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h2 class="classic-title">
      <span>Listes des sous-catégories</span>
    </h2>
    <table class="table">
      <thead style="font-weight: bold; font-size: 1.05em">
        <tr>
          <td>#</td>
          <td>Libelle</td>
          <td>Catégorie</td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sub_categories as $sub){ ?>
        <tr>
          <td><?php echo $sub['subcat']->id; ?></td>
          <td><?php echo $sub['subcat']->name; ?></td>
          <td><?php echo $sub['category']->name; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>sub_categories/<?php echo $sub['subcat']->id; ?>/show" class="btn btn-success btn-sm">Détails</a>
            <a href="<?php echo base_url(); ?>sub_categories/<?php echo $sub['subcat']->id; ?>" class="btn btn-primary btn-sm">Modifer</a>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete<?php echo $sub['subcat']->id; ?>">Supprimer</button>
          </td>
        </tr>
        <div class="delete<?php echo $sub['subcat']->id; ?> modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Etes-vous sure de vouloir supprimer?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <a href="<?php echo base_url(); ?>sub_categorie/<?php echo $sub['subcat']->id; ?>"  class="btn btn-danger">Supprimer</a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->                                     
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>