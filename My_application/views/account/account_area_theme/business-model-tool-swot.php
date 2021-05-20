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
                                 <li><a href="#">SWOT Analysis</a></li>
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
                                 <h4>Tool and Tool Builder - SWOT Analysis</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> SWOT Analysis. </strong></p>
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
                                 <p>SWOT Analysis</p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <!-- <div class="fld-html">
                                             <ul class="fld-progress">
                                                <li class="step"><p>Customer Segments</p></li>
                                                <li class="step"><p>Value Propositions</p></li>
                                             </ul>
                                          </div> -->

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">

                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_id DESC";
                                    $param['where']['tool_builder_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_swot->find_one_active($param);

                                    ?>

                                    <form id="form-send_swot1">
                                       <input type="hidden" name="tool_builder_swot[tool_builder_user_id]" value="<?= ($this->userid) ?>">
                                       <div class="fld-textarea">
                                          <label for="">Strengths <span>List your internal attributes that may make your business more likely to succeed</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_swot[tool_builder_strengths]"><?= $tool['tool_builder_strengths'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Weaknesses <span>List your internal attributes that can make your business less likely to succeed </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_swot[tool_builder_weaknessess]"><?= $tool['tool_builder_weaknessess'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Opportunities <span>List the external factors that have the potential to increase profits, productivity or benefit your business</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_swot[tool_builder_opportunities]"><?= $tool['tool_builder_opportunities'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Threats <span>List the external factors that have the potential to harm your business</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_swot[tool_builder_threats]"><?= $tool['tool_builder_threats'] ?></textarea>
                                       </div>

                                       <div style="display:none">
                                          <button type="submit" id="forms-tool_builder-btn1">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div style="overflow:auto;">
                                    <div class="next-prevBtn" style="float:right;">
                                       <button type="button" id="nextBtn1" onclick="nextPrev(1)">Submit</button>
                                    </div>
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