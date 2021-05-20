
    <div class="login-banner">
        <div class="container-fluid pad-zero para w-100">
            <div class="row ">
                <div class="col-lg-6 col-md-12">
                    <div class="login-wrap">
                        <div  class="w-100">
                        <div class="login-content">
                            <h4>Forgot password?</h4>
                            <div class="space"><br></div>
                            <p>Please enter valid email to reset your password</p>
                        </div>
                        <div class="space"><br><br></div>

                        <div class="login-form">
                            <div>
                                <form id="forms-signin">
                                    <?php 
                                        $redirect_url = isset($_GET['url']) ? $_GET['url'] :  $this->agent->referrer(); 
                                    ?> 
                                    <input type="hidden" name="url" value='<?=$redirect_url?>'>
                                    <div class="fld-login"> 
                                        <input type="text" placeholder="someexample@gmail.com" name="forgot_password[user_email]" id="defaultForm-email" required>
                                    </div>
                                    <div class="fld-btn">
                                        <input type="submit" id='forgot_password-btn' value="Reset">
                                    </div>
                                </form>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="login-mdl">
                        <span><img src="<?=i('')?>login.png" alt=""></span>
                        <a href="./" class="white-logo"><img src="<?=i('')?>footer-logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
     </div>   
     </div>
 