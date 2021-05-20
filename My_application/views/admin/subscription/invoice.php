<style type="text/css">
    /***
Invoice page
***/
.invoice {padding:12px;}
.invoice table {
margin: 30px 0 30px 0;
}
.invoice .product_img_thumb{max-height: 40px;}
.invoice .invoice-logo {
margin-bottom: 20px;
}
.invoice .invoice-logo p {
padding: 5px 0;
font-size: 26px;
line-height: 28px;
text-align: right;
}
.invoice .invoice-logo p span {
display: block;
font-size: 14px;
}
.invoice .invoice-logo-space {
margin-bottom: 15px;
}
.invoice .invoice-payment strong {
margin-right: 5px;
}
.invoice .invoice-block {
text-align: right;
}
.invoice .invoice-block .amounts {
margin-top: 20px;
font-size: 14px;
}
</style>
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN VALIDATION STATES-->
      <div class="tabbable tabbable-custom boxless tabbable-reversed">
        <ul class="nav nav-tabs">
              <li class="active">
                <a data-toggle="tab" href="#tab_0">Details</a>
              </li>
          </ul>

          <div class="tab-content">
            <div id="tab_0" class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-shopping-cart"></i>
                                <strong>
                                #
                                <?=order_no($id)?>
                                </strong>
                                <small> / <?=date('d-m-Y' , strtotime($data['subscription_createdon']))?></small>
                            </div>
                            <div class="tools">
                                <!-- <a class="collapse" href="javascript:;"></a>
                                <a class="reload" href="javascript:;"></a> -->
                            </div>
                        </div>

                        <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                            <div class="invoice">
                                <div class="row invoice-logo">
                                    <div class="col-xs-6 invoice-logo-space">
                                        
                                <img src="<?=get_image($logo['logo_image'] , $logo['logo_image_path'])?>" class="img-responsive" alt="" style="max-height: 150px">
                                    </div>
                                    <div class="col-xs-6">
                                    <p>
                                        # <?=order_no($id)?> <span class="muted">
                                        On: <?=date('d-m-Y' , strtotime($data['subscription_createdon']))?>  </span>
                                    </p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                
                                <?php
                                if($data['subscription_is_sandbox'] == 1)
                                {
                                ?>
                                    <div class="col-xs-12" style="background-color: red;color:#fff;text-align: center;font-size:16px;">
                                        Dummy transaction
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- <div class="col-xs-4">
                                    <h3>Shipping Info:</h3>
                                    <ul class="list-unstyled">
                                        <li><strong><?=$data['subscription_shipping_name']?></strong></li>
                                        <li> <strong>Address </strong> : <?=$data['subscription_shipping_address']?> </li>
                                        <li>
                                            <strong>City</strong> : <?=$data['subscription_shipping_city']?>
                                            <?php
                                                $param['where'] = array('id'=>$data['subscription_shipping_country']);
                                                $country_name = $this->model_country->find_all($param);
                                            ?>
                                            <strong>Country</strong> : <?=$country_name[0]['country']?>
                                        </li>
                                        <li> <strong>Email</strong> : <?=$data['subscription_shipping_email']?></li>
                                        <li><strong> Phone </strong> : <?=$data['subscription_shipping_phone']?></li>
                                        <li><strong> Order Note </strong> : <?=$data['subscription_shipping_subscription_description']?></li>
                                        <li><strong> Paypal Invoice Id </strong> : <?=$data['   subscription_paypal_txn_id']?></li>
                                    </ul>
                                </div> -->

                                <div class="col-xs-6">
                                    <h3>Billing Info:</h3>
                                    <ul class="list-unstyled">
                                        <li><strong><?=$user_name.' '.$user_lastname?></strong></li>
                                        <!-- <li> <strong>Address </strong> : <?=$data['subscription_billing_address']?> </li> -->
                                        <li>
                                            <strong>City</strong> : <?=$user_city?> 
                                            
                                            <strong>Country</strong> : <?=$user_country?>
                                        </li>
                                        <li> <strong>Email</strong> : <?=$user_email?> </li>
                                        <li><strong>Phone</strong> : <?=$user_phone?> </li>
                                       
           
                                        
                                    </ul>
                                </div>
                                <!-- <div class="col-xs-4"></div> -->
                                <div class="col-xs-6">
                                    <h3>Invoice Details</h3>
                                        <ul class="list-unstyled">
                                        <li><strong>Invoice Amount </strong> : <?=price($total_amount)?></li>
                                        <li><strong> Invoice Payment Method </strong> : <?=humanize($data['subscription_payment_type'])?></li>
                                        <?
                                        /* 
                                            <li><strong> Shipping Method </strong> : <?=strip_tags($fields['subscription_shipping_type']['list_data'][$data['subscription_shipping_type']])?></li>
                                        */
                                        ?>
                                        <li><strong> Payment Status </strong> :
                                        
                                        <?=$this->model_subscription->get_payment_status($data['subscription_payment_status'])?>
                                        </li>

                                        <li>

                                        <?php if (!empty($data['subscription_paypal_ipn_track_id'])): ?>
                                            <li><strong> Paypal Invoice Id </strong> : <?=$data['subscription_paypal_ipn_track_id']?></li> 
                                        <?php endif ?>
                                        
                                        <li><strong> Paypal TXN Id </strong> : <?=$data['subscription_payment_txn_id']?></li>
                                        <? /*
                                        <li>
                                            <strong> Invoice Status </strong> : 
                                            <?php
                                            if(isset($subscription_status) && array_filled($subscription_status)) {
                                            ?>
                                                <select class="" id="subscription_delivery_status" style="width:200px;" data-order-id='<?=$id?>'>
                                                    <?php
                                                    foreach($subscription_status as $key=>$value) {
                                                        $selected = ($key == $data['subscription_delivery_status']) ? 'selected=""' : '';
                                                    ?>
                                                        <option <?=$selected?> value="<?=$key?>"><?=$value?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        */
                                        ?>
                                    </ul>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                <h1>PURCHASED PACKAGE DETAILS</h1>
                                <li> Package : <?=$data['subscription_package_name']?></li>
                                <li> Purchase : <?=csl_date($data['subscription_package_start'] , 'F d, Y')?></li>
                                <li> Expire on : <?=csl_date($data['subscription_package_expire'] , 'F d, Y')?></li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8 invoice-block">
                                    <ul class="list-unstyled amounts">
                                        <?php
                                        if($billing_amount > 0)
                                        {
                                        ?>
                                            <li><strong style="color:#333">Total </strong> : <?=price($billing_amount)?> </li>
                                        <?php
                                        }
                                        if($data['subscription_shipping_amount'] > 0)
                                        {
                                        ?>
                                            <li><strong style="color:#333">Add : Shipping Charges</strong> : <?=price($data['subscription_shipping_amount'])?> </li>
                                        <?php
                                        }
                                        if($data['subscription_tax_amount'] > 0)
                                        {
                                        ?>
                                            <li><strong style="color:#333">Add : Tax </strong> : <?=price($data['subscription_tax_amount'])?> </li>
                                        <?php
                                        }
                                        if($data['subscription_discount_amount'] > 0)
                                        {
                                        ?>
                                            <li>
                                            <strong style="color:#333">Less : Discount 
                                            (
                                                <?php
                                                if(isset($coupon_data) && array_filled($coupon_data))
                                                {
                                                    echo $coupon_data['coupon_code'] . '->';
                                                    echo $this->model_coupon->get_discount_type($coupon_data['coupon_rate'], $coupon_data['coupon_type']);
                                                }
                                                ?>
                                            )

                                            </strong> : <?=price($data['subscription_discount_amount'])?> </li>
                                        <?php
                                        }
                                        ?>
                                        <li><strong style="color:#333">Total Invoice Amount</strong> : <?=price($total_amount)?> </li>
                                    </ul>
                                    <br>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#subscription_delivery_status').change(function(){
            var subscription_id = $(this).attr('data-order-id');
            var subscription_delivery_status = $(this).val();
            ajax_subscription_delivery_status(subscription_id , subscription_delivery_status);
        });


        function ajax_subscription_delivery_status(subscription_id , subscription_delivery_status)
        {
            $.ajax({
                type: "POST",
                url: "<?=la('shop_order/subscription_delivery_status_change')?>",
                data:  "subscription_id="+subscription_id+'&subscription_delivery_status='+subscription_delivery_status,
                dataType: "html",

                success: function(msg)
                {
                    if(msg == true)
                        AdminToastr.success('Order status changed');
                    else
                        AdminToastr.warning('Error found please try again');
                },
                beforeSend: function()
                {
                    //show_preload();
                }
            });
            return false;
        }
    });
</script>