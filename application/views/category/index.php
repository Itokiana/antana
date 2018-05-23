<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h2 class="classic-title">
      <span>Listes des catégories</span>
    </h2>
    <table class="table">
      <thead style="font-weight: bold; font-size: 1.05em">
        <tr>
          <td>#</td>
          <td>Libelle</td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $p){ ?>
        <tr>
          <td><?php echo $p->id; ?></td>
          <td><?php echo $p->name; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>categories/<?php echo $p->id; ?>/show" class="btn btn-success btn-sm">Détails</a>
            <a href="<?php echo base_url(); ?>categories/<?php echo $p->id; ?>" class="btn btn-primary btn-sm">Modifer</a>
            <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target=".delete<?php echo $p->id; ?>">Supprimer</button>
          </td>
        </tr>
        <div class="delete<?php echo $p->id; ?> modal fade" tabindex="-1" role="dialog">
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
                <a href="<?php echo base_url(); ?>categorie/<?php echo $p->id; ?>"  class="btn btn-danger">Supprimer</a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>