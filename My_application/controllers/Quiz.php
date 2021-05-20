<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

        public function quiz_instruction($token="",$course_id,$order_item_id)
      {
        global $config;
        if ($this->userid < 1) {
          redirect("?msgtype=error&msg=Please Login First");   
        }

        if (md5($course_id.$order_item_id) != $token) {
         redirect("?msgtype=error&msg=Invalid Try");    
        }

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        $data['token'] = (md5($this->userid.$course_id.$order_item_id));
        $data['course_id'] = $course_id;
        $data['order_item_id'] = $order_item_id;

        $this->load_view("quiz_instruction",$data);
      }



      public function quiz($token="",$course_id,$order_item_id)
      {
        global $config;
        if ($this->userid < 1) {
          redirect("?msgtype=error&msg=Please Login First");   
        }

        if (md5($this->userid.$course_id.$order_item_id) != $token) {
         redirect("?msgtype=error&msg=Invalid Try");    
        }

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;


        $data['course_id'] = $course_id;
        $data['order_item_id'] = $order_item_id;

        $only['fields'] = "tutorial_name,course_quiz_time";
        $course = $this->model_tutorial->find_by_pk_active($course_id,false,$only);
        $data['course'] = $course;

        $param = array();
        $param['order'] = "RAND()";
         $data['questions'] = $this->model_questions->questions_with_options($course_id,$param);

        // debug($course['course_quiz_time']);

        $this->load_view("quiz",$data);

      }

      public function ajax_quiz_evaluation()
      {
    
        $course = $this->input->post('course');
        $itemid = $this->input->post('itemid');

        $answer = $_POST['qs'];
        $marks = 0;
        $total = count($_POST['qs']);
        if (isset($answer) && array_filled($answer)) {
            foreach ($answer as $key => $value) {
                    
            $correct_ans = $this->model_questions_options->find_by_pk($value);
                if ($correct_ans['qo_correct_answer'] == 1) {
                    $marks++;
                }
            }
        }

        $percent = ($marks/$total) * 100;
        $percentage = number_format($percent,2);

        $param = array();
        $param['quiz_total'] = $total;
        $param['quiz_marks'] = $marks;
        $param['quiz_course_id'] = $course;
        $param['quiz_order_item_id'] = $itemid;
        $param['quiz_percentage'] = $percent;
        $param['quiz_user_id'] = $this->userid;
        $param['quiz_status'] = 1;
        $quiz_id = $this->model_quiz->insert_record($param);
      
    $param = array();
    $param['quiz_certificate_number'] = date("dmy").'-'.$this->userid.'-'.$quiz_id;
    $this->model_quiz->update_by_pk($quiz_id,$param);

      $passing_range = g('db.admin.passing_percentage'); //80

        if ($percent > $passing_range) {
            $url = l('quiz-success/').md5($this->userid.$quiz_id).'/'.$quiz_id;
        }else{
            $url = l('quiz-fail/').md5($this->userid.$quiz_id).'/'.$quiz_id;
        }

        $json_param['status'] = true;
        $json_param['url'] = $url;
        echo json_encode($json_param);
      }
    

      public function success($token="",$quizid="")
      {
        
        if ($this->userid < 1) {
          redirect("?msgtype=error&msg=Please Login First");   
        }


        //EVALUATION
        $ev = array();
        $ev['where']['evaluation_quiz_id'] = $quizid;
        $evaluated = $this->model_evaluation->find_one($ev);

        if (count($evaluated) < 1) {
          redirect(l('course-evaluation').'?quiz-id='.$quizid.'&record-id='.$token.'&msg=Please fill up Evaluation Form to proceed&msgtype=success');
        }
      
         $quiz = $this->model_quiz->find_by_pk($quizid);
         $data['quiz'] = $quiz;


        if (md5($quiz['quiz_user_id'].$quizid) != $token) {
         redirect("?msgtype=error&msg=Page not Found");    
        }

         $course = $this->model_tutorial->find_by_pk($quiz['quiz_course_id']);
         $data['course'] = $course;
          
          $call = $this->uri->segment(1);
          $data['call'] = $call;
    
          $pu = array();
          $pu['fields'] = "user_firstname,user_lastname";
          $user_data = $this->model_user->find_by_pk($this->userid,false,$pu);
          $data['user_data'] = $user_data;

      //CERTIFICATE VARIABLES
      // $data['completion_date'] = csl_date($quiz['quiz_createdon'],'d-m-Y');
      // $data['certificate_number']  = $quiz['quiz_certificate_number'];
      // $data['course_title'] = $course['course_name'];
      // $data['course_tracking_number'] = $course['course_identity'];
      // $data['username'] = $user_data['user_firstname'].' '.$user_data['user_lastname'];
      // $data['ce_provider'] = '110221021';


         $this->load_view("success",$data);
      }

      public function fail($token="",$quizid="")
      {
        if ($this->userid < 1) {
          redirect("?msgtype=error&msg=Please Login First");   
        }

        if (md5($this->userid.$quizid) != $token) {
         redirect("?msgtype=error&msg=Page not Found");    
        }

         $quiz = $this->model_quiz->find_by_pk($quizid);
         $data['quiz'] = $quiz;

         $data['course'] = $this->model_tutorial->find_by_pk($quiz['quiz_course_id']);

         $this->load_view("fail",$data);
      }
    
     public function pdf_convert($quizid='',$view=0){
      $view =1;

    if (intval($quizid) && intval($quizid) > 0 && $_GET['id'] == md5($quizid)) {
      
    $this->layout_data['template_config']['show_toolbar'] = false ;
      
    $logodata = $this->model_logo->find_by_pk(1);
    $logo = Links::img($logodata['logo_image_path'],$logodata['logo_image']);
    // $data['logo'] = g('dirname').$logodata['logo_image_path'].$logodata['logo_image'];

    $quiz = $this->model_quiz->find_by_pk($quizid);
    $course = $this->model_tutorial->find_by_pk($quiz['quiz_course_id']);

    $pu = array();
    $pu['fields'] = "user_firstname,user_lastname";
    $user_data = $this->model_user->find_by_pk($this->userid,false,$pu);

    //CERTIFICATE VARIABLES
      $data['completion_date'] = csl_date($quiz['quiz_createdon'],'d-m-Y');
      $data['certificate_number']  = $quiz['quiz_certificate_number'];
      $data['course_title'] = $course['tutorial_name'];
      $data['course_tracking_number'] = $course['tutorial_identity'];
      $data['username'] = $user_data['user_firstname'].' '.$user_data['user_lastname'];
      $data['ce_provider'] = '110221021';
      
      $data['certificate'] = g('dirname').'assets/front_assets/images/certificate_pdf.jpg';    //for PDF

      // $data['certificate'] = l('').'assets/front_assets/images/certificate_pdf.jpg';
  
  
  $this->load->view("widgets/pdf_html",$data);

      // // Get output html
   $html = $this->output->get_output();
   // debug($html , 1);

    // Load library
    $this->load->library('dompdf_gen');
  
    // $dompdf = new Dompdf();
    //     $options = $dompdf->getOptions();
    //     $options->set(array('isRemoteEnabled' => true));
    //     $dompdf->setOptions($options);
    //     $dompdf->loadHtml($html);
        
    // Convert to PDF
    $this->dompdf->load_html($html);
    //$paper_size = array(0,0,1050.72,800);
    // $paper_size = array(0,0,1050.72,841.42);
    //$this->dompdf->set_paper($paper_size);
    $this->dompdf->set_paper('A4', 'portrait');
    $this->dompdf->render();

    // if(isset($_GET['view']) AND ($_GET['view'] == 1)) { // just view certificates
    if(isset($view) AND ($view == 1)) { // just view certificates
      $this->dompdf->stream("{$filename}.pdf", array("Attachment" => false));
      exit(0);
    }
    else{ // download certificates
      $this->dompdf->stream("{$filename}.pdf");
    }

    }else{
      redirect('404_override');
    } 

    }


    // public function test()
    // {
    //   $this->load->library('excel');
    

    //   $param=array();
    //   $param['where']['tool_builder_user_id']=$this->userid; 
    //   $employee_data = $this->model_tool_builder->find_one_active($param);
    //   $object = new PHPExcel();

    //   $object->setActiveSheetIndex(0);
    
    //   // $table_columns = array("Name", "Address", "Gender", "Designation", "Age");
    
    //   $column = 0;
    
    //   foreach($employee_data as $field =>$value)
    //   {
    //    // debug($field);
    //    $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
    //    $column++;
    //   }
    
    
    
    //   $excel_row = 2;
    //   $count=0;
    //   foreach($employee_data as $key =>$row)
    //   { 
    //     // debug($key);
    //  //  debug($row['tool_builder_customer_segments']);

  
    //    $object->getActiveSheet()->setCellValueByColumnAndRow($count, $excel_row, $row);
    //   //  $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->address);
    //   //  $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender);
    //   //  $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->designation);
    //   //  $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
    //   $count++;  
    //  // $excel_row++;
    //   }
    
    //   $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
    //   header('Content-Type: application/vnd.ms-excel');
    //   header('Content-Disposition: attachment;filename="Employee Data.xls"');
    //   $object_writer->save('php://output');
    //  }
    


     public function test()
    {
      require_once APPPATH."/third_party/PHPExcel/IOFactory.php"; 
      global $config;
      $this->load->library('excel');

      $param=array();
      $param['where']['tool_builder_user_id']=$this->userid; 
      $employee_data = $this->model_tool_builder->find_one_active($param);
      $object = new PHPExcel();

 
   
      $file_path =  $config['base_url'].'assets/front_assets/images/test.xlsx';

      //include 'Classes/PHPExcel/IOFactory.php';
      $inputFileName = $file_path; 
      $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
      $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
      $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
      for($i=2;$i<=$arrayCount;$i++)
      {                   
          // 'product'=$allDataInSheet[$i]["C"],
          // 'brand'=$allDataInSheet[$i]["I"],
          // 'standard'=$allDataInSheet[$i]["J"]
      }
    
      // $excel_row = 2;
      // $count=0;
      // foreach($employee_data as $key =>$row)
      // { 

  
      //  $object->getActiveSheet()->setCellValueByColumnAndRow($count, $excel_row, $row);
      //     $count++;  

      // }
      // $filename=$config['base_url'].'assets/front_assets/images/test.xlsx';
      // $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      // header('Content-Type: application/vnd.ms-excel');
      // header('Content-Disposition: attachment;filename="'.$filename.'"');
      // $object_writer->save('php://output');
     }
    


    


  

}
