<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expert extends MY_Controller {

    /**
     * Achievements page
     *
     * @package		expert
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "expert_id,expert_name,expert_status";
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

        $this->_list_data['expert_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );
        /*$this->_list_data['expert_feature'] = array(
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


        // $this->_list_data['expert_parent_id'] = $this->model_profession->find_all_list_active(
        //     array('where_string'=>'expert_parent_id <= 1')
        //     ,"expert_name");
        

        $_POST = $this->input->post(NULL, true);
    }


    public function add($id=0 , $data = array()) {
        
        // debug($_POST,1);
        parent::add($id, $data);

    }
    public function upload_images(){

		require_once APPPATH.'third_party/S3/S3.php';
		// $k=$this->load->library('S3');
		//debug($k);
  
		$formdata = $_POST['expert'];
		$filedata = $_FILES['expert'];
		$cmsID = $formdata['expert_id'];


		$uploads_dir = 'assets/uploads/expert';
		$tmp_name = $filedata["tmp_name"]['expert_image'];
		$name = microtime()."_".$filedata["name"]['expert_image'];
		
  
		$tmpfile = $_FILES["ok"]["tmp_name"];
		$file = $_FILES["ok"]["name"];
 
        
        move_uploaded_file($tmp_name, "$uploads_dir/$file");

		$Nname = explode(".", $file); 
        $c_type = 'image/'.$Nname[1]; 

        $s = new S3();
	
        $s->setAuth(AWS_S3_KEY, AWS_S3_SECRET);
        $s->setRegion(AWS_S3_REGION);
        $s->setSignatureVersion('v4'); ;
        $s->putObject($s->inputFile($tmpfile), AWS_S3_BUCKET, 'assets/images/'.$file, $s->ACL_PUBLIC_READ,[],['Content-Type'=>$c_type]);
        //debug($s,1);
    

	    $allowEd = array('jpg','png','.JPG','jpeg');
	    if(in_array($Nname[1],$allowEd)){

		

		   

		    $insertImage['expert_image'] = $file;
		    $insertImage['expert_image_path'] = 'assets/uploads/expert/';
		    $where['where']['expert_id'] = $cmsID;
	        $status = $this->model_expert->update_model($where,$insertImage);
		
			if($status){
	        	echo json_encode(array('status'=>1,'message'=>'image updated successfully.'));
	        }
	        else{
	        	echo json_encode(array('status'=>0,'message'=>'Please try again.'));	
	        }
	    }
	    else{
	    	echo json_encode(array('status'=>0,'message'=>'Only JPG and PNG format allowed'));	
	    }
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
