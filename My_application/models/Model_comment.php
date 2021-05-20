<?
class Model_comment extends MY_Model {
    /**
     * Comment MODEL
     *
     * @package     comment Model
     */

    protected $_table    = 'comment';
    protected $_field_prefix    = 'comment_';
    protected $_pk    = 'comment_id';
    protected $_status_field    = 'comment_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "comment_id,comment_name,painting.painting_name, comment_status";

        // $this->pagination_params['joins'][] = array(
        //                                             "table"=>"product" , 
        //                                             "joint"=>"product.product_id = comment.comment_product_id"
        //                                             );

        // $this->pagination_params['joins'][] = array(
        //                                             "table"=>"painting" , 
        //                                             "joint"=>"painting.painting_id = comment.comment_product_id"
        //                                             );


        parent::__construct();

    }

        // GET COMMENTS BY  COMMENT BY POST ID
     public function get_comments($pro_id)
     {
      $comment = array();
        if ($pro_id > 0) {
              $param['where']['comment_product_id'] = $pro_id;
                $param['where']['comment_rply_to'] = 0;
                $param['order'] = "comment_id DESC";
                $comment = $this->model_comment->find_all_active($param);
        }
          return $comment;
     }

     public function get_comments_count($pro_id)
     {
        $comment = array();
        if ($pro_id > 0) {
                $param['where']['comment_product_id'] = $pro_id;
                $param['where']['comment_rply_to'] = 0;
                $param['fields'] = "comment_id";
                $comment = $this->model_comment->find_all_active($param);
        }
          return count($comment);  
     }

           //replied comment
        //  $param0['where']['comment_product_id'] = $pro_id;
        //  $param0['where']['comment_id'] = $comment_id;
        // $param0['where']['comment_rply_to !='] = 0;
        // $rep_comment = $this->model_comment->find_all_active($param0);
        // return $rep_comment;

     //GET ALL REPLIED COMMENTS AGAINST A COMMENT
     public function get_replied_comments($pro_id,$comment_id)
     {
        $param0['where']['comment_product_id'] = $pro_id;
        $param0['where']['comment_rply_to'] = $comment_id;
        $rep_comment = $this->model_comment->find_all_active($param0);

        if (isset($rep_comment) && array_filled($rep_comment)) {
            foreach ($rep_comment as $key => $value) {

                     $rep_comment[$key]['comment_profile'] = $this->get_comment_profile($value['comment_user_id']);
                }
        }
        return $rep_comment;
    }



     //GET COMMENT IMAGE (FOR LOGGED IN USERS)
     public function get_comment_profile($comment_user_id)
     {
        $up = array();
        if ($comment_user_id > 0) {
        $up['where']['ui_user_id'] = $comment_user_id;
        $up['fields'] = "ui_profile_image_path,ui_profile_image";
        $img = $this->model_user_info->find_one($up);
        $profile = get_image($img['ui_profile_image'],$img['ui_profile_image_path']);
            
        }
        return $profile;
    }


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
    
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'comment_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'comment_product_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_product_id',
                     'label'   => 'Course',
                     'type'   => 'dropdown',
                     'type_dt'   => 'text',
                     // 'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),

              
              'comment_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_user_id',
                     'label'   => 'User Id',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     // 'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),

              'comment_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim' 
                  ),

              // 'comment_email'  => array(
              //     'table'   => $this->_table,
              //     'name'   => 'comment_email',
              //     'label'   => 'Email',
              //     'type'   => 'hidden',
              //     'attributes'   => array(),
              //     'js_rules'   => array(),
              //     // 'rules'   => 'required|htmlentities|valid_email'
              // ),

                    'comment_rply_to' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_rply_to',
                     'label'   => 'replied to ',
                     'type'   => 'text',
                     'attributes'   => array(),
                     // 'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),


              'comment_comment' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_comment',
                     'label'   => 'Comment',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities|max_length[250]'
                  ),

            'comment_rating' => array(
                'table'   => $this->_table,
                'name'   => 'comment_rating',
                'label'   => 'Rating',
                'type'   => 'text',
                // 'list_data'    => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4", "5"=>"5") ,
                'attributes'   => array(),
                // 'js_rules'   => 'required',
                'rules'   => '',
            ),
             
              'comment_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'comment_status',
                     'label'   => 'Status',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "comment_status" ,
                  'list_data' => array(
                      0 => "<span class=\"label label-default\">Inactive</span>" ,
                      1 =>  "<span class=\"label label-primary\">Active</span>"
                  ) ,
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),

            'comment_createdon'  => array( 
                'table'   => $this->_table,
                'name'   => 'comment_createdon',
                'label'   => 'Created',
                'type'   => 'readonly',
                'attributes'   => array(),
                'rules'   => 'trim'
                     )
              
            );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }

}
?>