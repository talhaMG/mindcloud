<style>
   .faqBox a {
      font-size: 20px;
      color: #5C677D;
      text-transform: capitalize;
      display: block;
      width: 100%;
   }

   .faqBox a i {
      opacity: 0.5;
      margin-right: 34px;
   }
</style>
<div class="index-page">
   <section class="">

      <div class="abt-tut-page">
         <div class="front-dashboard">
            <a href="#" class="menu-dash-front">MENU<i class="fal fa-bars"></i></a>
            <? $this->load->view("widgets/dashboard-menu-box"); ?>
         </div>
         <div class="mainBanner hding-1 para">
            <div class="container">
               <div class="row">
                  <div class="col-lg-7 col-md-12">
                     <div>
                        <?
                        $a = $course[0]['tutorial_category_id'];
                        $dt = $this->model_category->find_by_pk($a);

                        ?>
                        <ul class="bnr-cate">
                           <li>Category</li>
                           <li><a href="javascript:void(0)">

                                 <? foreach ($ct as $key => $value) :
                                    $a = $value['category_name'];
                                    if ($key >= 1) {
                                       echo " , ";
                                    }
                                    echo $value['category_name'];

                                 ?>
                                 <? endforeach; ?>


                              </a></li>
                        </ul>
                        <?= html_entity_decode($course[0]['tutorial_desc']) ?><br>
                        <ul class="usr-rating">
                           <?php
                           for ($x = 1; $x <= $course[0]['tutorial_rating']; $x++) { ?>
                              <li><img src="<?= i('') ?>icons/rat-l.svg"></li>
                           <? } ?>
                        </ul>
                     </div>
                     <div class="row pt-100 icon-box-wrap">
                        <div class="col-md-4">
                           <div class="icon-box">
                              <span>
                                 <i class="fas fa-user"></i>
                              </span>
                              <h6><span>Created by</span><?= $course[0]['expert_name'] ?></h6>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="icon-box">
                              <span>
                                 <i class="fas fa-comment"></i>
                              </span>
                              <h6><span>Course Language</span><?= $course[0]['language_name'] ?></h6>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="icon-box">
                              <span>
                                 <i class="fas fa-calendar-plus"></i>
                              </span>
                              <h6><span>Last updated</span><?= $course[0]['tutorial_createdon'] ?></h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-12">
                     <div class="video-card">
                        <a href="<?= g('db.admin.bucket') . $course[0]['tutorial_video'] ?>" data-fancybox="media">
                           <div class="video-box">
                              <img src="<?= g('db.admin.bucketimg') . $expert[0]['expert_image'] ?>" />
                              <span><i class="fas fa-play"></i></span>
                           </div>
                        </a>
                        <div class="video-content">
                           <div>
                              <span><?= html_entity_decode($course[0]['tutorial_duration']) ?></span>
                              <ul class="tut-info">
                                 <li><i><img src="<?= i('') ?>icons/1.png"></i> Professional Certification </li>
                                 <li><a href="javascript:void(0)">1-Year Access </a></li>
                                 <!-- <form> -->
                                 <input type="hidden" name="product_qty" class="qtystyle" value="1" min="1" max="1">
                                 <input type="hidden" name="product_img" value="<?= get_image($course[0]['tutorial_image'], $course[0]['tutorial_image_path']) ?>" class="productimage" value="">
                                 <input type="hidden" name="product_price" value="0" class="productprice">
                                 <input type="hidden" name="product_id" value="<?= $course[0]['tutorial_id'] ?>" class="productid">
                                 <input type="hidden" name="product_name" value="7- Day Access to Mind Cloud Tribe: allows you to see 7 tutorial" class="productname">
                                 <li><a href="<?= l('account/profile/expert-detail-tutorial') ?>?courseid=<?= $course[0]['tutorial_id'] ?>">Continue Expert Tutorial
                                       <!--  -->
                                    </a></li>
                                 <!-- 
                           </form> -->
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section class="jrnySec hding-2 pad-sec para">
            <div class="container">
               <div class="jr-top">
                  <div class="jrnyHead">
                     <h2>About this <strong>Tutorial</strong></h2>
                     <p><?= html_entity_decode($course[0]['tutorial_desc2']) ?></p>
                  </div>
                  <div class="space"><br><br><br></div>
                  <div class="jrnyFaq">
                     <h2>Tutorial Content</h2>
                     <div class="sapace"><br><br></div>
                     <ul class="colasebar">
                        <li>
                           <div class="faqBox">
                              <a href="<?= l('account/profile/expert-detail-tutorial-intro-video') ?>?courseid=<?= $course[0]['tutorial_id'] ?>">
                                 <i class="fas fa-video"></i> Intro Video</a>
                           </div>
                        </li>
                        <li>
                           <div class="faqBox">
                              <span><i class="fas fa-scroll"></i>Description</span>
                              <div class="expandable">
                                 <?= html_entity_decode($course[0]['tutorial_desc2']) ?>
                              </div>
                           </div>
                        </li>
                        
                        <? if (isset($lc) and array_filled($lc)) : ?>
                           <? foreach ($lc as $key => $value) : ?>

                              <li>
                                 <div class="faqBox">
                                    <a href="<?= l('account/profile/expert-detail-tutorial-video') ?>?courseid=<?= $course[0]['tutorial_id'] ?>&tutorialid=<?= $value['videos_id'] ?>">
                                       <i class="fas fa-video"></i> Video and Transcript</a>
                                 </div>
                              </li>

                           <? endforeach; ?>
                        <? endif; ?>
                        <? // if(isset($lc) AND array_filled($lc)) :
                        ?>
                        <? //foreach($lc as $key=>$value):
                        ?>
                        <!-- <li>
                     <div class="faqBox">
                        <span><i class="fas fa-lock"></i><? //=$value['tutorial_name']
                                                         ?></span>
                        <div class="expandable">
                           <? //=html_entity_decode($value['tutorial_desc'])
                           ?>
                        </div>
                        <span><? //=price($course[0]['course_price'])
                              ?></span>
                  </li> -->
                        <? // endforeach;
                        ?>
                        <? //endif;
                        ?>
                     </ul>
                  </div>
               </div>
               <!-- <div class="jr-btm">
            <div class="user-review">
               <h2>User <strong> Reviews </strong></h2>
               <div class="space"><br><br></div>
               <div class="row">
                  <div class="col-lg-1 col-md-12">
                     <div class="profile-img">
                        <img src="<?= i('') ?>whoSec/1.png" alt="">
                     </div>
                  </div>
                  <div class="col-lg-11 col-md-12">
                     <div class="usr-review">
                        <h3>Jacob Evans</h3>
                        <div class="space"><br></div>
                        <ul class="usr-rating">
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                        </ul>
                        <p>August 6, 2020</p>
                     </div>
                     <div class="user-content">
                        <p>I had an amazing learning experience. Would highly recommend for anyone looking to learn Customer Experience</p>
                     </div>
                  </div>
               </div>
               <div class="space"><br><br><br></div>
               <div class="row">
                  <div class="col-lg-1 col-md-12">
                     <div class="profile-img">
                        <img src="<?= i('') ?>whoSec/1.png" alt="">
                     </div>
                  </div>
                  <div class="col-lg-11 col-md-12">
                     <div class="usr-review">
                        <h3>Samantha Rohany</h3>
                        <div class="space"><br></div>
                        <ul class="usr-rating">
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                        </ul>
                        <p>August 6, 2020</p>
                     </div>
                     <div class="user-content">
                        <p>I like the instructors adaptive teaching methods. Really helped me improve the performance of my company products Customer Experience and it showed immediate results!</p>
                     </div>
                  </div>
               </div>
            </div>
         </div> -->
            </div>
         </section>
         <section class="joinSec cloud-sec hding-2 para">
            <div class="joinContent">
               <h2><?= $con1['cms_page_title'] ?></h2>
               <div class="space"><br></div>
               <?= html_entity_decode($con1['cms_page_content']) ?>
               <div class="space"><br><br></div>
               <a href="javascript:void(0)" class="btn-theme btn-hover">Start Free Trial <span></span></a>
            </div>
         </section>
         <div class="space"><br><br><br><br></div>
         <section class="whoSec cloudSec hding-2 para">
            <div class="container">
               <div class="whoHead">
                  <h2>Related <strong> Tutorials </strong></h2>
               </div>
               <div class="space"><br><br><br></div>
               <? if (empty($popular)) { ?>
                  <h1 class="text-center" style="color: #000; font-size:30px; font-weight:700;">Course Not Found</h1>
               <? } else { ?>
                  <ul class="who-list tut-list">
                     <?php if (isset($popular) && array_filled($popular)) : ?>
                        <?php foreach ($popular as $key => $value) : ?>
                           <li>
                              <div class="vid-box">

                                 <a href="<?= g('db.admin.bucket') . $course[0]['tutorial_video'] ?>" data-fancybox="media">
                                    <div class="video-box">
                                       <img src="<?= get_image($value['tutorial_image'], $value['tutorial_image_path']) ?>">
                                       <span><i class="fas fa-play"></i></span>
                                    </div>
                                 </a>
                                 <div class="vid-content">
                                    <h4 style="color: #000;"><?= $value['tutorial_name'] ?></h4>
                                    <div class="row align-items-center pt-70">
                                       <div class="col-md-8">
                                          <ul class="rating">
                                             <?php
                                             for ($x = 1; $x <= $value['tutorial_rating']; $x++) { ?>
                                                "
                                                <li><img src="<?= i('') ?>icons/rat-l.svg"></li>
                                                ";
                                             <? } ?>
                                          </ul>
                                       </div>
                                       <div class="col-md-4 text-right">
                                          <h6><?= price($value['tutorial_price']) ?></h6>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </ul>
               <? } ?>
            </div>
         </section>
         <section class="joinSec hding-2 para">
            <div class="joinContent">
               <h2> <strong><?= $con2['cms_page_title'] ?></strong></h2>
               <div class="space"><br></div>
               <?= html_entity_decode($con2['cms_page_content']) ?>
               <div class="space"><br><br></div>
               <div class="btn-group">
                  <a href="javascript:void(0)" class="btn-theme btn-hover">1-Year Access $20/ month <span></span></a>
                  <a href="javascript:void(0)" class="btn-theme btn-transparent btn-hover">Take this Tutorial for $15 <span></span></a>
               </div>
            </div>
         </section>
         <section class="faqSec hding-2 para">
            <div class="container">
               <div class="faqHead">
                  <h2>FAQs about <strong>Learning Journey</strong></h2>
               </div>
               <ul class="colasebar">
                  <? if (isset($faq) and array_filled($faq)) : ?>
                     <? foreach ($faq as $key => $value) : ?>
                        <li>
                           <div class="faqBar">
                              <span><?= $value['faq_question'] ?> <i class="fal fa-angle-down"></i></span>
                              <div class="expandable">
                                 <?= html_entity_decode($value['faq_answer']) ?>
                              </div>
                           </div>
                        </li>
                     <? endforeach; ?>
                  <? endif; ?>
               </ul>
            </div>
         </section>

      </div>
   </section>
</div>