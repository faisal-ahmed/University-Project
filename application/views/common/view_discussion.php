<section id="recent-works" style="min-height: 520px;">
    <div class="container">
        <div class="row">
            <div class="status alert alert-success alert-dismissable" style="<?php if (!isset($success)) echo 'display: none'?>"><?php echo $success ?></div>
            <div class="media reply_section wow fadeInDown">
                <div class="pull-left post_reply text-center" style="width: 20%; margin-top: 20px;">
                    <a href="#"><img src="<?php echo $discussion['url_to_image'] ?>" class="img-circle" alt="" /></a>
                </div>
                <div class="media-body post_reply_content">
                    <h3><strong>Content Source: <?php echo strtoupper($discussion['source']) ?></strong></h3>
                    <h3><strong>Title: </strong><a href="<?php echo $discussion['url'] ?>" target="_blank"><?php echo $discussion['title'] ?></a></h3>
                    <p><strong>Direct Url: </strong><a href="<?php echo $discussion['url'] ?>" target="_blank"><?php echo $discussion['url'] ?></a></p>
                    <a href="<?php echo base_url() ?>index.php/Bookmark?url=<?php echo $discussion['url'] ?>&title=<?php echo $discussion['title'] ?>&im=<?php echo $discussion['url_to_image'] ?>&s=<?php echo $discussion['source']?>" target="_blank">Bookmark</a> |
                    <a href="<?php echo base_url() ?>index.php/Discussion?content=<?php echo $discussion['id'] ?>" target="_blank">Leave Discussion Room</a>

                    <h3 style="text-decoration: underline;">Comments:</h3>
                    <div style="max-height: 600px; overflow-y: scroll;">
                        <?php if (isset($discussion['comments'])) foreach ($discussion['comments'] as $key => $value) { ?>
                        <div class="single_comments" style="clear: both">
                            <img src="<?php echo ($value['profile_picture'] != '') ? $value['profile_picture'] : base_url() . "static/images/blog/avatar3.png"; ?>" alt="" style="height: 120px; width: 120px; margin-bottom: 10px;">
                            <p><?php echo $value['comment'] ?></p>
                            <div class="entry-meta small muted">
                                <span>By <strong><?php echo $value['fullname'] ?></strong> </span>On <?php echo date("jS F, Y \a\\t h:i:s A", $value['at']) ?>.
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <form method="post" class="login-form" action="" style="margin-top: 20px;">
                        <input type="hidden" value="<?php echo $discussion['id'] ?>" name="content_id" />
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="first_name">Your Thoughts</label>
                                <textarea name="comment" id="comment" class="form-control" required="required" placeholder="Enter your thoughts here"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#middle-->
