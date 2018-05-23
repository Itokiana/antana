<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h2 class="classic-title">
      <span>Listes des utilisateurs</span>
    </h2>
    <table class="table">
      <thead style="font-weight: bold; font-size: 1.05em">
        <tr>
          <td>#</td>
          <td>Nom</td>
          <td>Prénoms</td>
          <td>Email</td>
          <td>Rôle</td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $u){ ?>
        <tr>
          <td><?php echo $u->id; ?></td>
          <td><?php echo $u->first_name; ?></td>
          <td><?php echo $u->last_name; ?></td>
          <td><?php echo $u->email; ?></td>
          <td><span class="badge"><?php $role = ($u->role == 1) ? "Admin" : "Intégrateur"; echo $role; ?></span></td>
          <td>
            <!-- <a href="<?php echo base_url(); ?>products/<?php echo $u->id; ?>" class="btn btn-primary btn-sm">Modifer</a> -->
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete<?php echo $u->id; ?>">Supprimer</button>
          </td>
        </tr>
        <div class="delete<?php echo $u->id; ?> modal fade" tabindex="-1" role="dialog">
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
                <a href="<?php echo base_url(); ?>user/<?php echo $u->id; ?>"  class="btn btn-danger">Supprimer</a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>