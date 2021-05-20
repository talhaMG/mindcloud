<?
class Model_tutorial extends MY_Model
{
    /**
     *
     * @package     course Model
     * 
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'tutorial';
    protected $_field_prefix    = 'tutorial_';
    protected $_pk    = 'tutorial_id';
    protected $_status_field    = 'tutorial_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        $s3path = g('db.admin.bucketimg');
        // Call the Model constructor
        // $this->pagination_params['fields'] = "course_id,course_name,CONCAT(course_image_path,course_image) AS course_image,course_status";
        $this->pagination_params['fields'] = "tutorial_id,tutorial_name,tutorial_status";

        // $this->relations['course_lecture'] = array(
        //     "type"=>"has_many", 
        //     "own_key"=>"cp_course_id", 
        //     "other_key"=>"cp_lecture_id",
        //   );
        $this->relations['course_tutorial'] = array(
            "type" => "has_many",
            "own_key" => "cp_course_id",
            "other_key" => "cp_tutorial_id",
        );


        $this->relations['course_category'] = array(
            "type" => "has_many",
            "own_key" => "cp_course_id",
            "other_key" => "cp_category_id",
        );

        parent::__construct();
    }

    // public function join_category($type="" , $append_joint ="" , $prepend_joint = "")
    // {
    //     $joint = $prepend_joint . "course_category = category_id" . $append_joint ; 
    //     return $this->prep_join("category" , $joint, $type );
    // }


    public function join_expert($type = "", $append_joint = "", $prepend_joint = "")
    {
        $joint = $prepend_joint . "tutorial_expert_id = expert_id" . $append_joint;
        return $this->prep_join("expert", $joint, $type);
    }

    public function join_language($type = "", $append_joint = "", $prepend_joint = "")
    {
        $joint = $prepend_joint . "tutorial_language_id = language_id" . $append_joint;
        return $this->prep_join("language", $joint, $type);
    }

    function course_by_slug($slug = '', $params = array())
    {

        // $params['joins'][] = array(
        //     "table"=>"brand" ,
        //     "joint"=>"brand.brand_id = product.product_brand_id",
        // );
        // $params['joins'][] = array(
        // "table"=>"states" , 
        // "joint"=>"states.states_id = course.course_state_id"
        // );
        $params['where']['tutorial_slug'] = $slug;
        return $this->model_tutorial->find_one_active($params);
    }

    // GET PACKAGES INCLUDE THE COURSE
    public function get_packages($course_id = 0, $param = array())
    {
        $param['joins'][] = array(
            "table" => "package",
            "joint" => "package.package_id = package_course.pc_package_id and pc_course_id = $course_id"
        );
        return $this->model_package_course->find_all($param);
    }


    public function get_package_courses($package_id, $param = array())
    {
        $param['joins'][] = array(
            "table" => "tutorial",
            "joint" => "tutorial.tutorial_id = package_course.pc_course_id and pc_package_id = $package_id"
        );
        return $this->model_package_course->find_all($param);
    }

    public function get_lectures($course_id, $param = array())
    {
        $param['where']['lecture_course_id'] = $course_id;
        return $this->model_lecture->find_all_active($param);
    }

    public function user_enrollcourses($userid, $param = array())
    {
        $param['where']['order_payment_status'] = 1;
        $param['where']['order_user_id'] = $userid;
        $param['fields'] = 'order_id';
        $order_id = $this->model_shop_order->find_all_active($param);

        $oids = array();
        if (isset($order_id) && array_filled($order_id)) {
            foreach ($order_id as $key => $value) {
                $oids[] = $value['order_id'];
            }
        }

        $param = array();
        if (array_filled($oids)) {
            $param['where_in']['item_order_id'] = $oids;
        }

        $param['joins'][] = array(
            "table" => "tutorial",
            "joint" => "tutorial.tutorial_id = shop_item.item_product_id",
        );
        $param['joins'][] = array(
            "table" => "quiz",
            "joint" => "quiz.quiz_order_item_id = shop_item.item_id",
            "type" => "left"
        );
        // DISTINCT(item_product_id) AS item_product_id
        // $param['fields'] = "item_product_id,item_product_name,item_product_img,course_identity,course_image,course_image_path,course_duration,item_order_id,item_id,quiz_id,quiz_status";
        $course = $this->model_shop_item->find_all($param);
        return $course;
    }

    //CHECK COURSE QUIZ STATUS
    public function get_course_quiz_status($course_id = 0, $param = array())
    {
        $param = array();
        $param['where']['quiz_order_item_id'] = $course_id;
        return $this->model_quiz->find_all($param);
    }

    public function get_course_profession($cid = '', $param = array())
    {
        $param['where']['cp_course_id'] = $cid;
        $param['joins'][] = array(
            "table" => "profession",
            "joint" => "profession.profession_id = course_profession.cp_profession_id"
        );

        return $this->model_course_profession->find_all($param);
    }

    public function get_details($params = array())
    {
        $params['fields'] = 'tutorial_id,tutorial_expert_id,tutorial_category_id,tutorial_slug,
        tutorial_name,tutorial_level,tutorial_price,tutorial_video,tutorial_video_path,tutorial_status,tutorial_createdon,tutorial_duration,tutorial_image2,tutorial_image,tutorial_image_path,expert_id,expert_name,expert_image,tutorial_featured,tutorial_rating,tutorial_keywords,language_id,language_name,tutorial_language_id, tutorial_desc,tutorial_desc2,tutorial_desc3';


        $params['joins'][] = $this->join_expert();
        $params['joins'][] = $this->join_language();
        $course = $this->find_all_active($params);

        return $course;
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
    * 
    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields($specific_field = "")
    {

        $fields = array(

            'tutorial_id' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_id',
                'label'   => 'id #',
                'type'   => 'hidden',
                'type_dt'   => 'text',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "5%"),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),

            //   'course_identity' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'course_identity',
            //          'label'   => 'Course id #',
            //          'type'   => 'text',
            //          'type_dt'   => 'text',
            //          'attributes'   => array(),
            //          'dt_attributes'   => array("width"=>"5%"),
            //          'js_rules'   => '',
            //          'rules'   => 'required|trim|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'identity]'
            //     ),

            'tutorial_expert_id' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_expert_id',
                'label'   => 'Expert',
                'type'   => 'dropdown',
                'type_dt'   => 'text',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "5%"),
                'js_rules'   => 'required',
                'rules'   => 'required|trim|htmlentities'
            ),

            'tutorial_language_id' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_language_id',
                'label'   => 'Language',
                'type'   => 'dropdown',
                'type_dt'   => 'text',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "5%"),
                'js_rules'   => 'required',
                'rules'   => 'required|trim|htmlentities'
            ),




            'tutorial_level' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_level',
                'label'   => 'Level',
                'type'   => 'dropdown',
                'type_dt'   => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(
                    "ALL LEVEL" => "ALL LEVEL",
                    "BEGINNER" => "BEGINNER",
                    "MIDDLE" => "MIDDLE",
                    "ADVANCE" => "ADVANCE",
                ),
                'default'   => 'ALL LEVEL',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "5px"),
                'rules'   => 'trim|required'
            ),

            'tutorial_name' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_name',
                'label'   => 'Name',
                'type'   => 'text',
                'attributes'   => array("additional" => 'slugify="#' . $this->_table . '-' . $this->_field_prefix . 'slug"'),
                // 'attributes'   => array(),
                'js_rules'   => 'required',
                'rules'   => 'required|trim|htmlentities'
            ),


            'tutorial_slug'  => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_slug',
                'label'   => 'Slug',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => array("is_slug" => array()),
                'rules'   => 'required|strtolower|htmlentities|is_unique[' . $this->_table . '.' . $this->_field_prefix . 'slug]|callback_is_slug'
            ),

            'tutorial_price' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_price',
                'label'   => 'Price',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => 'required',
                'rules'   => 'required|trim|htmlentities|numeric'
            ),

            'tutorial_duration' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_duration',
                'label'   => 'Duration',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => 'required',
                'rules'   => 'required|trim|htmlentities'
            ),



            // 'course_category_id' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'course_category_id',
            //          'label'   => 'category',
            //          'type'   => 'dropdown',
            //          'type_dt'   => 'text',
            //          'attributes'   => array(),
            //          'dt_attributes'   => array("width"=>"5%"),
            //          'js_rules'   => 'required',
            //          'rules'   => 'required|trim|htmlentities'
            //     ),  



            'course_category' => array(
                'table'   => "course_category",
                'name'   => 'cp_category_id',
                'label'   => 'Category',
                'type'   => 'multiselect',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => '',
            ),


            //    'course_lecture' => array(
            //             'table'   => "course_lecture",
            //             'name'   => 'cp_lecture_id',
            //             'label'   => 'Lecture',
            //             'type'   => 'multiselect',
            //             'attributes'   => array(),
            //             'js_rules'   => '',
            //             'rules'   => '',
            //               ),

            // 'course_lecture' => array(
            //     'table'   => "course_lecture",
            //     'name'   => 'cp_lecture_id',
            //     'label'   => 'Lecture',
            //     'type'   => 'multiselect',
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => '',
            //     ),


            'course_tutorial' => array(
                'table'   => "course_tutorial",
                'name'   => 'cp_tutorial_id',
                'label'   => 'Videos',
                'type'   => 'multiselect',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => '',
            ),



            'tutorial_desc' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_desc',
                'label'   => '1 liner description',
                'type'   => 'editor',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'required|trim|htmlentities'
            ),

            'tutorial_desc2' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_desc2',
                'label'   => 'Full description',
                'type'   => 'editor',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'required|trim|htmlentities'
            ),

            // 'course_desc3' => array(
            //     'table'   => $this->_table,
            //     'name'   => 'course_desc3',
            //     'label'   => 'Curriculum',
            //     'type'   => 'editor',
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => 'trim|htmlentities'
            // ),

            'tutorial_keywords' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_keywords',
                'label'   => 'Tags <br><span style="font-size:10px;color:red">Enter comma seperated values</span>',
                'type'   => 'textarea',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim|htmlentities'
            ),

            // 'course_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'course_image',
            //     'label' => 'Image',
            //     'name_path' => 'course_image_path',
            //     'upload_config' => 'site_upload_course',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     // 'thumb'   => array(array('name'=>'course_image_thumb','max_width'=>260, 'max_height'=>250),),
            //     'attributes'   => array(
            //         'image_size_recommended'=>'247px × 187px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     // 'js_rules'=>$is_required_image
            // ),

            'tutorial_image2' => array(
                'table' => $this->_table,
                'name' => 'tutorial_image2',
                'label' => 'Image',
                'type' => 'hidden',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            // 'course_image2' => array(
            //     'table' => $this->_table,
            //     'name' => 'course_image2',
            //     'label' => 'Other Related Image',
            //     'name_path' => 'course_image_path',
            //     'upload_config' => 'site_upload_course',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes'   => array(
            //         'image_size_recommended'=>'366px × 397px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     // 'js_rules'=>$is_required_image
            // ),


            'tutorial_video' => array(
                'table' => $this->_table,
                'name' => 'tutorial_video',
                'label' => 'Video',
                'type' => 'hidden',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),
            'tutorial_video_desc' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_video_desc',
                'label'   => ' Video transcript',
                'type'   => 'editor',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim|htmlentities'
            ),

            // 'course_video' => array(
            //     'table' => $this->_table,
            //     'name' => 'course_video',
            //     'label' => 'Course Video',
            //     'name_path' => 'course_video_path',
            //     'upload_config' => 'site_upload_course',
            //     'type' => 'videoupload',
            //     'type_dt' => 'video',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes'   => array(
            //         'allow_ext'=>'mkv|avi|mp4',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     // 'js_rules'=>$is_required_image
            // ),
            // 'course_rating' => array(
            //     'table'   => $this->_table,
            //     'name'   => 'course_rating',
            //     'label'   => 'Rating',
            //     'type'   => 'dropdown',
            //     'type_dt'   => 'dropdown',
            //     'list_data' => array(
            //         1 => "1",
            //         2 => "2",
            //         3 => "3",
            //         4 => "4"
            //     ),
            //     'attributes'   => array(),
            //     'js_rules'   => 'required',
            //     'rules'   => 'required|trim'
            // ),

            // 'course_quiz_time' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'course_quiz_time',
            //          'label'   => 'Quize Timer (Minutes)',
            //          'type'   => 'text',
            //          'attributes'   => array(),
            //          'js_rules'   => 'required',
            //          'rules'   => 'required|trim|htmlentities|regex_match[/^[\d\(\)\-+ ]+$/]'
            //       ),


            'tutorial_featured' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_featured',
                'label'   => 'Popular',
                'type'   => 'switch',
                'type_dt'   => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "tutorial_featured",
                'list_data' => array(),
                'default'   => '1',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "7%"),
                'rules'   => 'trim'
            ),


            'tutorial_free_status' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_free_status',
                'label'   => 'Free tutorial',
                'type'   => 'switch',
                'type_dt'   => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "tutorial_status",
                'list_data' => array(),
                'default'   => '1',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "7%"),
                'rules'   => 'trim'
            ),

            'tutorial_status' => array(
                'table'   => $this->_table,
                'name'   => 'tutorial_status',
                'label'   => 'Status?',
                'type'   => 'switch',
                'type_dt'   => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "tutorial_status",
                'list_data' => array(),
                'default'   => '1',
                'attributes'   => array(),
                'dt_attributes'   => array("width" => "7%"),
                'rules'   => 'trim'
            ),


        );

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;
    }
}
