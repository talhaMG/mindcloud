<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends MY_Controller {

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

         //CONTENT
          $data['course'] = $this->model_tutorial->find_all_active();

         // die();
          
        $this->load_view("index",$data);
    }

     public function detail($slug =' ')
    {
        global $config;
      
      //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        
        $this->add_script(array("comment_rating.css","css"));
        $course = $this->model_tutorial->course_by_slug($slug);
    
         if (count($course) < 1) {
          redirect("?msgtype=error&msg=invalid url");   
         }
        $data['course'] = $course;

        $param = array();
        $param['limit'] = 3;
        $param['order'] = "RAND()";
        $param['where']['tutorial_featured'] = 1;
        $data['pop_course'] = $this->model_tutorial->find_all_active($param);
        $data['profession'] = $this->model_profession->find_all_active();
        
          //COURSE PROFESSION
        $param = array();
        $param['fields'] = "profession_name";
        $course_professions =  $this->model_tutorial->get_course_profession($course['tutorial_id'],$param);
        $data['cp'] = $course_professions;
    
      //COURSE LECTUIRES
        $lectures =  $this->model_tutorial->get_lectures($course['tutorial_id']);
        $data['lectures'] = $lectures;
        // debug($data['course_professions']);
        //COMMENT
        $data['user_data'] = $this->model_user->find_by_pk($this->userid);
        $comments = $this->model_comment->get_comments($course['tutorial_id']);

        $average_rating = $this->model_comment->rating($course['tutorial_id']);
      
        $data['comment_info'] = array(
            "proname" => $course['tutorial_name'],
            "pro_id" => $course['tutorial_id'],
            "comments_count" => count($comments),
            "average_ratingstars" => $average_rating.'%'
            );

        if (isset($comments) && array_filled($comments)) {
            foreach ($comments as $key => $value) {
             $rc = array();
             $rc = $this->model_comment->get_replied_comments($painting['painting_id'],$value['comment_id']);
             if (isset($rc) && array_filled($rc)) {
                $comments[$key]['replies'] = $rc;
             }
             $comments[$key]['comment_profile'] = $this->model_comment->get_comment_profile($value['comment_user_id']);
             $comments[$key]['ago'] = time_elapsed_string($value['comment_createdon']);
             $comments[$key]['stars'] = ($value['comment_rating']/ 5) * 100;
            }
        }
        $data['comments'] = $comments;
    
        // debug($comments);
        //INNER BANNER
         // $b = $this->get_ibanner(6);
         // $data['ititle'] = $category['category_name'];
         // $data['ibanner_img'] = $b['ibanner_img'];

        // Load View
        $this->load_view("detail", $data);
    }



    public function evaluation()
    {
        global $config;
        $data = array();

      if ($this->userid < 1) {
        redirect(l("?msg=Please Login First&msgtype=error"));
      }

      $quizid = $_GET['quiz-id'];
      $token = $_GET['record-id'];

        if (md5($this->userid.$quizid) != $token) {
         redirect("?msgtype=error&msg=Page not Found");    
        }
        // debug($_GET);

        $quiz = $this->model_quiz->find_by_pk($quizid);
        
        $course = $this->model_tutorial->find_by_pk($quiz['quiz_course_id']);

        $pu = array();
        $pu['fields'] = "user_firstname,user_lastname";
        $user_data = $this->model_user->find_by_pk($this->userid,false,$pu);
      
        //DATA
        $data['username'] = $user_data['user_firstname'].' '.$user_data['user_lastname'];
        $data['tutorial_title'] = $course['tutorial_name'];
        $data['quizdate'] = csl_date($quiz['quiz_createdon'],'d-F-Y');
        $data['quizid'] = $quizid;
        $data['token'] = $token;
        $data['courseid'] = $course['tutorial_id'];
      

        //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;
        $this->load_view("evaluation",$data);
    }

public function ajax_saveOrder()
    {
      $json_param = array();
      // debug($_POST);
      $type = $this->input->post('type');
      $id = $this->input->post('id');
      $payment = $this->input->post('payment');

      $vars = array();
      $package = array();
      if ($this->userid > 0) {
        
      
      if ($type == "package") 
      {
        $vars['order_user_id'] = $this->userid;
        $vars['order_status'] = 0;
        $vars['order_type'] = $type;
        $vars['order_product_id'] = $id;

        $only['fields'] = "package_id,package_name,package_image,package_image_path,package_price";
        $package = $this->model_package->find_by_pk_active($id,false,$only);

        $vars['order_product_id'] =  $package['package_id'];
        $vars['order_product_name'] =  $package['package_name'];
        $vars['order_product_img'] =  get_image($package['package_image'],$package['package_image_path']);
        $vars['order_amount'] = $package['package_price'];
      }

      $course = array();
      if ($type == "course") 
      {
        $vars['order_user_id'] = $this->userid;
        $vars['order_status'] = 0;
        $vars['order_type'] = $type;
        $vars['order_product_id'] = $id;

         $only['fields'] = "tutorial_name,tutorial_image,tutorial_image_path,tutorial_price";
        $course = $this->model_tutorial->find_by_pk_active($id,false,$only);

        $vars['order_product_id'] =  $course['tutorial_id'];
        $vars['order_product_name'] =  $course['tutorial_name'];
        $vars['order_product_img'] =  get_image($course['tutorial_image'],$course['tutorial_image_path']);
        $vars['order_amount'] = $course['tutorial_price'];

      }

    $order_id = $this->model_shop_order->insert_record($vars);

     $shop_item = array();
     
     if ($type == "package") {   
     
        $package_courses = $this->model_tutorial->get_package_courses($package['package_id']);
        if (isset($package_courses) && array_filled($package_courses)) {
          foreach ($package_courses as $key => $value) {
                
                $shop_item['item_order_id'] = $order_id;
                $shop_item['item_product_id'] = $value['tutorial_id']; 
                $shop_item['item_product_name'] = $value['tutorial_name'];
                $shop_item['item_product_img'] = get_image($value['tutorial_image'],$value['tutorial_image_path']);
                $shop_item['item_qty'] = 1;
                $shop_item['item_type'] = 2; //2 package , 1 course
                $shop_item['item_price'] = $value['tutorial_price'];
                $this->model_shop_item->insert_record($shop_item);
          }
        }
     }

       if ($type == "course") 
      {   
                $shop_item['item_order_id'] = $order_id;
                $shop_item['item_product_id'] = $course['tutorial_id']; 
                $shop_item['item_product_name'] = $course['tutorial_name'];
                $shop_item['item_product_img'] = get_image($course['tutorial_image'],$course['tutorial_image_path']);
                $shop_item['item_qty'] = 1;
                $shop_item['item_type'] = 1; //2 package , 1 course
                $shop_item['item_price'] = $course['tutorial_price'];
                $this->model_shop_item->insert_record($shop_item);
     }

     if ($order_id > 0) {      

      if ($type =="course") {
          $url = l('course-payment').'?token='.md5($order_id).'&item-id='.$order_id.'&payment-type='.$payment.'&type='.$type;
      }else{
          $url = l('package-payment').'?token='.md5($order_id).'&item-id='.$order_id.'&payment-type='.$payment.'&type='.$type;
      }
        $json_param['status'] = true;
        $json_param['msg']['title'] = 'Error';
        $json_param['msg']['desc'] = "";    
        $json_param['url'] = $url;    

     }else{

        $json_param['status'] = false;
        $json_param['msg']['title'] = 'Error';
        $json_param['msg']['desc'] = "Error Occured.Please try later";       

     }
   }
   else{

        $json_param['status'] = false;
        $json_param['msg']['title'] = 'Error';
        $json_param['msg']['desc'] = "Please Signin to Purchae";
   }

  echo json_encode($json_param);
    }

    public function payment()
    {

      // debug($_GET);
      // debug($this->uri->segment(1));
      // package-payment
      $ptype = $this->uri->segment(1);

      if($this->userid > 0) {
        if(isset($_GET['item-id']) && $_GET['token'] = md5($_GET['item-id']))
        {
          $item_id = $this->input->get('item-id');

          $data['title'] = "Payment";

          $order_data = $this->model_shop_order->find_by_pk($item_id);
          $data['item_price'] = price($order_data['order_amount']);
          $data['item_title'] = $order_data['order_product_name'];
          $data['total_amount'] = $order_data['order_amount'];

          if(1==1)
          {    
            $payment_type = $_GET['payment-type'];
            if ($ptype == 'package-payment') { 

                     //PACKAGES
              $type = 'package';
              $data['type'] = $type;

              $package_courses = $this->model_tutorial->get_package_courses($order_data['order_product_id']);
              $data['package_courses'] = $package_courses;
            }else{
                      //COURSES
              $data['item_code'] = $order_data['tutorial_identity'];
              $type = 'course';
              $data['type'] = $type;
            }

            if ($payment_type == 'cardpayment') {
              $data['payment'] = 1; //squareup
            }else{
              $data['payment'] = 0; //paypal
            }

          if ($payment_type == 'cardpayment') {  //SQUAREUP
            $data['oid'] = $item_id;
            $data['subscriptiontype'] = $_GET['subscription-type'].' Subscription';
            $data['merchant_link'] = l('payment/squareup/chargeSquareUp');
            $data['type'] = $type;
          }else{
            //PAYPAL
            $data['success_url'] = l("payment/paypal/paypal_success")."?id=".$item_id."&code=".md5($item_id).'&type='.$type;
            $data['notify_url'] = l("payment/paypal/paypal_notification")."?id=".$item_id."&code=".md5($item_id).'&type='.$type;
            $data['cancel_url'] = l("payment/paypal/paypal_error")."?id=".$item_id."&code=".md5($item_id).'&type='.$type;
          }
              
              //TAB TITLE
          $method_title = ucwords($this->uri->segment(1));
          $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

              //INNER BANNER
          $data['ititle'] = 'Payment';
  
        // Paypal Payment Option
          $this->load_view('payment-theme',$data);
                  }
                }else{
                  redirect(l('login?msg=Error Occured&msgtype=error'),true);    
                }
              }
              else {
                redirect(l('login?msg=Please login to purchase&msgtype=error'),true);
              }
            }

            public function course_package($slug)
            {
              global $config;
                //TAB TITLE
              $method_title = ucwords($this->uri->segment(1));
              $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

              $param = array();
              $param['fields'] = 'tutorial_id'; 
              $course = $this->model_tutorial->course_by_slug($slug);

              if (count($course) < 1) {
                redirect("?msgtype=error&msg=invalid url");   
              }

              $paramp = array();
              $paramp['fields'] = 'package_id,package_name,package_image,package_image_path,package_price,package_basic_price,package_desc';
              $packages = $this->model_tutorial->get_packages($course['tutorial_id'],$paramp);


              $parmac['fields'] = "tutorial_id,tutorial_name";
              if (isset($packages) && array_filled($packages)) {
                foreach ($packages as $key => $value) {

                  $courses = $this->model_tutorial->get_package_courses($value['package_id'],$parmac);
                  $packages[$key]['courses'] = $courses;
                }
              }
              $data['packages'] = $packages;
    // debug($packages);
    //   debug($courses);

              $this->load_view("course_packages",$data);
            }

          
          public function lectures()
            {
              global $config;
              // debug($_GET);
                //TAB TITLE
              $method_title = ucwords($this->uri->segment(1));
              $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

              $lecture_id = $this->input->get('lecture-id');
              $course_id = $this->input->get('course-id');
              $lecture_title = urldecode($this->input->get('lecture'));
        
              $lecture = $this->model_lecture->find_by_pk($lecture_id);

              if (count($lecture) < 1 || $lecture_title != str_replace(' ','-', $lecture['lecture_name'])) {
                redirect("?msgtype=error&msg=invalid url");   
              }

              if ($this->userid < 1) {
                redirect("?msgtype=error&msg=Please Login First");   
              }

              $course = $this->model_tutorial->find_by_pk($lecture['lecture_course_id']);

              $all_lectures = $this->model_lecture->find_all_active(array("where" => array("lecture_course_id" => $course_id), "fields" => "lecture_id"));

// debug($all_lectures);
// foreach ($all_lectures as $key => $value) {
  
// }
              $data['course'] = $course;
              $data['lecture'] = $lecture;

              $data['prev'] = 
              $data['next'] = 

              $this->load_view("lecture",$data);
            }



       public function ajax_save_evaluation()
        {
            if(array_filled($_POST)) 
            {
                    if($this->validate("model_evaluation"))
                    {
                        $data = $_POST['evaluation'];
                        $data['evaluation_status'] = 1;
                    
                    // debug($data);
                        $this->model_evaluation->set_attributes($data);
                        $inserted_id = $this->model_evaluation->save();
                      
              $this->json_param['status'] = true;
              $this->json_param['msg']= 'Thank you.';
              $this->json_param['url'] = l('certificate').'/'.$_POST['token'].'/'.$_POST['evaluation']['evaluation_quiz_id'];

                    }
                    else
                    {
                        $this->json_param['status'] = false;
                        $this->json_param['msg']['title'] = 'Error Occurred';
                        $this->json_param['msg']['desc'] = validation_errors();
                    }
                    
                    echo json_encode($this->json_param);
            } else
                    {
                        $this->json_param['status'] = false;
                        $this->json_param['msg']['title'] = 'Error Occurred';
                        $this->json_param['msg']['desc'] = validation_errors();
                    }
        }
        
          

}
