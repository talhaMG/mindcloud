<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends MY_Controller {

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
         $b = $this->get_ibanner(3);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];
        

    if (isset($_GET['certificate-number']) &&  $_GET['certificate-id'] == md5($_GET['certificate-number'])){

        $param['where']['quiz_certificate_number'] = $_GET['certificate-number'];
        $quiz = $this->model_quiz->find_one($param);
        $course = $this->model_tutorial->find_by_pk($quiz['quiz_course_id']);
        $user_data = $this->model_user->find_by_pk($quiz['quiz_user_id']);

               //CERTIFICATE VARIABLES
      $data['completion_date'] = csl_date($quiz['quiz_createdon'],'d-m-Y');
      $data['certificate_number']  = $quiz['quiz_certificate_number'];
      $data['course_title'] = $course['tutorial_name'];
      $data['course_tracking_number'] = $course['tutorial_identity'];
      $data['username'] = $user_data['user_firstname'].' '.$user_data['user_lastname'];
      $data['ce_provider'] = g('db.admin.CE_provider');

        }
		$this->load_view("index",$data);
	}

    public function validate_certificate()
    {
        if (isset($_POST)) {
        $certificatenumber = $_POST['certificate_number'];
        
        $param['where']['quiz_certificate_number'] = $certificatenumber;
        $data = $this->model_quiz->find_one($param);

        
        if (count($data) > 0) {
        $json_param['status'] = true;
        $json_param['msg'] = "Certificate Number is valid";    
        $json_param['url'] = l('verify').'?certificate-number='.$certificatenumber.'&certificate-id='.md5($certificatenumber);

        }else{
            $json_param['status'] = false;   
        $json_param['msg'] = "Certificate Number is not valid";
        }
        }else{
        $json_param['status'] = false;   
        $json_param['msg'] = "Error Occured";
        }
         echo json_encode($json_param);

    }



}
