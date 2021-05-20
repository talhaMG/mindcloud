<?$this->load->view("widgets/banner")?>
<section class="How-we-do-it works">
   <div class="container">
      <div class="main-content">
         <h1>How It Works</h1>
         <?php if (isset($cont) && array_filled($cont)): ?>
         <?php foreach ($cont as $key => $value): ?>
         <?php if (($key+1) % 2 != 0 ){ ?>
         <div class="row colom">
            <div class="col-xs-12 col-sm-6 col-md-6">
               <div class="content-box">
                  <h2><?=$value['cms_page_title']?></h2>
                  <?=html_entity_decode($value['cms_page_content'])?>
                  <!-- <a href="partners.html" class="btn more">Read More</a> -->
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
               <img src="<?=get_image($value['cms_page_image'],$value['cms_page_image_path'])?>" class="img-responsive" alt="">
            </div>
         </div>
         <?php }else{?>
         <div class="row colom">
            <div class="col-xs-12 col-sm-6 col-md-6">
               <img src="<?=get_image($value['cms_page_image'],$value['cms_page_image_path'])?>" class="img-responsive" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
               <div class="content-box-second">
                  <h2><?=$value['cms_page_title']?></h2>
                  <?=html_entity_decode($value['cms_page_content'])?>
                  <!-- <a href="partners.html" class="btn more">Read More</a> -->
               </div>
            </div>
         </div>
         <?}?>
         <?php endforeach ?>
         <?php endif ?>
      </div>
      <?$this->load->view("widgets/_deal")?>           
   </div>
</section>