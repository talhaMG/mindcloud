<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends MY_Controller {

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
        $this->dt_params['dt_headings'] = "a_id,a_user_id,a_category_id,a_name,a_image,a_status";
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

        $this->_list_data['a_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );



        // Following are common so, defined in MY_Controller_Admin
        // $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
        // $this->dt_params['paginate']['uri'] = "paginate";
        // $this->dt_params['paginate']['update_status_uri'] = "update_status";

        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];

        $this->_list_data['a_user_id'] = $this->model_user->find_user_list();

        $this->_list_data['a_category_id'] = $this->model_category->find_all_list_active(
            array('where_string'=>'category_parent_id <= 1')
            ,"category_name");
        

        $_POST = $this->input->post(NULL, true);

        $config['js_config']['paginate']['uri'] .= '?type_id='.ARTICLE;
    }


    public function add($id=0 , $data = array()) {

        if(isset($_POST) AND array_filled($_POST)) {
            $_POST['article']['a_type_id'] = ARTICLE;
            if(!isset($_POST['article']['a_id'])){
                $_POST['article']['a_createdon'] = date("Y-m-d h:m:s");
            }
        }

        parent::add($id, $data);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
