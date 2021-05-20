<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirements extends MY_Controller {

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

        //INNER BANNER
         // $b = $this->get_ibanner(6);
         // $data['ititle'] = $b['ititle'];
         // $data['ibanner_img'] = $b['ibanner_img'];
           //INNER BANNER
         // $b = $this->get_ibanner(4);
         // $data['ititle'] = $b['ititle'];
         // $data['ibanner_img'] = $b['ibanner_img'];
            $data['profession']= $this->model_profession->find_all_active();
            $data['states'] = $this->model_states->find_all_active();            
            

                $param = array();
                $param['fields'] = "requirements.*,profession_name,states_name";
                $param['joins'][] = array(
                            "table"=>"profession", 
                            "joint"=>"profession.profession_id = requirements.requirements_profession_id"
                                        );
                $param['joins'][] = array(
                            "table"=>"states", 
                            "joint"=>"states.states_id = requirements.requirements_state_id"
                                        );
            if (isset($_GET) && array_filled($_GET)) {
                $state = trim(htmlentities($_GET['states']));
                $profession = trim(htmlentities($_GET['profession']));

                $param['where']['requirements_state_id'] = $state;
                $param['where']['requirements_profession_id'] = $profession;
            }
            $data['require'] = $this->model_requirements->find_one_active($param);
            
              $data['search_state'] = $state;
            $data['search_profession'] = $profession;
            

		$this->load_view("index",$data);
	}

}
