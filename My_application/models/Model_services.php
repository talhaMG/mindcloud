<?
class Model_services extends MY_Model {
    /**
     * Services MODEL
     *
     * @package     Services Model
     * @author      
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'services';
    protected $_field_prefix    = 'services_';
    protected $_pk    = 'services_id';
    protected $_status_field    = 'services_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "
        services_id,
        services_name,
        services_status";
        
        parent::__construct();

    }

    // Get all active servicess
    // public function get_services()
    // {
    //     // Set params
    //     $params['fields'] = "services_id, services_title, services_description, services_url, services_image, services_image_path";
    //     // Get result
    //     $result = $this->model_services->find_all_active($params);

    //     return $result;
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

        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(
              'services_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'services_id',
                     'label'   => 'ID',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

     
              'services_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'services_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              'services_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'services_type',
                     'label'   => 'Content 1',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),


              'services_size' => array(
                     'table'   => $this->_table,
                     'name'   => 'services_size',
                     'label'   => 'Content 2',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),


              'services_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'services_desc',
                     'label'   => 'Content 3',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
            // 'services_url' => array(
            //     'table'   => $this->_table,
            //     'name'   => 'services_url',
            //     'label'   => 'URL',
            //     'type'   => 'text',
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => 'trim|htmlentities'
            // ),
              // 'services_image' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'services_image',
              //        'label'   => 'Image',
              //        'name_path'   => 'services_image_path',
              //        'upload_config'   => 'site_upload_services',
              //        'type'   => 'fileupload',
              //        'type_dt'   => 'image',
              //        'randomize' => true,
              //        'preview'   => 'true',
              //        'attributes'   => array('image_size'=>'Recommended image size : 96px × 96px','allow_ext'=>'png|jpeg|jpg',),
              //        'dt_attributes'   => array("width"=>"10%"),
              //        'rules'   => 'trim|htmlentities',
              //        'js_rules'=>$is_required_image
              //     ),
              'services_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'services_status',
                     'label'   => 'Status',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "services_status" ,
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