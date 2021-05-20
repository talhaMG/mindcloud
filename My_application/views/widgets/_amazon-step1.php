
<div class="col-md-9 col-sm-9 col-xs-12 avail_leftPannel">
<div class="text-center" style="margin: 10px 10px 10px 131px;" id="AmazonPayButton"></div>
</div>

        <script type='text/javascript'>
            window.onAmazonLoginReady = function () {
                try {
                    amazon.Login.setClientId("<?php echo $amazonpay_config['client_id']; ?>");
                    amazon.Login.setUseCookie(true);
                } catch (err) {
                    alert(err);
                }
            };

            window.onAmazonPaymentsReady = function () {
                var authRequest;
                OffAmazonPayments.Button("AmazonPayButton", "<?php echo $amazonpay_config['merchant_id']; ?>", {
                    type: "PwA",       // PwA, Pay, A, LwA, Login
                    color: "DarkGray", // Gold, LightGray, DarkGray
                    size: "medium",    // small, medium, large, x-large
                    language: "en-GB", // for Europe/UK regions only: en-GB, de-DE, fr-FR, it-IT, es-ES
                    authorization: function() {
                        loginOptions = { scope: "profile postal_code payments:widget payments:shipping_address", popup: true };
                        authRequest = amazon.Login.authorize(loginOptions, "<?=l('test/handle_login').'?oid='.$amazon_oid.'&code='.$amazon_code.'&payment-type='.$amazon_payment_type?>");
                    },
                    onError: function(error) {
                        // something bad happened
                    }
                });

                // document.getElementById('Logout').onclick = function() {
                //     amazon.Login.logout();
                //     document.cookie = "amazon_Login_accessToken=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
                //     window.location = '<?=l('test/index')?>';
                // };

            };
        </script>
        <script async="async" type='text/javascript' src="https://static-eu.payments-amazon.com/OffAmazonPayments/gbp/sandbox/lpa/js/Widgets.js"></script>
                 