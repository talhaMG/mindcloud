

 <div class="login-banner">
    <div class="container-fluid pad-zero para w-100">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-wrap">
                    <div  class="w-100">
                    <div class="login-content">
                        <h4>Log in</h4>
                        <div class="space"><br></div>
                        <p>Log in with your data that your entered during your registration</p>
                    </div>
                    <div class="space"><br><br></div>

                    <div class="login-form">
                        <div>
                            <form class="signinform" id="forms-signin">
                            <?php 
                              $redirect_url = isset($_GET['url']) ? $_GET['url'] :  $this->agent->referrer(); 
                            ?> 
                            <input type="hidden" name="url" value='<?=$redirect_url?>'>
                                <div class="fld-login">
                                    <label>Email Address</label>
                                    <input type="text" placeholder="someexample@gmail.com" name="user[user_email]" id="defaultForm-email" required>
                                </div>

                                <div class="fld-login">
                                    <label>Password</label>
                                    <input type="password" name="user[user_password]" id="defaultForm-pass" required>
                                </div>

                                <div class="fld-html row">
                                    <div class="col-md-6">
                                        <label for="checkbox"><input type="checkbox" checked="checked" id="checkbox"> Keep me logged in</label>
                                    </div>
                                    <div class="col-md-6">
                                      <a href="<?=l('forgot-password')?>"><input type="button" value="Forgot password?"></a>
                                    </div>
                                </div>

                                <div class="fld-btn">
                                    <input type="submit" value="Sign In">
                                </div>
                            </form>

                            <div class="for-register">
                                <p>Don't have an account? <a href="<?=l('signup')?>">Register</a></p>
                            </div>
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

  
 