<?
class Model_inquiry extends MY_Model {
  
    /**
     * TKD inquiry MODEL
     *
     * @package     inquiry Model
     * @author      Muhammad devemail0909@gmail.com Khan (Muhammad.devemail0909@gmail.com@tradekey.com)
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'inquiry';
    protected $_field_prefix    = 'inquiry_';
    protected $_pk    = 'inquiry_id';
    protected $_status_field    = 'inquiry_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "inquiry_id,inquiry_name,inquiry_email,inquiry_status";
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

        $fields = array(
        
              'inquiry_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              // 'inquiry_type' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'inquiry_type',
              //        'label'   => 'Type',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),

              // 'inquiry_heading' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'inquiry_heading',
              //        'label'   => 'Type',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),

        'inquiry_name' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_name',
                 'label'   => 'First Name',
                 'type'   => 'text',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => 'required|strtolower|trim|htmlentities|min_length[2]|max_length[50]'
              ),  


              'inquiry_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_email',
                     'label'   => 'Email',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|valid_email|strtolower|trim|htmlentities'
                  ),


   'inquiry_subject' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_subject',
                 'label'   => 'Subject',
                 'type'   => 'text',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => 'strtolower|trim|htmlentities'
              ), 

              'inquiry_message' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_message',
                     'label'   => 'Message',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities|min_length[5]|max_length[512]'
                  ),

              // 'inquiry_business_name' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'inquiry_business_name',
              //        'label'   => 'Business name',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'required|trim|htmlentities'
              //     ),
                  
      


              // 'inquiry_lastname' => array(
              //    'table'   => $this->_table,
              //    'name'   => 'inquiry_lastname',
              //    'label'   => 'Last Name',
              //    'type'   => 'text',
              //    'attributes'   => array(),
              //    'js_rules'   => '',
              //    'rules'   => 'required|strtolower|trim|htmlentities|min_length[2]|max_length[50]'
              // ),  

              // 'inquiry_phone' => array(
              //    'table'   => $this->_table,
              //    'name'   => 'inquiry_phone',
              //    'label'   => 'Phone',
              //    'type'   => 'text',
              //    'attributes'   => array(),
              //    'js_rules'   => 'required',
              //    'rules'=>'required|trim|htmlentities|min_length[5]|regex_match[/^[\d\(\)\-+ ]+$/]'
              // ), 


              // 'inquiry_address' => array(
              //    'table'   => $this->_table,
              //    'name'   => 'inquiry_address',
              //    'label'   => 'Address',
              //    'type'   => 'text',
              //    'attributes'   => array(),
              //    'js_rules'   => '',
              //    'rules'   => 'trim'
              // ), 


              // 'inquiry_country' => array(
              //    'table'   => $this->_table,
              //    'name'   => 'inquiry_country',
              //    'label'   => 'Country',
              //    'type'   => 'text',
              //    'attributes'   => array(),
              //    'js_rules'   => '',
              //    'rules'   => ''
              // ), 

               // 'inquiry_image' => array(
               //                'table' => $this->_table,
               //                'name' => 'inquiry_image',
               //                'label' => 'Image',
               //                'name_path' => 'inquiry_image_path',
               //                'upload_config' => 'site_upload_inquiry',
               //                'type' => 'fileupload',
               //                'type_dt' => 'image',
               //                'randomize' => true,
               //                'preview' => 'true',
               //                'attributes'   => array(
               //                    // 'image_size_recommended'=>'1349px × 745px ',
               //                    'allow_ext'=>'png|jpeg|jpg',
               //                ),
               //                'dt_attributes' => array("width" => "10%"),
               //                'rules' => 'trim|htmlentities',
               //                'js_rules'=>$is_required_image
               //            ),



              'inquiry_createdon' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_createdon',
                 'label'   => 'Sent On',
                 'type'   => 'readonly',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => ''
              ), 

              'inquiry_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( 
                                        0 => "<span class=\"label label-default\">Read</span>" ,  
                                        1 =>  "<span class=\"label label-primary\">Unread</span>"  
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