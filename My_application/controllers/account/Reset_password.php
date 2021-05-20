<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reset_password extends MY_Controller {

	/**
	 * Reset_password Controller. - The deafult controller
	 *
	 * @package		Reset_password - Default
	 * @author		Dalton Lambert (dalton.developer@gmail.com)
	 * @version		2.0
	 * @since		20 April, 2017
	 */

	//protected $cms_page_id = 1;
	 
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();

        $this->view_pre = 'account/';

        $this->add_script(array("account.css"));
        $this->layput_data['inner_banner'] = '';//$this->model_inner_banner->find_by_pk_active(7);
    }

	public function index($encrypted_code=0)
	{
		global $config;
		//$data['logo'] = $this->model_logo->find_all_active();
		
		if(strlen($encrypted_code) > 0)
		{
			$token = isset($_GET['token']) ? $_GET['token'] : '';
			if(md5($token) == $encrypted_code)
			{
				$search = array('HYQ357','-354T');
				$token = str_replace($search, "", $token);
				$tt = explode("-", $token);


				$data = array();
				$id = $tt[0];
				
				$param = array();
				$param['where']['user_status'] = 1;
				$data['data'] = $this->model_user->find_by_pk($id,false,$param);
				//debug($data['data'],1);

				$data['inner_banner'] = $this->layput_data['inner_banner'];
				$data['title']= 'Reset Password';
				
				$this->load_view('reset_password' , $data);
			}
			else
			{
				redirect("404");
			}
		}
		else
		{
			parent::notfound();
		}

	}
	

	public function process()
	{
		if(isset($_POST) && array_filled($_POST))
		{
			$pkid = intval($_POST['user']['user_id']);
			$password = $_POST['user']['user_password'];
			
			if(strlen($password) >= 8)
			{
				$model_obj = $this->model_user ;
				
				$data = array();
				$data['user_password'] = md5($password);
				$inserted_id = $model_obj->update_by_pk($pkid , $data);

				$this->model_user->auto_login($pkid, 'front');

				$this->json_param['status'] = true;
				$this->json_param['msg']['title'] = 'Error found';
				$this->json_param['msg']['desc'] = 'Password Reset';
			}
			else
			{
				$this->json_param['status'] = false;
				$this->json_param['msg']['title'] = 'Error found';
				$this->json_param['msg']['desc'] = 'Your password less than 8 character';
			}

			echo json_encode($this->json_param);
		}
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */