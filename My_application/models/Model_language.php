<?
class Model_language extends MY_Model {
    /**
     *
     * @package     language Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'language';
    protected $_field_prefix    = 'language_';
    protected $_pk    = 'language_id';
    protected $_status_field    = 'language_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "language_id,language_name,language_status";
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
        
              'language_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'language_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

       

              'language_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'language_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     // 'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              
              'language_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'language_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array()),
                  'rules'   => 'required|strtolower|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),
                  
                  /*'language_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'language_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities|numeric'
                  ),
*/
            //    'language_desc' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'language_desc',
            //          'label'   => 'Description',
            //          'type'   => 'editor',
            //          'attributes'   => array(),
            //          'js_rules'   => '',
            //          'rules'   => 'trim|htmlentities'
            //       ),

         
            //       'language_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'language_image',
            //     'label' => 'Image',
            //     'name_path' => 'language_image_path',
            //     'upload_config' => 'site_upload_language',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     // 'thumb'   => array(array('name'=>'language_image_thumb','max_width'=>260, 'max_height'=>250),),
            //     'attributes'   => array(
            //         'image_size_recommended'=>'31px ?? 31px',
            //         'allow_ext'=>'png|jpeg|jpg|svg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>$is_required_image
            // ),



      
            // 'language_featured' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'language_featured',
            //          'label'   => 'Popular',
            //          'type'   => 'switch',
            //          'type_dt'   => 'dropdown',
            //          'type_filter_dt' => 'dropdown',
            //          'list_data_key' => "language_featured" ,
            //          'list_data' => array(),
            //          'default'   => '1',
            //          'attributes'   => array(),
            //          'dt_attributes'   => array("width"=>"7%"),
            //          'rules'   => 'trim'
            //       ),

              'language_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'language_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "language_status" ,
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