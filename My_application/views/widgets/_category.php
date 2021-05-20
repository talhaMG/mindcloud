<section class="categories-sec">
 <div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 centerCol">
             <div class="heading">
                <h3>what we offer</h3>
                <h2>our caTegories</h2>
             </div> 
        </div>
    </div>
   <div class="row">
    <?php if (isset($category) && array_filled($category)): ?>
        <?php foreach ($category as $key => $value): ?>
        
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="categories-item">
            <img src="<?=get_image($value['category_image'],$value['category_image_path'])?>" alt="">
            <div class="categoriesoverlay">
                <h2><?=$value['category_name']?></h2>
                <a href="<?=l('category/').$value['category_slug']?>">SHOP NOW</a>
            </div>
        </div>
    </div>

        <?php endforeach ?>
    <?php endif ?>
   </div>
   
   <?$this->load->view("widgets/_services")?>
 </div>
</section>