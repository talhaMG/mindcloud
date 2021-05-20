<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		global $config;
		//Set template configurations before calling load_template
		//Visit MY_Controller for details
		$this->layout_data['page_title'] = "Dashboard";
		$this->layout_data['page_title_min'] = "Dashboard";
		$this->layout_data['bread_crumbs'] = array(array("home/"=>"Home"));
		$this->layout_data['additional_tools'] = array(						
														"jquery-ui",
														"bootstrap",
														"bootstrap-hover-dropdown",
														"jquery-slimscroll",
														"boots",
														"font-awesome",
														"simple-line-icons" ,
													);

		$this->add_script("pages/tasks.css");
		$this->add_script(array("tasks.js" , "index.js") , "js");
		



		$data[ 'category' ] = $this->model_category->find_count_active();
		$data[ 'inquiries' ] = $this->model_inquiry->find_count_active();
		
		$data['config'] = $this->config->config;
		$this->load_view("dashboard",$data);
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */