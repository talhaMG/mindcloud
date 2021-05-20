<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myemail{

	private $to_mail = 'devemail0909@gmail.com';
	private $from_mail = 'devemail0909@gmail.com';
	private $protocol = 'smtp';
	private $mailpath = '/usr/sbin/sendmail';
	private $charset = 'utf-8';
	private $wordwrap = TRUE;
	private $mailtype = 'html';
	private $smtp_host = '';
	private $smtp_user = '';
	private $smtp_pass = '';
	private $smtp_port = '';

	public function __construct($params = array())
    {
    	if (count($params) > 0)
		{
			$this->initialize($params);
		}
    }

    // --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}



	public function notification($param)
	{

		debug($this->protocol , 1);
	}

	public function email($var = array())
	{
		//$CI->session->userdata('user_session');
		$CI =   &get_instance();
		$CI->load->library('email');

		if(ENVIRONMENT == 'development') {
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'dev.tradekey.com.pk';
			$config['smtp_user'] = 'babar.hussaini@dev.tradekey.com.pk';
			$config['smtp_pass'] = 'Passwordhai';
			$config['smtp_port'] = 25;
		}
		else{
			$config['protocol'] = 'sendmail';
		}

		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$config['priority'] = 1;

		$CI->email->initialize($config);
		
		$CI->email->from($CI->config->item('default_email'), $CI->config->item('site_title') . ' Admin');
		$CI->email->to($var['to']);

		if($var['email_type'] == 'EMAIL_VERIFICATION')
		{
			$encrypt_code = md5(g('email_code'). '-' . $var['option']['member_id']);
			$random = $var['option']['member_token_number'];
			$email = $var['option']['email'];
			$url = g('base_url') . "account/authentication/$random/$encrypt_code/";
			
			$subject = "Email ID Verification";
			
			/**
				@param FOR USE VARIABLE IN EMAIL TEMPLATE
			*/
			$data['email']  = $email;
			$data['site_title'] = $CI->config->item('site_title');
			$data['url'] = $url;

			$content = $CI->load->view('email_template/email_verify' , $data , true);

		}

		if($var['email_type'] == 'FORGOT_PASSWORD')
		{
			$encrypt_code = md5(g('forgot_code'). '-' . $var['option']['member_id']);
			$random = $var['option']['member_token_number'];
			$email = $var['option']['email'];
			$url = g('base_url') . "account/reset_password/$random/$encrypt_code/";
			
			$subject = "Reset your password";
			/**
				@param FOR USE VARIABLE IN EMAIL TEMPLATE
			*/
			$data['email']  = $email;
			$data['site_title'] = $CI->config->item('site_title');
			$data['url'] = $url;

			$content = $CI->load->view('email_template/forgot_password' , $data , true);
		}
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$CI->email->subject($subject);
		$CI->email->message($content);

		$CI->email->send();

		//echo $CI->email->print_debugger();

		return true;
	}


	/**
		
	*/
	public function payment_response_email($type = 'USER' , $order_no)
	{
		$CI =   &get_instance();
		$CI->load->model('model_cart');

		$business_email = $CI->layout_data['config_info']['business_email'][0]['config_value'];
		$confirmation_email = $CI->layout_data['config_info']['confirmation_email'][0]['config_value'];
		$confirmation_email_cc = $CI->layout_data['config_info']['confirmation_email_cc'][0]['config_value'];



		/* Email Section Start*/
		$custom = explode("-", $order_no );
		$id = intval($custom[1]);

		$for_payment_status = $CI->model_cart->get_individual_order($id);
		//debug($for_payment_status);
		
		/**
			ADD SHIPPING AMOUNT
		*/
		$param['shipping_amount'] = $for_payment_status[0]['shipping_amount'];//shipping_charges($for_payment_status[0]['shipping_method']);

		$param['tax_amount'] = $for_payment_status[0]['tax_amount'];

		$param['type'] = $type;
		/**
			ADD USER EMAIL ID's
		*/
		$user_email[] = $for_payment_status['0']['shipping_email'];
		
		if(!empty($for_payment_status['0']['billing_email']))
			$user_email[] = $for_payment_status['0']['billing_email'];

		if(isset($CI->session->userdata['session_email']))
			$user_email[] = $CI->session->userdata('session_email');
		
		$param['user_email'] = implode(",", array_unique($user_email));
		
		/**
			GET EMAIL FROM SAVE IN DB
		*/
		
		$param['business_email'] = $business_email .' , '. $confirmation_email;
		
		$param['inquiry_email'] = $confirmation_email;
		
		/**
			SOME TYPE WISE DATA
		*/
		if($type == 'USER'){
			$param['name'] = $for_payment_status['0']['shipping_name'];
			
			$param['email'] = $param['user_email'];
		}
		else{
			$param['name'] = 'Admin';

			$param['email'] = $confirmation_email;
		}
		
		/**
			CUSTOMER BILLING ADDRESS
		*/
		
		$param['billing_address'] = $for_payment_status['0']['billing_address1'];
		$param['billing_address'] .= ', ' . $for_payment_status['0']['billing_city'];


		$param['payment_status'] = $for_payment_status['0']['authorize_response_reason_text'];

		$param['order_no'] = trim($order_no);
		

		// GET ORDER ITEM
		$order_item = $CI->model_cart->get_individual_order_item($id);
		
		$i=1;
		$total_invoice_amount = 0; 
		foreach($order_item as $order_item_value)
		{
			$param['product'][$i]['product_name'] = $order_item_value['product_name'];
			$param['product'][$i]['product_qty'] = $order_item_value['product_qty'];
			$param['product'][$i]['product_rate'] = number_format($order_item_value['product_rate'],2);

			$subtotal = $order_item_value['product_qty'] * $order_item_value['product_rate'];

			$param['product'][$i]['product_total'] = number_format($subtotal,2);

			$total_invoice_amount += $subtotal;
			
			$i++;
		}

		$param['test_mode'] = $for_payment_status['0']['authorize_test_request'];
		$param['order_total'] = $total_invoice_amount;

		$result['total_order_amount'] = total_invoice_amount($param['order_total'] , $param['shipping_amount']) + $param['tax_amount'];

		$result['data'] = $param;

		$content = $CI->load->view('email_template/email_template',$result,true);
		//echo $content;die;
		//debug($result , 1);


		/**
			SEND EMAIL (EMAIL ADD)
		*/
		$send_email = $param['email'];

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		//	Additional headers
		//	$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
		$headers .= 'From: Order Acknowledgement <'.$business_email.'>' . "\r\n";

		$send_subject = "Order Acknowledgement";

		$CI->load->library('email');

		if(ENVIRONMENT == 'development') {
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'dev.tradekey.com.pk';
			$config['smtp_user'] = 'babar.hussaini@dev.tradekey.com.pk';
			$config['smtp_pass'] = 'Passwordhai';
			$config['smtp_port'] = 25;
		}
		else {
			$config['protocol'] = 'sendmail';
		}

		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$config['priority'] = 1;


		$CI->email->initialize($config);


		$CI->email->from($business_email);
		$CI->email->to($send_email);

		//$CI->email->cc($confirmation_email_cc);
		//$CI->email->bcc($send_bcc);
		
		$CI->email->subject($send_subject);
		$CI->email->message($content);


		$CI->email->send();


		return true;
		//mail($send_email, $send_subject, $content, $headers);

		/* Email Section End*/
	}



	
}