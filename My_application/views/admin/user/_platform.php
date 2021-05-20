<?php
	//debug($this->_layout_data['user_platform'] , 1);
?>
<div class="form-body">
        
<div class="alert alert-danger display-hide">
  <button class="close" data-close="alert"></button>
  You have some form errors. Please check below.
</div>
<div class="alert alert-success display-hide">
  <button class="close" data-close="alert"></button>
  Your form validation is successful!
</div>

<input type = "hidden" value="<?=$form_data['user']['user_id']?>" name = "user_item_set[pis_user_id]" />

	<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
		<div class="tools">
		<i class="fa fa-cogs"></i> Request Platform
		</div>
		</div>
	</div>
	<div class="table-scrollable item_set">
		<table class="table table-striped table-hover">
			<thead>
    		<?
    		$columns = array("S/No.","Platform Name","Status","action");
        	foreach ($columns as $col) {?>
	            <th>
					<?=label_encode($col)?>
	            </th>
        	<?}?>
			</thead>
			<tbody class="data-holder">
    		<?
    		//$columns = array(/*"color",*/"size",$qty_price,"action");
    		if(array_filled($this->_layout_data['platform']))
    		{
    			$i=1;
	        	foreach ($this->_layout_data['platform'] as $pid=>$pv) {

	        		$view = false;
	        		$btn_class= 'insertthis';
	        		$btn_name= 'Insert';
	        		$up_id = 0;
	        		$up_status = 1;//$col['up_status'];
	        		$user_id = $form_data['user']['user_id'];
	        		$platform_id = $pid;


	        		//debug($this->_layout_data['user_platform'] , 1);

	        		if(isset($this->_layout_data['user_platform']) && array_filled($this->_layout_data['user_platform']))
	        		{
	        			foreach($this->_layout_data['user_platform'] as $val)
	        			{
	        				if($val['up_platform_id'] == $pid)
	        				{
	        					$view = true;
	        					$up_id = $val['up_id'];
	        					$up_status = $val['up_status'];
	        					$btn_class= 'updatethis';
	        					$btn_name= 'Update';
	        				}
	        			}
	        		}


	        		if($view)
	        		{
	        		?>
		        		<tr  class="item_set template">
				            <td class="form-group"><?=$i?>-</td>
				            <td class="form-group"><strong><?=ucfirst($pv)?> Platform</strong></td>
				            <td class="form-group">
				            	<?//=$col['up_status']?>
				            	<input type="hidden" name="up_id" id="up_id_<?=$i?>" value='<?=empty($up_id) ? 0 : $up_id?>'>
				            	<input type="hidden" name="user_id" id="user_id_<?=$i?>" value='<?=empty($user_id) ? 0 : $user_id?>'>
				            	<input type="hidden" name="platform_id" id="platform_id<?=$i?>" value='<?=empty($platform_id) ? 0 : $platform_id?>'>

				            	<select id='up_status_<?=$i?>' name="user[user_status]" class=' form-control '>
				            		<option value="0" <?=((empty($up_status)) OR ($up_status == 0)) ? 'selected=""' : ''?> >Not-approve</option>
				            		<option value="1" <?=(($up_status == 1)) ? 'selected=""' : ''?> >Approve</option>
				            	</select>


				            	

				            </td>
				            <td class="form-group">
				            	<button type="button" name="submit" value="Save" data-index='<?=$i?>' class="btn green <?=$btn_class?>"><?=$btn_name?></button>
				            </td>
						</tr>
	        		<?php
	        		}
	        		$i++;
	        	}
	        }
	        ?>
			</tbody>
        </table>
    </div>
    </div>





	<div class="portlet box red" style="margin-top: 25px;">
	<div class="portlet-title">
		<div class="caption">
		<div class="tools">
		<i class="fa fa-cogs"></i> Others Platform
		</div>
		</div>
	</div>
	<div class="table-scrollable item_set">
		<table class="table table-striped table-hover">
			<thead>
    		<?
    		$columns = array("S/No.","Platform Name","Status","action");
        	foreach ($columns as $col) {?>
	            <th>
					<?=label_encode($col)?>
	            </th>
        	<?}?>
			</thead>
			<tbody class="data-holder">
    		<?
    		//$columns = array(/*"color",*/"size",$qty_price,"action");
    		if(array_filled($this->_layout_data['platform']))
    		{
    			$z=1;
	        	foreach ($this->_layout_data['platform'] as $pid=>$pv) {

	        		$view = true;
	        		$btn_class= 'insertthis';
	        		$btn_name= 'Insert';
	        		$up_id = 0;
	        		$up_status = 1;//$col['up_status'];
	        		$user_id = $form_data['user']['user_id'];
	        		$platform_id = $pid;


	        		//debug($this->_layout_data['user_platform'] , 1);

	        		if(isset($this->_layout_data['user_platform']) && array_filled($this->_layout_data['user_platform']))
	        		{
	        			foreach($this->_layout_data['user_platform'] as $val)
	        			{
	        				if($val['up_platform_id'] == $pid)
	        				{
	        					$view = false;
	        					$up_id = $val['up_id'];
	        					$up_status = $val['up_status'];
	        					$btn_class= 'updatethis';
	        					$btn_name= 'Update';
	        				}
	        			}
	        		}


	        		if($view)
	        		{
	        		?>
		        		<tr  class="item_set template">
				            <td class="form-group"><?=$z?>-</td>
				            <td class="form-group"><strong><?=ucfirst($pv)?> Platform</strong></td>
				            <td class="form-group">
				            	<?//=$col['up_status']?>
				            	<input type="hidden" name="up_id" id="up_id_<?=$i?>" value='<?=empty($up_id) ? 0 : $up_id?>'>
				            	<input type="hidden" name="user_id" id="user_id_<?=$i?>" value='<?=empty($user_id) ? 0 : $user_id?>'>
				            	<input type="hidden" name="platform_id" id="platform_id<?=$i?>" value='<?=empty($platform_id) ? 0 : $platform_id?>'>

				            	<select id='up_status_<?=$i?>' name="user[user_status]" class=' form-control '>
				            		<option value="0" <?=((empty($up_status)) OR ($up_status == 0)) ? 'selected=""' : ''?> >Not-approve</option>
				            		<option value="1" <?=(($up_status == 1)) ? 'selected=""' : ''?> >Approve</option>
				            	</select>


				            	

				            </td>
				            <td class="form-group">
				            	<button type="button" name="submit" value="Save" data-index='<?=$i?>' class="btn green <?=$btn_class?>"><?=$btn_name?></button>
				            </td>
						</tr>
	        		<?php
	        			$z++;
	        		}
	        		$i++;
	        	}
	        }
	        ?>
			</tbody>
        </table>
    </div>
    </div>




<script type="text/javascript">
	$(".updatethis").click(function(){
		var data_index = $(this).attr('data-index');
		
		var upid = $("#up_id_"+data_index).val();
		var status = $("#up_status_"+data_index).val();

		var url = "<?=la('user/update_merchant_status')?>";
		var data = "up_id="+upid+"&up_status="+status;

		response = AjaxRequest.fire(url, data);  

		if(response.status)
			AdminToastr.success("Update Status" ,"Updated", 'toast-bottom-left');
		else
			AdminToastr.error("Error found" ,"Error !", 'toast-bottom-left');
	});

	$(".insertthis").click(function(){
		var data_index = $(this).attr('data-index');
		
		var user_id = $("#user_id_"+data_index).val();
		var platform_id = $("#platform_id"+data_index).val();
		var status = $("#up_status_"+data_index).val();

		var url = "<?=la('user/insert_merchant_platform')?>";
		var data = "user_id="+user_id+"&platform_id="+platform_id+"&up_status="+status;

		response = AjaxRequest.fire(url, data);  

		if(response.status) {
			AdminToastr.success("New platform are added" ,"Added", 'toast-bottom-left');

			window.location.href = "<?=la('user/add/')?>"+user_id+"#tab_1";
			//location.reload();
		}
		else {
			AdminToastr.error("Error found" ,"Error !", 'toast-bottom-left');
		}

	});
</script>