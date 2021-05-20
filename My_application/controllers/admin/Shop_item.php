<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Shop_item extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		banner
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "item_id,item_order_id,item_product_id,item_product_name,item_qty,item_rate,item_type";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);
        // $this->form_params['action'] = array(
        //     'hide_save' => true,
        //     'hide_save_new' => true
        // );
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['banner_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        // $this->_list_data['banner_page'] = array(
        //     'home'=>'Home',
        //     'about-us'=>'About Us',
        //     'contact-us'=>'Contact Us',
        //     'blog'=>'Blog',
        //     );

		//$this->_list_data['banner_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		$this->_list_data['item_product_id'] = $this->model_tutorial->find_all_list_active(array(),"tutorial_name");

		$_POST = $this->input->post(NULL, true);
	}

   

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
