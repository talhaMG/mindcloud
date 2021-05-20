<!-- 
<section class="innerBanner">

  <div class="container">

    <div class="container">

      <h2> <?=$title?> </h2>

    </div>

  </div>

</section> -->


<!-- <section class="login fomrz">
  <div class="container"> 
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
       
 
      
      <div class="form_body">
        <div class="socialArea">
          <h3> Login </h3>
        </div>
        <div class="sign-in-sec">
        <form id="forms-signin">
          <? if(isset($_GET['url'])):?>
          <input type="hidden" name="url" value='<?=$_GET['url']?>'>
          <? endif;?>
          
          <div class="md-form mb-5">
            <input type="email" required name="user[user_email]" id="defaultForm-email" class="form-control validate" placeholder="Email">
          </div>
          <div class="md-form mb-4">
            <input type="password" required name="user[user_password]" id="defaultForm-pass" class="form-control validate" placeholder="Password">
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 remember">
            
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 forgotPass text-right "> 
            <a href="<?=l('forgot-password')?>">Forgot password?</a></div>
          </div>
          <div class="buttonssubmit">
            <button id='signin-btn' type="submit" value="Login" class="sign-btn submit">LOGIN</button>
          </div>
        </form>
        </div>


        
     </div>

      </div>
    </div>

  </div>
</section> -->
<?$this->load->view("widgets/inner_banner")?>

<section class="inner-page login-register">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-5 col-xs-12">
      <form id="forms-signin">

      <? if(isset($_GET['url'])):?>
          <input type="hidden" name="url" value='<?=$_GET['url']?>'>
          <? endif;?>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="main-hd"> sign In </h1>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <!-- <input type="text" name="name" class="form-control" id="first-name" placeholder="Your Email" required=""> -->
          <input type="email" required name="user[user_email]" id="defaultForm-email" class="form-control validate" placeholder="Your Email">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <!-- <input type="text" name="name" class="form-control" id="first-name" placeholder="Your Password" required=""> -->
            <input type="password" required name="user[user_password]" id="defaultForm-pass" class="form-control validate" placeholder="Password">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- <div class="checkbox">
              <label>
                <input type="checkbox" value="">
                Remember me </label>
              </div> -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="checkbox text-right">
                <label>
                  <a href="<?=l('forgot-password')?>">Forgot Password ?</a> </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="actions">
                  <!-- <a href="member-portal.html" class="submit-btn">login</a> -->
                   <button id='signin-btn' type="submit" value="Login" class="sign-btn submit-btn">LOGIN</button>
                </div>
              </div>
            </div>
</form>
          </div>
          <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12">
          <form id='forms-signup'>
               <input type="hidden" name="user[user_type]" value='<?=NORMAL_USER?>'>
            <? if(isset($_GET['url'])):?>
            <input type="hidden" name="url" value='<?=$_GET['url']?>'>
            <? endif;?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="main-hd"> create an account </h1>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <!-- <input type="text" name="name" class="form-control" id="first-name" placeholder="Your Name" required=""> -->
                <input type="text" name='user[user_firstname]' required class="form-control validate" placeholder="First Name">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <!-- <input type="text" name="name" class="form-control" id="first-name" placeholder="Company Name" required=""> -->
                 <input type="text" name='user[user_lastname]' required class="form-control validate" placeholder="Last Name">
                
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <!-- <input type="text" name="name" class="form-control" id="first-name" placeholder="Your Email" required=""> -->
                <input type="email" name='user[user_email]' required class="form-control validate" placeholder="Your Email">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <!-- <input type="text" name="name" class="form-control" id="first-name" placeholder="Password" required=""> -->
          <input type="password" name='user[user_password]' required min="8"  class="form-control validate" placeholder="Password" id="user_password" >
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
        <input type="password" name="password" class="form-control" placeholder="Repeat Password" required="" id="user_confirm_password" >
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="actions">
                  <!-- <a href="" class="submit-btn">create</a> -->
                <button class="sign-btn submit" id='signup-btn' type="submit" value="SIgnup">create</button>
                </div>
              </div>
            </div>
      
      </form>
          </div>
        </div>
      </div>
    </section>