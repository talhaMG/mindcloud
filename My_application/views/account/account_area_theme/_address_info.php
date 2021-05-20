<style type="text/css">
  select, input{
  margin: 5px 0 5px 0;   
  }
</style>
<form role="form" id='update-address_info-form'>
	<h2>Address Info</h2>
  <input type="hidden" name="user_info[ui_user_id]" value="<?=$user_data['user_id']?>"> 
  <div class="row">
    <div class="col-md-12">
      <input id="paddress" name="user_info[ui_address_primary]" value='<?=$user_data['ui_address_primary']?>' type="text" class="form-control" required placeholder="Primary Address" />
    </div>
  </div>

    <div class="row">
    <div class="col-md-12">
      <input id="saddress" name="user_info[ui_address_secondary]" value='<?=$user_data['ui_address_secondary']?>' type="text" class="form-control" placeholder="Secondary Address" />
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-6">
      <input id="city" name="user_info[ui_city]" value='<?=$user_data['ui_city']?>' type="text" class="form-control" required placeholder="City" />
    </div>
    <div class="col-md-6">
      <input id="city" name="user_info[ui_state]" value='<?=$user_data['ui_state']?>' type="text" class="form-control" required placeholder="State" />
    </div>
    <div class="col-md-6">
      <select name="user_info[ui_country_id]" class="form-control" required>
        <option value="">Select Country</option>
        <? if(isset($country) AND array_filled($country)) { ?>
        <? foreach($country as $id=>$value){
          if($user_data['ui_country_id'] > 0)
            $selected = ($id == $user_data['ui_country_id']) ? 'selected=""' : '';
          else
            $selected = ($id == 223) ? 'selected=""' : '';
          ?>
          <option <?=$selected?> value="<?=$id?>"><?=$value?></option>
          <? } ?>
          <? } ?>
        </select>
      </div>
      <div class="col-md-6">
        <input id="zip" name="user_info[ui_zip]" value='<?=$user_data['ui_zip']?>' type="text" class="form-control" placeholder="Zip Code" />
      </div>

    <? /*
    <div class="col-sm-4 col-xs-12 col-md-4">
      <select name="days" required="">
        <option value="">Select Day</option>
        <?php
        for ($i=1; $i <= 31; $i++) { 
          $selected = (isset($dob['day']) AND ($dob['day'] == $i)) ? 'selected=""' : '';
          echo "<option $selected value='$i'>$i</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-sm-4 col-xs-12 col-md-4">
      <select name="month" required="">
        <option value="">Select Month</option>
        <?php
        for ($i=0; $i < 12; $i++) { 
          $selected = (isset($dob['month']) AND ($dob['month'] == ($i+1))) ? 'selected=""' : '';
          echo "<option $selected value='".($i+1)."'>".date("M",strtotime("17-01-01 +$i months"))."</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-sm-4 col-xs-12 col-md-4">
      <select name="year" required="">
        <option value="">Select Year</option>
        <?php
        for ($i=0; $i <= 50; $i++) { 
          $year = date("Y",strtotime("17-01-01 -$i years"));
          $selected = (isset($dob['year']) AND ($dob['year'] == $year)) ? 'selected=""' : '';
          echo "<option $selected value='".$year."'>".$year."</option>";
        }
        ?>
      </select>
    </div>
	*/
    ?>

  </div>
  <button type="submit" id='update-address_info-btn'>Update Info</button>
</form>