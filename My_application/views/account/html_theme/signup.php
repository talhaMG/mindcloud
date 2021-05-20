

  <div class="login-banner">
      <div class="container-fluid pad-zero para w-100">
          <div class="row">
              <div class="col-lg-6 col-md-12">
                  <div class="login-wrap">
                      <div class="w-100">
                      <div class="login-content">
                          <h4>Create an account</h4>
                          <div class="space"><br></div>
                          <p>Please enter your valid data to sign up.</p>
                      </div>
                      <div class="space"><br><br></div>

                      <div class="login-form signup-form">
                          <div>
                              <form id="forms-signup">
                                  <input type="hidden" name="user[user_type]" value='<?=NORMAL_USER?>'>
                                  <? if(isset($_GET['url'])):?>
                                    <input type="hidden" name="url" value='<?=$_GET['url']?>'>
                                  <? endif;?>
                                  <div class="fld-login">
                                      <label>Full Name</label>
                                      <input type="text" placeholder="Full Name" name='user[user_firstname]' required>
                                  </div>

                                  <div class="fld-login">
                                      <label>Email Address</label>
                                      <input type="email" placeholder="someexample@gmail.com" name='user[user_email]' required>
                                  </div>

                                  <div class="fld-login">
                                      <label>Password</label>
                                      <input type="password" type="password" name='user[user_password]' id="user_password" required>
                                  </div>

                                  <div class="fld-html row">
                                      <div class="col-md-12">
                                          <label for="checkbox"><input type="checkbox" id="checkbox" required> Terms And Conditions & Privacy Policy</label>
                                      </div>
                                  </div>

                                  <div class="fld-btn">
                                      <input type="submit" value="Register">
                                  </div>
                              </form>

                              <div class="for-register">
                                  <p>Already have an account? <a href="<?=l('login')?>">Sign In</a></p>
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

