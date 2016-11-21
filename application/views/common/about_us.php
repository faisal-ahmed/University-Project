<section id="about-us">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>About Us</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <!-- about us slider -->
        <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators visible-xs">
                    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-slider" data-slide-to="1"></li>
                    <li data-target="#carousel-slider" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo base_url() ?>static/images/slider_one.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url() ?>static/images/slider_one.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url() ?>static/images/slider_one.jpg" class="img-responsive" alt="">
                    </div>
                </div>

                <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>

                <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div> <!--/#carousel-slider-->
        </div><!--/#about-slider-->
    </div>
</section>