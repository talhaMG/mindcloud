<?
class Model_requirements extends MY_Model {
    /**
     *
     * @package     requirements Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'requirements';
    protected $_field_prefix    = 'requirements_';
    protected $_pk    = 'requirements_id';
    protected $_status_field    = 'requirements_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "requirements_id,states.states_name,profession.profession_name,requirements_status";
        $this->pagination_params['joins'][] = array(
                                            "table"=>"states", 
                                            "joint"=>"states.states_id = requirements.requirements_state_id"
                                            );
        $this->pagination_params['joins'][] = array(
                                            "table"=>"profession", 
                                            "joint"=>"profession.profession_id = requirements.requirements_profession_id"
                                            );
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
        
              'requirements_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'requirements_profession_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_profession_id',
                     'label'   => 'Profession',
                     'type'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim|required'
                ),

              'requirements_state_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_state_id',
                     'label'   => 'State',
                     'type'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim|required'
                ),

                // 'requirements_type' => array( 
                //      'table'   => $this->_table,
                //      'name'   => 'requirements_type',
                //      'label'   => 'Parent requirements',
                //      'type'   => 'dropdown',
                //      'type_dt'   => 'dropdown',
                //      'type_filter_dt' => 'dropdown',
                //      'list_data_key' => "requirements_type" ,
                //      'list_data' => array(
                //         0 => "Normal Art",
                //         1 => "Corporate Art"
                //         ),
                //      // 'default'   => '0',
                //      'attributes'   => array(),
                //      'dt_attributes'   => array("width"=>"7%"),
                //      'rules'   => 'required|trim'
                //   ),

              'requirements_update_data' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_update_data',
                     'label'   => 'Last Updated',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),



              'requirements_phone' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_phone',
                     'label'   => 'Phone',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
              'requirements_fax' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_fax',
                     'label'   => 'Fax',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
              'requirements_website' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_website',
                     'label'   => 'Website Address',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
              'requirements_address' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_address',
                     'label'   => 'Address',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

               'requirements_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_desc',
                     'label'   => 'Details',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

            
            // 'requirements_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'requirements_image',
            //     'label' => 'Image',
            //     'name_path' => 'requirements_image_path',
            //     'upload_config' => 'site_upload_requirements',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     // 'thumb'   => array(array('name'=>'requirements_image_thumb','max_width'=>260, 'max_height'=>250),),
            //     'attributes'   => array(
            //         'image_size_recommended'=>'366px × 397px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>$is_required_image
            // ),


              'requirements_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'requirements_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "requirements_status" ,
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