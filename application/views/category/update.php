<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
      <h4 class="classic-title"><span>Nouveau produit</span></h4>
      <?php if(isset($_SESSION['success'])) echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>'; ?>
    <div class="row">
    <div class=" col-md-6 col-lg-6">
      <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
      <?php echo form_open_multipart('categories/'.$category->id); ?>


      <div class="form-group">
          <div class="controls">
          <h5>Libelle:</h5>
          <input class="form-control" type="text" name="name" value="<?php echo $category->name; ?>" />
          <?php echo form_error('name'); ?>
          </div>
      </div>



      <div><input type="submit" value="Enregister" /></div>

      </form>
    </div>
    </div>
  </div>
</div>

