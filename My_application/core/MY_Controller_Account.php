<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
        
//Include Admin Wrapper. Break down things abit
//include_once(APPPATH . "core/MY_Controller.php");

/**
 * Controller Wrapper Class.
 *
 * @package
 * @author
 * @version        1.0
 * @since        Version 1.0 2017
 * @comments    Please think of it as fun :P AND ENJOY
 */
class MY_Controller_Account extends MY_Controller
{
    public $navigation_data = array();
    
    public function __construct()
    {
        global $config;
        parent::__construct();

        $this->login_redirect_check_front();
        

        $this->view_pre = 'account/account_area_theme/';
        $this->layout = "my_plain_account";
        // $this->add_script(array("account/account_stylesheet.css"));
        $this->add_script(array("theme-account_area.css"));

        $this->user_type = $this->layout_data['user_data']['user_type'];
        $this->navigation_data = $this->get_navigation();

        $this->register_plugins(array("bootstrap-toastr","common_files","my_cart"));
        //$this->package_id = $this->layout_data['user_data']['user_package_id'];
        //$this->register_plugins(array("flag_sprites"));

        // Country Code for Flag Sprites
        $country_code = empty($this->layout_data['user_data']['ui_country_id']) ? 223 : $this->layout_data['user_data']['ui_country_id'];
        $this->layout_data['country'] = $this->model_country->get_country_name($country_code);


    }

    public function get_navigation()
    {
        $class = $this->router->fetch_class('');
        $method = $this->router->fetch_method('');

        $data = array();
        
        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>false,
        //     'class'=>$class=='dashboard' ? 'active' : '',
        //     'href'=>l('account-area'),
        //     'icon' => 'fa fa-list',
        //     'name' => 'Dashboard',
        //     );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>($class=='profile' AND $method == 'index') ? 'active' : '',
        //     'href'=>l('account-area/profile/edit'),
        //     'icon' => 'fa fa-user',
        //     'name' => 'Personal Info',
        //     );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>$method=='change_password' ? 'active' : '',
        //     'href'=>l('account-area/change-password'),
        //     'icon' => 'fa fa-key',
        //     'name' => 'Password Change',
        //     );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>false,
        //     'class'=>$method=='address_info' ? 'active' : '',
        //     'href'=>l('account-area/address-info'),
        //     'icon' => 'fa fa-map',
        //     'name' => 'Address Info',
        //     );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>false,
        //     'class'=>$method=='about_us' ? 'active' : '',
        //     'href'=>l('account-area/change-profile'),
        //     'icon' => 'fa fa-edit',
        //     'name' => 'About',
        //     );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>$method=='package_info' ? 'active' : '',
        //     'href'=>l('account-area/package-info'),
        //     'icon' => 'fa fa-usd',
        //     'name' => 'Package Info',
        //     );


    // $data[] = array(
    //         'is_dropdown' => false,
    //         'is_dashboard'=>true,
    //         'class'=>$method=='add_job' ? 'active' : '',
    //         'href'=>l('account-area/add-job'),
    //         'icon' => 'fa fa-plus-circle',
    //         'name' => 'Post a Job',
    //         );
    // $data[] = array(
    //         'is_dropdown' => false,
    //         'is_dashboard'=>true,
    //         'class'=>$method=='jobs' ? 'active' : '',
    //         'href'=>l('account-area/jobs'),
    //         'icon' => 'fa fa-tasks',
    //         'name' => 'Manage Jobs',
    //         );


    // $data[] = array(
    //         'is_dropdown' => false,
    //         'is_dashboard'=>true,
    //         'class'=>$method=='posted_ads' ? 'active' : '',
    //         'href'=>l('account-area/posted-advertiments'),
    //         'icon' => 'fa fa-plus-circle',
    //         'name' => 'View Posted Advertisments',
    //         );





// $data[] = array(
//             'is_dropdown' => false,
//             'is_dashboard'=>true,
//             'class'=>$method=='manange_resume' ? 'active' : '',
//             'href'=>l('account-area/manange-resume'),
//             'icon' => 'fa fa-pencil-square-o',
//             'name' => 'Manage Resume',
//             );



// $data[] = array(
//             'is_dropdown' => false,
//             'is_dashboard'=>true,
//             'class'=>$method=='courses' ? 'active' : '',
//             'href'=>l('account-area/enrolled-courses'),
//             'icon' => 'fa fa-sticky-note-o',
//             'name' => 'Enrolled Courses',
//             );

//         $data[] = array(
//             'is_dropdown' => false,
//             'is_dashboard'=>true,
//             'class'=>$method=='order' ? 'active' : '',
//             'href'=>l('account-area/order-history'),
//             'icon' => 'fa fa-cart-arrow-down',
//             'name' => 'Order History',
//             );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>$method=='order' ? 'active' : '',
        //     'href'=>l('account-area/packages'),
        //     'icon' => 'fa fa-usd',
        //     'name' => 'Packages Info',
        //     );



        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>$method=='favorite_article' ? 'active' : '',
        //     'href'=>l('account-area/favorite-article'),
        //     'icon' => 'fa fa-book',
        //     'name' => 'Favorite Articles',
        //     );

        

        // $data[] = array(
        //     'is_dropdown' => true,
        //     'is_dashboard'=>true,
        //     'class'=>$class=='Video Management' ? 'active' : '',
        //     'icon' => 'fa fa-video-camera',
        //     'name' => 'Video Management',
        //     'navigation'=> array(
        //             array(
        //                 'is_dashboard'=>true,
        //                 'class'=>'',
        //                 'href'=>'javascript:void(0);',
        //                 'icon' => 'fa fa-lock',
        //                 'name' => 'Video Listing',
        //             ),
        //             array(
        //                 'is_dashboard'=>true,
        //                 'class'=>'',
        //                 'href'=>'javascript:void(0);',
        //                 'icon' => 'fa fa-lock',
        //                 'name' => 'Add Video',
        //             ),
        //         )
        //     );

        // $data[] = array(
        //     'is_dropdown' => false,
        //     'is_dashboard'=>true,
        //     'class'=>'',
        //     'href'=>l('signout'),
        //     'icon' => 'fa fa-lock',
        //     'name' => 'Logout',
        //     );

        return $data;
    }

    /*
    * Redirect If not logged in.
    * Access for all user {Factory/Supplier/Factory Employee}
    */
    public function login_redirect_check_front()
    {
        global $config;
        $login_session = $this->session->userdata('logged_in_front');
        
        if(isset($login_session) AND array_filled($login_session))
        {
            return true;
        }
        else
        {
            //redirect("/login");
            redirect(l('login')."?msgtype=error&msg=".urlencode('Please login first'),true);
            exit();
        }
    }



}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
