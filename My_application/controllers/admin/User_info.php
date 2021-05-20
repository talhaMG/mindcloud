<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_info extends MY_Controller {

	/**
	 * User_info page
	 *
	 * @package		User_info
	 * @author		
	 * @version		1.0
	 * @since		Version 1.0 2014
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "ui_id,ui_user_id,ui_phone";
        $this->dt_params['searchable'] = explode(',' , $this->dt_params['dt_headings']);//array("banner_id","banner_position","banner_status");
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";


		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		//$this->_list_data['banner_page_id'] = $this->model_cms_page->find_all_list(array('where'=>array('cms_page_status'=>1)),"cms_page_name");
		
		$_POST = $this->input->post(NULL, true);


	}

	public function add($id='',$data = array())
	{
		$this->layout_data['additional_tools'][] = "jstree";
		$this->_list_data['banner_position'] = array("slider"=>"slider","right"=>"right","bottom"=>"bottom");
		parent::add($id);
	}


	public function ajax_save()
	{
		$array = array();
		if(array_filled($_POST))
		{
			$post_array = 'user_info';
			$user_data = $_POST[$post_array];

			if( is_array($_FILES[$post_array]['name'])) {
				$user_data = $user_data + $_FILES[$post_array]['name'] ;
			}

			$this->model_user_info->set_attributes($user_data);
			$insertId = $this->model_user_info->save();
			
			$array['status'] = true;
			$array['msg'] = 'record Saved';

		}
		else{
			$array['status'] = false;
			$array['msg'] = 'record couldn\'t Saved';			
		}

		echo json_encode($array);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
