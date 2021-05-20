<?
class Model_expert extends MY_Model {
    /**
     *
     * @package     expert Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'expert';
    protected $_field_prefix    = 'expert_';
    protected $_pk    = 'expert_id';
    protected $_status_field    = 'expert_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
        {
            $s3path=g('db.admin.bucketimg');
        // Call the Model constructor
        // $this->pagination_params['fields'] = "expert_id,expert_name,CONCAT(expert_image_path,expert_image) AS expert_image,expert_status";
        $this->pagination_params['fields'] = "expert_id,expert_name,expert_status";
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
        
              'expert_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'expert_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

       

              'expert_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'expert_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     // 'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              
            //   'expert_slug'  => array(
            //       'table'   => $this->_table,
            //       'name'   => 'expert_slug',
            //       'label'   => 'Slug',
            //       'type'   => 'text',
            //       'attributes'   => array(),
            //       'js_rules'   => array("is_slug" => array()),
            //       'rules'   => 'required|strtolower|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
            //   ),
                  
                  /*'expert_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'expert_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities|numeric'
                  ),
*/
               'expert_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'expert_desc',
                     'label'   => 'Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

         
            //       'expert_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'expert_image',
            //     'label' => 'Image',
            //     'name_path' => 'expert_image_path',
            //     'upload_config' => 'site_upload_expert',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     // 'thumb'   => array(array('name'=>'expert_image_thumb','max_width'=>260, 'max_height'=>250),),
            //     'attributes'   => array(
            //         'image_size_recommended'=>'31px × 31px',
            //         'allow_ext'=>'png|jpeg|jpg|svg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>$is_required_image
            // ),

            'expert_image' => array(
                'table' => $this->_table,
                'name' => 'expert_image',
                'label' => 'Image',
                'type' => 'hidden',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),



      
            'expert_featured' => array(
                     'table'   => $this->_table,
                     'name'   => 'expert_featured',
                     'label'   => 'Popular',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "expert_featured" ,
                     'list_data' => array(),
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),

              'expert_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'expert_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "expert_status" ,
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