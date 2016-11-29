<section id="contact-page" style="padding-top: 50px;">
    <div class="container">
        <div class="center">
            <h2>It's very easy to have an account. Register here.</h2>
        </div>
        <div class="row wow fadeInDown">
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="login-form" method="post" action="">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required="required" placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required="required" placeholder="Enter your last name">
                    </div>
                    <div class="form-group">
                        <label>Gender *</label><br/>
                        <label for="male">Male </label>&nbsp;&nbsp;<input type="radio" name="gender" id="male" required="required">&nbsp;&nbsp;
                        <label for="female">Female </label>&nbsp;&nbsp;<input type="radio" name="gender" id="female"required="required">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="get-started center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <h2>Already have an account?</h2>
                <div class="request">
                    <h4><a href="<?php echo base_url() ?>index.php/Auth/login" style="padding: 5px 51px;">Enter Here</a></h4>
                </div>
            </div>
        </div>
    </div><!--/.container-->
</section><!--/#contact-page-->
