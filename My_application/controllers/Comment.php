<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Controller {

	/**
	 * Default Controller
	 */

	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
       
    }


            //FOR COMMENT AND RATING SUBMITTION
    public function comment()
    {   
        
        if(count($_POST) > 0) 
        {

        if ($this->userid > 0) {
    
           if($this->validate("model_comment"))
            {
                $form_name = 'comment';
                
                $contact_us_data = $_POST['comment'];
                $contact_us_data['comment_status'] = 1;

                $this->model_comment->set_attributes($contact_us_data);

                $inserted_id = $this->model_comment->save();
                                
                if($inserted_id > 0)
                {
                    $this->json_param['status'] = true;
                    $this->json_param['msg']['title'] = 'Successfully submitted';
                    $this->json_param['msg']['desc'] = 'We appreciate your views.Thank you.';
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = 'Please Try Later';
                }               
            }
            else
            {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
            }
}else{
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Note';
                    $this->json_param['msg']['desc'] = 'Please Sign in to post a comment.';

}

        }
                
                echo json_encode($this->json_param);
    }
    

 
 
     public function reply_comment()
    {   
        
        if(count($_POST) > 0) 
        {

        if ($this->userid > 0) {
    
           if($this->validate("model_comment"))
            {
                $form_name = 'comment';
                
                $contact_us_data = $_POST['comment'];
                $contact_us_data['comment_status'] = 1;

                $this->model_comment->set_attributes($contact_us_data);

                $inserted_id = $this->model_comment->save();
                                
                if($inserted_id > 0)
                {
                    
                    $this->json_param['status'] = true;
                    $this->json_param['msg']['title'] = 'Successfully replied';
                    $this->json_param['msg']['desc'] = '';
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = 'Please Try Later';
                }               
            }
            else
            {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
            }
}else{
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Note';
                    $this->json_param['msg']['desc'] = 'Please Sign in to post a comment.';

}

        }
                
                echo json_encode($this->json_param);
    }
    



}
