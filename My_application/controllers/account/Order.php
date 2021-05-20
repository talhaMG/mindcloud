<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Account.php");

class Order extends MY_Controller_Account {

	/**
	 * Reset_password Controller. - The deafult controller
	 *
	 * @package		Reset_password - Default
	 * @author		Dalton Lambert (dalton.developer@gmail.com)
	 * @version		2.0
	 * @since		06 March, 2017
	 */

	//protected $cms_page_id = 1;

	public function __construct()
    {
		// Call the Model constructor latest_product
        parent::__construct();

        $this->add_script(array("account.css"));
        $this->layput_data['inner_banner'] = '';//$this->model_inner_banner->find_by_pk_active(7);
    }

	public function index()
	{
		global $config;

		$data['inner_banner'] = $this->layput_data['inner_banner'];
		$data['title']= 'Order History';

		$this->register_plugins(array("datatables-front"));

		// $data['payment_list'] = $this->model_order->get_list_data('order_payment_status');
		$data['delivery_status'] = $this->model_shop_order->get_list_data('order_delivery_status');
		
		$data['data'] = $this->model_shop_order->get_order_by_user_id($this->userid);
		// debug($this->db->last_query());
		// debug($data['data']);
		$this->load_view("order",$data);
	}

	public function ajax_view_detail()
	{
		$order_id = $this->input->post('order_id');
		$order_data = $this->model_order->find_by_pk($order_id);
		$data['flight_departure_data'] = json_decode($order_data['order_departure_data'],1);
		$data['flight_return_data'] = json_decode($order_data['order_arrival_data'],1);
		$json_param['status'] = true;
		$json_param['html'] = $this->load->view('account/_view_order_detail',$data,true);
		
		echo json_encode($json_param);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */