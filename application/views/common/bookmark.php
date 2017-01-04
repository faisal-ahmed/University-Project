<section id="recent-works" style="min-height: 520px;">
    <div class="container">
        <div class="row">
            <div class="status alert alert-success alert-dismissable" style="<?php if (!isset($success)) echo 'display: none'?>"><?php echo $success ?></div>
            <?php if ($status == 'success') { ?>
                <table id="bookmarkTable">
                    <thead>
                        <tr>
                            <th class="sorting_asc" rowspan="1" colspan="1" style="width: 20%;">Content Picture</th>
                            <th class="sorting_asc" rowspan="1" colspan="1" style="width: 80%;">Content Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; foreach ($bookmark_list as $key => $value) { ?>
                            <tr class="fadeInDown myTableTr">
                                <td class="post_reply text-center">
                                    <a href="#"><img src="<?php echo $value['url_to_image'] ?>" class="img-circle" alt="" /></a>
                                </td>
                                <td>
                                    <h3><strong>Content Source: <?php echo strtoupper($value['source']) ?></strong></h3>
                                    <h3><strong>Title: </strong><a href="<?php echo $value['url'] ?>" target="_blank"><?php echo $value['title'] ?></a></h3>
                                    <p><strong>Direct Url: </strong><a href="<?php echo $value['url'] ?>" target="_blank"><?php echo $value['url'] ?></a></p>
                                    <a href="<?php echo base_url() ?>index.php/Bookmark?content=<?php echo $value['id'] ?>" target="_blank">Remove Bookmark</a> |
                                    <a href="<?php echo base_url() ?>index.php/Discussion?url=<?php echo $value['url'] ?>&title=<?php echo $value['title'] ?>&im=<?php echo $value['url_to_image'] ?>&s=<?php echo $value['source']?>" target="_blank">Join in Discussion</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="media reply_section wow fadeInDown">
                    <div class="status alert alert-danger">No bookmark record found for your account!</div>
                </div>
            <?php } ?>

        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#middle-->