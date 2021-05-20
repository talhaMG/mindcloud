<?
class Model_videos extends MY_Model {
    /**
     *
     * @package     videos Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'videos';
    protected $_field_prefix    = 'videos_';
    protected $_pk    = 'videos_id';
    protected $_status_field    = 'videos_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "videos_id,videos_name,videos_status";
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
        
              'videos_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'videos_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

       

              'videos_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'videos_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     // 'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              
              'videos_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'videos_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array()),
                  'rules'   => 'required|strtolower|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),
                  
                  /*'videos_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'videos_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities|numeric'
                  ),
*/
               'videos_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'videos_desc',
                     'label'   => 'Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
                  'videos_transcript' => array(
                    'table'   => $this->_table,
                    'name'   => 'videos_transcript',
                    'label'   => 'Transcript',
                    'type'   => 'editor',
                    'attributes'   => array(),
                    'js_rules'   => '',
                    'rules'   => 'trim|htmlentities'
                 ),

                  'videos_image' => array(
                    'table' => $this->_table,
                    'name' => 'videos_image',
                    'label' => 'Video',
                    'type' => 'hidden',
                    'attributes' => array(),
                    'js_rules' => '',
                    'rules' => 'trim|htmlentities'
                ),

                'videos_image2' => array(
                    'table' => $this->_table,
                    'name' => 'videos_image2',
                    'label' => 'Image',
                    'type' => 'hidden',
                    'attributes' => array(),
                    'js_rules' => '',
                    'rules' => 'trim|htmlentities'
                ),

                
            // 'course_image2' => array(
            //     'table' => $this->_table,
            //     'name' => 'course_image2',
            //     'label' => 'Other Related Image',
            //     'name_path' => 'course_image_path',
            //     'upload_config' => 'site_upload_course',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes'   => array(
            //         'image_size_recommended'=>'366px × 397px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     // 'js_rules'=>$is_required_image
            // ),


         
            //     'videos_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'videos_image',
            //     'label' => 'Video',
            //     'name_path' => 'videos_image_path',
            //     'upload_config' => 'site_upload_videos',
            //     'type' => 'videoupload',
            //     'type_dt' => 'video',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     // 'thumb'   => array(array('name'=>'videos_image_thumb','max_width'=>260, 'max_height'=>250),),
            //     'attributes'   => array(
            //         'image_size_recommended'=>'366px × 397px',
            //         'allow_ext'=>'mkv|avi|mp4',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>$is_required_image
            // ),



      
            'videos_featured' => array(
                     'table'   => $this->_table,
                     'name'   => 'videos_featured',
                     'label'   => 'Popular',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "videos_featured" ,
                     'list_data' => array(),
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),

              'videos_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'videos_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "videos_status" ,
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