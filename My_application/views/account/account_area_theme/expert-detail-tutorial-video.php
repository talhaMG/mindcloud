<div class="business-page">
   <section class="dashboard">

      <ul class="dashboard-layout">
         <li>
            <div class="front-dashboard">
               <a href="#" class="menu-dash-front">MENU<i class="fal fa-bars"></i></a>
               <? $this->load->view("widgets/dashboard-menu-box"); ?>
            </div>
         </li>

         <li>
            <? $this->load->view("widgets/expert-course-box"); ?>
         </li>

         <li>
            <div class="tutorial-box">
               <div class="tutorial-scroll-content">
                  <div class="tutorial-content">
                     <div class="tutorial-head">
                        <div class="row align-items-center">
                           <div class="col-md-7">
                              <ul class="bredcum-links">
                                 <li><a href="#">Learning Journey</a></li>
                                 <li><a href="#">Business Model Canvas</a></li>
                                 <li><a href="#">Video and Transcript</a></li>
                              </ul>
                           </div>
                           <div class="col-md-5 text-right">
                              <div class="bredcum-right">
                                 <a href="#" class="btn-round btn-hover">In progress <span></span></a>

                                 <ul class="indicator-links">
                                    <li><a href="#"><i class="fal fa-angle-left"></i></a></li>
                                    <li><a href="#"><i class="fal fa-angle-right"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="tutorial-mid hding-4 hding-3 para">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="tutorial-mid-content">
                                 <h4>Tutorial and Transcript</h4>
                                 <div class="space"><br></div>
                                 <div class="video-caption">
                                    <p>00:00:00</p>
                                    <div class="space"><br></div>
                                    <?= html_entity_decode($tutorial_detail['videos_transcript']) ?>
                                    <div class="space"><br><br></div>

                                    <p>00:01:16</p>
                                    <div class="space"><br></div>
                                    <p>We will learn - What is CX and what is</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="video-box">
                              <?php
                              // debug($tutorial_detail);
                              ?>
                                 <video width="100%" height="100%" poster="<?= g('db.admin.bucketimg') . $tutorial_detail['videos_image2'] ?>" controls>
                                    <source src="<?= g('db.admin.bucket') .'videos/'. $tutorial_detail['videos_image'] ?>" type="video/mp4">
                                    <source src="<?= g('db.admin.bucket') .'videos/'. $tutorial_detail['videos_image'] ?>" type="video/ogg">
                                    Your browser does not support the video tag.
                                 </video>
                              </div>
                           </div>
                        </div>
                        <div class="space"><br><br></div>
                        <!-- <p>All rights belong to their respective owners. The Business Model Canvas was created and owned by <a href="https://www.strategyzer.com/">Strategyzer</a></p> -->
                     </div>
                     <div class="tutorial-footer vid-tran para">
                        <div class="tutorial-footer-content">
                           <p>Complete this tutorials to receive Certificate.</p>
                           <? //ucfirst($this->session_data['username']);
                           ?>
                           <? //print_r($this->session->userdata); 
                           ?>
                           <? //print_r($this->session_data['id']); 
                           ?>
                           <? //print_r($this->session_data['username']); 
                           ?>

                           <div classs="space"><br><br></div>
                           <form id="forms-tutorial-review_us">
                              <div class="fld-textarea">

                                 <input type="hidden" name="expert_tutorial_review[tutorial_review_user_id]" value="<?= $this->session_data['id'] ?>">
                                 <input type="hidden" name="expert_tutorial_review[tutorial_review_course_id]" value="<?= $courseid ?>">
                                 <input type="hidden" name="expert_tutorial_review[tutorial_review_tutorial_id]" value="<?= $_GET['tutorialid'] ?>">
                                 <input type="hidden" name="expert_tutorial_review[tutorial_review_stars]" id="reviewId" value="">
                              </div>
                              <div class="fld-textarea">
                                 <textarea name="expert_tutorial_review[tutorial_review_desc]" placeholder="Write a Review…"></textarea>
                              </div>
                              <div class="space"><br></div>

                              <div class="row align-items-center">
                                 <div class="col-md-4">
                                    <!-- <ul class="rating">
                                       <li><span>1</span><img src="<?= i('') ?>icons/rat-d.svg"></li>
                                       <li><span>2</span><img src="<?= i('') ?>icons/rat-d.svg"></li>
                                       <li><span>3</span><img src="<?= i('') ?>icons/rat-d.svg"></li>
                                       <li><span>4</span><img src="<?= i('') ?>icons/rat-d.svg"></li>
                                       <li><span>5</span><img src="<?= i('') ?>icons/rat-d.svg"></li>
                                    </ul> -->
                                    <section class='rating-widget'>
                                       <!-- Rating Stars Box -->
                                       <div class='rating-stars'>
                                          <ul id='stars'>
                                             <li class='star' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                             </li>
                                          </ul>
                                       </div>

                                    </section>
                                 </div>
                                 <div class="col-md-8 text-right">
                                    <div class="fld-link">
                                       <button>Skip</button>
                                    </div>
                                    <div class="fld-btn">
                                       <input type="submit" value="Submit Your Review" id="forms-tutorial-review_us-btn">
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </li>
      </ul>
   </section>
</div>
<style>
   * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
   }

   *:before,
   *:after {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
   }


   .text-center {
      text-align: center;
   }


   /* Rating Star Widgets Style */
   .rating-stars ul {
      list-style-type: none;
      padding: 0;

      -moz-user-select: none;
      -webkit-user-select: none;
   }

   .rating-stars ul>li.star {
      display: inline-block;

   }

   /* Idle State of the stars */
   .rating-stars ul>li.star>i.fa {
      font-size: 18px;
      /* Change the size of the stars */
      color: #ccc;
      /* Color on idle state */
   }

   /* Hover state of the stars */
   .rating-stars ul>li.star.hover>i.fa {
      color: #FFCC36;
   }

   /* Selected state of the stars */
   .rating-stars ul>li.star.selected>i.fa {
      color: #FF912C;
   }
</style>


<script>
   $(document).ready(function() {

      /* 1. Visualizing things on Hover - See next part for action on click */
      $('#stars li').on('mouseover', function() {
         var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

         // Now highlight all the stars that's not after the current hovered star
         $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
               $(this).addClass('hover');
            } else {
               $(this).removeClass('hover');
            }
         });

      }).on('mouseout', function() {
         $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
         });
      });


      /* 2. Action to perform on click */
      $('#stars li').on('click', function() {
         var onStar = parseInt($(this).data('value'), 10); // The star currently selected
         var stars = $(this).parent().children('li.star');

         for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
         }

         for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
         }

         // JUST RESPONSE (Not needed)

         var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
         var msg = "";
         if (ratingValue > 0) {
            msg = parseInt(ratingValue);

            $('#reviewId').val(msg)
         } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
         }
         responseMessage(msg);

      });


   });


   function responseMessage(msg) {
      $('.success-box').fadeIn(200);
      $('.success-box div.text-message').html("<span>" + msg + "</span>");
   }
</script>