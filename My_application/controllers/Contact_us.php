<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    public function index()
    {
        global $config;
        // $this->cms_page_id = 5;
        $data = array();
    
        //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        //INNER BANNER
         $b = $this->get_ibanner(2);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];
         

         //CONTENT
          $data['cont'] = $this->model_cms_page->find_by_pk(9);


        $this->load_view("index",$data);
    }


    public function send()
    {
                    // debug($_POST);
                    // // debug($_FILES);
                    // exit;
        if(array_filled($_POST)) 
        {
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

                //$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');
                if($this->validate("model_inquiry"))
                {
                    $data = $_POST['inquiry'];
                    $data['inquiry_status'] = 1;
                    // $data['inquiry_image']  = $_FILES['inquiry']['name']['inquiry_image'];

                    $this->model_inquiry->set_attributes($data);
                    $inserted_id = $this->model_inquiry->save();
                // debug( $inserted_id);

                    $form_data = $this->model_inquiry->find_by_pk($inserted_id);
                    $this->model_email->contactInquiry($form_data);  

                    $this->json_param['status'] = true;
                    $this->json_param['msg']['title'] = 'Inquiry Send';
                    $this->json_param['msg']['desc'] = 'We appreciate that you’ve taken the time to write us. We\'ll get back to you very soon.';
        
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
                
            }
                echo json_encode($this->json_param);
        }
    }
    

    public function ajax_send_online_consultation()
    {
        if(array_filled($_POST)) 
        {
            $i = false;
            //if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            if($i)
            {
                $param['status'] = 1;
                $param['txt'] = 'Please prove you\'re not a robot';//'The secret parameter is invalid';
                echo json_encode($param);
            } 
            else
            {

                if($this->validate("model_online_consultation"))
                {
                    $data = $_POST['online_consultation'];
                    $data['oc_status'] = 1;

                    $this->model_online_consultation->set_attributes($data);
                    $inserted_id = $this->model_online_consultation->save();
                    
                    
                    $this->model_email->contactInquiry_online_consultation($data);

                    
                    $this->json_param['status'] = true;
                    $this->json_param['msg']['title'] = '';
                    $this->json_param['msg']['desc'] = 'We appreciate that you’ve taken the time to write us. We\'ll get back to you very soon.';

                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
                
                echo json_encode($this->json_param);
            }
        }
    }

    public function ajax_product_inquiry()
    {
        if(count($_POST) > 0) 
        {
            if($this->validate("model_product_inquiry"))
            {

                $form_name = 'product_inquiry';
                $model_name = "model_".$form_name;
                $model_obj = $this->$model_name ;

                $data = array();
                $data = $_POST[$form_name];
                $data[$model_obj->get_status_field()] = 1;
                $model_obj->set_attributes($data);
                $inserted_id = $model_obj->save();

                if($inserted_id > 0)
                {
                    // Send email to Admin for product Inquiry
                    $this->model_email->product_inquiry_mail($inserted_id);

                    
                    $this->json_param['status'] = true;
                    $this->json_param['txt'] = 'product_inquiry successfully added';
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['txt'] = 'Fields are not correct';
                }
            }
            else
            {
                $this->json_param['status'] = false;
                $this->json_param['txt'] = validation_errors();
            }
            
            echo json_encode($this->json_param);
        }
    }



    public function ajax_contact_us3()
    {
        if(count($_POST) > 0) 
        {

            if($this->validate("model_build_your_trip_inquiry"))
            {

                $form_name = 'build_your_trip_inquiry';
                $model_name = "model_".$form_name;
                $model_obj = $this->$model_name ;

                $data = array();
                $data = $_POST[$form_name];
                $data['b_is_onway'] = isset($data['b_is_onway']) ? $data['b_is_onway'] : 0;
                $data['b_is_roundtrip'] = isset($data['b_is_roundtrip']) ? $data['b_is_roundtrip'] : 0;
                $data['b_multiple_destination'] = isset($data['b_multiple_destination']) ? $data['b_multiple_destination'] : 0;
                
                $data[$model_obj->get_status_field()] = 1;
                $model_obj->set_attributes($data);
                $inserted_id = $model_obj->save();

                if($inserted_id > 0)
                {
                    // Send email to Admin for product Inquiry
                    //$this->model_email->product_inquiry_mail($inserted_id);

                    
                    $this->json_param['status'] = true;
                    $this->json_param['txt'] = 'We appreciate that you’ve taken the time to write us. We\'ll get back to you very soon.';
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['txt'] = 'Fields are not correct';
                }
            }
            else
            {
                $this->json_param['status'] = false;
                $this->json_param['txt'] = validation_errors();
            }
            
            echo json_encode($this->json_param);
        }
    }
    public function review()
    {
        if(array_filled($_POST)) 
        {
        

                //$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');
                if($this->validate("model_learning_journey_course_review"))
                {
                    $data = $_POST['learning_journey_course_review'];
                    $data['learning_journey_course_review_status'] = 1;
                

                    $this->model_learning_journey_course_review->set_attributes($data);
                    $inserted_id = $this->model_learning_journey_course_review->save();
               

                    $form_data = $this->model_learning_journey_course_review->find_by_pk($inserted_id);
                   // $this->model_email->contactInquiry($form_data);  

                    $this->json_param['status'] = true;
                    $this->json_param['msg']['title'] = 'Review Send';
                    $this->json_param['msg']['desc'] = 'We appreciate that you’ve taken the time to write us. We\'ll get back to you very soon.';
        
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
                
            
                echo json_encode($this->json_param);
        }
    }
    public function tutorial_review()
    {
        if(array_filled($_POST)) 
        {
        

                //$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');
                if($this->validate("model_expert_tutorial_review"))
                {
                    $data = $_POST['expert_tutorial_review'];
                    $data['tutorial_review_status'] = 1;
                

                    $this->model_expert_tutorial_review->set_attributes($data);
                    $inserted_id = $this->model_expert_tutorial_review->save();
               

                    $form_data = $this->model_expert_tutorial_review->find_by_pk($inserted_id);
                   // $this->model_email->contactInquiry($form_data);  

                    $this->json_param['status'] = true;
                    $this->json_param['msg']['title'] = 'Review Send';
                    $this->json_param['msg']['desc'] = 'We appreciate that you’ve taken the time to write us. We\'ll get back to you very soon.';
        
                }
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
                
            
                echo json_encode($this->json_param);
        }
    }


    // public function ajax_formsend()
    // {
       

    //     if(array_filled($_POST)) 
    //     {
    //     $i = false;
              
    //                  if ($this->form_validation->run() == FALSE) {
    //             $this->json_param['status'] = false;
    //             $this->json_param['msg']['title'] = 'Error Occurred';
    //             $this->json_param['msg']['desc'] = validation_errors();
    //              }
    //           else
    //           {

    //             // debug($_POST);
    //             $data= array();
    //             $data=$_POST['tool_builder'];
    //             $data['tool_builder_user_id'] = $this->userid;
    //             $data['tool_builder_step_id'] = 1;
    //             // debug($data);
    //             $this->model_tool_builder->set_attributes($data);
    //             $inserted_id = $this->model_tool_builder->save();


    //             $this->json_param['status'] = true;
    //             $this->json_param['msg']['title'] = 'Saved';
    //             $this->json_param['msg']['desc'] = 'Go to Next Step';
    //           //  $this->json_param['msg']['url'] = l('step-1').'?query-id='.$inserted_id.'&key='.md5($inserted_id);

    //           }
            
    //             echo json_encode($this->json_param);
            
    //     }
    // }




    public function ajax_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder"))
          {
        
     
             if(!empty($tool)){
              
          

                 $id = $tool['tool_builder_id'];
            
                $data = array();
                $data = $_POST['tool_builder'];
      
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
          
               $data = $_POST['tool_builder'];
               $data['tool_builder_status'] = 1;
                          
          
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
         
                $this->model_tool_builder->set_attributes($data);
                $inserted_id = $this->model_tool_builder->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }



    public function tool_business_multi_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_bmc_multi->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_bmc_multi"))
          {
        
     
             if(!empty($tool)){
              
          

                 $id = $tool['tool_builder_id'];
            
                $data = array();
                $data = $_POST['tool_builder_bmc_multi'];
      
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_bmc_multi->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_bmc_multi']);
               $data = $_POST['tool_builder_bmc_multi'];
               $data['tool_builder_status'] = 1;
                          
          
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
         
                $this->model_tool_builder_bmc_multi->set_attributes($data);
                $inserted_id = $this->model_tool_builder_bmc_multi->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }



    public function tool_vp_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_vp_id DESC";
            $param['where']['tool_builder_vp_user_id']=$this->userid;
            $tool = $this->model_tool_builder_vp->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_vp"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_vp_id'];
            
                $data = array();
                $data = $_POST['tool_builder_vp'];
      
                $data['tool_builder_vp_step_id'] = $tool['tool_builder_vp_step_id']+1;
                $this->model_tool_builder_vp->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_vp'];
               $data['tool_builder_vp_status'] = 1;
                          
          
                $data['tool_builder_vp_user_id'] = $this->userid;
                $data['tool_builder_vp_step_id'] = 1;
         
                $this->model_tool_builder_vp->set_attributes($data);
                $inserted_id = $this->model_tool_builder_vp->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }



    public function tool_smp_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_strg_mkt_id DESC";
            $param['where']['tool_builder_strg_mkt_user_id']=$this->userid;
            $tool = $this->model_tool_builder_strg_mkt->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_strg_mkt"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_strg_mkt_id'];
            
                $data = array();
                $data = $_POST['tool_builder_strg_mkt'];
      
                $data['tool_builder_strg_mkt_step_id'] = $tool['tool_builder_strg_mkt_step_id']+1;
                $this->model_tool_builder_strg_mkt->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_strg_mkt'];
               $data['tool_builder_strg_mkt_status'] = 1;
                          
          
                $data['tool_builder_strg_mkt_user_id'] = $this->userid;
                $data['tool_builder_strg_mkt_step_id'] = 1;
         
                $this->model_tool_builder_strg_mkt->set_attributes($data);
                $inserted_id = $this->model_tool_builder_strg_mkt->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }



    public function tool_cjdg_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_cj_dg_id DESC";
            $param['where']['tool_builder_cj_dg_user_id']=$this->userid;
            $tool = $this->model_tool_builder_cj_dg->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_cj_dg"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_cj_dg_id'];
            
                $data = array();
                $data = $_POST['tool_builder_cj_dg'];
      
                $data['tool_builder_cj_dg_step_id'] = $tool['tool_builder_cj_dg_step_id']+1;
                $this->model_tool_builder_cj_dg->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_cj_dg'];
               $data['tool_builder_cj_dg_status'] = 1;
                          
          
                $data['tool_builder_cj_dg_user_id'] = $this->userid;
                $data['tool_builder_cj_dg_step_id'] = 1;
         
                $this->model_tool_builder_cj_dg->set_attributes($data);
                $inserted_id = $this->model_tool_builder_cj_dg->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }
    public function tool_pmmt_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_pmmt->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_pmmt"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_pmmt'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_pmmt->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_step_id']);
               $data = $_POST['tool_builder_pmmt'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_pmmt->set_attributes($data);
                $inserted_id = $this->model_tool_builder_pmmt->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }


    public function tool_beps_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_fm_beps->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_fm_beps"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_fm_beps'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_fm_beps->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_step_id']);
               $data = $_POST['tool_builder_fm_beps'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_fm_beps->set_attributes($data);
                $inserted_id = $this->model_tool_builder_fm_beps->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }




    public function tool_dcvm_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_fm_dcvm->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_fm_dcvm"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_fm_dcvm'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_fm_dcvm->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_step_id']);
               $data = $_POST['tool_builder_fm_dcvm'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_fm_dcvm->set_attributes($data);
                $inserted_id = $this->model_tool_builder_fm_dcvm->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }



    public function tool_cfs_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_fm_cfs->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_fm_cfs"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_fm_cfs'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_fm_cfs->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_step_id']);
               $data = $_POST['tool_builder_fm_cfs'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_fm_cfs->set_attributes($data);
                $inserted_id = $this->model_tool_builder_fm_cfs->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }



    public function tool_bss_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_fm_bss->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_fm_bss"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_fm_bss'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_fm_bss->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_step_id']);
               $data = $_POST['tool_builder_fm_bss'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_fm_bss->set_attributes($data);
                $inserted_id = $this->model_tool_builder_fm_bss->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }


    public function tool_income_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_fm_income->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_fm_income"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_fm_income'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_fm_income->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_step_id']);
               $data = $_POST['tool_builder_fm_income'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_fm_income->set_attributes($data);
                $inserted_id = $this->model_tool_builder_fm_income->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }


    public function tool_swot_formsend()
    {
        if(array_filled($_POST))
        {
            $param=array();
            $param['order']="tool_builder_id DESC";
            $param['where']['tool_builder_user_id']=$this->userid;
            $tool = $this->model_tool_builder_swot->find_one_active($param);
            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            }
            else
            {
          if($this->validate("model_tool_builder_swot"))
          {
             if(!empty($tool)){
        //   debug($tool, 1);
                 $id = $tool['tool_builder_id'];
                $data = array();
                $data = $_POST['tool_builder_swot'];
                $data['tool_builder_step_id'] = $tool['tool_builder_step_id']+1;
                $this->model_tool_builder_swot->update_by_pk($id,$data);
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
             else{
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_swot'];
               $data['tool_builder_status'] = 1;
                $data['tool_builder_user_id'] = $this->userid;
                $data['tool_builder_step_id'] = 1;
                $this->model_tool_builder_swot->set_attributes($data);
                $inserted_id = $this->model_tool_builder_swot->save();
                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
             }
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                }
            }
                echo json_encode($this->json_param);
        }
    }
    public function tool_mc_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_mc_mc_id DESC";
            $param['where']['tool_builder_mc_mc_user_id']=$this->userid;
            $tool = $this->model_tool_builder_mc_mc->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_mc_mc"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_mc_mc_id'];
            
                $data = array();
                $data = $_POST['tool_builder_mc_mc'];
      
                $data['tool_builder_mc_mc_step_id'] = $tool['tool_builder_mc_mc_step_id']+1;
                $this->model_tool_builder_mc_mc->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_mc_mc'];
               $data['tool_builder_mc_mc_status'] = 1;
                          
          
                $data['tool_builder_mc_mc_user_id'] = $this->userid;
                $data['tool_builder_mc_mc_step_id'] = 1;
         
                $this->model_tool_builder_mc_mc->set_attributes($data);
                $inserted_id = $this->model_tool_builder_mc_mc->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }
    public function tool_osf_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_osf_id DESC";
            $param['where']['tool_builder_osf_user_id']=$this->userid;
            $tool = $this->model_tool_builder_osf->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_osf"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_osf_id'];
            
                $data = array();
                $data = $_POST['tool_builder_osf'];
      
                $data['tool_builder_osf_step_id'] = $tool['tool_builder_osf_step_id']+1;
                $this->model_tool_builder_osf->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_osf'];
               $data['tool_builder_osf_status'] = 1;
                          
          
                $data['tool_builder_osf_user_id'] = $this->userid;
                $data['tool_builder_osf_step_id'] = 1;
         
                $this->model_tool_builder_osf->set_attributes($data);
                $inserted_id = $this->model_tool_builder_osf->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }
    public function tool_lts_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_lts_id DESC";
            $param['where']['tool_builder_lts_user_id']=$this->userid;
            $tool = $this->model_tool_builder_lts->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_lts"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_lts_id'];
            
                $data = array();
                $data = $_POST['tool_builder_lts'];
      
                $data['tool_builder_lts_step_id'] = $tool['tool_builder_lts_step_id']+1;
                $this->model_tool_builder_lts->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_lts'];
               $data['tool_builder_lts_status'] = 1;
                          
          
                $data['tool_builder_lts_user_id'] = $this->userid;
                $data['tool_builder_lts_step_id'] = 1;
         
                $this->model_tool_builder_lts->set_attributes($data);
                $inserted_id = $this->model_tool_builder_lts->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }
    public function tool_ids_formsend()
    {
        
              
        if(array_filled($_POST)) 
        {
            $param=array();
            $param['order']="tool_builder_ids_id DESC";
            $param['where']['tool_builder_ids_user_id']=$this->userid;
            $tool = $this->model_tool_builder_ids->find_one_active($param);
            

            $i = false;
            if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            {
                
                $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Recaptcha Redquired';
                    $this->json_param['msg']['desc'] = 'Please prove you\'re not a robot';
            } 
            else
            {

          if($this->validate("model_tool_builder_ids"))
          {
        
     
             if(!empty($tool)){
              
        //   debug($tool, 1);

                 $id = $tool['tool_builder_ids_id'];
            
                $data = array();
                $data = $_POST['tool_builder_ids'];
      
                $data['tool_builder_ids_step_id'] = $tool['tool_builder_ids_step_id']+1;
                $this->model_tool_builder_ids->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';


             }
             else{
                 
            //    debug($_POST['tool_builder_vp_step_id']);
               $data = $_POST['tool_builder_ids'];
               $data['tool_builder_ids_status'] = 1;
                          
          
                $data['tool_builder_ids_user_id'] = $this->userid;
                $data['tool_builder_ids_step_id'] = 1;
         
                $this->model_tool_builder_ids->set_attributes($data);
                $inserted_id = $this->model_tool_builder_ids->save();


                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Saved';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
           
           
       
             }
            
            }
             else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['msg']['title'] = 'Error Occurred';
                    $this->json_param['msg']['desc'] = validation_errors();
                  
                }
                
            }
                echo json_encode($this->json_param);
        }
    }

}
