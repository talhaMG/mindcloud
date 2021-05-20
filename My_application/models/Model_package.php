<?
class Model_package extends MY_Model
{
    /**
     *
     * @package     package Model
     * @version     1.0
     * @since       15 Jan,2018
     */

    protected $_table = 'package';
    protected $_field_prefix = 'package_';
    protected $_pk = 'package_id';
    protected $_status_field = 'package_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      
        // $this->pagination_params['fields'] = "package_id,package_name,CONCAT('$',package_price) AS package_price, package_period_no,package_period,package_status";

        $this->pagination_params['fields'] = "package_id,package_name,CONCAT('$',package_price) AS package_price,package_status";


        //  $this->relations['package_addon'] = array(
        //                 "type"=>"has_many", 
        //                 "own_key"=>"pa_package_id", 
        //                 "other_key"=>"pa_addon_id",
        // );
            $this->relations['package_course'] = array(
                        "type"=>"has_many", 
                        "own_key"=>"pc_package_id", 
                        "other_key"=>"pc_course_id",
        );


        parent::__construct();

    }

    // Get package info
    public function package_info($package_id)
    {
        // Set params
        $params['where']['package_id'] = $package_id;
        $query = $this->find_one_active($params);
        return $query;
    }


    //GET PACKAGES AND THERE ADDONS
    public function get_package()
    {
        // Set params
        // $params['fields'] = "package_id, package_name, package_slug, package_desc,addon,package_price,package_period ";
        // Query
         $package = array();
         $package = $this->model_package->find_all_active();

            $addon_param['joins'][] = array(
                "table"=>"addon" ,
                "joint"=>"addon.addon_id = package_addon.pa_addon_id  and addon.addon_status = 1",
                // "type" => "left"  //ONLY GET ACTIVE ADDONS FORM MULTISELECT
            );
            $addon = $this->model_package_addon->find_all($addon_param);
            
            
            foreach ($addon as $k => $val) {
            
                if (isset($package) && array_filled($package)) {
                    
                    foreach ($package as $key => $value) {
                    if ($value['package_id'] == $val['pa_package_id'] ) {
                                $package[$key]['addon'][] = $val;
                            }        
                    }

                }
                
            }
        
        $data = $package;
        return $data;
    }



    //GET PACKAGE AND ITS ADDONS
    public function get_package_detail($pkid)
    {
         $package = array();

        if ($pkid > 0) {
            
         $package = $this->model_package->find_by_pk_active($pkid);

            $addon_param = array();
            $addon_param['fields'] = "addon_id,addon_name,addon_special,addon_store_fields";
            $addon_param['joins'][] = array(
                "table"=>"addon" ,
                "joint"=>"addon.addon_id = package_addon.pa_addon_id  and addon.addon_status = 1 and pa_package_id = $pkid",
                // "type" => "left"  //ONLY GET ACTIVE ADDONS FORM MULTISELECT
            );
            $addon = $this->model_package_addon->find_all($addon_param);
        // debug($addon);       
        $package['addons'] = $addon;
        
        $data = $package;
        }
        return $data;
    }


    public function featured_package($limit="")
    {
        $params['where']['package_is_featured']= 1;
        $params['fields'] = "package_slug,package_name, CONCAT(package_image_path,'',package_image)  AS package_image";
        if (!empty($limit)) {
        $params['limit'] = $limit ;
        }

        $data = $this->find_all_active($params);
        return $data;
    }

    // ESTIMATED PACKAGE EXPIRY BY ITS PERIOD I.E MONTHLY OR YEARLY
    public function get_expiry_date_by_type($type = 0,$show_period = false)
    {
        $estimated_date ="";
        $period ="";
        $returned = "";
        switch ($type) {
            case 1:
               $estimated_date = date('Y-m-d', strtotime('+1 week')); 
                $period = "WEEK";
                break;

            case 2:
               $estimated_date = date('Y-m-d', strtotime('+1 month')); 
                $period = "MONTH";
                break;
           
           case 3:
               $estimated_date = date('Y-m-d', strtotime('+1 year')); 
                $period = "YEAR";
                break;

            
            default:
                $estimated_date;
                break;
        }

    if ($show_period) {
        
    $returned = $period;
    }else{
          $returned == $estimated_date;
    }
        return $returned;
    }

    public function get_period_number($val)
    {
        $title = "";
        switch ($val) {
            case 1:
              $title = "ONE";
                break;
            case 2:
              $title = "TWO";
                break;

            case 3:
              $title = "THREE";
                break;
            case 4:
              $title = "FOUR";
                break;
            case 5:
              $title = "FIVE";
                break;
            case 6:
              $title = "SIX";
                break;
            case 7:
              $title = "SEVEN";
                break;
            case 8:
              $title = "EIGHT";
                break;
            case 9:
              $title = "NINE";
                break;
            case 10:
              $title = "TEN";
                break;
            
            default:
                # code...
                break;
        }
        return $title;
    }

    public function get_fields($specific_field = "")
    {
        // if(isset($_GET['lang']) AND intval($_GET['lang']) > 0)
        //     $language_name = $this->model_language->get_language_name($_GET['lang']);

        $fields = array(

            'package_id' => array(
                'table' => $this->_table,
                'name' => 'package_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            'package_name' => array(
                'table' => $this->_table,
                'name' => 'package_name',
                'label' => 'Name',
                'type' => 'text',
                'attributes' => array("additional" => 'slugify="#' . $this->_table . '-' . $this->_field_prefix . 'slug"'),
                'js_rules' => 'required',
                'dt_attributes' => array("width" => "20%"),
                'rules' => 'required|trim|htmlentities'
            ),


            'package_slug' => array(
                'table' => $this->_table,
                'name' => 'package_slug',
                'label' => 'Slug',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => array("is_slug" => array()),
                'rules' => 'required|htmlentities|strtolower|is_unique[' . $this->_table . '.' . $this->_field_prefix . 'slug]|callback_is_slug'
            ),

            'package_basic_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'package_basic_price',
                     'label'   => 'Package Charges',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities|numeric'
                  ),

        'package_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'package_price',
                     'label'   => 'Basic Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities|numeric'
                  ),

             'package_hour' => array(
                     'table'   => $this->_table,
                     'name'   => 'package_hour',
                     'label'   => 'Hour',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


        // 'package_period_no' => array(
        //              'table'   => $this->_table,
        //              'name'   => 'package_period_no',
        //              'label'   => 'Period Time',
        //              'type'   => 'text',
        //              'attributes'   => array(),
        //              'js_rules'   => 'required',
        //              'rules'   => 'required|trim|htmlentities|is_natural_no_zero'
        //           ),



            // 'package_period_no' => array(
            //     'table' => $this->_table,
            //     'name' => 'package_period_no',
            //     'label' => 'Period Time',
            //     'type' => 'dropdown',
            //     'type_dt' => 'dropdown',
            //     'type_filter_dt' => 'dropdown',
            //     'list_data_key' => "package_period_no",
            //     'list_data' => array(
            //         1 => "ONE",
            //         2 => "TWO",
            //         3 => "THREEE",
            //         4 => "FOUR",
            //         5 => "FIVE",
            //         6 => "SIX",
            //         7 => "SEVEN",
            //         8 => "EIGHT",
            //         9 => "NINE",
            //         10 => "TEN"
            //         ),
            //     'default' => '0',
            //     'attributes' => array(),
            //     'dt_attributes' => array("width" => "7%"),
            //      'js_rules'   => 'required',
            //     'rules' => 'required|trim'
            // ),

            // 'package_period' => array(
            //     'table' => $this->_table,
            //     'name' => 'package_period',
            //     'label' => 'Package Period',
            //     'type' => 'dropdown',
            //     'type_dt' => 'dropdown',
            //     'type_filter_dt' => 'dropdown',
            //     'list_data_key' => "package_period",
            //     'list_data' => array(
            //         1 => "WEEK",
            //         2 => "MONTH",
            //         3 => "YEAR"
            //         ),
            //     'default' => '0',
            //     'attributes' => array(),
            //     'dt_attributes' => array("width" => "7%"),
            //      'js_rules'   => 'required',
            //     'rules' => 'required|trim'
            // ),

      

        // 'heading_price' => array(
        //              'table'   => $this->_table,
        //              'name'   => 'heading_price',
        //              'label'   => 'Package',
        //              'type'   => 'text',
        //              'attributes'   => array(),
        //              'js_rules'   => 'required',
        //              'rules'   => 'required|trim|htmlentities|numeric'
        //           ),

         'package_desc' => array(
                'table' => $this->_table,
                'name' => 'package_desc',
                'label' => 'Description',
                'type' => 'editor',
                'attributes' => array(),
                // 'js_rules' => array("is_slug" => array()),
                'rules' => 'htmlentities|strtolower'
            ),


        // 'package_addon' => array(
        //     'table'   => "package_addon",
        //     'name'   => 'pa_addon_id',
        //     'label'   => 'Add Addon',
        //     'type'   => 'multiselect',
        //     'attributes'   => array(),
        //     // 'rules'   => 'trim|required',
        //     // 'js_rules'   => 'required'
        //     ),
        

         // 'package_desc2' => array(
         //        'table' => $this->_table,
         //        'name' => 'package_desc2',
         //        'label' => 'Additional Features',
         //        'type' => 'editor',
         //        'attributes' => array(),
         //        // 'js_rules' => array("is_slug" => array()),
         //        'rules' => 'htmlentities|strtolower'
         //    ),

         



            'package_image' => array(
                'table' => $this->_table,
                'name' => 'package_image',
                'label' => 'package Image',
                'name_path' => 'package_image_path',
                'upload_config' => 'site_upload_package',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'image_size_recommended'=>'118px × 176px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>''
            ),



            // 'package_is_featured' => array(
            //     'table' => $this->_table,
            //     'name' => 'package_is_featured',
            //     'label' => 'Featured',
            //     'type' => 'switch',
            //     'type_dt' => 'dropdown',
            //     'type_filter_dt' => 'dropdown',
            //     // 'list_data_key' => "package_status",
            //     'list_data' => array(),
            //     'default' => '0',
            //     'attributes' => array(),
            //     'dt_attributes' => array("width" => "7%"),
            //     'rules' => 'trim'
            // ),
         
         //jo jo user 2019 mey purchase krty hyn .. wo 

            // 'package_year' => array(
            //     'table' => $this->_table,
            //     'name' => 'package_year',
            //     'label' => 'For Year',
            //     'type' => 'text',
            //     'attributes' => array(),
            //     'js_rules' => array(),
            //     'rules' => 'required|htmlentities|strtolower|numeric'
            // ),
              'package_course' => array(
                                'table'   => "package_course",
                                'name'   => 'pc_course_id',
                                'label'   => 'Course',
                                'type'   => 'multiselect',
                                'attributes'   => array(),
                                'js_rules'   => '',
                                'rules'   => '',
                                  ),

            'package_status' => array(
                'table' => $this->_table,
                'name' => 'package_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "package_status",
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            )

        );

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;
    }

}

?>