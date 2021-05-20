<?
class Model_order_trail extends MY_Model {
    /**
     *
     * @package     order_trail Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'order_trail';
    protected $_field_prefix    = 'otrail_';
    protected $_pk    = 'otrail_id';
    protected $_status_field    = 'otrail_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "otrail_id,otrail_name,otrail_status";
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
        
              'otrail_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'otrail_order_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_order_id',
                     'label'   => 'Order Id',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'otrail_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_user_id',
                     'label'   => 'Order Id',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

                'otrail_payment_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_payment_type',
                     'label'   => 'Order Id',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

                'otrail_merchant' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_merchant',
                     'label'   => 'Order Id',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


           'otrail_payment_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_payment_status',
                     'label'   => 'Merchant',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),



           'otrail_payment_amount' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_payment_amount',
                     'label'   => 'Merchant',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


             'otrail_payment_post' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_payment_post',
                     'label'   => 'Merchant',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
           

        'otrail_reference_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_reference_id',
                     'label'   => 'Amazon ',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


             'otrail_txn_message' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_txn_message',
                     'label'   => 'Merchant',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


        
             'otrail_txn_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_txn_id',
                     'label'   => 'Merchant',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),



             'otrail_createdon' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_createdon',
                     'label'   => 'Creadted',
                     'type'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


            
              'otrail_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'otrail_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "otrail_status" ,
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