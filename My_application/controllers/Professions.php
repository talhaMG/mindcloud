<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professions extends MY_Controller {

	/**
	 * Default Controller
	 */

	public function __construct()
    {
    	// Call the Model constructor latest_product
    	// $this->cms_page_id = 24;
        parent::__construct();
        // $this->view_pre = "cms/";


        //$this->plugin_seo();
    }

    // Default Home Page
	public function index()
	{
        global $config;
        $data = array();
        //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        // //INNER BANNER
        //  $b = $this->get_ibanner(6);
        //  $data['ititle'] = $b['ititle'];
        //  $data['ibanner_img'] = $b['ibanner_img'];
            
		$this->load_view("index",$data);
	}

     public function detail($slug =' ')
    {
        global $config;
      
      //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;
        
        $this->load_view("detail", $data);
    }
}
