<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Advertisment extends MY_Controller {

	/**
	 * CSL Achievements page
	 *

	 * @package		advertisment
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;

		parent::__construct();
        // $this->dt_params['dt_headings'] = "advertisment_id,advertisment_title,CONCAT(advertisment_image_path,advertisment_image) AS advertisment_image,CONCAT(user_firstname ,' ', user_lastname) AS user_firstname,advertisment_payment_status,advertisment_status";
        
        $this->dt_params['dt_headings'] = "advertisment_id,advertisment_title,advertisment_image,advertisment_user_id,advertisment_payment_status,advertisment_status";

        $this->dt_params['searchable'] = array("advertisment_id","advertisment_status");

        $this->dt_params['action'] = array(
        								"hide_add_button" =>  true ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => TRUE,
                                        "order_field" => false ,
                                        "show_view" =>false,
                                        "extra" => array(
                                            "add_btn" => 
                                            '<a title="Edit" href="'.la('advertisment/details').'/%d/" target="_blank"><button class="btn btn-icon-only green" '.'data-model="model_'.$this->table_name.'" data-pk="'.$itemId.'" '.'>'.'<i class="fa fa-money"></i></button></a>',
                                            ) ,
                                      );
        $this->_list_data['advertisment_status'] = array(
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );

        $this->_list_data['advertisment_approve'] = array(
                                        STATUS_INACTIVE => "<span class=\"label label-default_ads\">Not-Approved</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Approved</span>"
                                    );
        
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        /*$this->_list_data['advertisment_page'] = array(
            'home'=>'Home',
            'wireless'=>'Wireless',
            'accessories'=>'Accessories',
            'about_us'=>'About Us',
            'news_info'=>'News & Info',
            'contact_us'=>'Contact Us',
        );*/

		//$this->_list_data['advertisment_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
        $this->_list_data['advertisment_country'] = $this->model_ads_country->find_all_list_active(array(),"ads_country_name");
		$this->_list_data['advertisment_ucountry'] = $this->model_country->find_all_list_active(array(),"country");


        //$_POST = $this->input->post(NULL, true);  // return POST with xss filter
        $_POST = $this->input->post(NULL, false); // return POST without xss filter
	}

	public function add($id='', $data=array())
	{
        $this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		parent::add($id, $data);
	}

        // Invoice view
    public function details($id=0,$data=array())
    {

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
                                ));



        // debug($id);
        

        $data[ 'ads_id' ] = $id; 

        $vars = array();
        $vars['where']['logo_id'] = 1;
        $data['logo'] = $this->model_logo->find_one_active($vars);

        $ad_param['fields'] = "*";
        $ads_data = $this->model_advertisment->get_ads_request($id,$ad_param);

        // debug($ads_data);
        
        $data['u_id'] = $ads_data['advertisment_user_id'];

        $data['u_firstname']  = $ads_data['advertisment_firstname'];
        $data['u_lastname']  = $ads_data['advertisment_lastname'];
        $data['u_email']  = $ads_data['advertisment_email'];
        $data['u_address']  = $ads_data['advertisment_address'];
        $data['u_phone']  = $ads_data['advertisment_phone'];
        $data['u_uzipcode']  = $ads_data['advertisment_uzipcode'];
        $data['u_ucity']  = $ads_data['advertisment_ucity'];
        $data['u_ucountry']  = $this->model_country->get_country_name($ads_data['advertisment_ucountry']);
        $data['u_ustate']  = $ads_data['advertisment_ustate'];
        $data['u_aboutme']  = $ads_data['advertisment_aboutme'];

        
        $data['ads_title']  = $ads_data['advertisment_title'];
        $data['ads_country']  = $this->model_ads_country->get_country_name($ads_data['advertisment_country']);
        $data['ads_state']  = $ads_data['advertisment_state'];
        $data['ads_city']  = $ads_data['advertisment_city'];
        $data['ads_miles']  = $ads_data['advertisment_miles'];
        $data['ads_desc']  = $ads_data['advertisment_desc'];
        $data['ads_ad_email']  = $ads_data['advertisment_ad_email'];
        $data['ads_image']  = get_image($ads_data['advertisment_image'],$ads_data['advertisment_image_path']);
        $data['ads_url']  = urldecode($ads_data['advertisment_url']);
        $data['ads_date']  =  $ads_data['ads_country_createdon'];

        $data['pkg_title'] = !empty($ads_data['advertisment_package_name']) ? $ads_data['advertisment_package_name'] : 'NONE';
        $data['pkg_id'] = $ads_data['advertisment_package_id'];
        $data['pkg_type'] = $this->model_package->get_expiry_date_by_type($ads_data['advertisment_period_type'],true); 
        $data['pkg_ads_time'] = !empty($ads_data['advertisment_period']) ? $ads_data['advertisment_period'] : 'NONE';
        $data['pkg_price'] = price($ads_data['advertisment_price']);

        $data['pay_status'] = $this->model_advertisment->get_payment_status($ads_data['advertisment_payment_status']);
        $data['pay_date'] = !empty($ads_data['advertisment_paypal_date']) ? csl_date($ads_data['advertisment_paypal_date'],'d F,Y') : ''; 
        $data['pay_type'] = !empty($ads_data['advertisment_payment_type']) ? $ads_data['advertisment_payment_type'] : '';
        $data['pay_msg'] = $ads_data['advertisment_txn_message'];
        $data['pay_txnID'] = $ads_data['advertisment_payment_txn_id'];


        // debug($data , 1);    

        $this->load_view("detail" , $data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
