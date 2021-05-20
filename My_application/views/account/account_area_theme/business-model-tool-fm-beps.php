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
                                    <li><a href="#">Break-Event Point</a></li>
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
                                    <h4>Tool and Tool Builder - Break-Event Point</h4>
                                    <div class="space"><br></div>
                                    <p>Complete these steps to build your <strong> Break-Event Point. </strong></p>
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
                                        <p>Break-Event Point</p>
                                    </div>
                                </ul>      

                                <div class="box-1 showfirst" style="">      

                                        <div id="radio1" class="multi-fld">

                                        <div class="tab">

                                            <? 
                                            $param = array();
                                            $param['order'] = "tool_builder_id DESC";
                                            $param['where']['tool_builder_user_id'] = $this->userid;
                                            $tool = $this->model_tool_builder_fm_beps->find_one_active($param);  
                                            ?>


                                            <form id="form-beps" class="next-prevBtn">
                                                <div class="fld-text">
                                                    <input type="text" name="tool_builder_fm_beps[tool_builder_currency]" value="<?= $tool['tool_builder_currency'] ?>" placeholder="Currency">
                                                </div>

                                                <div class="fld-textarea">
                                                    <label for="">Step 1: Note down your Price per Unit (P)</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="number" id="price_per_unit" name="tool_builder_fm_beps[tool_builder_price_per_unit]" value="<?= $tool['tool_builder_price_per_unit'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <div class="fld-textarea">
                                                    <label for="">Step 2: List and sum up together all your Fixed Costs (TFC):</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <th>Fixed Costs</th>
                                                    <th>Year1</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <th>Advertising</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_advertising]" value="<?= $tool['tool_builder_advertising'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Accounting</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_accounting]" value="<?= $tool['tool_builder_accounting'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Depreciation</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_depreciation]" value="<?= $tool['tool_builder_depreciation'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Manufacturing</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_manufacturing]" value="<?= $tool['tool_builder_manufacturing'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Payroll</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_payroll]" value="<?= $tool['tool_builder_payroll'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Rent</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_rent]" value="<?= $tool['tool_builder_rent'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Other</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_other]" value="<?= $tool['tool_builder_other'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Other</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_other_1]" value="<?= $tool['tool_builder_other_1'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Other</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="tfc_total" onkeyup="calc_tfc()" name="tool_builder_fm_beps[tool_builder_other_2]" value="<?= $tool['tool_builder_other_2'] ?>"  placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Total</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" id="tfc_total" readonly name="tool_builder_fm_beps[tool_builder_total]" value="<?= $tool['tool_builder_total'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>


                                                <div class="fld-textarea">
                                                    <label for="">Step 3: List and sum up together all your Variable Costs related to production per unit (V):</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <th>Variable Costs/Unit</th>
                                                    <th>Year1</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <th>Costs of Goods Sold</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="v_total" onkeyup="calc_v()" name="tool_builder_fm_beps[tool_builder_cost_of_goods_sold]" value="<?= $tool['tool_builder_cost_of_goods_sold'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Direct Labor</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="v_total" onkeyup="calc_v()" name="tool_builder_fm_beps[tool_builder_direct_labour]" value="<?= $tool['tool_builder_direct_labour'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Overhead</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text"class="v_total" onkeyup="calc_v()" name="tool_builder_fm_beps[tool_builder_overhead]" value="<?= $tool['tool_builder_overhead'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Commisions</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" class="v_total" onkeyup="calc_v()" name="tool_builder_fm_beps[tool_builder_commisions]" value="<?= $tool['tool_builder_commisions'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    <tr class="align-items-center">
                                                        <th>Total</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" id="v_total" readonly name="tool_builder_fm_beps[tool_builder_total_1]" value="<?= $tool['tool_builder_total_1'] ?>"  placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                                <div class="fld-textarea">
                                                    <label for="">Step 4: Calculate Contribution Margin per unit (CM) = P – V</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <th>(CM) = P – V</th>
                                                    <th>Year1</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <th>CM</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" id="cm_total" readonly name="tool_builder_fm_beps[tool_builder_cm]" value="<?= $tool['tool_builder_cm'] ?>" placeholder="0">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                                <div class="fld-textarea">
                                                    <label for="">Contribution Margin Ration (CMR) = 1 – V / P = CM / P</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <th>(CMR) = 1 – V / P = CM / P</th>
                                                    <th>Year1</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <th>CMR</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" id="cmr_total" readonly name="tool_builder_fm_beps[tool_builder_cmr]" value="<?= $tool['tool_builder_cmr'] ?>" placeholder="NaN">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>


                                                <div class="fld-textarea">
                                                    <label for="">Step 5: Calculate Break-Event Point (Units): X = TFC / (P – V)</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <th>X = TFC / (P – V)</th>
                                                    <th>Year1</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <th>X</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" id="x_total" readonly name="tool_builder_fm_beps[tool_builder_x]" value="<?= $tool['tool_builder_x'] ?>" placeholder="NaN">
                                                        </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>


                                                <div class="fld-textarea">
                                                    <label for="">Step 6: Calculate Break-Even Point (Sales): S = X * P</label>
                                                </div>

                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <th>S = X * P</th>
                                                    <th>Year1</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="align-items-center">
                                                        <th>S</th>
                                                        <td>
                                                        <div class="fld-text mb-0">
                                                            <input type="text" id="s_total" readonly name="tool_builder_fm_beps[tool_builder_s]" value="<?= $tool['tool_builder_s'] ?>" placeholder="NaN">
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