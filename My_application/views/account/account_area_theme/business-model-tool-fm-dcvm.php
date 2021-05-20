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
                                    <li><a href="#">Business Model Canvas</a></li>
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
                                    <h4>Tool and Tool Builder - Business Model Canvas</h4>
                                    <div class="space"><br></div>
                                    <p>Complete these steps to build your <strong> Business Model Canvas. </strong></p>
                                </div>
                                <div class="col-lg-3 col-md-12 text-right">
                                    <a href="#"> <img src="assets/images/dashboard/home/icons/4.svg" alt=""></a>
                                </div>
                            </div>
                            </div>
                        </div> 

                        <div class="tutorial-footer tool-footer vid-tran para">
                            <div class="tutorial-footer-content" style="padding: 0;">
                                    

                                    <ul class="form-tabing">
                                       <div class="fld-html">
                                          <p>Discounted Cash Flow Valuation</p>
                                       </div>
                                    </ul>      

                                    <div class="box-1 showfirst" style="">      

                                          <div id="radio1" class="multi-fld">

                                             <div class="tab">

                                                <? 
                                                $param = array();
                                                $param['order'] = "tool_builder_id DESC";
                                                $param['where']['tool_builder_user_id'] = $this->userid;
                                                $tool = $this->model_tool_builder_fm_dcvm->find_one_active($param); 
                                                ?>
                                                
                                                 <form id="form-dcvm" class="next-prevBtn">
                                                     <div class="fld-text">
                                                        <input type="text" name="tool_builder_fm_dcvm[tool_builder_currency]" value="<?= $tool['tool_builder_currency'] ?>" placeholder="Currency">
                                                     </div>

                                                     <div class="fld-textarea">
                                                        <label for="">Step 1: Net Profit or Cash Flow from Year 1 <span> Note down your Net Profit or Cash Flow from Year 1 (CF)</span></label>
                                                     </div>

                                                     <table class="table table-responsive-md">
                                                      <tbody>
                                                        <tr class="align-items-center">
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="net_profit" onkeyup="calc_tool_dcvm_values()" name="tool_builder_fm_dcvm[tool_builder_net_profit]" value="<?= $tool['tool_builder_net_profit'] ?>">
                                                            </div>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>

                                                    <div class="fld-textarea">
                                                        <label for="">Step 2: Note down the Growth Rate (i.e. 3 for 3%) (GR)<span>We will have the projected Net Profits for coming years by multiplying with growth rate (GR): CF(n+1) = CF * (1+GR)</span></label>
                                                     </div>

                                                     <table class="table table-responsive-md">
                                                      <tbody>
                                                        <tr class="align-items-center">
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="growth_rate" onkeyup="calc_tool_dcvm_values()" name="tool_builder_fm_dcvm[tool_builder_growth_rate]" value="<?= $tool['tool_builder_growth_rate'] ?>">
                                                            </div>
                                                          </td>
                                                          <td>%</td>
                                                        </tr>
                                                      </tbody>
                                                    </table>

                                                    <table class="table table-responsive-md">
                                                      <thead>
                                                        <th>Net Profit </th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <th>Year2</th>
                                                          <th>Year3</th>
                                                          <th>Year4</th>
                                                          <th>Year5</th>
                                                        </tr>
                                                        <tr class="align-items-center">
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="net_profit_year_2" name="tool_builder_fm_dcvm[tool_builder_net_profit_year_2]" value="<?= $tool['tool_builder_net_profit_year_2'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="net_profit_year_3" name="tool_builder_fm_dcvm[tool_builder_net_profit_year_3]" value="<?= $tool['tool_builder_net_profit_year_3'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="net_profit_year_4" name="tool_builder_fm_dcvm[tool_builder_net_profit_year_4]" value="<?= $tool['tool_builder_net_profit_year_4'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="net_profit_year_5" name="tool_builder_fm_dcvm[tool_builder_net_profit_year_5]" value="<?= $tool['tool_builder_net_profit_year_5'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>

                                                    <div class="fld-textarea">
                                                        <label for="">Discount rate (r)<span>Step 3: Note down your discount rate (r) – usually between 10% and 20%</span></label>
                                                     </div>

                                                     <table class="table table-responsive-md">
                                                      <tbody>
                                                        <tr class="align-items-center">
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="discount_rate" onkeyup="calc_tool_dcvm_values()" name="tool_builder_fm_dcvm[tool_builder_discount_rate]" value="<?= $tool['tool_builder_discount_rate'] ?>">
                                                            </div>
                                                          </td>
                                                          <td>%</td>
                                                        </tr>
                                                      </tbody>
                                                    </table>

                                                    <table class="table table-responsive-md">
                                                      <thead>
                                                        <th>DCFs </th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <th>Year1</th>
                                                          <th>Year2</th>
                                                          <th>Year3</th>
                                                          <th>Year4</th>
                                                          <th>Year5</th>
                                                        </tr>
                                                        <tr class="align-items-center">
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="discount_rate_year_1" name="tool_builder_fm_dcvm[tool_builder_discount_rate_year_1]" value="<?= $tool['tool_builder_discount_rate_year_1'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="discount_rate_year_2" name="tool_builder_fm_dcvm[tool_builder_discount_rate_year_2]" value="<?= $tool['tool_builder_discount_rate_year_2'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="discount_rate_year_3" name="tool_builder_fm_dcvm[tool_builder_discount_rate_year_3]" value="<?= $tool['tool_builder_discount_rate_year_3'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="discount_rate_year_4"name="tool_builder_fm_dcvm[tool_builder_discount_rate_year_4]" value="<?= $tool['tool_builder_discount_rate_year_4'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="discount_rate_year_5" name="tool_builder_fm_dcvm[tool_builder_discount_rate_year_5]" value="<?= $tool['tool_builder_discount_rate_year_5'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>

                                                    <div class="fld-textarea">
                                                        <label for="">Step 4: Calculate Discounted Cash Flows by summing up all discounted cash flows. The formula is: </label>
                                                     </div>

                                                     <table class="table table-responsive-md">
                                                      <tbody>
                                                        <tr class="align-items-center">
                                                          <td>
                                                            <img src="assets/images/fomula.webp">
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>

                                                    <div class="fld-textarea">
                                                        <label for="">Note: Usually we sum up to the next 5 years in cash flows. </label>
                                                     </div>

                                                     <table class="table table-responsive-md">
                                                      <tbody>
                                                        <tr class="align-items-center">
                                                          <th>DCF Value</th>
                                                          <td>
                                                            <div class="fld-text mb-0">
                                                              <input type="text" id="dcf_value" name="tool_builder_fm_dcvm[tool_builder_dcf_value]" value="<?= $tool['tool_builder_dcf_value'] ?>" placeholder="0">
                                                            </div>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>



                                                    
                                                     <div>
                                                         <button id="forms-tool_builder-btn1" type="submit">SUBMIT</button>
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