<section class="cartSec hding-2 para">
   <div class="container">
      <div class="cartHead">
         <h2>Shopping <strong> Cart </strong></h2>
      </div>
      <div class="sapce"><br><br></div>
         
            
            <div class="row">
                        <div class="col-lg-9">
                        
                        </div>
                        <div class="col-lg-1 col-md-4">
                              <div class="cart-product-dtl">
                                 <h6>Price</h6>
                              </div>
                           </div>

                           <div class="col-lg-1 col-md-4">
                              <div class="cart-product-dtl">
                                 <h6>QTY.</h6>
                              </div>
                           </div>

                           <div class="col-lg-1 col-md-4">
                              <div class="cart-product-dtl">
                                 <h6>SUBTOTAL</h6>
                              </div>
                           </div>
                      
                  </div>     
                  <div class="row-box">
               <div class="row">
                  <?php foreach ($data as $key => $value): 
                     //  debug($data);  ?>
                  <div class="col-lg-9 col-md-12 pad-zero">
                     <div class="cart-product-dtl">
                        
                        <div class="row align-items-center">
                           <div class="col-md-1">
                              <a href="javascript:void(0)" class="remove remove_this_item"  data-rowid='<?=$value["rowid"]?>' title="Remove this item" >x</a>
                           </div>
                           <div class="col-md-2">
                              <div class="cart-img-view">
                                 <img src="<?=$value['options']['product_img']?>" alt="">
                              </div>
                           </div>
                           <div class="col-md-9">
                              <p><?=ucfirst($value['name'])?></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-1 col-md-4 pad-zero text-center">
                     <div class="cart-product-dtl">
                       
                        <p><?=price($value['price'])?></p>
                     </div>
                  </div>
                  <div class="col-lg-1 col-md-4 pad-zero text-center">
                     <div class="cart-product-dtl">
             
                        <input type="number" name="quant[2]" class="input-number" value="<?=$value['qty']?>" min="1" max="1" id="cart_qty-<?=$key?>" onkeypress="return false"> 
               
                     </div>
                  </div>
                  <div class="col-lg-1 col-md-4 pad-zero text-center">
                     <div class="cart-product-dtl">
                    
                        <p><?=price($value['subtotal'])?></p>
                     </div>
                  </div>
                  
                  <?php endforeach ?>
               </div>
            </div>
            <div class="row-box row-box2">
               <div class="row justify-content-end">
                  <div class="col-lg-2 col-md-6 pad-zero">
                     <div class="cart-product-dtl">
                        <h6>Subtotal</h6>
                        <p>Total</p>
                     </div>
                  </div>
                  <div class="col-lg-1 col-md-6 pad-zero text-center">
                     <div class="cart-product-dtl">
                        <h6><?=price($value['subtotal'])?></h6>
                        <p><?=price($value['subtotal'])?></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row-box row-box3">
               <div class="row justify-content-end">
                  <div class="col-lg-3  col-md-12  pad-zero">
                     <div class="cart-product-dtl">
                        <button type="submit"><a href="<?=l('cart/step_two')?>" style="color:#fff;">Proceed to Checkout</a></button>
                     </div>
                  </div>
               </div>
            </div>

      </div>
   </div>
</section>
<!-- <section class="whoSec hding-2 para pad-sec">
   <div class="container">
      
      <div class="whoHead">
         <h2>Most watched  <strong> Tutorials</strong></h2>
         <div class="space"><br></div>
      </div>
      <div class="space"><br><br><br></div>
   
      <ul class="who-list tut-list pb-100">
      <li>
            <div class="vid-box">
               <a href="https://www.youtube.com/watch?v=XIMLoLxmTDw" data-fancybox="media">
                  <div class="video-box">
                     <img src="<?=i('')?>whoSec/1.png">
                     <span><i class="fas fa-play"></i>  <p>Preview Course</p> </span>
                  </div>
               </a>
               <a href="#" class="cate-tag">business model</a>
   
               <div class="vid-content">
                  <h4>Building the Right<br> Team</h4>
                  <div class="row align-items-center pt-70">
                     <div class="col-md-9">
                        <ul class="rating">
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-l.svg"></li>
                        </ul>
                     </div>
   
                     <div class="col-md-3 text-right">
                        <h6>$15</h6>      
                     </div>
                  </div>
               </div>
            </div>
         </li>
   
         <li>
            <div class="vid-box">
               <a href="https://www.youtube.com/watch?v=XIMLoLxmTDw" data-fancybox="media">
                  <div class="video-box">
                     <img src="<?=i('')?>whoSec/2.png">
                     <span><i class="fas fa-play"></i>  <p>Preview Course</p> </span>
                  </div>
               </a>
               <a href="#" class="cate-tag">business model</a>
   
               <div class="vid-content">
                  <h4>Business Protection for Entrepreneurs </h4>
                  <div class="row align-items-center pt-70">
                     <div class="col-md-9">
                        <ul class="rating">
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-l.svg"></li>
                        </ul>
                     </div>
   
                     <div class="col-md-3 text-right">
                        <h6>$15</h6>      
                     </div>
                  </div>
               </div>
            </div>
         </li>
   
         <li>
            <div class="vid-box">
               <a href="https://www.youtube.com/watch?v=XIMLoLxmTDw" data-fancybox="media">
                  <div class="video-box">
                     <img src="<?=i('')?>whoSec/3.png">
                     <span><i class="fas fa-play"></i> <p>Preview Course</p></span>
                  </div>
               </a>
               <a href="#" class="cate-tag">business model</a>
   
               <div class="vid-content">
                  <h4>Basics of Brands and Branding</h4>
   
                  <div class="row align-items-center pt-70">
                     <div class="col-md-9">
                        <ul class="rating">
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-d.svg"></li>
                           <li><img src="<?=i('')?>icons/rat-l.svg"></li>
                        </ul>
                     </div>
   
                     <div class="col-md-3 text-right">
                        <h6>$15</h6>      
                     </div>
                  </div>
               </div>
            </div>
         </li>
      </ul>
   
      <div class="mostcateSec">
         <div class="mostHead">
            <h2>Most Popular <strong> Categories </strong></h2>
         </div>
         <div class="space"><br><br></div>
         
         <ul class="cate-list">
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Business Model (4)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Digital marketing (12)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Finance and Valuation (6)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Leadership (9)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Human resources (14)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Customer Acquisition (12)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Marketing & Sales (10)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Branding (4)</p></li>
            <li><p><span><img src="<?=i('')?>icons/category/1.svg"></span> Business Model (4)</p></li>
         </ul>
      </div>
   </div>
   </section>  
   
   
   <section class="testiSec hding-2 para bg-white pad-sec">
   <div class="container">
      <ul class="testi-slider">
         <li>
            <?php include('includes/testimonial.php') ?>
         </li>
         <li>
            <?php include('includes/testimonial.php') ?>
         </li>
         <li>
            <?php include('includes/testimonial.php') ?>
         </li>
         <li>
            <?php include('includes/testimonial.php') ?>
         </li>
      </ul>
   </div>
   </section>
   
   
   <section class="clientSec hding-2 pad-sec">
   <div class="container">
   <div class="c1">
         <div class="clientHead">
            <h2>Our <strong>Corporate Clients</strong></h2>
         </div>
         <div class="space"><br><br></div>
         <ul class="client-logo">
            <li><a href="#"><img src="<?=i('')?>client/1.png" alt=""></a></li>
            <li><a href="#"><img src="<?=i('')?>client/2.png" alt=""></a></li>
         </ul>
      </div>
   
      <div class="c2">
         <div class="clientHead">
            <h2>Our <strong>Strategic Partners</strong></h2>
         </div>
         <div class="space"><br><br></div>
         <ul class="client-logo">
            <li><a href="#"><img src="<?=i('')?>client/3.png" alt=""></a></li>
            <li><a href="#"><img src="<?=i('')?>client/4.png" alt=""></a></li>
         </ul>
      </div>
   </div>
   </section>
   
   <section class="doxSec hding-3 para pad-sec bg-white">
   <div class="container">
      <div class="row">
      <div class="col-md-6">
            <div class="dox-content">
               <h3>Consult with Experts</h3>
               <div class="space"><br><br></div>
               <p>Feeling stuck? Book one-on-one video<br> meetings with our panel of top business<br> Experts.</p>
               <div class="space"><br><br></div>
               <a href="#" class="btn-theme btn-hover">Book a Consultation<span></span></a>
            </div>
         </div>
   
         <div class="col-md-6">
            <div class="dox-content">
               <h3>Join our Tribe of Experts</h3>
               <div class="space"><br><br></div>
               <p>Join our tribe as an Expert if you love to share <br>your knowledge. We will connect you with an<br> audience eager for your expertise.</p>
               <div class="space"><br><br></div>
               <a href="#" class="btn-theme btn-hover">Join as an Expert<span></span></a>
            </div>
         </div>
      </div>
   </div>
   </section> -->