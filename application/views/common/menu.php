<header id="header">
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>static/images/acm_logo.png" width="115" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="<?php if ($menu == 'home') echo "active"?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="<?php if ($menu == 'services') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Services">Services</a></li>
                    <li class="<?php if ($menu == 'content') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/ContentProviders">Content Providers</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle <?php if ($menu == 'search') echo "active"?>" data-toggle="dropdown">Content Search <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/Search/ArchivedContent">Archived Content</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Search/RecentContent">Recent Content</a></li>
                        </ul>
                    </li>
                    <!--<li class="<?php /*if ($menu == 'about') echo "active"*/?>"><a href="<?php /*echo base_url(); */?>index.php/AboutUs">About Us</a></li>
                    <li class="<?php /*if ($menu == 'blog') echo "active"*/?>"><a href="#">Blog</a></li>
                    <li class="<?php /*if ($menu == 'contact') echo "active"*/?>"><a href="#">Contact</a></li>-->
                    <li class="<?php if ($menu == 'login') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Auth/Login">Enter</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->