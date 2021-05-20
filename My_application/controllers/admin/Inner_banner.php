<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inner_banner extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		inner_banner
	 * 
	 * @version		1.0
	 * @since		Version 1.0 2014
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
		$this->form_params['action'] = array(
        	'hide_save' => false,
        	'hide_save_new' => true
    	);
        $this->dt_params['dt_headings'] = "inner_banner_id, inner_banner_title,  
       inner_banner_image_path, inner_banner_image, inner_banner_status";

        $this->dt_params['searchable'] = array("inner_banner_id","inner_banner_desc","inner_banner_status");
         
        $this->dt_params['action'] = array(
        								"hide_add_button" => false,
                                        "hide" => false ,
                                        "show_delete" => false ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['inner_banner_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

        $this->_list_data['inner_banner_page'] = array(
														"about-us"=>"About Us",
														"contact-us"=>"Contact Us", 
												        "consignment"=>"Consignments",
												        "our-collections"=>"Our Collections",	
												        "return-policy"=>"Return policy",
												        "links"=>"Links",
												        // "Checkout"=>"Checkout",												       
												        // "Account"=>"Account"
												        );   

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		//$this->_list_data['inner_banner_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['inner_banner_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='',$data='')
	{
		parent::add($id);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
