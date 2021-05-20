<div role="tabpanel" class="tab-pane fade accountdetails" id="accountdetails">
  <h1>Password Change</h1>
  <h4>Change your Password</h4>
  <div class="spance20"></div>
  <div class="col-md-8 col-xs-12 col-sm-8  col-md-offset-2">
    <form role="form" class="" id='update-change_password-form'>
      <input type="hidden" name="user[user_id]" value="<?=$user_data['user_id']?>"> 
      <input id="paddress" name="current_password"  type="password" class="form-control" required placeholder="Current Pasword" />
      <input id="user_password" name="new_password"  type="password" class="form-control" required placeholder="New Password" />
      <input id="user_confirm_password" name="repeat_password"  type="password" class="form-control" required value="Retype Password"/>
      <input type="submit" value="Update Info" id='update-change_password-btn'/>
    </form>
  </div>
</div>