<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Product extends MY_Controller {

    /**
     * product page
     *
     *
     * @version		1.0
     * @since		2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "
        product_id,
        product_name,
        product_category_id,
        product_price,
        product_image,
        product_status";

        // product_image,
        $this->dt_params['searchable'] = array("product_id","product_name","product_category_id","product_best_seller",
            "product_is_featured","product_status");
        $this->dt_params['action'] = array(
            "hide_add_button" => false ,
            "hide" => false ,
            "show_delete" => true ,
            "show_edit" => true ,
            "order_field" => false ,
            "show_view" => false ,
            "extra" => array() ,
        );

        $this->_list_data['product_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );

        $this->_list_data['product_best_seller'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">NO</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">YES</span>"
        );

      

        $this->_list_data['product_category_id'] = $this->model_category->find_all_list_active(array(),
            "category_name");

        // $this->_list_data['product_parent_category_id'] = $this->model_parent_category->find_all_list_active(array(),"parent_category_name");

        // $this->_list_data['product_category_id'] = $this->model_category->find_all_list_active(array(),
        // $this->_list_data['product_category_id'] = $this->model_category->find_all_list_active(array(),
        //     "category_name");



            // 

        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];

        // Populating LISTDATA

        //$_POST = $this->input->post(NULL, true);  // return POST with xss filter
        $_POST = $this->input->post(NULL, false); // return POST without xss filter
    }

    public function index()
    {
        // Popluated LISTDATA in constructor
        parent::index();
    }

    public function add($id='', $data=array())
    {
    
        if (isset($_POST) && array_filled($_POST)) {

         $_POST['product']['product_in_stock'] = $_POST['product']['product_qty'] - $_POST['product']['product_qty_sold'];
        }
        // Popluated LISTDATA in constructor
        $this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
        $this->register_plugins("jquery-file-upload");
        
        // $this->_list_data['product_size'] = $this->model_size->find_all_list_active(array(),"size_name");

     // $this->_list_data['product_color'] = $this->model_color->find_all_list_active(array(),"color_name");

        
        parent::add($id, $data);
    }


    //saving the qty against product size
   // public function save_qty()
   //  {
   //      // debug($_POST);
   //      // exit;
   //      $pk_id = $_POST["size_id"];
   //      $tot_qty = $_POST["qty"];
   //      $leftqty = $_POST["lqty"];
        
    
   //      //total left over products(adding the left and new added)
   //      $total_available = $tot_qty + $leftqty;
        
   //      $record = $this->model_product_size->find_by_pk($pk_id);
   //    // debug($record);
   //      $total = $record['pc_qty'] + $tot_qty;
   //      // debug($total);

   //      if (intval($tot_qty)) {
            
   //          $param["pc_qty"] =  $total;
   //          $param["pc_leftqty"] =  $total - $record['pc_sold'];//$total_available;
   //          $up = $this->model_product_size->update_by_pk($pk_id,$param);
            
   //          $param["txt"] = "Updated";
   //          $param["status"] = 1;
   //          $param["id"] = $pk_id;
   //          echo json_encode($param);
   //      }
   //      else
   //      {
   //          $param["txt"] = "Input must be a number";
   //          $param["status"] = 0;
   //          echo json_encode($param);       
   //      }
        
   //  }
    
   // public function child_category()
   // {
   //      $pid = $this->input->post("pcategoryid");
   //      $child_category = $this->model_category->find_all_active(array("where" => array("category_parent_id" => $pid)));
   //      // debug($child_category);    
   //      $option = "";

   //      if (isset($child_category) && array_filled($child_category)) {
   //          foreach ($child_category as $key => $value) {
   //              $option .= "<option value=".$value['category_id'].">".$value['category_name']."</option>";
   //          }
   //          $param["status"] = 1;
   //          $param["data"] = $option;
   //      }else
   //      {
   //          $param["status"] = 0;
   //      }

   //          echo json_encode($param); 
   // }

public function get_list()
{
    $id = $this->input->post("search_val"); 
    $param['fields'] = "category_id,category_name";
    $param['where']['category_parent_id'] = $id ;
    $data = $this->_list_data['product_category_id'] = $this->model_category->find_all_active($param);
    echo json_encode($data);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */