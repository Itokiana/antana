<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h4 class="classic-title"><span>Nouvelle catégorie</span></h4>
    <div class="row">
      <div class=" col-md-6 col-lg-6">
        <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>
        <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
        <?php if(isset($error)) echo $error;?>
        <?php echo form_open_multipart('categories/new'); ?>


        <div class="form-group">
            <div class="controls">
            <h5>Libelle:</h5>
            <input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" />
            <?php echo form_error('name'); ?>
            </div>
        </div>



        <div><input type="submit" value="Enregister" /></div>

        </form>
      </div>
    </div>
  </div>
</div>
