

<div class="checkoutMain cart_content_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="chk-left">
          <form id='order_data'>
            <div class="col-md-12">
              <div class="panel-group" id="accordion">


                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <!-- <a data-parent="#accordion" data-toggle="collapse" href="#collapseOne" aria-expanded="false" class="collapsed">Personal Information</a> -->
                      <a data-parent="#accordion" data-toggle="collapse" href="#collapseOne" aria-expanded="true" class="">Personal Information</a>
                    </h4>
                  </div>
                  <!-- <div class="panel-collapse collapse" id="collapseOne" aria-expanded="false" style="height: 0px;"> -->
                    <div class="panel-collapse collapse in" id="collapseOne" aria-expanded="true" style="">
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="order-guest">
                              <?php if ($this->userid < 1): ?>
                                <li><!-- <input type="checkbox" name="is_guest" checked="" value="1"> -->Order as a guest</li>
                                <li>|</li>
                                <li><a href="" data-toggle="modal" data-target="#myModal1" >Sign in as Retailer</a></li>
                                <li>|</li>
                                <li><a href="" data-toggle="modal" data-target="#myModal3" >Sign in as Whole Saler</a></li>
                              <?php endif ?>


                            </ul>
                          </div>
                        </div>
                        <div class="col-md-8 col-md-offset-1">
                          <div class="form-fields digi-form">
                            <div class="row">
                              <?php if ($this->userid < 1): ?>
                                <div class="col-md-3 col-sm-3">
                                  <div align="right" class="form-group">
                                    <label for="tags">Social title</label>
                                  </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <div class="checkout-form-list">
                                    <div class="form-group radio-green">
                                      <input id="radio1" name="user_info[ui_gender]" type="radio" value="male"> <label for="radio1">Mr.</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <div class="checkout-form-list">
                                    <div class="form-group radio-green">
                                      <input id="radio2" name="user_info[ui_gender]" type="radio" value="female"> <label for="radio2">Mrs.</label>
                                    </div>
                                  </div>
                                </div>
                              <?php endif ?>
                              <div class="clearfix"></div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3">
                                  <div align="right" class="form-group">
                                    <label for="tags">First Name * </label>
                                  </div>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                  <div class="form-group">                                    
                                    <input type="text"  placeholder="Insert First Name (Required)" name="shop_order[order_billing_fname]" class='form-control order_shipping_fname ' value="<?=isset($member_data['user_firstname']) ? $member_data['user_firstname'] : ''?>" id="order_billing_fname">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3">
                                  <div align="right" class="form-group">
                                    <label for="tags">Last Name *</label>
                                  </div>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                  <div class="form-group">
                                    <input type="text"  placeholder="Insert Last Name (Required)" name="shop_order[order_billing_lname]" class='order_shipping_lname form-control' value="<?=isset($member_data['user_lastname']) ? $member_data['user_lastname'] : ''?>" id="order_billing_lname">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3">
                                  <div align="right" class="form-group">
                                    <label for="tags">Email</label>
                                  </div>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                  <div class="form-group">
                                   <input type="email"  placeholder="Insert Your Email (Required)" name="shop_order[order_billing_email]" class='order_shipping_email form-control' value="<?=isset($member_data['user_email']) ? $member_data['user_email'] : ''?>">

                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <?php if ($this->userid < 1): ?>
                        <div class="row">

                          <div class="col-md-12">
                            <p class="creat-account">Create an account (optional)<br>
                            And save time on your next order!</p>
                          </div>
                        </div>
                        <div class="col-md-8 col-md-offset-1 col-sm-10" >
                          <div class="row">
                            <div class="col-md-3 col-sm-3">
                              <div align="right" class="form-group">
                                <label for="tags">Password</label>
                              </div>
                            </div>
                            <div class="col-md-9 col-sm-9">
                              <div class="form-group">
                                <input class="form-control" id="password" type="password" name="password">
                              </div>
                              <a class="btn show" href="javascript:void(0)" id="show_password">Show</a>
                              <a class="btn show" href="javascript:void(0)" id="hide_password" style="display: none !important;">Hide</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                          <p class="opt">Optional</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-8 col-md-offset-1 col-sm-10">
                          <div class="row">
                            <div class="col-md-3 col-sm-3">
                              <div align="right" class="form-group">
                                <label for="tags">Birthdate</label>
                              </div>
                            </div>
                            <div class="col-md-9 col-sm-9">
                              <!-- <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd"> -->
                                <input class="form-control" size="16" type="date" value="" name="user_info[ui_dob]"> <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icons_calendar"></span></span> -->
                                <!-- </div> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 col-sm-2">
                            <p class="opt">Optional</p>
                          </div>

                        <?php endif ?>                          
                        <div class="clearfix"></div><br>
                        <div class="row">
                          <div class="col-md-9 col-md-offset-3 s-left">

                           <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</p>
                              <!-- <div class="checkbox">
                                <input id="checkbox2" type="checkbox" name="shop_order[order_newsletter]" value="1"> <label for="checkbox2">Sign up for our newsletter</label>
                               
                              </div> -->
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3 s-left"></div>
                          </div><br>
                          <br>
                          <!-- <div class="col-md-12">
                            <a class="btn show" href="#">Continue</a>
                          </div> -->
                        </div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" class="collapsed" aria-expanded="false">Billing Address</a></h4>
                      </div>
                      <input type="hidden" name="shop_order[order_amount]" value="<?=$total_order_amount?>">

                      <div class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                          <div class="check-form">
                            <div class="row">
                              <div class="inline">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="tags">Address</label> 
                                    <!-- <input class="form-control" id="tags" type="text"> -->
                                    <input type="text" placeholder="Insert Your Address (Required)" name="shop_order[order_billing_address]" class='form-control order_billing_address' value="<?=isset($member_data['ui_address_primary']) ? $member_data['ui_address_primary'] : ''?>" id="order_billing_address">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="inline">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="tags">Town/City</label> 
                                    <input type="text" placeholder="Insert Your City (Required)" name="shop_order[order_billing_city]" class='form-control order_billing_city'  value="<?=isset($member_data['ui_city']) ? $member_data['ui_city'] : ''?>" id="order_billing_city">
                                    <!-- <input class="form-control" id="tags" type="text"> -->
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="tags">State</label> 
                                    <!-- <input class="form-control" id="tags" type="text"> -->
                                    <input type="text" placeholder="Insert Your State (Required)" name="shop_order[order_billing_state]" class='order_billing_state form-control ' value="<?=isset($member_data['ui_state']) ? $member_data['ui_state'] : ''?>" id="order_billing_state">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="tags">Zip Code</label>
                                    <!-- <input class="form-control" id="tags" type="text"> -->
                                    <input type="text" placeholder="Insert Zip or Postal Code (Required)" name="shop_order[order_billing_zip_code]" class='order_billing_code form-control'  value="<?=isset($member_data['ui_zip']) ? $member_data['ui_zip'] : ''?>" id="order_billing_code">
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="inline">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="tags">Country</label>
                                    <!-- <input class="form-control" id="tags" type="text"> -->
                                    <select  name='shop_order[order_billing_country]'  class="form-control order_billing_country" id="order_billing_country">
                                      <option value=''>Select Country (Required)</option>
                                      <?php
                                      if(isset($country_list) && count($country_list) > 0)
                                      {
                                        foreach($country_list as $value)
                                        {
                                          if(isset($member_data['ui_country_id']) AND ($member_data['ui_country_id'] > 0)) {
                                                            // $selected = ($member_data['ui_country_id'] == $value['id']) ? 'selected=""' : '';
                                          }
                                          else {
                                                            // $selected = (223 == $value['id']) ? 'selected=""' : '';    
                                          }
                                                        $select = '';//($value['sb_iso_code'] == $country_code) ? 'selected=""' : '';
                                                        echo '<option '.$selected.' value='.$value['id'].'>'.$value['country'].'</option>';
                                                      }
                                                    }
                                                    ?>
                                                  </select>
                                                </div>
                                              </div>

                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" href="#collapsethree" class="collapsed" aria-expanded="false"> Shipping Information</a></h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapsethree" aria-expanded="false" style="height: 0px;">
                                      <div class="panel-body check-form">
                                        <div class="row">
                                          <div class="inline">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="tags">Address</label> 
                                                <!-- <input class="form-control" id="tags" type="text"> -->
                                                <input type="text" class="form-control order_shipping_address" placeholder="Street Address" name="shop_order[order_shipping_address]" value="" id="order_shipping_address">

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="inline">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="tags">Country</label>
                                                <!-- <input class="form-control" id="tags" type="text"> -->
                                                <div class="row">
                                                  <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                      <select name="shop_order[order_shipping_country]"  class="form-control order_shipping_country" id="order_shipping_country" >
                                                        <option value="">Select Country</option>

                                                        <?php foreach ($country_list as $key => $value): ?>
                                                          <option value="<?=$value['country']?>" <?=(($value['id']) == $userInfo['signup_country']) ? 'selected' : ''?>><?=$value['country']?></option>
                                                        <?php endforeach ?>

                                                      </select>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="inline">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="tags">Town/City</label>
                                                <!-- <input class="form-control" id="tags" type="text"> -->
                                                <input type="text" class="form-control order_shipping_city" placeholder="Town/City*" name="shop_order[order_shipping_city]"  value="" id="order_shipping_city">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="tags">Satate</label>
                                                <input type="text" class="form-control order_shipping_state" placeholder="State" name="shop_order[order_shipping_state]" value="" id="order_shipping_state"> 
                                                <!-- <input class="form-control" id="tags" type="text"> -->
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="tags">Zip Code</label> 
                                                <!-- <input class="form-control" id="tags" type="text"> -->
                                                <input type="text" class="form-control order_shipping_code" placeholder="Postcode/ZIP" name="shop_order[order_shipping_zip_code]" value="" id="order_shipping_code">

                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="tags"><input type="checkbox" id="copy_address">Billing & Shipping address are same</label>
                                              </div>
                                            </div>


                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- payemnt -->
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" href="#collapsefour" class="collapsed" aria-expanded="false"> Payment Method</a></h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapsefour" aria-expanded="false" style="height: 0px;">
                                      <div class="panel-body check-form">
                                        
                                        <div class="row">
                                          <div class="inline">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="payment">
                                                  <input type="radio" name="payment" value="paypal" required=""> Paypal
                                              </div>
                                              <div class="form-group">
                                                <label for="payment">
                                                  <input type="radio" name="payment" value="stripe" required=""> Stripe
                                              </div>

                                              <input type="submit" name="submit" id="gotopayment" class="btn-header btn show">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- payemnt endss -->

                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                          <div class="rcart">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <div class="citem">
                                  <div class="col-md-12">
                                    <?php if (isset($data) && array_filled($data)): 
                                    ?>
                                    <?php foreach ($data as $key => $value): ?>
                                      <div class="row">
                                        <div class="col-md-6 col-xs-6 col-sm-6">
                                          <p><?=$value['qty']?> item</p>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-sm-6">
                                          <div class="pull-right">
                                            <p><?=price($value['price'])?></p>
                                          </div>
                                        </div>
                                      </div>    
                                    <?php endforeach ?>
                                  <?php endif ?>

                                </div>
                              </div>
                              <div class="citem">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                      <p>Discount</p>
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                      <div class="pull-right">
                                        <p><span class="cart-order_discount"></span></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="citem">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                      <p>Shipping</p>
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                      <div class="pull-right">
                                        <p><span class="cart-shipping_charges"></span></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <hr>
                              <div class="citem">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                      <p>Total</p>
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                      <div class="pull-right">
                                        <p><span class="cart-order_amount"></span></p>
                                        <!-- <p>$7.00</p> -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="cart-bottom">
                          <div class="col-md-2 col-sm-2 col-xs-2">
                            <a href="#"><i aria-hidden="true" class="fa fa-shield"></i></a>
                          </div>
                          <div class="col-md-10 col-sm-10 col-xs-10">
                            <ul>
                              <li>
                                <a href="#">
                                  <p>Security policy (edit with module Customer reassurance)</p></a>
                                </li>
                                <li></li>
                              </ul>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="cart-bottom">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                              <a href="#"><i aria-hidden="true" class="fa fa-truck"></i></a>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                              <ul>
                                <li>
                                  <a href="#">
                                    <p>Delivery policy (edit with module Customer reassurance)</p></a>
                                  </li>
                                  <li></li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="clearfix"></div>
                            <div class="cart-bottom">
                              <div class="col-md-2 col-sm-2 col-xs-2">
                                <a href="#"><i aria-hidden="true" class="fa fa-exchange"></i></a>
                              </div>
                              <div class="col-md-10 col-sm-10 col-xs-10">
                                <ul>
                                  <li>
                                    <a href="#">
                                      <p>Return policy (edit with module Customer reassurance)</p></a>
                                    </li>
                                    <li></li>
                                  </ul>
                                </div>
                                <div class="col-md-2"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>