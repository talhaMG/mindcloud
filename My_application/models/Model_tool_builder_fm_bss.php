<?
class Model_tool_builder_fm_bss extends MY_Model {
    /**
     * tool_builder MODEL
     *
     * @package     tool_builder Model
     * @author      
     * @version     2.0
     * @since       2016 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'tool_builder_fm_bss';
    protected $_field_prefix    = 'tool_builder_fm_bss_';
    protected $_pk    = 'tool_builder_id';
    protected $_status_field    = 'tool_builder_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model construtool_builderr
        $this->pagination_params['fields'] = "tool_builder_id,tool_builder_user_id,tool_builder_currency,tool_builder_cash,tool_builder_tool_builder_accounts_receivable,tool_builder_status";
        
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
         
                'tool_builder_cash' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_cash',
                'label' => 'Cash',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
             
               'tool_builder_accounts_receivable' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_accounts_receivable',
                'label' => 'Accounts Receivable',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

               'tool_builder_inventory' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_inventory',
                'label' => 'Inventory',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_prepaid_expenses' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_prepaid_expenses',
                'label' => 'Prepaid Expenses',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_short_term' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_short_term',
                'label' => 'Short Term Investments',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_long_term' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_long_term',
                'label' => 'Long term Investments',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_property_planted' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_property_planted',
                'label' => 'Property Plantand Equipment',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_less_accumulated' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_less_accumulated',
                'label' => '(Less Accumulated Depreciation)',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_intangible_assets' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_intangible_assets',
                'label' => 'Intangible Assets',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_deffered_income' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_deffered_income',
                'label' => 'Deferred Income Tax',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_assets_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_assets_1',
                'label' => 'Other Assets 1',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_assets_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_assets_2',
                'label' => 'Other Assets 2',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_assets_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_assets_3',
                'label' => 'Other Assets 3',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_assets_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_assets_4',
                'label' => 'Other Assets 4',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_accounts_payable' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_accounts_payable',
                'label' => 'Accounts Payable',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_short_term_loans' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_short_term_loans',
                'label' => 'Short-Term Loans',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_taxes_payable' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_taxes_payable',
                'label' => 'Taxes Payable',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_accrued_salaries' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_accrued_salaries',
                'label' => 'Accrued Salaries and Wages',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_unearned_revenue' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_unearned_revenue',
                'label' => 'Unearned Revenue',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_current_portion' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_current_portion',
                'label' => 'Current Portion of Long-Term Debt',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_current_liabilities_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_current_liabilities_1',
                'label' => 'Other Current Liabilities',
                'type' => 'number',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

             'tool_builder_other_current_liabilities_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_current_liabilities_2',
                'label' => 'Other Current Liabilities 2',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_long_term_debt' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_long_term_debt',
                'label' => 'Long-Term Debt',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_deffered_income_tax' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_deffered_income_tax',
                'label' => 'Deferred Income Tax',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'tool_builder_other_long_term_liabilities_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_long_term_liabilities_1',
                'label' => 'Other Long Term Liabilities 1',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_long_term_liabilities_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_long_term_liabilities_2',
                'label' => 'Other Long Term Liabilities 2',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_owners_investment' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_owners_investment',
                'label' => 'Owner’s Investment',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_retained_earnings' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_retained_earnings',
                'label' => 'Retained Earnings',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_equity_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_equity_1',
                'label' => 'Other Equity 1',
                'type' => 'number',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

            'tool_builder_other_equity_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_equity_2',
                'label' => 'Other Equity 2',
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