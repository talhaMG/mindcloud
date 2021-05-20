<!-- Inner Heading Section Starts Here -->
<? $this->load->view('account/_inner_header'); ?>
	
<? $this->load->view('account/_breadcrumb'); ?>


<!-- Inner Heading Section Ends Here -->
<section class="innerPg">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12">
			<? $this->load->view('_widget-sidebarads'); ?>
			</div>

			<div class="col-md-6 col-sm-12 col-xs-12 userprofileSec">
				
				<h2>Edit Profile</h2>


				<form action="#" method='post' id='forms-update_profile' enctype="multipart/form-data" >

					<input type="hidden" name="user[user_id]" value="<?=$user_data['user_id']?>">

					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12 ">
							<input required name='user[user_firstname]' placeholder="First Name*" type="text" value="<?=$user_data['user_firstname']?>">
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<input required name='user[user_lastname]' placeholder="Last Name*" type="text"  value="<?=$user_data['user_lastname']?>">
						</div>
					</div>


					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input disabled="" name='user[user_email]' placeholder="Email*" type="text"  value="<?=$user_data['user_email']?>">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12 ">
							<input name='user_info[ui_phone]' placeholder="Phone #" type="text"  value="<?=$user_data['ui_phone']?>">
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<input name='user_info[ui_mobile]' placeholder="Mobile #" type="text"  value="<?=$user_data['ui_mobile']?>">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<input type='text' name='user_info[ui_address_primary]' placeholder="Primary Address * " value='<?=$user_data['ui_address_primary']?>'>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<input type='text' name='user_info[ui_address_secondary]' placeholder="Secondary Address" value='<?=$user_data['ui_address_secondary']?>'>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 ">
							<input type='text' name='user_info[ui_state]' placeholder="State" value='<?=$user_data['ui_state']?>'>
						</div>

						<div class="col-md-6 col-sm-12 col-xs-12 ">
							<input name='user_info[ui_city]' placeholder="City *" type="text" value="<?=$user_data['ui_city']?>">
						</div>

						

					</div>

					<div class="row">
						
						<div class="col-md-6 col-sm-6 col-xs-6 ">
							<input type='text' name='user_info[ui_zip]' placeholder="ZIP Code" value='<?=$user_data['ui_zip']?>'>
						</div>
						
						<div class="col-md-6 col-sm-12 col-xs-12">
							<select name='user_info[ui_country_id]' style="border: 1px solid rgb(225, 225, 225); border-radius: 0px; color: rgb(0, 0, 0);">
								<option value="">Select Country * </option>
								<? if(isset($country) AND array_filled($country)) {?>
								<? foreach($country as $id=>$value) {?>
									<? $selected = ($user_data['ui_country_id'] == $id) ? 'selected=""' : ''?>
									<option <?=$selected?> value="<?=$id?>"><?=$value?></option>
								<? } ?>
								<? } ?>
							</select>
						</div>
					</div>
<!-- 
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<textarea id='ui_description' placeholder="Description" name="user_info[ui_description]"><?=$user_data['ui_description']?></textarea>
						</div>
					</div> -->


					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							
							<label class="fileContainer filelabel">
								<img src="<?=get_image($user_data['ui_profile_image'],$user_data['ui_profile_image_path'])?>" class="img-responsive" id='profile-img-tag'  style="display: table;height: 120px;margin: 0 auto;width: 120px;" />
								<input type="file" id='profile-img' name="file" style="display: none">
							</label><br />
							<span style="color:green">Recommendation : 120px x 120px</span>

							<!-- <div class="box">
								<input type="file" name="file" />
							</div> -->
						</div>
					</div>
					<br />
					
					<input type="submit" value="Update Profile" value="Submit" id='update_profile-btn' />
				</form>

			</div>



			<div class="col-md-3 col-sm-12 col-xs-12">
				<? $this->load->view('_widget-accountarea'); ?>
				
				<? $this->load->view('_widget-leaderboard'); ?>
				
			</div>
		</div>
	</div>

</section>