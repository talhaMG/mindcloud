<div role="tabpanel" class="tab-pane fade customerservice" id="customerservice">
  <h1>Security Setting</h1>
  <h4>Change your Setting</h4>
  <div class="spance20"></div>

  <div class="table-responsive">
    <table class="table">
      <tbody>
        <? /*
        <tr>
          <th scope="row" width="25%">Deactivate Your Account:</th>
          <td width="50%">
            Deactivating your account will disable your profile and remove your name and photo from most 
            things you've shared on <?=g('site_title')?>.
          </td>
          <td width="25%">
            <div class="advisorAccountareabtn">
              <a href="javascript:void(0);" class="btn btn-primary btn-primary security_action" data-status="2" data-user_id='<?=$user_data['user_id']?>'>Deactivate</a>
            </div>
          </td>
        </tr>
        */
        ?>

        <tr>
          <th scope="row" width="25%">Close Your Account:</th>
          <td width="65%">
            Close your account will delete your profile and remove your name and photo from most 
            things you've shared on <?=g('site_title')?>.
          </td>
          <td width="15%">
            <div class="advisorAccountareabtn">
              <a href="javascript:void(0);" class="btn btn-primary btn-primary security_action" data-status="3" data-user_id='<?=$user_data['user_id']?>'>Delete</a>
            </div>
          </td>
        </tr>
      </tbody>

    </table>
  </div>

  <div class="table-responsive">
    <h4>User Login History</h4>
    <table class="table">
      <tr>
        <th width="10%">S.No</th>
        <th>Date</th> 
        <th>Time</th>
      </tr>
      <?php
      if(isset($user_login_hisotry) AND array_filled($user_login_hisotry))
      {
      $i=1;
      foreach($user_login_hisotry as $value)
      {
      ?>
      <tr>
        <td><?=$i?></td>
        <td><?=date("Y-m-d",strtotime($value['ulh_createdon']))?></td>
        <td><?=date("h:i A",strtotime($value['ulh_createdon']))?></td>
      </tr>
      <?php
      $i++;
      }
      }
      ?>

    </table>
  </div>
</div>