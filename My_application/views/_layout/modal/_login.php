
<!-- Modal -->
<div id="loginsec2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
          <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="" id='forms-signin' action="" autocomplete="off" method="POST">
            <?php if(($this->router->fetch_class('') == 'tests') AND ($this->router->fetch_method('') == 'result')) : ?>
            <input type="hidden" name="course_id" value="<?=$this->uri->segment('3')?>">
            <? endif;?>

            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="user[user_email]" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="user[user_password]" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'">
                </div>
              </div>
            </div>


            <div class="form-group">
              <label class="cols-sm-2 control-label" for="remember_password">
                <input type="checkbox" name='remember_password' id='remember_password' value="remember-me">Remember Me
              </label>
            </div>

            <div class="form-group ">
              <a href="#" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Login</a>
            </div>
            
          </form>
        </div>
      </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>