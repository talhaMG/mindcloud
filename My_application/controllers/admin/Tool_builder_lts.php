<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tool_builder_lts extends MY_Controller {

    /**
     * profile page
     *
     * @package
     *
     * @version     1.0 --
     * @since       Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;
        
        parent::__construct();
        $this->dt_params['dt_headings'] = "tool_builder_lts_id,tool_builder_lts_user_id,tool_builder_lts_identify_parties,tool_builder_lts_jv_comp_obligations,tool_builder_lts_approval_status,tool_builder_lts_status";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);
        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                         "hide_add_button" => true ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['profile_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

        // Following are common so, defined in MY_Controller_Admin
        // $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
        // $this->dt_params['paginate']['uri'] = "paginate";
        // $this->dt_params['paginate']['update_status_uri'] = "update_status";

        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];


        

        // Populating LISTDATA

        $_POST = $this->input->post(NULL, true);
  

               //  $this->model_email->contactInquiry2($this->userid);
                 //debug($this->model_email);

    }


    // tool_builder
    public function add($id='', $data=array())
    {  
        
        $tool_builder_lts = $_POST['tool_builder_lts'];
        
        if ($tool_builder_lts['tool_builder_lts_approval_status'] == 1) {
            $this->model_email->contactInquiry2($tool_builder_lts['tool_builder_lts_user_id']);
         

           //debug($this->model_email,1);

        }
            
        parent::add($id,$data);
    }

  
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
