<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h4 class="classic-title"><span>Nouvelle sous-catégorie</span></h4>
    <div class="row">
      <div class=" col-md-6 col-lg-6">
        <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>
        <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
        <?php if(isset($error)) echo $error;?>
        <?php echo form_open_multipart('sub_categories/new'); ?>


        <div class="form-group">
            <div class="controls">
            <h5>Libelle:</h5>
            <input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" />
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
                  echo '<option value="'.$c->id.'">'.$c->name.'</option>';
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
