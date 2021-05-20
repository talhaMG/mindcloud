<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends MY_Controller {

	/**
	 * Default Controller
	 */

	public function __construct()
    {
    	// Call the Model constructor latest_product
    	// $this->cms_page_id = 24;
        parent::__construct();
        // $this->view_pre = "cms/";

        //$this->plugin_seo();
    }

    // Default Home Page
	public function index()
	{
        global $config;
        $data = array();

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;
        

        //INNER BANNER
         $b = $this->get_ibanner(1);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];


        //BANNER
         // $b = $this->get_banner(1);
         // $data['bcontent'] = $b['bcontent'];
         // $data['bimage'] = $b['bimage'];

         $cont = $this->model_cms_page->get_page(12);
        $data['cont1'] = $cont['child'][0];
        $data['cont2'] = $cont['child'][1];

		$this->load_view("index",$data);
	}

    public function terms()
    {
        $data = array();
        global $config;

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        //INNER BANNER
         $b = $this->get_ibanner(6);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];
            //BANNER
         // $b = $this->get_banner(9);
         // $data['bcontent'] = $b['bcontent'];
         // $data['bimage'] = $b['bimage'];
         $content = $this->model_cms_page->get_page(32);
         // debug($cont);
        $data['content'] = $content;
         

        $this->load_view("terms",$data);
    }



    public function cart()
    {
        $this->load_view("cart-one",$data);
    }

    public function checkout()
    {
        $this->load_view("checkout",$data);
    }



    public function policy()
    {
        $data = array();
        global $config;

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        //INNER BANNER
         $b = $this->get_ibanner(7);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];
            //BANNER
         // $b = $this->get_banner(10);
         // $data['bcontent'] = $b['bcontent'];
         // $data['bimage'] = $b['bimage'];

         $cont = $this->model_cms_page->get_page(34);
         
        $data['content'] = $cont;         

        $this->load_view("terms",$data);
    }

    // public function faq()
    // {
    //     global $config;
    //     $data = array();

    //      //TAB TITLE
    //     $method_title = ucwords($this->uri->segment(1));
    //     $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

    //     //INNER BANNER
    //      $b = $this->get_ibanner(2);
    //      $data['ititle'] = $b['ititle'];
    //      $data['ibanner_img'] = $b['ibanner_img'];

    //     $data['faq'] = $this->model_faq->find_all_active();

    //     $this->load_view("faq",$data);
    // }

    // public function testimonials()
    // {
    //     global $config;
    //     $data = array();

    //     //TAB TITLE
    //     $method_title = ucwords($this->uri->segment(1));
    //     $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

    //     //INNER BANNER
    //      $b = $this->get_ibanner(3);
    //      $data['ititle'] = $b['ititle'];
    //      $data['ibanner_img'] = $b['ibanner_img'];

    //      $test['where']['testimonials_top'] = 1;
    //      $test['order'] = "testimonials_id DESC";
    //     $data['test'] = $this->model_testimonials->find_one_active($test);

    //     $data['testimonials'] = $this->model_testimonials->find_all_active();
    
    //     $this->load_view("testimonials",$data);
    // }


    // public function showcase()
    // {
    //     global $config;
    //     $data = array();

    //       //TAB TITLE
    //     $method_title = ucwords($this->uri->segment(1));
    //     $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

    //     //INNER BANNER
    //      $b = $this->get_ibanner(4);
    //      $data['ititle'] = $b['ititle'];
    //      $data['ibanner_img'] = $b['ibanner_img'];

    //      $data['cont9'] = $this->model_cms_page->find_by_pk_active(9);
    //      $data['cont10'] = $this->model_cms_page->find_by_pk_active(10);

    //      $data['category'] = $this->model_gallery_category->find_all_active();
    //     // debug($data['category']);
    //     $this->load_view("showcase",$data);
    // }

    
    public function learning()
    {
        $data = array();
        global $config;

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;


        $data['professions'] = $this->model_profession->find_all_active();            
        $data['states'] = $this->model_states->find_all_active();            
        
        $param = array();
        $param['where']['tutorial_featured'] = 1;
        $data['course'] = $this->model_tutorial->find_all_active($param);

        
        $cont = $this->model_cms_page->get_page(2);
        // debug($cont);
        $data['cont1'] = $cont['child'][0];
        $data['cont2'] = $cont['child'][1];
        $data['cont3'] = $cont['child'][2];
        $data['cont4'] = $cont['child'][3];
        $data['cont5'] = $cont['child'][4];
        $data['cont6'] = $cont['child'][5];
        $data['cont7'] = $cont['child'][6];
        $data['cont8'] = $cont['child'][7];
        $data['cont9'] = $cont['child'][8];
        $data['cont10'] = $cont['child'][9];
        $data['cont11'] = $cont['child'][10];
        $data['cont12'] = $cont['child'][11];
        $data['cont13'] = $cont['child'][12];
        $data['cont14'] = $cont['child'][13];
        $data['cont15'] = $cont['child'][14];

        $data['banner'] = $this->model_inner_banner->find_by_pk(1); 

        $data['learning'] = $this->model_learning->find_all_active();
        $data['testimonial'] = $this->model_testimonials->find_all_active();
   
        $param = array();
        $param['where']['category_featured'] = 1;
        $data['category'] = $this->model_category->find_all_active($param); 


      $data['testi'] = $this->model_testimonials->find_all_active();
      $firststate = $this->model_states->find_one_active();            
      $data['firststate'] =$firststate['states_id'];

      $exp1 = $this->model_cms_page->get_page(26);
  
      $data['check'] = $exp1['child'][0];

               
     $fa=array();
     $fa['where']['faq_category']=2;
     $fa['order']="faq_id ASC";
     $data['faq'] = $this->model_faq->find_all_active($fa);

     $contdata = $this->model_cms_page->get_page(28);
     // debug($cont);
     $data['contd'] = $contdata['child'][0];


     $data['learn_cat'] = $this->model_learning_journey_category->find_all_active();
       
   //  debug($data['learn_cat']);
      
          

        $this->load_view("learning",$data);
    }

    public function expert()
    {
        $data = array();
        global $config;

        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        $cont = $this->model_cms_page->get_page(2);
        $data['cont1'] = $cont['child'][4];
        $data['cont2'] = $cont['child'][5];

        $conts = $this->model_cms_page->get_page(20);
        $data['con1'] = $conts['child'][0];

        $contss = $this->model_cms_page->get_page(20);
  
        $data['con2'] = $contss['child'][1];
        $data['con3'] = $contss['child'][2];
        $data['con4'] = $contss['child'][3];
        $data['con5'] = $contss['child'][4];

   
           
     

        $par=array();
        $par['order']="category_id ASC";
        $data['main_categories'] = $this->model_category->find_all_active($par);

        $coursecat=array();
        $coursecat['where']['cp_category_id']=intval($this->input->get('cat'));
        $cate = $this->model_course_category->find_all_active($coursecat);

       // debug($cate);
  
        foreach($cate as $key => $value)
        {
         $all[]=$value['cp_course_id'];
        }

       // debug($all);
   
        

        $par2=array();
        $par2['order']="expert_id ASC";
        $data['ex'] = $this->model_expert->find_all_active($par2);
        //debug($data['main_categories']);

          $param = array();
          if(isset($_GET['expert']) AND intval($_GET['expert']) > 0){
          $param['where']['tutorial_expert_id'] = intval($this->input->get('expert'));
          }

   
    //       if(isset($_GET['cat']) AND intval($_GET['cat']) > 0){
    //       $param['where']['tutorial_category_id'] = intval($this->input->get('cat'));
    //   }
  
      

      
      $param['order']="tutorial_id ASC";
      $param['where_in']['tutorial_id']=$all;

      $data['art'] = $this->model_tutorial->get_details($param);

      
      $pop=array();
      $pop['where']['category_featured']=1;
      $data['popular'] = $this->model_category->find_all_active($pop);
     // debug($data['art']);

           
     $fa=array();
     $fa['where']['faq_category']=1;
     $fa['order']="faq_id ASC";
     $data['faq'] = $this->model_faq->find_all_active($fa);
      
     $exp1 = $this->model_cms_page->get_page(26);
  
     $data['check'] = $exp1['child'][0];
   



        $this->load_view("expert",$data);
    }

    public function course_detail($slug ='')
    {
        global $config;
        $data = array();

      

        $contss = $this->model_cms_page->get_page(30);
        $data['con1'] = $contss['child'][0];
        $data['con2'] = $contss['child'][1];
        $data['con3'] = $contss['child'][2];

    
        $fa=array();
        $fa['where']['faq_category']=2;
        $fa['order']="faq_id ASC";
        $data['faq'] = $this->model_faq->find_all_active($fa);


        $ck=array();
        $ck['where']['tutorial_slug']=$slug;
    
        $course = $this->model_tutorial->get_details($ck);
       // debug($course[0]['course_id']);


     
        

    
        if (count($course) < 1) {
         redirect("?msgtype=error&msg=invalid url");   
        }

  

       $data['course'] = $course;
       


       $pop=array();
       $pop['where']['tutorial_slug !=']=$slug;
       $pop['limit']=3;
       $data['popular'] = $this->model_tutorial->find_all_active($pop);

       $tut=array();
       $tut['where']['cp_course_id']=$course[0]['tutorial_id'];
       $tutorail = $this->model_course_tutorial->find_all_active($tut);

       foreach($tutorail as $key => $value)
       {
        $all[]=$value['cp_tutorial_id'];
       }


    //    $lec=array();
    //    $lec['where_in']['tutorial_id']=$all;
    //    $data['lc'] = $this->model_tutorial->find_all_active($lec);
    //   debug($data['lc']);


       $lec=array();
       $lec['where_in']['videos_id']=$all;
       $data['lc'] = $this->model_videos->find_all_active($lec);



       $par7=array();
       $par7['where']['cp_course_id']=$course[0]['tutorial_id'];
       $coursecat = $this->model_course_category->find_all_active($par7);
      // debug($coursecat);

       foreach($coursecat as $key => $value)
       {
        $all1[]=$value['cp_category_id'];
       }
      // debug($all1);
       $ccategory=array();
       $ccategory['where_in']['category_id']=$all1;
       $data['ct'] = $this->model_category->find_all_active($ccategory);
       //debug(  $data['ct']);

       

   
        $this->load_view("course_detail",$data);
    }

    



}
