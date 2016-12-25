<section id="contact-page" style="padding-top: 50px;">
    <div class="container">
        <div class="center">
            <h2>Forget your account's password?</h2>
            <p class="lead">Please enter your account's email to get the reset link of your password.</p>
        </div>
        <div class="row wow fadeInDown">
            <div class="status alert alert-success" style="display: none"></div>
            <form class="login-form" method="post" action="">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" required="required" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit</button>
                        <a href="<?php echo base_url() ?>index.php/Auth/login" style="vertical-align: -webkit-baseline-middle;">Go back to Login?</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="get-started center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <h2>Ready to get started</h2>
                <p class="lead">If you do not have any account and want to unlock our premium features then please register for an account below.</p>
                <div class="request">
                    <h4><a href="<?php echo base_url() ?>index.php/Auth/register" style="padding: 5px 42px;">Register Here</a></h4>
                </div>
            </div>
        </div>
    </div><!--/.container-->
</section><!--/#contact-page-->
