<div class="row">
    <div class="col-md-6">
        <div class="login_wrpr">
            <div class="main-heading main-heading2"><h2>LOGIN</h2></div>
            <div class="contact-information2">
                <form action="#" method='post' id='forms-signin' class="cp-form-box">
                    <?php if(isset($_GET['url'])){?>
                    <input type="hidden" name="url" value="<?=$_GET['url']?>">
                    <?php } ?>
                    <div class="inner-holder">
                        <input type="email" required name="user[user_email]" placeholder="Email"/>
                    </div>
                    <div class="inner-holder">
                        <input type="password" required name="user[user_password]" placeholder="Password"/>
                    </div>
                    <div class="inner-holder">
                        <button class="checkout-button" type="submit" id="signin-btn" style="width:100%;">LOGIN</button>
                    </div>
                </form>

                <div class="col-md-10 col-xs-12 col-sm-6 col-xs-12" style="display: table;margin: 0 auto;float:none;text-align:center">
                    <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1">Haven't got an account yet?</a>| -->
                    <a href="<?=l('registration/forgot_password')?>">Forgot Password</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="login_wrpr">
            <div class="main-heading main-heading2"><h2>NEW USER</h2></div>
            <div class="contact-information2 ">

                <form action="#" method='post' id='forms-signup' class="cp-form-box">
                    <?php if(isset($_GET['url'])){?>
                    <input type="hidden" name="url" value="<?=$_GET['url']?>">
                    <?php } ?>
                    <div class="inner-holder">
                        <input required name='user[user_firstname]' placeholder="First Name*" type="text">
                    </div>
                    <div class="inner-holder">
                        <input required name='user[user_lastname]' placeholder="Last Name*" type="text">
                    </div>
                    <div class="inner-holder">
                        <input required name='user[user_email]' placeholder="Email*" type="email" style="margin-bottom: 0">
                    </div>
                    <div class="inner-holder">
                        <input required name='user[user_password]' id="user_password" placeholder="Enter Password*" type="password">
                    </div>
                    <div class="inner-holder">
                        <input required name='user_confirm_password' data-retype='true' id="user_confirm_password" placeholder="Re-type Password*" type="password">
                    </div>

                    <div class="inner-holder">
                        <label for="term_agreed" class="term_agreed">
                            <input type="checkbox" class="rdi" id="term_agreed" name="user[user_term_agreed]" required="">
                            I agree to the <?=g('site_titile')?> 
                            <a style='color:#337ab7' href="<?=l('terms-and-conditions')?>" target='_blank' >Terms and Conditions</a> and 
                            <a style='color:#337ab7' href="<?=l('privacy-policy')?>" target='_blank' >Privacy Policy</a>
                        </label>
                    </div>
                    <div class="inner-holder">
                        <input type="submit" value="SIGNUP" value="Submit" id='signup-btn' class='checkout-button' style="width:100%;" />
                    </div>
                </form>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>