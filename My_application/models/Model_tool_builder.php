<?
class Model_tool_builder extends MY_Model {
    /**
     * tool_builder MODEL
     *
     * @package     tool_builder Model
     * @author      
     * @version     2.0
     * @since       2016 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'tool_builder';
    protected $_field_prefix    = 'tool_builder_';
    protected $_pk    = 'tool_builder_id';
    protected $_status_field    = 'tool_builder_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model construtool_builderr
        $this->pagination_params['fields'] = "tool_builder_id,tool_builder_user_id,tool_builder_customer_segments,tool_builder_value_proposition,tool_builder_approval_status,tool_builder_status";
        
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

              'tool_builder_customer_segments' => array(
                     'table'   => $this->_table,
                     'name'   => 'tool_builder_customer_segments',
                     'label'   => 'Customer Segments',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
              
         
                'tool_builder_value_proposition' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_value_proposition',
                'label' => 'Value Proposition',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
             
               'tool_builder_channels' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_channels',
                'label' => 'Channels',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),



               'tool_builder_customer_relationship' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_customer_relationship',
                'label' => 'Customer Relationship',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),


            'tool_builder_revenue_model' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_revenue_model',
                'label' => 'Revenue Model',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'tool_builder_key_resources' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_key_resources',
                'label' => 'Key Resources',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
          
      

            'tool_builder_key_activities' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_key_activities',
                'label' => 'Key Activities',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

                'tool_builder_key_partners' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_key_partners',
                'label' => 'Key Partners',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
          
                'tool_builder_cost_structure' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_cost_structure',
                'label' => 'Cost Structure',
                'type' => 'textarea',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
      
           

             'tool_builder_approval_status' => array(
                'table' => $this->_table,
                'name' => 'tool_builder_approval_status',
                'label' => 'Approval Status',
                'type' => 'switch',
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