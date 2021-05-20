<?
class Model_tool_builder_fm_income extends MY_Model {
    /**
     * tool_builder MODEL
     *
     * @package     tool_builder Model
     * @author      
     * @version     2.0
     * @since       2016 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'tool_builder_fm_income';
    protected $_field_prefix    = 'tool_builder_fm_income_';
    protected $_pk    = 'tool_builder_id';
    protected $_status_field    = 'tool_builder_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model construtool_builderr
        $this->pagination_params['fields'] = "tool_builder_id,tool_builder_user_id,tool_builder_sales_1,tool_builder_advertising_1,tool_builder_approval_status,tool_builder_status";
        
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
         
                'tool_builder_sales_1' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_sales_1',
                'label' => 'Sales Revenue Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_sales_2' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_sales_2',
                'label' => 'Sales Revenue Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_sales_3' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_sales_3',
                'label' => 'Sales Revenue Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_returns_1' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_returns_1',
                'label' => 'Returns and Allowances Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_returns_2' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_returns_2',
                'label' => 'Returns and Allowances Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_returns_3' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_returns_3',
                'label' => 'Returns and Allowances Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_service_1' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_service_1',
                'label' => 'Service Revenue Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_service_2' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_service_2',
                'label' => 'Service Revenue Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_service_3' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_service_3',
                'label' => 'Service Revenue Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_service_3' => array(
                'table' => $this->_table,
                'name' => '	tool_builder_service_3',
                'label' => 'Service Revenue Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
             
               'tool_builder_interest_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_1',
                'label' => 'Interest Revenue Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_interest_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_2',
                'label' => 'Interest Revenue Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_interest_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_interest_3',
                'label' => 'Interest Revenue Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_1',
                'label' => 'Other Revenue',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_2',
                'label' => 'Other Revenue Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_3',
                'label' => 'Other Revenue  Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_4',
                'label' => 'Other Revenue Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_5' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_5',
                'label' => 'Other Revenue',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_6' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_6',
                'label' => 'Other Revenue Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_7' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_7',
                'label' => 'Other Revenue Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_other_r_8' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_r_8',
                'label' => 'Other Revenue Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_advertising_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_advertising_1',
                'label' => 'Advertising Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_advertising_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_advertising_2',
                'label' => 'Advertising Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_advertising_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_advertising_3',
                'label' => 'Advertising Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_debt_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_debt_1',
                'label' => 'Bad Debt Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_debt_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_debt_2',
                'label' => 'Bad Debt Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_debt_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_debt_3',
                'label' => 'Bad Debt Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_commissions_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_commissions_1',
                'label' => 'Commissions Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_commissions_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_commissions_2',
                'label' => 'Commissions Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_commissions_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_commissions_3',
                'label' => 'Commissions Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_goods_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_goods_1',
                'label' => 'Goods Sold Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_goods_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_goods_2',
                'label' => 'Goods Sold Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_goods_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_goods_3',
                'label' => 'Goods Sold Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_depreciation_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_depreciation_1',
                'label' => 'Depreciation Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_depreciation_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_depreciation_2',
                'label' => 'Depreciation Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_depreciation_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_depreciation_3',
                'label' => 'Depreciation Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_benefits_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_benefits_1',
                'label' => 'Employee Benefits Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_benefits_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_benefits_2',
                'label' => 'Employee Benefits Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_benefits_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_benefits_3',
                'label' => 'Employee Benefits Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_equipment_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_equipment_1',
                'label' => 'Furniture and Equipment Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_equipment_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_equipment_2',
                'label' => 'Furniture and Equipment Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_equipment_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_equipment_3',
                'label' => 'Furniture and Equipment Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_insurance_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_insurance_1',
                'label' => 'Insurance Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_insurance_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_insurance_2',
                'label' => 'Insurance Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_insurance_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_insurance_3',
                'label' => 'Insurance Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_expense_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_expense_1',
                'label' => 'Expense Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_expense_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_expense_2',
                'label' => 'Expense Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_expense_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_expense_3',
                'label' => 'Expense Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_maintenance_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_maintenance_1',
                'label' => 'Maintenance Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_maintenance_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_maintenance_2',
                'label' => 'Maintenance Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_maintenance_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_maintenance_3',
                'label' => 'Maintenance Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),



            'tool_builder_supplies_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_supplies_1',
                'label' => 'Office Supplies Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_supplies_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_supplies_2',
                'label' => 'Office Supplies Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_supplies_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_supplies_3',
                'label' => 'Office Supplies Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_payroll_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_1',
                'label' => 'Payroll Taxes Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_payroll_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_2',
                'label' => 'Payroll Taxes Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_payroll_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_payroll_3',
                'label' => 'Payroll Taxes Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_rent_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_rent_1',
                'label' => 'Rent Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_rent_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_rent_2',
                'label' => 'Rent Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_rent_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_rent_3',
                'label' => 'Rent Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_research_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_research_1',
                'label' => 'Research and Development Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_research_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_research_2',
                'label' => 'Research and Development Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_research_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_research_3',
                'label' => 'Research and Development Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_salaries_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_1',
                'label' => 'Salaries and Wages Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_salaries_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_2',
                'label' => 'Salaries and Wages Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_salaries_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_salaries_3',
                'label' => 'Salaries and Wages Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_software_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_software_1',
                'label' => 'Software Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_software_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_software_2',
                'label' => 'Software Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_software_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_software_3',
                'label' => 'Software Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_travel_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_travel_1',
                'label' => 'Travel Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_travel_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_travel_2',
                'label' => 'Travel Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_travel_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_travel_3',
                'label' => 'Travel Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_utilities_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_utilities_1',
                'label' => 'Utilities Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_utilities_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_utilities_2',
                'label' => 'Utilities Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_utilities_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_utilities_3',
                'label' => 'Utilities Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_hosting_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_hosting_1',
                'label' => 'Web Hosting Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_hosting_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_hosting_2',
                'label' => 'Web Hosting Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_hosting_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_hosting_3',
                'label' => 'Web Hosting Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_1',
                'label' => 'Other Expense',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_2',
                'label' => 'Other Expense Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_3',
                'label' => 'Other Expense Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_4' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_4',
                'label' => 'Other Expense Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_5' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_5',
                'label' => 'Other Expense',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_6' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_6',
                'label' => 'Other Expense Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_7' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_7',
                'label' => 'Other Expense Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_e_8' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_e_8',
                'label' => 'Other Expense Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_tax_expense_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_tax_expense_1',
                'label' => 'Tax Expenses Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_tax_expense_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_tax_expense_2',
                'label' => 'Tax Expenses Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_tax_expense_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_tax_expense_3',
                'label' => 'Tax Expenses Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_tax_expense_1' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_tax_expense_1',
                'label' => 'Other Tax Expenses Year 1',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),



            'tool_builder_other_tax_expense_2' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_tax_expense_2',
                'label' => 'Other Tax Expenses Year 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_other_tax_expense_3' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_other_tax_expense_3',
                'label' => 'Other Tax Expenses Year 3',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
 

             'tool_builder_approval_status' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_vp_approval_status',
                'label' => 'Approval Status',
                'type' => 'switch',
                'default' => '0',
                'attributes' => array(),
                'rules' => 'trim'
            ),

           'tool_builder_status' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_vp_status',
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