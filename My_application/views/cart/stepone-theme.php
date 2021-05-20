
<section class="cartsec">
          <?php if (isset($data) && array_filled($data)){ ?>
          <div class="container">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
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
                     <?php foreach ($data as $key => $value): ?>
                    <tr>
                      <td><div class="row">
                        <div class="col-md-3 padd-0"> <img src="<?=$value['options']['product_img']?>" style="height: 100px"> </div>
                        <div class="col-md-9">
                          <h5><?=ucfirst($value['name'])?></h5>
                          <h6><span>Gram:</span>20</h6>
                          <!-- <h6>26 Reviews</h6> -->
                        </div>
                      </div></td>
                      <td class="text-center">
                           <input type="number" name="quant[2]" class="input-number" value="<?=$value['qty']?>" min="1" max="10" id="cart_qty-<?=$key?>" onkeypress="return false"> 
                      <a href="javascript:void(0)" class="update update_this_item" data-rowid ="<?=$key?>" data-product_id ="<?=$value['id']?>">Update Cart</a></td>
                      <td><h4><?=price($value['price'])?></h4></td>
                      <td><h4><?=price($value['subtotal'])?></h4></td>
                      <td><a href="javascript:void(0)" class="remove remove_this_item"  data-rowid='<?=$value["rowid"]?>' title="Remove this item" >x</a></td>
                    </tr> 
                  <?php endforeach ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="checkoutsec">
                <div class="row">
                  <div class="col-md-4 text-center"> <a href=""> Continue Shopping <i class="fa fa-angle-right"></i></a> </div>
                  <div class="col-md-4 col-md-offset-4 text-center">
                    <button class="btn btn-block" onclick="window.location.href='<?=l('cart/step_two')?>'">Proceed To Checkout</button>
                    <!-- <div class="checkout">
                      <h5>or checkout with</h5>
                      <a href=""><img src="<?=i('')?>paypal2.png" alt="" class="img-responsive"></a> </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="check-out-detail">
                <!--   <h2>Sub Total <span>$76</span></h2>
                  <h2>Discount  <span>$10</span></h2>
                  <h2>Shipping <span>$15</span></h2>
                  <h2 class="price">Total<span class="price">$81</span></h2> -->
                       <?$this->load->view("cart/_order_summery")?>
                </div>
                <!-- <div class="freeshipping">
                  <h2>Shipping</h2>
                  <span>Courier ($15)</span>
                  <h2>Estimate For</h2>
                  <span>United Estate,NY,1230</span>
                </div> -->
              </div>
            </div>

      <?php }else{?>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th colspan="5"><span class="cart_body"></span> Item In Cart</th>
        </tr>
        <tr>
            <td><a href="<?=l('')?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Home</a></td>
        </tr>
    </thead>
</table>
</div>
<?} ?>
          </section>