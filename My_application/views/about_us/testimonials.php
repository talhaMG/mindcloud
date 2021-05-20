<style type="text/css">
   .client-message p
   {
   color: #fff;
   }
   /*405*/
   .hovereffect span.thproduct_img {
   width: 100%;
   display: block;
   height: 405px;
   background-size: cover;
   background-position: center;
   background-repeat: no-repeat;
   }
   .desc p{
   font-size: 14px;
   color: #fff;
   font-family: 'Ubuntu', sans-serif;
   }
   .newsBox .overlay img {
   top: auto;
   position: absolute;
   left: 40%;
   bottom: 91%;
   z-index: 999;
   }
</style>
<?$this->load->view("widgets/inner_banner")?>
<section class="client-say testimonial">
   <div class="container">
   <div class="row">
      <div class="col-md-12">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <img src="<?=get_image($test['testimonials_image'],$test['testimonials_image_path'])?>" alt="">
                  <div class="carousel-caption">
                     <h3 class="client-name"></h3>
                     <h4 class="client-info"><?=$test['testimonials_title']?></h4>
                     <div class="client-message">
                        <?=html_entity_decode($test['testimonials_desc'])?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="">
   <div class="container">
      <div class="row">
         <?php if (isset($testimonials) && array_filled($testimonials)): ?>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <?php foreach ($testimonials as $key => $value): 
               ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="newsBox">
                  <div class="hovereffect">                    
                     <span class="thproduct_img" href="#" style="background-image: url(<?=get_image($value['testimonials_image'],$value['testimonials_image_path'])?>);"></span>
                  </div>
                  <div class="overlay">
                     <!-- <img src="<?=i('')?>quote.png" class="img-responsive " alt="quote"> -->
                     <div class="newsbox-detail">
                        <img src="<?=i('')?>quote.png" class="img-responsive " alt="quote">
                        <h1><?=ucfirst($value['testimonials_title'])?></h1>
                        <p><?=$value['testimonials_other']?></p>
                        <div class="desc">
                           <?=html_entity_decode($test['testimonials_desc'])?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach ?>
         </div>
         <?php endif ?>
      </div>
   </div>
</section>