<?
class Model_shop_order extends MY_Model {
    /**
     * TKD shop_order MODEL
     *
     * @package     shop_order Model
     * @author      Dalton Lambert (dalton.developer@gmail.com)
     * @version     2.0
     * @since       2018 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'shop_order';
    protected $_field_prefix    = 'order_';
    protected $_pk    = 'order_id';
    protected $_status_field    = 'order_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        //$this->pagination_params['fields'] = "id,shipping_name,SUM(product_price) as product_price,status";
        $this->pagination_params['fields'] = 'order_id,order_user_id,
        order_billing_fname,order_billing_lname,order_billing_email,order_status';
// order_payment_status
        $this->pagination_params['joins'][] = array(
                'table'=>'shop_item',
                'joint'=>'shop_order.order_id = shop_item.item_order_id');

        $this->pagination_params['group'] = 'order_id';

        $type = isset($_GET['order-type']) ? $_GET['order-type'] : 0 ;
         if ($type == 'abondon') {  
            $this->pagination_params['where_string'] = 'order_status = 9'; //books
         }elseif ($type != 'abondon') {
            $this->pagination_params['where_string'] = 'order_status < 9 ';  //blog
         }else{}


        if(!PAYMENT_MODE_IS_TEST)
            $this->pagination_params['where']["order_is_sandbox"] = 0;

        /*
        $this->pagination_params['fields'] = "{pre}shop_order.order_id, 
                                                UCASE({pre}shop_order.order_billing_fname) ,
                                                UCASE({pre}shop_order.order_billing_lname) ,
                                                CONCAT('$ ', ROUND(SUM({pre}shop_item.item_price)+{pre}shop_order.order_shipping_amount-{pre}shop_order.order_discount_amount+{pre}shop_order.order_tax_amount , 2)) as invoice_price , 
                                                {pre}shop_order.order_payment_type , {pre}shop_order.order_payment_status , {pre}shop_order.order_delivery_status";

        $this->pagination_params['joins'][] = array(
                                                'table'=>'shop_item',
                                                'joint'=>'shop_order.order_id = shop_item.item_order_id');

        if(ENVIRONMENT != 'development')
            $this->pagination_params['where_string'] = 'order_payment_status > 0';
        
        $this->pagination_params['group'] = 'shop_order.order_id';
        */

        parent::__construct();
    }

    public function order_amount_breakup($amount="",$downpayment=0.2)
    {
          $down_payement = $amount * $downpayment;
          $remaining = $amount - $down_payement;

          $result[0] = $down_payement;
          $result[1] = $remaining;
          return $result;
    }


 public function pdf_convert($id='',$view){


    if (intval($id) && intval($id) > 0) {
      
      $this->layout_data['template_config']['show_toolbar'] = false ;
    // $result = $this->get_view($id);
      
    $logodata = $this->model_logo->find_by_pk(1);
    $logo = Links::img($logodata['logo_image_path'],$logodata['logo_image']);


    $vars['where']['order_id'] = $id;
    $d = $this->model_shop_order->get_data($vars);
    $vars = array();
    
    // debug($d);

    // $vars['fields'] = 'item_id as id , course.course_id as course_id , course.course_name as course_name,
    // item_qty as course_qty , item_rate as course_rate , item_price as course_price,item_serialize as item_serialize';
    $vars['where']['item_order_id'] = $id;
    $data['items'] = $this->model_shop_item->get_data($vars);
    
    // debug($data['items']);

    $total_amount = 0;
    if(isset($data['items']) && array_filled($data['items']))
    {
      foreach($data['items'] as $item) {
        $total_amount += $item['item_price'];
      }
    }

    $data['billing_amount'] = $total_amount;

    /** Additional charges or discount etc*/
    $total_amount += $d[0]['order_shipping_amount'];
    $total_amount += $d[0]['order_tax_amount'];
    $total_amount -= $d[0]['order_discount_amount'];

    $data['total_invoice_amount'] = $total_amount;


  $payements = $this->model_shop_order->order_amount_breakup($total_amount);
    

    // LOVECUSTOMART
      $data['payement1'] = ($d[0]['order_downpayment'] > 0) ? price($d[0]['order_downpayment']) : price($payements[0]);
      $data['payement_date1'] = !empty($d[0]['order_downpayment_date']) ? csl_date($d[0]['order_downpayment_date'],'d-m-Y') : '';  //if filled then paid

      $data['payement_2'] = ($d[0]['order_remaining_payment'] > 0) ? price($d[0]['order_remaining_payment']) : price($payements[1]);
      $data['payement_date2'] = !empty($d[0]['order_partialpayment_date']) ? csl_date($d[0]['order_partialpayment_date'],'d-m-Y') : '';//if filled then paid
    // LOVECUSTOMART
    // $data['data'] = $d[0];

    // $data[ 'id' ] = $id; 
  //    debug($id,1);

   
   // debug($result['tp_type']);exit;
        // $content_data = $this->model_cms_page->find_by_pk($cms_content_id);
        // $ff = array("“","”");
        // $rr = array("\"","\"");
        // $content = short_text($content_data['cms_page_content'],10000);
        
        // $content = $content_data['cms_page_content'];
        // $content = str_replace($ff, $rr, $content);
        // debug($content,1);

        // $result['record']['Agreement'] = $content;

  // debug($result);
  //  exit;
  $data['logo'] = g('dirname').$logodata['logo_image_path'].$logodata['logo_image'];
  // debug(g('dirname'));
  // debug($data['logo'],1);
  // debug($data);
  // exit;

  $data['result'] = $d[0];
  $payment_status =  $this->model_shop_order->get_payment_status($d[0]['order_payment_status']);
  $data['result']['order_payment_status'] = $payment_status;
  // debug($data['result'],1);

  // $data['content'] = html_entity_decode($content_data['cms_page_content']);
  // $data['content'] = $content;

  $this->load->view("widgets/pdf_html.php",$data);

      // // Get output html
   $html = $this->output->get_output();
    // debug($html , 1);

    // Load library
    $this->load->library('dompdf_gen');
    

    // $dompdf = new Dompdf();
    //     $options = $dompdf->getOptions();
    //     $options->set(array('isRemoteEnabled' => true));
    //     $dompdf->setOptions($options);
    //     $dompdf->loadHtml($html);
        
    // Convert to PDF
    $this->dompdf->load_html($html);
    $paper_size = array(0,0,1050.72,800);
    // $paper_size = array(0,0,1050.72,841.42);
    $this->dompdf->set_paper($paper_size);
    $this->dompdf->render();

    // if(isset($_GET['view']) AND ($_GET['view'] == 1)) { // just view certificates
    if(isset($view) AND ($view == 1)) { // just view certificates
      $this->dompdf->stream("{$filename}.pdf", array("Attachment" => false));
      exit(0);
    }
    else{ // download certificates
      $this->dompdf->stream("{$filename}.pdf");
    }

    }else{
      redirect('404_override');
    } 

    }

    public function find_invoice_amount_by_order_id($order_id)
    {
        $total = 0;

        // Item Total
        $items_total = $this->model_shop_item->find_total_item_amount_by_order_id($order_id);
        if(isset($items_total))
            $total += $items_total;

        $order = $this->find_by_pk($order_id);
        // Included Amount
        if(isset($order) AND array_filled($order))
        {
            $total += $order['order_shipping_amount'];
            $total += $order['order_tax_amount'];
            $total -= $order['order_discount_amount'];
        }

        return $total;
    }



    public function find_invoice_amount_by_order_id2($order_id)
    {
        $total = 0;

        // Item Total
        $items_total = $this->model_shop_item->find_total_item_amount_by_order_id($order_id);
        if(isset($items_total))
            $total += $items_total;

        $order = $this->find_by_pk($order_id);
        // Included Amount
        if(isset($order) AND array_filled($order))
        {
            $total -= $order['order_discount_amount'];

            $var['subtotal'] = $total;
            $var['shipping'] = $order['order_shipping_amount'];
            $var['tax'] = $order['order_tax_amount'];

        }

        return $var;
    }


    public function get_data($vars)
    {
        return $this->model_shop_order->find_all($vars);
    }

    // Save Order Data
    public function save_order_status($data)
    {
        if(isset($data['order_id']))
        {
            $this->db->where('order_id',$data['order_id']);
            $this->db->update('shop_order',$data);
            return  true;
        }
        else
        {
            unset($data['order_id']);
            $this->db->insert('shop_order',$data);
            return $this->db->insert_id();
        }
    }



    //public function get_order($user_id)
    public function get_order_by_user_id($user_id)
    {
        $param['fields'] = 'order_id ,order_payment_type, order_ondate as order_date ,SUM(item_price) as price , order_payment_status , order_status,order_user_id,
                    order_shipping_amount , order_tax_amount , order_discount_amount , order_delivery_status,order_paypal_ipn_track_id,order_downpayment,order_downpayment_date,order_remaining_payment,order_partialpayment_date,order_discount_content,order_is_tc';

        $param['joins'][] = array(
                'table'=>'shop_item',
                'joint'=>'shop_order.order_id = shop_item.item_order_id');

        $param['where']["order_user_id"] = $user_id;
        $param['group'] = 'order_id';

        if(!PAYMENT_MODE_IS_TEST)
            $param['where']["order_is_sandbox"] = 0;

        $data = $this->find_all($param);
        // $data = $this->find_all_active($param);

        if(isset($data) AND array_filled($data)) {
            foreach($data as $key=>$value) {
                $data[$key]['items'] = $this->model_shop_item->find_all(
                    array(
                        'where'=>array('item_order_id'=>$value['order_id'])
                    ));
            }
        }

        return $data;
    }


    //public function get_order($user_id)
    public function get_order_by_pk($order_id,$params=array())
    {
        $param['fields'] = 'order_id , order_ondate as order_date ,SUM(item_price) as price , order_payment_status , order_status,
                    order_shipping_amount , order_tax_amount , order_discount_amount , order_delivery_status';

            if (isset($params['fields'])) {
                $param['fields'] = $params['fields'];
              }

        $param['joins'][] = array(
                'table'=>'shop_item',
                'joint'=>'shop_order.order_id = shop_item.item_order_id');

    
        if(!PAYMENT_MODE_IS_TEST)
            $param['where']["order_is_sandbox"] = 0;
        
        $data = $this->find_by_pk($order_id,false,$param);

        if(isset($data) AND array_filled($data)) {
            $data['items'] = $this->model_shop_item->find_all(
                array(
                    'where'=>array('item_order_id'=>$data['order_id'])
                ));
        }

        return $data;
    }



    public function get_payment_status($status)
    {
        switch ($status) {
            case 0:
                $message = 'Not Attempt';
                break;
            case 1:
                $message = 'Payment Accepted';
                break;
            case 2:
                $message = 'Payment Declined';
                break;
            case 3:
                $message = 'Transaction Failed';
                break;  
            case 4:
                $message = 'Held for Review';
                break; 

            case 5:
                $message = 'Fruad Cause';
                break; 
            default:
                $message = 'Order Placed Only';
                break;
        }
        return $message;
    }

    public function painting_status($status)
    {
        switch ($status) {
            case 0:
                $message = 'New Order';
                break;
            case 3:
                $message = 'New Order(without payment)';
                break;
            case 4:
                $message = 'Photo edit - Waiting Approval';
                break;
            case 5:
                $message = 'Painting - Waiting Approval';
                break;  
            case 6:
                $message = 'Being Painted';
                break; 

            case 7:
                $message = 'Painting Confirmed';
                break; 
            case 1:
                $message = 'Shipped';
                break; 
            default:
                $message = '';
                break;
        }
        return $message;
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

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {
        $fields = array(
        
              'order_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_id',
                     'label'   => 'id #',
                     'type'   => 'text',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'order_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_user_id',
                     'label'   => 'User ID',
                     'type'   => 'dropdown',
                     'type_dt'   => 'text',
                     'attributes'   => array('additional'=>'disabled="disabled"'),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'order_payment_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_payment_type',
                     'label'   => 'Payment Type',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


               // 'order_is_sandbox' => array(
               //       'table'   => $this->_table,
               //       'name'   => 'order_is_sandbox',
               //       'label'   => 'Status?',
               //       'type'   => 'hidden',
               //       'type_dt'   => 'dropdown',
               //       'type_filter_dt' => 'dropdown',
               //       'list_data_key' => "order_is_sandbox" ,
               //       'list_data' => array(),
               //       'default'   => '1',
               //       'attributes'   => array(),
               //       'dt_attributes'   => array("width"=>"7%"),
               //       'rules'   => 'trim'
               //    ),
 
             
              // 'order_agreed_terms_status' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'order_agreed_terms_status',
              //        'label'   => 'Agreed terms status?',
              //        'type'   => 'switch',
              //        'type_dt'   => 'dropdown',
              //        'type_filter_dt' => 'dropdown',
              //        'list_data_key' => "order_agreed_terms_status" ,
              //        'list_data' => array(),
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"7%"),
              //        'rules'   => 'trim'
              //     ),

              'order_payment_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_payment_status',
                     'label'   => 'Payment Status',
                     'type'   => 'dropdown',
                     'list_data'    => array(
                                        0 => "<span class=\"label label-danger\">Not Attempt</span>" ,  
                                        1 => "<span class=\"label label-success\">Payment approved</span>"  ,
                                        2 => "<span class=\"label label-danger\">Declined</span>"  ,
                                        3 => "<span class=\"label label-danger\">Error</span>"  ,
                                        4 => "<span class=\"label label-danger\">Held for Review</span>" ,
                                        11=> "<span class=\"label label-danger\">Fruad Cause</span>",
                                        ) ,
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     // 'rules'   => 'required',
                  ),

                // 'order_delivery_status' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'order_delivery_status',
                //      'label'   => 'Delivery Status',
                //      'type'   => 'hidden',
                //      'list_data'    => array(
                //                         0 =>  "<span class=\"label label-primary\">In Process</span>"  ,
                //                         1 =>  "<span class=\"label label-success\">New order</span>"  ,
                //                         2 =>  "<span class=\"label label-info\">Shipped</span>"  ,
                //                         3 =>  "<span class=\"label label-warning\">On Hold</span>"  ,
                //                         4 =>  "<span class=\"label label-danger\">Denied</span>" ,
                //                         5 =>  "<span class=\"label label-danger\">Reject</span>" ,
                //                         ) ,
                //      'attributes'   => array(),
                //      'js_rules'   => '',
                //      'rules'   => 'trim'
                //   ),


       'order_shipping_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_type',
                     'label'   => 'Shipping type',
                     'type'   => 'dropdown',
                    'list_data' => array(),
                    //  'list_data'    => array(
                    //                     0 =>  "<span class=\"label label-success\">Standard Shipping </span>"  ,
                    //                     1 =>  "<span class=\"label label-success\">Express Shipping</span>"
                    //                     ) ,
                     'attributes'   => array(),
                     'type_filter_dt'   => 'dropdown',
                     'js_rules'   => '',
                     'rules'   => 'trim'
                  ),

        'order_shipping_content' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_content',
                     'label'   => 'Shipping Content',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

                // 'order_shipping_type' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'order_shipping_type',
                //      'label'   => 'Shipping type',
                //      'type'   => 'hidden',
                //      'list_data'    => array(
                //                         0 =>  "<span class=\"label label-success\">No Shipping Charges</span>"  ,
                //                         1 =>  "<span class=\"label label-success\">Free</span>"  ,
                //                         2 =>  "<span class=\"label label-success\">Pick in store</span>"  ,
                //                         3 =>  "<span class=\"label label-success\">Cash on Delivery</span>"  ,
                //                         4 =>  "<span class=\"label label-success\">DHL charges</span>"  ,
                //                         ) ,
                //      'attributes'   => array(),
                //      'js_rules'   => '',
                //      'rules'   => 'trim'
                //   ),

                // 'order_promotion_email' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'order_promotion_email',
                //      'label'   => 'Promotion Email',
                //      'type'   => 'hidden',
                //      'list_data'    => array(
                //                         0 =>  "<span class=\"label label-success\">No</span>"  ,
                //                         1 =>  "<span class=\"label label-success\">Yes</span>"  ,
                //                         ) ,
                //      'attributes'   => array(),
                //      'js_rules'   => '',
                //      'rules'   => 'trim'
                //   ),

                'order_promotion_newsletter' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_promotion_newsletter',
                     'label'   => 'Monthly Newsletter',
                     'type'   => 'hidden',
                     'list_data'    => array(
                                        0 =>  "<span class=\"label label-success\">No</span>"  ,
                                        1 =>  "<span class=\"label label-success\">Yes</span>"  ,
                                        ) ,
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                  ),

                // 'order_is_tc' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'order_is_tc',
                //      'label'   => 'Accept Terms of Service and Privacy Policy',
                //      'type'   => 'dropdown',
                //      'list_data'    => array(
                //                         0 =>  "<span class=\"label label-success\">No</span>"  ,
                //                         1 =>  "<span class=\"label label-success\">Yes</span>"  ,
                //                         ) ,
                //      'attributes'   => array(),
                //      'js_rules'   => 'required',
                //      'rules'   => 'required',
                //   ),

                 'order_is_tc' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_is_tc',
                     'label'   => 'Payment Link Generated',
                     'type'   => 'dropdown',
                     // 'list_data'    => array(
                     //                    0 =>  "<span class=\"label label-success\">No</span>"  ,
                     //                    1 =>  "<span class=\"label label-success\">Yes</span>"  ,
                     //                    ) ,
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     // 'rules'   => 'required',
                  ),

                'order_shipping_amount' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_amount',
                     'label'   => 'Shipping charges',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_discount_amount' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_discount_amount',
                     'label'   => 'Discount Amount',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_discount_content' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_discount_content',
                     'label'   => 'Discount Content',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'product_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_price',
                     'label'   => 'Product Price',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'invoice_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'invoice_price',
                     'label'   => 'Invoice Amount',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_billing_fname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_fname',
                     'label'   => 'First Name', //'Billing<br />First Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_billing_lname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_lname',
                     'label'   => 'Last Name',//'Billing<br />Last Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_billing_phone' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_phone',
                     'label'   => ' Billing Phone Number', //'Billing<br />Phone',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_billing_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_email',
                     'label'   => 'Email',//'Billing<br />Email',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|valid_email|strtolower|trim|htmlentities'
                  ),

                'order_billing_address' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_address',
                     'label'   => 'Billing Address # 1',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_billing_address2' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_address2',
                     'label'   => 'Billing Address # 2',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_billing_city' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_city',
                     'label'   => 'Billing city',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_billing_state' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_state',
                     'label'   => 'Billing State',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_billing_country' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_country',
                     'label'   => 'Billing Country',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_billing_zip_code' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_billing_zip_code',
                     'label'   => 'Billing postal/zip code',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_shipping_fname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_fname',
                     'label'   => 'Shipping Frist Name',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_lname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_lname',
                     'label'   => 'Shipping Last Name',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_phone' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_phone',
                     'label'   => 'Shipping Phone',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_email',
                     'label'   => 'Shipping Email',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'valid_email|strtolower|trim|htmlentities'
                  ),

                'order_shipping_address' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_address',
                     'label'   => 'Shipping Address # 1',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_address2' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_address2',
                     'label'   => 'Shipping Address # 2',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_city' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_city',
                     'label'   => 'Shipping city',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_state' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_state',
                     'label'   => 'Shipping State',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_country' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_country',
                     'label'   => 'Shipping Country',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_zip_code' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_zip_code',
                     'label'   => 'Shipping postal/zip code',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_shipping_order_description' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_shipping_order_description',
                     'label'   => 'order Note',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


              'order_paypal_mc_gross' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_mc_gross',
                     'label'   => 'Paypal gross',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_paypal_date' => array(  //payment
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_date',
                     'label'   => 'Payment Date',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_paypal_payment_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_payment_status',
                     'label'   => 'Paypal Status',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_paypal_pending_reason' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_pending_reason',
                     'label'   => 'Paypal Pending reason',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_paypal_ReasonCode' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_ReasonCode',
                     'label'   => 'Paypal reason code',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_paypal_verify_sign' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_verify_sign',
                     'label'   => 'Paypal verify sign',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_payment_txn_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_payment_txn_id',
                     'label'   => 'Paypal txn id',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'order_transaction_message' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_transaction_message',
                     'label'   => 'Paypal txn id',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


              'order_paypal_payer_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_payer_email',
                     'label'   => 'Paypal Payer email id',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_paypal_ipn_track_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_paypal_ipn_track_id',
                     'label'   => 'Paypal <br/>Invoice ID',//'Paypal Payer IPN id',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'order_payment_post' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_payment_post',
                     'label'   => 'Paypal payment post',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),





              'order_accesstoken' => array(  //For amazon
                     'table'   => $this->_table,
                     'name'   => 'order_accesstoken',
                     'label'   => 'Access token',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
              // order amount breakup

              'order_downpayment' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_downpayment',
                     'label'   => 'Payment 1',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


          'order_downpayment_date' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_downpayment_date',
                     'label'   => 'Downpayment Payment ',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

           'order_remaining_payment' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_remaining_payment',
                     'label'   => 'Payment 2',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
             'order_partialpayment_date' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_partialpayment_date',
                     'label'   => 'Partial Payment Date ',
                     'type'   => 'none',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


              // 'order_status' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'order_status',
              //        'label'   => 'Order status?',
              //        'type'   => 'switch',
              //        'type_dt'   => 'dropdown',
              //        'type_filter_dt' => 'dropdown',
              //        'list_data_key' => "order_status" ,
              //        'list_data' => array(),
              //        'default'   => '1',
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"7%"),
              //        'rules'   => 'trim'
              //     ),


   'order_admin_note' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_admin_note',
                     'label'   => 'Admin Note',
                     'type'   => 'text',
                     // 'type_dt'   => 'dropdown',
                     // 'type_filter_dt' => 'dropdown',
                     // 'list_data_key' => "order_status" ,
                     // 'list_data' => array(),
                     // 'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),



   'order_identity' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_identity',
                     'label'   => 'Order Identity',
                     'type'   => 'text',
                     // 'type_dt'   => 'dropdown',
                     // 'type_filter_dt' => 'dropdown',
                     // 'list_data_key' => "order_status" ,
                     // 'list_data' => array(),
                     // 'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),

              'order_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_status',
                     'label'   => 'Order Activity',
                     'type'   => 'dropdown',
                     'list_data'    => array(
                                        0 => "New Order",
                                        3 => "New Order(without payment)",
                                        1 => "Shipped",
                                        ) ,
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     // 'rules'   => 'required',
                  ),

              
            );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>