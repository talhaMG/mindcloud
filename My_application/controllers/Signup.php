<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	/**
	 * Signup Controller
	 *
	 * @package		Signup Controller
	 * @author		Dalton Lambert (dalton.developer@gmail.com)
	 * @version		2.0
	 * @since		17 Nov, 2017
	 */

	private $json_param = array();


	public function __construct()
 {
 	// Call the Model constructor latest_product
 parent::__construct();
 }

	public function index()
	{
		global $config;



		if(count($_POST) > 0){

 	 // $this->form_validation->set_rules('g-recaptcha-response','Captcha','required');
	
			if($this->validate("model_user"))
			{
		/*debug($_POST,1);
		die();*/
			//   $captcha =$_POST['g-recaptcha-response'];
			//     $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".GOOGLE_CAPTCHA_SECRET_KEY."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
	
			// if ($response['success'] == false) {
	
			// 		$this->json_param['status'] = false;
			// 		$this->json_param['msg']['title'] = 'Error';
			// 		$this->json_param['msg']['desc'] = 'Robot verification failed, please try again';
			// 		$this->json_param['redirect']['status'] = false;

			// }else{

			// }

				// DOB variable
				// $days = sprintf("%02d", $_POST['days']);
				// $month = sprintf("%02d", $_POST['month']);

				// $_POST['user_info']['ui_dob']= $_POST['year'].'-'.$month.'-'.$days;
				
				//USER INFORMATION //SAVE INFORMATION TABLE
					// if (!isset($_POST['user_info'])) {
					// 	$user_info_post = $this->input->post('ui');
					
					// $year = $user_info_post['year'];
					// $month = $user_info_post['month'];
					// $days = $user_info_post['date'];

					// $user_info['ui_gender'] = $user_info_post['gender'];
					// $user_info['ui_dob'] = $year.'-'.$month.'-'.$days;

					// //OVER WRITING poST DATA
					// $_POST['user_info'] = $user_info;
					
					// 	}
					

				$user_data = $_POST['user'];
				$user_param = $user_data;
				$user_param['user_status'] = 1;
				$user_param['user_type'] = (isset($_POST['user']['user_type']) ? $_POST['user']['user_type'] : 0);
				$user_param['user_term_agreed'] = (isset($_POST['user']['user_term_agreed']) ? 1:0);
				$user_param['user_password'] = $this->model_user->_encrypt_password($user_data['user_password']);
				$this->model_user->set_attributes($user_param);
				$user_id = $this->model_user->save();

				//USER INFORMATION //SAVE INFORMATION TABLE
					// $user_info_post = $this->input->post('ui');
					
					// $year = $user_info_post['year'];
					// $month = $user_info_post['month'];
					// $days = $user_info_post['date'];

					// $user_info['ui_gender'] = $user_info_post['gender'];
					// $user_info['ui_dob'] = $year.'-'.$month.'-'.$days;
					// $user_info['ui_user_id'] = $user_id;
					// $this->model_user_info->set_attributes($user_info);
				 // $user_info_id = $this->model_user_info->save();

				if($user_id > 0)
				{
					if(ENVIRONMENT != 'development')
					{
						// sent email to user for info and email verification
						$this->model_email->notification_register($user_id , 'user');

						// sent email to admin for one user added
						$this->model_email->notification_register($user_id , 'admin');
					}


					$msg = "You have been successfully registered and logged in.";//, please fill the more information".g('site_title');
					// $msg = "Verification Link is sent to registerd email address.";//, please fill the more information".g('site_title');
					

					if(isset($_POST['url']) AND (!empty($_POST['url'])))
					{
						// $url = $_POST['url']."?msgtype=success&msg=".$msg;
						$url = $_POST['url'];
					}
					else
					{
						$url = l('account/dashboard')."?msgtype=success&msg=".$msg;
						// $url = l('account-area');
					}

					//	SESSION DATA START
					$this->model_user->auto_login($user_id , 'front');  
					//	SESSION DATA END


					$this->json_param['status'] = true;
					$this->json_param['msg']['title'] = 'Success';
					$this->json_param['msg']['desc'] = $msg;

					$this->json_param['redirect']['status'] = true;
					$this->json_param['redirect']['link'] = $url;
				}
				else
				{
					$this->json_param['status'] = false;
					$this->json_param['msg']['title'] = 'Error Occurred';
					$this->json_param['msg']['desc'] = 'Some Error found please try again';
					$this->json_param['redirect']['status'] = false;
				}



			}
			else
			{
				$this->json_param['status'] = false;
				$this->json_param['msg']['title'] = 'Error Occurred';
				$this->json_param['msg']['desc'] = validation_errors();
				$this->json_param['redirect']['status'] = false;
			}



		}

		echo json_encode($this->json_param);


	}

	/**
		Email Authentication Function
	*/
	public function authentication($id)
	{
		$token_number = md5("REG-".$id."GEF");
	 
		if($token_number == $_GET['token'])
		{
			$user_id = $id;

			$update = $this->model_user->update_by_pk($user_id , array('user_email_verified_status'=>1));
			
			if($update > 0)
			{
				$this->model_user->auto_login($user_id,'front');
				
				$msg = "Your email account has been verified, and now you are good to go.";
				redirect(l('?msgtype=success&msg='.urlencode($msg)));
			}
			else{
				redirect(l('home/notfound'));
			}
		}
		else {
			redirect(l('home/notfound'));
		}
	}


}