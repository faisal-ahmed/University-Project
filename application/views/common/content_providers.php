<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Content Providers</h2>
            <p class="lead">We allow all content providers when you search globally. However, if you want to have notified for any selected content provider's content then we provide the following content provider for you to choose.</p>
        </div>

        <div class="row">
            <?php foreach ($content['sources'] as $key => $value) { ?>
            <div class="col-xs-12 col-sm-4 col-md-3 content_providers">
                <div class="recent-work-wrap">
                    <img class="img-responsive" src="<?php echo $value->urlsToLogos->large ?>" alt="">
                    <div class="overlay">
                        <div class="recent-work-inner">
                            <h3><a href="<?php echo $value->url ?>"><?php echo $value->name ?></a> </h3>
                            <p><?php echo $value->description ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#recent-works-->
