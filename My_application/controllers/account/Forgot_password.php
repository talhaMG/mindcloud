<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends MY_Controller {

	/**
	 * Forgot_password Controller. - The deafult controller
	 *
	 * @package		Forgot_password - Default
	 * @author		Dalton Lambert (dalton.developer@gmail.com)
	 * @version		2.0
	 * @since		20 April, 2017
	 */

	protected $form_error_msg;
	 
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
        
        $this->view_pre = 'account/';
    }

    public function index()
    {
    	$user = $this->input->post('forgot_password');
		
		$data['inner_banner'] = $this->layput_data['inner_banner'];
		$data['title']= 'Account Area';
		
		// when field is empty
		if(empty($user['user_email']) && strlen($user['user_email']) <= 0) {
			$this->json_param['status'] = false;
			$this->json_param['msg']['title'] = 'Error Occured';
			$this->json_param['msg']['desc'] = 'Please insert email ID.';
		}
		else {
			$this->form_validation->set_rules('forgot_password[user_email]', 'Email', 'trim|required|valid_email|xss_clean');

			// when email field is incorrect
			if ($this->form_validation->run() == FALSE) {
				$this->json_param['status'] = false;
				$this->json_param['msg']['title'] = 'Error Occured';
				$this->json_param['msg']['desc'] = strip_tags(validation_errors());
			}
			else {
				$email = htmlentities(trim($user['user_email']));
				$param = array();
				$param['where']['user_email'] = $email;
				$param['where']['user_status'] = 1;
				$param['where']['user_is_admin'] = 0;
				//$param['where_string'] = 'user_type > 0';
    			
				$data = $this->model_user->find_one_active($param);
				
				// Factory Data
				if(isset($data) && array_filled($data)) {
					$this->model_email->reset_password($data);

					$this->json_param['status'] = true;
					$this->json_param['msg']['title'] = '';
					$this->json_param['msg']['desc'] = "Email sent in your account please open your inbox.";
				}
				else
				{
					$this->json_param['status'] = false;
					$this->json_param['msg']['title'] = 'Error Occured';
					$this->json_param['msg']['desc'] = "Can't find your email in database please try again.";
				}
			}
		}
		echo json_encode($this->json_param);
    }



	public function process()
	{
		global $config;
		if(isset($_POST) && is_array($_POST) && count($_POST))
		{
			$user = $this->input->post('forgot_password');

			// when field is empty
			if(empty($user['user_email']) && strlen($user['user_email']) <= 0) {
				$this->json_param['status'] = false;
				$this->json_param['msg']['title'] = 'Error Occured';
				$this->json_param['msg']['desc'] = 'Please insert email ID.';
			}
			else {
				$this->form_validation->set_rules('forgot_password[user_email]', 'Email', 'trim|required|valid_email|xss_clean');

				// when email field is incorrect
				if ($this->form_validation->run() == FALSE) {
					$this->json_param['status'] = false;
					$this->json_param['msg']['title'] = 'Error Occured';
					$this->json_param['msg']['desc'] = strip_tags(validation_errors());
				}
				else {
					$email = htmlentities(trim($user['user_email']));
					$param = array();
					$param['where']['user_email'] = $email;
					$param['where']['user_is_admin'] = 0;
					$data = $this->model_user->find_one_active($param);

					if(isset($data) && array_filled($data)) {

						//**GENERATE TOKEN START**/
						$token = array();
						$token['ut_user_id'] = $data['user_id'];
						$token['ut_token'] = $this->model_user_token->set_token();
						$token['ut_type'] = $this->model_user_token->get_forgot_password_token_type();
						
						$this->model_user_token->set_attributes($token);
						$inserted_id = $this->model_user_token->save();
						//**GENERATE TOKEN END**/
						
						$this->model_email->reset_password($data,$token);

						$this->json_param['status'] = true;
						$this->json_param['msg']['title'] = '';
						$this->json_param['msg']['desc'] = 'Email sent, Please check your inbox.';	
						$this->json_param['redirect']['status'] = false;
					}
					else {
						$this->json_param['status'] = false;
						$this->json_param['msg']['title'] = 'Error Occured';
						$this->json_param['msg']['desc'] = "Can't find your email in database please try again." ;
					}
				}
			}
		}
		else {
			$this->json_param['status'] = false;
			$this->json_param['msg']['title'] = 'Error Found';
			$this->json_param['msg']['desc'] = 'Error Found';
		}
		echo json_encode($this->json_param);

	}
	

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */