<div role="tabpanel" class="tab-pane fade active in messagebox" id="messagebox">
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in repair" id="repair">
      <h1>Contact Info</h1>
      <h4>Change your contact information</h4>
      <div class="spance20"></div>
      <div class="col-md-8 col-xs-12 col-sm-8 col-md-offset-2">
        <form role="form" class="" id='update-contact_info-form' >
          <input type="hidden" name="user_info[ui_user_id]" value="<?=$user_data['user_id']?>"> 
          <input name="user_info[ui_phone]" value='<?=$user_data['ui_phone']?>' type="tel" placeholder="Phone Number">
          <input name="user_info[ui_mobile]" value='<?=$user_data['ui_mobile']?>' type="tel" placeholder="Mobile Number">
          <input type="submit" value="Update Info"  id='update-contact_info-btn'/>
        </form>
      </div>
    </div> 
  </div>
</div>