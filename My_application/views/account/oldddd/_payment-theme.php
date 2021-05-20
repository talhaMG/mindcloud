<style type="text/css">
.shopping .media .thumbnail {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: block;
    height: 60px;
    line-height: 1.42857;
    margin-bottom: 2px;
    padding: 4px;
    transition: border 0.2s ease-in-out 0s;
    width: 50px;
}

.shopping .media-heading {
    color: #12151a;
    font-size: 11px;
    letter-spacing: 1px;
    margin: 10px 2px 0 8px;
    text-transform: none;
}

.checkout-button {
    background-color: #323232;
    border: 2px solid transparent;
    color: #fff;
    display: inline-block;
    font-size: 15px;
    font-weight: 600;
    padding: 8px 25px !important;
    transition: all 0.4s ease-in-out 0s;
}

.cards{
    margin: 0;
    padding: 0;
}
.cards .hand {
    float: left;
    list-style: outside none none;
    margin-right: 5px;
    margin-top: 5px;
}

.panel-info > .panel-heading {
    background-color: rgb(255, 27, 0) !important;
    border-color: rgb(255, 27, 0) !important;
    color: white !important;
}
.panel-info {
    border-color: rgb(255, 27, 0) !important;
}

</style>


<? $this->load->view('_widget-inner_banner',array('is_title'=>$title));?>


<!-- Shopping Cart Section Starts Here -->
    <div class="container">
    <div class="checkout-main">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <!-- <div>
                        <span class="step step_complete m-left-17" > <a href="#" class="check-bc">Shopping Cart</a> <span class="step_line step_complete">&nbsp;</span> <span class="step_line backline">&nbsp;</span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line ">&nbsp;</span> <span class="step_line step_complete">&nbsp;</span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div> -->
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info paymentForm" > 
                        <div class="panel-heading">
                            <div>
                                <span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment
                            </div>
                        </div>

                        <form id="payment" action="<?=$paypal_gateway_url?>" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="business" value="<?=$paypal_email?>">
                            <input type="hidden" name="currency_code" value="USD">

                            <input type="hidden" name="item_name_1" value="<?=ucfirst("Online Quiz Renew")?>">
                            <input type="hidden" name="amount_1" value="<?=$total_amount?>">
                            <input type="hidden" name="quantity_1" value="1">
                            

                            <input name="paymentaction" value="sale" type="hidden">
                            <!-- <input type="hidden" name="shipping_1" value="0">-->
                            <input name="discount_amount_1" value="<?=$discount_amount?>" type="hidden"> 

                            <input type="hidden" value="<?=$custom?>" name="custom" id="paypal_custom">
                            <input type="hidden" value="<?=$success_url;?>" name="return" id="paypal_return">
                            <input type="hidden" value="<?=$notify_url;?>" name="notify_url" id="paypal_notify_url">
                            <input type="hidden" value="<?=$cancel_url;?>" name="cancel_return" id="paypal_cancel_return">

                            <input type="image" src="<?=l('assets/global/images/')?>paypal.png" name="submit" style="display: table;margin:25px auto;width: 50%" title='Pay Now'>

                        </form>

                        <? //$this->load->view('cart/_paypal');?>
                        <? //$this->load->view('cart/_authorizenet');?>


                    </div>
                </div>

            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
    </div>




