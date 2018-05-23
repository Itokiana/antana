<div class="col-md-offset-4 col-md-4 bg-light" style="background: white; padding: 20px; margin-top: 50px">

    <?php if(isset($_SESSION['success'])) echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>'; ?>
    <?php if(isset($_SESSION['error'])) echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>'; ?>
    <!-- Classic Heading -->
    <h4 class="classic-title"><span>Login</span></h4>

    <!-- Start Contact Form -->
    <?php echo form_open(); ?>
      <div class="form-group">
        <div class="controls">
          <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" size="50" />
          <?php echo form_error('email'); ?>
        </div>
      </div>
      <div class="form-group">
        <div class="controls">
          <input type="password" name="password" class="form-control" value="" size="50" />
          <?php echo form_error('password'); ?>
        </div>
      </div>
      <input type="submit" value="Se connecter" />
      <div id="success" style="color:#34495e;"></div>
    </form>
    <!-- End Contact Form -->

  </div>


