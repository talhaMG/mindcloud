<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Type extends MY_Controller {

	/**
	 * Perkglobal Achievements page
	 *
	 * @type		type
	 * 
	 * @version		1.0
	 * @since		Version 1.0 2014
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "type_id,type_name,type_status";
        $this->dt_params['searchable'] = array("type_id","type_name","type_status");
        $this->dt_params['action'] = array(
        								"hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        
        $this->_list_data['type_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='',$data = array())
	{

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

