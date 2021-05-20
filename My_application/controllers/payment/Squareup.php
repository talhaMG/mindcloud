<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Squareup extends MY_Controller {

	/**
	 * Default Controller
	 */

	public function __construct()
    {
        // Call the Model constructor latest_product
        parent::__construct();
        $this->view_pre = 'payment/';

    }

     public function chargeSquareUp()
    {

      require APPPATH.'third_party/squareup/autoload.php';
        // $access_token = SQUARE_ACCESS_TOKEN;
        // //$access_token = "sq0atp-2KMNkh5ofMNbct0b_DANxg";

        // $location_api = new \SquareConnect\Api\LocationApi();

        // $location = $location_api->listLocations($access_token);

        // $jsonEncoded = json_decode($location,TRUE); 

        // $location_id = $jsonEncoded['locations'][0]['id'];
        //debug($location_id);exit;

        $nonce = $_POST['nonce'];
        $invoice_no = $_POST['order_id'];
        $amount = $_POST['amount'];
        $type = $_POST['type'];

        # Assume you have assigned values to the following variables:
        #   $nonce
        #   $location_id
        #   $access_token

        // $transaction_api = new \SquareConnect\Api\TransactionApi();

        $request_body = array (

          "card_nonce" => $nonce,

          # Monetary amounts are specified in the smallest unit of the applicable currency.
          # This amount is in cents. It's also hard-coded for $1, which is not very useful.
          "amount_money" => array (
            "amount" => intval($amount),
            "currency" => "USD"
          ),

          # Every payment you process for a given business have a unique idempotency key.
          # If you're unsure whether a particular payment succeeded, you can reattempt
          # it with the same idempotency key without worrying about double charging
          # the buyer.
          "idempotency_key" => uniqid()
        );
        

        # The SDK throws an exception if a Connect endpoint responds with anything besides 200 (success).
        # This block catches any exceptions that occur from the request.
        try {

             $access_token = SQUARE_ACCESS_TOKEN;
          $location_id = 'CBASEGNoVBNkbr7CZqL_f1ZAqkcgAQ';
          \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
           $transactions_api = new \SquareConnect\Api\TransactionsApi();
           
          $response = $transactions_api->charge($location_id, $request_body);
            
          //$response = $transaction_api->charge($access_token, $location_id, $request_body); 

          $jsonEncoded = json_decode($response,TRUE);    
            // debug($jsonEncoded,1);
          
        
        $vars = array();  
        $vars['order_payment_status'] = ($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED' ? 1 : 0);
        $vars['order_payment_txn_id'] = $jsonEncoded['transaction']['id'];
        // order_transaction_message
        $vars['order_payment_post'] = json_encode($jsonEncoded['transaction']);
        $vars['order_payment_type'] = "SquareUP";
        $vars['order_user_id'] = $this->userid;
        $vars['order_status'] = 1;
        $vars['order_amount'] = $amount;
          //1 =course , 2 =package
        $vars['order_type'] = $type;
        $vars['order_item_id'] = $invoice_no;
        

        if ($type == "course") {

            $only['fields'] = "tutorial_name,tutorial_image,tutorial_image_path,tutorial_price";
            $course = $this->model_tutorial->find_by_pk_active($invoice_no,false,$only);
            $vars['order_product_id'] =  $course['tutorial_id'];
            $vars['order_product_name'] =  $course['tutorial_name'];
            $vars['order_product_img'] =  get_image($course['tutorial_image'],$course['tutorial_image_path']);

        }else{
  
            $only['fields'] = "package_name,package_image,package_image_path,package_price";
            $package = $this->model_package->find_by_pk_active($invoice_no,false,$only);

            $vars['order_product_id'] =  $package['package_id'];
            $vars['order_product_name'] =  $package['package_name'];
            $vars['order_product_img'] =  get_image($package['package_image'],$package['package_image_path']);
        }
          $order_id = $this->model_order->insert_record($vars);

        $shop_item = array();
        $package_courses = $this->model_tutorial->get_package_courses($package['package_id']);
        if (isset($package_courses) && array_filled($package_courses)) {
          foreach ($package_courses as $key => $value) {
                
                $shop_item['item_order_id'] = $order_id;
                $shop_item['item_product_id'] = $value['tutorial_id']; 
                $shop_item['item_product_name'] = $value['tutorial_name'];
                $shop_item['item_product_img'] = get_image($value['tutorial_image'],$value['tutorial_image_path']);
                $shop_item['item_qty'] = 1;
                // $shop_item['item_type'] = 2;  
                $shop_item['item_price'] = $course['tutorial_price'];
                $this->model_shop_item->insert_record($shop_item);
          }
        }

        // $this->model_order->update_by_pk($invoice_no,$vars);
        // $vars = array();  
        // $vars['subscription_payment_status'] = ($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED' ? 1 : 0);
        // $vars['subscription_payment_txn_id'] = $jsonEncoded['transaction']['id'];
        // $vars['subscription_payment_post'] = json_encode($jsonEncoded['transaction']);
        // $vars['subscription_payment_type'] = "SquareUP";
        // $vars['subscription_user_id'] = $invoice_no;
        // $vars['subscription_amount'] = $amount;
        // $vars['subscription_package_id'] = $package;
        // $vars['subscription_status'] = 1;
        // $vars['subscription_txn_message'] = 'Success';
        // $vars['subscription_package_expire'] = date("Y-m-d", strtotime("+1 month"));
        // $subid = $this->model_subscription->insert_record($vars);

        // $user_param = array();
        // $user_param['user_package_id'] = $package;  //will define contractor type
        // $user_param['user_status'] = 1;
        // $this->model_user->update_by_pk($invoice_no,$user_param);
        



        if($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED'){
          $token = md5($subid);
        
          redirect(g('base_url')."payment-succes?oid=".$order_id."&type=".$type."&msg=Your payment process has been completed successfully, Thank you.&token={$token}");
        }
        //echo "<pre>";
          
        } catch (Exception $e) {
            // debug($e,1);
           //echo "Caught exception " . $e->getMessage();
            redirect(g('base_url')."payment-failure?oid=".$order_id."&type=".$type."&msg=Your payment process has been declined, please try again.");
        }
    }

    // public function chargeSquareUp()
    // {

    //     require APPPATH.'third_party/vendor/autoload.php';
    //     $access_token = SQUARE_ACCESS_TOKEN;
    //     //$access_token = "sq0atp-2KMNkh5ofMNbct0b_DANxg";

    //     $location_api = new \SquareConnect\Api\LocationApi();

    //     $location = $location_api->listLocations($access_token);

    //     $jsonEncoded = json_decode($location,TRUE); 

    //     $location_id = $jsonEncoded['locations'][0]['id'];
    //     //debug($location_id);exit;

    //     $nonce = $_POST['nonce'];
    //     $invoice_no = $_POST['order_id'];
    //     $amount = $_POST['amount'];
    //     $type = $_POST['type'];

    //     # Assume you have assigned values to the following variables:
    //     #   $nonce
    //     #   $location_id
    //     #   $access_token

    //     $transaction_api = new \SquareConnect\Api\TransactionApi();

    //     $request_body = array (

    //       "card_nonce" => $nonce,

    //       # Monetary amounts are specified in the smallest unit of the applicable currency.
    //       # This amount is in cents. It's also hard-coded for $1, which is not very useful.
    //       "amount_money" => array (
    //         "amount" => intval($amount),
    //         "currency" => "USD"
    //       ),

    //       # Every payment you process for a given business have a unique idempotency key.
    //       # If you're unsure whether a particular payment succeeded, you can reattempt
    //       # it with the same idempotency key without worrying about double charging
    //       # the buyer.
    //       "idempotency_key" => uniqid()
    //     );
        

    //     # The SDK throws an exception if a Connect endpoint responds with anything besides 200 (success).
    //     # This block catches any exceptions that occur from the request.
    //     try {
    //       $response = $transaction_api->charge($access_token, $location_id, $request_body); 
    //       $jsonEncoded = json_decode($response,TRUE);    
        
    //     $vars = array();  
    //     $vars['order_payment_status'] = ($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED' ? 1 : 0);
    //     $vars['order_payment_txn_id'] = $jsonEncoded['transaction']['id'];
    //     // order_transaction_message
    //     $vars['order_payment_post'] = json_encode($jsonEncoded['transaction']);
    //     $vars['order_payment_type'] = "SquareUP";
    //     $vars['order_user_id'] = $this->userid;
    //     $vars['order_status'] = 1;
    //     $vars['order_amount'] = $amount;
    //       //1 =course , 2 =package
    //     $vars['order_type'] = $type;
    //     $vars['order_item_id'] = $invoice_no;
        

    //     if ($type == "course") {

    //         $only['fields'] = "course_name,course_image,course_image_path,course_price";
    //         $course = $this->model_tutorial->find_by_pk_active($invoice_no,false,$only);
    //         $vars['order_product_id'] =  $course['course_id'];
    //         $vars['order_product_name'] =  $course['course_name'];
    //         $vars['order_product_img'] =  get_image($course['course_image'],$course['course_image_path']);

    //     }else{
  
    //         $only['fields'] = "package_name,package_image,package_image_path,package_price";
    //         $package = $this->model_package->find_by_pk_active($invoice_no,false,$only);

    //         $vars['order_product_id'] =  $package['package_id'];
    //         $vars['order_product_name'] =  $package['package_name'];
    //         $vars['order_product_img'] =  get_image($package['package_image'],$package['package_image_path']);
    //     }
    //       $order_id = $this->model_order->insert_record($vars);

    //     $shop_item = array();
    //     $package_courses = $this->model_tutorial->get_package_courses($package['package_id']);
    //     if (isset($package_courses) && array_filled($package_courses)) {
    //       foreach ($package_courses as $key => $value) {
                
    //             $shop_item['item_order_id'] = $order_id;
    //             $shop_item['item_product_id'] = $value['course_id']; 
    //             $shop_item['item_product_name'] = $value['course_name'];
    //             $shop_item['item_product_img'] = get_image($value['course_image'],$value['course_image_path']);
    //             $shop_item['item_qty'] = 1;
    //             // $shop_item['item_type'] = 2;  
    //             $shop_item['item_price'] = $course['course_price'];
    //             $this->model_shop_item->insert_record($shop_item);
    //       }
    //     }

    //     // $this->model_order->update_by_pk($invoice_no,$vars);
    //     // $vars = array();  
    //     // $vars['subscription_payment_status'] = ($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED' ? 1 : 0);
    //     // $vars['subscription_payment_txn_id'] = $jsonEncoded['transaction']['id'];
    //     // $vars['subscription_payment_post'] = json_encode($jsonEncoded['transaction']);
    //     // $vars['subscription_payment_type'] = "SquareUP";
    //     // $vars['subscription_user_id'] = $invoice_no;
    //     // $vars['subscription_amount'] = $amount;
    //     // $vars['subscription_package_id'] = $package;
    //     // $vars['subscription_status'] = 1;
    //     // $vars['subscription_txn_message'] = 'Success';
    //     // $vars['subscription_package_expire'] = date("Y-m-d", strtotime("+1 month"));
    //     // $subid = $this->model_subscription->insert_record($vars);

    //     // $user_param = array();
    //     // $user_param['user_package_id'] = $package;  //will define contractor type
    //     // $user_param['user_status'] = 1;
    //     // $this->model_user->update_by_pk($invoice_no,$user_param);
        



    //     if($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED'){
    //       $token = md5($subid);
        
    //       redirect(g('base_url')."payment-succes?oid=".$order_id."&type=".$type."&msg=Your payment process has been completed successfully, Thank you.&token={$token}");
    //     }
    //     //echo "<pre>";
          
    //     } catch (Exception $e) {
    //         //debug($e,1);
    //        //echo "Caught exception " . $e->getMessage();
    //         redirect(g('base_url')."payment-failure?oid=".$order_id."&type=".$type."&msg=Your payment process has been declined, please try again.");
    //     }
    // }





      // Form Order Confirm page after Pay
  public function payment_success()
  {
    
  // http://localhost/jobsdollar/payment/paypal/paypal_success?id=11&code=c5db8d625f6438f65cb161fbc4e66763
    if(isset($_GET))
    {
      // $generate_code = md5($_GET['id']);
      $generate_code = md5($_GET['oid']);
    

      if($generate_code == $_GET['token'])
      {
      
        $this->load_view('success',$data);
        
      }
      else
      {
        redirect(l('home/error' , true));
      }
    }
  }

  // If error found in payment
  public function payment_error()
  {
    //   debug($_GET,1);
    if(isset($_GET))
    {
      // $generate_code = md5($_GET['oid']);
      if(1)
      {
        
        $this->load_view('error',$data);
      }
      else
      {
        redirect(l('home/error' , true));
      }
    }
  }


    
    
}
