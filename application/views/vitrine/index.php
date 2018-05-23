

    <!-- Start Home Page Slider -->
    <section id="home">
      <!-- Carousel -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          <li data-target="#main-slide" data-slide-to="1"></li>
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!--/ Indicators end-->

        <!-- Carousel inner -->
        <div class="carousel-inner">
          <div class="item active">
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/slider/bg1.png" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated2">
                              <span>Tongasoa eto @<strong>Antana </strong></span>
                              </h2>
                <h3 class="animated3">
                                <span>Ny Safidy tsara indrindra</span>
                              </h3>
                <p class="animated4"><a href="#" class="slider btn btn-system btn-large">Safidio</a>
                </p>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
          <div class="item">
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/slider/bg1.png" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated4">
                                <span><strong>Antana Jewelers</strong> ho anao</span>
                            </h2>
                <h3 class="animated5">
                              <span>La qualite au meilleur prix</span>
                            </h3>
                <p class="animated6"><a href="#" class="slider btn btn-system btn-large">Acheter</a>
                </p>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
          <div class="item">
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/slider/bg1.png" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated7 white">
                                <span>Votre boutique<strong>luxe</strong></span>
                            </h2>
                <h3 class="animated8 white">
                              <span>aza miandry intsony</span>
                            </h3>
                <div class="">
                  <a class="animated4 slider btn btn-system btn-large btn-min-block" href="#">Safidio</a><a class="animated4 slider btn btn-default btn-min-block" href="#">visite</a>
                </div>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
        </div>
        <!-- Carousel inner end-->

        <!-- Controls -->
        <a class="left carousel-control" href="#main-slide" data-slide="prev">
          <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#main-slide" data-slide="next">
          <span><i class="fa fa-angle-right"></i></span>
        </a>
      </div>
      <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->


    


  


    <!-- Start Portfolio Section -->
    <div class="section full-width-portfolio" style="border-top:0; border-bottom:0; background:#fff;">

      <!-- Start Big Heading -->
      <div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
        <h1>This is Our Latest <strong>Work</strong></h1>
      </div>
      <!-- End Big Heading -->

      <p class="text-center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
        <br/>veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>


      <!-- Start Recent Projects Carousel -->
      <ul id="portfolio-list" data-animated="fadeIn">
      <?php
        if (!empty($products)) {
         
        foreach($products as $p){ 
      ?>
        <li>
          <?php echo img('uploads/'.$p->picture); ?>
          <div class="portfolio-item-content">
            <span class="header"><?php echo $p->libelle; ?></span>
            <p class="body"><?php echo $p->reference; ?></p>
          </div>
          <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $p->id; ?>"><i class="more">+</i></a>

        </li>

      <div class="modal fade bs-example-modal-lg<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-lg modal-dialog" role="document" style="margin-top: 4.5%">
          <div class="modal-content ">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="body" style="padding: 2%">
              <div class="row">
                <div class="col-lg-6 col-md-6 big-title text-center">
                  <?php echo img('uploads/'.$p->picture); ?>
                  <h1 style="margin-top: 20px"><?php echo $p->libelle; ?></h1>
                  <h5>Ref: <?php echo $p->reference; ?></h5>
                </div>
                <div class="col-lg-6 col-md-6">
                <p style="padding: 0 0 0 10%">
                  <strong>Coloris:</strong> &nbsp;<?php echo $p->color; ?><br>
                  <strong>Matière:</strong> &nbsp;<?php echo $p->matiere; ?><br>
                  <strong>Métal:</strong> &nbsp;<?php echo $p->metal; ?><br>
                  <strong>Pierre:</strong> &nbsp;<?php echo $p->pierre; ?><br>
                </p>
                <br>
                <div class="hr"></div>
                <p class="info-prod"><strong>Stocks:</strong> &nbsp;<?php echo $p->stock; ?></p>
                <br>
                <div class="hr"></div>
                <p class="info-prod"><?php echo $p->description; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
          }
        } else {
          echo '<div class="call-action call-action-boxed call-action-style3 clearfix">
          <!-- Call Action Button -->
          <div class="button-side" style="margin-top:10px;"><a href="'.base_url().'" class="btn-system border-btn btn-medium btn-wite"><i class="icon-gift-1"></i> Retour à la page d\'accueil</a></div>
          <!-- Call Action Text -->
          <h2 class="primary"><strong>Aucun produit n\'est disponible dans cette section pour le moment. </strong></h2>
        </div>';
        } 
      ?>
      </ul>

      <!-- End Recent Projects Carousel -->


    </div>
    <!-- End Portfolio Section -->


    



    