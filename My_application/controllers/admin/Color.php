<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Color extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		color
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "color_id,color_name,color_slug,color_status";
        $this->dt_params['searchable'] = array("color_id","color_name","color_status");
        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );

          $this->_list_data['color_status'] = array(
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='',$data=array())
	{
		parent::add($id);
	}

	// public function add_color()
	// {
	// 	if(count($_POST) > 0)
 //        {
 //            $color_id = $_POST['color'];
 //            $image_id = $_POST['id'];
 //            $data['pi_color_id'] = $color_id;

 //    	$res = $this->model_product_image->update_by_pk($image_id,$data);

 //    	if ($res == 1) {
	// 		$param['status'] = 1;
	// 		$param['txt'] = 'success';
	// 		echo json_encode($param);
	// 	  }
 //    	}
 
 //    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
