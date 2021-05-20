
<section class="featured-sec">
  <div class="container">
  	 <div class="row">
  	     <div class="col-md-6 col-sm-6 col-xs-12 centerCol">
  	     	<h3>Featured Products</h3>
  	     </div>
  	 </div>
	<div class="featured-slider">
	<?php if (isset($featured_pro) && array_filled($featured_pro)): ?>
		<?php foreach ($featured_pro as $key => $value): ?>
		<div>
			<div class="featured-info">
				<!-- <img src="<?=get_image($value['product_image'],$value['product_image_path'])?>" alt=""> -->
				
				<div class="hovereffect2">
                 <span class="thproduct_img" href="#" style="background-image: url(<?=get_image($value['product_image'],$value['product_image_path'])?>);"></span>
                </div>

			 <a href="<?=l('product-detail/').$value['product_slug']?>"><h5><?=$value['product_name']?></h5></a>
				<h4><?=price($value['product_price'])?></h4>
			</div>
		</div>	
		<?php endforeach ?>
	<?php endif ?>
	
	</div>
  </div>
</section>