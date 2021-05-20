<?
class Model_client extends MY_Model {
    /**
     *
     * @package     client Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'client';
    protected $_field_prefix    = 'client_';
    protected $_pk    = 'client_id';
    protected $_status_field    = 'client_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "client_id,CONCAT(client_image_path,client_image) AS client_image                                      ,client_status";

        // $this->pagination_params['where_string'] = 'client_parent_id > 0';

        parent::__construct();

    }


    /*
    // Get all Categories start (non featured)
    public function get_categories()
    {
        // Set params
        $params['fields'] = "client_id,client_name,client_slug,client_image,client_image_thumb,client_image_path";
        // Query to get all categories
        $params['order'] = "client_name ASC";
        // Result
        $result = $this->model_client->find_all_active($params);
        return $result;
    }
    // Get all Categories end

    public function get_product_menu()
    {
        $param = array();
        $param['fields'] = 'client_id,client_name,client_slug';
        $param['where']['client_parent_id'] = 1;
        $data = $this->find_all_active($param);
        if(isset($data) AND array_filled($data)) {
            foreach($data as $key=>$value) {
                $param = array();
                $param['fields'] = 'client_id,client_name,client_slug';
                $param['where']['client_parent_id'] = $value['client_id'];
                $data[$key]['sub_client'] = $this->find_all_active($param);
            }
        }

        return $data; 
    }


    public function get_client_id_by_slug($slug)
    {
        $param = array();
        $param['where']['client_slug'] = $slug;
        $data = $this->find_one_active($param);
        return isset($data['client_id']) ? $data['client_id'] : 0;
    }

    public function get_subcat_ids_by_slug($slug)
    {
        $ids = array(0=>0);

        $client_id = $this->get_client_id_by_slug($slug);
        
        if(isset($client_id) AND ($client_id > 0))
        {
            $param = array();
            $param['where']['client_parent_id'] = $client_id;
            $d = $this->find_all_active($param);
            if(isset($d) AND array_filled($d)) {
                foreach($d as $value) {
                    $ids[$value['client_id']] = $value['client_id'];
                }
            }
        }
        return $ids;
    }

    public function find_by_slug($slug)
    {
        $param = array();
        $param['where']['client_slug'] = $slug;
        return $this->find_one_active($param);
    }
    */
    public function get_client($main_cat_id = "")
    {
        $title = "";
        if ($main_cat_id == 1) {
            $title = 'Normal Art';  
        }else{
            $title = 'Corporate Art';
        }
        return $title;
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
        
              'client_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'client_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              // 'client_parent_id' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'client_parent_id',
              //        'label'   => 'Parent client',
              //        'type'   => 'dropdown',
              //        'type_filter_dt'   => 'dropdown',
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"10%"),
              //        'js_rules'   => '',
              //        'rules'   => 'trim'
              //   ),

                // 'client_type' => array( 
                //      'table'   => $this->_table,
                //      'name'   => 'client_type',
                //      'label'   => 'Parent client',
                //      'type'   => 'dropdown',
                //      'type_dt'   => 'dropdown',
                //      'type_filter_dt' => 'dropdown',
                //      'list_data_key' => "client_type" ,
                //      'list_data' => array(
                //         0 => "Normal Art",
                //         1 => "Corporate Art"
                //         ),
                //      // 'default'   => '0',
                //      'attributes'   => array(),
                //      'dt_attributes'   => array("width"=>"7%"),
                //      'rules'   => 'required|trim'
                //   ),

                // 'client_name' => array(
                //     'table'   => $this->_table,
                //     'name'   => 'client_name',
                //     'label'   => 'Name',
                //     'type'   => 'text',
                //     'attributes'   => array(),
                //     'js_rules'   => '',
                //     'rules'   => 'trim|htmlentities'
                //  ),


                'client_type' => array( 
                     'table'   => $this->_table,
                     'name'   => 'client_type',
                     'label'   => 'Client Type',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "client_type" ,
                     'list_data' => array(
                        1 => "Corporate",
                        2 => "Strategic"
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

              
            //   'client_slug'  => array(
            //       'table'   => $this->_table,
            //       'name'   => 'client_slug',
            //       'label'   => 'Slug',
            //       'type'   => 'text',
            //       'attributes'   => array(),
            //       'js_rules'   => array("is_slug" => array()),
            //       'rules'   => 'required|strtolower|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
            //   ),



            'client_image' => array(
                'table' => $this->_table,
                'name' => 'client_image',
                'label' => 'Image',
                'name_path' => 'client_image_path',
                'upload_config' => 'site_upload_client',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                // 'thumb'   => array(array('name'=>'client_image_thumb','max_width'=>260, 'max_height'=>250),),
                'attributes'   => array(
                    'image_size_recommended'=>'170px × 130px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),



              /*
               'client_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'client_desc',
                     'label'   => 'Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => '|trim|htmlentities'
                  ),
               */
                  
                // 'client_feature' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'client_feature',
                //      'label'   => 'Feature',
                //      'type'   => 'switch',
                //      'type_dt'   => 'dropdown',
                //      'type_filter_dt' => 'dropdown',
                //      'list_data_key' => "client_feature" ,
                //      'list_data' => array(),
                //      'default'   => '0',
                //      'attributes'   => array(),
                //      'dt_attributes'   => array("width"=>"7%"),
                //      'rules'   => 'trim'
                //   ),

              'client_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'client_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "client_status" ,
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