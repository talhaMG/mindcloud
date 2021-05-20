<?
class Model_faq extends MY_Model {
  
    /**
     * model_faq
     *
     * @package     model_faq Model
     * 
     * @version     1.0
     * @since       2017 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'faq';
    protected $_field_prefix    = 'faq_';
    protected $_pk    = 'faq_id';
    protected $_status_field    = 'faq_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "faq_id,faq_question,faq_answer,faq_status";
        
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

        // Use when add new image
        // $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(
        
              'faq_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

                'faq_category' => array( 
                    'table'   => $this->_table,
                    'name'   => 'faq_category',
                    'label'   => 'Category',
                    'type'   => 'dropdown',
                    'type_dt'   => 'dropdown',
                    'type_filter_dt' => 'dropdown',
                    'list_data_key' => "faq_category" ,
                    'list_data' => array(
                        1 => "Expert Tutorial",
                        2 => "Learning Journey"
                        ),
                    // 'default'   => '0',
                    'attributes'   => array(),
                    'dt_attributes'   => array("width"=>"7%"),
                    'rules'   => 'required|trim'
                 ),
 

              'faq_question' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_question',
                     'label'   => 'Question',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'default'   => '',
                     'rules'   => 'trim|htmlentities|required',
                     'js_rules'   => 'required'
                  ),


              'faq_answer' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_answer',
                     'label'   => 'Answer',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'default'   => '',
                     'rules'   => 'trim|htmlentities|required',
                     'js_rules'   => 'required'
                  ),
           

              'faq_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
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