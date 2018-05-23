<?php 
  if(isset($_SESSION['success']))
  {
    echo '<div style="margin-top: 100px; background: white" class="call-action call-action-boxed call-action-style1 no-descripton clearfix" style="background: white">
            <div class="button-side"><a href="#" class="btn-flash btn-system border-btn btn-medium">Fermer</a></div>
            <h2 class="primary"><strong>'.
            $_SESSION['success'].
            '</strong></h2>
          </div>'; 
  }
  if(isset($_SESSION['error']))
  {
    echo '<div style="margin-top: 100px" class="call-action call-action-boxed call-action-style3 no-descripton clearfix" style="background: white">
            <div class="button-side"><a href="#" class="btn-flash btn-system border-btn btn-medium">Fermer</a></div>
            <h2 class="primary"><strong>'.
            $_SESSION['error'].
            '</strong></h2>
          </div>'; 
  }
?>
<script>
$('.btn-flash').click(function(){
  $('.call-action').fadeOut(500)
})
</script>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="<?php if($_SESSION['page'] == 'product'){echo 'active';}?>"> <a href="<?php echo base_url();?>/products">Accueil</a> </li>
      <li class="<?php if($_SESSION['page'] == 'product'){echo 'active';}?>"> 
        <a  class="<?php if($_SESSION['page'] == 'product'){echo 'active';}?>" href="#">Produits</a>
        <ul class="dropdown">
          <li><a href="<?php echo base_url();?>/products">Tous les produits</a>
          </li>
          <li><a href="<?php echo base_url();?>/products/new">Nouveau produit</a>
          </li>
        </ul> 
      </li>
      <li class="<?php if($_SESSION['page'] == 'category'){echo 'active';}?>"> 
        <a  class="<?php if($_SESSION['page'] == 'category'){echo 'active';}?>">Catégories</a>
        <ul class="dropdown">
          <li><a href="<?php echo base_url();?>/categories">Toutes les catégories</a>
          </li>
          <li><a href="<?php echo base_url();?>/categories/new">Nouvelle catégorie</a>
          </li>
        </ul> 
      </li>
      <li class="<?php if($_SESSION['page'] == 'subcategory'){echo 'active';}?>"> 
        <a  class="<?php if($_SESSION['page'] == 'subcategory'){echo 'active';}?>">Sous-catégories</a>
        <ul class="dropdown">
          <li><a href="<?php echo base_url();?>/sub_categories">Toutes les sous-catégorie</a>
          </li>
          <li><a href="<?php echo base_url();?>/sub_categories/new">Nouvelle sous-catégorie</a>
          </li>
        </ul> 
      </li>
      <?php if($_SESSION['user']->role == 1){?>
        <li class="<?php if($_SESSION['page'] == 'user'){echo 'active';}?>"> 
          <a  class="<?php if($_SESSION['page'] == 'user'){echo 'active';}?>">Utilisateurs</a>
          <ul class="dropdown">
            <li><a href="<?php echo base_url();?>/users">Toutes les utilisateurs</a>
            </li>
            <li><a href="<?php echo base_url();?>/users/new">Nouvelle utilisateur</a>
            </li>
          </ul> 
        </li>
      <?php } ?>
    </ul>

    <form class="navbar-form pull-right" style="margin-top: 20px">
      <a href="<?php echo base_url();?>/logout" class="btn-medium btn-system">
        Déconnexion
      </a>
    </form>
  </div>
</nav>