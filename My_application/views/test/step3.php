

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

            <div class="jumbotron jumbotroncolor" style="padding-top:25px;" id="api-content">
                <div id="section-content">
                
                <h2>Processing Payment.....</h2>
                <img src="<?=i('')?>LoaderIcon.gif" />
                <!-- <p>
                    At this point we will make the <em>Confirm</em> API call to confirm the order
                    reference and a subsequent <em>Authorize</em> and <em>Capture</em> API call.
                    If you used a test account associated with your email address you should receive an email.
                </p> -->

                </div>
            </div>

            <!-- <div class="jumbotron jumbotroncodecolor" style="padding-top:25px;" id="api-calls">
                <h3>Confirm Response</h3>
                <p>The <em>Confirm</em> API call does not return any special values. If it were unsuccessful you would see an error response.</p>
                <pre id="confirm"><code class="json"></code></pre>

                <h3>Authorize Response</h3>
                <div id="result"></div>
                <pre id="authorize"><div class="text-center"></div></pre>


                <p>
                    The <em>Authorize</em> API call will authorize the order reference. Instead
                    of making a separate <em>Capture</em> API call we can set the <strong>capture_now</strong>
                    parameter to <strong>true</strong> and the funds will be captured in the same call.
                </p>

            </div> -->
        
        </div>


        <script type='text/javascript'>
            window.onAmazonPaymentsReady = function () {

                $(document).ready(function() {
                    $('.start-over').on('click', function() {
                        amazon.Login.logout();
                        document.cookie = "amazon_Login_accessToken=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
                        // window.location = '<?=l('test/index')?>';
                    });
                });
            };

            var authorizeResponse;
            var confirmResponse;
            $.post("<?=l('test/ConfirmAndAuthorize')?>", {
                oid:'<?=$oid?>',
                code:'<?=$code?>',
                payment_type:'downpayment'
            }).done(function(data) {
                try {
                    
                    var obj = jQuery.parseJSON(data);
                    //alert(data);

                    console.log(obj);
           
                  //  return false;

                    if (obj.status == 1) {
   window.location = "<?=l('cart/success'.'?oid='.$oid.'&code='.$code.'&payment_type='.$payment_type)?>";
                    }else{
 //window.location = "<?=l('cart/error'.'?oid='.$oid.'&code='.$code.'&payment_type='.$payment_type)?>";

 window.location = "<?=l('cart/success'.'?oid='.$oid.'&code='.$code.'&payment_type='.$payment_type)?>";

                    }

                    $.each(obj, function(key, value) {
                        if (key == 'confirm') {
                            confirmResponse = value;
                            var str = JSON.stringify(value, null, 2);
                            $("#confirm").html(str);
                          
                        } else if (key == 'authorize') {
                            authorizeResponse = value;
                            var str = JSON.stringify(value, null, 2);
                            $("#authorize").html(str);
                           
                        }
                    });

                    // Normally, you would do these decline checks on the back-end instead of in the browser

                    // if (confirmResponse) {
                    //     if (confirmResponse.Error) {
                    //         $("#result").html("<font color='red'><strong>Confirm API call failed (see reason above)</strong></font>");
                    //     }
                    // }

                    // if (authorizeResponse) {
                    //     if (authorizeResponse.AuthorizeResult.AuthorizationDetails.AuthorizationStatus.State === "Declined") {
                    //         $("#result").html("<font color='red'><strong>The authorization was Declined with Reason Code "
                    //             + authorizeResponse.AuthorizeResult.AuthorizationDetails.AuthorizationStatus.ReasonCode + "</strong></font>");
                    //     }
                    // }

                } catch (err) {
                    $("#confirm").html(data);
                    console.log(data);
                    console.log(err);
                }

            });
        </script>

    <script async="async" type='text/javascript' src="https://static-eu.payments-amazon.com/OffAmazonPayments/gbp/sandbox/lpa/js/Widgets.js"></script>
                 