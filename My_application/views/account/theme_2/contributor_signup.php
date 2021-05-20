
<section class="innerBanner">

  <div class="container">

    <div class="container">

      <h2> <?=$title?> </h2>

    </div>

  </div>

</section>



<section class="login fomrz">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">

        <form id='forms-signup'>
          <input type="hidden" name="user[user_type]" value='<?=CONTRIBUTOR_USER?>'>
          <? if(isset($_GET['url'])):?>
          <input type="hidden" name="url" value='<?=$_GET['url']?>'>
          <? endif;?>
          
          <div class="form_body">
            <div class="socialArea">
              <h3> <?=$title?> </h3>
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
</section>


