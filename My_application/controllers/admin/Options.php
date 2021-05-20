<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Options extends MY_Controller {

	/**
	 * Perkglobal Achievements page
	 *
	 * @options		options
	 * 
	 * @version		1.0
	 * @since		Version 1.0 2014
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "options_id,options_name,options_status";
        $this->dt_params['searchable'] = array("options_id","options_name","options_status");
        $this->dt_params['action'] = array(
        								"hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        
        $this->_list_data['options_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

        
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='',$data = array())
	{
		// Popluated LISTDATA in constructor
		//$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		//$this->register_plugins("jquery-file-upload");
		//$this->form_data['product_brand_id'] = $this->model_brand->find_all_list_active(array(),"brand_name");
		//$this->_list_data['product_category_id'] = $this->model_category->find_all_list_active(array('where'=>arraY('category_parent_id >'=>1)),"category_name");
		//$this->_list_data['product_brand_id'] = $this->model_brand->find_all_list_active(array(),"brand_name");
		parent::add($id , $data);
	}

	
	public function index()
	{
		// $this->_list_data['category_parent_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		parent::index();
	}

	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

