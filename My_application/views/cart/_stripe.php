    <script type="text/javascript" src="http://js.stripe.com/v2/"></script>

<div class="col-md-9 col-sm-9 col-xs-12 avail_leftPannel">
                
                <div class="secHead">
                    <h1>Pay Now</h1>
                    <!-- <p>Fill the form to list your Coupon now!</p> -->
                </div>
                <div id="error-message"></div>
            <!-- <form id="frmStripePayment" action="<?=l('membership/save_payment')?>" method="post"> -->
                 
                   <div class="field-row">
                    <label>Card Holder Name</label> <span
                        id="card-holder-name-info" class="info"></span><br>
                    <input type="text" id="name" name="name" class="form-control" >
                </div>
                <div class="field-row">
                    <label>Email</label> <span id="email-info"
                        class="info"></span><br> <input type="text"
                        id="email" name="email" class="form-control">
                </div>
                <div class="field-row">
                    <label>Card Number</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="text" id="card-number" name="card-number"
                        class="form-control">
                </div>
                <div class="field-row">
                    <div class="contact-row column-right">
                        <label>Expiry Month / Year</label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="month" id="month" class="form-control" >
                        <?php 
                        for ($i=1; $i <13 ; $i++) { ?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <?}
                         ?>
                        </select>
                        <?
                         $currentyear=date('Y');
                        ?>
                         <select name="year" id="year"
                            class="form-control" >
                            <option value="<?=$currentyear?>"><?=$currentyear?></option>
                        <?php 
                        for ($i= 1; $i < 10 ; $i++) { 
                            $year = $currentyear + $i;
                            ?>
                            <option value="<?=$year?>"><?=$year?></option>
                        <?}
                         ?>
                           
                        </select>
                    </div>
                    <div class="contact-row cvv-box">
                        <label>CVC</label> <span id="cvv-info"
                            class="info"></span><br> <input type="text"
                            name="cvc" id="cvc"
                            class="form-control cvv-input">
                    </div>
                </div>
                <div>
                

                    <div id="loader" style="display: none;">
                        <img alt="loader" src="<?=i('')?>LoaderIcon.gif">
                    </div>
                </div>
                <input type='hidden' name='amount' value='<?=$stripe_order_amount?>'> 
                <input type='hidden' name='currency_code' value='USD'> 
                <input type='hidden' name='item_name' value='<?=$order_product?>'>
                <input type='hidden' name='item_number' value='<?=$order_id?>'>
                <!-- <input type='hidden' name='item_number' value='45632'> -->

                    <input type="submit" name="pay_now" value="Submit"
                        id="submit-btn" class="btnAction"
                        onClick="stripePay(event);">
             <!-- </form> -->
            </div>

            
<!-- Avail Now Sec End -->

    <script>
function cardValidation () {
    var valid = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide();

    if (name.trim() == "") {
        valid = false;
    }
    if (email.trim() == "") {
           valid = false;
    }
    if (cardNumber.trim() == "") {
           valid = false;
    }

    if (month.trim() == "") {
            valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        // $("#error-message").html("All Fields are required").show();
        $("#error-message").html("<div class='alert alert-danger' aria-label='close'>All Fields are required</div>").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        
        console.log(response.error);

        //display the errors on the form
        // $("#error-message").html(response.error.message).show();
        $("#error-message").html("<div class='alert alert-danger' aria-label='close'>"+response.error.message+"</div>").show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        
        
        //submit from callback
        return false;
    }
}
</script>