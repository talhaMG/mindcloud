<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends MY_Controller {

    /**
     * Achievements page
     *
     * @package		location
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "location_id,location_store_id,location_status";
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

        $this->_list_data['location_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );






        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];

        // $this->_list_data['location_parent_id'] = $this->model_location->find_all_list_active(
        //     array('where_string'=>'location_parent_id <= 1')
        //     ,"location_name");

        $this->_list_data['location_store_id'] = $this->model_store->find_all_list_active(
            array(),"store_name");

        $this->_list_data['location_country'] = $this->model_country->find_all_list_active(
            array(),"country");

         // $this->_list_data['location_state'] = $this->model_country_state->find_all_list_active(
         //    array(),"cs_name");

         //    $this->_list_data['location_city'] = $this->model_city->find_all_list_active(
         //    array(),"cs_name");

        
        

        $_POST = $this->input->post(NULL, true);
    }


    public function add($id=0 , $data = array()) {
        
        // debug($_POST,1);
        parent::add($id, $data);

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
