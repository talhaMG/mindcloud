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
            <? $this->load->view("widgets/course-box"); ?>
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
                                 <li><a href="#">Online Sales Funnel</a></li>
                                 <li><a href="#">Tool and Tool Builder</a></li>
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

                     <div class="tutorial-mid tool-mid hding-4 hding-3 para">
                        <div class="tutorial-mid-content">
                           <div class="row align-items-center">
                              <div class="col-lg-9 col-md-12">
                                 <h4>Tool and Tool Builder - Online Sales Funnel</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Online Sales Funnel. </strong></p>
                              </div>
                              <div class="col-lg-3 col-md-12 text-right">
                              <a href="<?= base_url()?>account/profile/dl_tools_vp"><img src="<?= base_url()?>/assets/front_assets/images/dashboard/home/icons/dl.svg" alt=""></a>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="tutorial-footer tool-footer vid-tran para">
                        <div class="tutorial-footer-content" style="padding: 0;">


                           <ul class="form-tabing">
                              <div class="fld-html">
                                 <p>Online Sales Funnel</p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">
                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_osf_id DESC";
                                    $param['where']['tool_builder_osf_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_osf->find_one_active($param);

                                    ?>
                                    <form id="form-osf">
                                    <input type="hidden" name="tool_builder_osf[tool_builder_osf_user_id]" value="<?= ($this->userid) ?>">
                                       <div class="fld-textarea">
                                          <label for="">Stage 1: Brand Awareness <span>List your best channels to use for awareness and reaching your target customers. (Decide on the corresponding messaging accordingly) Examples are: Websites / Landing Pages, Social Media posts, Blog with informative articles or videos, Ads (magazines, road billboards, Google Adwords, Facebook/Instagram Ads)</span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_brand_awareness]"><?= $tool['tool_builder_osf_brand_awareness'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Stage 2: Lead Gathering <span>Formalize the relationship with leads by gathering their information like name, phone number, email, etc. Decide on your strategies to gather your leads’ info. Examples are: Events RSVP Google Forms, Landing Pages Forms, Newsletters Subscription Forms, Social Media Followers Groups, etc.</span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_lead_gathering]"><?= $tool['tool_builder_osf_lead_gathering'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Stage 3: Lead Qualifying <span>Decide how to convert your prospect customers to paying customers by using tactics that fit your business. Examples are: Personal calls, Nurturing emails with corresponding forms, Events to ask more questions and understand their levels of interest, need and/or eligibility to purchase your solution. </span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_lead_qualifying]"><?= $tool['tool_builder_osf_lead_qualifying'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Stage 4: Sale <span>Make sure to have processes in place for sale and payment like an online shopping store and an online payment system. At this stage, start also measuring, assessing and optimizing your conversion rate through checking the following 4 steps:</span> Step 1: Optimize your Audience <span>Refine your understanding of your audiences by knowing their interests, where they hang out, the profiles of the ones who are a good fit with your offering. Refine your targeted ads and awareness campaigns accordingly.</span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_optimize_audience]"><?= $tool['tool_builder_osf_optimize_audience'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Step 2: Optimize your User Experience <span>Review the user experience from checking a product till paying online, make sure it is simple and has the least possible steps. Make sure you are monitoring whether customers are dropping out at any step of the sales experience, and if anything can be done about that step to be simplified or removed. </span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_optimize_experience]"><?= $tool['tool_builder_osf_optimize_experience'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Step 3: Optimize your Metrics of Success <span><b>Track Conversion Rates:</b> How many people are you reaching with your Facebook Ad? How many people are filling your Google Form after seeing your Ad for your offering? How many are directed to your website? How many website visits per day? How many are spending some time on your website? And how many end up doing a purchase? How many of those are returning customers, etc?<br><b>Measure ROI:</b> How much you are spending per channel or funnel and how much is it converting into paying customers? </span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_optimize_Metrics]"><?= $tool['tool_builder_osf_optimize_Metrics'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Step 4: Optimize your Testing! <span>For example, run 3 or 10 social media ads per different mediums like Facebook, Instagram and LinkedIn. Test through different messaging, design, layouts, colors, or even target audiences. Same for newsletters and landing page, you can test different messages and different forms.</span></label>
                                          <div class="space"><br></div>
                                          <textarea oninput="this.className = ''" name="tool_builder_osf[tool_builder_osf_optimize_testing]"><?= $tool['tool_builder_osf_optimize_testing'] ?></textarea>
                                       </div>


                                       <div>
                                       <button type="submit" class="btn btn-primary btn-lg" id="forms-tool_builder-btn1">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                              </div>


                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </li>


      </ul>
   </section>
</div>