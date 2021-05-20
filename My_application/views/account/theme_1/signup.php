<?$this->load->view("widgets/inner_banner")?>



<!-- <section class="">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 center-col">
          <div class="sign-in-sec">
          <form id='forms-signup'>
            <input type="hidden" name="user[user_type]" value='<?=NORMAL_USER?>'>
            <? if(isset($_GET['url'])):?>
            <input type="hidden" name="url" value='<?=$_GET['url']?>'>
            <? endif;?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>First Name</label>
                <input type="text" name='user[user_firstname]' required class="form-control validate" placeholder="First Name">

                <label>Last Name</label>
                 <input type="text" name='user[user_lastname]' required class="form-control validate" placeholder="Last Name">

                  <label>Email</label>
                  <input type="email" name='user[user_email]' required class="form-control validate" placeholder="Enter your email">

                <label>Password</label>
                <input type="password" name='user[user_password]' required min="8" id="defaultForm-pass" class="form-control validate" placeholder="Password">


              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="signCheckBox">
                  
                     <div class="form-group">
                      <input type="checkbox" id="html">
                      <label for="html">Remember Me</label>
                    </div> 
                  
                </div>
                
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <button class="sign-btn submit" id='signup-btn' type="submit" value="SIgnup">Log In</button>
                            </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section> -->



<!-- <section class="login fomrz">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">

        <form id='forms-signup'>
          <input type="hidden" name="user[user_type]" value='<?=NORMAL_USER?>'>
          <? if(isset($_GET['url'])):?>
          <input type="hidden" name="url" value='<?=$_GET['url']?>'>
          <? endif;?>
          
          <div class="form_body">
            <div class="socialArea">
              <h3> Create a New Account </h3>
            </div>
            <div class="md-form mb-5">
              <input type="text" name='user[user_firstname]' required class="form-control validate" placeholder="First Name">
            </div>
            <div class="md-form mb-5">
              <input type="text" name='user[user_lastname]' required class="form-control validate" placeholder="Last Name">
            </div>
            <div class="md-form mb-5">
              <input type="email" name='user[user_email]' required class="form-control validate" placeholder="Enter your email">
            </div>
            <div class="md-form mb-4">
              <input type="password" name='user[user_password]' required min="8" id="defaultForm-pass" class="form-control validate" placeholder="Password">
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 remember">
                <input id='ccc' type="checkbox" value="1" required name="user[user_term_agreed]">
                <label for='ccc'>
                  <span class="termsArea">By signing up you agree to our
                    <a href="<?=l('terms-and-conditions')?>">Terms of Use</a> and 
                    <a href="<?=l('privacy-policy')?>">Privacy Policy</a>
                  </span>
                </label>
              </div>
            </div>
            <div class="buttonssubmit">
              <input id='signup-btn' type="submit" value="SIgnup" class="submit">
            </div>
            <hr>
            <span class="dontHave">Already have an account? <a href="<?=l('login')?>" class="cre" > Login </a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> -->

<section class="sign-in-main">
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
              <div class="row">
                <div class="col-md-12 col-sm12 col-xs-12">
                  <div class="sign-in-head">
                    <h3>Don't have an Account? Register Now</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" placeholder="Login">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" placeholder="Email Address">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" placeholder="Username">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" placeholder="Phone">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" placeholder="password">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" placeholder="Re - Password">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="jobposting-form post-btn">
                    <button>register now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

