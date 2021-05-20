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
                                 <li><a href="#">Income Statement</a></li>
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
                                 <h4>Tool and Tool Builder - Income Statement</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Income Statement. </strong></p>
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
                                          <p>Income Statement</p>
                                       </div>
                                    </ul>      

                                    <div class="box-1 showfirst" style="">      

                                          <div id="radio1" class="multi-fld">

                                             <div class="tab">

                                                <?  
                                                
                                                $param=array();
                                                $param['order']="tool_builder_id DESC";
                                                $param['where']['tool_builder_user_id']=$this->userid;
                                                $tool = $this->model_tool_builder_fm_income->find_one_active($param); 
                                                ?>


                                                 <form id="form-income">
                                                     <div class="fld-text">
                                                        <input type="text" name="tool_builder_fm_income[tool_builder_currency]" value="<?=$tool['tool_builder_currency']?>" placeholder="Currency">
                                                     </div>

                                                     <div class="fld-textarea">
                                                        <label for="">Step 1: Revenues <span>List all your revenues from sales, services, other, etc. (remember that it doesn’t include Accounts Receivables). And sum all revenues together</span></label>
                                                     </div>

                                                        <table class="table table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">Revenue</th>
                                                            <th scope="col">Year1</th>
                                                            <th scope="col">Year2</th>
                                                            <th scope="col">Year3</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="align-items-center">
                                                            <th>Sales Revenue</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_sales_1]" value="<?=$tool['tool_builder_sales_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_sales_2]" value="<?=$tool['tool_builder_sales_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_sales_3]" value="<?=$tool['tool_builder_sales_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>
                                                            
                                                            <tr class="align-items-center">
                                                            <th>(Less Sales Returns and Allowances)</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_returns_1]" value="<?=$tool['tool_builder_returns_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_returns_2]" value="<?=$tool['tool_builder_returns_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_returns_3]" value="<?=$tool['tool_builder_returns_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Service Revenue</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_service_1]" value="<?=$tool['tool_builder_service_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_service_2]" value="<?=$tool['tool_builder_service_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_service_3]" value="<?=$tool['tool_builder_service_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Interest Revenue</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_interest_1]" value="<?=$tool['tool_builder_interest_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_interest_2]" value="<?=$tool['tool_builder_interest_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_interest_3]" value="<?=$tool['tool_builder_interest_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="text" name="tool_builder_fm_income[tool_builder_other_r_1]" value="<?=$tool['tool_builder_other_r_1']?>" placeholder="Other Revenue">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_r_2]" value="<?=$tool['tool_builder_other_r_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_r_3]" value="<?=$tool['tool_builder_other_r_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_r_4]" value="<?=$tool['tool_builder_other_r_4']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="text" name="tool_builder_fm_income[tool_builder_other_r_5]" value="<?=$tool['tool_builder_other_r_5']?>" placeholder="Other Revenue">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_r_6]" value="<?=$tool['tool_builder_other_r_6']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_r_7]" value="<?=$tool['tool_builder_other_r_7']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_r_8]" value="<?=$tool['tool_builder_other_r_8']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>

                                                        <div class="fld-textarea">
                                                            <label for="">Step 2: Expenses <span>List all your expenses from COGS (cost of goods sold), Operating Expenses (rent, salaries, marketing, etc), Tax, Depreciation, Amortization, Stock-Based Compensation, Interest, Losses, Write-Downs, Other Expenses (remember that it doesn’t include Accounts Payables). Sum all expenses together.</span></label>
                                                        </div>

                                                        <table class="table table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">Expenses</th>
                                                            <th scope="col">Year1</th>
                                                            <th scope="col">Year2</th>
                                                            <th scope="col">Year3</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="align-items-center">
                                                            <th>Advertising</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_advertising_1]" value="<?=$tool['tool_builder_advertising_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_advertising_2]" value="<?=$tool['tool_builder_advertising_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_advertising_3]" value="<?=$tool['tool_builder_advertising_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>
                                                            
                                                            <tr class="align-items-center">
                                                            <th>Bad Debt</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_debt_1]" value="<?=$tool['tool_builder_debt_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_debt_2]" value="<?=$tool['tool_builder_debt_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_debt_3]" value="<?=$tool['tool_builder_debt_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Commissions</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_commissions_1]" value="<?=$tool['tool_builder_commissions_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_commissions_2]" value="<?=$tool['tool_builder_commissions_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_commissions_3]" value="<?=$tool['tool_builder_commissions_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Cost of Goods Sold</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_goods_1]" value="<?=$tool['tool_builder_goods_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_goods_2]" value="<?=$tool['tool_builder_goods_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_goods_3]" value="<?=$tool['tool_builder_goods_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Depreciation</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_depreciation_1]" value="<?=$tool['tool_builder_depreciation_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_depreciation_2]" value="<?=$tool['tool_builder_depreciation_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_depreciation_3]" value="<?=$tool['tool_builder_depreciation_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Employee Benefits</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_benefits_1]" value="<?=$tool['tool_builder_benefits_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_benefits_2]" value="<?=$tool['tool_builder_benefits_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_benefits_3]" value="<?=$tool['tool_builder_benefits_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Furniture and Equipment</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_equipment_1]" value="<?=$tool['tool_builder_equipment_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_equipment_2]" value="<?=$tool['tool_builder_equipment_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_equipment_3]" value="<?=$tool['tool_builder_equipment_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Insurance</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_insurance_1]" value="<?=$tool['tool_builder_insurance_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_insurance_2]" value="<?=$tool['tool_builder_insurance_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_insurance_3]" value="<?=$tool['tool_builder_insurance_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Interest Expense</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_expense_1]" value="<?=$tool['tool_builder_expense_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_expense_2]" value="<?=$tool['tool_builder_expense_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_expense_3]" value="<?=$tool['tool_builder_expense_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Maintenance and Repairs</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_maintenance_1]" value="<?=$tool['tool_builder_maintenance_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_maintenance_2]" value="<?=$tool['tool_builder_maintenance_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_maintenance_3]" value="<?=$tool['tool_builder_maintenance_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Office Supplies</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_supplies_1]" value="<?=$tool['tool_builder_supplies_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_supplies_2]" value="<?=$tool['tool_builder_supplies_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_supplies_3]" value="<?=$tool['tool_builder_supplies_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Payroll Taxes</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_payroll_1]" value="<?=$tool['tool_builder_payroll_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_payroll_2]" value="<?=$tool['tool_builder_payroll_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_payroll_3]" value="<?=$tool['tool_builder_payroll_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Rent</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_rent_1]" value="<?=$tool['tool_builder_rent_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_rent_2]" value="<?=$tool['tool_builder_rent_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_rent_3]" value="<?=$tool['tool_builder_rent_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Research and Development</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_research_1]" value="<?=$tool['tool_builder_research_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_research_2]" value="<?=$tool['tool_builder_research_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_research_3]" value="<?=$tool['tool_builder_research_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Salaries and Wages</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_salaries_1]" value="<?=$tool['tool_builder_salaries_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_salaries_2]" value="<?=$tool['tool_builder_salaries_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_salaries_3]" value="<?=$tool['tool_builder_salaries_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Software</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_software_1]" value="<?=$tool['tool_builder_software_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_software_2]" value="<?=$tool['tool_builder_software_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_software_3]" value="<?=$tool['tool_builder_software_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Travel</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_travel_1]" value="<?=$tool['tool_builder_travel_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_travel_2]" value="<?=$tool['tool_builder_travel_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_travel_3]" value="<?=$tool['tool_builder_travel_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Utilities</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_utilities_1]" value="<?=$tool['tool_builder_utilities_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_utilities_2]" value="<?=$tool['tool_builder_utilities_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_utilities_3]" value="<?=$tool['tool_builder_utilities_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <th>Web Hosting and Domains</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_hosting_1]" value="<?=$tool['tool_builder_hosting_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_hosting_2]" value="<?=$tool['tool_builder_hosting_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_hosting_3]" value="<?=$tool['tool_builder_hosting_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="text" name="tool_builder_fm_income[tool_builder_other_e_1]" value="<?=$tool['tool_builder_other_e_1']?>" placeholder="Other Expense">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_e_2]" value="<?=$tool['tool_builder_other_e_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_e_3]" value="<?=$tool['tool_builder_other_e_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_e_4]" value="<?=$tool['tool_builder_other_e_4']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>

                                                            <tr class="align-items-center">
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="text" name="tool_builder_fm_income[tool_builder_other_e_5]" value="<?=$tool['tool_builder_other_e_5']?>" placeholder="Other Expense">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_e_6]" value="<?=$tool['tool_builder_other_e_6']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_e_7]" value="<?=$tool['tool_builder_other_e_7']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_e_8]" value="<?=$tool['tool_builder_other_e_8']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>

                                                        <div class="fld-textarea">
                                                            <label for="">Tax Expense</label>
                                                        </div>

                                                        <table class="table table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">Tax Expenses</th>
                                                            <th scope="col">Year1</th>
                                                            <th scope="col">Year2</th>
                                                            <th scope="col">Year3</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="align-items-center">
                                                            <th>Tax Expenses</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_tax_expense_1]" value="<?=$tool['tool_builder_tax_expense_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_tax_expense_2]" value="<?=$tool['tool_builder_tax_expense_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_tax_expense_3]" value="<?=$tool['tool_builder_tax_expense_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>
                                                            
                                                            <tr class="align-items-center">
                                                            <th>Other Tax Expenses</th>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_tax_expense_1]" value="<?=$tool['tool_builder_other_tax_expense_1']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_tax_expense_2]" value="<?=$tool['tool_builder_other_tax_expense_2']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="fld-text mb-0">
                                                                <input type="number" name="tool_builder_fm_income[tool_builder_other_tax_expense_3]" value="<?=$tool['tool_builder_other_tax_expense_3']?>" placeholder="0">
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>

                                                        <div class="fld-textarea">
                                                            <label for="">Note: You can also calculate EBITDA: <span>Earnings before Interest, Tax, Depreciation, Amortization by adding those 4 expenses back to Net Income. It can be especially useful for comparing companies with different capital investment, debt and tax profiles.</span></label>
                                                        </div>

                                                    
                                                        <div class="next-prevBtn">
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
            </div>
         </li>


      </ul>
   </section>
</div>