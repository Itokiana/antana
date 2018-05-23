<div class="container" style="margin-top: 100px">
  <div class="col-lg-12" style="background: white; padding: 20px">
    <h4 class="classic-title"><span>Nouvelle utilisateur</span></h4>
    <div class="row">
    <div class=" col-md-6 col-lg-6">
      <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>
      <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
      <?php if(isset($error)) echo $error;?>
      <?php echo form_open_multipart('users/new'); ?>


      <div class="form-group">
          <div class="controls">
          <h5>Nom:</h5>
          <input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" size="50" />
          <?php echo form_error('first_name'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Prénoms:</h5>
          <input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" size="50" />
          <?php echo form_error('last_name'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Email:</h5>
          <input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" size="50" />
          <?php echo form_error('email'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Mot de passe</h5>
          <input class="form-control" type="password" name="password" value="" size="50" />
          <?php echo form_error('password'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Confirmation mot de passe</h5>
          <input class="form-control" type="password" name="passwordconf" value="" size="50" />
          <?php echo form_error('passwordconf'); ?>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
          <h5>Rôle:</h5>
          <select class="form-control" name="role">
            <option value="0"></option>
            <option value="1">Admin</option>
            <option value="2" selected>Intégrateur</option>
          </select>
          </div>
      </div>

      



      <div><input type="submit" value="Enregister" /></div>

      </form>
    </div>
    </div>
  </div>
</div>

