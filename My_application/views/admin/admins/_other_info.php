<?
	//debug($this->form_data['user'] , 1);
?>
<form enctype="multipart/form-data" action="" method="POST" id="user_info-form-id" class="cmxform form-horizontal tasi-form" novalidate="novalidate">
	<div class="form-body">

		<div class="alert alert-danger display-hide">
			<button data-close="alert" class="close"></button>
			You have some form errors. Please check below.
		</div>
		<div class="alert alert-success display-hide">
			<button data-close="alert" class="close"></button>
			Your form validation is successful!
		</div>



	    <input type="hidden" value="<?=$this->form_data['user']['ui_id']?>" name="user_info[ui_id]" id="user_info-ui_id" class=" form-control ">
		<input type="hidden" value="<?=$this->form_data['user']['ui_user_id']?>" name="user_info[ui_user_id]" id="user_info-ui_user_id" class=" form-control ">
		

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> Phone</label>
			<div class="col-md-3">
				<input type="text" value="<?=$this->form_data['user']['ui_phone']?>" name="user_info[ui_phone]" id="user_info-ui_phone" class=" form-control ">
			</div>
		</div>

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> Mobile</label>
			<div class="col-md-3">
				<input type="text" value="<?=$this->form_data['user']['ui_mobile']?>" name="user_info[ui_mobile]" id="user_info-ui_mobile" class=" form-control ">
			</div>
		</div>

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> Website</label>
			<div class="col-md-3">
				<input type="text" value="<?=$this->form_data['user']['ui_website']?>" name="user_info[ui_website]" id="user_info-ui_website" class=" form-control ">
				
			</div>
		</div>


		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> About us</label>
			<div class="col-md-9">
				<textarea name="user_info[ui_description]" rows="3" id="user_info-ui_description" class="form-control "><?=$this->form_data['user']['ui_description']?></textarea>
			</div>
		</div>

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> Primary Address</label>
			<div class="col-md-9">
				<input type="text" value="<?=$this->form_data['user']['ui_address_primary']?>" name="user_info[ui_address_primary]" id="user_info-ui_address_primary" class=" form-control ">
			</div>
		</div>

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> Secondary Address</label>
			<div class="col-md-9">
				<input type="text" value="<?=$this->form_data['user']['ui_address_secondary']?>" name="user_info[ui_address_secondary]" id="user_info-ui_address_secondary" class=" form-control ">
			</div>
		</div>

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> City</label>
			<div class="col-md-3">
				<input type="text" value="<?=$this->form_data['user']['ui_city']?>" name="user_info[ui_city]" id="user_info-ui_city" class=" form-control ">
			</div>
		</div>

		<div class="form-group ">
			<label for="" class="control-label col-md-2 "> Country ID</label>
			<div class="col-md-3">
				<select class="form-control select2me " name="user_info[ui_country_id]">
					<option value="0">Select Country</option>
					<? if(array_filled($this->_list_data['user_country'])) { ?>
					<? foreach($this->_list_data['user_country'] as $id=>$name) { ?>
					<? $seleted = ($id == $this->form_data['user']['ui_country_id']) ? 'selected=""' : ''; ?>
						<option <?=$seleted?> value="<?=$id?>"><?=$name?></option>
					<? } ?>
					<? } ?>
				</select>
			</div>
		</div>

	    <div class="form-group ">
			<label for="" class="control-label col-md-2 ">Image</label>
	      	<div class="col-md-4">
	      		<div class="">
					<div class="uploadfile uploadfile-new" data-provides="uploadfile">
						<div class="uploadfile-new thumbnail" style="max-width: 200px; max-height: 150px;">
							<img src="<?=get_image($this->form_data['user']['ui_profile_image'],$this->form_data['user']['ui_profile_image_path'])?>" alt="" />
						</div>
						<!-- <div class="uploadfile-preview uploadfile-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							123
						</div> -->
						<div>
							<span class="btn btn-file blue">
								<span class="uploadfile-new"><i class="fa fa-paper-clip"></i> Select image</span>
								<span class="uploadfile-exists"><i class="fa fa-undo"></i> Change</span>
								<input type="file" class="default user" name="user_info[ui_profile_image]" />
							</span>
								<a href="#" class="btn btn-danger uploadfile-exists" data-dismiss="uploadfile"><i class="fa fa-trash"></i> Remove</a>
								<p style="color:green">Recommended Image Size : 259px × 160px</p>
						</div>
					</div>
				</div>
	        </div>
	    </div>  
	</div>


	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn green" id='update-user_id' value="Save" name="submit" type="submit">Update Info.</button>
<!-- 				<button class="btn green" value="SaveNEdit" name="submit" type="submit">Save and Continue</button>
				<button class="btn green" value="SaveNNew" name="submit" type="submit">Save and Add New</button>
				<button class="btn default" type="button">Cancel</button> -->
			</div>
		</div>
	</div>

</form>


<script type="text/javascript">
	var $form = $('#user_info-form-id');
	$form.submit(function(event) {

		var data = new FormData(document.getElementById('user_info-form-id'));
        

        jQuery.ajax({
            url: '<?=la('user_info/ajax_save')?>',
            type: "POST",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            dataType: 'json',
            async: false,  
            success: function(response) {
            	$('#update-user_id').html('Update Info.');

            	if(response.status)
            		AdminToastr.success(response.msg ,"Updated", 'toast-bottom-left');
            	else
            		AdminToastr.error(response.msg ,"Updated", 'toast-bottom-left');

                return false;

            },
            complete: function (response) {
            	$('#update-user_id').html('Update Info.');
                //Metronic.unblockUI("body");
                return false;
            },
            beforeSend: function (response) {
                $('#update-user_id').html('Update Info. Loading.....');
                
            },
        });  // JQUERY Native Ajax End

        return false;
	});

</script>