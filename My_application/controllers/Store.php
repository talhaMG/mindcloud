<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends MY_Controller {

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
  public function index($category_slug ="index")
	{
        global $config;
        $data = array();
        //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        //INNER BANNER
         // $b = $this->get_ibanner(13);
         // $data['ititle'] = $b['ititle'];
         // $data['ibanner_img'] = $b['ibanner_img'];


        
              //INNER BANNER
         $b = $this->get_ibanner(8);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $category_data['category_name'];

        $param_pro = array();
        $param_pro['fields'] = "product_id,product_category_id,product_name,product_slug,category_name,product_image,product_image_path,product_price";
        $pro = $this->model_product->get_all_products($param_pro);        




        $category = $this->model_category->find_all_active();
        $data['categories'] = $category;
      //   $category_param['where']['category_parent_id'] = 1; 
      //   $category = $this->model_category->find_all_active($category_param);
      //   $data['category'] = $category;

      //   $sub_param['where']['category_parent_id >'] = 1; 
      //   $subchild = $this->model_category->find_all_active($sub_param);
      // //  $subchild = $this->model_category->find_one_active(array("where" => array("category_id" => $sub_params)));
 
      //   $data['subcategory'] = $subchild;


      //   //products

      //   $param_pro = array();
      //   $param_pro['fields'] = "product_id,product_category_id,product_name,product_slug,product_sku,category_name,product_image,product_image_path,product_price,product_rating,product_in_stock";

      //   if (!empty($category_slug) AND ($category_slug != 'index')) {
      //     $getcategory = $this->model_category->find_one_active(array("where" => array("category_slug" =>$category_slug)));
      //     if (count($getcategory) < 1) {
      //       redirect(l('our-store?msgtype=error&msg=Invalid%20url%20found.'));  
      //     }
      //     //debug("here",1);
      //     // $pro = $this->model_product->get_category_products($getcategory['category_id'],$param_pro);
  
      //     // debug($category_slug);

      //     $paginate_param = array();
      //     $paginate_param['where']['product_category_id'] = $getcategory['category_id'];
      //     $product_data = $this->_pagination($category_slug,$paginate_param);
      //     // debug($this->db->last_query(),1);

      //     $pro = $product_data['data'];
      //     $data['links'] = $product_data['links'];

      //   }
      //   else{
      //     $slug = !empty($category_slug) ? $category_slug : 'index';
      //     $paginate_param = array();
      //     $product_data = $this->_pagination($slug,$paginate_param);
          
      //     $pro = $product_data['data'];
      //     $data['links'] = $product_data['links'];
      //     //$pro = $this->model_product->get_all_products($param_pro);        
      //   }

        $data['pro'] =  $pro;
      //  $data['all_store'] = $all_store;
                //INNER BANNER
         $b = $this->get_ibanner(5);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $b['ibanner_img'];

		$this->load_view("index",$data);
	}


    private function _pagination($slug='',$paginate_param)
    {
        $this->load->library('mypagination');

        $class_name = $this->router->fetch_class();
        $method_name = $this->router->fetch_method();

        // Model get
        $model_name = 'product';
        $model_name = "model_".$model_name;
        $model_obj = $this->$model_name ;
        // Model get

        $suffix = empty($_SERVER['QUERY_STRING']) ? '' : '?'.$_SERVER['QUERY_STRING'];

        $pagination["base_url"] = g('base_url') . "main-category/".$slug."/page/";
        $pagination["total_rows"] = $model_obj->get_pagination_total_count($paginate_param);
        $pagination["per_page"] = 9;
        $pagination['use_page_numbers']  = TRUE;
        $pagination["uri_segment"] = 4;
        $pagination["suffix"] = $suffix;
        $pagination['last_tag_open'] = '';
        
        $this->mypagination->initialize($pagination);

        $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

        $vars["data"] = $model_obj->get_pagination_data(
            $pagination["per_page"], (($page > 0)?($page-1):($page)) * $pagination["per_page"],
            $paginate_param);
        
        $vars["links"] = $this->mypagination->create_links();
        
        return $vars;
    }

  
  // public function best_seller()
  // {
  //       //TAB TITLE
  //       $method_title = ucwords($this->uri->segment(1));
  //       $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;


  //       $param_book = array();
  //       $param_book['fields'] = "product_id,product_category_id,product_name,product_slug,product_price,product_basic_price,product_desc,product_image,product_image_path,category_name,category_slug,author_name,CONCAT(author_image_path,author_image) AS author_image";
  //       $param_book['where']['product_featured'] = 1 ;
  //       $store = $this->model_product->all_products($param_book);
  //          $data['store'] = $store;
           
  //       $this->load_view("best_seller",$data); 
  // }

     public function detail($slug =' ')
    {
        global $config;
      
      //TAB TITLE
        $method_title = ucwords($this->uri->segment(1));
        $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;


        //detail
        $param = array(); 
        // $param['fields'] = "product_id,product_name,product_slug,product_price,product_desc,category_name,product_basic_price,";
      $pro = $this->model_product->product_by_slug($slug,$param);
         if (count($pro) < 1) {
          redirect("?msgtype=error&msg=invalid url");   
         }
        $data['pro'] = $pro;
    
        //INNER BANNER
         // $b = $this->get_ibanner(6);
         // $data['ititle'] = $category['category_name'];
         // $data['ibanner_img'] = $b['ibanner_img'];


        // $data['pro'] = $this->model_product->all_products($category['category_id']);
        // $data['pro']  = $pro;
        
        // $data['related'] = $this->model_product->get_featured_products(0,$category['category_id']);

        // Load View
        $this->load_view("detail", $data);
    }

     public function search()
    {
    // debug($_GET,1);
        global $config;
        $this->cms_page_id = 2;
        
        $this->layout_data['title'] = g('db.admin.site_title');
        // $method_title = ucwords($this->uri->segment(2));
        // $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;

        if(isset($_GET['search']) && !empty($_GET['search']))
        {    
            // debug($_GET,1);
        $name = trim(htmlentities($_GET['search']));
        $param['where_like'][] = array('column'=>'product_name','value'=>$name,'type'=>'both');   
        $param['fields'] = "product_id,product_name,product_slug,product_price,product_desc,category_name,parent_category_name,product_category_id,pi_image,pi_image_path";
        $pro = $this->model_product->get_all_products($param);
            // debug($this->db->last_query(),1);  
        $data['pro'] = $pro;
        }
      $data['searchfor'] = $_GET['search'];
      $data['in_banner']['inner_banner_title'] = "Search";

        $this->load_view("search", $data);
      }



  public function main_category($category_slug ="")
  {
      global $config;
      $data = array();
      //TAB TITLE
      $method_title = ucwords($this->uri->segment(1));
      $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;
      
      $param = array();
      $param['where']['parent_category_slug'] = $category_slug;
      $category_data = $this->model_parent_category->find_one_active($param);
      
      if (count($category_data) < 1) {
          redirect(l('404_override'));
      }      

        // $param_pro = array();
        // $param_pro['fields'] = "product_id,product_category_id,product_name,product_slug,product_sku,parent_category_name,category_name,pi_image,pi_image_path,product_price";
        // $param_pro['where']['product_parent_category_id'] = $category_data['parent_category_id'];
        // $pro = $this->model_product->get_all_products($param_pro);        

          $categories = $this->model_product->parents_childs_categories();

          $paginate_param = array();
          $paginate_param['fields'] = "product_id,product_category_id,product_name,product_slug,product_sku,parent_category_name,category_name,product_image,product_image_path,product_price";
          $paginate_param['where']['product_parent_category_id'] = $category_data['parent_category_id'];
          $product_data = $this->_pagination($category_slug,$paginate_param);

          $pro = $product_data['data'];
          $data['links'] = $product_data['links'];

          //$pro = $this->model_product->get_all_products($param_pro);        
          
        $data['current_parent_category'] = $category_data['parent_category_id'];

        $data['pro'] =  $pro;
        $data['categories'] = $categories; 


        $this->load_view("index", $data);   
  }





  public function sub_category($category_slug ="")
  {
    
      global $config;
      $data = array();
      //TAB TITLE
      $method_title = ucwords($this->uri->segment(1));
      $this->layout_data['title'] = g('db.admin.site_title')." | ".$method_title;
      //products
      // 
      $param = array();
      $param['where']['category_slug'] = $category_slug;
      $category_data = $this->model_category->find_one_active($param);

      // debug($category_data);

      if (count($category_data) < 1) {
          redirect(l('404_override'));
      }      

              //INNER BANNER
         $b = $this->get_ibanner(8);
         $data['ititle'] = $b['ititle'];
         $data['ibanner_img'] = $category_data['category_name'];

        $param_pro = array();
        $param_pro['fields'] = "product_id,product_category_id,product_name,product_slug,category_name,product_price,product_image,product_image_path";
        $param_pro['where']['product_category_id'] = $category_data['category_id'];
        $pro = $this->model_product->get_all_products($param_pro);        
      
        $data['pro'] =  $pro;
        
        $this->load_view("index", $data);   
          
  }


}
