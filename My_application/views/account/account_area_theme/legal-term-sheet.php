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
                                 <li><a href="#">Legal Term Sheet</a></li>
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
                                 <h4>Tool and Tool Builder - Legal Term Sheet</h4>
                                 <div class="space"><br></div>
                                 <p>Complete these steps to build your <strong> Legal Term Sheet. </strong></p>
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
                                 <p>Legal Term Sheet </p>
                              </div>
                           </ul>

                           <div class="box-1 showfirst" style="">

                              <div id="radio1" class="multi-fld">

                                 <div class="tab">
                                    <?

                                    $param = array();
                                    $param['order'] = "tool_builder_lts_id DESC";
                                    $param['where']['tool_builder_lts_user_id'] = $this->userid;
                                    $tool = $this->model_tool_builder_lts->find_one_active($param);

                                    ?>
                                    <form id="form-lts1" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">Items For Consideration For Draft Term Sheet <span>In your Tools, you have a Draft MOU of International JV (for a new partnership or a new company). Please find below the related list of items for consideration in the corresponding Draft Term Sheet.</span></label>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">1. Identify the Parties<br>1. Who are the parties? <span>
                                                - Individuals?
                                                <br>
                                                - Partnerships?
                                                <br>
                                                - Companies?
                                                <br>
                                                - Other bodies, organizations or associations?
                                                <br>
                                                - Are any of the parties subsidiary or holding companies?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_identify_parties]"><?= $tool['tool_builder_lts_identify_parties'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">1.1 Will the JV Company also have obligations?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_jv_comp_obligations]"><?= $tool['tool_builder_lts_jv_comp_obligations'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn1" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts2" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">2. What is the business of the JV Company? <span>
                                                - Is the purpose of the joint venture to carry out a specific project or a continuing business?
                                                <br>
                                                - In what countries/jurisdictions will the JV Company operate?
                                                <br>
                                                - Where are its clients?
                                                <br>
                                                - What are the parties' objectives?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_business_jv_company]"><?= $tool['tool_builder_lts_business_jv_company'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">2.1 What is the likely turnover or market share?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_likely_turnover]"><?= $tool['tool_builder_lts_likely_turnover'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">2.2 What regulatory consents, approvals and licenses will be required for the JV Company and its business?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_regulatory_consents]"><?= $tool['tool_builder_lts_regulatory_consents'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">2.3 Where will the business be based?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_business_based]"><?= $tool['tool_builder_lts_business_based'] ?></textarea>
                                       </div>
                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn2" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-lts3" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">3. Regulatory Approvals<br>3. Is the JV Company business a regulated activity? (financial services? Telecom? Healthcare?)</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_regulatory_approvals]"><?= $tool['tool_builder_lts_regulatory_approvals'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">3.1 Are there any regulatory approvals in overseas jurisdictions?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_regulatory_approvals_overseas_jurisdictions]"><?= $tool['tool_builder_lts_regulatory_approvals_overseas_jurisdictions'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">3.2 Is it possible that the JV Company will be regarded as a "collective investment scheme"?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_collective_investment_scheme]"><?= $tool['tool_builder_lts_collective_investment_scheme'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">3.3 Should provision be made for the parties to provide information or assistance in the event of any regulatory enquiry after the JV Company has been set up</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_regulatory_enquiry]"><?= $tool['tool_builder_lts_regulatory_enquiry'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn3" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-lts4" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">4. Structure & Setting-up of the JV Company<br>4. Is the JV Company business to be carried out through a separate company? or does it fit within one of the parties’ existing business? <span>
                                                - A collaboration agreement, for joint marketing, joint research or the development and manufacture of goods to a particular design?
                                                <br>
                                                - An agreement for supply of goods or services?
                                                <br>
                                                - A licensing or franchise agreement?
                                                <br>
                                                - A distribution or agency agreement?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_structure_settingup_jv_company]"><?= $tool['tool_builder_lts_structure_settingup_jv_company'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4.1 What will the legal the form of the JV Company be?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_legal_form_of_jv_company]"><?= $tool['tool_builder_lts_legal_form_of_jv_company'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4.2 In what jurisdiction(s) will the JV Company be established?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_jv_company_established]"><?= $tool['tool_builder_lts_jv_company_established'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4.3 What formalities are required for establishing the relevant structure, including relevant registration requirements and approvals? How long is it likely to take?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_formalities_required_establishing]"><?= $tool['tool_builder_lts_formalities_required_establishing'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">4.4 Applicable tax considerations?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_applicable_tax_considerations]"><?= $tool['tool_builder_lts_applicable_tax_considerations'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn4" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts5" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">5. Financing the JV Company<br>5. Will each party provide funding?<span>
                                                -In what proportion?
                                                <br>
                                                -Will funding be proportional to shareholding? To profit sharing?
                                                <br>
                                                -Will the initial investment be in cash or in kind?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_Financing_jv_company]"><?= $tool['tool_builder_lts_Financing_jv_company'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5.1 Are there advantages (in relation to tax or otherwise) in funding through debt rather than equity, or vice versa?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_unding_through_debt_rather_than_equity]"><?= $tool['tool_builder_lts_unding_through_debt_rather_than_equity'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5.2 Is third party funding required? Banks? Security? Who will provide it?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_party_funding_required_banks_security]"><?= $tool['tool_builder_lts_party_funding_required_banks_security'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5.3 Continuing funding requirements of the JV Company <span>
                                                - Working capital requirements
                                                <br>
                                                - Losses incurred by the joint venture
                                                <br>
                                                - Development and expansion costs
                                                <br>
                                                - Will each party be required (or entitled) to contribute to continuing calls for funding, pro rata to its original investment or otherwise?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_continuing_funding_requirements]"><?= $tool['tool_builder_lts_continuing_funding_requirements'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">5.4 What happens if one of the parties defaults?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_parties_defaults]"><?= $tool['tool_builder_lts_parties_defaults'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn5" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts6" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">6. Contribution of Assets to the JV Company<br>6. Will either JV party contribute an asset to the JV Company?<span>
                                                - On what terms?
                                                <br>
                                                - Outright transfer, or lease or licence for a fixed or indefinite term?
                                                <br>
                                                - Stamp taxes or other tax considerations affect the method of contribution of the assets? Who will bear the tax costs of contributions?
                                                <br>
                                                - How will payments to the JV party be taxed, for example, dividends, interest, intellectual property royalties?
                                                <br>
                                                - How are contributed assets to be valued, and how will any adjustments be made for any shortfall or excess in relation to any contributor's proportionate funding obligation?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_contribution_assets]"><?= $tool['tool_builder_lts_contribution_assets'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">6.1 Do assets need to be valued (if, for example, they are transferred in consideration for the issue of shares in a joint venture company)?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_assets_need_to_valued]"><?= $tool['tool_builder_lts_assets_need_to_valued'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">6.2 When can assets be contributed? Regulatory approvals? Transferability restrictions? What due diligence investigations will be made into assets being contributed and what warranties and indemnities will be given in this regard and to whom?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_assets_be_contributed]"><?= $tool['tool_builder_lts_assets_be_contributed'] ?></textarea>
                                       </div>


                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn6" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts7" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">7. Competition & Restrictions<br>7. Will the parties be prohibited from competing with the JV Company?<span>
                                                -Territory limitations
                                                <br>
                                                -Existing business ventures
                                                <br>
                                                -For how long

                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_competition_restrictions]"><?= $tool['tool_builder_lts_competition_restrictions'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">7.1 Will the parties be prevented from soliciting customers and employees from the joint venture?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_soliciting_customers_employees]"><?= $tool['tool_builder_lts_soliciting_customers_employees'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">7.2 How will the business of the JV Company be defined for the purposes of such restrictions?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_purposes_of_such_restrictions]"><?= $tool['tool_builder_lts_purposes_of_such_restrictions'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">7.3 Will the parties have obligations to refer business to the joint venture?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_business_to_the_joint_venture]"><?= $tool['tool_builder_lts_business_to_the_joint_venture'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">7.4 How will the business of the JV Company be defined for the purposes of such restrictions?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_purposes_of_such_restrictions2]"><?= $tool['tool_builder_lts_purposes_of_such_restrictions2'] ?></textarea>
                                       </div>


                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn7" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-lts8" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">8. Board of Directors<br>8. Board of Directors composition and Chairperson<span>
                                                -What rights will each party have to appoint directors? And chairperson?
                                                <br>
                                                -Will the chairperson has a casting vote or other special powers or rights?
                                                <br>
                                                -Quorum and notice requirements

                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_board_of_directors]"><?= $tool['tool_builder_lts_board_of_directors'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">8.1 How will the General Manager/CEO be appointed?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_general_manager_ceo_appointed]"><?= $tool['tool_builder_lts_general_manager_ceo_appointed'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">8.2 Shareholder matters vs Board matters vs management matters</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_shareholder_board_management_matters]"><?= $tool['tool_builder_lts_shareholder_board_management_matters'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">8.3 Conflict Situations</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_conflict_situations]"><?= $tool['tool_builder_lts_conflict_situations'] ?></textarea>
                                       </div>



                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn8" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts9" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">9. Shareholders <br>9. Ownership of the JV Company<span>
                                                - Shareholding and voting rights of each party are equal?
                                                <br>
                                                - Will there be separate classes of shares?
                                                <br>
                                                - Will any special voting rights attach to any or all shares?

                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_ownership_jv_company]"><?= $tool['tool_builder_lts_ownership_jv_company'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">9.1 What quorum and notice requirements will apply for shareholder meetings?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_shareholder_meetings]"><?= $tool['tool_builder_lts_shareholder_meetings'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">9.2 Should there be any limitation on possible locations for shareholders' meetings?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_locations_for_shareholders_meetings]"><?= $tool['tool_builder_lts_locations_for_shareholders_meetings'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn9" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts10" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">10. Control & Minority Protection <br>10. Minority protection against majority decision at shareholder and/or director :<span>
                                                - Requirements for unanimity?
                                                <br>
                                                - Requirements for special majorities?
                                                <br>
                                                - Rights of veto?

                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_minority_protection]"><?= $tool['tool_builder_lts_minority_protection'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">10.1 Class rights attaching to shares?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_rights_attaching_to_shares]"><?= $tool['tool_builder_lts_rights_attaching_to_shares'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">10.2 Will any such protections extend to all matters for decision or just to some?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_matters_for_decision]"><?= $tool['tool_builder_lts_matters_for_decision'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">10.3 What remedies are available if minority rights are breached?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_if_minority_rights]"><?= $tool['tool_builder_lts_if_minority_rights'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn10" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts11" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">11. Transfer of Shares <br>11. Are transfers of shares permitted?<span>
                                                - Freely?
                                                <br>
                                                - Existing shareholder pre-emption rights (rights of first refusal)
                                                <br>
                                                - Intra-group transfers free?
                                                <br>
                                                - Transfers to family members free?
                                                <br>
                                                - "Russian roulette" or "shotgun" provisions
                                                <br>
                                                - "Drag-along" or "tag along"

                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_transfer_of_Shares]"><?= $tool['tool_builder_lts_transfer_of_Shares'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.1 How will shares be valued for the purposes of the transfer provisions?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_shares_be_valued]"><?= $tool['tool_builder_lts_shares_be_valued'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.2 Will any new shareholder be required to become a party to the joint venture agreement?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_new_shareholder_be_required]"><?= $tool['tool_builder_lts_new_shareholder_be_required'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.3 Will the joint venture's name have to be changed if shares are transferred?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_joint_ventures_name]"><?= $tool['tool_builder_lts_joint_ventures_name'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.4 What will happen to any arrangements between a leaving shareholder and the JV Company?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_leaving_shareholder]"><?= $tool['tool_builder_lts_leaving_shareholder'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.5 What happens to monies owed to the JV Company by the outgoing shareholder?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_monies_owed_to_the_JV_Company]"><?= $tool['tool_builder_lts_monies_owed_to_the_JV_Company'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.6 Key Person arrangements?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_key_Person_arrangements]"><?= $tool['tool_builder_lts_key_Person_arrangements'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.7 Change in control of a shareholder? Insolvency of shareholder?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_change_in_control_of_shareholder]"><?= $tool['tool_builder_lts_change_in_control_of_shareholder'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.8 Breach of undertakings by a shareholder?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_breach_of_undertakings]"><?= $tool['tool_builder_lts_breach_of_undertakings'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">11.9 Death of a shareholder?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_death_of_shareholder]"><?= $tool['tool_builder_lts_death_of_shareholder'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn11" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-lts12" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">12. Deadlock <br>12. When does deadlock occur?<span>
                                                - Issues specified in the JV agreement
                                                <br>
                                                - issues designated as deadlock issues by any of the JV parties
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_deadlock]"><?= $tool['tool_builder_lts_deadlock'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">12.1 How are deadlock issues resolved?<span>
                                                - The chair of the board's casting vote
                                                <br>
                                                - Reference to independent non-executive directors
                                                <br>
                                                - Reference to an external expert or arbitrator
                                                <br>
                                                - Reference to chairpersons or chief executives of the parties to the joint venture?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_deadlock_issues_resolved]"><?= $tool['tool_builder_lts_deadlock_issues_resolved'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">12.2 Will any "cooling off" period apply?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_cooling_off]"><?= $tool['tool_builder_lts_cooling_off'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">12.3 If deadlock occurs, can one or more parties terminate the joint venture? buy the shares of the other JV party and if so at what price? Trigger the sale of the JV Company to a third party and if so at what valuation?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_if_deadlock_occurs]"><?= $tool['tool_builder_lts_if_deadlock_occurs'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn12" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-lts13" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">13. Continuous Business Involvement of the JV Parties:<br>13. Will any of the JV parties supply support to the JV Company?<span>
                                                - Offices? or other accommodation, support services or facilities, or training for staff?
                                                <br>
                                                - Who bears the cost? Or is it a capital contribution?
                                                <br>
                                                - What happens if the JV party stops being a JV party?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_continuous_business_involvement_jv_parties]"><?= $tool['tool_builder_lts_continuous_business_involvement_jv_parties'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">13.1 Continuing trading arrangements between JV parties and the JV Company (distributorship agreements, supply of goods or services)?<span>
                                                - Independently audited?
                                                <br>
                                                - Impact on the JV party’s entitlement to the profits or responsibility for losses?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_continuing_trading_arrangements]"><?= $tool['tool_builder_lts_continuing_trading_arrangements'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">13.2 Flow of information to and reporting from the JV Company to the parties? Procedures. Frequency. Format.</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_flow_of_information]"><?= $tool['tool_builder_lts_flow_of_information'] ?></textarea>
                                       </div>
                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn13" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts14" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">14. Employees<br>14. Will the JV Company need employees?<span>
                                                - New employees
                                                <br>
                                                - Employees seconded from JV parties

                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_employees]"><?= $tool['tool_builder_lts_employees'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">14.1 Consider the management structure</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_consider_the_management_structure]"><?= $tool['tool_builder_lts_consider_the_management_structure'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">14.2 Consider share option or incentive schemes</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_consider_share_option]"><?= $tool['tool_builder_lts_consider_share_option'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">14.3 Pension arrangements?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_pension_arrangements]"><?= $tool['tool_builder_lts_pension_arrangements'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">14.4 Will any of the JV parties have to make redundancies as a result of the creation of the joint venture? If so, how will the cost be borne by the parties?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_cost_be_borne_by_the_parties]"><?= $tool['tool_builder_lts_cost_be_borne_by_the_parties'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn14" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts15" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">15. Intellectual Property<br>15. What IP Rights are to be contributed to the joint venture?<span>
                                                - Should they be licensed or transferred?
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_Intellectual_property]"><?= $tool['tool_builder_lts_Intellectual_property'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">15.1 Who will own the IP Rights developed by the JV Company? Or by any of the parties?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_ip_rights]"><?= $tool['tool_builder_lts_ip_rights'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">15.2 Who will have the right to exploit the IP Rights? Will there be any compensation for this?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_exploit_the_ip_rights]"><?= $tool['tool_builder_lts_exploit_the_ip_rights'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">15.3 Will the parties have independent rights over confidential information, know-how and other IP Rights belonging to the JV Company?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_confidential_information]"><?= $tool['tool_builder_lts_confidential_information'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">15.4 What will happen to the IP Rights on termination of the joint venture? <span>- Will any of the parties require a license of any IP Rights following termination? <br> - Will there be different methods of dealing with IP Rights depending on the exit route used?</span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_ip_rights_on_termination]"><?= $tool['tool_builder_lts_ip_rights_on_termination'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn15" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>


                                 <div class="tab">
                                    <form id="form-lts16" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">16. Administration<br>16. Name of the joint venture</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_administration]"><?= $tool['tool_builder_lts_administration'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">16.1 Joint venture's lending bankers</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_lending_bankers]"><?= $tool['tool_builder_lts_lending_bankers'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">16.2 Lawyers (company agreements, supplier agreements, IP, IT etc)</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_lawyers]"><?= $tool['tool_builder_lts_lawyers'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">16.3 Auditors (financial year, accounting and auditing procedures)</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_auditors]"><?= $tool['tool_builder_lts_auditors'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">16.4 What other professional advisers will be appointed, and by whom?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_professional_advisers]"><?= $tool['tool_builder_lts_professional_advisers'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">16.5 Where will the joint venture's registered office and headquarters be located?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_office_and_headquarters]"><?= $tool['tool_builder_lts_office_and_headquarters'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">16.6 What will be the dividend policy? How much will be distributed to the parties, when and who will make decisions on this?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_dividend_policy]"><?= $tool['tool_builder_lts_dividend_policy'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn16" type="submit">SUBMIT</button>
                                       </div>
                                    </form>
                                 </div>

                                 <div class="tab">
                                    <form id="form-lts17" class="next-prevBtn">
                                       <div class="fld-textarea">
                                          <label for="">17. Termination<br>17. Is the joint venture for a fixed term or indefinite in duration?</label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_termination]"><?= $tool['tool_builder_lts_termination'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">17.1 Are there any circumstances in which the joint venture will automatically terminate <span>
                                                - The loss of any regulatory approval
                                                <br>
                                                - The loss or destruction of a particular asset
                                                <br>
                                                - The insolvency of any party
                                                <br>
                                                - The transfer of any party's shares
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_automatically_terminate]"><?= $tool['tool_builder_lts_automatically_terminate'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">17.2 Are there any circumstances in which any party will be entitled to terminate the joint venture <span>
                                                - A change of control of any other party
                                                <br>
                                                - A material breach of the joint venture agreement by another party
                                                <br>
                                                - By notice of termination given after the expiry of a minimum fixed term
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_entitled_to_terminate]"><?= $tool['tool_builder_lts_entitled_to_terminate'] ?></textarea>
                                       </div>

                                       <div class="fld-textarea">
                                          <label for="">17.3 What arrangements will apply on termination for <span>
                                                - The distribution of the assets, including intellectual property and know-how of the joint venture.
                                                <br>
                                                - The discharge of outstanding contracts of the joint venture.
                                                <br>
                                                - The assumption or discharge of any other liabilities of the joint venture.
                                             </span></label>
                                          <div class="space"><br></div>
                                          <textarea name="tool_builder_lts[tool_builder_lts_arrangements_will_apply_on_termination]"><?= $tool['tool_builder_lts_arrangements_will_apply_on_termination'] ?></textarea>
                                       </div>

                                       <div style="display:none;">
                                       <button id="forms-tool_builder-btn17" type="submit">SUBMIT</button>
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