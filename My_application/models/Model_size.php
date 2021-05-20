<?
class Model_size extends MY_Model {
  
    /**
     * OCT size MODEL
     *
     * @package     size Model
     * @author      John Doe
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'size';
    protected $_field_prefix    = 'size_';
    protected $_pk    = 'size_id';
    protected $_status_field    = 'size_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "size_id,size_name,size_status";
        parent::__construct();
    }

    public function get_catalog_size($catalog_list , $params = array())
    {
        if(!array_filled($catalog_list))
            return false;
        
        $params['fields'] = "size.*";
        $params['where_in']['product_catalog_id'] = $catalog_list ;
        $params['joins'] = array(
                        array(
                            "table" => "product_item_set",
                            "joint" => "size_id = pis_size_id",
                        ),
                        array(
                            "table" => "product",
                            "joint" => "product_id = pis_product_id",
                        ),
                );
        $params['group'] = 'size_id';
        $data['list'] = $this->find_all_active($params);
        $data['pk_list'] = $this->extract_pk($data['list']);
        return $data;
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
        
              'size_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'size_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'size_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'size_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
              
              // 'size_price' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'size_price',
              //        'label'   => 'Price',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        // 'js_rules'   => 'required',
              //        // 'rules'   => 'required|trim|htmlentities'
              //     ),
    
              /*
              'size_code' => array(
                     'table'   => $this->_table,
                     'name'   => 'size_code',
                     'label'   => 'size Code',
                     'type'   => 'sizepicker',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                  ),
                
    */
              'size_slug' => array(
                     'table'   => $this->_table,
                     'name'   => 'size_slug',
                     'label'   => 'size Slug',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => array("is_slug" => array() ),
                     'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
                  ),
              'size_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'size_status',
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