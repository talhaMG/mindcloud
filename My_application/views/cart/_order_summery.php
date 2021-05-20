<!-- 			
			<div class="check-out-detail">
                <h3>Order Summary</h3>
                <h2>Subtotal:<span class="cart-total_amount"></span></h2>
                <h2>Tax:<span>$0.00</span></h2>
                <h2>Discount:<span class="cart-order_discount"></span></h2>
                <h2>Shipping:<span class="cart-shipping_charges"></span></h2>
                <p>Shipping Service - Standard</p>
                <h2>Order Total:<span class="cart-order_amount"></span></h2>
            </div> -->

            <div class="tabel-responsive subtotal_div ">
              <h2>Cart Totals</h2>
              <table class="table">
                <tbody class="shadow-around">
                  <tr class="table-body">
                    <td>Cart Subtotal</td>
                    <td class="text-right"><strong><span class="cart-total_amount"></span></strong></td>
                  </tr>

                  <tr class="table-body">
                    <td>Shipping</td>
                    <td class="text-right">
                    <span class="cart-shipping_charges"></span>
                    </td>
                  </tr>
                  <tr class="table-body">
                    <td>Order Total</td>
                    <td class="text-right"><strong><span class="cart-order_amount"></span></strong></td>
                  </tr>
                </tbody>
              </table>
              <div class="butonDiv"> 
              <!-- <a href="#" class="cartBtn-a">UPDATE</a>  -->
              <a href="<?=l('cart/step_two')?>" class="checkoutBtn-a">Proceed to checkout</a></div>
            </div>