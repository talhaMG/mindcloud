<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobs extends MY_Controller {

    /**
     * Achievements page
     *
     * @package		jobs
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = " 
        jobs_id,
        jobs_name,        
        jobs_user_id,
        jobs_salary,
        jobs_organization,
        jobs_category_id,
        jobs_approval,
        jobs_status";
        
        
        $this->dt_params['searchable'] = array("jobs_id","jobs_name","jobs_organization","jobs_category_id","jobs_approval","jobs_status");
       
        $this->dt_params['action'] = array(
            "hide_add_button" => false ,
            "hide" => false ,
            "show_delete" => true ,
            "show_edit" => true ,
            "order_field" => false ,
            "show_view" => false ,
            "extra" => array() ,
        );

        $this->_list_data['jobs_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">CLOSE</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">OPEN</span>"
        );


        $this->_list_data['jobs_approval'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">NO</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">YES</span>"
        );

                

    
       $this->_list_data['jobs_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");

       $this->_list_data['jobs_skills'] = $this->model_skills->find_all_list_active(array(),"skills_name");
       $this->_list_data['jobs_salaryrange_id'] = $this->model_salaryrange->find_all_list_active(array(),"salaryrange_name");
       $this->_list_data['jobs_country'] = $this->model_country->find_all_list(array(),"country");
       
       // $this->_list_data['jobs_state'] = $this->model_country_state->find_all_list(array(),"cs_name");

       // $this->_list_data['jobs_city'] = $this->model_city->find_all_list(array(),"c_name");
        
        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];

        $_POST = $this->input->post(NULL, true);
    }

    public function add($id='', $data=array())
    {
        // $this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
    if ($_POST['jobs'] > 0) {
        
        $salary = $_POST['jobs']['jobs_salary'];
        
        $rangid = $this->model_salaryrange->get_salarayrange_id($salary);
        
        $_POST['jobs']['jobs_salaryrange_id'] = $rangid;
        $_POST['jobs']['jobs_user_id'] = 1; //as admin user id is 1
        
    }

        parent::add($id, $data);
    }


    public function index()
    {
     
       
        parent::index();
    }

// public function get_list()
// {
//     $id = $this->input->post("search_val"); 
//     $param['fields'] = "c_id,c_name";
//     $param['where']['c_state_id'] = $id ;
//     $data = $this->_list_data['jobs_city'] = $this->model_city->find_all($param);
//     echo json_encode($data);
// }

// public function get_list2()
// {
//     $id = $this->input->post("search_val"); 
//     $param['fields'] = "cs_id,cs_name";
//     $param['where']['cs_country_id'] = $id ;
//     $data = $this->_list_data['jobs_city'] = $this->model_country_state->find_all($param);
//     echo json_encode($data);
// }


    public function get_view($id=0) {

        global $config;
        $result = array();
        $class_name = $this->router->class;
        $model_name = 'model_'.$class_name ;
        $model_obj = $this->$model_name ;

        $form_fields = $model_obj->get_fields();
        if($id)
        {
            
            $data = $this->$model_name->find_by_pk($id,false, $params);

            // print_r($job_data);  
            $par['jobs_status'] = 0;
            $this->$model_name->update_by_pk($id,$par);

            if(isset($data) AND array_filled($data))
            {
            
                $result['record']['id'] = $data['jobs_id'];
                $result['record']['Company Title'] = $data['jobs_organization'];
                $result['record']['Company Email'] = $data['jobs_email'];
                $result['record']['Job Title'] = $data['jobs_name'];
                $result['record']['Job Location'] = $data['jobs_location'];
                $result['record']['Salary'] = $data['jobs_salary'];
                $result['record']['Travelling'] = $data['jobs_travel'];
                $result['record']['Last Date of Application'] = $data['jobs_lastdate'];
                // $result['record']['Inquiry Date'] = $data['jobs_travel'];

                
              if(isset($data['jobs_image']) &&  !empty($data['jobs_image'])){

                $file_download = '<a href="'. g('base_url') . $data['jobs_image_path'] . '/' . $data['jobs_image'] .'" download>'. $data['jobs_image'] . '</a>';
                $result['record']['Image'] = str_ireplace('\r\n', '', urldecode($file_download));
                }

                }
        }
        else
        {
            $result['failure'] = "No Item Found";
        }
        return $result;
    }

}

/* End of file welcome.php */
/* jobs: ./application/controllers/welcome.php */
