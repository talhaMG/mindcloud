<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class evaluation extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		evaluation
	 * @author		Muhammad devemail0909@gmail.com Khan (Muhammad.devemail0909@gmail.com@tradekey.com)
	 * @version		2.0
	 * @since		Version 1.0 2014
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "evaluation_id,evaluation_name,evaluation_email,evaluation_status";
        $this->dt_params['searchable'] = array("evaluation_id","evaluation_name","evaluation_email","evaluation_status");
       
                $this->dt_params['action'] = array(
        								"hide_add_button" => true,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => false ,
                                        "order_field" => false ,
                                        "show_view" => true ,
                                        "extra" => array() ,
                                      );

        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='', $data=array())
	{
		parent::add($id,$data);
	}

	public function ajax_view($id='')
	{
		if($id)
		{
			$this->model_evaluation->update_by_pk($id, array("evaluation_status" => 0));
		}
		parent::ajax_view($id);
	}

	// public function get_view($id=0) {

	// 	global $config;
	// 	$result = array();
	// 	$class_name = $this->router->class;
	// 	$model_name = 'model_'.$class_name ;
	// 	$model_obj = $this->$model_name ;

	// 	$form_fields = $model_obj->get_fields();
	// 	if($id)
	// 	{
			
	// 		$data = $this->$model_name->find_by_pk($id,false, $params);


	// 		// print_r($job_data);	

	// 		if(isset($data) AND array_filled($data))
	// 		{
	// 			$result['record']['Record ID'] = $data['evaluation_id'];
	// 			$result['record']['Name'] = $data['evaluation_name'];
	// 			$result['record']['Email'] = $data['evaluation_email'];
	// 			$result['record']['Phone'] = $data['evaluation_phone'];
				
	// 			// $ex = unserialize($data['ji_category']);
	// 			// if (isset($ex) && array_filled($ex)) {

	// 			//  foreach ($ex as $key => $value) {
	// 			//  	$bullet_body .= "<li><b>". $value."</b></li>";

	// 			//  }
	// 			// }
	//            // $result['record']['Categories'] = (!empty($bullet_body)) ? $bullet_body : "none"  ;


	// 			// $param = array();
	// 			// $param['where']['pi_product_id'] = $data['ji_id'];
	// 			// $files = $this->model_job_image->find_all($param);
	// 			if(!empty($data['evaluation_image'])){
					
	// 					$img  = get_image($data['evaluation_image'],$data['evaluation_image_path']);
	// 					$k = $key+1;
	// 					$result['record']["Uploaded File"] = '<a href="'.$img.'" title="download image" download><i class="fa fa-image" style="font-size: 23px;"></i></a>' ;
	// 			}

	// 		    $result['record']['Date/Time'] = $data['evaluation_createdon'];

	// 			}
	// 	}
	// 	else
	// 	{
	// 		$result['failure'] = "No Item Found";
	// 	}
	// 	return $result;
	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
