<div class="aboutForm">

  <div class="col-md-8 col-xs-12 col-sm-8 center">
    <form id='update-contact_info-form'>
      <input type="hidden" name="user[user_id]" value="<?=$this->userid?>">
      <h2>  Personal Info </h2>
      <p>Change your contact information</p>
      <div class="row"> 
        <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>First Name * </label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-4 no-margin">
          <input type="text" class="form-control" value="<?=$user_data['user_firstname']?>" required name='user[user_firstname]'  placeholder="Enter Here">
        </div>
        </div>
      
      <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>Last Name * </label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-4 no-margin">
          <input type="text" class="form-control" value="<?=$user_data['user_lastname']?>"  required name='user[user_lastname]' placeholder="Enter Here">
        </div>
      </div>

      <div class="row"> 
        <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>Phone *</label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-4 no-margin">
          <input type="text" class="form-control" value="<?=$user_data['ui_phone']?>"  required name='user_info[ui_phone]' placeholder="Phone Number">
        </div>
      </div>

     <!-- <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>Mobile *</label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-4 no-margin">
          <input type="text" class="form-control" value="<?=$user_data['ui_phone']?>"  required name='user_info[ui_mobile]' placeholder="Phone Number">
        </div>
      </div> -->



      <div class="row"> 
        <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>Email *</label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-10 no-margin">
          <input type="email"  value="<?=$user_data['user_email']?>"  required name='user[user_email]'  placeholder="Email" class="form-control">
        </div>
      </div>


      <div class="row"> 
        <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>Profession *</label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-10 no-margin">
          <input type="text"  value="<?=$user_data['ui_profession']?>"  required name='user_info[ui_profession]'  placeholder="Profession" class="form-control">
        </div>
      </div>

      <div class="row"> 
        <div class="col-md-3 col-xs-12 col-sm-2 no-margin">
          <label>Profession License Number *</label>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-10 no-margin">
          <input type="text"  value="<?=$user_data['ui_profession_license']?>"  required name='user_info[ui_profession_license]'  placeholder="Profession" class="form-control">
        </div>
      </div>      
            
            <div class="row"> 
            <div class="col-md-10 col-md-offset-4 col-xs-12 col-sm-2 no-margin">
            <button id='update-contact_info-btn' type="submit">Update Info</button>
            </div>
            </div>

    </form>
  </div>
</div>