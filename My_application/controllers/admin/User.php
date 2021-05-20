<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends MY_Controller {

	/**
	 * user admin
	 *
	 * @package		User
	 * @author		
	 * @version		2.0 -- Robust , Advanced And More Frustating...
	 * @since		Version 2.0 2015
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "user_id,user_firstname,user_lastname,user_email,user_status";
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


        
        $this->_list_data['user_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

       
        // $this->_list_data['user_email_verified_status'] = array( 
        //                                 0 => "<span class=\"label label-default\">Not-Verified</span>" ,  
        //                                 1 =>  "<span class=\"label label-primary\">Verified</span>"  
        //                             );

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		$this->_list_data['user_country'] = $this->model_country->find_all_list_active($param,"country");

		
		$_POST = $this->input->post(NULL, true);

		if(isset($_GET['type']))
			$config['js_config']['paginate']['uri'] .= '?type=' . $_GET['type'];
	}

	public function add($id='',$data=array())
	{
		// Popluated LISTDATA in constructor
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		$this->register_plugins("bootstrap-fileupload");

		$this->form_params['action'] = array(
        	'hide_save' => true,
        	'hide_save_new' => true
    	);

    	//$this->_list_data['credit_hisotry'] = $this->model_user_credit->get_data($id);


		if(array_filled($_POST))
		{
			$_POST['user']['user_is_admin'] = 0;
			
			if($id)
			{
				$old_password = $this->model_user->find_by_pk($id);
				
				if($old_password['user_password'] == $_POST['user']['user_password']) {
					$_POST['user']['user_password'] = $_POST['user']['user_password'];
				}
				else{
					$_POST['user']['user_password'] = $this->model_user->_encrypt_password(($_POST['user']['user_password']));
				}
			}
			else
			{
				$_POST['user']['user_password'] = $this->model_user->_encrypt_password(($_POST['user']['user_password']));
			}
			
			
		}
		// $qp = array();
		// $qp['where']['quiz_user_id'] = $id;
		// $qp['where']
		// $data['quiz'] = $this->model_quiz->find_all($qp);

		   $data['activity_headings'] = array(
                "S.N.O",
                "Thumbnail",
                "Title",
                "Total Lectures",
                "Course ID",
                "Hourse",
                // "Status",
                // "View Lectures",
                "Take Quiz",
                "Actions",
            );
		$c = $this->model_tutorial->user_enrollcourses($id);
		// debug($this->db->last_query());
		// $data['enrolled_courses'] = $c;

		parent::add($id,$data);
	}
	
	
	public function get_view($id=0) {

		global $config;
		$result = array();
		$class_name = $this->router->class;
		$model_name = 'model_'.$class_name ;
		$model_obj = $this->$model_name ;
		$form_fields = $model_obj->get_fields();
		if($id)
		{
			$result['record'] = $this->$model_name->find_by_pk($id);
			$result['record'] = $this->$model_name->prepare_view_data($result['record']);
			if(!$result['record'] )
				$result['failure'] = "No Item Found";
				// Load relation fields data
			$relation_data = $this->$model_name->get_relation_data($id);
			if(array_filled($relation_data))
				$result['record']['relation_data'] = $relation_data;
		}
		else
		{
			$result['failure'] = "No Item Found";
		}
	
		return $result;

	}


	
	public function update_status() {

		extract($_POST);
		if( array_filled($idList) && $model ){
			
			$updateVal = intval($updateVal);

			if($updateVal == 2)
			{

				foreach($idList as $id)
				{
					$user_data = $this->model_user->find_by_pk($id);
					$_POST['params']['pk'] = intval($id);
					if(intval($id))
					{
						$this->permanent_delete();
						
					}
				}
				$ret['affected'] = count($idList);
				end_script( json_encode($ret) );
			}
			else
			{
				$model_obj = $this->{$model};
				$status_field = $model_obj->get_status_field();
				$pk = $model_obj->get_pk();
				if($status_field && $pk)
				{
					$record[$status_field] = $updateVal;
					$params['where_in'][$pk] = $idList;
					$ret['affected'] = $model_obj->update_model($params, $record) ;
					end_script( json_encode($ret) );

				}
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
