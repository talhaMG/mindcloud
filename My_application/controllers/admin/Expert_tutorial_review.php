<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expert_tutorial_review extends MY_Controller {

    /**
     * Achievements page
     *
     * @package		learning_journey_category
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "tutorial_review_id,tutorial_review_tutorial_id,tutorial_review_desc,tutorial_review_stars,tutorial_review_status";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);

        $this->dt_params['action'] = array(
            "hide_add_button" => false ,
            "hide" => false ,
            "show_delete" => true ,
            "show_edit" => true ,
            "order_field" => false ,
            "show_view" => false ,
            "extra" => array() ,
        );

        $this->_list_data['tutorial_review_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );
        /*$this->_list_data['learning_journey_category_feature'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">No</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Yes</span>"
        );

*/

        // Following are common so, defined in MY_Controller_Admin
        // $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
        // $this->dt_params['paginate']['uri'] = "paginate";
        // $this->dt_params['paginate']['update_status_uri'] = "update_status";

        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];

        $this->_list_data['tutorial_review_tutorial_id'] = $this->model_videos->find_all_list_active(array(),"videos_name");
        // $this->_list_data['learning_journey_category_parent_id'] = $this->model_profession->find_all_list_active(
        //     array('where_string'=>'learning_journey_category_parent_id <= 1')
        //     ,"learning_journey_category_name");
        

        $_POST = $this->input->post(NULL, true);
    }


    public function add($id=0 , $data = array()) {
        
        // debug($_POST,1);
        parent::add($id, $data);

    }

    


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
