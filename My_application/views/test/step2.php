<!-- Step2 -->
<style>
.jumbotron.jumbotroncolor
{
  padding:5% 0;

}


</style>


<div class="container">

            <!-- <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand start-over" href="#">Amazon Pay PHP SDK Sample: One-Time Payment Checkout</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="start-over" href="#">Logout and Start Over</a></li>
                        </ul>
                    </div>
                </div>  
            </nav> -->
<br>
            <div class="jumbotron jumbotroncolor" style="padding-top:25px;" id="api-content">
                <div id="section-content">

                    <h2>Select Shipping and Payment Method</h2>
                   

                    <div class="text-center" style="margin-top:40px;">
                        <div id="addressBookWidgetDiv" style="width:400px; height:240px; display:inline-block;"></div>
                        <div id="walletWidgetDiv" style="width:400px; height:240px; display:inline-block;"></div>
                        <div style="clear:both;"></div>

                        <form class="form-horizontal" style="margin-top:40px;" role="form" method="post" action="<?=l('test/ConfirmPaymentAndAuthorize')?>">
                            <!-- custom -->
                            <input type="hidden" name="oid" value="<?=$oid?>">
                            <input type="hidden" name="code" value="<?=$code?>">
                            <input type="hidden" name="payment_type" value="<?=$payment_type?>">
                            <!-- custom -->
                            <button id="place-order" class="btn btn-lg btn-success" style="background:#1d90d9;">Place Order</button>
                            <div id="ajax-loader" style="display:none;"><img src="<?=i('')?>LoaderIcon.gif" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <p>This is the live response from the previous API call.</p> -->
            <!-- <pre id="get_details_response">
                <div class="text-center"><img src="images/ajax-loader.gif" /></div>
            </pre> -->

        </div>


           <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type='text/javascript'>
            window.onAmazonLoginReady = function () {
                try {
                    amazon.Login.setClientId('<?php print $amazonpay_config['client_id']; ?>');
                    amazon.Login.setUseCookie(true);
                } catch (err) {
                    alert(err);
                }
            };

            window.onAmazonPaymentsReady = function () {
                new OffAmazonPayments.Widgets.AddressBook({
                    sellerId: "<?php echo $amazonpay_config['merchant_id']; ?>",
                    onOrderReferenceCreate: function (orderReference) {

                        /* Make a call to the back-end that will SetOrderReferenceDetails
                         * and GetOrderReferenceDetails. This will set the order total
                         * to 19.95 and return order reference details.
                         */

                        var access_token = '<?php print $_GET["access_token"];?>';
                        console.log(access_token);
                        console.log(orderReference.getAmazonOrderReferenceId());
                        $.post("<?=l('test/GetDetails')?>", {
                            orderReferenceId: orderReference.getAmazonOrderReferenceId(),
                            accessToken: access_token,
                            oid: '<?=$oid?>',
                            code: '<?=$code?>',
                            payment_type: '<?=$payment_type?>',
                        }).done(function (data) {
                            try {
                                JSON.parse(data);
                            } catch (err) {
                            }
                            $("#get_details_response").html(data);
                        });
                    },
                    onAddressSelect: function (orderReference) {
                        // If you want to prohibit shipping to certain countries, this is where you would handle that
                    },
                    design: {
                        designMode: 'responsive'
                    },
                    onError: function (error) {
                        // your error handling code
                        alert("AddressBook Widget error: " + error.getErrorCode() + ' - ' + error.getErrorMessage());
                    }
                }).bind("addressBookWidgetDiv");

                new OffAmazonPayments.Widgets.Wallet({
                    sellerId: "<?php echo $amazonpay_config['merchant_id']; ?>",
                    onPaymentSelect: function (orderReference) {
                    },
                    design: {
                        designMode: 'responsive'
                    },
                    onError: function (error) {
                        // your error handling code
                        alert("Wallet Widget error: " + error.getErrorCode() + ' - ' + error.getErrorMessage());
                    }
                }).bind("walletWidgetDiv");

            // walletWidget.setPresentmentCurrency("DKK").bind("walletWidgetDiv");

                $(document).ready(function() {
                    $('.start-over').on('click', function() {
                        amazon.Login.logout();
                        document.cookie = "amazon_Login_accessToken=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
                        window.location = '<?=l('test/index')?>';
                    });
                    $('#place-order').on('click', function() {
                        $(this).hide();
                        $('#ajax-loader').show();
                    });
                });

            };

        </script>
          <script async="async" type='text/javascript' src="https://static-eu.payments-amazon.com/OffAmazonPayments/gbp/sandbox/lpa/js/Widgets.js"></script>
                 