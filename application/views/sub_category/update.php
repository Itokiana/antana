<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
      <h4 class="classic-title"><span>Nouveau produit</span></h4>
      <?php if(isset($_SESSION['success'])) echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>'; ?>
    <div class="row">
    <div class=" col-md-6 col-lg-6">
      <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
      <?php echo form_open_multipart('sub_categories/'.$sub_category->id); ?>


      <div class="form-group">
          <div class="controls">
          <h5>Libelle:</h5>
          <input class="form-control" type="text" name="name" value="<?php echo $sub_category->name; ?>" />
          <?php echo form_error('name'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Catégorie:</h5>
          <select name="category" id="" class="form-control">
            <option value="0">--Aucun--</option>
            <?php
              foreach ($categories as $c) {
                if ($c->id == $sub_category->category_id) {
                  echo '<option value="'.$c->id.'" selected>'.$c->name.'</option>';
                } else {
                  echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                }
                
              } 
            ?>
          </select>
          </div>
      </div>



      <div><input type="submit" value="Enregister" /></div>

      </form>
    </div>
    </div>
  </div>
</div>

