<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comment extends MY_Controller {

    /**
     * Comment
     *
     * @package     Comment
     */

    public $_list_data = array();

    public function __construct() {

        global $config;
        
        parent::__construct();
        
        $this->dt_params['dt_headings'] = "comment_id,comment_name,comment_product_id,comment_status";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);

        $this->dt_params['action'] = array(
                                        "hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => false ,
                                        "order_field" => false ,
                                        "show_view" => true ,
                                        "extra" => array() ,
                                      );

        // Following are common so, defined in MY_Controller_Admin
        // $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
        // $this->dt_params['paginate']['uri'] = "paginate";
        // $this->dt_params['paginate']['update_status_uri'] = "update_status";
         
              $this->_list_data['comment_status'] = array(
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );

    $this->_list_data['comment_product_id'] = $this->model_painting->find_all_list_active(array(),"painting_name");


        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];
        
        // Populating LISTDATA
        $_POST = $this->input->post(NULL, true);
    }

    public function add($id='', $data=array())
    {
        parent::add($id, $data);
    }

    public function ajax_view($id='')
    {
        if($id)
        {
            // $this->model_comment->update_by_pk($id, array("comment_status" => 0));
        }
        parent::ajax_view($id);
    }


    public function get_view($id=0) {

        global $config;
        $result = array();
        $class_name = $this->router->class;
        $model_name = 'model_'.$class_name ;
        $model_obj = $this->$model_name ;

        $form_fields = $model_obj->get_fields();
        if($id)
        {
            
            $data = $this->$model_name->find_by_pk($id,false, $params);

            // print_r($job_data);  
            $par['comment_status'] = 0;
            $this->$model_name->update_by_pk($id,$par);

            if(isset($data) AND array_filled($data))
            {
            
                $result['record']['id'] = $data['comment_id'];

                
                $rcom = $this->model_comment->find_one(array("where" =>array("comment_id" => $data['comment_rply_to'])));
                // debug($rcom);

            if ($data['comment_rply_to'] != 0) {
                $result['record']['Replied To'] = $rcom['comment_name'];
            }

            if ($data['comment_rply_to'] == 0) {
                $result['record']['Rating'] = $data['comment_rating'];
            }

                $result['record']['User Name'] = $data['comment_name'];
                // $result['record']['User Email'] = $data['comment_email'];

                $pdata['fields'] = 'painting_name'; 
                $painting_name = $this->model_painting->get_painting_by_id($data['comment_product_id'],$pdata);
                
                $result['record']['Painting'] = $painting_name['painting_name'];
                $result['record']['Comment'] = $data['comment_comment'];
                


              // if(isset($data['jobs_image']) &&  !empty($data['jobs_image'])){

              //   $file_download = '<a href="'. g('base_url') . $data['jobs_image_path'] . '/' . $data['jobs_image'] .'" download>'. $data['jobs_image'] . '</a>';
              //   $result['record']['Image'] = str_ireplace('\r\n', '', urldecode($file_download));
              //   }

                }
        }
        else
        {
            $result['failure'] = "No Item Found";
        }
        return $result;
    }
    
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
