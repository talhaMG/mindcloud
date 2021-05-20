<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'libraries/amazon-pay-sdk-php/AmazonPay/Client.php';

class Test extends MY_Controller {

	/**
	 * Default Controller
	 */
    // protected $amazonpay_config;

	public function __construct()
    {
    	// Call the Model constructor latest_product
    	// $this->cms_page_id = 24;
        parent::__construct();
        // $this->view_pre = "cms/";
        $this->amazonpay_config = array(
                'merchant_id'   => AMAZON_MERCHANT_ID, // Merchant/SellerID
                'access_key'    => AMAZON_ACCESS_KEY, // MWS Access Key
                'secret_key'    => AMAZON_SECRET_KEY, // MWS Secret Key
                'client_id'     => AMAZON_CLIENT_ID, // Login With Amazon Client ID
                'region'        => AMAZON_REGION,  // us, de, uk, jp
                'currency_code' => AMAZON_CURRENCY, // USD, EUR, GBP, JPY
                'sandbox'       => AMAZON_SANBOX);

        //$this->plugin_seo();
    }

  private function order_type_amount($oid="",$payment_type=""){

      $order_amount = $this->model_shop_order->find_invoice_amount_by_order_id($oid);
      $breaks = $this->model_shop_order->order_amount_breakup($order_amount);

    $pay_amount = 0;

    if ($payment_type == 'downpayment') {
        $pay_amount = $breaks[0];
      }


      if ($payment_type == 'partialpayment') {
        $pay_amount = $breaks[1];
      }
      return $pay_amount;
  }

    // Default Home Page
	public function index()
	{
        global $config;
        $data = array();

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;
            
   // $amazonpay_config = array(
   //      'merchant_id'   => 'A1RX1ZEKJGE93B', // Merchant/SellerID
   //      'access_key'    => 'AKIAI5D4Z5GAWA3HD43A', // MWS Access Key
   //      'secret_key'    => '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', // MWS Secret Key
   //      'client_id'     => 'amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a', // Login With Amazon Client ID
   //      'region'        => 'uk',  // us, de, uk, jp
   //      'currency_code' => 'GBP', // USD, EUR, GBP, JPY
   //      'sandbox'       => true); // Use sandbox test mode

        
         $amazonpay_config = array(
        'merchant_id'   => 'A1RX1ZEKJGE93B', // Merchant/SellerID
        'access_key'    => 'AKIAI5D4Z5GAWA3HD43A', // MWS Access Key
        'secret_key'    => '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', // MWS Secret Key
        'client_id'     => 'amzn1.application-oa2-client.028ef671d3a14fa8937dad75e126cac6', // Login With Amazon Client ID
        // (my client id(elle), as the url was not registerd in CLIENTs app)
        'region'        => 'uk',  // us, de, uk, jp
        'currency_code' => 'GBP', // USD, EUR, GBP, JPY
        'sandbox'       => true); // Use sandbox test mode

      // $data['amazonpay_config'] = $this->amazonpay_config;
      $data['amazonpay_config'] = $amazonpay_config;
      

		$this->load_view("index",$data);
	}


    public function handle_login()
    {
     
 $amazonpay_config = array(
        'merchant_id'   => 'A1RX1ZEKJGE93B', // Merchant/SellerID
        'access_key'    => 'AKIAI5D4Z5GAWA3HD43A', // MWS Access Key
        'secret_key'    => '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', // MWS Secret Key
        'client_id'     => 'amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a', // Login With Amazon Client ID
        'region'        => 'uk',  // us, de, uk, jp
        'currency_code' => 'GBP', // USD, EUR, GBP, JPY
        'sandbox'       => true); // Use sandbox test mode
      $data['amazonpay_config'] = $this->amazonpay_config;
      
        // debug($_GET);

      // login saving access_token 
    $param['order_accesstoken'] = $_GET['access_token']; //incase we need    
    $this->model_shop_order->update_by_pk($_GET['oid'],$param);

    //
    $data['access_token'] = $_GET['access_token'];
    $data['payment_type'] = $_GET['payment-type'];
    $data['oid'] = $_GET['oid'];
    $data['code'] = $_GET['code'];


        //INNER BANNER
                 $b = $this->get_ibanner(7);
                 $data['ititle'] = 'Amazon Payment';
                 $data['ibanner_img'] = $b['ibanner_img'];

    $this->load_view("step2",$data);


     
     // redirect(l('test/step2'),true);


        // verify that the access token belongs to us
/*$c = curl_init('https://api.amazon.com/auth/o2/tokeninfo?access_token=' . urlencode($_REQUEST['access_token']));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
 
$r = curl_exec($c);
curl_close($c);
$d = json_decode($r);

if ($d->aud != 'amzn1.application-oa2-client.6d0ded4254f34c398f4d7ccbbe488a4c') {      //client id
    //amzn1.application-oa2-client.ac9b8966d6b14f2784dc71688b29f216
// amzn1.application-oa2-client.8bfe5d512c3a490996a4d08419ec3644

  // the access token does not belong to us
  header('HTTP/1.1 404 Not Found');
  echo 'Fail to Authorize keys';
  exit;
}*/
 
// exchange the access token for user profile
// $c = curl_init('https://api.amazon.com/user/profile');
// curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: bearer ' . $_REQUEST['access_token']));
// curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// $r = curl_exec($c);
// curl_close($c);
// $d = json_decode($r);

//  print_r($d);
 
// echo sprintf('%s %s %s', $d->name, $d->email, $d->user_id);
    
    
                    
                    // // check weather user exist
                    // $par['where']['signup_email'] = $d->email;
                    //  $check = $this->model_signup->find_one_active($par);
                    //  if ($check >0) {
                    //     $user_data['signup_email'] = $d->email;
                    //     $user_data['signup_password'] = $d->user_id;
                    //     $log_res = $this->model_signup->login_amazon($user_data);
                    //     if($log_res == true)
                    //     {
                    //         // $this->load->view('Home/index');
                    //         // echo " loggin";
                    //         redirect(g('base_url').'checkout');
                    //     }else
                    //     {
                    //         echo "Failed to loggin";
                    //     }
                    //  }
                    // else
                    // {
                    //     $user_data['signup_status'] = 1;
                    // $user_data['signup_createdon'] = date('Y-m-d H:i:s');
                    // $user_data['signup_type'] = "Amazon User";
                    // $user_data['signup_email'] = $d->email;
                    // $user_data['signup_firstname'] = $d->name;
                    // $user_data['signup_password'] = $d->user_id;
                    // $this->model_signup->set_attributes($user_data);
                    // $inserted_id = $this->model_signup->save();
                    // if($inserted_id > 0)
                    // {
                    //     $this->model_signup->login($user_data);
                    //     $param['status'] = 1;
                    //     $param['txt'] = 'Thank you! you have successfully registered.';
                    //     $this->index();
                    // }
                    // else
                    // {
                    //     $param['status'] = 0;
                    //     redirect(g('base_url').'404');
                    // }   
                    // // signup ends
                    // }

    }

    public function ConfirmPaymentAndAuthorize()
    {
        global $config;
        $data = array();

            // print_r($_REQUEST['access_token']);
            // print_r($_GET);
            // print_r($_POST);

    $data['payment_type'] = $_POST['payment_type'];
    $data['oid'] = $_POST['oid'];
    $data['code'] = $_POST['code'];


                    //INNER BANNER
                 $b = $this->get_ibanner(7);
                 $data['ititle'] = 'Amazon Payment';
                 $data['ibanner_img'] = $b['ibanner_img'];


    // $amazonpay_config = array(
    //     'merchant_id'   => 'A1RX1ZEKJGE93B', // Merchant/SellerID
    //     'access_key'    => 'AKIAI5D4Z5GAWA3HD43A', // MWS Access Key
    //     'secret_key'    => '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', // MWS Secret Key
    //     'client_id'     => 'amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a', // Login With Amazon Client ID
    //     'region'        => 'uk',  // us, de, uk, jp
    //     'currency_code' => 'GBP', // USD, EUR, GBP, JPY
    //     'sandbox'       => true); // Use sandbox test mode

      $data['amazonpay_config'] = $this->amazonpay_config;
      

        
        $this->load_view("step3",$data);
    }


public function GetDetails()
    {

       $amazonpay_config = array(
        'merchant_id'   => 'A1RX1ZEKJGE93B', // Merchant/SellerID
        'access_key'    => 'AKIAI5D4Z5GAWA3HD43A', // MWS Access Key
        'secret_key'    => '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', // MWS Secret Key
        'client_id'     => 'amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a', // Login With Amazon Client ID
        'region'        => 'uk',  // us, de, uk, jp
        'currency_code' => 'GBP', // USD, EUR, GBP, JPY
        'sandbox'       => true); // Use sandbox test mode


        $data['amazonpay_config'] = $this->amazonpay_config;

        $pay_amount = $this->order_type_amount($_POST['oid'],$_POST['payment_type']);

// debug($pay_amount);
// debug($_POST);

        $us['fields'] = 'order_user_id,order_billing_email,order_ondate'; 
        $order_info = $this->model_shop_order->find_by_pk($oid,false,$us);

        //savin order refenrc id 
         $reference_id = $_POST['orderReferenceId'];

// Instantiate the client object with the configuration
$client = new AmazonPay\Client($amazonpay_config);
$requestParameters = array();

// Create the parameters array to set the order
// $requestParameters['amount']            = '19.95';
$requestParameters['amount']            = $pay_amount;
$requestParameters['currency_code']     = $amazonpay_config['currency_code'];
$requestParameters['seller_note']       = 'Thank you for shopping with us.';  //'Testing PHP SDK Samples';
$requestParameters['seller_order_id']   = order_no($order_info['order_ondate'],$oid,$order_info['order_user_id']);//'123456-TestOrder-123456';
$requestParameters['store_name']        = 'LoveCustomArt';
$requestParameters['custom_information']= $order_info['order_billing_email'];//'Any custom information';
$requestParameters['mws_auth_token']    = null; // only non-null if calling API on behalf of someone else
$requestParameters['amazon_order_reference_id'] = $_POST['orderReferenceId'];

// Set the Order details by making the SetOrderReferenceDetails API call
$response = $client->setOrderReferenceDetails($requestParameters);


// If the API call was a success Get the Order Details by making the GetOrderReferenceDetails API call
if ($client->success)
{
    $requestParameters['access_token'] = $_POST['accessToken'];
    $response = $client->getOrderReferenceDetails($requestParameters);
}
// Adding the Order Reference ID to the session so that we can use it in ConfirmAndAuthorize.php
// debug($_POST['orderReferenceId']);
$_SESSION['amazon_order_reference_id'] = $_POST['orderReferenceId'];

// Pretty print the Json and then echo it for the Ajax success to take in
$json = json_decode($response->toJson());
echo json_encode($json, JSON_PRETTY_PRINT);

    }


    public function ConfirmAndAuthorize()
    {
         $amazonpay_config = array(
        'merchant_id'   => 'A1RX1ZEKJGE93B', // Merchant/SellerID
        'access_key'    => 'AKIAI5D4Z5GAWA3HD43A', // MWS Access Key
        'secret_key'    => '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', // MWS Secret Key
        'client_id'     => 'amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a', // Login With Amazon Client ID
        'region'        => 'uk',  // us, de, uk, jp
        'currency_code' => 'GBP', // USD, EUR, GBP, JPY
        'sandbox'       => true); // Use sandbox test mode
      $data['amazonpay_config'] = $this->amazonpay_config;
      
      
// Instantiate the client object with the configuration
$client = new AmazonPay\Client($amazonpay_config);

// debug($_SESSION['amazon_order_reference_id']);

// Create the parameters array to set the order
$requestParameters = array();
$requestParameters['amazon_order_reference_id'] = $_SESSION['amazon_order_reference_id'];
$requestParameters['mws_auth_token'] = null;

// Confirm the order by making the ConfirmOrderReference API call
$response = $client->confirmOrderReference($requestParameters);

$responsearray['confirm'] = json_decode($response->toJson());


  $pay_amount = $this->order_type_amount($_POST['oid'],$_POST['payment_type']);

  // debug("amount");
  // debug($pay_amount);
  // debug("post");
  // debug($_POST);

// If the API call was a success make the Authorize (with Capture) API call
if ($client->success)
{
    $requestParameters['authorization_amount'] = $pay_amount;
    $requestParameters['authorization_reference_id'] = uniqid();
    $requestParameters['seller_authorization_note'] = 'Authorizing and capturing the payment';
    $requestParameters['transaction_timeout'] = 0;
    
    // For physical goods the capture_now is recommended to be set to false
    // When set to false, you will need to make a separate Capture API call in order to get paid
    // If you are selling digital goods or plan to ship the physical good immediately, set it to true
    $requestParameters['capture_now'] = false;
    $requestParameters['soft_descriptor'] = null;

    $response = $client->authorize($requestParameters);
    $responsearray['authorize'] = json_decode($response->toJson());
}

// Echo the Json encoded array for the Ajax success
// echo json_encode($responsearray);
          
          $ot = array();
          $ot['otrail_payment_post1'] = $responsearray;
  
// ADDED

  // Get Amazon Authorization ID
    $amazon_authorization_id = $responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AmazonAuthorizationId;
    // print_r($amazon_authorization_id.'<br>');
    $uniqid = time();

    // $requestParameters = array();
    $requestParameters['capture_now'] = true;   //as capturing amount
    $requestParameters['amazon_authorization_id'] = $amazon_authorization_id;
    $requestParameters['capture_amount'] = $pay_amount;
    $requestParameters['currency_code'] = 'GBP';
    $requestParameters['capture_reference_id'] = $uniqid;
    $response = $client->capture($requestParameters);
    $responsearray['capture'] = json_decode($response->toJson());
    

    // debug($responsearray['capture']->ResponseStatus);
    // debug("<br>".$responsearray['capture']->ResponseStatus);  fail  400 
    // debug("<br>".$responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->State);
    // debug("<br>".$responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->ReasonCode);

    // echo json_encode($responsearray);


    // Echo the Json encoded array for the Ajax success
    /*echo json_encode($responsearray);
    exit();*/

    $json_response = array();
      if($responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->State == 'Open'){
            
         $ot['otrail_payment_status'] = '1';
         $ot['otrail_status'] = 1;
         $json_response['status'] = 1;

     }
     // Declined
     elseif($responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->State == 'Declined'){

      // $param['message'] = $responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->ReasonCode;
         $ot['otrail_payment_status'] = '0';
         $json_response['status'] = 2;

     }
     // Pending
     else
     {
         $ot['otrail_payment_status'] = '0';
         $json_response['status'] = 2;
     }

     //save response in order trail
          $ot['otrail_order_id'] = $_POST['oid'];
          $ot['otrail_user_id'] = $this->userid;
          // $ot['otrail_payment_status'] = '';
          $ot['otrail_payment_post'] = serialize($responsearray);
          $ot['otrail_txn_message'] = $responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->State;
          $ot['otrail_payment_type'] = $_POST['payment_type'];
          $ot['otrail_merchant'] = 'Amazon';
          // $ot['otrail_payment_status'] = '1';
          $ot['otrail_payment_amount'] = $pay_amount;
          $ot['otrail_reference_id'] = $_SESSION['amazon_order_reference_id'];
          $ot['otrail_access_token'] = '';
          $ot['otrail_txn_id'] = $amazon_authorization_id;

        
      $this->model_order_trail->set_attributes($ot);
      $inserted_id = $this->model_order_trail->save();

    echo json_encode($json_response);

      // $this->model_order_trail->insert($ot);      

  // // Accept
    // if($responsearray['capture']->ResponseStatus == 200){
         
    //      $this->model_order->update_by_pk($order_id,array("order_payment_status" => 1));
    //      $param['status'] = "1";
    //      echo json_encode($param);
    //  }
    //  // Declined
    //  elseif($responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->State == 'Declined'){
    //     $this->model_order->update_by_pk($order_id,array("order_payment_status" => 3));
    //     $param['status'] = "3";
    //     $param['message'] = $responsearray['authorize']->AuthorizeResult->AuthorizationDetails->AuthorizationStatus->ReasonCode;
    //      echo json_encode($param);
    //  }
    //  // Pending
    //  else
    //  {
    //      $this->model_order->update_by_pk($order_id,array("order_payment_status" => 2));
    //      $param['status'] = "2";
    //      echo json_encode($param);
    //  }

    }




}
