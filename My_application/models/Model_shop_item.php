<?
class Model_shop_item extends MY_Model {
    /**
     * TKD shop_order MODEL
     *
     * @package     shop_order Model
     * @author      Muhammad devemail0909@gmail.com Khan (Muhammad.devemail0909@gmail.com@tradekey.com)
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'shop_item';
    protected $_field_prefix    = 'item_';
    protected $_pk    = 'item_id';
    protected $_status_field    = '';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "item_id,item_order_id,item_product_id,item_product_name,item_qty,item_rate,item_type";
        
        // $this->pagination_params['fields'] = "ch_shop_order.id,ch_shop_order.shipping_name,
        //                                         CONCAT('$ ', SUM(ch_shop_item.product_price)+ch_shop_order.shipping_amount-ch_shop_order.discount_amount+ch_shop_order.tax_amount) as product_price , 
        //                                         ch_shop_order.payment_type , ch_shop_order.payment_status";

        // $this->pagination_params['joins'][] = array(
        //                                         'table'=>'shop_item',
        //                                         'joint'=>'ch_shop_order.id = ch_shop_item.order_id');

        // $this->pagination_params['group'] = 'ch_shop_order.id';

        parent::__construct();
    }


    public function get_data($vars)
    {
        return $this->find_all($vars);
    }


    public function find_by_order_id($order_id)
    {
        $param=array();
        $param['where']['item_order_id'] = $order_id;
        return $this->find_all($param);
    }

    public function find_total_item_amount_by_order_id($order_id)
    {
        $data = $this->find_by_order_id($order_id);
        
        $total = 0;
        if(isset($data) AND array_filled($data))
        {
            foreach ($data as $key => $value) {
                $total += $value['item_price'];
            }
        }

        return $total;
    }    

    // public function get_online_quiz_data($user_id)
    // {
    //     $param = array();
    //     $param['where']['item_type'] = 1;
    //     $param['joins'][] = array( 
    //         "table"=>"ss_shop_order" ,
    //         "joint"=>"item_order_id = ss_shop_order.order_id AND " , 
    //         //"joint"=>"item_order_id = ss_shop_order.order_id AND ss_shop_order.order_payment_status = 1" , 
    //     );
    //     return $this->find_all($param);
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
            
                  'item_id' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_id',
                         'label'   => 'id #',
                         'type'   => 'hidden',
                         'type_dt'   => 'text',
                         'attributes'   => array(),
                         'dt_attributes'   => array("width"=>"5%"),
                         'js_rules'   => '',
                         'rules'   => 'trim'
                    ),

                  'item_order_id' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_order_id',
                         'label'   => 'Order ID #',
                         'type'   => 'hidden',
                         'type_dt'   => 'text',
                         'attributes'   => array(),
                         'dt_attributes'   => array("width"=>"5%"),
                         'js_rules'   => '',
                         'rules'   => 'trim'
                    ),

                  'item_product_id' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_product_id',
                         'label'   => 'Product ID #',
                         'type'   => 'dropdown',
                         'type_dt'   => 'dropdown',
                         'attributes'   => array(),
                         'dt_attributes'   => array("width"=>"5%"),
                         'js_rules'   => '',
                         'rules'   => 'trim'
                    ),


                  'item_product_name' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_product_name',
                         'label'   => 'Product Name',
                         'type'   => 'text',
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),

                  'item_product_img' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_product_img',
                         'label'   => 'Product Img',
                         'type'   => 'none',
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),

                  'item_type' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_type',
                         'label'   => 'Type',
                         'type'   => 'dropdown',
                         'list_data'    => array("1"=>"Course","2"=>"Packages") ,
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),


                  'item_qty' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_qty',
                         'label'   => 'Item Qty',
                         'type'   => 'text',
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),

                  'item_rate' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_rate',
                         'label'   => 'Item Rate',
                         'type'   => 'text',
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),

                  'item_price' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_price',
                         'label'   => 'Item Price',
                         'type'   => 'text',
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),

                  'item_serialize' => array(
                         'table'   => $this->_table,
                         'name'   => 'item_serialize',
                         'label'   => 'Serialize',
                         'type'   => 'none',
                         'attributes'   => array(),
                         'js_rules'   => '',
                         'rules'   => 'trim|htmlentities'
                      ),
                );
      
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>