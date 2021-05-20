<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorizenet extends MY_Controller {

	/**
	 * Default Controller
	 */

    private $authorizenet_salt_key;

	public function __construct()
    {
    	// Call the Model constructor latest_product
        $this->authorizenet_salt_key = 'F!5#iN@#l_^$';

        parent::__construct();

    }

    private function order_no_encrypt($id)
    {
        return md5($this->authorizenet_salt_key.$id);
    }

    public function get_data_authorize()
    {
        global $config;
        $expiry = explode('/', $_POST['expiry_date']);
        $total_invoice_amount = $this->model_shop_order->find_invoice_amount_by_order_id($this->input->post('order_id'));
        
        $save = $billing = $billings = array();

        $save['first_name']     = isset($this->layout_data['user_data']['user_firstname']) ? $this->layout_data['user_data']['user_firstname'] : 'Geust';
        $save['last_name']      = isset($this->layout_data['user_data']['user_lastname']) ? $this->layout_data['user_data']['user_lastname'] : ' Account';
        $save['email']          = isset($this->layout_data['user_data']['user_email']) ? $this->layout_data['user_data']['user_email'] : 'guest@gmail.com';
        $save['amount']         = $total_invoice_amount;
        $save['user_roll']      = 3;
        $save['status']         = 2;            
        
        $billing['cardholder_name'] = $_POST['cardholder_name'];
        $billing['card_number']     = $_POST['card_number'];
        $billing['expiry_date']     = $expiry[0]."/".$expiry[1];
        $billings['expiry_month']   = $expiry[0];
        $billings['expiry_year']    = $rest = substr($expiry[1], -2);;
        $billing['cv2']             = $_POST['cv2'];
        $billing['street_address']  = (isset($_POST['street_address']) AND !empty($_POST['street_address'])) ? $_POST['street_address'] : 'NY';
        $billing['state_id']        = (isset($_POST['state_id']) AND !empty($_POST['state_id'])) ? $_POST['state_id'] : '1';
        $billing['zip']             = (isset($_POST['zip']) AND !empty($_POST['zip'])) ? $_POST['zip'] : '10001';
        $billing['country_id']      = (isset($_POST['country_id']) AND !empty($_POST['country_id'])) ? $_POST['country_id'] : '223';
        
        
        $payment = $this->_authorizePaymentGatewayService($save,$billing,$billings,$message);

        if($payment[0] == 1){

            $order_id = $this->input->post('order_id');

            $status_codes = array("Default"=>0,"Completed"=>1,"Pending"=>2,"Denied"=>3,"Failed"=>4,"Reversed"=>5);
            $payment_status = "Completed";
            $order_payment_status = $status_codes[$payment_status];

            // Update USER PROGRAM 
            $param = array();
            $param['order_payment_status'] = $order_payment_status;
            $param['order_paypal_date'] = date("Y-m-d");
            $param['order_paypal_payment_status'] = $payment_status;
            $param['order_paypal_txn_id'] = $payment[37];
            $param['order_paypal_ipn_track_id'] = $payment[37];
            $param['order_payment_post'] = serialize($payment);

            $this->model_shop_order->update_by_pk($order_id,$param);

            // {EMAIL NOTIFICATION START}
            if(ENVIRONMENT != 'development')
            {
                // sent to user email
                $this->model_email->notification_invoice($order_id , 'USER');

                // sent to admin email
                $this->model_email->notification_invoice($order_id , 'ADMIN');
            }
            // {EMAIL NOTIFICATION END}
               
                //$title = 'Payment Receipt -- Qlioncology';
            $url = l("payment/authorizenet/success")."?id=".$order_id."&code=".$this->order_no_encrypt($order_id);
            echo json_encode(array('status'=>1,'url'=>$url));

        }
        else{
            $msg = $payment[3];
            debug($msg,1);
            $url = l("payment/authorizenet/error")."?id=".$order_id."&code=".$this->order_no_encrypt($order_id)."&msg=".urlencode($msg);
            echo json_encode(array('status'=>0,'url'=>$url));

            /*
            $message = '<div id="cardWrapper"><div id="giftcard_wrapper">
                        <div id="giftCard">
                            <div id="cardDetails">
                                <h1 style="color:#FFF; margin: 0px; font-size: 1.5em; height: 33px;">$'.$save['amount'].'</h1>
                            </div>
                        </div>
                        <h1>'.$msg.'</h1>
                </div></div>';
            echo json_encode(array('status'=>0,'message'=>$message));
            */
        }

    }


    // Form Order Confirm page after Pay
    public function success()
    {
        if(isset($_GET))
        {
            $generate_code = $this->order_no_encrypt($_GET['id']);
            if($generate_code == $_GET['code'])
            {
                redirect(l('cart/success?oid='.$_GET['id'] , true));    
            }
            else
            {
                redirect(l('home/error' , true));
            }
        }
    }

    // If error found in payment
    public function error()
    {
        if(isset($_GET))
        {
            $generate_code = $this->order_no_encrypt($_GET['id']);
            if($generate_code == $_GET['code'])
            {
                $msg = urlencode($_GET['msg']);
                redirect(l('cart/error?oid='.$_GET['id']."&msg={$msg}" , true));  
            }
            else
            {
                redirect(l('home/error' , true));
            }
        }
    }



    private function _authorizePaymentGatewayService($save,$billing,$billings,$message)
    {
        $order_id = intval($this->input->post('order_id'));
        
        // By default, this sample code is designed to post to our test server for
        // developer accounts: https://test.authorize.net/gateway/transact.dll
        // for real accounts (even in test mode), please make sure that you are
        // posting to: https://secure.authorize.net/gateway/transact.dll
        $post_url = POST_URL;
        $api_login_id = API_LOGIN_ID;
        $transaction_key = TRANSACTION_KEY;
        $test_mode = TEST_MODE;
        //Select state name
        $state_id = 1;//$billing['state_id'];
        //$getStateName = $this->model_states->find_by_pk($state_id);
        //$state_name = $getStateName['name'];
        
        //Select country name
                
        $country_id = $billing['country_id'];
        $getCountryName = $this->model_country->find_by_pk($country_id);
        $country_name = $getCountryName['country']; 
        // $login_id = $this->model_config->find_by_pk(21);
        // $transaction_key = $this->model_config->find_by_pk(22);

        //Post array
        // $api_login_id = "4Pr39Er3"; //2Z99mQsSv9x
        // $transaction_key = "3DtRqZ6T36h3s43t"; //
        $post_values = array(
            
            
            // the API Login ID and Transaction Key must be replaced with valid values
            "x_login"           => $api_login_id,
            "x_tran_key"        => $transaction_key,
        
            "x_version"         => "3.1",
            "x_delim_data"      => "TRUE",
            "x_delim_char"      => "|",
            "x_relay_response"  => "FALSE",
        
            "x_type"            => "AUTH_CAPTURE",
            "x_method"          => "CC",
            "x_card_num"        => $billing['card_number'],
            "x_exp_date"        => $billings['expiry_month'].$billings['expiry_year'],
        
            "x_amount"          => $save['amount'],
            "x_currency_code"   => "USD",
            "x_description"     => $message,
        
            "x_first_name"      => $save['first_name'],
            "x_last_name"       => $save['last_name'],
            "x_address"         => $billing['street_address'],
            "x_state"           => 'test',
            "x_country"         => $country_name,
            "x_zip"             => $billing['zip'],
            "x_test_request"    => $test_mode,
            "x_invoice_num"     => $order_id
            
            // Additional fields can be added here as outlined in the AIM integration
            // guide at: http://developer.authorize.net
        );
        //debug($post_values);exit;
        
        // This section takes the input fields and converts them to the proper format
        // for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
        $post_string = "";
        
        foreach( $post_values as $key => $value )
            { $post_string .= "$key=" . urlencode( $value ) . "&"; }
        $post_string = rtrim( $post_string, "& " );
        
        
        // The following section provides an example of how to add line item details to
        // the post string.  Because line items may consist of multiple values with the
        // same key/name, they cannot be simply added into the above array.
        //
        // This section is commented out by default.
        /*
        $line_items = array(
            "item1<|>golf balls<|><|>2<|>18.95<|>Y",
            "item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
            "item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
            
        foreach( $line_items as $value )
            { $post_string .= "&x_line_item=" . urlencode( $value ); }
        */
        
        // This sample code uses the CURL library for php to establish a connection,
        // submit the post, and record the response.
        // If you receive an error, you may want to ensure that you have the curl
        // library enabled in your php configuration
        $request = curl_init($post_url); // initiate curl object
            curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
            curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
            $post_response = curl_exec($request); // execute curl post and store results in $post_response
            // additional options may be required depending upon your server configuration
            // you can find documentation on curl options at http://www.php.net/curl_setopt
        
        curl_close ($request); // close curl object
        
        // This line takes the response and breaks it into an array using the specified delimiting character
        $response_array = explode($post_values["x_delim_char"],$post_response);
        
        // The results are output to the screen in the form of an html numbered list.

        return $response_array;
        
        // individual elements of the array could be accessed to read certain response
        // fields.  For example, response_array[0] would return the Response Code,
        // response_array[2] would return the Response Reason Code.
        // for a list of response fields, please review the AIM Implementation Guide
        
    }




}
