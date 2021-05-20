<?$this->load->view("widgets/inner_banner")?>


<!-- <section class="sign-in-main">
      <div class="body-space">
        <div class="container">
          <div class="row">
            <div class="main-head">
              <h2>Sign Up</h2>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="sign-in-form">
            <div class="col-md-8 col-sm-11 col-xs-12 centerCol">
			
			<form id='forms-signup'>
            <input type="hidden" name="user[user_type]" value='<?=NORMAL_USER?>'>
            <? if(isset($_GET['url'])):?>
            <input type="hidden" name="url" value='<?=$_GET['url']?>'>
            <? endif;?>
			
              <div class="row">
                <div class="col-md-12 col-sm12 col-xs-12">
                  <div class="sign-in-head">

                  <h3><?=$cms_data['cms_page_title']?></h3>
                    <?=html_entity_decode($cms_data['cms_page_content'])?>
                  </div>
                </div>
              </div>
			  
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name='user[user_firstname]' placeholder="First Name">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name='user[user_lastname]' placeholder="Last Name">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row" style=" margin-top: 15px; ">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name='user[user_email]' placeholder="Email Address">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name='user[user_phone]' placeholder="Phone">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" name='user[user_password]' placeholder="password" >
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" name="password"  placeholder="Repeat Password" required="" id="user_confirm_password" >

                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="jobposting-form post-btn">
                    <button id='signup-btn' type="submit" value="SIgnup">register now</button>
                  </div>
                </div>
              </div>
			  </form>
            </div>
          </div>
        </div>
      </div>
    </section> -->
<section class="banner-sec">
  <img src="<?=i('')?>banner-pg.png" alt="">
  <div class="container">
    <div class="row">
      <div class="banner-overlay">
        <h3>Register</h3>
      </div>
    </div>
  </div>
</section>
    <section class="all-section login-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 col-md-offset-1">
        <div class="signinlogin-div signin-area">
          <h2>Sign Up</h2>
          <form>
            <input type="text" name="" placeholder="Email Address">
            <input type="password" name="" placeholder="Password">
            <input type="password" name="" placeholder="Re-enter Password">
            <input type="text" name="" placeholder="First Name">
            <input type="text" name="" placeholder="Last Name">
            <input type="text" name="" placeholder="Localisation">
            <input type="submit" name="" value="SIGN UP">
            <div class="register-check">
              <span><input type="checkbox" name=""> By registering you agree to our <a href="#">Terms of Use</a></span>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="signinlogin-div login-area">
          <h2>Login</h2>
          <form>
            <div class="login-text">
              <i class="fa fa-user" aria-hidden="true"></i>
              <input type="text" name="" placeholder="Email Address">
            </div>
            <div class="login-text">
              <i class="fa fa-lock" aria-hidden="true"></i>
              <input type="password" name="" placeholder="Password">
            </div>
            <input type="submit" name="" value="LOGIN">
            <div class="register-check">
              <a href="#">Forgotten your password?</a>
            </div>
          </form>
        </div>
      </div>
        </div>
      </div>
    </section>

