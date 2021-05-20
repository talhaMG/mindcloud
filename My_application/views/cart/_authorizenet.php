
	<div class="panel-body">
		<div class="form-group">
			<div class="col-md-12"><strong>Card Holder Name:</strong></div>
				<input type="hidden" name="amount" value="<?=$total_order_amount?>" >
				<input type="hidden" name="order_id" id='order_id' value="<?=$this->input->get('oid')?>" >
			<div class="col-md-12">
				<input type="text" id="card_name" class="" placeholder="Card Holder Name">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<strong>Card Number</strong>
			</div>
			<div class="col-md-12">
				<input type="text" id="card_no" class="" placeholder="Card Number">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<strong>Expiration Date</strong>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select type="text" id="card_expiry_month" class="">
					<option value="0">Select Month</option>
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="" id='card_expiry_year' name="card[card_year]" required>
				<option value="">Year</option>
				<?
				for ($i=0; $i <= 10; $i++) { 
				echo "<option value='".(date('Y')+$i)."'>".(date('Y')+$i)."</option>";
				}
				?>
				</select>
			</div>
		</div>				

		<div class="form-group">
			<div class="col-md-12">
				<span>CV2</span>
			</div>
			<div class="col-md-12">
				<input type="text" id="card_vc2" class="" placeholder="CV2">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<button type="submit" class="btn btn-primary btn-submit-fix" id='payment-btn' onclick="return validateuserdetails()">Process Payment</button>

				<div id='payment-form_loading' style='display: none'>
					<img src="<?=l('assets/global/images/preloader.gif')?>">
				</div>
			</div>
		</div>
	</div>



<span id="resultDisplay"></span>



<script type="text/javascript">

function validateuserdetails(){
  var month = $.trim($('#card_expiry_month').val());
  var year = $.trim($('#card_expiry_year').val());
  var expiry_date = month+"/"+year;
  

  var order_id    = $.trim($('#order_id').val());
  var cardholder_name   = $.trim($('#card_name').val());
  var card_number     = $.trim($('#card_no').val());
  //var expiry_date     = $.trim($('#card_expiry').val());
  var cv2         = $.trim($('#card_vc2').val());
  var street_address    = $.trim($('#card_street').val());
  var state_id      = $.trim($('#state_id').val());
  var zip         = $.trim($('#card_zip').val());
  var country_id      = $.trim($('#card_country').val());
  var errorFlag = 0;
  var monthAndYear = "MM/YYYY";
  
  if(expiry_date.length == 7)
  {
    monthAndYear = expiry_date.split("/");
  }
  
  if(cardholder_name == '' || cardholder_name == 'Cardholder Name' || cardholder_name == 'Enter Card Holder Name')  
  {
    //alert('Enter the Card holder name');
    Toastr.error('Enter Card Holder Name','Error');
    var errorFlag = 1;
    return false;   
  }
  if(cardholder_name.length > 30)
  {
    $('#gc_card_name_message').css('display', 'block');   
    var errorFlag = 1;
    return false;
  }
  else if(card_number == '' || card_number == 'Card Number' || card_number == 'Enter Card Number')
  {
    Toastr.error('Enter Card Number','Error');
    var errorFlag = 1;
    return false;
  }
  else if(Validate(card_number) == false)
  {
    Toastr.error('Enter Valid Card Number','Error');
    var errorFlag = 1;
    return false;
  }
  else if(expiry_date == '' || expiry_date == 'Expiry (MM/YYYY)' || expiry_date == 'Enter Expiry Date')
  {
    Toastr.error('Enter Expiry Date','Error');
    var errorFlag = 1;
    return false;   
  }
  else if(monthAndYear.length != 2)
  {
    Toastr.error('Expiry (MM/YYYY)','Error');
    var errorFlag = 1;
    return false;   
  }
  else if($.isNumeric(monthAndYear[0]) == false || monthAndYear[0].length != 2)
  {
    Toastr.error('Expiry (MM/YYYY)','Error');
    var errorFlag = 1;
    return false;
  }
  else if($.isNumeric(monthAndYear[1]) == false || monthAndYear[1].length != 4)
  {
    Toastr.error('Expiry (MM/YYYY)','Error');
    var errorFlag = 1;
    return false;
  }
  else if(cv2 == '' || cv2 == 'CV2' || cv2 == 'Enter CV2')  
  {
    Toastr.error('Enter CV2','Error');
    var errorFlag = 1;
    return false;
  }
  else if(cv2.length > 10)  
  {
    Toastr.error('Enter valid CV2','Error');
    var errorFlag = 1;
    return false;
  }
  
  if(errorFlag == 0)
  {
		var month = $.trim($('#card_expiry_month').val());
		var year = $.trim($('#card_expiry_year').val());
		var expiry_date = month+"/"+year;

		var order_id    = $.trim($('#order_id').val());
		var cardholder_name   = $.trim($('#card_name').val());
		var card_number     = $.trim($('#card_no').val());

		//var expiry_date     = $.trim($('#card_expiry').val());
		var cv2         = $.trim($('#card_vc2').val());
		var street_address    = $.trim($('#card_street').val());
		var state_id      = $.trim($('#state_id').val());
		var zip         = $.trim($('#card_zip').val());
		var country_id      = $.trim($('#card_country').val());
  
	    $.ajax({
	    type: "POST",
	    url: "<?=l('authorize_net/get_data_authorize')?>",
	    data:  "order_id="+order_id+"&cardholder_name="+cardholder_name+"&card_number="+card_number+"&expiry_date="+expiry_date+"&cv2="+cv2+"&street_address="+street_address+"&state_id="+state_id+"&zip="+zip+"&country_id="+country_id,
	    dataType: "json",
		    success: function(response)
		    {
				$('#payment-btn').show();
				$("#payment-form_loading").hide();
		      	
		      	if(response.status == true)
		      	{
		        	Toastr.success('Thank you! your payment has been charged','Success');  
		        	window.location = response.url;
		      	}
		      	else
		      	{
		        	Toastr.error('Please try again or provide all fields.','Error');
		      	}
		    },    
		    beforeSend: function()
		    {
		    	$('#payment-btn').hide();
		       	$("#payment-form_loading").show();
		    }
    	});
	    return false;   
  	}
  	else
  	{
	    Toastr.error('Please try again or provide all fields.','Error');
	    return false;     
  	}
}


function Validate(Luhn)
{
  var LuhnDigit = parseInt(Luhn.substring(Luhn.length-1,Luhn.length));
  var LuhnLess = Luhn.substring(0,Luhn.length-1);
  if (Calculate(LuhnLess)==parseInt(LuhnDigit))
  {
    return true;
  } 
  return false;
}

function Calculate(Luhn)
 {
    var sum = 0;
    for (i=0; i<Luhn.length; i++ )
    {
    sum += parseInt(Luhn.substring(i,i+1));
    }
  var delta = new Array (0,1,2,3,4,-4,-3,-2,-1,0);
  for (i=Luhn.length-1; i>=0; i-=2 )
    {   
    var deltaIndex = parseInt(Luhn.substring(i,i+1));
    var deltaValue = delta[deltaIndex]; 
    sum += deltaValue;
  } 
  var mod10 = sum % 10;
  mod10 = 10 - mod10; 
  if (mod10==10)
  {   
    mod10=0;
  }
  return mod10;
 }


 function stateselect(ele)
{
  var country_id = $(ele).val();
  var serial     = 'country_id='+country_id;
  var site_url = "<?=g('base_url')?>";

  $.ajax({
  url: site_url+"payment/get_states",
  type:'POST',
  data:serial,
  success: function(result)
  {

    $('#selectboxForState').html(result);

  }
  });

}
</script>