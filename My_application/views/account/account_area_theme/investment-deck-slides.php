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
                                 <li><a href="#">Investment Deck Slides</a></li>
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
                                 <h4>Tool and Tool Builder - Investment Deck Slides</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Investment Deck Slides. </strong></p>
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
                                 <p>Investment Deck Slides</p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">
                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_ids_id DESC";
                                    $param['where']['tool_builder_ids_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_ids->find_one_active($param);
                                    // debug($tool);
                                    ?>

                                    <form id="form-ids1" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide One: Value Proposition <span>Tell what you are doing
                                                <br>
                                                Tell what your value proposition is
                                                <br>
                                                Tell your “why”
                                                <br>
                                                <b>Note:</b> Have a powerful short statement! Insert your logo and/or meaningful picture.
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_value_proposition]"><?= $tool['tool_builder_ids_value_proposition'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn1" type="submit">SUBMIT</button>
                                       </div>



                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids2" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide Two: What is the Problem ?<span>
                                                What is the problem or unmet need that you are solving?
                                                <br>
                                                <b>Note:</b> As best as you can, try to tell a relatable story when you are defining the problem. The more you can make the problem real and relatable, the more your audience/investors will understand your business and your goals.
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_problem]"><?= $tool['tool_builder_ids_problem'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn2" type="submit">SUBMIT</button>
                                       </div>



                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids3" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide Three: Bringing the Solution <span>
                                                <br>
                                                How does your solution alleviate customer pains? How do you solve your customer's problems or needs that you spoke about in Slide Two?
                                                <br>
                                                <b>Note:</b> In this slide you describe your product / service and the features. Reveal your product/service with a strong statement, an infographic or even a video! (Better to show than tell)
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_bringing_solution]"><?= $tool['tool_builder_ids_bringing_solution'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn3" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids4" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide Four: Market Target & Size<span>

                                                Who are your target customers? What is their profile? How many of them is there?
                                                <br>
                                                What is the Market Size?
                                                <br>
                                                How large is the market? (Industry numbers and key statistics)
                                                <br>
                                                How do you position your company in that market: what percentage of that market you are projecting to reach? Be very specific about the segments you want and can reach from the market.
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_market_target_size]"><?= $tool['tool_builder_ids_market_target_size'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn4" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids5" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide Five: Go-to-Market Strategies<span>

                                                This slide is the summary of the marketing and sales strategies to reach your market share in Slide Four.
                                                <br>
                                                Detail the key tactics that you are planning to implement to reach your target customers:
                                                <br>
                                                How will you reach and acquire customers?
                                                <br>
                                                What are your channels?
                                                <br>
                                                What are your geographies?
                                                <br>
                                                Who are your partners?
                                                <br>
                                                How do you position your company in that market: what percentage of that market you are projecting to reach? Be very specific about the segments you want and can reach from the market.
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_go_to_market_strategies]"><?= $tool['tool_builder_ids_go_to_market_strategies'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn5" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids6" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide Six: Competitive Landscape<span>

                                                List who are the competitors
                                                <br>
                                                Make a comparative table between your company and competitors. List all the possible features and how you compare towards them (best is to show that you tick all the possible features on all your competitors combined).

                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_competitive_landscape]"><?= $tool['tool_builder_ids_competitive_landscape'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn6" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids7" class="next-prevBtn">

                                       <div class="fld-textarea">
                                          <label for="">Slide Seven: Business/Revenue Model<span>

                                                This slide is the most important for investors who need to see here that you have a viable business model. You detail in this slide as concisely as possible:
                                                <br>
                                                how does your company make money?
                                                <br>
                                                what is your revenue model. Is it: freemium model, subscription model, transactional model, Advertising model, etc.
                                                <br>
                                                <b> Note:</b> You can also reference the competitive landscape of Slide Six here and discuss how your pricing fits within that landscape. Is your positioning premium offering, average offering or budget offering for example?
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_business_revenue_model]"><?= $tool['tool_builder_ids_business_revenue_model'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn7" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids8" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">Slide Eight: Traction & Timeline<span>

                                                If you have some traction already, show that traction. Show your Cost of Acquisition per Customer. Can it be optimized? (This is powerful for investors because traction shows that you have a proven model)
                                                <br>
                                                If you don’t have any traction yet, state how much money is needed to grow, and to how much can you grow?
                                                <br>
                                                Add an execution timeline or roadmap of key milestones: What goals have you achieved so far and what are the main next steps you plan on taking?

                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_traction_timeline]"><?= $tool['tool_builder_ids_traction_timeline'] ?></textarea>
                                       </div>


                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn8" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids9" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">Slide Nine: Execution Team<span>

                                                List the key managerial team members by work history, skills, education and position/value within your company.
                                                <br>
                                                <b>Note:</b> Investors want to see a team that is cohesive, works well together, is committed to the company and has a diversity of skills so they can navigate the setbacks and changing nature of the startup.

                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_execution_team]"><?= $tool['tool_builder_ids_execution_team'] ?></textarea>
                                       </div>


                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn9" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids10" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">Slide Ten: Financial Data<span>

                                                List your key assumptions and metrics (be ready to discuss them and be realistic)
                                                <br>
                                                Put charts that show sales, total customers, total expenses, and profits.
                                                <br>
                                                Put Three or Five year P&L, Cash Flows & Balance Sheet Mention your Company’s Valuation (if you have it)
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_financial_data]"><?= $tool['tool_builder_ids_financial_data'] ?></textarea>
                                       </div>


                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn10" type="submit">SUBMIT</button>
                                       </div>

                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-ids11" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">Slide Eleven: Your Ask!<span>
                                                What do you need to get the company going?
                                                <br>
                                                Do you need Investment money? (And where will this money go)
                                             </span></label>
                                          <div class="space"><br><Br></div>
                                          <textarea name="tool_builder_ids[tool_builder_ids_your_ask]"><?= $tool['tool_builder_ids_your_ask'] ?></textarea>
                                       </div>


                                       <div style="display:none;">
                                          <button id="forms-tool_builder-btn11" type="submit">SUBMIT</button>
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