<?
class Model_banner extends MY_Model
{
    /**
     * TKD banner MODEL
     *
     * @package     banner Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'banner';
    protected $_field_prefix = 'banner_';
    protected $_pk = 'banner_id';
    protected $_status_field = 'banner_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "banner_id,banner_layout2,banner_layout1,CONCAT(banner_image_path,banner_image) AS banner_image,banner_status";

        parent::__construct();
    }

    // public function get_page_banner($page='')
    // {
    //     // Set params
    //     $params['fields'] = 'banner_page,banner_title,banner_image_path,banner_image,banner_status';
    //     $params['where']['banner_page'] = $page;
    //     return $this->model_banner->find_one_active($params);

    // }

    public function get_banners()
    {
        // Set params
        $params = array();
        $params['order'] = 'banner_position ASC';
        return $this->model_banner->find_all_active($params);

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
    public function get_fields($specific_field = "")
    {
        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

            'banner_id' => array(
                'table' => $this->_table,
                'name' => 'banner_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            // 'banner_position' => array(
            //        'table'   => $this->_table,
            //        'name'   => 'banner_position',
            //        'label'   => 'Position',
            //        'type'   => 'dropdown',
            //        'list_data'    => array(
            //             "1"=>"Position 1",
            //             "2"=>"Position 2",
            //             "3"=>"Position 3",
            //             "4"=>"Position 4",
            //             "5"=>"Position 5") ,
            //        'attributes'   => array(),
            //        'js_rules'   => 'required',
            //        'rules'   => 'required|trim',
            //     ),


   
            'banner_layout1' => array(
                'table' => $this->_table,
                'name' => 'banner_layout1',
                'label' => 'Layer ',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            ),


     'banner_layout2' => array(
                'table' => $this->_table,
                'name' => 'banner_layout2',
                'label' => 'Layer 2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities|required'
            ),

        

             'banner_layout3' => array(
                'table' => $this->_table,
                'name' => 'banner_layout3',
                'label' => 'Layer 3',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

          

            'banner_image' => array(
                'table' => $this->_table,
                'name' => 'banner_image',
                'label' => 'Image',
                'name_path' => 'banner_image_path',
                'upload_config' => 'site_upload_banner',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'image_size_recommended'=>'1349px × 745px ',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),


            
            'banner_status' => array(
                'table' => $this->_table,
                'name' => 'banner_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),

        );

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;

    }

}

?>