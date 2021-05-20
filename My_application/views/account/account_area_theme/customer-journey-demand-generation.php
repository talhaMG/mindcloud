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
                                 <li><a href="#">Customer Journey</a></li>
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
                                 <h4>Tool and Tool Builder - Customer Journey</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Customer Journey. </strong></p>
                              </div>
                              <div class="col-lg-3 col-md-12 text-right">
                              <a href="<?= base_url()?>account/profile/dl_tools_vp"><img src="<?= base_url()?>/assets/front_assets/images/dashboard/home/icons/dl.svg" alt=""></a>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="tutorial-footer tool-footer vid-tran para">
                        <div class="tutorial-footer-content" style="padding-top: 22%;">


                           <ul class="form-tabing">
                              <div class="fld-html">
                                 <p>Customer Journey</p>
                                 <p>Demand Generation</p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <div class="fld-html">
                                 <ul class="fld-progress">
                                    <li class="step">
                                       <p>Customer Segments</p>
                                    </li>
                                    <li class="step">
                                       <p>Value Propositions</p>
                                    </li>
                                    <li class="step">
                                       <p>Customer Segments</p>
                                    </li>
                                 </ul>
                              </div>

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">
                                 <?

                                    $param = array();
                                    $param['order'] = "tool_builder_cj_dg_id DESC";
                                    $param['where']['tool_builder_cj_dg_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_cj_dg->find_one_active($param);

                                    // debug($tool);

                                    ?>
                                    <form id="form-cjdg1" class="next-prevBtn">
                                    <input type="hidden" name="tool_builder_cj_dg[tool_builder_cj_dg_user_id]" value="<?= ($this->userid) ?>">
                                       <div class="fld-textarea">
                                          <label for="">1. Awareness & Knowledge Phase <span>How will you attract attention, gain visibility, and show customers how you can help them reach their goals and get what they want and need? Examples are SEO, Interesting Content, YouTube Videos, FB Ads, Influencers Campaigns, Events.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_awareness]"><?= $tool['tool_builder_cj_dg_awareness'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">2. Engagement or Interest Phase <span>How can you engage further your leads by providing additional information about your products and services? Examples are Communities, Whatsapp/Messenger Chat, Nurturing Emails.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_engagement]"><?= $tool['tool_builder_cj_dg_engagement'] ?></textarea>
                                       </div>
                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn1" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-cjdg2" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">3. Consideration, Evaluation or Intent Phases <span>What key differentiators and competitive advantages will be used to educate your potential leads further on your offering? Examples are Emails, Videos or material showing results, outcomes, and benefits of your solution</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_consideration]"><?= $tool['tool_builder_cj_dg_consideration'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4. Purchase Phase (mid way!)<span>What tools, processes, and paths will you use to support your customers to make their purchase?</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_purchase]"><?= $tool['tool_builder_cj_dg_purchase'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5. Activation Phase<span>Formalize further the relationship with your actual buyers or users by developing trust. Examples are Excellent customer service after sale, Product/services integrity, ethical standards and consistency, show your customers that they are important to you through emails, follow-up, etc.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_activation]"><?= $tool['tool_builder_cj_dg_activation'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">6. Repeat Phase<span>How will you capitalize on the trust gained with your customer? Examples are Add-Ons, Upsells, Bundles, Experience Enhancers, Membership</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_repeat]"><?= $tool['tool_builder_cj_dg_repeat'] ?></textarea>
                                       </div>
                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn2" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-cjdg3" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">7. Loyalty Phase <span>How will you further reward your loyal customers? Examples are Loyalty coupons, easy payment plans, special offers.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_loyalty]"><?= $tool['tool_builder_cj_dg_loyalty'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">8. Advocacy Phase<span>How can you capitalize on your loyal customers to generate awareness, trust, and credibility with their own audience – which helps you acquire more customers? Examples are Testimonial, Repost, Contest, Affiliate Program</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_cj_dg[tool_builder_cj_dg_advocacy]"><?= $tool['tool_builder_cj_dg_advocacy'] ?></textarea>
                                       </div>
                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn3" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                              </div>


                              <div class="next-prevBtn" style="overflow:auto;">
                                 <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
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