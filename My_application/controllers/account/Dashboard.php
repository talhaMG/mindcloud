<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Account.php");

class Dashboard extends MY_Controller_Account {

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
        //$this->add_script(array("account.css"));
        $this->layput_data['inner_banner'] = '';//$this->model_inner_banner->find_by_pk_active(7);
    }

	public function index()
	{
		global $config;

		

		$data['inner_banner'] = $this->layput_data['inner_banner'];
		$data['title']= 'Account Area';


		$data['country'] = $this->model_country->find_all_list_active(array('order'=>'country ASC'),"country");

		$data['user_data'] = $this->model_user->find_by_pk($this->session->userdata['logged_in_front']['id']);
		
		//$data['user_login_hisotry'] = $this->model_user->user_last_login_history($this->session->userdata['logged_in_front']['id'] , 3);

		// $data['credit_hisotry'] = $this->model_user_credit->get_data(
		// 	$this->session->userdata['logged_in_front']['id']);
		//debug($data['credit_hisotry'] , 1);

		// DOB String
		// $dd = explode("-", $data['user_data']['ui_dob']);
		// $data['dob']['year'] = $dd[0];
		// $data['dob']['month'] = $dd[1];
		// $data['dob']['day'] = $dd[2];
		//debug($data['dob'] , 1);



		$this->load_view("dashboard",$data);
	}

	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */