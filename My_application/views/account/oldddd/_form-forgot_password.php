<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="login_wrpr">
            <div class="main-heading main-heading2"><h2>Forgot Password</h2></div>
            <div class="contact-information2">
                <form action="#" class="" id="forms-forgot_password" method="POST">
                    
                    <div class="col-xs-12 col-md-12 padding-zero">
                       <div class="form-group">
                         <input type="email" name='forgot_password[user_email]' required placeholder="Email" />
                       </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-12 padding-zero">
                       <div class="form-group">
                          <input type="submit" class="checkout-button" id='forgot_password-btn' value="Send Email" />
                       </div>
                    </div>
                 </form>

                <div class="col-md-10 col-xs-12 col-sm-6 col-xs-12" style="display: table;margin: 0 auto;float:none;text-align:center">
                    <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1">Haven't got an account yet?</a>| -->
                    <a href="<?=l('registration')?>">Go to Login Page</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>