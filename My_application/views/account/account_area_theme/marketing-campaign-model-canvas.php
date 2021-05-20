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
                                 <li><a href="#">Marketing Campaign Model Canvas</a></li>
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
                                 <h4>Tool and Tool Builder - Marketing Campaign Model Canvas</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Marketing Campaign Model Canvas. </strong></p>
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
                                 <p>Marketing Campaign Model Canvas</p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">
                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_mc_mc_id DESC";
                                    $param['where']['tool_builder_mc_mc_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_mc_mc->find_one_active($param);
                                    ?>
                                    <form id="form-mcmc1">
                                    <input type="hidden" name="tool_builder_mc_mc[tool_builder_mc_mc_user_id]" value="<?= ($this->userid) ?>">
                                       <div class="fld-textarea">
                                          <label for="">Prospect Personas <span>List the different segments of your target customers with their defined personas and archetypes (by gender, age, interests, occupation, social status, hangouts, education, etc.)</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_prospect_personas]"><?= $tool['tool_builder_mc_mc_prospect_personas'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Prospect Problems <span>Use the Value Proposition Canvas to understand your target customers’ pains and gains, frame the problem they have and the job they need to be done, and give them the best solution for it.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_prospect_problems]"><?= $tool['tool_builder_mc_mc_prospect_problems'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Value Proposition <span>Define your Value Proposition in connection to your Prospect Personas, and relevant to the Prospect Problems. What is your unique offering to your customers and why they care?</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_value_proposition]"><?= $tool['tool_builder_mc_mc_value_proposition'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Channels <span>List all the channels to get your message out in relation to each of your segments. Examples: targeted emails, print, social media. (Be aware of corresponding budgets).</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_channels]"><?= $tool['tool_builder_mc_mc_channels'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Content <span>List your key content messages, examples: catchy phrases, videos, articles, infographics, reports, blog, etc. Map your content strategy per customer segments, channels and customer journey phases.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_content]"><?= $tool['tool_builder_mc_mc_content'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Key Activities <span>List all your activities by tactics, schedule, milestones. Examples of tactics: lead generation, lead nurturing, demand generation, content-driven marketing, media buys, email marketing, web marketing. </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_key_activities]"><?= $tool['tool_builder_mc_mc_key_activities'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Key Metrics <span>For every key Activities and Channels, identify the corresponding metrics, quantify them, put the processes in place to track, measure and assess. Examples: number of readership for the Blog Channel, open rate for newsletter, number of attendees for events.</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_key_metrics]"><?= $tool['tool_builder_mc_mc_key_metrics'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">Cost Structure <span>Set budgets for activities per channel based on industry, target market, competitive spending. What to do in-house, what to engage partners and agencies for?</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_kost_structure]"><?= $tool['tool_builder_mc_mc_kost_structure'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">ROI <span>Have a quantified, realistic projections of how the campaign investment will generate leads and/or revenue, market share, etc. Calculate your ROI according to your projected revenues and based on your set budgets. Validate and correct as you go!</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_mc_mc[tool_builder_mc_mc_roi]"><?= $tool['tool_builder_mc_mc_roi'] ?></textarea>
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