<section id="services" class="service-item">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Search for Archieved Content</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">
            <form action="" method="post" role="form">
                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
            </form>
        </div>

        <div class="register_link wow fadeInDown">
            <h3><a href="<?php echo base_url(); ?>index.php/Auth/register">Register Here</a> to pin your search result. You may want to try <a href="<?php echo base_url(); ?>index.php/Search/ArchivedContent">Advance Search</a>.</h3>
        </div>

    </div><!--/.container-->
</section><!--/#services-->

<section id="recent-works">
    <div class="container">
        <div class="row">
            <div class="center wow fadeInDown">
                <h2>Latest Top Contents</h2>
                <form action="" method="get" id="latestContentForm" role="form">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <label for="content-provider">Content Provider</label>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <select name="contentProvider" id="contentProvider" onchange="this.form.submit();" class="form-control menuselection">
                            <?php foreach ($contentProvider['sources'] as $key => $value) { ?>
                                <option <?php if (isset($_REQUEST['contentProvider']) && $_REQUEST['contentProvider'] == $value->id) echo 'selected="selected" '; ?> value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>

            <?php $count = 0; foreach ($content['articles'] as $key => $value) { ?>
            <div class="media reply_section wow fadeInDown">
                <div class="pull-left post_reply text-center" style="width: 20%;">
                    <a href="#"><img src="<?php echo $value->urlToImage ?>" class="img-circle" alt="" /></a>
                </div>
                <div class="media-body post_reply_content">
                    <h3><a href="<?php echo $value->url ?>" target="_blank"><?php echo $value->title ?></a></h3>
                    <p class="lead"><?php echo $value->description ?></p>
                    <p><strong>On: </strong><?php echo str_replace("T", " ", $value->publishedAt) ?></p>
                    <p><strong>Direct Url: </strong><a href="<?php echo $value->url ?>" target="_blank"><?php echo $value->url ?></a></p>
                </div>
            </div>
            <?php } ?>

       </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#middle-->