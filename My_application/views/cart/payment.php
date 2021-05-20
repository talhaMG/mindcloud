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
    font-size: 14px;
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
                
                <? $this->load->view('cart/_payment-review',array('is_edit'=>false));?>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <div class="panel panel-info paymentForm" > 
                        <div class="panel-heading">
                            <div>
                                <span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment
                            </div>
                        </div>

                        <? $this->load->view('cart/_paypal');?>
                        
                    </div>
                </div>

            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
    </div>




