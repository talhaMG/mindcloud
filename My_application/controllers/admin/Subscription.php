<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Subscription extends MY_Controller {

	/**
	 * user admin
	 *
	 * @package		User
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "
        subscription_id,
        subscription_email,
        subscription_firstname,
        subscription_lastname,
        subscription_phone,
        subscription_payment_status,
        subscription_status,
        subscription_createdon";

        $this->dt_params['searchable'] = array("subscription_id","subscription_firstname","subscription_email","subscription_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => true ,
                                        "hide" => false ,
                                        "show_delete" => false ,
                                        "show_edit" => false ,
                                        "subscription_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array(
                                        	'<a title="View Details" href="'.$config['admin_base_url'].'subscription/detail/%d/" class="btn-xs btn btn-primary subscription_details_btn"><i class="icon-picture"></i></a>',
                                        	
                                		) ,
                                      );
        
        $this->_list_data['user_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='', $data=array())
	{
		// Popluated LISTDATA in constructor
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		parent::add($id);
	}

	        // BeforeRender Hook to manipulate Overrides... for Add Method
    // public function before_add_render(&$data)
    // {
    //     $this->layout_data['bread_crumbs'] = array(
    //                     array(
    //                         "home/"=>"Home" , 
    //                         $class_name => humanize('Offer'),
    //                         $class_name."/add/" => "Add ".humanize('Offer'),
    //                     )
    //                 );
    //     // To access from Child Class
    //     return true;
    // }

        // BeforeRender Hook to manipulate Overrides... for INdex Method
    // public function before_index_render(&$data)
    // {
    //     $this->layout_data['bread_crumbs'] = array(
    //                                             array(
    //                                                 "home/"=>"Home" , 
    //                                                 $class_name => humanize('Offer')
    //                                             )
    //                                         );
        
    //     // To access from Child Class
    //     return true;
    // }

	public function detail($subscription_id='')
	{   
		/** check rights before deletion **/
		$class_name = $this->router->class;
		$page_name = $class_name."_edit";
		// $this->admin_rights->check_admin_rights($page_name);
		
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );

		$this->layout_data['template_config']['show_toolbar'] = false ;
		$this->register_plugins(array(						
									"jquery-ui",
									"bootstrap",
									"bootstrap-hover-dropdown",
									"jquery-slimscroll",
									"uniform",
									"boots",
									"font-awesome",
									"simple-line-icons" ,
									"select2",
									"bootbox",
									"bootstrap-toastr",
									"bootstrap-datetimepicker"
								));


		
		$data[ 'subscription_detail' ] = $this->model_subscription->get_subscription_detail($subscription_id);
		$data[ 'data' ] =$this->model_subscription->get_subscription_detail($subscription_id);
			
		//subscription details
	
		$data['country'] = $this->model_country->find_by_pk($data[ 'subscription_detail' ]['subscription_country']);
		
		if(!array_filled($data[ 'subscription_detail' ]))
			not_found("Invalid subscription ID");

		$total_quantity = 0;
		$total_amount = 0;
		// $item_data = $this->model_subscription_item->get_subscription_items($subscription_id);
	
		$vars['where']['logo_id'] = 1;
		$data['logo'] = $this->model_logo->find_one_active($vars);


		//amount info
	     $discount = !empty($data[ 'subscription_detail' ]['subscription_discount']) ? $data[ 'subscription_detail' ]['subscription_discount'] : 0;
		$data['total_amount'] = $data['subscription_detail']['subscription_amount'];
		//amount info ends
 
		//user info
		$data['user_name'] = ucfirst($data['subscription_detail']['subscription_firstname']);
		$data['user_lastname'] = ucfirst($data['subscription_detail']['subscription_lastname']);
		$data['user_email'] = $data['subscription_detail']['subscription_email'];
		$data['user_phone'] = $data['subscription_detail']['subscription_phone'];
		$data['user_city'] = $data['subscription_detail']['subscription_city'];
		$data['user_country'] = $data['subscription_detail']['subscription_country'];
		$data['user_type'] = ($data['subscription_detail']['subscription_user_id'] > 0) ? 'Registered User' : 'Guest User';
		$data['user_id']  = ($data['subscription_detail']['subscription_user_id'] > 0) ? $data['subscription_detail']['subscription_user_id'] : 0;


		$data[ 'subscription_items' ] = $item_data;
		$data[ 'page_title_min' ] = "Detail";
		$data[ 'page_title' ] = "subscription";
		$data[ 'class_name' ] = "subscription";
		$data[ 'model_name' ] = "model_subscription";
		$data[ 'model_obj' ] = $this->model_subscription;
		$data[ 'dt_params' ] = $this->dt_params ;
		$data[ 'id' ] = $subscription_id; 

		$this->load_view("invoice" , $data);
	}

	public function index()
	{
		// Popluated LISTDATA in constructor
		parent::index();
	}
	
	public function get_view($id=0) {

		global $config;
		$result = array();
		$class_name = $this->router->class;
		$model_name = 'model_'.$class_name ;
		$model_obj = $this->$model_name ;
		$form_fields = $model_obj->get_fields();
		if($id)
		{
			$result['record'] = $this->$model_name->find_by_pk($id);
			$result['record'] = $this->$model_name->prepare_view_data($result['record']);
			if(!$result['record'] )
				$result['failure'] = "No Item Found";
				// Load relation fields data
			$relation_data = $this->$model_name->get_relation_data($id);
			if(array_filled($relation_data))
				$result['record']['relation_data'] = $relation_data;
		}
		else
		{
			$result['failure'] = "No Item Found";
		}
	
		return $result;

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
