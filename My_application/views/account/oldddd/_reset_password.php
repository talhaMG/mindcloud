<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="login_wrpr">
            <div class="main-heading main-heading2"><h2>Reset Password</h2></div>
            <div class="contact-information2">
                <form role="form" class="" id='forms-reset_password'>
                  <p>Type your new Password</p>
                  <div class="form-group">
                        <input type="hidden" name="user[user_id]" value="<?=$data['user_id']?>"></input>
                        <input type="password" placeholder="Your password...(Required)" name="user[user_password]" id="ilny-password" class="form-control input-lg">
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <a href="javascript:void(0);" id='reset_password-btn' class="checkout-button" style="margin-bottom: 25px;color:white">Reset Password</a>
                    </div>
                  </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>