<script src="https://www.paypalobjects.com/api/checkout.js"></script>

   <!--CREDIT CART PAYMENT-->
                    <div class="">
                        <h2 class="main-head">
                        	<span><i class=" fa fa-paypal"></i></span> Secure Payment
                        </h2>
                        <div class="panel-body">

                        <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
<script>
    $(document).ready(function(){

      // var getAmount = $("#getAmount").val();

      var getAmount = '<?=$total_amount?>';
        paypal.Button.render({

            env: '<?=PAYPAL_ENVIRONMENT?>', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                   // sandbox:  
                <?=PAYPAL_ENVIRONMENT?>: '<?=PAYPAL_CLIENTID?>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: getAmount, currency: 'USD' } //ISO currency code
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    // window.alert('Payment Complete!');
                    Toastr.success('Thank you! your payment has been made.','Payment Success');

                    var EXECUTE_URL = '<?=$notify_url?>';
                    var params = {
                     payment_status:'Completed',
                     custom:'<?=$order_id?>',
                     paymentID: data.paymentID,
                     payerID: data.payerID
                    };

                    if(paypal.request.post(EXECUTE_URL, params)){
                     if(params.payment_status=='Completed'){
                      setInterval(function(){ 
                         window.location = '<?=$success_url?>'
                      }, 2000); 
                      
                     } else {
                      Toastr.success('Error','Payment Failed');
                     }
                    }

                }).catch(function (error) {
                // alert(error);
                   Toastr.error(error,'Payment Failed');
                });
            }

        }, '#paypal-button-container');
});
    </script>