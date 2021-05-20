<?global $config;?>


<div class="limiter">
    <div class="container-login100" style="background-image: url('<?php   echo g('base_url'); ?>assets/admin/img/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="<?=$config['base_url']?>admin/login/" method="post">

          <span class="login100-form-logo">
            <i class="zmdi zmdi-account"></i>
          </span>

          <span class="login100-form-title p-b-34 p-t-27">
            Log in
          </span>
          <h3 class="form-title" style="color:#CB5702;">
    </h3>
    <!-- <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>
      Enter any username and password. </span>
    </div> -->
    <?if(isset($error)){?>
      <div class="alert alert-danger">
          <button class="close" data-close="alert"></button>
          <span>
            <?echo $error;?> 
          </span>
      </div>
    <?}?>
            <input type="hidden" value="<?=(isset($_GET['redirect_url']))?$_GET['redirect_url']:''?>" name="redirect_url" />
          <div class="wrap-input100 validate-input" data-validate = "Enter Email">
            <input class="input100" type="email" name="user_email" placeholder="Email" autocomplete="off">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="user_password" placeholder="Password" autocomplete="off">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <!-- <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div> -->

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>

          <!-- <div class="text-center p-t-90">
            <a class="txt1" href="#">
              Forgot Password?
            </a>
          </div> -->
        </form>
      </div>
    </div>
  </div>



<!-- BEGIN LOGIN -->
