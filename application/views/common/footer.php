<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                &copy; 2016 - 2017 <a target="_blank" href="http://www.faisal-ahmed.com/" title="">Faisal-Ahmed</a>. All Rights Reserved.
            </div>
            <!--<div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="<?php /*echo base_url(); */?>">Home</a></li>
                    <li><a href="<?php /*echo base_url(); */?>index.php/Search/ArchivedContent">Archived Content Search</a></li>
                    <li><a href="<?php /*echo base_url(); */?>index.php/Search/RecentContent">Recent Content Search</a></li>
                    <li><a href="<?php /*echo base_url(); */?>index.php/AboutUs">About Us</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="<?php /*echo base_url(); */?>index.php/Auth/Register">Register</a></li>
                </ul>
            </div>-->
        </div>
    </div>
</footer><!--/#footer-->

<script src="<?php echo base_url() ?>static/js/jquery.js"></script>
<script src="<?php echo base_url() ?>static/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>static/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url() ?>static/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url() ?>static/js/main.js"></script>
<script src="<?php echo base_url() ?>static/js/wow.min.js"></script>
<!--Select2 JS-->
<script src="<?php echo base_url() ?>static/select2/dist/js/select2.min.js"></script>
<!--Select2 JS-->

<!--JS Social JS-->
<!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<!--JS Social JS-->

<!--jQuery Data Tables JS-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<!--jQuery Data Tables JS-->

<script type="text/javascript">
    <?php if ($menu == 'home') { ?>
        jQuery(function(){
            jQuery('#homeTable').DataTable();
        });
        jQuery('#contentProvider').select2();
    <?php } ?>
    <?php if ($menu == 'discussion') { ?>
        jQuery(function() {
            for (var i = 0; i < discussionCount; i++) {
                jQuery("#shareRoundIcons" + i).jsSocials({
                    url: discussionUrl[i],
                    text: discussionText[i],
                    showLabel: false,
                    showCount: false,
                    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp", "telegram", "viber", "pocket", "messenger", "vkontakte"]
                });
            }

            jQuery('#discussionTable').DataTable();
        });

    <?php } ?>
    <?php if ($menu == 'bookmark') { ?>
        jQuery(function(){
            jQuery('#bookmarkTable').DataTable();
        });
    <?php } ?>
</script>

</body>
</html>