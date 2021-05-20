<style>
   .mainBanner {
   background: transparent linear-gradient(
   180deg
   , #FFFFFF00 0%, #F3F7FB 100%) 0% 0% no-repeat padding-box;
   height: 586px;
   align-items: center;
   display: flex;
   }
   .lrnjSec .mainBanner {
   height: inherit;
   background: #f3f7fb;
   }
   .lrnjSec {
   padding: 0px 0;
   background: #fff;
   }
</style>
<div class="mainBanner hding-1 para">
   <div class="container">
      <div class="row align-items-center">
         <? $this->load->view('widgets/_learning_journey'); ?> 
      </div>
   </div>
</div>
<? $this->load->view('widgets/_learning_journey_content'); ?>
<? $this->load->view('widgets/_who_is_it_for'); ?> 
<section class="abtSec para pad-sec">
   <div class="container">
      <div class="abtBox">
         <div class="row">
            <div class="col-md-6 flex-center">
               <div class="abtContent">
                  <h3><span><?=$contd['cms_page_title']?></span> </h3>
                  <?=html_entity_decode($contd['cms_page_content'])?>
                  <div class="space"><br></div>
               </div>
            </div>
            <div class="col-md-6 text-right">
               <a href="<?=$contd['cms_page_url']?>" data-fancybox="media">
                  <div class="video-box">
                     <img src="<?=get_image($contd['cms_page_image'],$contd['cms_page_image_path'])?>">
                     <span><i class="fas fa-play"></i></span>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="jrnySec hding-2 pad-sec">
   <div class="container">
      <div class="jrnyHead">
         <h2>Learning Journey <strong>Content</strong></h2>
      </div>
      <div class="space"><br><br><br></div>
      <div class="jrnyContent">
         <h6>Each section includes:</h6>
         <ul>
            <li><i><img src="<?=i('')?>journy/1.svg"></i> Video Tutorial</li>
            <li><i><img src="<?=i('')?>journy/2.svg"></i> Transcript</li>
            <li><i><img src="<?=i('')?>journy/3.svg"></i> Tool and Tool-Builder</li>
         </ul>
      </div>
      <? if(isset($learn_cat) AND array_filled($learn_cat)) :?>
      <? foreach($learn_cat as $key=>$value):?>
      <div class="jrnyFaq">
         <h5><i><img src="<?=i('')?>icons/learn/1.svg" alt=""></i> 
            <?=$value['learning_journey_category_name']?>
         </h5>
         <?
            $al=array();
            $al['where']['learning_journey_cat_id']=$value['learning_journey_category_id'];
            
            $ck=$this->model_learning_journey_content->find_all_active($al);
            //  debug($ck);
            ?>
         <ul class="colasebar">
            <? if(isset($ck) AND array_filled($ck)) :?>
            <? foreach($ck as $key=>$value):?>
            <li>
               <div class="faqBox">
                  <span><i class="fas fa-lock"></i> <?=$value['learning_journey_content_name']?> <i class="fal fa-plus"></i></span>
                  <div class="expandable">
                     <?=html_entity_decode($value['learning_journey_content_desc'])?>
                  </div>
               </div>
            </li>
            <? endforeach;?>
            <? endif;?>
         </ul>
      </div>
      <div class="space"><br><br><br><br></div>
      <? endforeach;?>
      <? endif;?>
   </div>
</section>
<section class="joinSec hding-2 para">
   <div class="joinContent">
      <h2><?=$check['cms_page_title']?></h2>
      <div class="space"><br></div>
      <?=html_entity_decode($check['cms_page_content'])?>
      <div class="space"><br><br></div>
      <a href="javascript:void(0)" class="btn-theme btn-hover">Start Free Trial <span></span></a>
   </div>
</section>
<section class="faqSec hding-2 para">
   <div class="container">
      <div class="faqHead">
         <h2>FAQs about <strong>Learning Journey</strong></h2>
      </div>
      <ul class="colasebar">
         <? if(isset($faq) AND array_filled($faq)) :?>
         <? foreach($faq as $key=>$value):?>
         <li>
            <div class="faqBar">
               <span><?=$value['faq_question']?>  <i class="fal fa-angle-down"></i></span>
               <div class="expandable">
                  <?=html_entity_decode($value['faq_answer'])?>
               </div>
            </div>
         </li>
         <? endforeach;?>
         <? endif;?>
      </ul>
   </div>
</section>
<? $this->load->view('widgets/_clients'); ?>