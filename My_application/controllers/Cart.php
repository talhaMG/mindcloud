<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller {

	private $isguest;
	private $userdata;
	private $cart_content;
	private $total_item;

	private $total_amount;
	private $shipping_charges;
	private $tax;
	private $discount;
	private $total_order_amount;

	function __construct() 
	{
		parent::__construct();

		$this->isguest = true;
		$this->userdata = array(); // if isguest true than userdata is empty
		$this->cart_content = $this->cart->contents();
		$this->total_item = $this->cart->total_items();
		$this->total_amount = $this->cart->total();
		$this->shipping_charges = $this->get_shipping_charges();
		$this->tax = 0;
		$this->discount = $this->_set_discount();


		$this->total_order_amount = $this->get_order_amount();

		// $this->min_order = $this->layout_data['config_info']['min_order_amount(USD)'][0]['config_value'];
		// $this->free_delivery = $this->layout_data['config_info']['free_delivery_charges(USD)'][0]['config_value'];
		// $this->delivery_charges = $this->layout_data['config_info']['delivery_charges(USD)'][0]['config_value'];
		// $this->tax = $this->layout_data['config_info']['tax(percentage)'][0]['config_value'];
		// $this->store_address = $this->layout_data['config_info']['store_address'][0]['config_value'];
	} 

	private function _set_discount()
	{
		$discount = 0;
		$data = isset($this->session->userdata['discount']) ? $this->session->userdata['discount'] : array();
		if(isset($data['coupon']) && array_filled($data['coupon']))
		{
			$coupon_discount = $this->_set_coupon_discount($data['coupon']);

			// save discount amount in session start
			$session_data = array();
			$session_data['discount']['coupon'] = $data['coupon'];
			$session_data['discount']['coupon']['discount_amount'] = $coupon_discount;
			$this->session->set_userdata($session_data);
			// save discount amount in session End

			$discount += $coupon_discount;
		}

		return $discount;
	}

	private function _set_coupon_discount($data)
	{
		$coupon_discount = $this->model_coupon->calculate_discounted_amount($data['coupon_id'] , $this->total_amount);
		return $coupon_discount;
	}

	private function get_shipping_charges()
	{
		$charges = SHIPPING_CHARGES;

		if(isset($this->session->userdata['shipping_charges']['charges']))
			$charges = $this->session->userdata['shipping_charges']['charges'];

		return $charges;
	}
	// WHEN PAYMENT AMOUNT RECEIVED
	public function success()
	{

		// if($this->userid > 0) {
			$data['title'] = "Success Payment";

			$this->cart->destroy();

			$array_items = array();
			$array_items = array('discount','shipping_charges','tax');
			$this->session->unset_userdata($array_items);

			$user_data =$this->session->userdata("logged_in_front");
			
			$data['username'] = $user_data['first_name'].' '.$user_data['last_name'];

			$this->load_view('success',$data);
		// }
		// else {
		// 	redirect(l(''),true);
		// }
	}

	// WHEN ISSUE FACE IN PAYMENT AMOUNT
	public function error()
	{
		// if($this->userid > 0) {
			$data['title'] = "Error in Payment";

			$this->load_view('error',$data);
		// }
		// else {
		// 	redirect(l(''),true);
		// }

	}

	private function get_order_amount()
	{
		return ($this->total_amount+$this->shipping_charges+$this->tax)-$this->discount;
	}


	// add product in your cart basket
	public function ajax_add_to_cart()
	{
		// debug($_POST);
		// 	exit;
		if(isset($_POST) && array_filled($_POST)){

			$pro_type = $this->input->post("pro_type");  //$type , 1 == zippers , 2 == other products
		   
			if(intval($_POST['product_id']) > 0 )
			{
				if(intval($_POST['product_qty']) > 0)
				{
					$data = array(
							   'id'      => intval($_POST['product_id']),
							   'pro_type'  => $pro_type,
							   'qty'     => intval($_POST['product_qty']),
							   'price'   => $_POST['product_price'],
							   'name'    => htmlentities($_POST['product_name']),
							   'product_img' => $_POST['product_img'],
							   'options' => array(
							   					'product_img' => $_POST['product_img'],
							   					'size' => $_POST['size_type'],
							   					'finish' => $_POST['finish'],
							   					//'weight' => $_POST['product_weight'],
							   					'cart_additional' => $_POST['cart'],  //for zipper products 
							   					));

					$this->cart->product_name_rules = '[:print:]';
					$insert = $this->cart->insert($data);
					
					$json_param['status'] = true;
					$json_param['msg']['title'] = "Add {$_POST['product_name']} in your cart basket";
					$json_param['msg']['desc'] = "Add {$_POST['product_name']} in your cart basket";
				}
				else
				{
					$json_param['status'] = false;
					$json_param['msg']['title'] = 'Error found';
					$json_param['msg']['desc'] = 'You qty is less than zero(0),Please mention the qty';
				}	
			}
			else
			{
				$json_param['status'] = false;
				$json_param['msg']['title'] = 'Note';
				$json_param['msg']['desc'] = 'Please Select the Product.';	//'Error found in cart please try again';	
			}
			echo json_encode($json_param);
		}
		else {
			redirect('404');
		}
	}


	public function ajax_bulk_add_to_cart()
	{
		if(isset($_POST) && array_filled($_POST)){
			$type = isset($_POST['type']) ? $_POST['type']: 0;
			
			if($this->isguest == true || $this->isguest == false)
			{
				$ids = explode(",", $_POST['ids']);
				$params = array();
				$params['fields'] = 'tutorial_id,tutorial_name,tutorial_price,tutorial_image_path,tutorial_image';
				$params['where_in']['tutorial_id'] = $ids;
				$data = $this->model_tutorial->find_all_active($params);
				
				if(isset($data) AND array_filled($data))
				{
					foreach($data as $value)
					{
						$cart_data = array(
								   'id'      => intval($value['tutorial_id']),
								   'qty'     => 1,
								   'price'   => $value['tutorial_price'],
								   'name'    => htmlentities($value['tutorial_name']),
								   'options' => array(
								   					'product_img' => get_image($value['tutorial_image'],$value['tutorial_image_path']),
								   					'type'=>$type,
								   					//'weight' => $_POST['product_weight'],
								   					//'cart_additional' => $_POST['cart'],
								   					));
						$insert = $this->cart->insert($cart_data);
					}
					
					$count = count($data);
					$json_param['status'] = true;
					$json_param['msg']['title'] = "Bulk Courses ({$count}) Added in your cart basket";
					$json_param['msg']['desc'] = '';
				}
				else
				{
					$json_param['status'] = false;
					$json_param['msg']['title'] = 'Error found';
					$json_param['msg']['desc'] = 'You qty is less than zero(0),Please select the qty';
				}	
			}
			else
			{
				$json_param['status'] = false;
				$json_param['msg']['title'] = 'Error found';
				$json_param['msg']['desc'] = 'Error found in cart please try again';	
			}
			echo json_encode($json_param);
		}
		else {
			redirect('404');
		}
	}

	// get cart basket 
	public function ajax_get_cart_basket()
	{

		$data = array();
		
		$data['data'] = $this->cart_content;
		$data['total_items'] = $this->total_item;
		$data['total_amount'] = $this->total_amount;

		//debug($data , 1);
		//$json_param['cart_body'] = $this->load->view('cart/get_basket' , $data , true);
		
		
		$json_param['total_item'] = $this->total_item;
		$json_param['total_amount'] = price($this->total_amount);
		$json_param['shipping_charges'] = price($this->shipping_charges);
		$json_param['order_amount'] = price($this->total_order_amount);
		$json_param['order_discount'] = price($this->discount);

		// $json_param['status'] = true;
		// $json_param['msg']['title'] = 'Cart Basket';
		// $json_param['msg']['desc'] = 'Cart Basket here';	

		echo json_encode($json_param);
	}

	private function _set_weight()
	{
		$weight = 0;
		foreach($this->cart_content as $value) {
			$weight += $value['options']['weight'];
		}
		return $weight;
		// $data = explode(".", $weight);

		// $param = array();
		// $param['pound'] = $data[0];
		// $param['ounces'] = $data[1];
		// return $param;
	}


	// Step ONE (Cart Page)
	// public function index()
	// {
	// 	$data['title'] = "Cart";

	// 	$data['data'] = $this->cart_content;
	// 	$data['total_items'] = $this->total_item;
	// 	$data['total_amount'] = $this->total_amount;
	// 	$data['shipping_amount'] = $this->shipping_charges;	
	// 	$data['discount_amount'] = $this->discount;	
	// 	$data['total_order_amount'] = $this->total_order_amount;	

	// 	$discount = $this->session->userdata('discount');
	// 	$data['coupon'] = isset($discount['coupon']) ? $discount['coupon'] : array();	

	// 	// SHIPPING START
	// 	if(isset($this->session->userdata['shipping_charges']['dest_zip']))
	// 		$data['shipping_zip'] = $this->session->userdata['shipping_charges']['dest_zip'];
	// 	else
	// 		$data['shipping_zip'] = isset($this->layout_data['user_data']['ui_zip']) ? $this->layout_data['user_data']['ui_zip'] : '';

	// 	if(isset($this->session->userdata['shipping_charges']['service']))
	// 		$data['shipping_service'] = $this->session->userdata['shipping_charges']['service'];
	// 	else
	// 		$data['shipping_service'] = 0;
	// 	// SHIPPING END


    //     //TAB TITLE
    //     $method_title = ucwords($this->uri->segment(1));
    //     $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

    //     //INNER BANNER
    //      $b = $this->get_ibanner(7);
    //      $data['ititle'] = $b['ititle'];
    //      $data['ibanner_img'] = $b['ibanner_img'];

	// 	$this->load_view('stepone-theme',$data);
	// }

	

    public function index()
    {
		$data['title'] = "Cart";

		$data['data'] = $this->cart_content;
		$data['total_items'] = $this->total_item;
		$data['total_amount'] = $this->total_amount;
		$data['shipping_amount'] = $this->shipping_charges;	
		$data['discount_amount'] = $this->discount;	
		$data['total_order_amount'] = $this->total_order_amount;	

		$discount = $this->session->userdata('discount');
		$data['coupon'] = isset($discount['coupon']) ? $discount['coupon'] : array();	

		// SHIPPING START
		if(isset($this->session->userdata['shipping_charges']['dest_zip']))
			$data['shipping_zip'] = $this->session->userdata['shipping_charges']['dest_zip'];
		else
			$data['shipping_zip'] = isset($this->layout_data['user_data']['ui_zip']) ? $this->layout_data['user_data']['ui_zip'] : '';

		if(isset($this->session->userdata['shipping_charges']['service']))
			$data['shipping_service'] = $this->session->userdata['shipping_charges']['service'];
		else
			$data['shipping_service'] = 0;
		// SHIPPING END


        //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        //INNER BANNER
         $b = $this->get_ibanner(7);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];
        $this->load_view("cart-one",$data);
    }


	// Cart Step Two (Checkout page)
	public function step_two()
	{
		$data['title'] = "Checkout";

		if($this->userid > 0)  
		{	
		//if(isset($this->session->userdata['shipping_charges']) && array_filled($this->session->userdata['shipping_charges']))
		if(1 == 1)
		{
			if($this->total_amount >= 0)
			{

				//debug($this->cart_content , 1);
				$data['title'] = 'Checkout';

				//$data['breadcrumbs'] = array('cart/'=>'Step one' , 'last'=>$data['title']);
				
				$data['data'] = $this->cart_content;
				$data['total_items'] = $this->total_item;
				$data['total_amount'] = $this->total_amount;
				$data['shipping_amount'] = $this->shipping_charges;		
				$data['discount_amount'] = $this->discount;		
				$data['total_order_amount'] = $this->total_order_amount;	

				$data['country_list'] = $this->model_country->find_all_active(array('order'=>'country ASC'));
				
				$data['member_data'] = $this->model_user->find_by_pk_active($this->userid);

				if(isset($this->session->userdata['shipping_charges']['dest_zip']))
					$data['shipping_zip'] = $this->session->userdata['shipping_charges']['dest_zip'];

				  //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        //INNER BANNER
         $b = $this->get_ibanner(7);
         $data['ititle'] = "Step Two";
         $data['ibanner_img'] = $b['ibanner_img'];
				
				$this->load_view('steptwo-theme',$data);
			}
			else {
				redirect(l('cart?msgtype=error&msg='.urlencode('Your cart is empty')) , true);
			}
		}
		else {
			redirect(l('cart?msgtype=error&msg='.urlencode('Please select shipping first')) , true);
		}

		}else {
			$url = urlencode(l('cart/step_two'));
			redirect(l('login?msgtype=error&msg='.urlencode('Please login to continue.').'&url='.$url) , true);
		}


	}


	public function payment()
	{
	
			if(1==1)
			{
				$order_id = $this->input->get('oid');

				$data['title'] = "Payment";

				$order_data = $this->model_shop_order->get_order_by_pk($order_id);
			
				if(1==1)
				{
					$data['data'] = $order_data;
					$data['order_id'] = $order_data['order_id'] ;

					$data['total_items'] = count($order_data['items']);
					$data['total_amount'] = $order_data['price'];
					$data['shipping_amount'] = $order_data['order_shipping_amount'];
					$data['discount_amount'] = $order_data['order_discount_amount'];
					$data['total_order_amount'] = ($order_data['price']+$order_data['order_shipping_amount']+$order_data['order_tax_amount'])-$order_data['order_discount_amount'];

					$paymentType = $_GET['payment-type'];
			
					$data['paymentType'] = $paymentType;
					$ptypes = array("downpayment","partialpayment");
					    
				    $amount_breakup = $this->model_shop_order->order_amount_breakup($data['total_order_amount']);
			

					if (in_array($paymentType,$ptypes)) {

					if ($paymentType == "downpayment") {
					
						$down_payement = $amount_breakup[0];
						$remaining = $amount_breakup[1];

				
					$data['shipping_paypl'] = $data['shipping_amount'];
					$data['discount_amount_paypl'] = $data['discount_amount'] + $remaining;
						
		
					$data['payment_amount'] = $down_payement;

					$data['stripe_payment_url'] = l('cart/stripe_payment?payment-type=downpayment');
							}

				if ($paymentType == "partialpayment") {
						
						$down_payement = $amount_breakup[0];
						$remaining = $amount_breakup[1];

				
					$data['shipping_paypl'] = 0;
					$data['discount_amount_paypl'] = 0;
						
			
					$data['payment_amount'] = $remaining;
			
					$data['stripe_payment_url'] = l('cart/stripe_payment?payment-type=partialpayment');
							}

					}
					
					// else{
						
					// 	redirect(l('error404'),true);

					// }


					//Paypal
					$data['paypal_gateway_url'] = PAYPAL_GATEWAY_URL;
					$data['paypal_email'] = PAYPAL_BUSINESS_EMAIL;

					$data['success_url'] = l("paypal/paypal_success")."?id=".$order_id."&code=".md5($order_id);
					$data['notify_url'] = l("paypal/paypal_notification")."?id=".$order_id."&code=".md5($order_id)."&payment-type=downpayment";
					$data['cancel_url'] = l("paypal/paypal_error")."?id=".$order_id."&code=".md5($order_id);
					
					//STRIPE
					$data['order_id'] = $order_id;
					$data['order_product'] = 'lovecustomart work';

		 		 $this->amazonpay_config = array(
                'merchant_id'   => AMAZON_MERCHANT_ID, // Merchant/SellerID
                'access_key'    => AMAZON_ACCESS_KEY, // MWS Access Key
                'secret_key'    => AMAZON_SECRET_KEY, // MWS Secret Key
                'client_id'     => 'amzn1.application-oa2-client.028ef671d3a14fa8937dad75e126cac6', // Login With Amazon Client ID  elle deve id as clients url was not regsiter
                'region'        => AMAZON_REGION,  // us, de, uk, jp
                'currency_code' => AMAZON_CURRENCY, // USD, EUR, GBP, JPY
                'sandbox'       => AMAZON_SANBOX);

		
       	$data['amazonpay_config'] = $this->amazonpay_config;

       	$data['amazon_oid'] = $order_id;
       	$data['amazon_code'] = md5($order_id);
       	$data['amazon_payment_type'] = $paymentType;

			
				        $method_title = ucwords($this->uri->segment(1));
				        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

				 
				         $b = $this->get_ibanner(7);
				         $data['ititle'] = 'Payment';
				         $data['ibanner_img'] = $b['ibanner_img'];

					$this->load_view('payment-theme',$data);
				}
			}
		
		else {
			redirect(l('error404'),true);
		}
	}

	

	// public function payment()
	// {
		
	// 	$code = $_GET['code'];
	// 	if($code == md5($_GET['oid']))
	// 	{
			
	// 		if(1==1)
	// 		{
	// 			$order_id = $this->input->get('oid');

	// 			$data['title'] = "Payment";

	// 			$order_data = $this->model_shop_order->get_order_by_pk($order_id);
			
	// 			if(1==1)
	// 			{
	// 				$data['data'] = $order_data;
	// 				$data['order_id'] = $order_data['order_id'] ;

	// 				$data['total_items'] = count($order_data['items']);
	// 				$data['total_amount'] = $order_data['price'];
	// 				$data['shipping_amount'] = $order_data['order_shipping_amount'];
	// 				$data['discount_amount'] = $order_data['order_discount_amount'];
	// 				$data['total_order_amount'] = ($order_data['price']+$order_data['order_shipping_amount']+$order_data['order_tax_amount'])-$order_data['order_discount_amount'];

	// 				$paymentType = $_GET['payment-type'];
			
	// 				$data['paymentType'] = $paymentType;
	// 				$ptypes = array("downpayment","partialpayment");
					    
			
			
	// 				$data['paypal_gateway_url'] = PAYPAL_GATEWAY_URL;
	// 				$data['paypal_email'] = PAYPAL_BUSINESS_EMAIL;

	// 				$data['success_url'] = l("paypal/paypal_success")."?id=".$order_id."&code=".md5($order_id);
	// 				$data['notify_url'] = l("paypal/paypal_notification")."?id=".$order_id."&code=".md5($order_id)."&payment-type=downpayment";
	// 				$data['cancel_url'] = l("paypal/paypal_error")."?id=".$order_id."&code=".md5($order_id);
		
	// 				$data['order_id'] = $order_id;
	// 				$data['order_product'] = 'mindcloud work';
	

	// 	 		 $this->amazonpay_config = array(
    //             'merchant_id'   => AMAZON_MERCHANT_ID, // Merchant/SellerID
    //             'access_key'    => AMAZON_ACCESS_KEY, // MWS Access Key
    //             'secret_key'    => AMAZON_SECRET_KEY, // MWS Secret Key
    //             'client_id'     => 'amzn1.application-oa2-client.028ef671d3a14fa8937dad75e126cac6', // Login With Amazon Client ID  elle deve id as clients url was not regsiter
    //             'region'        => AMAZON_REGION,  // us, de, uk, jp
    //             'currency_code' => AMAZON_CURRENCY, // USD, EUR, GBP, JPY
    //             'sandbox'       => AMAZON_SANBOX);

		 	
		
    //    	$data['amazonpay_config'] = $this->amazonpay_config;

    //    	$data['amazon_oid'] = $order_id;
    //    	$data['amazon_code'] = md5($order_id);
    //    	$data['amazon_payment_type'] = $paymentType;

			
	// 			        $method_title = ucwords($this->uri->segment(1));
	// 			        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

	// 			         $b = $this->get_ibanner(7);
	// 			         $data['ititle'] = 'Payment';
	// 			         $data['ibanner_img'] = $b['ibanner_img'];

		
	// 				$this->load_view('payment-theme',$data);
	// 			}
	// 		}
	// 	}
	// 	else {
	// 		redirect(l('error404'),true);
	// 	}
	// }





	private function order_no_encrypt($id)
	{
		return md5('F!5#iN@#l_^$'.$id);
	}

/*
	//PAY WITH STRIPE
	public function stripe_payment()
    {
        require APPPATH.'libraries/StripePayment.php';
        $reponse = array();
        
        // debug($_POST["token"]);
        // debug($_POST);

        $oid = $_POST['item_number'];
        
        if ($_POST > 0) {

            $token = $this->input->post("token");
            $stripePayment = new StripePayment();

            $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);

    // echo "<pre>";
    // print_r($stripeResponse);
    // debug($stripeResponse);
    // debug($result);
    // die;
            $amount = $stripeResponse["amount"] /100;
    

               if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {

                
                if (isset($order_activehistory) && array_filled($order_activehistory)) {
                    foreach ($order_activehistory as $key => $value) {
                    $oldorder['order_status'] = 0;
                    $this->model_shop_order->update_by_pk($value['order_id'],$oldorder);

                    }
                }


                $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];

                $param_order['order_payment_type'] = 'Stripe';
                $param_order['order_payment_txn_id'] = $stripeResponse['balance_transaction'];
                $param_order['order_transaction_message'] = $stripeResponse['status'];
                $param_order['order_payment_status'] = $stripeResponse['paid'];
                $param_order['order_status'] = 1;  
                $this->model_shop_order->update_by_pk($oid,$param_order);
             
                // Email Start
                    if(ENVIRONMENT != 'development')
                    {
                        // sent to user email
                         $this->model_email->payement_notification($oid , 'USER');
                        // sent to admin email
                        $this->model_email->payement_notification($oid , 'ADMIN');
                    }
                  
                  $url = g('base_url')."success?via=stripe&oid=".$oid."&token=".md5($oid);
                redirect($url);
       
            }else{
                
                // redirect(g('base_url')."payment-failure");
                $reponse['status'] = 0;
                $reponse['url'] = g('base_url')."payment-failure";
                $reponse['message'] = $stripeResponse['failure_code'];

                $url = g('base_url')."payment-failure";
                redirect($url);
            }

            echo json_encode($reponse);
        }
    }

	// WHEN PAYMENT AMOUNT RECEIVED
	public function success()
	{

		if($this->userid > 0) {
			$data['title'] = "Success Payment";

			$this->cart->destroy();

			$array_items = array();
			$array_items = array('discount','shipping_charges','tax');
			$this->session->unset_userdata($array_items);

			$this->load_view('success',$data);
		}
		else {
			redirect(l(''),true);
		}
	}

	// WHEN ISSUE FACE IN PAYMENT AMOUNT
	public function error()
	{
		if($this->userid > 0) {
			$data['title'] = "Error in Payment";

			$this->load_view('error',$data);
		}
		else {
			redirect(l(''),true);
		}
	}
*/

	/**
		Delete Product in cart list
	*/
	public function ajax_remove()
	{
		$data['rowid'] = $this->input->post('rowid');
		$data['qty'] = 0;

		$this->cart->update($data);
		
		$json_param['status'] = true;
		$json_param['msg']['title'] = 'Remove Item';
		$json_param['msg']['desc'] = 'Remove Item in your basket';	

		echo json_encode($json_param);
	}


	/**
		Update Product in cart list
	*/
	public function ajax_update()
	{
		$qty = intval($_POST['qty']);

		if($qty > 0) {
			$product_id = $this->input->post('product_id');
			$data['rowid'] = $this->input->post('rowid');
			$data['qty'] = $qty;
			
			$this->cart->update($data);
			
			$json_param['status'] = true;
			$json_param['msg']['title'] = 'Update Item';
			$json_param['msg']['desc'] = 'Update Item in your basket';	
		}
		else {
			$json_param['status'] = false;
			$json_param['msg']['title'] = '';
			$json_param['msg']['desc'] = 'Please select qty';		
		}

		echo json_encode($json_param);
	}


	private function _save_user()
	{
		//if($this->isguest)
		if(1==1)
		{
			$data = array();
			$data['user_email'] = $_POST['shop_order']['order_billing_email'];
			$data['user_password'] = $this->model_user->_encrypt_password($_POST['password']);
			$data['user_firstname'] = $_POST['shop_order']['order_billing_fname'];
			$data['user_lastname'] = $_POST['shop_order']['order_billing_lname'];
			$data['user_status'] = 1;

			$this->model_user->set_attributes($data);
			$inserted_id = $this->model_user->save();

			// sent to user email
			$this->model_email->notification_register($inserted_id , 'user');
			// sent to admin email
			$this->model_email->notification_register($inserted_id , 'admin');

			//	SESSION DATA START
			$this->model_user->auto_login($inserted_id , 'front');
			//	SESSION DATA END
			
			return $inserted_id;
		}
	}


	/// SAVE ORDER 
	public function ajax_save_order()
	{
		// debug($this->cart_content);
		// die();

		if(isset($_POST) && array_filled($_POST))
		{
			$_POST['shop_order']['order_payment_status'] = 0;

			if($this->validate("model_shop_order"))
			{
				$data = $_POST['shop_order'];

				// if(isset($_POST['password']))
				// {
				// 	$ui = $this->model_user->check_unique_email();
				// 	if($ui  == 0)
				// 	{
				// 		$user_id = $this->_save_user();
				// 	}
				// 	else
				// 	{
				// 		// $user_id = $ui;
				// 		// $this->model_user->auto_login($user_id , 'front');
				// 		$json_param['order']['status'] = false;
				// 		$json_param['order']['msg']['title'] = 'Error Occurred';
				// 		$json_param['order']['msg']['desc'] = 'This Email ID already registered please login first or use a different email';
				// 	}
				// }
				// else
				// {
				// 	$user_id = 	$this->userid;
				// }

				$user_id = 	$this->userid;
				// debug($this->userid);
				// debug($data,1);
				if(isset($user_id) && intval($user_id) > 0)
				{
					// $data['order_is_sandbox'] = (PAYMENT_MODE_IS_TEST) ? 1 : 0;
					// $data['order_delivery_status'] = 1;
					$data['order_status'] = 1;
					// $data['order_shipping_amount'] = $this->shipping_charges;
					// $data['order_shipping_content'] = serialize($this->session->userdata['shipping_charges']);
					// $data['order_tax_amount'] = $this->tax;
					// $data['order_discount_amount'] = $this->discount;
					// $data['order_discount_content'] = serialize($this->session->userdata('discount'));
					$data['order_user_id'] = $user_id;
					// $data['order_payment_type'] = 'PAYPAL';
					$this->model_shop_order->set_attributes($data);
					$order_id = $this->model_shop_order->save();
					
					if($order_id > 0)
					{
						// debug($this->cart_content,1);
						
						//save order item
						if(isset($this->cart_content) && array_filled($this->cart_content))
						{
							foreach($this->cart_content as $cart_content)
							{
								$param = array();
								$param['item_order_id'] = $order_id;
								$param['item_product_id'] = $cart_content['id'];
								$param['item_product_name'] = $cart_content['name'];
								$param['item_product_img'] = $cart_content['options']['product_img'];
								$param['item_qty'] = $cart_content['qty'];
								$param['item_rate'] = $cart_content['price'];
								$param['item_price'] = $cart_content['subtotal'];
								$param['item_serialize'] = serialize($cart_content);
								
								$this->model_shop_item->set_attributes($param);
								$inserted_id = $this->model_shop_item->save();
							}
						}// save order item

						$json_param['order']['status'] = true;
						$json_param['order']['msg']['title'] = 'Order save';
						$json_param['order']['msg']['desc'] = '';
						$json_param['order']['url'] = l('').'cart/success?oid='.$order_id.'&code='.md5($order_id).'&payment='.$_POST['payment'];
						$json_param['order']['order_id'] = $order_id;

					}

				}else{
					$json_param['order']['status'] = false;
				    $json_param['order']['msg']['title'] = 'Error Occurred';
				   $json_param['order']['msg']['desc'] = 'Please login to continue.';

				}  //else nnot loggedin 


			}
			else
			{
				$json_param['order']['status'] = false;
				$json_param['order']['msg']['title'] = 'Error Occurred';
				$json_param['order']['msg']['desc'] = validation_errors();
			}
		}
		else
		{
			$json_param['order']['status'] = false;
			$json_param['order']['msg']['title'] = 'Error Occurred';
			$json_param['order']['msg']['desc'] = 'Error found please try again';
		}
		echo json_encode($json_param);
	}



	######SAVE PACKAGE SUBSCRIPTION #####
	public function ajax_save_subscription()
    {
        global $config;
    

		if(isset($_POST) && array_filled($_POST)){
         
         		$validate_code = $this->input->post("package-code");// to validate package id
	            $package_id = $_POST['subscription']['subscription_package_id'];
	            
         if ($validate_code == order_no_encrypt($package_id)) {
         	
	         if ( $this->userid > 0) {

	            $userid = $this->userid;
	            
	            //user data
	            $user_data =  $this->model_user->find_by_pk($userid);
	            //current package details
	            $param_pkg['fields'] = "package_id,package_price,package_period";
	            $pkg_data = $this->model_package->find_by_pk_active($package_id);
	            
	            // debug($user_data);
	            // debug($pkg_data);

	            	//subscription post data 
				$param_order = $this->input->post("subscription");
	            	//adding subscription post data 
	            $param_order['subscription_user_id'] = $userid;
	            $param_order['subscription_package_name'] = $pkg_data['package_name'];
	            $param_order['subscription_amount'] = $pkg_data['package_price'];

	            if ($pkg_data['package_period'] == 1) {
	            	// month
	            $param_order['subscription_package_expire'] = date('Y-m-d', strtotime('+1 month'));
	            }else{
	            	// year
	            $param_order['subscription_package_expire'] = date('Y-m-d', strtotime('+1 year'));
	            }

	            //Deactivating the subscription status from subscription table if any exit against the current user id

	            $subs_where['where']['subscription_user_id'] = $this->userid;
	            $subs_data['subscription_status'] = 0;
	            $this->model_subscription->update_model($subs_where,$subs_data);


	            $this->model_subscription->set_attributes($param_order);
	            $inserted_id = $this->model_subscription->save();

	            
	            //saving current order id(order and pcakage info in users table)
	            $param_user['user_package_id'] = $package_id;
	            $this->model_user->update_by_pk($this->userid,$param_user);
	            
	            $order_id = encrypt_param($inserted_id);
	            // $order_id = "%Ds0W9o%010".$inserted_id."01%eTz25%Sfs";	            


				$json_param['order']['status'] = true;
				$json_param['order']['msg']['title'] = 'Order save';
				$json_param['order']['msg']['desc'] = '';
				$json_param['order']['url'] = l('package-payment-step-2')."?package-token=".$order_id;
				$json_param['order']['order_id'] = $order_id;
	            

	         }else{
				
				$json_param['order']['status'] = false;
				$json_param['order']['msg']['title'] = 'Error Occurred';
				$json_param['order']['msg']['desc'] = 'Error found please try again.';  //LOGIN ERROR
	         }


         }else{	
         	
         	$json_param['order']['status'] = false;
			$json_param['order']['msg']['title'] = 'Error Occurred';
			$json_param['order']['msg']['desc'] = 'Error found please try again.PACKAGE';	 //FAIL TO VALIDATE PACKAGE ID
         }

        }else{
        	$json_param['order']['status'] = false;
			$json_param['order']['msg']['title'] = 'Error Occurred';
			$json_param['order']['msg']['desc'] = 'Error found please try again';	 //EMPTY POST ERROR
        }

		echo json_encode($json_param);
    }

	###### COUPON DISCOUNT START ######
	public function ajax_discount()
	{
		if(isset($_POST) && array_filled($_POST))
		{
			$coupon = htmlentities(trim($this->input->post('coupon')));

			$data = $this->model_coupon->get_coupon_exist($coupon);
			
			if(isset($data) && array_filled($data))
			{
				$today = date('Y-m-d');
				if(($today >= $data['coupon_start_date']) AND ($today <= $data['coupon_expire_date']))
				{
					$coupon_data = array();
					$coupon_data['coupon_id'] = $data['coupon_id'];

					$session_data = array();
					$session_data['discount']['coupon'] = $coupon_data;
					$session_data['discount']['coupon']['info'] = $data;
					$this->session->set_userdata($session_data);


					$json_param['status'] = true;
					//$json_param['msg']['title'] = 'Error occurred';
					$json_param['msg']['desc'] = "Discount amount added in your order";
				}
				else
				{
					$json_param['status'] = false;
					$json_param['msg']['title'] = 'Error occurred';
					$json_param['msg']['desc'] = "Sorry, we were not able to recognize the Discount Code you used. Please try again.";
				}
			}
			else
			{
				$json_param['status'] = false;
				$json_param['msg']['title'] = 'Error occurred';
				$json_param['msg']['desc'] = "Sorry, we were not able to recognize the Discount Code you used. Please try again.";
			}
		}
		else
		{
			$json_param['status'] = false;
			$json_param['msg']['title'] = 'Error occurred';
			$json_param['msg']['desc'] = 'Error Found please try again';
		}

		echo json_encode($json_param);
	}
	###### COUPON DISCOUNT END ######

	###### SHIPPING CHARGES START ######
	// GET UPS START
	public function ajax_get_shipping_charges_ups()
    {
        global $config;

        $dest_zip = $this->input->post('destination');
        $service = $this->input->post('servictype');
        $weight = $this->input->post('pound');

        $error = array();
        if(strlen($service) == 0)
        	$error[] = 'Please select UPS Service';
        if(strlen($dest_zip) == 0)
        	$error[] = 'Please insert your destination';

        if(array_filled($error))
        {
            $this->json_param['status'] = false;
            $this->json_param['msg'] = '';
            foreach ($error as $key => $value) {
            	$this->json_param['msg'] .= $value . "<br />";
            }
        }
        else
        {
	        $length = $width = $height = 0;

	        // ========== CHANGE THESE VALUES TO MATCH YOUR OWN ===========

	        $AccessLicenseNumber = UPS_LICENCE_NUM; // Your license number
	        $UserId = UPS_USER_ID; // Username
	        $Password = UPS_USER_PASS; // Password
	        $PostalCode = UPS_USER_CODE; // Zipcode you are shipping FROM
	        $ShipperNumber = UPS_USER_SHIP_NUM; // Your UPS shipper number


	        /*$AccessLicenseNumber = '6D36A5611FC046D8'; // Your license number
	        $UserId = 'cyber11354.llc'; // Username
	        $Password = 'Flushing3916'; // Password
	        $PostalCode = '20705'; // Zipcode you are shipping FROM
	        $ShipperNumber = '25578X'; // Your UPS shipper number*/

	        // =============== DON'T CHANGE BELOW THIS LINE ===============


	        $data = "<?xml version=\"1.0\"?>
		     <AccessRequest xml:lang=\"en-US\">
		      <AccessLicenseNumber>$AccessLicenseNumber</AccessLicenseNumber>
		      <UserId>$UserId</UserId>
		      <Password>$Password</Password>
		     </AccessRequest>
		     <?xml version=\"1.0\"?>
		     <RatingServiceSelectionRequest xml:lang=\"en-US\">
		      <Request>
		       <TransactionReference>
		        <CustomerContext>Bare Bones Rate Request</CustomerContext>
		        <XpciVersion>1.0001</XpciVersion>
		       </TransactionReference>
		       <RequestAction>Rate</RequestAction>
		       <RequestOption>Rate</RequestOption>
		      </Request>
		     <PickupType>
		      <Code>01</Code>
		     </PickupType>
		     <Shipment>
		      <Shipper>
		       <Address>
		        <PostalCode>$PostalCode</PostalCode>
		        <CountryCode>US</CountryCode>
		       </Address>
		   <ShipperNumber>$ShipperNumber</ShipperNumber>
		      </Shipper>
		      <ShipTo>
		       <Address>
		        <PostalCode>$dest_zip</PostalCode>
		        <CountryCode>US</CountryCode>
		    <ResidentialAddressIndicator/>
		       </Address>
		      </ShipTo>
		      <ShipFrom>
		       <Address>
		        <PostalCode>$PostalCode</PostalCode>
		        <CountryCode>US</CountryCode>
		       </Address>
		      </ShipFrom>
		      <Service>
		       <Code>$service</Code>
		      </Service>
		      <Package>
		       <PackagingType>
		        <Code>02</Code>
		       </PackagingType>
		       <Dimensions>
		        <UnitOfMeasurement>
		         <Code>IN</Code>
		        </UnitOfMeasurement>
		        <Length>$length</Length>
		        <Width>$width</Width>
		        <Height>$height</Height>
		       </Dimensions>
		       <PackageWeight>
		        <UnitOfMeasurement>
		         <Code>LBS</Code>
		        </UnitOfMeasurement>
		        <Weight>$weight</Weight>
		       </PackageWeight>
		      </Package>
		     </Shipment>
		     </RatingServiceSelectionRequest>";
	        $ch = curl_init("https://www.ups.com/ups.app/xml/Rate");
	        curl_setopt($ch, CURLOPT_HEADER, 1);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	        $result = curl_exec($ch);
	        //print_r($result);exit;
	        // echo '<!-- '. $result. ' -->'; // THIS LINE IS FOR DEBUG PURPOSES ONLY-IT WILL SHOW IN HTML COMMENTS
	        $data = strstr($result, '<?');
	        $xml_parser = xml_parser_create();
	        xml_parse_into_struct($xml_parser, $data, $vals, $index);
	        xml_parser_free($xml_parser);
	        $params = array();
	        $level = array();
	        foreach ($vals as $xml_elem) {
	            if ($xml_elem['type'] == 'open') {
	                if (array_key_exists('attributes', $xml_elem)) {
	                    list($level[$xml_elem['level']], $extra) = array_values($xml_elem['attributes']);
	                } else {
	                    $level[$xml_elem['level']] = $xml_elem['tag'];
	                }
	            }
	            if ($xml_elem['type'] == 'complete') {
	                $start_level = 1;
	                $php_stmt = '$params';
	                while ($start_level < $xml_elem['level']) {
	                    $php_stmt .= '[$level[' . $start_level . ']]';
	                    $start_level++;
	                }
	                $php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
	                eval($php_stmt);
	            }
	        }
	        curl_close($ch);

	        // debug($params,1);
	        if ($params['RATINGSERVICESELECTIONRESPONSE']['RESPONSE']['RESPONSESTATUSDESCRIPTION'] == 'Success') {
	            $charges = $params['RATINGSERVICESELECTIONRESPONSE']['RATEDSHIPMENT']['TOTALCHARGES']['MONETARYVALUE'];

	            // SAVE IN SESSION START
	            $session_data = array();
				$session_data['shipping_charges']['charges'] = $charges;
				$session_data['shipping_charges']['shipment'] = 'UPS';
				$session_data['shipping_charges']['dest_zip'] = $dest_zip;
				$session_data['shipping_charges']['service'] = $service;
				$session_data['shipping_charges']['weight'] = $weight;
				$this->session->set_userdata($session_data);
				// SAVE IN SESSION END
	            
	            $this->json_param['status'] = true;
	            $this->json_param['msg'] = "Shipping added";

	        }
	        elseif ($_POST['pound'] > 150)
	        {
	            $this->json_param['status'] = false;
	            $this->json_param['msg'] = "Shipping weight limitation is 150 lbs.";

	        }
	        else
	        {
	            $this->json_param['status'] = false;
	            $this->json_param['msg'] = 'The requested service is unavailable to residential destinations.';

	        }
	    }


        echo json_encode($this->json_param);
    }
	// GET UPS END

	###### SHIPPING CHARGES END ######
}
