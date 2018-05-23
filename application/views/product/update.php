<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
      <h4 class="classic-title"><span>Nouveau produit</span></h4>
      <?php if(isset($_SESSION['success'])) echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>'; ?>
      <?php echo form_open_multipart('products/'.$product['product']->id); ?>
    <div class="row">
    <div class=" col-md-6 col-lg-6">
      <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>


      <div class="form-group">
          <div class="controls">
          <h5>Nom du produit:</h5>
          <input class="form-control" type="text" name="libelle" value="<?php echo $product['product']->libelle; ?>" />
          <?php echo form_error('libelle'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Description:</h5>
          <textarea class="form-control" name="description" ><?php echo $product['product']->description; ?></textarea>
          <?php echo form_error('description'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Stock:</h5>
          <input class="form-control" type="text" name="stock" value="<?php echo $product['product']->stock; ?>" />
          <?php echo form_error('stock'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Couleur:</h5>
          <input class="form-control" type="text" name="color" value="<?php echo $product['product']->color; ?>" />
          <?php echo form_error('color'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Matière:</h5>
          <input class="form-control" type="text" name="matiere" value="<?php echo $product['product']->matiere; ?>" />
          <?php echo form_error('matiere'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Metal:</h5>
          <input class="form-control" type="text" name="metal" value="<?php echo $product['product']->metal; ?>" />
          <?php echo form_error('metal'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Pierre:</h5>
          <input class="form-control" type="text" name="pierre" value="<?php echo $product['product']->pierre; ?>" />
          <?php echo form_error('pierre'); ?>
          </div>
      </div>



      <div><input type="submit" value="Enregister" /></div>

    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <div class="controls">
          <h5>Réference:</h5>
          <input class="form-control" type="text" name="reference" value="<?php echo $product['product']->reference; ?>" />
          <?php echo form_error('reference'); ?>
        </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Catégorie:</h5>
          <select name="category" id="" class="form-control">
            <option value="0">--Aucun--</option>
            <?php
              foreach ($product['categories'] as $c) {
                if ($c->id == $product['category']->id) {
                  echo '<option value="'.$c->id.'" selected>'.$c->name.'</option>';
                } else {
                  echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                }
              } 
            ?>
          </select>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Sous-catégorie:</h5>
          <select name="sub_category" id="" class="form-control">
            <option value="0">--Aucun--</option>
            <?php
              foreach ($product['sub_categories'] as $c) {
                if ($c->id == $product['sub_category']->id) {
                  echo '<option value="'.$c->id.'" selected>'.$c->name.'</option>';
                } else {
                  echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                }
              } 
            ?>
          </select>
          </div>
      </div>

    </div>
    </div>
    </form>
  </div>
</div>

