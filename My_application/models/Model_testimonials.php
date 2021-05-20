<?
class Model_testimonials extends MY_Model {
    /**
     *
     * @package     testimonials Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'testimonials';
    protected $_field_prefix    = 'testimonials_';
    protected $_pk    = 'testimonials_id';
    protected $_status_field    = 'testimonials_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "testimonials_id,testimonials_title,CONCAT(testimonials_image_path,testimonials_image) AS testimonials_image,
        testimonials_status";

        parent::__construct();

    }

    // Get all Categories start (non featured)
    // public function get_categories()
    // {
    //     // Set params
    //     $params['fields'] = "testimonials_id,testimonials_title,testimonials_slug,testimonials_image,testimonials_image_thumb,testimonials_image_path";
    //     // Query to get all categories
    //     $params['order'] = "testimonials_title ASC";
    //     // Result
    //     $result = $this->model_testimonials->find_all_active($params);
    //     return $result;
    // }
    // Get all Categories end


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
    *                   -----Incase list_data_key is not defined, it will look for field_title as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        // Use when add new image
        // $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(
        
              'testimonials_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'testimonials_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              'testimonials_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'testimonials_title',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
              
              // 'testimonials_slug'  => array(
              //     'table'   => $this->_table,
              //     'name'   => 'testimonials_slug',
              //     'label'   => 'Slug',
              //     'type'   => 'text',
              //     'attributes'   => array(),
              //     'js_rules'   => array("is_slug" => array() ),
              //     'rules'   => 'required|strtolower|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              // ),
           
    
              'testimonials_position' => array(
                     'table'   => $this->_table,
                     'name'   => 'testimonials_position',
                     'label'   => 'Position',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

            'testimonials_heading' => array(
                    'table'   => $this->_table,
                    'name'   => 'testimonials_heading',
                    'label'   => 'Heading',
                    'type'   => 'text',
                    'attributes'   => array(),
                    'js_rules'   => 'required',
                    'rules'   => 'required|trim|htmlentities'
                 ),

           'testimonials_desc' => array(
                             'table'   => $this->_table,
                             'name'   => 'testimonials_desc',
                             'label'   => 'Content',
                             'type'   => 'editor',
                             'attributes'   => array(),
                             'js_rules'   => 'required',
                             'rules'   => 'required|trim'
                          ),    
              
              

               'testimonials_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'testimonials_image',
                     'label'   => 'Image',
                     'name_path'   => 'testimonials_image_path',
                     'upload_config'   => 'site_upload_testimonials',
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                     'attributes'   => array('label'=>'width = 270, Height = 196'),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),

        


           // 'testimonials_rates' => array(
           //                   'table'   => $this->_table,
           //                   'name'   => 'testimonials_rates',
           //                   'label'   => 'Rating',
           //                   'type'   => 'dropdown',
           //                  'type_dt'   => 'dropdown',
           //                  'list_data' => array(
           //                      1 => "1",
           //                      2 => "2",
           //                      3 => "3",
           //                      4 => "4"
           //                      ),
           //                   'attributes'   => array(),
           //                   'js_rules'   => 'required',
           //                   'rules'   => 'required|trim'
           //                ), 

  // 'testimonials_top' => array(
  //                    'table'   => $this->_table,
  //                    'name'   => 'testimonials_top',
  //                    'label'   => 'Set on top <span style="font-size=10px;color=red">Only Latest will appear.</span>',
  //                    'type'   => 'switch',
  //                    'type_dt'   => 'dropdown',
  //                    'type_filter_dt' => 'dropdown',
  //                    'list_data_key' => "testimonials_top" ,
  //                    'list_data' => array(),
  //                    'default'   => '0',
  //                    'attributes'   => array(),
  //                    'dt_attributes'   => array("width"=>"7%"),
  //                    'rules'   => 'trim'
  //                 ),

       // 'testimonials_feature' => array(
       //               'table'   => $this->_table,
       //               'name'   => 'testimonials_feature',
       //               'label'   => 'Featured',
       //               'type'   => 'switch',
       //               'type_dt'   => 'dropdown',
       //               'type_filter_dt' => 'dropdown',
       //               'list_data_key' => "testimonials_feature" ,
       //               'list_data' => array(),
       //               'default'   => '0',
       //               'attributes'   => array(),
       //               'dt_attributes'   => array("width"=>"7%"),
       //               'rules'   => 'trim'
       //            ),
            
              'testimonials_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'testimonials_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "testimonials_status" ,
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