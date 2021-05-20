<style type="text/css">
.shopping .media .thumbnail {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: block;
    height: 100%;
    line-height: 1.42857;
    margin-bottom: 2px;
    padding: 4px;
    transition: border 0.2s ease-in-out 0s;
    width: 87px;
}

.shopping .media-heading {
    color: #12151a;
    font-size: 20px;
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
.afix-1,.afix-1:hover{color:white;}


</style>

<? $this->load->view('_widget-inner_banner',array('is_title'=>$title));?>

<div class="container">
    <div class="checkout-main">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body head paymentForm">

                <? $this->load->view('cart/_steptwo-review',array('is_edit'=>true));?>


                <form action="" method="post" class="form-horizontal "  id='order_data'>
                
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Shipping Address</div>
                            <div class="panel-body">
                                <!-- <div class="form-group">
                                    <div class="col-md-12">
                                        <h4>Shipping Address</h4>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Country:</strong></div>
                                    <div class="col-md-12">
                                       <select required name='shop_order[order_billing_country]' class='order_shipping_country '>
                                            <option value=''>Select Country (Required)</option>
                                            <?php
                                                if(isset($country_list) && count($country_list) > 0)
                                                {
                                                    foreach($country_list as $value)
                                                    {
                                                        if(isset($member_data['ui_country_id']) AND ($member_data['ui_country_id'] > 0)) {
                                                            $selected = ($member_data['ui_country_id'] == $value['id']) ? 'selected=""' : '';
                                                        }
                                                        else {
                                                            $selected = (223 == $value['id']) ? 'selected=""' : '';    
                                                        }
                                                        $select = '';//($value['sb_iso_code'] == $country_code) ? 'selected=""' : '';
                                                        echo '<option '.$selected.' value='.$value['id'].'>'.$value['country'].'</option>';
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>First Name:</strong>
                                        <input type="text" required placeholder="Insert First Name (Required)" name="shop_order[order_billing_fname]" class='order_shipping_fname ' value="<?=isset($member_data['user_firstname']) ? $member_data['user_firstname'] : ''?>">
                                    </div>
                                    <div class="span1"></div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Last Name:</strong>
                                        <input type="text" required placeholder="Insert Last Name (Required)" name="shop_order[order_billing_lname]" class='order_shipping_lname ' value="<?=isset($member_data['user_lastname']) ? $member_data['user_lastname'] : ''?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Address:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" required placeholder="Insert Your Address (Required)" name="shop_order[order_billing_address]" class='order_shipping_address ' value="<?=isset($member_data['ui_address_primary']) ? $member_data['ui_address_primary'] : ''?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>City:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" required placeholder="Insert Your City (Required)" name="shop_order[order_billing_city]" class='order_shipping_city '  value="<?=isset($member_data['ui_city']) ? $member_data['ui_city'] : ''?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>State:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Insert Your State" name="shop_order[order_billing_state]" class='order_shipping_state ' value="<?=isset($member_data['ui_state']) ? $member_data['ui_state'] : ''?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Insert Your Code" name="shop_order[order_billing_zip_code]" class='order_shipping_code' readonly='' value="<?=isset($shipping_zip) ? $shipping_zip : ''?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Phone Number:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Insert Your Phone #" name="shop_order[order_billing_phone]" class=' order_shipping_phone' value="<?=isset($member_data['ui_phone']) ? $member_data['ui_phone'] : ''?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email Address:</strong></div>
                                    <div class="col-md-12">
                                        <input type="email" required placeholder="Insert Your Email (Required)" name="shop_order[order_billing_email]" class='order_shipping_email ' value="<?=isset($member_data['user_email']) ? $member_data['user_email'] : ''?>">
                                    </div>
                                </div>

                                <? if($this->userid == 0) {?>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Password:</strong></div>
                                    <div class="col-md-12">
                                        <input type="password" required placeholder="Insert Your Password (Required)" name="password" class='order_shipping_email '>
                                    </div>
                                </div>
                                <? } ?>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->

                        <button style="width:100%;" id="signin-btn" type="submit" class="checkout-button">Order Place</button>
                    </div>
                </form>


            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
    </div>