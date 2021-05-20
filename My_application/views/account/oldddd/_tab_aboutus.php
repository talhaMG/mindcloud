<div role="tabpanel" class="tab-pane fade leavereview" id="leavereview">
  <h1>About You</h1>
  <div class="spance20"></div>
  <div class="col-md-8 col-xs-12 col-sm-8 col-md-offset-2">
    <form role="form" class="" id='update-about-form'>
      <div class="row">
        <input type="hidden" name="user_info[ui_user_id]" value="<?=$user_data['user_id']?>"> 
        <div class="col-md-12">
          <input id="website" name="user_info[ui_website]" value='<?=$user_data['ui_website']?>' type="text" class="form-control" placeholder="Your Website Link" />
        </div>
        <div class="col-md-12">
          <textarea id="description" name="user_info[ui_description]" class="form-control" placeholder="Description"><?=$user_data['ui_description']?></textarea>
        </div>
        <div class="col-md-12">
          <div class="addfile">
            <!-- <label class="custom-file-upload" style="margin-top: 5px;">
              <input type="file" name="file" class="inputfile inputfile-1" style='position: absolute; opacity: 0;padding:5px' />
              Choose a profile image 
              </label> -->


              <label class="fileContainer filelabel" style="margin: 10px 0px; border: 1px solid rgb(193, 193, 193);">
                <img src="<?=get_image($user_data['ui_profile_image'],$user_data['ui_profile_image_path'])?>" class="img-responsive" id='profile-img-tag'  style="display: table;height: 120px;margin: 0 auto;width: 120px;" />
                <input type="file" id='profile-img' name="file" style="display: none">
              </label><br />
              <span style="color:green">Recommendation : 120px x 120px</span>

          </div>
        </div>
      </div>
      <input type="submit" value="Update Info" id='update-about-btn'/>
    </form>
  </div>
</div> 