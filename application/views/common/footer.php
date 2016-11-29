<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2016 <a target="_blank" href="http://www.faisal-ahmed.com/" title="">Faisal-Ahmed</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Search/ArchivedContent">Archived Content Search</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Search/RecentContent">Recent Content Search</a></li>
                    <!--<li><a href="<?php /*echo base_url(); */?>index.php/AboutUs">About Us</a></li>
                    <li><a href="#">Faq</a></li>-->
                    <li><a href="<?php echo base_url(); ?>index.php/Auth/Register">Register</a></li>
                </ul>
            </div>
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

<script type="text/javascript">
    <?php if ($menu == 'home') { ?>jQuery('#contentProvider').select2();<?php } ?>
    <?php if ($menu == 'search' && $subMenu == 'recent') { ?>jQuery('#contentProvider').select2();<?php } ?>
</script>

</body>
</html>