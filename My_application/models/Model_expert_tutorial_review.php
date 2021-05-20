<?
class Model_expert_tutorial_review extends MY_Model {
    /**
     *
     * @package     learning_journey_category Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'expert_tutorial_review';
    protected $_field_prefix    = 'expert_tutorial_review_';
    protected $_pk    = 'tutorial_review_id';
    protected $_status_field    = 'tutorial_review_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "tutorial_review_id,tutorial_review_tutorial_id,tutorial_review_desc,tutorial_review_stars,tutorial_review_status";
        // $this->pagination_params['joins'][] = array(
        //   "table"=>"tutorial", 
        //   "joint"=>"tutorial.tutorial_id = expert_tutorial_review.tutorial_review_id"
        //   );
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
        
            'tutorial_review_id' => array(
                    'table'   => $this->_table,
                    'name'   => 'tutorial_review_id',
                    'label'   => 'id #',
                    'type'   => 'hidden',
                    'type_dt'   => 'text',
                    'attributes'   => array(),
                    'dt_attributes'   => array("width"=>"5%"),
                    'js_rules'   => '',
                    'rules'   => 'trim'
              ),
              'tutorial_review_user_id' => array(
                'table'   => $this->_table,
                'name'   => 'user id',
                'label'   => 'user id #',
                'type'   => 'hidden',
                'type_dt'   => 'text',
                'attributes'   => array(),
                'dt_attributes'   => array("width"=>"5%"),
                'js_rules'   => '',
                'rules'   => 'trim'
          ),



                  //   'learning_journey_course_review_course_id' => array(
                  //     'table'   => $this->_table,
                  //     'name'   => 'learning_journey_course_review_course_id',
                  //     'label'   => 'Content Name',
                  //     // 'type'   => 'text',
                  //     'type'   => 'readonly',
                  //     'list_data'    => array() ,
                  //     'attributes'   => array(),
                  //     'js_rules'   => '',
                  //     'rules'   => 'trim',
                  // ),
                  'tutorial_review_course_id' => array(
                    'table'   => $this->_table,
                    'name'   => 'review course id',
                    'label'   => 'review course id',
                    'type'   => 'text',
                    'attributes'   => array(),
                    'js_rules'   => 'required',
                    'rules'   => 'required|trim|htmlentities|numeric'
                 ),
                 'tutorial_review_tutorial_id' => array(
                  'table'   => $this->_table,
                  'name'   => 'tutorial_review_tutorial_id',
                  'label'   => 'tutorial id',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => 'required',
                  'rules'   => 'required|trim|htmlentities|numeric'
               ),






                  'tutorial_review_desc' => array(
                    'table'   => $this->_table,
                    'name'   => 'tutorial_review_desc',
                    'label'   => 'Description',
                    'type'   => 'textarea',
                   // 'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'attributes'   => array(),
                    'js_rules'   => 'required',
                    'rules'   => 'required|trim|htmlentities'
                 ),

                 'tutorial_review_stars' => array( 
                         'table'   => $this->_table,
                         'name'   => 'tutorial_review_stars',
                         'label'   => 'Rating',
                         'type'   => 'dropdown',
                         'type_dt'   => 'dropdown',
                         'type_filter_dt' => 'dropdown',
                         'list_data_key' => "tutorial_review_stars" ,
                         'list_data' => array(
                            1 => "1",
                            2 => "2",
                            3 => "3",
                            4 => "4",
                            5 => "5"
                            ),
                         // 'default'   => '0',
                         'attributes'   => array(),
                         'dt_attributes'   => array("width"=>"7%"),
                         'rules'   => 'required|trim'
                      ), 
                      'tutorial_review_status' => array(
                        'table'   => $this->_table,
                        'name'   => 'tutorial_review_status',
                        'label'   => 'Status?',
                        'type'   => 'switch',
                        'type_dt'   => 'dropdown',
                        'type_filter_dt' => 'dropdown',
                        'list_data_key' => "tutorial_review_status" ,
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