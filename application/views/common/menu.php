<header id="header">
    <!--<div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="<?php echo base_url() ?>static/images/logo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="<?php if ($menu == 'home') echo "active"?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="<?php if ($menu == 'about') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/AboutUs">About Us</a></li>
                    <li class="<?php if ($menu == 'services') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Services">Services</a></li>
                    <li class="<?php if ($menu == 'content') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/ContentProviders">Content Providers</a></li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="shortcodes.html">Shortcodes</a></li>
                        </ul>
                    </li>-->
                    <li class="<?php if ($menu == 'blog') echo "active"?>"><a href="#">Blog</a></li>
                    <li class="<?php if ($menu == 'contact') echo "active"?>"><a href="#">Contact</a></li>
                    <li class="<?php if ($menu == 'login') echo "active"?>"><a href="#">Login</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->