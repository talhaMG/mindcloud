<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends MY_Controller {

    /**
     * Signin Controller. - The deafult controller
     *
     * @package     Signin
     * @author      devemail0909@gmail.com devemail0909@gmail.com (devemail0909@gmail.comdevemail0909@gmail.com.it@gmail.com)
     * @version     1.0
     * @since       03 Jun, 2015
     */

     
    public function __construct()
    {
        // Call the Model constructor latest_product
        parent::__construct();
    }

    public function index($id = '')
    {
        global $config;

        
        if(isset($_POST) && array_filled($_POST)) {
            
            //if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
            if(1 == 2)
            {
                $json_param['status'] = false;
                $json_param['msg']['title'] = 'Error Occured';
                $json_param['msg']['desc'] = 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?';
            } 
            else
            {
                $user = $this->input->post('user');
                
                $param = array();
                $param['where']['user_email'] = htmlentities(trim($user['user_email']));
                $param['where']['user_password'] = md5($user['user_password']);
                //$param['where']['user_type'] = 0;// Just end user login
                if(ENVIRONMENT != 'development')
                    $param['where']['user_is_admin'] = 0;
                $data = $this->model_user->find_one_active($param);
                
                if(isset($data) && array_filled($data)) {
        
        
                    $email_verification_status = $data['user_email_verified_status'];  //emial verification

                    if(isset($_POST['remember_password']) && (intval($_POST['remember_password']) == 1))
                        $this->model_user->set_user_cookies();
                    else
                        $this->model_user->unset_user_cookies();
    
    
                    // Online User status
                    //$this->model_user->user_online_status($data['user_id']);
                    
                    //  CREATE SESSION DATA START
                    // $this->model_user->auto_login($data['user_id'] , 'front');
                    //$this->user_login($data['user_id'] , $data['user_email'] , $data['user_type'] , 2);
                    //  CREATE SESSION DATA END
                 
                    
                    /**
                        JSON PARAM
                    */
                        // if ($email_verification_status == 1) {
                            $json_param['status'] = true;
                            $json_param['msg']['title'] = '';
                            $json_param['msg']['desc'] = 'Successfully Login';          
                            
                            $this->model_user->auto_login($data['user_id'] , 'front');

                        // }
                        // else{
                        //     $json_param['status'] = false;
                        //     $json_param['msg']['title'] = '';
                        //     $json_param['msg']['desc'] = 'Your Email Address is not Verified.Please loggin your registered email id & verify.';  
                        // }
                        
                    if(isset($_POST['url']) && strlen($_POST['url']) > 0) {
                        $url = $_POST['url'] . '?msg='.urlencode($json_param['msg']['desc']);
                    }
                    else {
                        $url = l('account/dashboard');
                    }

                    $json_param['redirect']['status'] = true;
                    $json_param['redirect']['link'] = $url;
    
                    //$json_param['node_param']['data'] = $this->session->userdata('logged_in_front');
                    // debug($json_param , 1);
                }
                else {
                    $json_param['status'] = false;
                    $json_param['msg']['title'] = 'Error Occured';
                    $json_param['msg']['desc'] = 'Invalid Email or Password';
                }
            }
        }
        else {
            $json_param['status'] = false;
            $json_param['msg']['title'] = 'Error Found';
            $json_param['msg']['desc'] = 'Error Found';
        }

        echo json_encode($json_param);
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */