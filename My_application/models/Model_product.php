<?php
class Model_product extends MY_Model {
    /**
     * TKD product MODEL
     *
     * @package     product Model
     * 
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'product';
    protected $_field_prefix    = 'product_';
    protected $_pk    = 'product_id';
    protected $_status_field    = 'product_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "
           product_id,
        product_name, category.category_name,
        CONCAT('$',product_price) AS
        product_price,
        CONCAT(product_image_path,product_image) AS product_image,
        product_status";

        // product_category_id,
        // CONCAT (pi_image_path,pi_image) AS product_image ,

   // product_id,
   //      product_name,
   //      category.category_name,
   //      CONCAT('$',product_price) AS
   //      product_price,
   //      product_in_stock,
   //      CONCAT (pi_image_path,pi_image) AS product_image ,
   //      product_best_seller,
   //      product_is_featured,
   //      product_status";
        // CONCAT(pi_image_path,pi_image) AS product_image,


       $this->pagination_params['joins'][] = array(
                                            "table"=>"category", 
                                            "joint"=>"category.category_id = product.product_category_id"
                                            );

      // $this->pagination_params['joins'][] = array(
      //                               "table"=>"brand", 
      //                               "joint"=>"brand.brand_id = product.product_brand_id"
      //                               );

       // $this->pagination_params['joins'][] = array(
       //                              "table"=>"product_image" , 
       //                              "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured=1",
       //                              "type" => "left"

       //                              );
        
        // $this->pagination_params['joins'][] = array(
        //                                             "table"=>"brand" , 
        //                                             "joint"=>"brand.brand_id = product.product_brand_id"
        //                                             );

        
        // $this->relations['product_category'] = array(
        //                 "type"=>"has_many", 
        //                 "own_key"=>"pc_product_id", 
        //                 "other_key"=>"pc_category_id",
        // );

        // $this->relations['product_color'] = array(
        //                 "type"=>"has_many", 
        //                 "own_key"=>"cp_product_id", 
        //                 "other_key"=>"cp_color_id",
        // );

        // $this->relations['product_finish'] = array(
        //                 "type"=>"has_many", 
        //                 "own_key"=>"pf_product_id", 
        //                 "other_key"=>"pf_finish_id",
        // );

        parent::__construct();

    }

// product images
    function product_images($id=' ')
    {

          $params['where']['pi_product_id'] = $id; 
          return $this->model_product_image->find_all($params); //get only image of a product 
    }

 // a product image and color
    function product_images_color($pro_id=' ')
    {

        $params['where']['pi_product_id'] = $pro_id;
         $params['joins'][] = array(

            "table"=>"color" ,

            "joint"=>"color.color_id = product_image.pi_color_id",
        );

          return $this->model_product_image->find_all($params);
    }   




      //get prodduct and  sizes
    public function get_product_sizes($id= '')
    {
            $param['where']['pc_product_id'] = $id;
            $param['joins'][] = array(
            "table"=>"size" , 
            "joint"=>"size.size_id = product_size.pc_size_id"
            );

        return $this->model_product_size->find_all($param);
    }

    //SINGLE PRODUCT DETAIL BY SLUG
    function product_by_slug($slug='',$params= array())
    {
        
        // $params['joins'][] = array(
        //     "table"=>"brand" ,
        //     "joint"=>"brand.brand_id = product.product_brand_id",
        // );
            $params['joins'][] = array(
            "table"=>"category" , 
            "joint"=>"category.category_id = product.product_category_id"
            );
            // $params['joins'][] = array(
            // "table"=>"parent_category" , 
            // "joint"=>"parent_category.parent_category_id = product.product_parent_category_id"
            // );

          $params['where']['product_slug'] = $slug; 
          return $this->model_product->find_one_active($params);
    }
    
    // fetch multiplle selected categories of product
    // public function get_product_categories($id= '')
    // {
    //         $param['where']['pc_product_id'] = $id;
    //         $param['joins'][] = array(
    //         "table"=>"category" , 
    //         "joint"=>"category.category_id = product_category.pc_category_id"
    //         );

    //     return $this->model_product_category->find_all($param);
    // }

    //FETCH PRODUCTS OF FEATURED CATGEORY
    public function get_featured_category_products()
    {
      $paramc = array();
      $paramc['where']['category_feature'] = 1;
      $category = $this->model_category->find_all_active($paramc);

      $param = array();
      $pro = array();
      if (isset($category) && array_filled($category)) {
         foreach ($category as $key => $value) {
          $param['where']['product_category_id'] = $value['category_id'];
          $param['fields'] ="product_id,product_name,product_slug,product_price,product_basic_price,product_image,product_image_path";
          $data = $this->model_product->find_all_active($param); 
      $pro[$value['category_name']] = $data;
         }
       } 
        return $pro;
    }

        // get category related products
    public function get_related_products($id= '',$pro_id ="")
    {
            $param['where']['product_category_id'] = $id;
            $param['where']['product_id !='] = $pro_id;

            $param['joins'][] = array(
            "table"=>"category" , 
            "joint"=>"category.category_id = product.product_category_id"
            );
        
           //  $param['joins'][] = array(
           //  "table"=>"product_image" ,
           //  "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
           // );
        return $this->model_product->find_all_active($param);
    }


    public function get_category_products($cat_id= '',$param = array())
    {

            
            // if (!empty($recommended) && $recommended == 1) {
            // $param['where']['product_recommended'] = 1;
            // }

            // if (!empty($trending) && $trending == 1) {
            //  $param['where']['product_best_seller'] = 1;
            // }

            // $param['where']['product_category_id'] = $id;
            $param['joins'][] = array(
            "table"=>"category" , 
            "joint"=>"category.category_id = product.product_category_id and product_category_id = $cat_id "
            );
            $param['order'] = "product_id DESC";  
        
           //  $param['joins'][] = array(
           //  "table"=>"product_image" ,
           //  "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
           //  "type" => "left" 
           // );

        return $this->model_product->find_all_active($param);
    }

    //products of featured category
    public function featured_category_and_product($parent_cat_id= '')
    {
            $param['where']['category_parent_id'] = $parent_cat_id;     
            $param['where']['category_is_featured'] = 1;
          
            $param['joins'][] = array(
            "table"=>"category" , 
            "joint"=>"category.category_id = product.product_category_id"
            );
        
            $param['joins'][] = array(
            "table"=>"product_image" ,
            "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
            "type" => "left" 
           );
            $param['order'] = "product_id DESC";     
        return $this->model_product->find_all_active($param);
    }

    // get color of product
    public function get_product_color($id= '')
    {
            $param_color['where']['cp_product_id'] = $id;
            $param_color['joins'][] = array(
            "table"=>"color", 
            "joint"=>"color.color_id = product_color.cp_color_id"
            );
        return $this->model_product_color->find_all($param_color);
    }

//get all products 
    function all_products($param = array())
    {      
        //     $params['joins'][] = array(
        //     "table"=>"brand" ,
        //     "joint"=>"brand.brand_id = product.product_brand_id",
        // );

      // if (!empty($category_id) && $category_id > 0) {
      //  $params['where']['product_category_id'] = $category_id;
      // }

      //   $params['joins'][] = array(
      //       "table"=>"category" ,
      //       "joint"=>"category.category_id = product.product_category_id",
      //   );

        //  $params['joins'][] = array(
        //     "table"=>"product_image" ,
        //     "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
        //     "type" => "left" 
        // );
          return $this->model_product->find_all_active($param);
    }

    public function get_all_products($param = array())
    {

            
            // $param['joins'][] = array(
            // "table"=>"sub_category" , 
            // "joint"=>"sub_category.sub_category_id = product.product_sub_category_id"
            // );
            
            $param['joins'][] = array(
            "table"=>"category" , 
            "joint"=>"category.category_id = product.product_category_id"
            );
            
            // $param['joins'][] = array(
            // "table"=>"parent_category" , 
            // "joint"=>"parent_category.parent_category_id = product.product_parent_category_id",
            // // "type" => "left" 
            // );

            $param['order'] = "product_id DESC";  
        
           //  $param['joins'][] = array(
           //  "table"=>"product_image" ,
           //  "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
           //  "type" => "left" 
           // );

        return $this->model_product->find_all_active($param);
    }
    
    //get all products by parent category 
    function parent_category_products($pcategory_id = "")
    {
      $params = array();

      if (!empty($pcategory_id) && $pcategory_id > 0) {
       $params['where']['product_parent_category_id'] = $pcategory_id;
      }

        $params['joins'][] = array(
            "table"=>"category" ,
            "joint"=>"category.category_id = product.product_category_id",
        );

        // $params['joins'][] = array(
        //     "table"=>"category" ,
        //     "joint"=>"category.category_id = product.product_category_id",
        // );
        //  $params['joins'][] = array(
        //     "table"=>"product_image" ,
        //     "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
        //     "type" => "left" 
        // );
          return $this->model_product->find_all_active($params);
    }




    //single product detail by slug
    function product_details($slug='')
    {
        //     $params['joins'][] = array(

        //     "table"=>"brand" ,

        //     "joint"=>"brand.brand_id = product.product_brand_id",
        // );
        
         $params['joins'][] = array(

            "table"=>"category" ,

            "joint"=>"category.category_id = product.product_category_id",
        );

          $params['where']['product_slug'] = $slug; 

          return $this->model_product->find_one_active($params);

    }

            //all product detail where new
    function all_newproduct_details($limit="")
    {
        //    $params['joins'][] = array(
        //     "table"=>"brand" ,
        //     "joint"=>"brand.brand_id = product.product_brand_id",
        // );
        //   $params['joins'][] = array(
        //     "table"=>"sub_category" ,
        //     "joint"=>"sub_category.sub_category_id = product.product_category_id",
        // );

          if (!empty($limit) && $limit > 0) {
        $params['limit'] = $limit;
        }

         $params['joins'][] = array(

            "table"=>"category" ,

            "joint"=>"category.category_id = product.product_category_id",
        );
        //  $params['joins'][] = array(
        //     "table"=>"product_image" ,
        //     "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured =1",
        //         "type" => "left"
        // );
          $params['where']['product_is_new'] = 1; 
          $params['order'] = "product_id DESC"; 
          return $this->model_product->find_all_active($params);
    }

    //all featured products
 function all_product_details()
    {
           $params['joins'][] = array(
            "table"=>"brand" ,
            "joint"=>"brand.brand_id = product.product_brand_id",
        );
          $params['joins'][] = array(
            "table"=>"sub_category" ,
            "joint"=>"sub_category.sub_category_id = product.product_category_id",
        );
         $params['joins'][] = array(
            "table"=>"product_image" ,
            "joint"=>"product_image.pi_product_id = product.product_id",
        );
          // $params['where']['pi_is_featured'] = 1;
          
          return $this->model_product->find_all_active($params);
    }

    //all product of sub-category of parent category
       function products_of_all_sub_cat($sub_id_array = array(),$params=array())
    {

        //    $params['joins'][] = array(

        //     "table"=>"brand" ,

        //     "joint"=>"brand.brand_id = product.product_brand_id",
        // );
          

          $params['joins'][] = array(

            "table"=>"category" ,

            "joint"=>"category.category_id = product.product_category_id",
            "type" => "left"
        );

        //  $params['joins'][] = array(

        //     "table"=>"product_image" ,

        //     "joint"=>"product_image.pi_product_id = product.product_id",

        // );

          // $params['where']['pi_is_featured'] = 1;
          $params['where_in']['product_category_id'] = $sub_id_array;

          return $this->model_product->find_all_active($params);

    }



    //fetch all sub categories of parent catgeory
        public function childes_of_parent_category($parent_id ='')
        {
          $params['joins'][] = array(

            "table"=>"category" ,

            "joint"=>"category.category_id = sub_category.sub_category_parent_id",
        );
          $params['where']['sub_category_parent_id'] = $parent_id;

          return $this->model_sub_category->find_all_active($params);
        }

        //single product detail
    function product_details_by_id($id='')
    {
          $params['joins'][] = array(
            "table"=>"category" ,
            "joint"=>"category.category_id = product.product_category_id",
        );
        //  $params['joins'][] = array(

        //     "table"=>"product_image" ,

        //     "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured =1",
        //     "type" => "left"
        // );
          $params['where']['product_id'] = $id; 
          return $this->model_product->find_one_active($params);
    }

       //brand wise products
    function products_brand_by_slug($slug='')
    {
          $find['joins'][] = array(
            "table"=>"brand" ,
            "joint"=>"brand.brand_id = product.product_brand_id",
        );

         $find['joins'][] = array(

            "table"=>"product_image" ,
            "joint"=>"product_image.pi_product_id = product.product_id",
        );
          $find['where']['pi_is_featured'] = 1;

        $find['where']['brand.brand_slug'] = $slug;

        return $this->model_product->find_all_active($find);   
    }


    //get featured products
    public function get_featured_products($limit=0,$cat_id = "")
    {
        $params['where']['product_is_featured'] = 1 ;

        if ($cat_id > 0) {
        $params['where']['product_category_id'] = $cat_id ;
        }
        
        if ($limit > 0) {
          $params['limit'] = $limit;
        }

        $params['order'] = "product_id DESC";
         $params['joins'][] = array(
            "table"=>"category" ,
            "joint"=>"category.category_id = product.product_category_id",
        );
          return $this->model_product->find_all_active($params);
    }

        //get upcoming products
     public function get_upcoming_products($limit =" ")
    {
        $params['where']['product_is_upcoming'] = 1 ;
        
        if ($limit > 0) {
          $params['limit'] = $limit;
        }

        $params['order'] = "product_id DESC";
        // $params['where']['pi_is_featured'] = 1;
         $params['joins'][] = array(

            "table"=>"category" ,

            "joint"=>"category.category_id = product.product_category_id",

        );

         $params['joins'][] = array(

            "table"=>"product_image" ,

            "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
            "type" => "left"
        );
          return $this->model_product->find_all_active($params);
    }

     //get featured products
     public function best_seller_products($limit = "")
    {
        $params['where']['product_best_seller'] = 1 ;
        
        if (!empty($limit) && $limit > 0) {
        $params['limit'] = $limit;
        }
        
         $params['joins'][] = array(
            "table"=>"category" ,
            "joint"=>"category.category_id = product.product_category_id",
        );
        
        //  $params['joins'][] = array(
        //     "table"=>"product_image" ,
        //     "joint"=>"product_image.pi_product_id = product.product_id and pi_is_featured = 1",
        //     "type" => "left"
        // );
        $params['order'] = "product_id DESC";
          return $this->model_product->find_all_active($params);
    }



    //calculate discount
    function discount($price='',$discount='')
    {
        $discountf = ($discount/100);

        $portion = $discountf * $price;
        $final_price = $price - round($portion,2);
        return  $final_price;
    }

//no of brand products
    public function no_brand_product($brand_id = '')
    {
         $find['joins'][] = array(
            "table"=>"brand" ,
            "joint"=>"brand.brand_id = product.product_brand_id",
        );
          $find['where']['product.product_brand_id'] = $brand_id;
            $query = $this->model_product->find_all_active($find);
        return count($query) ;   
    }

    //no of category products
    public function no_category_product($cat_id = '')
    {
         $find['joins'][] = array(
            "table"=>"category" ,
            "joint"=>"category.category_id = product.product_category_id",
        );
          $find['where']['product.product_category_id'] = $cat_id;
            $query = $this->model_product->find_all_active($find);
        return count($query) ;   
    }


    //min price in product table
    public function min_price()
    {
      // $q = "SELECT MIN(product_price) AS  `min` FROM lin_product(SELECT * FROM lin_product WHERE product_status = 1)";
      $q = "SELECT min(product_price) AS `min` FROM (SELECT * FROM sp_product WHERE product_status = 1) AS `min` ";
      $res = $this->db->query($q)->result_array();
      // debug($res[0]['min']);
      return $res[0]['min'];
    }

//MAX price in product table
    public function max_price()
    {
      $q = "SELECT max(product_price) AS `max` FROM (SELECT * FROM sp_product WHERE product_status = 1) AS `res` ";
      $res = $this->db->query($q)->result_array();
      // debug($res[0]['min']);
      return $res[0]['max'];
    }
    // Get product info (no join)
    // public function get_info($id)
    // {
    //     // Set params
    //     $params['fields'] = "product_name, product_desc, (select CONCAT(pi_image_path, '', pi_image) from ads_product_image where pi_is_featured=1 and pi_product_id=$id) as product_image";
    //     // Query
    //     $result = (array) $this->find_by_pk($id, true, $params);
    //     if(array_filled($result)){
    //         $result = array(
    //             'product_name'=>$result['product_name'],
    //             'product_desc'=>html_entity_decode($result['product_desc']),
    //             'product_image'=>g('base_url') . $result['product_image'],
    //         );
    //     }
    //     // Return
    //     return $result;
    // }


  

 

    // // Get product info (use in select2 edit)
    // public function get_course_name($id=0)
    // {
    //     // Set params
    //     $params['fields'] = "product_id,product_name";
    //     $params['where']['product_id'] = $id;
    //     $result = $this->find_one_active($params);
    //     return $result;
    // }


    // public function get_data($limit = '', $start = '', $param = array())
    // {
    //     //extract($var);

    //     if(!empty($limit) && $limit > 0)
    //         $param['limit'] = $limit;

    //     if (!empty($start))
    //         $param['offset'] = $start;


    //     $param['order'] = 'product_id DESC';

    //     $data = $this->find_all_active($param);
        
    //     return $data;
    // }




 


    // public function join_catalog($type="right" , $append_joint ="" , $prepend_joint = "")
    // {
    //     $joint = $prepend_joint . "product_catalog_id = catalog_id" . $append_joint ; 
    //     return $this->prep_join("catalog" , $joint, $type );
    // }
    
    // public function join_product_image($type="right" , $append_joint ="" , $prepend_joint = "")
    // {
    //     $joint = $prepend_joint . "product_id = pi_product_id " . $append_joint ; 
    //     return $this->prep_join("product_image" , $joint, $type );
    // }


    public function get_product_by_id($id = 0 , $params = array())
    {
        // Return product by ID
        $id = intval($id);
        if(!$id)
            return false;

        $params['joins'][] = array( 
                                    "table"=>"product_image" ,
                                    "joint"=>"product_id = pi_product_id AND pi_is_featured = 1" , 
                                    "type"=>"left" ,
                                );
        $params['where']['product_id'] = $id;
        return $this->find_one($params);
    }

    public function get_pagination_total_count()
    {  
       return $this->find_count_active();
    }

    public function get_pagination_data($limit = '', $offset = '')
    {
      $params['limit'] = $limit;
      $params['offset'] = $offset;
       return $this->all_products($params);
    }

// pagination for category 
     public function get_pagination_total_count2($category_id=0)
    {
       if ($category_id > 0) {
        $param['where']['product_category_id'] = $category_id;
        }
      return $this->find_count_active($param);
    }

    public function get_pagination_data2($limit = '', $offset = '',$category_id=0)
    {
      $params['limit'] = $limit;
      $params['offset'] = $offset;
       return $this->all_products($params, $category_id);
    }

    // // category wise products data
    // public function category_wise_products()
    // {
    //     $all_products = $this->model_product->all_products();  
         
    //      $cat_pro  = array();
    //      foreach ($all_products as $key => $value) {
    //         $cat_pro[$value['category_id']][] = $value;
    //       } 
    //       return $cat_pro;
    // }

    //sparzsize
    public function update_inventory($id="" , $selected_qty ="")
    {
                $rec =  $this->model_product_size->find_by_pk($id);

                $total_qty = $rec['pc_qty'];
                $sold_qty = $rec['pc_sold']+$selected_qty;
                $balance_qty = $total_qty-$sold_qty;

                $param['pc_sold'] = $sold_qty;
                $param['pc_leftqty'] = $balance_qty;
                $this->model_product_size->update_by_pk($id,$param);
    }

    public function update_pro_inventory($id="" , $selected_qty ="")
    {
                $rec =  $this->model_product->find_by_pk($id);

                $total_qty = $rec['product_qty'];
                $sold_qty = $rec['product_qty_sold']+$selected_qty;
                $balance_qty = $total_qty-$sold_qty;

                $param['product_qty_sold'] = $sold_qty;
                $param['product_in_stock'] = $balance_qty;
                $this->model_product->update_by_pk($id,$param);
    }
   


    //calculate rating 
    public function rating($pro_id ="" )
    {
        $par['where']['comment_product_id']  = $pro_id;
        $res =  $this->model_comment->find_all_active($par);   
        if (count($res) > 0) {
        $rated_net ;
        foreach ($res as $key => $value) {
            $rated_net += ($value['comment_rating']/5);
        }
         $average  = (($rated_net/count($res) )*100);
        return $average;
        }
        else
        {
            return 0;
        }
     
    }


    // public function get_available_product_by_id($id = 0 , $params = array())
    // {
    //     // Return Available Product...
    //     $params['where']['product_qty - product_qty_sold >'] = 0;
    //     return $this->get_product_by_id($id, $params);
    // }

    // // Get Product BY Catalog ID
    // public function get_catalog( $catalog_id , $params = array() )
    // {
    //     if(!$catalog_id)
    //         return false;
    //     $params['where']['product_catalog_id'] = intval($catalog_id);
    //     return $this->get_products($params);
    // }



    // public function get_details_by_slug($slug = '')
    // {
    //     // Return product by slug
    //     $slug = trim($slug);
    //     if(!$slug)
    //         return false;
    //     $params['where']['product_slug'] = $slug;

    //     return $this->get_details($params);

    // }

    // public function get_available_products($params=array() , $list = false)
    // {
    //     $params['where']['product_qty - product_qty_sold >'] = 0;
    //     $data = $this->get_products($params , $list);
    //     return $data; 
    // }

    // public function get_products($params=array() , $list = false)
    // {
    //     $params['joins'][] = $this->join_product_image("left" , " AND pi_is_featured = 1");
    //     //$params['group'] = "product_id";  // To avoid product duplications - Just in case
    //     if($list)
    //         $data = $this->find_all_list_active($params , "product_name");
    //     else
    //         $data = $this->find_all_active($params);
    //     return $data; 
    // }

    // public function get_featured_products($params=array())
    // {
    //     $params['where']['product_is_featured'] = 1 ;
    //     $params['limit'] = "4";
    //     $data = $this->get_products($params);
    //     return $data;
    // }

    // public function get_latest($params=array())
    // {
    //     $params['limit'] = $params['limit'] ? $params['limit'] : "12";
    //     $params['order'] = "product_id DESC";
    //     $data = $this->get_products($params);
    //     return $data;
    // }
    // public function save()
    //   {
        
    //     $id = parent::save();
    //     $param['fields'] = 'product_name';
    //     $d = $this->model_product->find_by_pk($id , false , $param);
    //     $productslug = self::clean($d['product_name'].'-'.$id);
    //     $data['product_slug'] = $productslug;
    //     $this->model_product->update_by_pk($id , $data);
    //     return $id;

    //   }
    //   function clean($string) {
    //     $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    //     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    // }
    // public function get_most_sold($params=array())
    // {
    //     $params['limit'] = isset( $params['limit'] ) && $params['limit'] ? $params['limit'] : "12";
    //     $params['order'] = "product_qty_sold DESC";
    //     $data = $this->get_products($params);
    //     return $data;
    // }

    // public function get_details($params = array())
    // {
    //     // Return product by slug
    //     $params['joins'][] = array(
    //                                 "table" => "catalog",
    //                                 "joint" => "catalog.catalog_id = product.product_catalog_id",
    //                             );
    //     $params['joins'][] = array(
    //                                 "table" => "brand",
    //                                 "joint" => "brand_id = catalog_brand_id",
    //                                 "type" => "left",
    //                             );
    //     $params['joins'][] = array(
    //                                 "table" => "brand_size_chart",
    //                                 "joint" => "bsc_id = product_size_chart_id",
    //                                 "type" => "left",
    //                             );
    //     $product = $this->find_one($params);

    //     if($product)
    //     {
    //         $prdimg_params = array();
    //         $prdimg_params['where']['pi_product_id'] = $product['product_id'] ;
    //         $product['pi_images'] = $this->model_product_image->find_all($prdimg_params);

    //         // Get Addons
    //         $product['addons'] = $this->model_product_addon->get_product_addons($product['product_id']);

    //         // Get Attributes
    //         $product['attributes'] = $this->model_product_attribute->get_product_attributes($product['product_id']);

    //         // Get Category
    //         $product['category'] = $this->model_product_category->get_product_categorys($product['product_id']);
            
    //         // Get Attributes
    //         if( $product[ 'product_stitched' ] )
    //             $pis_params['where']['pis_qty - pis_qty_sold >'] = 0 ;
    //         $product['item_sets'] = $this->model_product_item_set->get_product_set( $product['product_id'] , $pis_params );
    //     }
    //     return $product;
    // }

    /*
    * table             Table Name
    * Name              FIeld Name
    * label             Field Label / Textual Representation in form and DT headings
    * type              Field type : hidden, text, textarea, editor, etc etc. 
    *                                 Implementation in form_generator.php
    * type_dt           Type used by prepare_datatables method in controller to prepare DT value
    *                                 If left blank, prepare_datatable Will opt to use 'type'
    * type_filter_dt    Used by DT FILTER PREPRATION IN datatables.php
    * attributes        HTML Field Attributes
    * js_rules          Rules to be aplied in JS (form validation)
    * rules             Server side Validation. Supports CI Native rules

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';


        $fields = array(
        
              'product_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              // 'product_parent_category_id' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'product_parent_category_id',
              //        'label'   => 'Parent Category',
              //        'type'   => 'dropdown',
              //        'type_dt'   => 'text',
              //        'attributes'   => array("class"=>"ajax-populate",
              //                               "additional" => 'data-target="product-product_category_id" '
              //                           ),
              //        'type_filter_dt'   => 'dropdown',
              //        'js_rules'   => 'required',
              //        'rules'   => 'required|trim'
              //   ),

              // 'product_category_id' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'product_category_id',
              //        'label'   => 'Category',
              //        'type'   => 'dropdown',
              //        'type_dt'   => 'text',
              //        'type_filter_dt'   => 'dropdown',
              //        'attributes'   => array("class"=>"ajax-populate",
              //                                "additional" => ' 
              //                                               data-populate-uri="get_list"
              //                                               data-uri="product"
              //                                               data-dd_key="category_id"
              //                                               data-dd_value="category_name"'
              //                           ),
              //        'js_rules'   => 'required',
              //        'rules'   => 'required|trim'
              //   ),

            
              'product_category_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_category_id',
                     'label'   => 'Category',
                     'type'   => 'dropdown',
                     'type_dt'   => 'text',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),


         
              'product_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                    'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

            'product_slug'  => array(
                'table'   => $this->_table,
                'name'   => 'product_slug',
                'label'   => 'Slug',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => array("is_slug" => array() ),
                // 'rules'   => 'trim|htmlentities'
                'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
            ),

             'product_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),




            // 'product_title' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'product_title',
            //          'label'   => 'Tag 1',
            //          'type'   => 'text',
            //          'attributes'   => array(),
            //          //'attributes'   => array(),
            //          // 'js_rules'   => 'required',
            //          'rules'   => 'trim|htmlentities'
            //       ),


  
            // 'product_title2' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'product_title2',
            //          'label'   => 'Tag 2',
            //          'type'   => 'text',
            //          'attributes'   => array(),
            //          //'attributes'   => array(),
            //          // 'js_rules'   => 'required',
            //          'rules'   => 'trim|htmlentities'
            //       ),
           'product_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_desc',
                     'label'   => ' Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities|required'
                  ),
            

           'product_desc2' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_desc2',
                     'label'   => 'Long Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),



           'product_desc3' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_desc3',
                     'label'   => 'Long Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
           

            
       
/*
             'product_price_range' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_price_range',
                     'label'   => 'Price Range',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     // 'rules'   => 'required|trim|is_natural_no_zero|htmlentities'
                     'rules'   => 'required|trim|htmlentities'
                  ),
*/

               // 'product_discount_price' => array(
               //       'table'   => $this->_table,
               //       'name'   => 'product_discount_price',
               //       'label'   => 'Discounted Price',
               //       'type'   => 'text',
               //       'attributes'   => array(),
               //       // 'js_rules'   => 'required',
               //       'rules'   => 'trim|numeric|htmlentities|is_natural_no_zero'
               //    ),


             // 'product_discount_percent' => array(
             //         'table'   => $this->_table,
             //         'name'   => 'product_discount_percent',
             //         'label'   => 'Discount %',
             //         'type'   => 'text',
             //         'attributes'   => array(),
             //         // 'js_rules'   => 'required',
             //         'rules'   => 'numeric|trim|htmlentities'
             //      ),

    // 'product_sku' => array(
    //                  'table'   => $this->_table,
    //                  'name'   => 'product_sku',
    //                  'label'   => 'Product SKU #',
    //                  'type'   => 'text',
    //                  'attributes'   => array(),
    //                  'js_rules'   => 'required',
    //                  'rules'   => 'required|trim|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'sku]'
    //               ),


            // 'product_category' => array(
            //         'table'   => "product_category",
            //         'name'   => 'pc_category_id',
            //         'label'   => 'Catgeory',
            //         'type'   => 'multiselect',
            //         'attributes'   => array(),
            //         'js_rules'   => '',
            //         'rules'   => '',
            //           ),


  // 'product_finish' => array(
  //                   'table'   => "product_finish",
  //                   'name'   => 'pf_finish_id',
  //                   'label'   => 'Select Finishes',
  //                   'type'   => 'multiselect',
  //                   'attributes'   => array(),
  //                   'js_rules'   => '',
  //                   'rules'   => '',
  //                     ),


//     'product_size' => array(
//             'table'   => "product_size",
//             'name'   => 'pc_size_id',
//             'label'   => 'Size',
//             'type'   => 'multiselect',
//             'attributes'   => array(),
//             'js_rules'   => '',
//             'rules'   => '',
// ),



   
     // 'product_width' => array(
     //                 'table'   => $this->_table,
     //                 'name'   => 'product_width',
     //                 'label'   => 'Width',
     //                 'type'   => 'text',
     //                 'attributes'   => array(),
     //                 'js_rules'   => '',
     //                 'rules'   => 'required|trim|htmlentities'
     //              ),

     // 'product_height' => array(
     //                 'table'   => $this->_table,
     //                 'name'   => 'product_height',
     //                 'label'   => 'Height',
     //                 'type'   => 'text',
     //                 'attributes'   => array(),
     //                 'js_rules'   => '',
     //                 'rules'   => 'required|trim|htmlentities'
     //              ),

          
              // 'product_desc' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'product_desc',
              //        'label'   => 'Why it is used',
              //        'type'   => 'textarea',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => '|trim|htmlentities'
              //     ),


              // 'product_image' => array(
              //        'table'   => $this->_table, 
              //        'name'   => 'product_image',
              //        'label'   => 'Front Image',
              //        'name_path'   => 'product_image_path',
              //        //'upload_config'   => 'site_upload_product',
              //        'thumb'   => array(
              //                           array('name'=>'product_image_thumb','max_width'=>150, 'max_height'=>150),
              //                       ),
              //        'type'   => 'fileupload',
              //        'type_dt'   => 'image',
              //        'randomize' => true,
              //        'preview'   => 'true',
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"10%"),
              //        'rules'   => 'trim|htmlentities'
              //     ),



              /*
              'product_meta_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_meta_title',
                     'label'   => 'Meta Title',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_meta_description' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_meta_description',
                     'label'   => 'Meta Description',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_meta_keywords' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_meta_keywords',
                     'label'   => 'Meta Keywords',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
                */  

                  //  'product_keywords' => array(
                  //    'table'   => $this->_table,
                  //    'name'   => 'product_keywords',
                  //    'label'   => 'Keywords<br/><span style="color:red; font-size:10px">seperate by comma</span>',
                  //    'type'   => 'text',
                  //    'attributes'   => array(),
                  //    'dt_attributes'   => array("width"=>"10%"),
                  //    'js_rules'   => 'required',
                  //    'rules'   => 'required|trim|htmlentities'
                  // ),

            // 'product_qty' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'product_qty',
            //          'label'   => 'Available Qty',
            //          'type'   => 'text',
            //          // 'list_data' => array(),
            //          // 'default'   => '1',
            //          'attributes'   => array(),
            //          'dt_attributes'   => array("width"=>"7%"),
            //          'rules'   => 'trim'
            //       ),

            // 'product_qty_sold' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'product_qty_sold',
            //          'label'   => 'Product Sold',
            //          'type'   => 'readonly',
            //          'attributes'   => array(),
            //          'dt_attributes'   => array("width"=>"7%"),
            //          'rules'   => 'trim'
            //       ),

                  //  'product_in_stock' => array(
                  //    'table'   => $this->_table,
                  //    'name'   => 'product_in_stock',
                  //    'label'   => 'In Stock',
                  //    'type'   => 'readonly',
                  //    'attributes'   => array(),
                  //    'dt_attributes'   => array("width"=>"7%"),
                  //    'rules'   => 'trim'
                  // ),
  

     

     // 'product_shortdesc1' => array(
     //                 'table'   => $this->_table,
     //                 'name'   => 'product_shortdesc1',
     //                 'label'   => 'Short Description 1',
     //                 'type'   => 'editor',
     //                 'attributes'   => array(),
     //                 'js_rules'   => '',
     //                 'rules'   => 'trim|htmlentities'
     //              ),
          
     //      'product_shortdesc2' => array(
     //                 'table'   => $this->_table,
     //                 'name'   => 'product_shortdesc2',
     //                 'label'   => 'Short Description 2',
     //                 'type'   => 'editor',
     //                 'attributes'   => array(),
     //                 'js_rules'   => '',
     //                 'rules'   => 'trim|htmlentities'
     //              ),

     //           'product_shortdesc3' => array(
     //                 'table'   => $this->_table,
     //                 'name'   => 'product_shortdesc3',
     //                 'label'   => 'Short Description 3',
     //                 'type'   => 'editor',
     //                 'attributes'   => array(),
     //                 'js_rules'   => '',
     //                 'rules'   => 'trim|htmlentities'
     //              ),

     // 'product_shortdesc4' => array(
     //                 'table'   => $this->_table,
     //                 'name'   => 'product_shortdesc4',
     //                 'label'   => 'Short Description 4',
     //                 'type'   => 'editor',
     //                 'attributes'   => array(),
     //                 'js_rules'   => '',
     //                 'rules'   => 'trim|htmlentities'
     //              ),

            'product_image' => array(
                     'table'   => $this->_table, 
                     'name'   => 'product_image',
                     'label'   => 'Image',
                     'name_path'   => 'product_image_path',
                     'upload_config'   => 'site_upload_product',
                     'thumb'   => array(
                                        array('name'=>'product_image_thumb','max_width'=>150, 'max_height'=>150),
                                    ),
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                     'attributes'   => array(),
                     // 'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities',
                     'js_rules'=>$is_required_image
                  ),

           // 'product_is_new' => array(
                  //    'table'   => $this->_table,
                  //    'name'   => 'product_is_new',
                  //    'label'   => 'Mark as New',
                  //    'type'   => 'switch',
                  //    'type_dt'   => 'dropdown',
                  //    'type_filter_dt' => 'dropdown',
                  //    //'list_data_key' => "product_status" ,
                  //    'list_data' => array(),
                  //    'default'   => '0',
                  //    'attributes'   => array(),
                  //    'dt_attributes'   => array("width"=>"7%"),
                  //    'rules'   => 'trim'
                  // ),




                // 'product_best_seller' => array(
                //      'table'   => $this->_table,
                //      'name'   => 'product_best_seller',
                //      'label'   => 'Trending Now/Best Seller',
                //      'type'   => 'switch',
                //      'type_dt'   => 'dropdown',
                //      'type_filter_dt' => 'dropdown',
                //      //'list_data_key' => "product_status" ,
                //      'list_data' => array(),
                //      'default'   => '0',
                //      'attributes'   => array(),
                //      'dt_attributes'   => array("width"=>"5px"),
                //      'rules'   => 'trim'
                //   ),

                 'product_is_featured' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_is_featured',
                     'label'   => 'Featured Product',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "product_status" ,
                     'list_data' => array(),
                     'default'   => '0',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),   

      
              // 'product_recommended' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'product_recommended',
              //        'label'   => 'Recommended',
              //        'type'   => 'switch',
              //        'type_dt'   => 'dropdown',
              //        'type_filter_dt' => 'dropdown',
              //        'list_data_key' => "product_status" ,
              //        'list_data' => array(),
              //        'default'   => '0',
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"7%"),
              //        'rules'   => 'trim'
              //     ),   

                
              //     'product_is_upcoming' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'product_is_upcoming',
              //        'label'   => 'Upcoming Products',
              //        'type'   => 'switch',
              //        'type_dt'   => 'dropdown',
              //        'type_filter_dt' => 'dropdown',
              //        'list_data_key' => "product_status" ,
              //        'list_data' => array(),
              //        'default'   => '0',
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"7%"),
              //        'rules'   => 'trim'
              //     ),   

   //                'product_bottle' => array(
   //                   'table'   => $this->_table,
   //                   'name'   => 'product_bottle',
   //                   'label'   => 'Take Bottle Message',
   //                   'type'   => 'switch',
   //                   'type_dt'   => 'dropdown',
   //                   'type_filter_dt' => 'dropdown',
   //                   //'list_data_key' => "product_status" ,
   //                   'list_data' => array(),
   //                   'default'   => '1',
   //                   'attributes'   => array(),
   //                   'dt_attributes'   => array("width"=>"7%"),
   //                   'rules'   => 'trim'
   //                ),

   // 'product_card' => array(
   //                   'table'   => $this->_table,
   //                   'name'   => 'product_card',
   //                   'label'   => 'Take Card Message',
   //                   'type'   => 'switch',
   //                   'type_dt'   => 'dropdown',
   //                   'type_filter_dt' => 'dropdown',
   //                   //'list_data_key' => "product_status" ,
   //                   'list_data' => array(),
   //                   'default'   => '1',
   //                   'attributes'   => array(),
   //                   'dt_attributes'   => array("width"=>"7%"),
   //                   'rules'   => 'trim'
   //                ),
              
              
      // 'product_is_featured' => array(
      //                'table'   => $this->_table,
      //                'name'   => 'product_is_featured',
      //                'label'   => 'Featured',
      //                'type'   => 'switch',
      //                'type_dt'   => 'dropdown',
      //                'type_filter_dt' => 'dropdown',
      //                //'list_data_key' => "product_is_featured" ,
      //                'list_data' => array(),
      //                'default'   => '1',
      //                'attributes'   => array(),
      //                'dt_attributes'   => array("width"=>"7%"),
      //                'rules'   => 'trim'
      //             ),                  

              'product_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     //'list_data_key' => "product_status" ,
                     'list_data' => array(),
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),
              
            );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>
