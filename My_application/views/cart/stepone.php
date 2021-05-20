<? $this->load->view('_widget-inner_banner',array('is_title'=>$title));?>

<section class="cartsec">
    <? if(isset($data) && array_filled($data)) :?>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th class="">Quantity</th>
                        <th>Unit Price</th>
                        <th>Sub Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $value) { ?>
                    <tr id="cart_item_<?=$value["rowid"]?>">
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?=$value['options']['product_img']?>" alt="" class="img-responsive" width='269' height='351'>
                                </div>
                                <div class="col-md-9">
                                    <h5><?=ucfirst($value['name'])?></h5>
                                    <!-- <h6><span>Avaible:</span> Available Stock</h6>
                                    <h6><span>Product Code:</span> Abc123z</h6> -->
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <input type="number" class="qtystyle" id="cart_qty-<?=$value["rowid"]?>" value="<?=$value['qty']?>" min="1" max="100">
                            <!-- <a href="" class="update">Update Cart</a> -->
                        </td>
                        <td>
                            <h4><?=price($value['price'])?></h4></td>
                        <td>
                            <h4><?=price($value['subtotal'])?></h4></td>
                        <td>
                            <button type="button" class="btn btn-success update_this_item" data-rowid='<?=$value["rowid"]?>' data-product_id='<?=$value["id"]?>' title="Update this item">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>


                            <button type="button" class="btn btn-danger remove_this_item" data-rowid='<?=$value["rowid"]?>' title="Remove this item">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                    <? } ?>
                    <tr>
                      <td colspan="4" style="padding: 14px !important">
                        <div class="coupons">
                          <? if(isset($coupon['info']) AND array_filled($coupon['info'])) :?>
                            <h4><?=$coupon['info']['coupon_comments']?>(Coupon: <?=$coupon['info']['coupon_code']?>)</h4>
                          <? else:?>
                            <div class="input-group">
                                <input type="text" id="coupon"  placeholder="coupon code">
                                <div class="input-group-btn">
                                    <button id="coupon_btn" type="button" class="btn btn-primary">Apply Coupon Code</button>
                                </div>
                            </div>
                          <? endif;?>
                        </div>
                      </td>
                      <td>SUBTOTAL:    <?=price($total_amount)?></td>   
                    </tr>
                </tbody>
            </table>
            
        </div>
        <div class="checkoutsec">
            <div class="row">

                <!-- UPS SHIPPING START -->
                <div class="col-md-8 text-center">
                    <div class="col-md-12 text-center">
                        <? $this->load->view('cart/shipping/ups')?>
                    </div>
                </div>
                <!-- UPS SHIPPING END -->

                <div class="col-md-4 text-center">
                    <div class="totalsec">
                        <h4>Subtotal:  <span class='cart-total_amount'><?=price($total_amount)?></span></h4>
                        <h4>Add Shipping:  <span class='cart-shipping_charges'><?=price($shipping_amount)?></span></h4>
                        <h4>Less Discount:  <span class='cart-order_discount'><?=price($discount_amount)?></span></h4>
                        <h3>Total:  <span class='cart-order_amount'><?=price($total_order_amount)?></span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2 text-center">
                    <a href="<?=l('products')?>"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                </div>
                <div class="col-md-4 text-center">
                    <a class="button-style" href="<?=l('cart/step_two')?>">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <? else:?>
        <div class="container">
            <div class="col-md-12 col-xs-12 col-sm-12">';
              <div class="container">
            <div class="hero-unit">
              <h2>Empty cart</h2>
              <p>Dude, you\'ve got nothing in your cart.</p>
              <p>
                <a href="'.l('products').'" class="btn btn-primary">
                  Buy something
                </a>
              </p>
            </div>
          </div>
        </div>
    <? endif;?>
</section>