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
                                 <li><a href="#">Value Proposition Canvas</a></li>
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
                                 <h4>Tool and Tool Builder - Value Proposition Canvas</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Value Proposition Canvas. </strong></p>
                              </div>
                              <div class="col-lg-3 col-md-12 text-right">
                                 <a href="<?= base_url()?>account/profile/dl_tools_vp"><img src="<?= base_url()?>/assets/front_assets/images/dashboard/home/icons/dl.svg" alt=""></a>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="tutorial-footer tool-footer vid-tran para">
                        <div class="tutorial-footer-content">


                           <ul class="form-tabing">
                              <div class="fld-html">
                                 <p>Value Map (The left side of the Value Proposition Canvas)</p>
                                 <p>Customer Profile (The right side of the Value Proposition Canvas)</p>
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
                                 </ul>
                              </div>

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">


                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_vp_id DESC";
                                    $param['where']['tool_builder_vp_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_vp->find_one_active($param);

                                    // debug($tool);

                                    ?>


                                    <form id="form-vp1">
                                       <input type="hidden" name="tool_builder_vp[tool_builder_vp_user_id]" value="<?= ($this->userid) ?>">
                                       <div class="fld-textarea">
                                          <label for="">Jobs <span>List all the jobs your customers are trying to get done (jobs can be functional, emotional, or social ones)</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_vp[tool_builder_vp_jobs]"><?= $tool['tool_builder_vp_jobs'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Pains <span>List customer pains, and possible dissatisfying experiences or outcomes that exist in current solutions</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_vp[tool_builder_vp_pains]"><?= $tool['tool_builder_vp_pains'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Gains <span>List customer gains, which is essentially the expectations and benefits customers wish to have, in order to get the most satisfying customer experience</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_vp[tool_builder_vp_gains]"><?= $tool['tool_builder_vp_gains'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn1" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-vp2">
                                       <div class="fld-textarea">
                                          <label for="">Products/Services <span>List the product, service, and features that your value proposition builds on</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_vp[tool_builder_vp_products_services]"><?= $tool['tool_builder_vp_products_services'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Pain Relievers <span>Describe in which ways your product service and features ease customer pains, and make their life easier</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_vp[tool_builder_vp_pain_relievers]"><?= $tool['tool_builder_vp_pain_relievers'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Gain Creators<span>List how your product or service creates customer gains, and offers added value to the customer</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_vp[tool_builder_vp_gain_creators]"><?= $tool['tool_builder_vp_gain_creators'] ?></textarea>
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
            </div>
         </li>


      </ul>
   </section>
</div>