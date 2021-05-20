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
                                 <li><a href="#">Positioning and Marketing Mix</a></li>
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
                                 <h4>Tool and Tool Builder - Positioning and Marketing Mix</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Positioning and Marketing Mix. </strong></p>
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
                                 <p>Positioning and Marketing Mix</p>
                                 <p>Positioning</p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">

                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_id DESC";
                                    $param['where']['tool_builder_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_pmmt->find_one_active($param);
                                    ?>

                                    <form id="form-pmmt1">
                                       <div class="fld-textarea">
                                          <label for="">1. Who/where are your Target Customers? </label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_target_customers]"><?= $tool['tool_builder_target_customers'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">2. What are you Offering?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_offering]"><?= $tool['tool_builder_offering'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">3. Why do they need you?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_need]"><?= $tool['tool_builder_need'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4. What is your Product Category?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_product_category]"><?= $tool['tool_builder_product_category'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5. What is your Price Category?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_price_category]"><?= $tool['tool_builder_price_category'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">6. How is your solution different than that of your competitors?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_solution_competitors]"><?= $tool['tool_builder_solution_competitors'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn1" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-pmmt2">
                                       <div class="fld-textarea">
                                          <label for="">1. What is your Product or Service?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_product_or_service]"><?= $tool['tool_builder_product_or_service'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">2. What are your Pricing Strategies?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_pricing_strategies]"><?= $tool['tool_builder_pricing_strategies'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">3. How/where does your Product reach your customer?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_product_customer]"><?= $tool['tool_builder_product_customer'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4. What type of Promotional Channels will you be using?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_promotional_channels]"><?= $tool['tool_builder_promotional_channels'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5. Who are the People that make up your team?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_people_for_team]"><?= $tool['tool_builder_people_for_team'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">6. What are the different Processes needed for execution?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_execution]"><?= $tool['tool_builder_execution'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">7. How do you ensure great experience, great delivery, etc.?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_pmmt[tool_builder_great_experience]"><?= $tool['tool_builder_great_experience'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn2" type="submit">SUBMIT</button>
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
         </li>


      </ul>
   </section>
</div>