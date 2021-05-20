<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intuit extends MY_Controller {

    /**
     * Default Controller
     */

    public function __construct()
    {
        // Call the Model constructor latest_product
        $this->intuit_salt_key = 'F!5#iN@#l_^$';
        parent::__construct();
    }
    
    private function order_no_encrypt($id)
    {
        return md5($this->intuit_salt_key.$id);
    }

    public function ajax_paynow()
    {
        $data = $this->input->post();
        // Order ID
        $order_id = $data['order_id'];
        // Total Invoice Amount
        $total_invoice_amount = $this->model_shop_order->find_invoice_amount_by_order_id($order_id);
        // Intuit Token
        $token = $this->model_intuit_payment_token->get_latest_token($params);

        $resu = $this->_paynow($token , $data['card'] , $total_invoice_amount);
        
        if($resu['status'] == TRUE)
        {
            $response_data = json_decode($resu['txt'] , 1);
            
            // Update Order Table Start 
            $param = array();
            $param['order_payment_status'] = 1;
            $param['order_paypal_date'] = date("Y-m-d");
            $param['order_paypal_payment_status'] = $response_data['status'];
            $param['order_paypal_txn_id'] = $response_data['id'];
            $param['order_paypal_ipn_track_id'] = $response_data['id'];
            $param['order_payment_post'] = serialize($response_data);
            
            $this->model_shop_order->update_by_pk($order_id,$param);
            // Update Order Table End

            // Product Reward Start
            $this->products_rewards($order_id);
            // Product Reward END 

            
            // {EMAIL NOTIFICATION START}
            if(ENVIRONMENT != 'development')
            {
                // sent to user email
                $this->model_email->notification_invoice($order_id , 'USER');

                // sent to admin email
                $this->model_email->notification_invoice($order_id , 'ADMIN');
            }
            // {EMAIL NOTIFICATION END}
            
            $json_param = array();
            $json_param['status'] = TRUE;
            $json_param['txt'] = 'Payment has been done';
            $json_param['url'] = l("payment/intuit/success")."?id=".$order_id."&code=".$this->order_no_encrypt($order_id);
        }
        else {
            $json_param = array();
            $json_param['status'] = FALSE;
            $json_param['txt'] = $resu['txt'];
            $json_param['url'] = l("payment/intuit/error")."?id=".$order_id."&code=".$this->order_no_encrypt($order_id);
        }
        
        echo json_encode($json_param);
    }


    public function _paynow($access_token = '' , $card = array() , $amount = 0)
    {
        $amount = number_format($amount,2);
        
        $curl = curl_init();
        
        $data = array();
        $data['amount'] = $amount;
        $data['card']['expYear'] = $card['expYear'];
        $data['card']['expMonth'] = $card['expMonth'];
        $data['card']['address']['region'] = "CA";
        $data['card']['address']['postalCode'] = "94086";
        $data['card']['address']['streetAddress'] = "1130 Kifer Rd";
        $data['card']['address']['country'] = "US";
        $data['card']['address']['city'] = "Sunnyvale";
        $data['card']['name'] = "emulate=0";
        $data['card']['cvc'] = $card['cvc'];
        $data['card']['number'] = $card['number'];
        $data['currency'] = "USD";
        $data['context']['mobile'] = "false";
        $data['context']['isEcommerce'] = "true";
        //$data["name"] =  $card['name'];
        
        $data = json_encode($data);
 
        curl_setopt_array($curl, array(
          CURLOPT_URL => INTUIT_URL,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            // "authorization: Bearer ".$access_token,
            "authorization: Bearer ".$access_token,
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: a5091f0c-c200-d62d-fe89-553202a398b0",
            "request-id: ".strtolower($this->generateRandomString('15'))
          ),
        ));
         
        $response = curl_exec($curl);
        
        $err = curl_error($curl);
        
        curl_close($curl);
        $responce1 = json_decode($response,1);
        
        if($responce1['status'] == 'CAPTURED') {
            $param['status'] = TRUE;
            $param['txt'] = $response;
        }
        else {
            $param['status'] = FALSE;
            $param['txt'] = 'We can\'t able to Proceed this request Please Contact our Team Or Try again';
        }
        
        // if ($err) {
        //     $param['status'] = FALSE;
        //     $param['txt'] = $err;

        // } 
        // elseif($responce1 == '') {
            
        //     $param['status'] = FALSE;
        //     $param['txt'] = 'We can\'t able to Proceed this request Please Contact our Team';
            
        // }
        // elseif($responce1['errors']){
        //     $param['status'] = FALSE;
        //     $param['txt'] = $responce1['errors'][0];
            
        // }
        // else{
        //     $param['status'] = TRUE;
        //     $param['txt'] = $response;
        // }
        return $param;
    }

    
    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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


}
