<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tutorial extends MY_Controller {

    /**
     * Achievements page
     *
     * @package		course
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "tutorial_id,tutorial_name,tutorial_status";
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

        $this->_list_data['tutorial_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );
        /*$this->_list_data['course_feature'] = array(
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

        $this->_list_data['course_state_id'] = $this->model_lecture->find_all_list_active(
            array(''),"lecture_name");
        
        
        $this->_list_data['course_tutorial'] = $this->model_videos->find_all_list_active(
                array(''),"videos_name");
       
        $this->_list_data['course_category'] = $this->model_category->find_all_list_active(
                    array(''),"category_name");

                    
        $this->_list_data['tutorial_expert_id'] = $this->model_expert->find_all_list_active(
            array(''),"expert_name");

        $this->_list_data['tutorial_language_id'] = $this->model_language->find_all_list_active(
                array(''),"language_name");
            
        

        $_POST = $this->input->post(NULL, true);
    }


    public function add($id=0 , $data = array()) {
    
        $this->add_script(array( "jquery.validate.js" , "form-validation-script.js","plupload.full.min.js") , "js" );
        $this->register_plugins(array("datatables","jquery-file-upload"));
        
        
        // debug($_POST,1);
        parent::add($id, $data);

    }

    




    public function ajax_uploadtoserver()
    {

        require_once APPPATH.'third_party/S3/S3.php';


        // 5 minutes execution time
        @set_time_limit(5 * 60);
        // Uncomment this one to fake upload time
        // usleep(5000);

        // Settings
        //$targetDir_path = "assets/uploads/course";
        $targetDir_path = "assets/uploads/tutorial";
        $targetDir = FCPATH . $targetDir_path;//"assets/uploads/video_gameplay_reviews";

        //$targetDir = ‘uploads’;
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // Create target dir
        if (!file_exists($targetDir)) {
        @mkdir($targetDir);
        }

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        $s = new S3();
    
        $s->setAuth(AWS_S3_KEY, AWS_S3_SECRET);
        $s->setRegion(AWS_S3_REGION);
        $s->setSignatureVersion('v4');
        $tmpfile = $_FILES["file"]["tmp_name"];
       //debug($tmpfile);
        $file = $fileName;
        
      //  debug($file);
        $s->putObject($s->inputFile($tmpfile), AWS_S3_BUCKET, 'assets/'.$file, $s->ACL_PUBLIC_READ,[],['Content-Type'=>'video/mp4']);

       

      

        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        
        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                //die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
                $error[] = 'Failed to open temp directory.';
            }

            while (($file = readdir($dir)) !== false)
            {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}.part") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge))
                {
                    @unlink($tmpfilePath);
                }
            }

            closedir($dir);
        }

        // Open temp file
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            //die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            $error[] = 'Failed to open output stream.';
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                //die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
                $error[] = 'Failed to move uploaded file.';
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                //die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                $error[] = 'Failed to open input stream.';
            }
        }
        else {
            if (!$in = @fopen("php://input", "rb")) {
                //die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                $error[] = 'Failed to open input stream.';
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
        // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);
        }


        if(($chunk+1) == $chunks) {
         

           
        
   
       
            $data = array('tutorial_video'=>$fileName,'tutorial_video_path'=>$targetDir_path."/");
            $this->db->where('tutorial_id',$this->input->get('id'));
            $this->db->update('tutorial',$data);
         
            $param = array();
            $param['status'] = true;
            $param['msg'] = 'Tutorial Uploaded';
            echo json_encode($param);
        }
        else {
            $param = array();
            $param['msg'] = 'Tutorial In-Progress';
            echo json_encode($param);    
        }
      
       // die();
        // Return Success JSON-RPC response
        //die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

    }
    
    public function upload_images(){

		require_once APPPATH.'third_party/S3/S3.php';
		// $k=$this->load->library('S3');
  
		$formdata = $_POST['tutorial'];
		$filedata = $_FILES['tutorial'];
		$cmsID = $formdata['tutorial_id'];


		$uploads_dir = 'assets/uploads/tutorial';
		$tmp_name = $filedata["tmp_name"]['tutorial_image2'];
		$name = microtime()."_".$filedata["name"]['tutorial_image2'];
		
 
 
		$tmpfile = $_FILES["ok"]["tmp_name"];
		$file = $_FILES["ok"]["name"];

        move_uploaded_file($tmp_name, "$uploads_dir/$file");

		$Nname = explode(".", $file); 
        $c_type = 'image/'.$Nname[1]; 

        $s = new S3();
	
        $s->setAuth(AWS_S3_KEY, AWS_S3_SECRET);
        $s->setRegion(AWS_S3_REGION);
        $s->setSignatureVersion('v4'); 
        $s->putObject($s->inputFile($tmpfile), AWS_S3_BUCKET, 'assets/images/'.$file, $s->ACL_PUBLIC_READ,[],['Content-Type'=>$c_type]);
        // debug($s,1);

	    $allowEd = array('jpg','png','.JPG','jpeg'); 
	    if(in_array($Nname[1],$allowEd)){

		

		   

		    $insertImage['tutorial_image2'] = $file;
		    $insertImage['tutorial_image_path'] = 'assets/uploads/tutorial/';
		    $where['where']['tutorial_id'] = $cmsID;
	        $status = $this->model_tutorial->update_model($where,$insertImage);
            
		
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




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
