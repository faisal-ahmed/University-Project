<section id="recent-works" style="min-height: 520px;">
    <div class="container">
        <div class="row">
            <div class="status alert alert-success alert-dismissable" style="<?php if (!isset($success)) echo 'display: none'?>"><?php echo $success ?></div>
            <?php if ($status == 'success') { ?>
                <?php $count = 0; foreach ($discussion_list as $key => $value) { ?>
                    <div class="media reply_section wow fadeInDown">
                        <div class="pull-left post_reply text-center" style="width: 20%; margin-top: 20px;">
                            <a href="#"><img src="<?php echo $value['url_to_image'] ?>" class="img-circle" alt="" /></a>
                        </div>
                        <div class="media-body post_reply_content">
                            <h3><strong>Content Source: <?php echo strtoupper($value['source']) ?></strong></h3>
                            <h3><strong>Title: </strong><a href="<?php echo $value['url'] ?>" target="_blank"><?php echo $value['title'] ?></a></h3>
                            <p><strong>Direct Url: </strong><a href="<?php echo $value['url'] ?>" target="_blank"><?php echo $value['url'] ?></a></p>
                            <a href="<?php echo base_url() ?>index.php/Bookmark?url=<?php echo $value['url'] ?>&title=<?php echo $value['title'] ?>&im=<?php echo $value['url_to_image'] ?>&s=<?php echo $value['source']?>" target="_blank">Bookmark</a> |
                            <a href="<?php echo base_url() ?>index.php/Discussion?content=<?php echo $value['id'] ?>" target="_blank">Leave Discussion Room</a> |
                            <a href="<?php echo base_url() ?>index.php/Discussion/View?id=<?php echo $value['id'] ?>" target="_blank">View Discussion</a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="media reply_section wow fadeInDown">
                    <div class="status alert alert-danger">No discussion record found for your account!</div>
                </div>
            <?php } ?>

        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#middle-->

<script type="text/javascript">
    function updateFilter(value){
        jQuery("#contentFilter").val(value);
    }
</script>