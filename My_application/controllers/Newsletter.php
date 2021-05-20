<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends MY_Controller {

	/**
	 * Newsletter Controller. 
	 *
	 * @package		Newsletter
	 * @author		
	 * @version		2.0
	 * @since		08 Dec, 2016
	 */

	 
	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{ 
		global $config;
		if($_POST) 
		{
			if($this->validate("model_newsletter"))
			{
				$param_arr['where']['newsletter_email'] =  $_POST['newsletter']['newsletter_email'];
				$validate = $this->model_newsletter->find_one($param_arr);
				if(!empty($validate))
				{
					$this->json_param['status'] = 0;
					$this->json_param['txt'] = 'You are already subscribed to newsletter with entered email.';
					echo json_encode($this->json_param);
				}
				else
				{
					$newsletter_data = $_POST['newsletter'];
					$newsletter_data['newsletter_status'] = 1;
					$this->model_newsletter->set_attributes($newsletter_data);
					$inserted_id = $this->model_newsletter->save();

					// Newsletter Email
					$this->model_email->subscribe_newsletter($inserted_id);

					$this->json_param['status'] = 1;
					$this->json_param['txt'] = "Congratulations! You have successfully subscribed.";
					echo json_encode($this->json_param);
				}	
			}
			else
			{
				$this->json_param['status'] = 0;
				$this->json_param['txt'] = "Invalid Email Address";
				echo json_encode($this->json_param);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */