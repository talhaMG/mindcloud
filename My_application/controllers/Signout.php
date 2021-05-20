<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Signout extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		// Offline User status
		//$this->model_user->user_offline_status($this->session->userdata['logged_in_front']['id']);

		$this->session->unset_userdata('logged_in_front');
		//$this->session->sess_destroy();
		redirect(l(''));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
