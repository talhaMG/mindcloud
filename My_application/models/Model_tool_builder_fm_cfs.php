<?
class Model_tool_builder_fm_cfs extends MY_Model {
    /**
     * tool_builder MODEL
     *
     * @package     tool_builder Model
     * @author      
     * @version     2.0
     * @since       2016 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'tool_builder_fm_cfs';
    protected $_field_prefix    = 'tool_builder_fm_cfs_';
    protected $_pk    = 'tool_builder_id';
    protected $_status_field    = 'tool_builder_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model construtool_builderr
        $this->pagination_params['fields'] = "tool_builder_id,tool_builder_user_id,tool_builder_currency,tool_builder_begin_current_period,tool_builder_begin_previous_period,tool_builder_status";
        
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
        
              'tool_builder_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

                'tool_builder_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_user_id',
                     'label'   => 'User ID',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),



                'tool_builder_step_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_step_id',
                     'label'   => 'Step ID',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'tool_builder_currency' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_currency',
                     'label'   => 'Currency',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
         
                'tool_builder_begin_current_period' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_begin_current_period',
                'label' => 'What is your Begin Current Period ?',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
             
               'tool_builder_begin_previous_period' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_begin_previous_period',
                'label' => 'What is your Begin Previous Period ?',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

               'tool_builder_end_current_period' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_end_current_period',
                'label' => 'What is your End Current Period ?',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_end_previous_period' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_end_previous_period',
                'label' => 'What is your End Previous Period ?',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_cash_on_hand_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_on_hand_1',
                'label' => 'Beginning Balance | Cash On Hand Current',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_cash_on_hand_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_on_hand_2',
                'label' => 'Beginning Balance | Cash On Hand Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_cash_on_hand_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_on_hand_3',
                'label' => 'Beginning Balance | Cash On Hand',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_cash_sales_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_sales_current',
                'label' => 'CASH SALES Current Period',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_cash_sales_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_sales_previous',
                'label' => 'CASH SALES Previous Period',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_cash_sales_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_sales_increase',
                'label' => 'CASH SALES INCREASE (or DECREASE)',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_account_collection_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_account_collection_current',
                'label' => 'CUSTOMER ACCOUNT COLLECTIONS Current Period',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_account_collection_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_account_collection_previous',
                'label' => 'CUSTOMER ACCOUNT COLLECTIONS Previous Period',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_account_collection_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_account_collection_increase',
                'label' => 'CUSTOMER ACCOUNT COLLECTIONS INCREASE (or DECREASE)',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_cash_injection_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_injection_current',
                'label' => 'LOAN / CASH INJECTION Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_cash_injection_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_injection_previous',
                'label' => 'LOAN / CASH INJECTION Previous',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_cash_injection_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_injection_increase',
                'label' => 'LOAN / CASH INJECTION INCREASE (or DECREASE)',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_interest_income_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_income_current',
                'label' => 'INTEREST INCOME Currnet',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_interest_income_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_income_previous',
                'label' => 'INTEREST INCOME Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_interest_income_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_income_increase',
                'label' => 'INTEREST INCOME Increase',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_tax_refund_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_tax_refund_current',
                'label' => 'TAX REFUND Currnet',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_tax_refund_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_tax_refund_previous',
                'label' => 'TAX REFUND Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_interest_income_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_tax_refund_increase',
                'label' => 'TAX REFUND Increase',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_cash_receipts_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_1',
                'label' => 'OTHER CASH RECEIPTS Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cash_receipts_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_2',
                'label' => 'OTHER CASH RECEIPTS Previous',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_cash_receipts_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_3',
                'label' => 'OTHER CASH RECEIPTS Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cash_receipts_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_4',
                'label' => 'OTHER CASH RECEIPTS Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cash_receipts_5' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_5',
                'label' => 'OTHER CASH RECEIPTS Previous',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_cash_receipts_6' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_6',
                'label' => 'OTHER CASH RECEIPTS Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cash_receipts_7' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_7',
                'label' => 'OTHER CASH RECEIPTS Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cash_receipts_8' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_8',
                'label' => 'OTHER CASH RECEIPTS Previous',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_cash_receipts_9' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_9',
                'label' => 'OTHER CASH RECEIPTS Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cash_receipts_10' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_10',
                'label' => 'OTHER CASH RECEIPTS Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cash_receipts_11' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_11',
                'label' => 'OTHER CASH RECEIPTS Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cash_receipts_12' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cash_receipts_12',
                'label' => 'OTHER CASH RECEIPTS Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_total_cash_receipts_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_cash_receipts_1',
                'label' => 'TOTAL CASH RECEIPTS Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_total_cash_receipts_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_cash_receipts_2',
                'label' => 'TOTAL CASH RECEIPTS Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_total_cash_receipts_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_cash_receipts_3',
                'label' => 'TOTAL CASH RECEIPTS Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_service_costs_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_service_costs_current',
                'label' => 'Service Costs Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_service_costs_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_service_costs_previous',
                'label' => 'Service Costs Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_service_costs_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_service_costs_increase',
                'label' => 'Service Costs Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_payroll_benefits_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_benefits_current',
                'label' => 'Payroll Benefits Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_payroll_benefits_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_benefits_previous',
                'label' => 'Payroll Benefits Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_payroll_benefits_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_benefits_increase',
                'label' => 'Payroll Benefits Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_salaries_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_current',
                'label' => 'Salaries Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_salaries_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_previous',
                'label' => 'Salaries Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_salaries_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_increase',
                'label' => 'Salaries Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_supplies_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_supplies_current',
                'label' => 'Supplies Currnet',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_supplies_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_supplies_previous',
                'label' => 'Supplies Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_supplies_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_supplies_increase',
                'label' => 'Supplies Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cost_of_goods_current_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_current_1',
                'label' => 'Other Cost Of Goods Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_previous_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_previous_1',
                'label' => 'Other Cost Of Goods Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cost_of_goods_increase_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_increase_1',
                'label' => 'Other Cost Of Goods Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_current_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_current_2',
                'label' => 'Other Cost Of Goods Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_previous_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_previous_2',
                'label' => 'Other Cost Of Goods Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cost_of_goods_increase_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_increase_2',
                'label' => 'Other Cost Of Goods Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_current_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_current_3',
                'label' => 'Other Cost Of Goods Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_previous_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_previous_3',
                'label' => 'Other Cost Of Goods Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cost_of_goods_increase_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_increase_3',
                'label' => 'Other Cost Of Goods Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_current_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_current_4',
                'label' => 'Other Cost Of Goods Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_cost_of_goods_previous_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_previous_4',
                'label' => 'Other Cost Of Goods Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_cost_of_goods_increase_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_cost_of_goods_increase_4',
                'label' => 'Other Cost Of Goods Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_total_cost_of_goods_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_cost_of_goods_current',
                'label' => 'Total Cost Of Goods Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_total_cost_of_goods_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_cost_of_goods_previous',
                'label' => 'Total Cost Of Goods Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_total_cost_of_goods_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_cost_of_goods_increase',
                'label' => 'Total Cost Of Goods Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_account_fees_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_account_fees_current',
                'label' => 'Account Fees Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_account_fees_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_account_fees_previous',
                'label' => 'Account Fees Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_account_fees_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_account_fees_increase',
                'label' => 'Account Fees Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_advertising_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_advertising_current',
                'label' => 'Advertising Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_advertising_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_advertising_previous',
                'label' => 'Advertising Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_advertising_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_advertising_increase',
                'label' => 'Advertising Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_bank_fees_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_bank_fees_current',
                'label' => 'Bank Fees Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_bank_fees_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_bank_fees_previous',
                'label' => 'Bank Fees Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_bank_fees_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_bank_fees_increase',
                'label' => 'Bank Fees Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_continuing_education_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_continuing_education_current',
                'label' => 'Continuing Education Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_continuing_education_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_continuing_education_previous',
                'label' => 'Continuing Education Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_continuing_education_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_continuing_education_increase',
                'label' => 'Continuing Education Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_dues_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_dues_current',
                'label' => 'Dues Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_dues_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_dues_previous',
                'label' => 'Dues Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_dues_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_dues_increase',
                'label' => 'Dues Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_insurance_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_insurance_current',
                'label' => 'Insurance Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_insurance_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_insurance_previous',
                'label' => 'Insurance Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_insurance_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_insurance_increase',
                'label' => 'Insurance Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_internet_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_internet_current',
                'label' => 'Internet Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_internet_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_internet_previous',
                'label' => 'Internet Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_internet_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_internet_increase',
                'label' => 'Internet Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_licenses_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_licenses_current',
                'label' => 'Licenses Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_licenses_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_licenses_previous',
                'label' => 'Licenses Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_licenses_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_licenses_increase',
                'label' => 'Licenses Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_meals_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_meals_current',
                'label' => 'Meals Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_meals_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_meals_previous',
                'label' => 'Meals Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_meals_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_meals_increase',
                'label' => 'Meals Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_office_supplies_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_office_supplies_current',
                'label' => 'Office Supplies Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_office_supplies_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_office_supplies_previous',
                'label' => 'Office Supplies Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_office_supplies_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_office_supplies_increase',
                'label' => 'Office Supplies Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_payroll_processing_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_processing_current',
                'label' => 'Payroll Processing Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_payroll_processing_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_processing_previous',
                'label' => 'Payroll Processing Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_payroll_processing_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_processing_increase',
                'label' => 'Payroll Processing Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_payroll_benefits_indirect_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_benefits_indirect_current',
                'label' => 'Payroll Benefits Indirect Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_payroll_benefits_indirect_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_benefits_indirect_previous',
                'label' => 'Payroll Benefits Indirect Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_payroll_benefits_indirect_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_benefits_indirect_increase',
                'label' => 'Payroll Benefits Indirect Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_postage_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_postage_current',
                'label' => 'Postage Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_postage_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_postage_previous',
                'label' => 'Postage Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_postage_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_postage_increase',
                'label' => 'Postage Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_printing_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_printing_current',
                'label' => 'Printing Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_printing_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_printing_previous',
                'label' => 'Printing Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_printing_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_printing_increase',
                'label' => 'Printing Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_professional_svcs_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_professional_svcs_current',
                'label' => 'Professional SVCS Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_professional_svcs_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_professional_svcs_previous',
                'label' => 'Professional SVCS Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_professional_svcs_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_professional_svcs_increase',
                'label' => 'Professional SVCS Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_occupancy_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_occupancy_current',
                'label' => 'Occupancy Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_occupancy_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_occupancy_previous',
                'label' => 'Occupancy Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_occupancy_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_occupancy_increase',
                'label' => 'Occupancy Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_rental_fees_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_rental_fees_current',
                'label' => 'Rental Fees Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_rental_fees_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_rental_fees_previous',
                'label' => 'Rental Fees Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_rental_fees_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_rental_fees_increase',
                'label' => 'Rental Fees Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_salaries_indirect_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_indirect_current',
                'label' => 'Salaries Indirect Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_salaries_indirect_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_indirect_previous',
                'label' => 'Salaries Indirect Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_salaries_indirect_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_indirect_increase',
                'label' => 'Salaries Indirect Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_subcontractors_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_subcontractors_current',
                'label' => 'Subcontractors Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_subcontractors_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_subcontractors_previous',
                'label' => 'Subcontractors Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_subcontractors_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_subcontractors_increase',
                'label' => 'Subcontractors Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_telephone_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_telephone_current',
                'label' => 'Telephone Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_telephone_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_telephone_previous',
                'label' => 'Telephone Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_telephone_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_telephone_increase',
                'label' => 'Telephone Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_transportation_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_transportation_current',
                'label' => 'Transportation Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_transportation_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_transportation_previous',
                'label' => 'Transportation Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_transportation_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_transportation_increase',
                'label' => 'Transportation Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_travel_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_travel_current',
                'label' => 'Travel Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_travel_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_travel_previous',
                'label' => 'Travel Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_travel_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_travel_increase',
                'label' => 'Travel Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_utilities_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_utilities_current',
                'label' => 'Utilities Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_utilities_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_utilities_previous',
                'label' => 'Utilities Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_utilities_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_utilities_increase',
                'label' => 'Utilities Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_web_development_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_web_development_current',
                'label' => 'Web Development Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_web_development_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_web_development_previous',
                'label' => 'Web Development Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_web_development_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_web_development_increase',
                'label' => 'Web Development Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_web_domain_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_web_domain_current',
                'label' => 'Web Domain Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_web_domain_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_web_domain_previous',
                'label' => 'Web Domain Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_web_domain_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_web_domain_increase',
                'label' => 'Web Domain Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_operating_expenses_current_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_current_1',
                'label' => 'Other Operating Expenses Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_operating_expenses_previous_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_previous_1',
                'label' => 'Other Operating Expenses Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_operating_expenses_increase_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_increase_1',
                'label' => 'Other Operating Expenses Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_operating_expenses_current_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_current_2',
                'label' => 'Other Operating Expenses Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_operating_expenses_previous_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_previous_2',
                'label' => 'Other Operating Expenses Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_operating_expenses_increase_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_increase_2',
                'label' => 'Other Operating Expenses Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_operating_expenses_current_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_current_3',
                'label' => 'Other Operating Expenses Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_operating_expenses_previous_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_previous_3',
                'label' => 'Other Operating Expenses Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_operating_expenses_increase_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_operating_expenses_increase_3',
                'label' => 'Other Operating Expenses Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_total_operating_expenses_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_operating_expenses_current',
                'label' => 'Total Operating Expenses Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_total_operating_expenses_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_operating_expenses_previous',
                'label' => 'Total Operating Expenses Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_total_operating_expenses_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_operating_expenses_increase',
                'label' => 'Total Operating Expenses Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_cash_disbursements_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_disbursements_current',
                'label' => 'Cash Disbursements Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_cash_disbursements_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_disbursements_previous',
                'label' => 'Cash Disbursements Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_cash_disbursements_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cash_disbursements_increase',
                'label' => 'Cash Disbursements Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_interest_expense_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_expense_current',
                'label' => 'Interest Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_interest_expense_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_expense_previous',
                'label' => 'Interest Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_interest_expense_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_expense_increase',
                'label' => 'Interest Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_income_tax_expense_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_income_tax_expense_current',
                'label' => 'Income Tax Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_income_tax_expense_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_income_tax_expense_previous',
                'label' => 'Income Tax Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_income_tax_expense_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_income_tax_expense_increase',
                'label' => 'Income Tax Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_additional_expense_current_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_current_1',
                'label' => 'Other Additional Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_additional_expense_previous_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_previous_1',
                'label' => 'Other Additional Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_additional_expense_increase_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_increase_1',
                'label' => 'Other Additional Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_additional_expense_current_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_current_2',
                'label' => 'Other Additional Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_additional_expense_previous_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_previous_2',
                'label' => 'Other Additional Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_additional_expense_increase_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_increase_2',
                'label' => 'Other Additional Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_additional_expense_current_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_current_3',
                'label' => 'Other Additional Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_additional_expense_previous_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_previous_3',
                'label' => 'Other Additional Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_additional_expense_increase_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_increase_3',
                'label' => 'Other Additional Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_additional_expense_current_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_current_4',
                'label' => 'Other Additional Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_additional_expense_previous_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_previous_4',
                'label' => 'Other Additional Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_additional_expense_increase_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_additional_expense_increase_4',
                'label' => 'Other Additional Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_total_additional_expense_current' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_additional_expense_current',
                'label' => 'Total Additional Expense Current',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_total_additional_expense_previous' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_additional_expense_previous',
                'label' => 'Total Additional Expense Previous',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_total_additional_expense_increase' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_total_additional_expense_increase',
                'label' => 'Total Additional Expense Increase',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

           'tool_builder_status' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_status',
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