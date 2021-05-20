<style type="text/css">
  .aboutForm label {
    font-weight: 400;
    color: #193256;
    padding: 3px;
    text-align: left;
    display: block;
}
</style>
<div class="aboutForm">
  <div class="col-md-8 col-xs-12 col-sm-8 center">
    <!-- <form id='update-change_password-form'>
      <h2>Password Change</h2>
      <p>Change your password</p>
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-3 no-margin">
          <label>Current Password</label>
        </div>
        <div class="col-md-9 col-xs-12 col-sm-9 no-margin">
          <input type="password" name="current_password" placeholder="Enter Here" class="form-control">
        </div>  
      </div>
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-3 no-margin">
          <label>New Passoword</label>
        </div>
        <div class="col-md-9 col-xs-12 col-sm-9 no-margin">
          <input type="password" name="new_password" placeholder="Enter Here" class="form-control">
        </div>
      </div>
      <div class="row">
        
      <div class="col-md-3 col-xs-12 col-sm-3 no-margin">
        <label>Retype Password</label>
      </div>
      <div class="col-md-9 col-xs-12 col-sm-9 no-margin">
        <input type="password" name="repeat_password" placeholder="Enter Here" class="form-control">
      </div>

      </div>

      <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-9 no-margin">
          <button type="submit" id='update-change_password-btn'>Save</button>
        </div>  
      </div>
      
    </form> -->
    <form id='update-change_password-form'>
      <h2>Password Change</h2>
      <p>Change your password</p>
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-3 no-margin">
          <label>Current Password</label>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-9 no-margin password_row">
          <input type="password" name="current_password" placeholder="Enter Here" class="form-control" id="current">
          <a href="javascript:void(0)" id="show" class="pass_eye">
            <i class="fa fa-eye-slash" id="eye"></i>
            <i class="fa fa-eye" style="display: none" id="close"></i>
          </a>
        </div>  
      </div>
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-3 no-margin">
          <label>New Password</label>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-9 no-margin password_row">
          <input type="password" name="new_password" placeholder="Enter Here" class="form-control">
        </div>
      </div>
      <div class="row">
        
      <div class="col-md-3 col-xs-12 col-sm-3 no-margin">
        <label>Retype Password</label>
      </div>
      <div class="col-md-7 col-xs-12 col-sm-9 no-margin password_row">
        <input type="password" name="repeat_password" placeholder="Enter Here" class="form-control">
      </div>

      </div>

      <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-9 no-margin">
          <button type="submit" id='update-change_password-btn'>Save</button>
        </div>  
      </div>
      
    </form>
  </div>
</div>