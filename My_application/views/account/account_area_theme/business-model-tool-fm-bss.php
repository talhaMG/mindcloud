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
                                 <li><a href="#">Balance Sheet</a></li>
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
                                 <h4>Tool and Tool Builder - Balance Sheet</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Balance Sheet. </strong></p>
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
                                          <p>Make sure that the left side is equal to the right side: </p>
                                       </div>
                                    </ul>      

                                    <div class="box-1 showfirst" style="">      

                                          <div id="radio1" class="multi-fld">

                                             <div class="tab">
 
                                                <? 
                                                $param = array();
                                                $param['order'] = "tool_builder_id DESC";
                                                $param['where']['tool_builder_user_id'] = $this->userid;
                                                $tool = $this->model_tool_builder_fm_bss->find_one_active($param);
                                                ?>

                                                
                                                 <form id="form-bss" class="next-prevBtn">
                                                            <div class="fld-text">
                                                                <input type="text" name="tool_builder_fm_bss[tool_builder_currency]" value="<?= $tool['tool_builder_currency'] ?>" placeholder="Currency">
                                                            </div>

                                                            <div class="fld-textarea">
                                                                <label for="">Step 1: Assets (Left Side) <span>List and sum up together all your Assets 
                                                                <br>
                                                                – Current Assets: Cash, Accounts Receivables, Inventory, Prepaid Expenses, etc. 
                                                                <br>
                                                                – Fixed Long-term Assets: P,P&E (Property, Plant & Equipment), Long-term Investments,
                                                                <br>
                                                                – Any other Asset
                                                                </span><br> CURRENT ASSETS</label>
                                                            </div>

                                                            <table class="table table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Assets</th>
                                                                <th scope="col">Year1</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-items-center">
                                                                <th>Cash</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_assets_total" onkeyup="calc_tool_bss_values('current_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_cash]" value="<?= $tool['tool_builder_cash'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Accounts Receivable</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_assets_total" onkeyup="calc_tool_bss_values('current_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_accounts_receivable]" value="<?= $tool['tool_builder_accounts_receivable'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Inventory</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_assets_total" onkeyup="calc_tool_bss_values('current_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_inventory]" value="<?= $tool['tool_builder_inventory'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Prepaid Expenses</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_assets_total" onkeyup="calc_tool_bss_values('current_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_prepaid_expenses]" value="<?= $tool['tool_builder_prepaid_expenses'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Short Term Investments</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_assets_total" onkeyup="calc_tool_bss_values('current_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_short_term]" value="<?= $tool['tool_builder_short_term'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <input type="hidden" id="current_assets_total" name="tool_builder_fm_bss[tool_builder_total_current_assets]" value="<?= $tool['tool_builder_total_current_assets'] ?>" placeholder="0">
                                                                
                                                                
                                                            </tbody>
                                                            </table>

                                                            <div class="fld-textarea">
                                                                <label for="">FIXED (LONG-TERM) ASSETS</label>
                                                            </div>

                                                            <table class="table table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Assets</th>
                                                                <th scope="col">Year1</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-items-center">
                                                                <th>Long term Investments</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="fixed_assets_total" onkeyup="calc_tool_bss_values('fixed_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_long_term]" value="<?= $tool['tool_builder_long_term'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Property Plantand Equipment</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="fixed_assets_total" onkeyup="calc_tool_bss_values('fixed_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_property_planted]" value="<?= $tool['tool_builder_property_planted'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>(Less Accumulated Depreciation)</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="fixed_assets_total" onkeyup="calc_tool_bss_values('fixed_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_less_accumulated]" value="<?= $tool['tool_builder_less_accumulated'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Intangible Assets</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="fixed_assets_total" onkeyup="calc_tool_bss_values('fixed_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_intangible_assets]" value="<?= $tool['tool_builder_intangible_assets'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <input type="hidden" id="fixed_assets_total" name="tool_builder_fm_bss[tool_builder_total_fixed_assets]" value="<?= $tool['tool_builder_total_fixed_assets'] ?>" placeholder="0">
                                                                
                                                            </tbody>
                                                            </table>


                                                            <div class="fld-textarea">
                                                                <label for="">OTHER ASSETS</label>
                                                            </div>

                                                            <table class="table table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Assets</th>
                                                                <th scope="col">Year1</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-items-center">
                                                                <th>Deferred Income Tax</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="other_assets_total" onkeyup="calc_tool_bss_values('other_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_deffered_income]" value="<?= $tool['tool_builder_deffered_income'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="text" class="other_assets_total" onkeyup="calc_tool_bss_values('other_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_other_assets_1]" value="<?= $tool['tool_builder_other_assets_1'] ?>" placeholder="Other Assets">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="other_assets_total" onkeyup="calc_tool_bss_values('other_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_other_assets_2]" value="<?= $tool['tool_builder_other_assets_2'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="text" class="other_assets_total" onkeyup="calc_tool_bss_values('other_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_other_assets_3]" value="<?= $tool['tool_builder_other_assets_3'] ?>" placeholder="Other Assets">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="other_assets_total" onkeyup="calc_tool_bss_values('other_assets_total','tool_builder_total_assets')" name="tool_builder_fm_bss[tool_builder_other_assets_4]" value="<?= $tool['tool_builder_other_assets_4'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>
                                                                
                                                                <input type="hidden" id="other_assets_total" name="tool_builder_fm_bss[tool_builder_total_other_assets]" value="<?= $tool['tool_builder_total_other_assets'] ?>" placeholder="0">
                                                                
                                                                <input type="hidden" id="tool_builder_total_assets" name="tool_builder_fm_bss[tool_builder_total_assets]" value="<?= $tool['tool_builder_total_assets'] ?>" placeholder="0">

                                                            </tbody>
                                                            </table>

                                                            <div class="fld-textarea">
                                                                <label for="">Step 2: Liabilities & Owners’ Equity (Right Side) <span>List and sum up together all your Liabilities & Owners’ Equity
                                                                <br>
                                                                – Current Liabilities: Accounts Payable, Taxes Payable, Short-term Loans, etc.
                                                                <br>
                                                                – Long-term Liabilities: Long-term Debt.
                                                                <br>
                                                                – Owners’ Equity: Owners’ Investment, Retained Earnings.
                                                                </span><br> CURRENT LIABILITIES</label>
                                                            </div>

                                                            <table class="table table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">CURRENT LIABILITIES</th>
                                                                <th scope="col">Year1</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-items-center">
                                                                <th>Accounts Payable</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_accounts_payable]" value="<?= $tool['tool_builder_accounts_payable'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Short-Term Loans</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_short_term_loans]" value="<?= $tool['tool_builder_short_term_loans'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Taxes Payable</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_taxes_payable]" value="<?= $tool['tool_builder_taxes_payable'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Accrued Salaries and Wages</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_accrued_salaries]" value="<?= $tool['tool_builder_accrued_salaries'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Unearned Revenue</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_unearned_revenue]" value="<?= $tool['tool_builder_unearned_revenue'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Current Portion of Long-Term Debt</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_current_portion]" value="<?= $tool['tool_builder_current_portion'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="text" name="tool_builder_fm_bss[tool_builder_other_current_liabilities_1]" value="<?= $tool['tool_builder_other_current_liabilities_1'] ?>" placeholder="Other Current Liabilities">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="current_liabilities_total" onkeyup="calc_tool_bss_values('current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_other_current_liabilities_2]" value="<?= $tool['tool_builder_other_current_liabilities_2'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <input type="hidden" id="current_liabilities_total" name="tool_builder_fm_bss[tool_builder_total_current_liabilities]" value="<?= $tool['tool_builder_total_current_liabilities'] ?>" placeholder="0">

                                                            </tbody>
                                                            </table>

                                                            <div class="fld-textarea">
                                                                <label for="">Other Current Liabilities</label>
                                                            </div>

                                                            <table class="table table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">LONG-TERM LIABILITIES</th>
                                                                <th scope="col">Year1</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-items-center">
                                                                <th>Long-Term Debt</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="other_current_liabilities_total" onkeyup="calc_tool_bss_values('other_current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_long_term_debt]" value="<?= $tool['tool_builder_long_term_debt'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Deferred Income Tax</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="other_current_liabilities_total" onkeyup="calc_tool_bss_values('other_current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_deffered_income_tax]" value="<?= $tool['tool_builder_deffered_income_tax'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="text" class="other_current_liabilities_total" onkeyup="calc_tool_bss_values('other_current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_other_long_term_liabilities_1]" value="<?= $tool['tool_builder_other_long_term_liabilities_1'] ?>" placeholder="Other Long Term Liabilities">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="other_current_liabilities_total" onkeyup="calc_tool_bss_values('other_current_liabilities_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_other_long_term_liabilities_2]" value="<?= $tool['tool_builder_other_long_term_liabilities_2'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <input type="hidden" id="other_current_liabilities_total"  name="tool_builder_fm_bss[tool_builder_total_long_term_liabilities]" value="<?= $tool['tool_builder_total_long_term_liabilities'] ?>" placeholder="0">

                                                            </tbody>
                                                            </table>

                                                            <div class="fld-textarea">
                                                                <label for="">OWNER’S EQUITY</label>
                                                            </div>

                                                            <table class="table table-responsive-md">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">OWNER’S EQUITY</th>
                                                                <th scope="col">Year1</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-items-center">
                                                                <th>Owner’s Investment</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="owners_equity_total" onkeyup="calc_tool_bss_values('owners_equity_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_owners_investment]" value="<?= $tool['tool_builder_owners_investment'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                <th>Retained Earnings</th>
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="owners_equity_total" onkeyup="calc_tool_bss_values('owners_equity_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_retained_earnings]" value="<?= $tool['tool_builder_retained_earnings'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <tr class="align-items-center">
                                                                
                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="text" class="owners_equity_total" onkeyup="calc_tool_bss_values('owners_equity_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_other_equity_1]" value="<?= $tool['tool_builder_other_equity_1'] ?>" placeholder="Other Equity">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="fld-text mb-0">
                                                                    <input type="number" class="owners_equity_total" onkeyup="calc_tool_bss_values('owners_equity_total','tool_builder_total_liabilities')" name="tool_builder_fm_bss[tool_builder_other_equity_2]" value="<?= $tool['tool_builder_other_equity_2'] ?>" placeholder="0">
                                                                    </div>
                                                                </td>
                                                                </tr>

                                                                <input type="hidden" id="owners_equity_total"  name="tool_builder_fm_bss[tool_builder_total_owners_equity]" value="<?= $tool['tool_builder_total_owners_equity'] ?>" placeholder="0">

                                                                <input type="hidden" id="tool_builder_total_liabilities" name="tool_builder_fm_bss[tool_builder_total_liabilities]" value="<?= $tool['tool_builder_total_liabilities'] ?>" placeholder="0">
                                                            
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
         </li>


      </ul>
   </section>
</div>