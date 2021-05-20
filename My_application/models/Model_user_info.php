<?
class Model_user_info extends MY_Model {
    /**
     * Model_user_info MODEL
     *
     * @package     Model_user_info Model
     * @author      
     * @version     2.0
     * @since       2017 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'user_info';
    protected $_field_prefix    = 'ui_';
    protected $_pk    = 'ui_id';
    protected $_status_field    = '';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "";

        parent::__construct();
    }

    public function get_by_user_id($param = array(),$user_id,$is_active = true)
    {
      $param['where']['ui_user_id'] = $user_id;
      if($is_active)
        return $this->find_one_active($param);
      else
        return $this->find_one($param);
    }

    public function update_by_user_id($user_id,$data= array())
    {
      $where_param = array();
      $where_param['where']['ui_user_id'] = $user_id;
      return $this->update_model($where_param,$data);
    }

    // public function update_package_event($user_id)
    // {
    //   $param = array();
    //   $param['fields'] = 'ui_total_monthly_event,ui_consume_monthly_event,ui_balance_monthly_event';
    //   $data = $this->get_by_user_id($param,$user_id);
      
    //   if(isset($data) AND array_filled($data)){
    //     $ui_total_monthly_event = $data['ui_total_monthly_event'];
    //     $ui_consume_monthly_event = $data['ui_consume_monthly_event'];
    //     $ui_balance_monthly_event = $data['ui_balance_monthly_event'];

    //     $update_param = array();
    //     $update_param['ui_total_monthly_event'] = $ui_total_monthly_event;
    //     $update_param['ui_consume_monthly_event'] = $ui_consume_monthly_event+1;
    //     $update_param['ui_balance_monthly_event'] = $update_param['ui_total_monthly_event']-$update_param['ui_consume_monthly_event'];

    //     $this->update_by_user_id($user_id, $update_param);
    //   }
      
    //   return true;
    // }

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
        
              'ui_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'ui_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'ui_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'ui_user_id',
                     'label'   => 'User ID',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),

               'ui_industry_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'ui_industry_id',
                     'label'   => 'Industry ID',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


               'ui_profile_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'ui_profile_image',
                     'label'   => 'Profile Picture',
                     'name_path'   => 'ui_profile_image_path',
                     'upload_config'   => 'site_upload_user_photo',
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                      'attributes'   => array('image_size'=>''),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),

              'ui_phone'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_phone',
                  'label'   => 'Phone',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),

              'ui_mobile'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_mobile',
                  'label'   => 'Mobile',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim'
              ),

              'ui_website'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_website',
                  'label'   => 'Website',
                  'type'   => 'hidden',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim'
              ),

         

              'ui_address_primary'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_address_primary',
                  'label'   => 'Primary Address',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),

              'ui_address_secondary'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_address_secondary',
                  'label'   => 'Secondary Address',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim'
              ),



     'ui_country_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'ui_country_id',
                     'label'   => 'Country',
                     'type'   => 'dropdown',
                     'type_dt'   => 'text',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),
              //  'ui_country_id'  => array(
              //     'table'   => $this->_table,
              //     'name'   => 'ui_country_id',
              //     'label'   => 'Country ID',
              //     'type'   => 'text',
              //     'default'   => '',
              //     'attributes'   => array(),
              //     'rules'   => 'trim|required|htmlentities'
              // ),


              'ui_state'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_state',
                  'label'   => 'State',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),

              'ui_city'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_city',
                  'label'   => 'City',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),

              'ui_town'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_town',
                  'label'   => 'Town',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim'
              ),


              'ui_zip'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_zip',
                  'label'   => 'ZIP',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),

            
             
              'ui_dob'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_dob',
                  'label'   => 'DOB',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),


              'ui_gender'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_gender',
                  'label'   => 'Gender',
                  'type'   => 'dropdown',
                  'list_data_key' => "ui_gender" ,
                 'list_data' => array(
                    "Male" => "Male",
                    "Female" => "Female"
                        ),
                   'type_dt'   => 'text',
                   'type_filter_dt'   => 'dropdown',
                  // 'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),

            'ui_social_twitter'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_social_twitter',
                  'label'   => 'Twitter',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|htmlentities'
              ),

            'ui_social_facebook'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_social_facebook',
                  'label'   => 'Facebook',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|htmlentities'
              ),


        'ui_social_linkedin'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_social_linkedin',
                  'label'   => 'Linkedin',
                  'type'   => 'text',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|htmlentities'
              ),

        
        'ui_description'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_description',
                  'label'   => 'About Me',
                  'type'   => 'textarea',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|htmlentities|required'
              ),

     'ui_keywords'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_keywords',
                  'label'   => 'Keywords <br/> <span style="font-size:10px;color : red">Enter comma separated values</span>',
                  'type'   => 'textarea',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required|htmlentities'
              ),



     'ui_profile_image2' => array(
                     'table'   => $this->_table,
                     'name'   => 'ui_profile_image2',
                     'label'   => 'Upload Resume',
                     'name_path'   => 'ui_profile_image_path',
                     'upload_config'   => 'site_upload_user_photo',
                     'type'   => 'customfileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                      'attributes'   => array(
                        '<br/><br/>image_size'=>' Max: 15Mb',
                        // 'allow_ext'=>'doc|docx|pdf|',
                        'allow_ext'=>'pdf|jpg|doc|docx|psd|ai|gif|jpeg|png|ppt|pptx|trf|rtf|txt',
                        ),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),


              'ui_profession'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_profession',
                  'label'   => 'Profession',
                  'type'   => 'dropdown',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required'
              ),

              'ui_profession_license'  => array(
                  'table'   => $this->_table,
                  'name'   => 'ui_profession_license',
                  'label'   => 'Liscence',
                  'type'   => 'dropdown',
                  'default'   => '',
                  'attributes'   => array(),
                  'rules'   => 'trim|required'
              ),


           
            );

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;

    }

}
?>