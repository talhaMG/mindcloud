<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Admin.php");

/**
 * Controller Wrapper Class.
 *
 * @package
 * @author
 * @version        1.0
 * @since        Version 1.0 2017
 * @comments    Please think of it as fun :P AND ENJOY
 */
class MY_Controller extends MY_Controller_Admin
{

    private static $instance;

    /**
     * Constructor
     */
    protected $layout;
    protected $cms_page_id;

    public $layout_data = array();
    public $view_pre;
    public $file_allow_ext;

    public $user_type;
    public $package_id;

    public $user_longitude; //job dollar
    public $user_latitude; //job dollar

    
    public function __construct()
    {
        global $config;
        parent::__construct();
        
        // As soon as controller starts, configure timezone if set in tkd_config.php
        $this->set_time_zone();

        //Commmon HElpers
        $this->load->library('form_validation');
        $uid = $this->session_data['id'];

        // Load DB Config Parameters in GLOBAL $config['db']
        $config['db'] = $this->model_config->load_config();

        $this->layout_data['modals'] = array();

        if (isset($_REQUEST['msg_error']) && $_REQUEST['msg_error']) {
            $this->layout_data['msg']['error'] = $_REQUEST['msg_error'];
        }


        // FOR ADMIN
        if ($this->router->directory == "admin/") {
            $this->is_admin = true;

            $this->userdata['user_firstname'] = $this->session->userdata['logged_in']['first_name'];
            $this->userdata['user_lastname'] = $this->session->userdata['logged_in']['last_name'];
            $this->userdata['user_avatar'] = $this->session->userdata['logged_in']['profile_image'];

            //'https://img.icons8.com/color/48/000000/manager.png';

            /** Get Logo **/
            $this->layout_data['logo'] = $this->model_logo->get_logo();
            //debug($this->layout_data['logo'],1);

            $this->layout = "admin/my_main";
            $this->view_pre = "admin/" . $this->router->class . "/";
            //IF Not logged in, redirect to login page.
            $this->login_redirect_check("logged_in", "is_admin");

            $title = $config['admin_title'] . " - Admin Panel";
            $meta_data = array("keywords" => "$title", "description" => "$title", "robots" => "noindex, nofollow");

            $this->layout_data['css_files'] = array(
                "pages/tasks.css",
                "components.css",
                "plugins.css",
                "layout.css",
                "themes/default.css",
                "custom.css",
            );
            $this->layout_data['js_files'] = array(
                "jquery.min.js",
                "jquery-migrate.min.js",
                "metronic.js",
                "layout.js",
                "quick-sidebar.js",
                "demo.js",
                "jquery.blockui.min.js",
                "jquery.cokie.min.js",
                "jquery.pulsate.min.js",
                "jquery.sparkline.min.js",
                "tkd_script.js",
                "ui-alert-dialog-api.js",
            );

        }
        else {

            // check session
            $this->userid = isset($this->session->userdata['logged_in_front']['id']) ? $this->session->userdata['logged_in_front']['id'] : 0;
            
            $this->layout_data['user_data'] = array();
            if($this->userid > 0) {
                $this->layout_data['user_data'] = $this->model_user->find_by_pk($this->userid);
            }

            // $this->user_type = isset($this->layout_data['user_data']['user_type']) ? $this->layout_data['user_data']['user_type'] : 0;
            // $this->package_id = isset($this->layout_data['user_data']['user_package_id']) ? $this->layout_data['user_data']['user_package_id'] : 0;
            
            $this->file_allow_ext = "pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|jpeg|png";
            //debug($this->layout_data['user_data'],1);

            // FOR FRONTEND
            $this->is_admin = false;
            $this->view_pre = "";

            //$this->layout_data['is_header_ad'] = false;

            //$this->layout_data['product_menu'] = $this->model_category->get_product_menu();
            //debug($this->layout_data['product_menu'],1);
            //$this->layout = "fontera_main";
            //$this->login_redirect_check("logged_in");
            
            

            $this->layout = "my_main";
            $this->view_pre = $this->router->class . "/";

            $title = $config['title'];
            $meta_data = array(
                "keywords" => $title,
                "description" => "$title",
                "robots" => "noindex, nofollow",
                "viewport" => "width=device-width, initial-scale=1, maximum-scale=1",
                "google-site-verification" => "",
            );

            $this->layout_data['css_files'] = array( 
                "layout.css",  
                "style.css",
            );
            $this->layout_data['js_files_init'] = array(
                "jquery.js", 
            );
            $this->layout_data['js_files'] = array( 
                    "custom.js",
            );
            //get featured stock
            $this->register_plugins(array("bootstrap-toastr","common_files","my_cart"));


            $this->layout_data['body_class'] = '';
            
            /** Get social media **/
            $this->layout_data['config_info'] = $config['db'];
            
            

            /** Get Logo **/
            // $this->layout_data['logo'] = $this->model_logo->find_one(
            //     array('where' => array('logo_status' => 1))
            // );
            
            /** Get Logo **//** Get Logo **/
              $data_logo = $this->model_logo->find_one_active();
              $logo = Links::img($data_logo['logo_image_path'],$data_logo['logo_image']);
              $flogo = Links::img($data_logo['logo_image_path'],$data_logo['logo_footer']);
              $faviconlogo = Links::img($data_logo['logo_image_path'],$data_logo['logo_favicon']);
              $this->layout_data['logo_image'] = $logo;
              $this->layout_data['logo_footer_image'] = $flogo;
              $this->layout_data['faviconlogo'] = $faviconlogo;
            
            

            // Get All currecny list
            $title = (isset($cms_page['meta_title']) && $cms_page['meta_title']) ? $cms_page['meta_title'] : $title;
            $meta_data['keywords'] = (isset($cms_page['meta_keyword']) && $cms_page['meta_keyword']) ? $cms_page['meta_keyword'] : $meta_data['keywords'];
            $meta_data['description'] = (isset($cms_page['meta_description']) && $cms_page['meta_description']) ? $cms_page['meta_description'] : $meta_data['description'];
            
            //$this->layout_data['cms_content'] = $this->model_cms_page->get_current_page_contents();

        }
        if (isset($menu))
            $this->layout_data['menu'] = $menu;
        $this->layout_data['title'] = $title;
        $this->layout_data['meta_data'] = $meta_data;
        $this->admin_path = $this->view_pre;
        $this->admin_current = $this->view_pre . $config['ci_method'] . "/";

        $this->layout_data['config'] = $config;


        $config['js_config']['my_id'] = $this->session_data['id'];
        $request = $this->router->class . '/' . $this->router->method;
        $this->layout_data['request_uri'] = $request;

        // Set class name and method
        $this->layout_data['class_name'] = $this->router->class;
        $this->layout_data['method_name'] = $this->router->method;
        
        //Setup Default title for template
    }




    public function plugin_seo($is_off=false)
    {
        if($is_off)
            return true;

        $data = $this->model_cms_page->get_seo_data($this->cms_page_id);

        $meta_data = $this->layout_data['meta_data'];

        //debug($cms_page, 1);
        $title = ( isset( $data['meta_title'] ) && $data['meta_title'] ) ? $data['meta_title'] : g('title');
        $meta_data['keywords'] = ( isset( $data['meta_keywords'] ) && $data['meta_keywords'] ) ? $data['meta_keywords'] : g('title');
        $meta_data['description'] = ( isset( $data['meta_description'] ) && $data['meta_description'] ) ? $data['meta_description'] : g('title');

        $this->layout_data['title'] = $title;
        $this->layout_data['meta_data'] = $meta_data;
        
        return true;
    }

    public function get_site_information($config_info)
    {
        $config_value = array();
        if (count($config_info) > 0) {
            foreach ($config_info as $key => $value) {
                $config_value[$value['config_variable']][] = $value;
            }
        }
        return $config_value;
    }

    // Set Currency setup for config
    public function chk_currency()
    {
        global $config;
        $currency_conf = $this->session->userdata('currency');
        if ($currency_conf) {
            $config['currency'] = $currency_conf['currency'] ? $currency_conf['currency'] : $config['currency'];
            $config['currency_rate'] = $currency_conf['currency_rate'] ? $currency_conf['currency_rate'] : $config['currency_rate'];
        }
    }

    /*
    * Adds Script
    * @params   file (mixed)        File name/ Relevant to CSS/JS folder
    * @params   filetype    js OR css
    */
    public function add_script($files = '', $file_type = "css")
    {
        $file_type .= '_files';
        // If array is passed, push all
        if (array_filled($files)) {
            foreach ($files as $file)
                $this->layout_data[$file_type][] = $file;
        } // Else if single file is pass, push it in
        elseif ($files)
            $this->layout_data[$file_type][] = $files;
        else return "empty";
    }

    /*
    * Set Meta Data for Layout
    */
    public function set_meta($meta_data = '')
    {
        // If array is passed, push all
        if (array_filled($meta_data)) {
            $this->layout_data['meta_data'] = $this->layout_data['meta_data'] + $meta_data;
        }
    }

    // public function set_social_meta($data = array())
    // {
    //     $meta["og:type"] = FB_OG_TYPE;
    //     $meta["fb:app_id"] = FB_APP_ID;
    //     $meta["og:title"] = $data['title'];
    //     $meta["og:site_name"] = SITE_NAME;
    //     $meta["og:description"] = $data['description'];
    //     $meta["og:image"] = $data['image'];
    //     $meta["og:url"] = $config['base_url'] . $_SERVER['REQUEST_URI'];

    //     $meta["twitter:card"] = TW_CR_TYPE;
    //     $meta["twitter:title"] = $meta["og:title"];
    //     $meta["twitter:description"] = $meta["og:description"];
    //     $meta["twitter:image"] = $meta["og:image"];
    //     $meta["twitter:url"] = $meta["og:url"];
    //     $meta["twitter:site"] = SITE_NAME;
    //     $meta["twitter:creator"] = FB_OG_CREATOR;


    //     $this->set_meta($meta);
    // }

    /*
    * Register Plugins
    * @params   file (mixed)        File name/ Relevant to CSS/JS folder
    * @params   filetype    js OR css
    */
    public function register_plugins($plugins = '')
    {
        // If array is passed, push all
        if (array_filled($plugins)) {
            foreach ($plugins as $plg)
                $this->layout_data['additional_tools'][$plg] = $plg;
        } // Else if single file is pass, push it in
        elseif ($plugins)
            $this->layout_data['additional_tools'][$plugins] = $plugins;
        else false;
    }

    /*
    * UN-REGISTER Plugins
    * @params   file (mixed)        File name/ Relevant to CSS/JS folder
    * @params   filetype    js OR css
    */
    public function unregister_plugins($plugins = '')
    {
        // If array is passed, push all
        if (array_filled($plugins)) {
            foreach ($plugins as $plg)
                unset($this->layout_data['additional_tools'][$plg]);
        } // Else if single file is pass, push it in
        elseif ($plugins)
            unset($this->layout_data['additional_tools'][$plugins]);
        else false;
    }

    /*
    * Sets Default Php timezone for Projects
    * $dit PHP_TIME_ZONE constaint from tkd_config.php
    */
    private function set_time_zone()
    {
        if (PHP_TIME_ZONE)
            date_default_timezone_set(PHP_TIME_ZONE);
    }

    /*
    * Redirect If not logged in.
    */
    public function login_redirect_check($session = "", $is_admin = "")
    {
        global $config;
        $class = $this->router->class;
        $login_session = $this->session->userdata($session);
        if (!in_array($class, array('login', 'register'))) {

            $redirect_url = $config['base_url'] . $this->uri->uri_string;
            if ((!$login_session) && ($class != 'logout')) {
                redirect("/admin/login?redirect_url=" . urlencode($redirect_url));
                exit();
            } elseif ($is_admin && !$login_session[$is_admin]) {
                redirect("/admin/login");
                exit();
            }
        }
    }


    

    /*
    * Load View for Template
    * view_file     mst exist within class folder inside view(admin/product/view_file.php). If not , will search in default folder. Elese throws error
    * view_data
    * render        Render output. (Boolean)
    * use_template  Render template (Boolean).
    */
    public function load_view($view_file, $view_data = array(), $render = false, $use_template = true)
    {

        global $config;
        $view = $this->view_pre . $view_file;
        $view = view_exists($view, $this->router->class);
        //adding layout data array *START-Abdul Samad*
        $view_data['layout_data'] = $this->layout_data;
        $view_data['cms_content'] = isset($this->layout_data['cms_content']) ? $this->layout_data['cms_content'] : array();
        $view_data['session_data'] = $this->session->userdata('logged_in');
        //adding layout data array *START-Abdul Samad*
        if ($use_template) {
        
            $this->layout_data['content_block'] = $this->load->view($view, $view_data, true);
            //Load Layout
            $this->load->view("_layout/" . $this->layout, $this->layout_data);
        } else
            return $this->load->view($view, $view_data, $render);
    }

    /*
    * Form Validation
    */
    public function validate($model)
    {
        $rules = $this->$model->get_rules();
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters("<span for=\"%s\" style='color:#fff' class=\"has-error help-block\">", '</span>');
        return $this->form_validation->run();
    }

    /*
    * Bulk form validation
    */
    public function bulk_validate($models)
    {
        if (array_filled($models)) {
            foreach ($models as $model) {
                if ($this->validate($model) !== true)
                    return false;
            }
            return true;
        }
    }

    // public function send_inquiry_mail($data, $params = array())
    // {
    //     global $config;

    //     $to = $params['to'] ? $params['to'] : $config['email_sales'];
    //     $cc = $params['cc'] ? $params['cc'] : $config['email_cc'];
    //     $subject = $params['subject'] ? $params['subject'] : "Recieved Inquiry";
    //     $message = $this->load->view("_layout/email_template/query_ticket", $data, true);

    //     $this->load->library('email');
    //     $this->email->from($config['email_no_reply'], 'Kansai Group- Reply');
    //     $this->email->to($to);

    //     if ($cc)
    //         $this->email->cc($cc);

    //     $this->email->subject($subject);
    //     $this->email->message($message);
    //     return $this->email->send();
    // }

        // VALIDATION METHODS

    // Validations ----- callback_is_slug
    public function is_slug($str, $attr)
    {
        $match = preg_match('/^([a-zA-Z0-9\-_]+)$/', $str);
        if (!$match) {
            $this->form_validation->set_message('is_slug', 'The field can only contain alphanums and "-" and "_"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

        // Validations -----float
        public function is_floatval($str)
        {
            $match = floatval($str);
            if (!$match) {
                
                $this->form_validation->set_message('is_floatval', 'The field can only contain decimal numbers');
                return FALSE;
            } else {
                return TRUE;
            }
        }

     // Validations --for date of birth
    public function dob_valid($str)
    {
        $str = strtotime($str);
        $year_now = date('Y');
        $birth_year = date('Y', $str);  

        if ($birth_year <= ($year_now-18)  && $birth_year <= ($year_now-18)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('dob_valid', 'Please Enter Valid Birth Year');
            return FALSE;
        }
    }

    public function min_max()
    {
        // debug($min);
        // debug($max);
        // /SET TABLE POST VALUES
        $min = $_POST['salaryrange']['salaryrange_min'];
        $max = $_POST['salaryrange']['salaryrange_max'];


        if ($min <= $max) {
            return TRUE;
        } else {
            $this->form_validation->set_message('min_max', 'Minimum salary limit should b less than Maximum salary limit. ');
            return FALSE;
        }
    }


        // VALIDATION METHODS ENDS

    //GET innner banner       
        public function get_ibanner($id)
        {
            $data = array();    
            if (intval($id)) {

            $inner_banner = $this->model_inner_banner->find_by_pk_active($id);
            $data['ititle'] = $inner_banner['inner_banner_title'];
            $data['ibanner_img'] = get_image($inner_banner['inner_banner_image'],$inner_banner['inner_banner_image_path']);
            }
            return $data; 
        }
    //for single banners 
    public function get_banner($id)
    {
        $data = array();    
        if (intval($id)) {

        $banner = $this->model_banner->find_by_pk_active($id);
        $data['bcontent'] = html_entity_decode($banner['banner_layout1']);
        $data['bimage'] = get_image($banner['banner_image'],$banner['banner_image_path']);
        }
        return $data; 
    }





}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
