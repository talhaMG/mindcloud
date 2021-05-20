<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Business_tool_fm_beps extends MY_Controller {

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
        $this->dt_params['dt_headings'] = "tool_builder_id,tool_builder_user_id,tool_builder_currency,tool_builder_price_per_unit,cash,tool_builder_approval_status,tool_builder_status";
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
        
        $tool_builder = $_POST['tool_builder'];
        
        if ($tool_builder['tool_builder_approval_status'] == 1) {
            $this->model_email->contactInquiry2($tool_builder['tool_builder_user_id']);
         

           //debug($this->model_email,1);

        }
            
        parent::add($id,$data);
    }

  
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
