<style type="text/css">
    .panel-title a{
        color: #fff;
        font-weight: 400;
    }
</style>
                    <!-- <div class="panel panel-info paymentForm" >  -->
                        <!-- <div class="panel-heading">
                            <div>
                                <span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment
                            </div>
                        </div> -->


                        

                        <form id="payment" action="<?=$paypal_gateway_url?>" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="business" value="<?=$paypal_email?>">
                            <input type="hidden" name="currency_code" value="USD">

                            <?php 
                            if(isset($data['items']) AND array_filled($data['items'])) :
                                $i=1;
                                foreach($data['items'] as $value) : ?>
                            <input type="hidden" name="item_name_<?=$i?>" value="<?=ucfirst($value['item_product_name'])?>">
                            <input type="hidden" name="amount_<?=$i?>" value="<?=($value['item_rate'])?>">
                            <input type="hidden" name="quantity_<?=$i?>" value="<?=$value['item_qty']?>">
                            <? 
                                $i++;
                                endforeach;
                            endif;
                            ?>

                            <input name="paymentaction" value="sale" type="hidden">
                            <!-- <input type="hidden" name="shipping_1" value="0">-->
                            <input name="discount_amount_1" value="<?=$discount_amount?>" type="hidden"> 

                            <input type="hidden" value="<?=$custom?>" name="custom" id="paypal_custom">
                            <input type="hidden" value="<?=$success_url;?>" name="return" id="paypal_return">
                            <input type="hidden" value="<?=$notify_url;?>" name="notify_url" id="paypal_notify_url">
                            <input type="hidden" value="<?=$cancel_url;?>" name="cancel_return" id="paypal_cancel_return">

                        <!--     <input type="image" src="<?=l('assets/global/images/')?>paypal.png" name="submit" style="display: table;margin:25px auto;width: 50%" title='Pay Now'> -->
    <input type="image" src="<?=l('assets/global/images/')?>paypal.png"  style="display: table;margin:25px auto;width: 50%" title='Pay Now'>
                        </form>

                        <? //$this->load->view('cart/_paypal');?>
                        <? //$this->load->view('cart/_authorizenet');?>


                    <!-- </div> -->
                