
<style>
   .joinSec {
   background-image: linear-gradient(to left, rgba(8, 74, 147, 0.8), rgba(8, 74, 147, 0.8)), url(<?=get_image($cont15['cms_page_image'],$cont15['cms_page_image_path'])?>);
   }
   .home-banner{
   background-image:url('<?=get_image($banner['inner_banner_image'],$banner['inner_banner_image_path'])?>');
   }
</style>


<div class="mainBanner home-banner hding-1 hding-2">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-8 col-md-12">
            <div>
               <h1><?= $banner['inner_banner_title'] ?></h1>
               <div class="space"><br><br></div>
               <?= html_entity_decode($banner['inner_banner_content']) ?> 
               <div class="space"><br><br></div>
               <a href="#" class="btn-links" data-fancybox="media"><i class="fas fa-play-circle"></i> watch how it works</a>
            </div>
         </div>
         <div class="col-lg-4 col-md-12">
            <div class="form-card">
               <div>
                  <h2>Get <strong>Started</strong></h2>
                  <div class="space"><br></div>
                  <form id="forms-newsletter">
                     <div class="fld-input">
                        <input type="email" name="newsletter[newsletter_email]" placeholder="Enter email address" required="">
                     </div>
                     <div class="space"><br><br></div>
                     <div class="fld-html">
                        <p>Gain <strong> 7-day free </strong> limited access to Learning Journey and Experts Tutorials.</p>
                     </div>
                     <div class="space"><br></div>
                     <div class="fld-btn">
                        <input type="submit" id="forms-newsletter-btn" value="Proceed to Free Trial">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="iconSec hding-3 para pad-sec">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="iconBox">
               <span><img src="<?=get_image($cont1['cms_page_image'],$cont1['cms_page_image_path'])?>"></span>
               <div class="space"><br></div>
               <h3 class="home-h3"><?=$cont1['cms_page_title']?></h3>
               <div class="space"><br></div>
               <?=html_entity_decode($cont1['cms_page_content'])?> 
            </div>
         </div>
         <div class="col-md-4">
            <div class="iconBox">
               <span><img src="<?=get_image($cont2['cms_page_image'],$cont2['cms_page_image_path'])?>"></span>
               <div class="space"><br></div>
               <h3 class="home-h3"><?=$cont2['cms_page_title']?></h3>
               <div class="space"><br></div>
               <?=html_entity_decode($cont2['cms_page_content'])?> 
            </div>
         </div>
         <div class="col-md-4">
            <div class="iconBox">
               <span><img src="<?=get_image($cont3['cms_page_image'],$cont3['cms_page_image_path'])?>"></span>
               <div class="space"><br></div>
               <h3 class="home-h3"><?=$cont3['cms_page_title']?></h3>
               <div class="space"><br></div>
               <?=html_entity_decode($cont3['cms_page_content'])?> 
            </div>
         </div>
      </div>
   </div>
</section>
<section class="readySec para hding-1">
   <div class="container">
      <div class="redyContent text-center">
         <h1><?=$cont4['cms_page_title']?></h1>
         <?=html_entity_decode($cont4['cms_page_content'])?>
         <div class="space"><br><br></div>
         <a href="javascript:void(0)" class="btn-theme btn-hover">About Mind Cloud Tribe <span></span></a>
      </div>
   </div>
</section>
<section class="whoSec hding-2 para pad-sec">
   <div class="container">
      <div class="expertSec hding-1 para">
         <div class="expertHead">
            <h1><?=$cont5['cms_page_title']?></strong></h1>
         </div>
         <div class="space"><br><br></div>
         <div class="row">
            <div class="col-md-6">
               <?=html_entity_decode($cont5['cms_page_content'])?>
            </div>
            <div class="col-md-6">
               <?=html_entity_decode($cont6['cms_page_content'])?>
            </div>
         </div>
      </div>
      <? $this->load->view('widgets/_most_watched_tutorials'); ?> 
      <? $this->load->view('widgets/_most_popular_categories'); ?> 
   </div>
</section>
<? $this->load->view('widgets/_learning_journey'); ?> 
<? $this->load->view('widgets/_learning_journey_content'); ?>
<? $this->load->view('widgets/_who_is_it_for'); ?> 
<section class="whyjoinSec hding-1 para">
   <div class="container">
      <div class="whyHead">
         <h1><?=$cont13['cms_page_title']?></h1>
      </div>
      <div class="space"><br><br></div>
      <div class="row">
         <div class="col-md-6">
            <?=html_entity_decode($cont13['cms_page_content'])?>
         </div>
         <div class="col-md-6">
            <?=html_entity_decode($cont14['cms_page_content'])?>
         </div>
      </div>
      <div class="space"><br><br><br><br></div>
      <a href="<?=get_image($cont13['tutorial_video'],$cont13['tutorial_video_path'])?>" data-fancybox="media">
         <div class="video-box">
            <img src="<?=get_image($cont13['cms_page_image'],$cont13['cms_page_image_path'])?>" />
            <span><i class="fas fa-play"></i></span>
         </div>
      </a>
   </div>
</section>
<? $this->load->view('widgets/_join_mind_cloud_tribe_today'); ?>
<? $this->load->view('widgets/_testimonials'); ?>
<? $this->load->view('widgets/_clients'); ?>
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
</section>