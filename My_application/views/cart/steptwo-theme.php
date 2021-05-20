<style>


.collapse {
    display: block im !important;
}

</style>

<section class="place-sec hding-2 para">
         <div class="container">
            <div class="place-head">
               <h2>Check <strong>Out</strong></h2>
            </div>
            <div class="space"><br></div>

            <div class="place-box">
               <div class="place-noty">
                  <p><span><i class="fas fa-check-circle"></i></span> You added <strong> 7- Day Access to Mind Cloud Tribe: </strong> allows you to see 7 tutorial introductions from Learning Journey and Experts Tutorials</p>
               </div>
            </div>

      
            <div class="sapce"><br></div>
            <form action="" method="post" class="form-horizontal"  id='order_data'>
            <div class="row">
               <div class="col-lg-6 col-md-12">
                  <div class="billing-form">
                     <h2>Billing <strong>Details</strong></h2>
                     
                        <div class="fld-bill">
                           <label for="">Full name <span>*</span></label>

                           <input type="text" required placeholder="Insert First Name (Required)" name="shop_order[order_billing_fname]" class='order_shipping_fname ' value="<?=isset($member_data['user_firstname']) ? $member_data['user_firstname'] : ''?>">
                        </div>

                        <div class="fld-bill">
                           <label for="">Last name <span>*</span></label>

                           <input type="text" required placeholder="Insert Last Name (Required)" name="shop_order[order_billing_lname]" class='order_shipping_lname ' value="<?=isset($member_data['user_lastname']) ? $member_data['user_lastname'] : ''?>">
                        </div>

                        <div class="fld-bill">
                           <label for="">Country / Region <span>*</span></label>
                           <select required name='shop_order[order_billing_country]' class='order_shipping_country'>
                                            <option value=''>Select Country (Required)</option>
                                            <?php
                                                if(isset($country_list) && count($country_list) > 0)
                                                {
                                                    foreach($country_list as $value)
                                                     {
                                                  
                                                        echo '<option '.$selected.' value='.$value['id'].'>'.$value['country'].'</option>';
                                                    }
                                                }
                                                ?>
                           </select>
                        </div>

                        <div class="fld-bill">
                           <label for="">Street address <span>*</span></label>
                           <input type="text" required placeholder="Insert Your Address (Required)" name="shop_order[order_billing_address]" class='order_shipping_address ' value="<?=isset($member_data['ui_address_primary']) ? $member_data['ui_address_primary'] : ''?>">

                        </div>

                        <div class="fld-bill fld-b-hlf">
                           <label for="">Town / City <span>*</span></label>
                           <input type="text" required placeholder="Insert Your City (Required)" name="shop_order[order_billing_city]" class='order_shipping_city '  value="<?=isset($member_data['ui_city']) ? $member_data['ui_city'] : ''?>">
                        </div>

                        <div class="fld-bill fld-b-hlf">
                           <label for="">State <span>*</span></label>
                           <input type="text" placeholder="Insert Your State" name="shop_order[order_billing_state]" class='order_shipping_state ' value="<?=isset($member_data['ui_state']) ? $member_data['ui_state'] : ''?>" required>
                        </div>

                        <div class="fld-bill fld-b-hlf">
                           <label for="">zip / postal code <span>*</span></label>
                           <input type="text" placeholder="Insert Your Code" name="shop_order[order_billing_zip_code]" class='order_shipping_code'  value="<?=isset($shipping_zip) ? $shipping_zip : ''?>" required>
                        </div>

                        <div class="fld-bill fld-b-hlf">
                           <label for="">phone <span>*</span></label>
                           <input type="text" placeholder="Insert Your Phone #" name="shop_order[order_billing_phone]" class=' order_shipping_phone' value="<?=isset($member_data['ui_phone']) ? $member_data['ui_phone'] : ''?>" required>
                        </div>

                        <div class="fld-bill">
                           <label for="">Email address <span>*</span></label>
                           <input type="email" required placeholder="Insert Your Email (Required)" name="shop_order[order_billing_email]" class='order_shipping_email ' value="<?=isset($member_data['user_email']) ? $member_data['user_email'] : ''?>">
                        </div>

                     
                  </div>
               </div>

               <div class="col-lg-6 col-md-12">
                  <div class="billing-form order-dtl-box">
                     <h2>your <strong>order</strong></h2>

                     <?php 

        foreach($data as $value) { ?>
                        <div class="row-box  order-dtl-row">
                           <div class="row">
                              <div class="col-md-10 pad-zero">


                              <div class="cart-product-dtl">
                                 <h6>PRODUCT</h6>

                                 <div class="row align-items-center">
                       

                                 <div class="col-md-3">
                                       <div class="cart-img-view">
                                          <img src="<?=$value['options']['product_img']?>" alt="">
                                       </div>
                                 </div>

                                 <div class="col-md-8 pad-zero">
                                       <p><?=ucfirst($value['name'])?></p>
                                 </div>

                                 </div>

                       

                              </div>
                        
                           </div>

                           <div class="col-md-2">
                              <div class="cart-product-dtl text-center">
                                 <h6>Total</h6>
                                 <div class="space"><Br></div>
                                 <p><?=price($value['price'])?></p>
                              </div>
                              <div style="display:none;">
       <?php if ($paymentType == "downpayment"): ?>
      <h3>Down Payment (20%)</h3>
          <h3><strong id='cart-order_amount'><?=price($payment_amount)?></strong>
   
        <?php endif ?>

           <?php if ($paymentType == "partialpayment"): ?>
      <h3>Partial Payment(Remaining Amount) (80%)</h3>
           <strong id='cart-order_amount'><?=price($payment_amount)?></strong>
    
        <?php endif ?>
                              
                              
                              </div>
                           </div>
                        </div>
                        <?php  } ?>

                        
                     </div>

                     <div class="row-box row-box2">
                        <div class="row justify-content-end">
                           <div class="col-lg-4 col-md-6 pad-zero">
                              <div class="cart-product-dtl">
                                 <h6>Subtotal</h6>
                                 <p>Total</p>
                              </div>
                           </div> 
                           
                           <div class="col-lg-3 col-md-6 text-right">
                              <div class="cart-product-dtl">
                                 <h6 id='cart-total_amount'><?=price($total_amount)?></h6>
                                 <p id='cart-order_amount'><?=price($total_order_amount)?></p>
                              </div>
                           </div> 

                        </div>
                     </div>

                     <div class="row-box3">

                        <div class="row pay-op align-items-center">
                       

                           <div class="col-md-12">
                              <div class="fld-pla-chk">
                                 <label for="pay">
                                    <input type="checkbox" id="pay" name="pay" required> Accept Terms & Condition <i class="btn-group"><img src="assets/images/master.svg" alt=""><img src="assets/images/visa.svg" alt=""></i>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="space"><br><br></div>
                        

                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#"> Privacy Policy.</a></p>
                        <div class="fld-pla-btn">
                           <button type="submit" id="signin-btn"  class="checkout-button">Proceed To CheckOut</button>
                        </div>
                     </div>

                     
                  </div>   
               </div>
            </div>
            </form>

         </div>
      </section>

 