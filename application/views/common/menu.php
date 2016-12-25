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
                <a class="navbar-brand" href="<?php echo base_url(); ?>" style="padding-bottom: 10px;"><img src="<?php echo base_url() ?>static/images/acm_logo.png" width="115" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="<?php if ($menu == 'home') echo "active"?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="<?php if ($menu == 'services') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Services">Services</a></li>
                    <li class="<?php if ($menu == 'content') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/ContentProviders">Content Providers</a></li>
                    <?php if ($loggedIn != 'true') { ?>
                        <li class="<?php if ($menu == 'login') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Auth/Login">Enter</a></li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle <?php if ($menu == 'menu') echo "active"?>" data-toggle="dropdown">My Menu <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="<?php if ($menu == 'bookmark') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Bookmark">Bookmarked Content</a></li>
                                <li class="<?php if ($menu == 'discussion') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Discussion">Discussion Board</a></li>
                                <li class="<?php if ($menu == 'profile') echo "active"?>"><a href="<?php echo base_url(); ?>index.php/Auth/Profile">My Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>index.php/Auth/Logout">Logout</a></li>
                    <?php } ?>
                </ul>
                <?php if ($loggedIn == 'true') { ?><h3 class="text-right text-capitalize" style="color: #ffffff; padding-right: 10px; text-decoration: underline;">Welcome <?php echo $username; ?></h3><?php } ?>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->