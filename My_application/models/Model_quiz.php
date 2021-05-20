<?
class Model_quiz extends MY_Model {
    /**
     *
     * @package     quiz Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'quiz';
    protected $_field_prefix    = 'quiz_';
    protected $_pk    = 'quiz_id';
    protected $_status_field    = 'quiz_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "quiz_id,quiz_total,quiz_status";

        parent::__construct();

    }




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
    * 
    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'quiz_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              'quiz_total' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_total',
                     'label'   => 'Total',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

                'quiz_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_user_id',
                     'label'   => 'Userid',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

              'quiz_marks' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_marks',
                     'label'   => 'Marks',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),


            'quiz_percentage' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_percentage',
                     'label'   => 'Marks',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

                'quiz_order_item_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_order_item_id',
                     'label'   => 'Marks',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

                'quiz_course_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_course_id',
                     'label'   => 'Marks',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

                'quiz_certificate_number' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_certificate_number',
                     'label'   => 'Certificate',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
           
              'quiz_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'quiz_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "quiz_status" ,
                     'list_data' => array(),
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),

              
            );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>