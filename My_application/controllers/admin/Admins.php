<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admins extends MY_Controller {

	/**
	 * Admins admin
	 *
	 * @package		Admins control from user table and user info table
	 * @author		devemail0909@gmail.com devemail0909@gmail.com
	 * @version		2.0 -- Robust , Advanced And More Frustating...
	 * @since		Version 2.0 2017
	 */

    public $_list_data = array();

    public $table_name = 'user';
    private $this_class_name;

	public function __construct() {

		global $config;
		parent::__construct();
		$this->this_class_name = $this->router->fetch_class('');
		
        $this->dt_params['dt_headings'] = "user_id,user_firstname,user_lastname,user_email,user_status";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => false ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array(
											"add_btn" => '<a title="Edit" href="'.la($this->this_class_name).'/add/%d/"'.
															' target="_blank"><button class="btn btn-icon-only yellow" '.
															'data-model="model_'.$this->table_name.'" data-pk="'.$itemId.'" '.'>'.
															'<i class="fa fa-edit"></i></button></a>',
                                        	) ,
                                      );


        
        $this->_list_data['user_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

     

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		//$this->_list_data['user_country'] = $this->model_country->find_all_list_active(array(),"country");


		$_POST = $this->input->post(NULL, true);

		$config['js_config']['paginate']['uri'] .= '?is_admin=1';
	}

	// @Overwrite Method
	public function set_class_name()
	{
		return $this->table_name;
	}


	// BeforeRender Hook to manipulate Overrides... for INdex Method
	public function before_index_render(&$data=array())
	{
		$data['page_title'] = 'Administrator';

		$data['this_class_name'] = $this->this_class_name;

		$this->layout_data['bread_crumbs'] = array(
												array(
													"home/"=>"Home" , 
													'advisor' => 'Administrator',
												)
											);

		// To access from Child Class
		return true;
	}


	// // BeforeRender Hook to manipulate Overrides... for Add Method
	public function before_add_render(&$data)
	{
		$data['page_title'] = 'Administrator';

		$data['this_class_name'] = $this->this_class_name;

		$this->layout_data['bread_crumbs'] = array(
												array(
													"home/"=>"Home" , 
													'admins' => 'Administrator',
													"admins/add/" => "Add Administrator",
												)
											);


		// To access from Child Class
		return true;
	}


	public function add($id='', $data=array())
	{
		// Popluated LISTDATA in constructor
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		$this->register_plugins("bootstrap-fileupload");

		
		$this->form_params = array(
				"action" => array(
					"hide_cancel" => true ,
				),
			);


		if(array_filled($_POST))
		{
			$_POST['user']['user_type'] = 0;
			$_POST['user']['user_is_admin'] = 1;
			$_POST['user']['user_subscription'] = 0;
			$_POST['user']['user_email_verified_status'] = 0;

			if($id)
			{
				$old_password = $this->model_user->find_by_pk($id);
				if($_POST['user']['user_password'] == $old_password['user_password'])
					$_POST['user']['user_password'] = $old_password['user_password'];
				else
					$_POST['user']['user_password'] = $this->model_user->_encrypt_password(($_POST['user']['user_password']));
				
			}
			else
			{
				$_POST['user']['user_password'] = $this->model_user->_encrypt_password(($_POST['user']['user_password']));
			}
		}

		parent::add($id);
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
