<form class="form-horizontal" id='paypal-form' action="<?=l('paypal/paynow')?>">

<input type="hidden" name="amount" value="<?=$total_amount?>" >
<input type="hidden" name="order_id" value="<?=$this->input->get('oid')?>" >

<!--CREDIT CART PAYMENT-->
<!-- <div><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div> -->
<div class="panel-body">
<div class="form-group">
<div class="col-md-12"><strong>Card Type:</strong></div>
<div class="col-md-12">
<select id="CreditCardType" required name="card[cardtype]" class="form-control">
<option value="">Select Card</option>
<option value="visa">Visa</option>
<option value="mastercard">MasterCard</option>
<option value="amex">American Express</option>
<option value="jcb">JCB</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-md-12">
<strong>Your Name</strong>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<input type="text" required class="form-control" name="card[card_fname]" placeholder="First Name">
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<input type="text" required class="form-control" name="card[card_lname]" placeholder="Last Name">
</div>
</div>


<div class="form-group">
<div class="col-md-12"><strong>Credit Card Number:</strong></div>
<div class="col-md-12"><input type="text" required class="form-control" name="card[card_no]" placeholder='Credit Card Number' value=""></div>
</div>
<div class="form-group">
<div class="col-md-12"><strong>Card CVV:</strong></div>
<div class="col-md-12"><input type="text" required class="form-control" name="card[card_cvv]" placeholder='Card CVV' value=""></div>
</div>
<div class="form-group">
<div class="col-md-12">
<strong>Expiration Date</strong>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<select class="form-control" name="card[card_expiry]" required>
<option value=''>Month *(Required)</option>
<option value='1'>January</option>
<option value='2'>February</option>
<option value='3'>March</option>
<option value='4'>April</option>
<option value='5'>May</option>
<option value='6'>June</option>
<option value='7'>July</option>
<option value='8'>August</option>
<option value='9'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<select class="form-control" name="card[card_year]" required>
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
<span>Pay secure using your credit card.</span>
</div>
<div class="col-md-12">
<ul class="cards">
<li class="visa hand"><a href="#"><img src="<?=l('assets/global/images/')?>visa.png"></a></li>
<li class="mastercard hand"><a href="#"><img src="<?=l('assets/global/images/')?>master-card.png"></a></li>
<li class="amex hand"><a href="#"><img src="<?=l('assets/global/images/')?>american-ex.png"></a></li>
</ul>
<div class="clearfix"></div>
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-sm-6 col-xs-12">
<button type="submit" id='payment-btn' class="btn btn-primary btn-submit-fix">Process Payment</button>

<div id='payment-form_loading' style='display: none'>
<img src="<?=l('assets/global/images/preloader.gif')?>">
</div>
</div>
</div>
</form>

</div>
</div>
<!--CREDIT CART PAYMENT END-->
</div>





<script type="text/javascript">
$(function() {
    var $form = $('#paypal-form');
    $form.submit(function(event) {
      
      
      // Disable the submit button to prevent repeated clicks:
      $form.find('#payment-btn').prop('disabled', true);
      
      $("#payment-form_loading").show();
      $form.find('#payment-btn').hide();
      var form = $(this).closest('form');
      var url = form.attr('action');
      var data = form.serialize();

      /* NEW SCRIPT START*/
      jQuery.ajax({
        type: "post",
        url: url,
        data: data,
        dataType: "json",
        success: function(s)
        {
          if(s.status)
          {
            console.log(s.status);
            $("#payment-form_loading").hide();
            $form.find('#payment-btn').show();
            $form.find('#payment-btn').prop('disabled', false);

            $form[0].reset();
            window.location.href = "<?=l('cart/success')?>?oid="+s.id;
          }
          else
          {
            Toastr.error(s.desc);
            $form.find('#payment-btn').show();
            $("#payment-form_loading").hide();
            $form.find('#payment-btn').prop('disabled', false);
            window.location.href = "<?=l('cart/error')?>?oid="+s.id;
          }          
        },
        beforeSend: function(msg)
        {
            $form.find('#payment-btn').hide();
            $("#payment-form_loading").show();
            $form.find('#payment-btn').prop('disabled', true);
            
        }
      });     
      return false;
    });
});
</script>