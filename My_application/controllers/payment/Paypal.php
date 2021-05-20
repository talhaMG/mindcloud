<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller {

	/**
	 * Paypal Controller. - The deafult controller
	 *
	 * @package		Paypal
	 * @author		devemail0909@gmail.com devemail0909@gmail.com (devemail0909@gmail.comdevemail0909@gmail.com.it@gmail.com)
	 * @version		2.0
	 * @since		23 AUG, 2017
	 */

	private $paypal_gateway_url;
	private $paypal_email;
	private $paypal_salt_key;
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();

        $this->view_pre = 'payment/';
        $this->set_attributes();
    }

	private function set_attributes()
	{
		// $this->paypal_gateway_url = (g('db.admin.sandbox') == 1) ? PAYPAL_GATEWAY_URL_TEST : PAYPAL_GATEWAY_URL_LIVE;
		// $this->paypal_email = g('db.admin.business_email');
		// $this->paypal_salt_key = 'F!5#iN@#l_^$';
		return true;
	}


	/*
	// Form Order Confirm page before Pay
	public function index()
	{
		if(isset($_GET['id']) AND (intval($_GET['id']) > 0))
		{
			$id = $_GET['id'];
			
			$data['paypal_gateway_url'] = $this->paypal_gateway_url;
			$data['paypal_email'] = $this->paypal_email;

			$data['discount_amount'] = isset($this->session->userdata['discount']['discount_amount']) ? $this->session->userdata['discount']['discount_amount'] : 0;

			$data['user_data'] = $this->session->userdata['logged_in_front'];
			$data['program_data'] = $this->model_user_program->get_result_data_by_pk_id($id);

			$data['success_url'] = l("paypal/paypal_success")."?id=".$id."&code=".$this->order_no_encrypt($id);
			$data['notify_url'] = l("paypal/paypal_notification")."?id=".$id."&code=".$this->order_no_encrypt($id);
			$data['cancel_url'] = l("paypal/paypal_error")."?id=".$id."&code=".$this->order_no_encrypt($id);
			

			$this->load_view('_form',$data);
		}
		else
		{
			die('Kill');
		}
	}
	*/

	// Form Order Confirm page after Pay
	public function paypal_success()
	{
		
		// debug($_GET['item_id']);
		// debug($_GET['code']);
		// 	debug($_GET,1);

		if(isset($_GET))
		{
			// $generate_code = md5($_GET['item_id']);
			$generate_code = md5($_GET['id']);
		

			if($generate_code == $_GET['code'])
			{
				
				// unset($this->session->userdata['discount']);
				// $this->session->unset_userdata('discount');
				$this->load_view('success',$data);
				
			}
			else
			{
				redirect(l('home/error' , true));
			}
		}
	}

	// If error found in payment
	public function paypal_error()
	{
			// debug($_GET,1);
		if(isset($_GET))
		{
			$generate_code = md5($_GET['id']);
			// $generate_code = md5($_GET['item_id']);
			if($generate_code == $_GET['code'])
			{
				// redirect(l('cart/error/?oid=' . $_GET['id']) , true);
				$this->load_view('error',$data);
			}
			else
			{
				redirect(l('home/error' , true));
			}
		}
	}

// Paypal Notification
	public function paypal_notification()
	{
		// if (ENVIRONMENT != "development") {
		// 	// the message
  //        $msg = serialize($_POST);
  //        $msg .= "<br>get data<br>";
  //        $msg .=serialize($_GET);
  //        $msg = wordwrap($msg,5000);
  //        mail("elle28dev@gmail.com","Paypal Check",$msg);
		// }
				
		if(isset($_GET))
		{
			// $generate_code = $this->order_no_encrypt($_GET['item_id']);
			$generate_code = md5($_GET['id']);
			
			if($generate_code == $_GET['code'])
			{
				$id = $_GET['id'];
				$status_codes = array("Default"=>0,"Completed"=>1,"Pending"=>2,"Denied"=>3,"Failed"=>4,"Reversed"=>5);
				$payment_status = $_POST['payment_status'];
				$order_payment_status = $status_codes[$payment_status];

				// $order_payment_status = 1; debuging	
				// 	// $this->model_shop_order->update_by_pk($id,$param);
				$type = $_POST['type'];

				$vars['order_payment_post'] = serialize($_POST);
				$vars['order_payment_status'] = $order_payment_status;
				$vars['order_transaction_message'] = $payment_status ;
				$vars['order_payment_type'] = 'Paypal';
				$vars['order_payment_txn_id'] = $_POST['payer_id'];
				$vars['order_user_id'] = $this->userid;
		        $vars['order_status'] = 1;
		        $vars['order_amount'] = $amount;
		          //1 =course , 2 =package
		        $vars['order_type'] = $type;
		        $vars['order_item_id'] = $id;
		        
        

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

						//order trail 
					// Email Start
					if(ENVIRONMENT != 'development')
					{
						// sent to user email
						// $this->model_email->notification_invoice($id , 'USER');

						// // sent to admin email
						// $this->model_email->notification_invoice($id , 'ADMIN');
					}
					// Email END
					return true;
				}
			}
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */