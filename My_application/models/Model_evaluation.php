<?
class Model_evaluation extends MY_Model {
  
    /**
     * TKD evaluation MODEL
     *
     * @package     evaluation Model
     * @author      Muhammad devemail0909@gmail.com Khan (Muhammad.devemail0909@gmail.com@tradekey.com)
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'evaluation';
    protected $_field_prefix    = 'evaluation_';
    protected $_pk    = 'evaluation_id';
    protected $_status_field    = 'evaluation_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "evaluation_id,evaluation_name,evaluation_email,evaluation_status";
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
        
              'evaluation_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'evaluation_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

      
                'evaluation_course_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'evaluation_course_id',
                     'label'   => 'Course',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_course_id" ,
                     'list_data' => array(),
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),

              'evaluation_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'evaluation_user_id',
                     'label'   => 'User id',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
              
              'evaluation_quiz_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'evaluation_quiz_id',
                     'label'   => 'Quiz id',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                   'evaluation_objectives' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_objectives',
                     'label'   => 'Objective',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_objectives" ,
                     'list_data' => array(
                        1 => "1",
                        2 => "2",
                        3 => "3",
                        4 => "4",
                        5 => "5",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

                   'evaluation_appropriate' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_appropriate',
                     'label'   => 'Objective',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_appropriate" ,
                     'list_data' => array(
                        1 => "1",
                        2 => "2",
                        3 => "3",
                        4 => "4",
                        5 => "5",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

            'evaluation_consistent' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_consistent',
                     'label'   => 'Objective',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_consistent" ,
                     'list_data' => array(
                        1 => "1",
                        2 => "2",
                        3 => "3",
                        4 => "4",
                        5 => "5",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

              'evaluation_information' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_information',
                     'label'   => 'Objective',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_information" ,
                     'list_data' => array(
                        1 => "1",
                        2 => "2",
                        3 => "3",
                        4 => "4",
                        5 => "5",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

              'evaluation_goals' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_goals',
                     'label'   => 'Information could contribute to achieving personal, professional goals',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_goals" ,
                     'list_data' => array(
                        1 => "1",
                        2 => "2",
                        3 => "3",
                        4 => "4",
                        5 => "5",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

                'evaluation_expertise' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_expertise',
                     'label'   => 'This course enhanced my professional expertise',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_expertise" ,
                     'list_data' => array(
                        "Substantially" => "Substantially",
                        "Somewhat" => "Somewhat",
                        "Not at all" => "Not at all",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

              'evaluation_recommend' => array( 
                     'table'   => $this->_table,
                     'name'   => 'evaluation_recommend',
                     'label'   => 'I would recommend this',
                     'type'   => 'dropdown',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "evaluation_recommend" ,
                     'list_data' => array(
                        "Yes" => "Yes",
                        "No" => "No",
                        "Not Sure course to others" => "Not Sure course to others",
                        ),
                     // 'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'required|trim'
                  ),

              'evaluation_createdon' => array(
                 'table'   => $this->_table,
                 'name'   => 'evaluation_createdon',
                 'label'   => 'Sent On',
                 'type'   => 'readonly',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => ''
              ), 

              'evaluation_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'evaluation_status',
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