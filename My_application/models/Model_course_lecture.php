<?
class Model_course_lecture extends MY_Model {
    /**
     * TKD course_lecture MODEL
     *
     * @package     course_lecture Model
     * 
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'course_lecture';
    protected $_field_prefix    = 'cp_';
    protected $_pk    = 'cp_id';
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "*";
        $this->pagination_params['joins'][] = array(
                                                    "table"=>"lecture" , 
                                                    "joint"=>"lecture_id = cp_lecture_id", 
                                                );
        parent::__construct();

    }

   
   
      // get record by pm_id and qs_id
    // public function added_category($pro_id,$cat_id )
    // {

    //     $param['where']['cp_product_id']= $pro_id;
    //     $param['where']['cp_category_id']= $cat_id;
    //     $data = $this->model_course_lecture->find_one($param);
    //     return $data;
    // }

    // public function added_category($pro_id)
    // {
    //     $data = array();
    //     $param = array();
    //     if ($pro_id > 0) {

    //     $param['fields'] = 'cp_id,category_name,department_name';
    //     $param['where']['cp_product_id']= $pro_id;
    //     $param['joins'][] = array(
    //         "table"=>"category" , 
    //         "joint"=>"category.category_id = course_lecture.cp_category_id",
    //         "type" => "left"
    //         );
    //     // category_depart_id
    //     $param['joins'][] = array(
    //         "table"=>"department" , 
    //         "joint"=>"department.department_id = category.category_depart_id",
    //         "type" => "left"
    //         );
    //     $data = $this->model_course_lecture->find_all($param);
    //     }
    //     return $data;
    // }

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

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
          'cp_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'cp_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'cp_lecture_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'cp_lecture_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
              'cp_course_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'cp_course_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
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