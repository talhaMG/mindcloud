<?
class Model_reviews extends MY_Model {
    /**
     *
     * @package     reviews Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'reviews';
    protected $_field_prefix    = 'reviews_';
    protected $_pk    = 'reviews_id';
    protected $_status_field    = 'reviews_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "reviews_id,reviews_title,CONCAT(reviews_image_path,reviews_image) AS reviews_image,
        reviews_status";

        parent::__construct();

    }

    // Get all Categories start (non featured)
    // public function get_categories()
    // {
    //     // Set params
    //     $params['fields'] = "reviews_id,reviews_title,reviews_slug,reviews_image,reviews_image_thumb,reviews_image_path";
    //     // Query to get all categories
    //     $params['order'] = "reviews_title ASC";
    //     // Result
    //     $result = $this->model_reviews->find_all_active($params);
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
        
              'reviews_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'reviews_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              'reviews_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'reviews_title',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
              
              // 'reviews_slug'  => array(
              //     'table'   => $this->_table,
              //     'name'   => 'reviews_slug',
              //     'label'   => 'Slug',
              //     'type'   => 'text',
              //     'attributes'   => array(),
              //     'js_rules'   => array("is_slug" => array() ),
              //     'rules'   => 'required|strtolower|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              // ),
           
    
              'reviews_other' => array(
                     'table'   => $this->_table,
                     'name'   => 'reviews_other',
                     'label'   => 'Other Detail',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

           'reviews_desc' => array(
                             'table'   => $this->_table,
                             'name'   => 'reviews_desc',
                             'label'   => 'Content',
                             'type'   => 'editor',
                             'attributes'   => array(),
                             'js_rules'   => 'required',
                             'rules'   => 'required|trim'
                          ),    
              
              

               'reviews_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'reviews_image',
                     'label'   => 'Image',
                     'name_path'   => 'reviews_image_path',
                     'upload_config'   => 'site_upload_reviews',
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                     'attributes'   => array('label'=>'width = 270, Height = 196'),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),

        


           // 'reviews_rates' => array(
           //                   'table'   => $this->_table,
           //                   'name'   => 'reviews_rates',
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

  // 'reviews_top' => array(
  //                    'table'   => $this->_table,
  //                    'name'   => 'reviews_top',
  //                    'label'   => 'Set on top <span style="font-size=10px;color=red">Only Latest will appear.</span>',
  //                    'type'   => 'switch',
  //                    'type_dt'   => 'dropdown',
  //                    'type_filter_dt' => 'dropdown',
  //                    'list_data_key' => "reviews_top" ,
  //                    'list_data' => array(),
  //                    'default'   => '0',
  //                    'attributes'   => array(),
  //                    'dt_attributes'   => array("width"=>"7%"),
  //                    'rules'   => 'trim'
  //                 ),

       // 'reviews_feature' => array(
       //               'table'   => $this->_table,
       //               'name'   => 'reviews_feature',
       //               'label'   => 'Featured',
       //               'type'   => 'switch',
       //               'type_dt'   => 'dropdown',
       //               'type_filter_dt' => 'dropdown',
       //               'list_data_key' => "reviews_feature" ,
       //               'list_data' => array(),
       //               'default'   => '0',
       //               'attributes'   => array(),
       //               'dt_attributes'   => array("width"=>"7%"),
       //               'rules'   => 'trim'
       //            ),
            
              'reviews_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'reviews_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "reviews_status" ,
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