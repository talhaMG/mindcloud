<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends MY_Controller {

	/**
	 * Default Controller
	 */

	public function __construct()
    {
    	// Call the Model constructor latest_product
    	$this->cms_page_id = 4;
        parent::__construct();
        $this->view_pre = "account/html_theme/";

        
        // $this->plugin_seo();

        //$this->add_script(array("account.css"));
        $this->layput_data['inner_banner'] = '';//$this->model_inner_banner->find_by_pk_active(7);
    }

    // Default Signup Page
    public function index()
    {
        //$this->register_plugins(array("fancybox"));

        global $config;
        $data = array();

        //logged in check 
        if ($this->userid > 0) {
            $url = l('account-area');
            redirect($url);
        }

        //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        // //INNER BANNER
         $b = $this->get_ibanner(11);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];
         
         //CONTENT
         $data['cms_data'] = $this->model_cms_page->get_page(19);
        $data['cont0'] =  $data['cms_data']['child'][0];
        $data['cont1'] =  $data['cms_data']['child'][1];
        $data['cont2'] =  $data['cms_data']['child'][2];
        $data['cont3'] =  $data['cms_data']['child'][3];
        $data['cont4'] =  $data['cms_data']['child'][4];

       //BANNER
         $b = $this->get_banner(4);
         $data['bcontent'] = $b['bcontent'];
         $data['bimage'] = $b['bimage'];
            

        $data['title'] = "Registration";

        $this->load_view("signup",$data);
    }


    // Default Signup Page
    public function contributor_signup()
    {
        //$this->register_plugins(array("fancybox"));

    if ($this->userid > 0) {
        redirect(l('dashboard'));   
        }
        global $config;
        $data = array();

        // $data['cms_data'] = $this->model_cms_page->get_page(20);
        // //debug($data['cms_data'],1);
        //$data['inner_banner'] = $this->layput_data['inner_banner'];
        $data['title'] = "Signup as a Contributor";

        $this->load_view("contributor_signup",$data);
    }

    // Default Home Page
    public function login()
    {
        //$this->register_plugins(array("fancybox"));
        if ($this->userid > 0) {
        redirect(l('dashboard'));   
        }
        global $config;
        $data = array();

        $data['inner_banner'] = $this->layput_data['inner_banner'];
        $data['title'] = "Login";

           //INNER BANNER
         // $b = $this->get_ibanner(10);
         // $data['ititle'] = $b['ititle'];
         // $data['ibanner_img'] = $b['ibanner_img'];

               //BANNER
         // $b = $this->get_banner(11);
         // $data['bcontent'] = $b['bcontent'];
         // $data['bimage'] = $b['bimage'];
                
                 //CONTENT
         $data['cms_data'] = $this->model_cms_page->get_page(35);
        $data['cont0'] =  $data['cms_data']['child'][0];
        $data['cont1'] =  $data['cms_data']['child'][1];
        $data['cont2'] =  $data['cms_data']['child'][2];
        $data['cont3'] =  $data['cms_data']['child'][3];
        
     
        $this->load_view("login",$data);
    }


    // forgot_password Page
    public function forgot_password()
    {
        //$this->register_plugins(array("fancybox"));

        global $config;
        $data = array();

        $data['title'] = "Forgot Password";
        
              //BANNER
         $b = $this->get_banner(12);
         $data['bcontent'] = $b['bcontent'];
         $data['bimage'] = $b['bimage'];

        $this->load_view("forgot_password",$data);
    }



}