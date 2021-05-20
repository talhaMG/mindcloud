<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller {

	/**
	 * Default Controller
	 */

	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
       
    }

    // Default Home Page
    public function index($id=0)
    {
        global $config;
        if(intval($id) > 0)
        {
            $this->register_plugins(array("fancybox"));

            $data = array();

            $cms_data = $this->model_cms_page->find_by_pk($id);
            if(isset($cms_data) AND array_filled($cms_data))
            {
                $data['cms_data'] = $cms_data;
                $data['title'] = $data['cms_data']['cms_page_title'];

                $this->cms_page_id = $cms_data['cms_page_page'];
                //$this->plugin_seo();


                $this->load_view("index",$data);
            }
        }
    }




}
