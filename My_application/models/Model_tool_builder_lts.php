<?
class Model_tool_builder_lts extends MY_Model {
    /**
     * tool_builder MODEL
     *
     * @package     tool_builder Model
     * @author      
     * @version     2.0
     * @since       2016 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'tool_builder_lts';
    protected $_field_prefix    = 'tool_builder_lts_';
    protected $_pk    = 'tool_builder_lts_id';
    protected $_status_field    = 'tool_builder_lts_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model construtool_builderr
        $this->pagination_params['fields'] = "tool_builder_lts_id,tool_builder_lts_user_id,tool_builder_lts_identify_parties,tool_builder_lts_jv_comp_obligations,tool_builder_lts_approval_status,tool_builder_lts_status";
        
        //$this->pagination_params['joins'][] = $this->join_user("LEFT");

        parent::__construct();

    }


    // //public function join_user($type="" , $append_joint ="AND user_status = 1 AND user_type = ".DEALER_TYPE , $prepend_joint = "")
    // public function join_user($type="" , $append_joint ="AND user_status = 1", $prepend_joint = "")
    // {
    //     $joint = $prepend_joint . "tool_builder_user_id = user_id " . $append_joint ; 
    //     return $this->prep_join("user" , $joint, $type );
    // }


    // public function join_user_info($type="" , $append_joint ="" , $prepend_joint = "")
    // {
    //     $joint = $prepend_joint . "tool_builder_user_id = ui_user_id " . $append_joint ; 
    //     return $this->prep_join("user_info" , $joint, $type );
    // }


    // public function get_dealer_review_active()
    // {
    //     $params = array();
    //     $params['fields'] = '
    //                     CONCAT(user_firstname , " " , user_lastname) as tool_builder_user_name,
    //                     {pre}user_info.ui_tool_builder_image,{pre}user_info.ui_tool_builder_image_path,
    //                     {pre}tool_builder.tool_builder_description';

    //     $params['joins'][] = $this->join_user_info();
    //     $params['joins'][] = $this->join_user("LEFT");
    //     $params['where']['{pre}user.user_type'] = DEALER_TYPE;
    //     return $this->find_all_active($params);
    // }


    // public function get_rider_review_active()
    // {
    //     $params = array();
    //     $params['fields'] = '
    //                     CONCAT(user_firstname , " " , user_lastname) as tool_builder_user_name,
    //                     {pre}user_info.ui_tool_builder_image,{pre}user_info.ui_tool_builder_image_path,
    //                     {pre}tool_builder.tool_builder_description';

    //     $params['joins'][] = $this->join_user_info();                        
    //     $params['joins'][] = $this->join_user("LEFT");
    //     $params['where']['{pre}user.user_type'] = RIDER_TYPE;
    //     return $this->find_all_active($params);
    // }


    /*
    * table             Table Name
    * Name              FIeld Name
    * label             Field Label / Textual Representation in form and DT headings
    * type              Field type : hidden, text, textarea, editor, etc etc. 
    *                                 Implementation in form_generator.php
    * type_dt           Type used by prepare_datatables method in controller to prepare DT value
    *                                 If left blank, prepare_datatable Will opt to use 'type'
    * type_filter_dt    Used by DT FILTER PREPRATION IN datatables.php
    * attributes        HTML Field Attributes
    * js_rules          Rules to be aplied in JS (form validation)
    * rules             Server side Validation. Supports CI Native rules

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'tool_builder_lts_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_lts_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

                'tool_builder_lts_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_lts_user_id',
                     'label'   => 'User ID',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),



                'tool_builder_lts_step_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_lts_step_id',
                     'label'   => 'Step ID',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'tool_builder_lts_identify_parties' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_lts_identify_parties',
                     'label'   => 'Identify the Parties',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
         
                'tool_builder_lts_jv_comp_obligations' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_jv_comp_obligations',
                'label' => 'Will the JV Company also have obligations',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
             
            // thtere

            'tool_builder_lts_business_jv_company' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_business_jv_company',
                'label' => 'tool_builder_lts_business_jv_company',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_likely_turnover' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_likely_turnover',
                'label' => 'tool_builder_lts_likely_turnover',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_regulatory_consents' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_regulatory_consents',
                'label' => 'tool_builder_lts_regulatory_consents',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_business_based' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_business_based',
                'label' => 'tool_builder_lts_business_based',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_regulatory_approvals' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_regulatory_approvals',
                'label' => 'tool_builder_lts_regulatory_approvals',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_regulatory_approvals_overseas_jurisdictions' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_regulatory_approvals_overseas_jurisdictions',
                'label' => 'tool_builder_lts_regulatory_approvals_overseas_jurisdictions',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_collective_investment_scheme' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_collective_investment_scheme',
                'label' => 'tool_builder_lts_collective_investment_scheme',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_regulatory_enquiry' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_regulatory_enquiry',
                'label' => 'tool_builder_lts_regulatory_enquiry',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_structure_settingup_jv_company' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_structure_settingup_jv_company',
                'label' => 'tool_builder_lts_structure_settingup_jv_company',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_legal_form_of_jv_company' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_legal_form_of_jv_company',
                'label' => 'tool_builder_lts_legal_form_of_jv_company',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_jv_company_established' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_jv_company_established',
                'label' => 'tool_builder_lts_jv_company_established',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_formalities_required_establishing' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_formalities_required_establishing',
                'label' => 'tool_builder_lts_formalities_required_establishing',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_applicable_tax_considerations' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_applicable_tax_considerations',
                'label' => 'tool_builder_lts_applicable_tax_considerations',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_financing_jv_company' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_financing_jv_company',
                'label' => 'tool_builder_lts_financing_jv_company',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_unding_through_debt_rather_than_equity' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_unding_through_debt_rather_than_equity',
                'label' => 'tool_builder_lts_unding_through_debt_rather_than_equity',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_party_funding_required_banks_security' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_party_funding_required_banks_security',
                'label' => 'tool_builder_lts_party_funding_required_banks_security',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_continuing_funding_requirements' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_continuing_funding_requirements',
                'label' => 'tool_builder_lts_continuing_funding_requirements',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_parties_defaults' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_parties_defaults',
                'label' => 'tool_builder_lts_parties_defaults',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_contribution_assets' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_contribution_assets',
                'label' => 'tool_builder_lts_contribution_assets',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_assets_need_to_valued' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_assets_need_to_valued',
                'label' => 'tool_builder_lts_assets_need_to_valued',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_assets_be_contributed' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_assets_be_contributed',
                'label' => 'tool_builder_lts_assets_be_contributed',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_competition_restrictions' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_competition_restrictions',
                'label' => 'tool_builder_lts_competition_restrictions',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_soliciting_customers_employees' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_soliciting_customers_employees',
                'label' => 'tool_builder_lts_soliciting_customers_employees',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_purposes_of_such_restrictions' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_purposes_of_such_restrictions',
                'label' => 'tool_builder_lts_purposes_of_such_restrictions',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_business_to_the_joint_venture' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_business_to_the_joint_venture',
                'label' => 'tool_builder_lts_business_to_the_joint_venture',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_purposes_of_such_restrictions2' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_purposes_of_such_restrictions2',
                'label' => 'tool_builder_lts_purposes_of_such_restrictions2',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_board_of_directors' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_board_of_directors',
                'label' => 'tool_builder_lts_board_of_directors',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_general_manager_ceo_appointed' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_general_manager_ceo_appointed',
                'label' => 'tool_builder_lts_general_manager_ceo_appointed',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_shareholder_board_management_matters' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_shareholder_board_management_matters',
                'label' => 'tool_builder_lts_shareholder_board_management_matters',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_conflict_situations' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_conflict_situations',
                'label' => 'tool_builder_lts_conflict_situations',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_ownership_jv_company' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_ownership_jv_company',
                'label' => 'tool_builder_lts_ownership_jv_company',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_shareholder_meetings' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_shareholder_meetings',
                'label' => 'tool_builder_lts_shareholder_meetings',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_locations_for_shareholders_meetings' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_locations_for_shareholders_meetings',
                'label' => 'tool_builder_lts_locations_for_shareholders_meetings',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_minority_protection' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_minority_protection',
                'label' => 'tool_builder_lts_minority_protection',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_rights_attaching_to_shares' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_rights_attaching_to_shares',
                'label' => 'tool_builder_lts_rights_attaching_to_shares',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_matters_for_decision' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_matters_for_decision',
                'label' => 'tool_builder_lts_matters_for_decision',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_if_minority_rights' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_if_minority_rights',
                'label' => 'tool_builder_lts_if_minority_rights',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_transfer_of_Shares' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_transfer_of_Shares',
                'label' => 'tool_builder_lts_transfer_of_Shares',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_shares_be_valued' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_shares_be_valued',
                'label' => 'tool_builder_lts_shares_be_valued',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_new_shareholder_be_required' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_new_shareholder_be_required',
                'label' => 'tool_builder_lts_new_shareholder_be_required',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_joint_ventures_name' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_joint_ventures_name',
                'label' => 'tool_builder_lts_joint_ventures_name',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_leaving_shareholder' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_leaving_shareholder',
                'label' => 'tool_builder_lts_leaving_shareholder',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_monies_owed_to_the_JV_Company' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_monies_owed_to_the_JV_Company',
                'label' => 'tool_builder_lts_monies_owed_to_the_JV_Company',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_key_Person_arrangements' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_key_Person_arrangements',
                'label' => 'tool_builder_lts_key_Person_arrangements',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_change_in_control_of_shareholder' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_change_in_control_of_shareholder',
                'label' => 'tool_builder_lts_change_in_control_of_shareholder',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_breach_of_undertakings' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_breach_of_undertakings',
                'label' => 'tool_builder_lts_breach_of_undertakings',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_death_of_shareholder' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_death_of_shareholder',
                'label' => 'tool_builder_lts_death_of_shareholder',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_deadlock' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_deadlock',
                'label' => 'tool_builder_lts_deadlock',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_deadlock_issues_resolved' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_deadlock_issues_resolved',
                'label' => 'tool_builder_lts_deadlock_issues_resolved',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_cooling_off' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_cooling_off',
                'label' => 'tool_builder_lts_cooling_off',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_if_deadlock_occurs' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_if_deadlock_occurs',
                'label' => 'tool_builder_lts_if_deadlock_occurs',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_continuous_business_involvement_jv_parties' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_continuous_business_involvement_jv_parties',
                'label' => 'tool_builder_lts_continuous_business_involvement_jv_parties',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_continuing_trading_arrangements' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_continuing_trading_arrangements',
                'label' => 'tool_builder_lts_continuing_trading_arrangements',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_flow_of_information' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_flow_of_information',
                'label' => 'tool_builder_lts_flow_of_information',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_employees' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_employees',
                'label' => 'tool_builder_lts_employees',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_consider_the_management_structure' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_consider_the_management_structure',
                'label' => 'tool_builder_lts_consider_the_management_structure',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_consider_share_option' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_consider_share_option',
                'label' => 'tool_builder_lts_consider_share_option',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_pension_arrangements' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_pension_arrangements',
                'label' => 'tool_builder_lts_pension_arrangements',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_cost_be_borne_by_the_parties' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_cost_be_borne_by_the_parties',
                'label' => 'tool_builder_lts_cost_be_borne_by_the_parties',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_Intellectual_property' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_Intellectual_property',
                'label' => 'tool_builder_lts_Intellectual_property',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_ip_rights' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_ip_rights',
                'label' => 'tool_builder_lts_ip_rights',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_exploit_the_ip_rights' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_exploit_the_ip_rights',
                'label' => 'tool_builder_lts_exploit_the_ip_rights',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_confidential_information' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_confidential_information',
                'label' => 'tool_builder_lts_confidential_information',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_ip_rights_on_termination' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_ip_rights_on_termination',
                'label' => 'tool_builder_lts_ip_rights_on_termination',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_administration' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_administration',
                'label' => 'tool_builder_lts_administration',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_lending_bankers' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_lending_bankers',
                'label' => 'tool_builder_lts_lending_bankers',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_lawyers' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_lawyers',
                'label' => 'tool_builder_lts_lawyers',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_auditors' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_auditors',
                'label' => 'tool_builder_lts_auditors',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_professional_advisers' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_professional_advisers',
                'label' => 'tool_builder_lts_professional_advisers',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_office_and_headquarters' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_office_and_headquarters',
                'label' => 'tool_builder_lts_office_and_headquarters',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_dividend_policy' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_dividend_policy',
                'label' => 'tool_builder_lts_dividend_policy',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_termination' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_termination',
                'label' => 'tool_builder_lts_termination',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_automatically_terminate' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_automatically_terminate',
                'label' => 'tool_builder_lts_automatically_terminate',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_entitled_to_terminate' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_entitled_to_terminate',
                'label' => 'tool_builder_lts_entitled_to_terminate',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tool_builder_lts_arrangements_will_apply_on_termination' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_lts_arrangements_will_apply_on_termination',
                'label' => 'tool_builder_lts_arrangements_will_apply_on_termination',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            // thtere
             'tool_builder_lts_approval_status' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_lts_approval_status',
                'label' => 'Approval Status',
                'type' => 'switch',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

           'tool_builder_lts_status' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_lts_status',
                'label' => 'Status?',
                'type' => 'switch',
                'default' => '1',
                'attributes' => array(),
                'rules' => 'trim'
            ),

              
              
              
            );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>