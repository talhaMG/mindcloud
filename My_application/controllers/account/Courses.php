<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Account.php");

class Courses extends MY_Controller_Account {

    /**
     * Achievements page
     *
     * @package		category
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();

        $this->class_name = $this->router->fetch_class();
        // $this->view_pre = 'account_area_theme/'.$this->class_name.'/';

        // $this->_list_data['a_category_id'] = $this->model_category->find_all_list_active(
        //     array('where_string'=>'category_parent_id <= 1')
        //     ,"category_name");
        
    }


                // Listing/Data table page
    public function index() 
    {
            global $config;

            $data['inner_banner'] = $this->layput_data['inner_banner'];
            $data['title']= 'Courses';

            $this->register_plugins(array("datatables-front"));

            $data['headings'] = array(
                "S.N.O",
                "Thumbnail",
                "Title",
                "Total Lectures",
                "Course ID",
                "Hourse",
                // "Status",
                "View Lectures",
                "Take Quiz",
                "Actions",
            );

    $course = $this->model_tutorial->user_enrollcourses($this->userid);
    $data['course'] = $course;
        // debug($course);

            // $data['request'] = $this->model_service_request->get_by_user_id($this->userid);

            $this->load_view("courses/index",$data);
    }


    public function ajax_getlectures() 
    {
        $id = $this->input->post('id');

        $param = array();
        $param['where']['lecture_course_id'] = $id;
        $lecture = $this->model_lecture->find_all_active($param);

        $data['lecture'] = $lecture;
        $data['codeid'] = $id;

        // debug();
        echo json_encode(array("data"=>$this->load->view('account/account_area_theme/courses/lecture_list', $data, true))
                        );
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
