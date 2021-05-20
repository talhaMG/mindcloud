<?
class Model_inner_banner extends MY_Model {
    /**
     * TKD inner_banner MODEL
     *
     * @package     inner_banner Model
     * 
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'inner_banner';
    protected $_field_prefix    = 'inner_banner_';
    protected $_pk    = 'inner_banner_id';
    protected $_status_field    = 'inner_banner_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "inner_banner_id, inner_banner_page, 
        CONCAT(inner_banner_image_path, inner_banner_image) as inner_banner_image,
        ,inner_banner_status";


        $segment_d = array();
        if (in_array($this->uri->segment(4), $segment_d)) {
            $this->layer = "editor";
        }else
        {
            $this->layer = "hidden";
        }


        // $seg_type = array(1,3);
        // if (in_array($this->uri->segment(4), $seg_type)) {
        //     $this->title_type = "editor";
        // }else
        // {
            $this->title_type = "text";
        // }

        parent::__construct();
    }

   

    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * attributes  HTML Field Attributes
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules
    */
    public function get_fields( $specific_field = "" )
    {
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(
        
              'inner_banner_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'inner_banner_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'tutor_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'tutor_id',
                     'label'   => 'Page',
                     // 'type'   => 'text',
                     'type'   => 'readonly',
                     'list_data'    => array() ,
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim',
                  ),

             
                'inner_banner_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'inner_banner_title',
                     'label'   => 'Title',
                     'type'   =>  'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


                'inner_banner_content' => array(
                     'table'   => $this->_table,
                     'name'   => 'inner_banner_content',
                     'label'   => 'Layer 1',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                  'inner_banner_content1' => array(
                    'table'   => $this->_table,
                    'name'   => 'inner_banner_content1',
                    'label'   => 'Layer 2',
                    'type'   => $this->layer,
                    'attributes'   => array(),
                    'js_rules'   => '',
                    'rules'   => 'trim|htmlentities'
                 ),
                   
                  'inner_banner_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'inner_banner_image',
                     'label'   => 'Image',
                     'name_path'   => 'inner_banner_image_path',
                     'upload_config'   => 'site_upload_inner_banner',
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                     'attributes'   => array('label'=>'width = 1604 & Height = 435','allow_ext'=>'png|jpeg|jpg'),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities',
                     'js_rules'=>$is_required_image
                  ),
              

                // 'inner_banner_icon' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'inner_banner_icon',
                //      'label'   => 'Background Image',
                //      'name_path'   => 'inner_banner_image_path',
                //      'type'   => 'fileupload',
                //      'type_dt'   => 'image',
                //      'randomize' => true,
                //      'preview'   => 'true',
                //      'attributes'   => array('label'=>'width = 1600 & Height = 333','allow_ext'=>'png|jpeg|jpg',),
                //      'dt_attributes'   => array("width"=>"10%"),
                //      'rules'   => 'trim|htmlentities'
                //   ),
              
              'inner_banner_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'inner_banner_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'switch',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( 
                                      
                                    ) ,
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