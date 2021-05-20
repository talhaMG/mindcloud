<div class="row">
    
    <? if($this->input->get('type') == 'login') :?>
    <div class="col-md-6 col-md-offset-3 text-center">
        <div class="login">
            <div class="login-form-container">
                <div class="login-text">
                    <h2>login</h2>
                    <span>Please login using account detail bellow.</span>
                </div>
                <div class="login-form">
                    <form action="#" method='post' id='forms-signin'>
                        <?php if(isset($_GET['url'])){?>
                        <input type="hidden" name="url" value="<?=$_GET['url']?>">
                        <?php } ?>
                        <input type="email" required name="user[user_email]" placeholder="Email"/>
                        <input type="password" required name="user[user_password]" placeholder="Password"/>
                        <div class="button-box">
                            <div class="login-toggle-btn">
                                <input id="remember" type="checkbox">
                                <label for="remember">Remember me</label>
                                <a href="<?=l('registration/forgot_password')?>">Forgot Password</a>
                            </div>

                            <button type="submit" class="default-btn" id='signin-btn'>Login</button>
                            <a href="<?=l('registration?type=signup')?>" class="default-btn1">Are you a new user?</a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php elseif ($this->input->get('type') == 'signup') :?>
    <div class="col-md-6 col-md-offset-3 text-center">
        <div class="login">
            <div class="login-form-container">
                <div class="login-text">
                    <h2>New Signup</h2>
                    <!-- <span>Please login using account detail bellow.</span> -->
                </div>
                <div class="login-form">
                    <form action="#" method='post' id='forms-signup'>
                        <?php if(isset($_GET['url'])){?>
                        <input type="hidden" name="url" value="<?=$_GET['url']?>">
                        <?php } ?>
                        <input required name='user[user_firstname]' placeholder="First Name*" type="text">
                        <input required name='user[user_lastname]' placeholder="Last Name*" type="text">
                        <input required name='user[user_email]' placeholder="Email*" type="email">
                        <input required name='user[user_password]' id="user_password" placeholder="Enter Password*" type="password">
                        <input required name='user_confirm_password' data-retype='true' id="user_confirm_password" placeholder="Re-type Password*" type="password">

                        <div class="inner-holder">
                            <label for="term_agreed" class="term_agreed">
                                <input type="checkbox" class="rdi" id="term_agreed" name="user[user_term_agreed]" required="">
                                I agree to the <?=g('site_titile')?> 
                                <a style='color:#EC1C23' href="<?=l('terms-and-conditions')?>" target='_blank' >Terms and Conditions</a> and 
                                <a style='color:#EC1C23' href="<?=l('privacy-policy')?>" target='_blank' >Privacy Policy</a>
                            </label>
                        </div>

                        <div class="button-box">
                            <button type="submit" class="default-btn" id='signup-btn'>Sign-Up</button>
                            <a href="<?=l('registration?type=login')?>" class="default-btn1">Already User?</a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <? endif;?>
</div>