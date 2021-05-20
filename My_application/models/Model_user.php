<?
class Model_user extends MY_Model {

	protected $_table    = 'user';
    protected $_field_prefix    = 'user_';
    protected $_pk    = 'user_id';
    protected $_status_field    = 'user_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor

       // IF GET IS_ADMIN THAN IS ADMIN
        if(isset($_GET['is_admin'])) {
            $this->pagination_params['fields'] = "user_id,user_firstname,user_lastname,user_email,user_status";

            //$this->pagination_params['joins'][] = $this->join_user_info("LEFT");
            $this->pagination_params['where']['user_is_admin'] = 1;
            $this->pagination_params['where_string'] = 'user_id > 1';
        }
        else
        {
            // $this->pagination_params['fields'] = "user_id,user_firstname,user_lastname,user_email,user_type,user_status,user_email_verified_status";
            $this->pagination_params['fields'] = "user_id,user_firstname,user_lastname,user_email,user_status";
            
            $this->pagination_params['where']['user_is_admin'] = 0;
            //$this->pagination_params['where']['user_type'] = $_GET['type'];
        }



        // Call the Model constructor
        parent::__construct();
    }


    public function join_user_info($type="" , $append_joint ="" , $prepend_joint = "")
    {
        $joint = $prepend_joint . "ui_user_id = user_id " . $append_joint ; 
        return $this->prep_join("user_info" , $joint, $type );
    }



    public function get_user_list_active()
    {
        $var = array();
        $param = array();
        $param['where']['user_is_admin'] = 0;
        $data = $this->find_all_active($param);
        if(isset($data) AND array_filled($data))
        {
            foreach($data as $value)
            {
                $var[$value['user_id']] = ucfirst($value['user_email']);
                // $var[$value['user_id']] = ucfirst($value['user_firstname'].' '.$value['user_lastname']);
            }
        }
        return $var;
    }
    
   

    public function find_user_list_active($param = array())
    {
        $param = array();
        $param['where']['user_is_admin']  = '0';
        $param['fields'] = 'CONCAT(user_firstname ," ",user_lastname) as user_username,user_id';
        return $this->find_all_list_active($param , 'user_username');
    }

    public function find_user_list($param = array())
    {
        $param = array();
        $param['where']['user_is_admin']  = '0';
        $param['fields'] = 'CONCAT(user_firstname ," ",user_lastname) as user_username,user_id';
        return $this->find_all_list($param , 'user_username');
    }


    public function find_user_type($type)
    {
        $data = $this->get_fields('user_type');

        return isset($data['list_data'][$type]) ? $data['list_data'][$type] : '';
    }


    public function find_by_username($slug)
    {
        $param['fields'] = 'AVG(jm_user_review.ur_rating) AS rating,COUNT(jm_user_review.ur_rating) AS total_reviews,jm_user.*,,jm_user_info.*';
        $param['where']['user_username'] = $slug;
        $param['joins'][] = array(
                        'table' => 'user_review',
                        'joint' => 'user.user_id = user_review.ur_client_id',
                        'type' => 'LEFT'
                            );
        return $this->find_one_active($param);
    }


    public function find_by_email($email)
    {
        $param['where']['user_email'] = $email;
        return $this->find_one($param);
    }


    public function email_exist_in_db($email)
    {
        $data = $this->find_by_email($email);
        return isset($data['user_id']) ? true : false;
    }


    public function get_user_password($id)
    {
        $param = array();
        $param['fields'] = "user_password";
        $result = $this->find_by_pk($id , false,$param);
        return $result['user_password'];
    }



    /**
        Additional Changes parent function Start
    */

        
        
    // include join of user_info
    public function find_one($params=array() , $return_obj = false)
    {
        $params['joins'][] = $this->join_user_info("LEFT");
        return parent::find_one($params,  $return_obj);
    }

    // include join of user_info
    public function find_all($params=array())
    {
        $params['joins'][] = $this->join_user_info("");
        return parent::find_all($params);
    }

    /**
        Additional Changes in use save function
    */
    //public function save_front()
    public function save()
    {
        if(isset($this->model_user->_attributes['user_id']) AND ($this->model_user->_attributes['user_id'] > 0))
            $insert_mode = false;
        else
            $insert_mode = true;

        
        $user_id = parent::save();
        

        if($user_id > 0)
        {
            $param = array();

            /**
                SAVE EXTRA INFO START
            */
            //if(isset($_POST['user_info']) AND array_filled($_POST['user_info']))
            if($insert_mode)
            {
                $user_info_data = (isset($_POST['user_info']) AND array_filled($_POST['user_info'])) ? $_POST['user_info'] : array();
                $param = $user_info_data;
                $param['ui_user_id'] = $user_id;
                
                $this->model_user_info->set_attributes($param);
                $this->model_user_info->save();
            }
            /**
                SAVE EXTRA INFO END
            */

            return $user_id;
        }
        else {
            return 0;
        }
    }


    public function update_by_pk($id , $data=array())
    {
        parent::update_by_pk($id , $data);

        if(isset($_POST['user_info']) AND array_filled($_POST['user_info']))
        {
            $user_info_data = $_POST['user_info'];
            //$user_info_data['ui_user_id'] = $id;
            $params[ 'where' ][ 'ui_user_id' ] = $id ;
            $this->model_user_info->update_model($params, $user_info_data);
        }

        return true;
    }

    /**
        Additional Changes parent function End
    */

    public function _encrypt_password($password)
    {
        return md5($password);
    }

    public function check_unique_email()
    {
        $param = array();
        $param['where']['user_email'] = $_POST['shop_order']['order_billing_email'];
        $data = $this->find_one_active($param);
        //return (isset($data) AND array_filled($data)) ? false : true;
        return isset($data['user_id']) ? $data['user_id'] : 0;
    }
    

    // Do Login
    public function auto_login($user_id,$type='admin')
    {
        // Get CodeIgnier Instance
        $user = $this->find_by_pk($user_id , true);

        if (!$user) {
            return FALSE;
        } else {
            if($type == 'admin') {
                $this->set_user_session($user);
            }
            else {
                
                // User Login History Save Start -> 30 JUNE 2017
                //if($user->user_type == 0)
                if(1 == 1)
                {
                    $data = array('ulh_user_id' => $user_id);
                    $this->db->insert('user_login_history', $data); 
                }
                // User Login History Save End -> 30 JUNE 2017


                $this->update_by_pk($user_id,array('user_is_online'=>1));


                $this->set_user_session_front($user);
            }

            return true;
        }
    }

     // Do Login
    public function login()
    {
        // Get CodeIgnier Instance
        $CI = & get_instance();

        $params['where']['user_email'] = $this->input->post('user_email') ;
        $params['where']['user_password'] = $this->_encrypt_password($this->input->post('user_password')) ;
        $params['where']['user_status'] = 1;
        $user = $this->find_one($params , true);
        if (!$user) {
            $CI->form_validation->set_message('user_check', 'Incorrect Username or ID');
            return FALSE;
        } else {
            $this->set_user_session($user);
            return true;
        }

    }

    // Admin Session
    public function set_user_session($user)
    {
        $CI = & get_instance();
        $sess_array = array(
                        'id' => $user->user_id, 
                        'username' => $user->user_username, 
                        'first_name' => ucfirst($user->user_firstname), 
                        'last_name' => ucfirst($user->user_lastname), 
                        //'nameprefix' => $user->user_nameprefix, 
                        'email' => $user->user_email, 
                        //'country' => $user->user_country,
                        //'dob' => $user->user_dob,
                        //'user_title'  => $user->user_title,
                        'profile_image' => (empty($user->ui_profile_image) ? g('images_root').'profile/profile.png' : get_image($user->ui_profile_image,$user->ui_profile_image_path)),
                        'is_admin'  => $user->user_is_admin,
                        'user_type'  => $user->user_type,
                        'user_email_verified_status' => $user->user_email_verified_status
                    );

        $CI->session->set_userdata('logged_in', $sess_array);
        
    }


    // Do Login
    public function do_login()
    {
        // Get CodeIgnier Instance
        $CI = & get_instance();

        $params['where']['user_email'] = trim($this->input->post('user_name')) ;
        $params['where']['user_password'] = $this->_encrypt_password($this->input->post('user_password')) ;
        $params['where']['user_status'] = 1;
        $params['where']['user_is_admin'] = 0;
        $params['where_string'] = 'user_type > 0';

        $user = $this->find_one($params , true);
        
        if (!$user) {
            $CI->form_validation->set_message('user_check', 'Incorrect Username or Password');
            return FALSE;
        } else {
            $this->set_user_session_front($user);
            return true;
        }

    }

    // Front Session
    public function set_user_session_front($user)
    {
        $CI = & get_instance();
        $sess_array = array(
                        'id' => $user->user_id, 
                        'username' => $user->user_username, 
                        'first_name' => $user->user_firstname, 
                        'last_name' => $user->user_lastname, 
                        'email' => $user->user_email, 
                        'profile_image' => (empty($user->ui_profile_image) ? g('images_root').'profile/profile.png' : get_image($user->ui_profile_image,$user->ui_profile_image_path)),
                        'is_front'  => true,
                        'user_type'  => 1,//$user->user_type,
                        'user_email_verified_status' => $user->user_email_verified_status,
                        'user_points' =>$user->user_points
                    );

        $CI->session->set_userdata('logged_in_front', $sess_array);
        
    }


    ##### User Cookies Setting START
    public function set_user_cookies()
    {   
        // $cookie = array(
        //     'name'   => 'remember_me_token',
        //     'value'  => $_POST['user']['user_email'],
        //     'expire' => '1209600',  // Two weeks
        //     'domain' => 'http://localhost/devemail0909@gmail.com/tidyclothes',
        //     'path'   => '/'
        // );
        //set_cookie($cookie);

        $name = 'remember_me_token';
        $value = $_POST['user']['user_email'];
        $expire = '1209600';// Two weeks

        set_cookie($name,$value,$expire); 

        return true;
    }

    public function unset_user_cookies()
    {
        setcookie('remember_me_token', null, -1, '/');
        return true;
    }

    // public function set_user_cookies_advisor()
    // {   
    //     $name = 'remember_me_username';
    //     $value = $_POST['user']['user_username'];
    //     $expire = '1209600';// Two weeks

    //     set_cookie($name,$value,$expire); 

    //     return true;
    // }

    // public function unset_user_cookies_advisor()
    // {
    //     setcookie('remember_me_username', null, -1, '/');
    //     return true;
    // }
    ##### User Cookies Setting END

    // Deactivate Account 
    public function deactivate_account($user_id)
    {
        $param = array();
        $param['user_status'] = 0;
        $param['user_is_online'] = 0;
        $this->update_by_pk($user_id, $param);
        return true;
    }

    // Delete Account 
    public function delete_account($user_id)
    {
        $this->delete_by_pk($user_id);
        return true;
    }




    public function user_last_login_history($user_id , $limit = 3)
    {
        $query = "SELECT * FROM jm_user_login_history
                    WHERE ulh_user_id = $user_id
                    ORDER BY ulh_id DESC
                    LIMIT $limit ";

        return $this->query_render($query);
    }

    
    

    

    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * attributes  HTML Field Attributes
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules
    */

    public function get_fields($specific_field = "")
    {
        
        $fields[ 'user_id' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_id',
                    'label'   => 'ID',
                    'primary'   => 'primary',
                    'type'   => 'hidden',
                    'attributes'   => array(),
                    'js_rules'   => '',
                    'rules'   => 'trim'
                );

        $fields[ 'ui_profile_image' ] = array(
                     'table'   => $this->_table,
                     'name'   => 'img',
                     'label'   => 'Image',
                     'type'   => 'none',
                     'type_dt'   => 'image',
                     'name_path'   => 'ui_profile_image_path',
                     'upload_config'   => 'ui_profile_image_path',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => '',
                     'rules'   => ''
            );


        // IF Admins User Start
        if($this->router->fetch_class() == 'admins')
        {
            $fields[ 'user_firstname' ] = array(
                        'table'   => $this->_table,
                        'name'   => 'user_firstname',
                        'label'   => 'First Name',
                        'type'   => 'text',
                        'default'   => '',
                        'attributes'   => array(),
                        'rules'   => 'required|trim'
                    );

            $fields[ 'user_lastname' ] = array(
                        'table'   => $this->_table,
                        'name'   => 'user_lastname',
                        'label'   => 'Last Name',
                        'type'   => 'text',
                        'default'   => '',
                        'attributes'   => array(),
                        'rules'   => 'required|trim'
                    );

            $fields[ 'user_email' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_email',
                    'label'   => 'Email',
                    'type'   => 'text',
                    'attributes'   => array(),
                    'js_rules'   => 'required',
                    'rules'   => 'required|valid_email|strtolower|trim|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'email]'
                );

            $fields[ 'user_password' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_password',
                    'label'   => 'Password',
                    'type'   => 'password',
                    'default'   => '',
                    'attributes'   => array(),
                    //'rules'   => 'required|trim|matches[retype]|md5'
                    'rules'   => 'required|trim|htmlentities|min_length[8]|max_length[100]'
                );

            $fields[ 'user_type' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_type',
                    'label'   => 'User Type',
                    'type'   => 'hidden',
                    'dt_type'   => 'dropdown',
                    'list_data'    => array(
                                    CONSUMERS_USER => "<span class=\"label label-primary\">Consumer</span>" ,  
                                    PROFESSIONALS_USER => "<span class=\"label label-primary\">Professional</span>" ,  
                                    ORGANIZATION_USER => "<span class=\"label label-primary\">Organization</span>" ,  
                                    BUSINESS_USER => "<span class=\"label label-primary\">Business</span>" ,  
                                    EXHIBITORS_USER => "<span class=\"label label-primary\">Exhibitors</span>" ,  
                                    VENDOR_USER => "<span class=\"label label-primary\">Vendor</span>" ,  
                                    //BUSINESS_ADS_USER => "<span class=\"label label-primary\">Business Ads</span>" ,  
                                    ) ,
                    'default'   => '0',
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

        
            $fields[ 'user_email_verified_status' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_email_verified_status',
                    'label'   => 'IS Email<br /> verified?',
                    'type'   => ($this->uri->segment(3) == 'add') ? 'hidden' : 'switch',
                    'type_dt' => 'switch',
                     'list_data'    => array(
                                            0 => "<span class=\"label label-default\">Not-Verified</span>" ,  
                                            1 =>  "<span class=\"label label-primary\">Verified</span>"  
                                            ) ,
                    'default'   => 0,
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

        
            $fields[ 'user_status' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_status',
                    'label'   => 'Status?',
                    'type'   => 'switch',
                    'default'   => '1',
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

       
            $fields[ 'user_is_admin' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_is_admin',
                    'label'   => 'Is Admin?',
                    'type'   => 'hidden',
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

        }// IF Admins User End
        else // IF User Start
        {
            $fields[ 'user_package_id' ] = array(
                        'table'   => $this->_table,
                        'name'   => 'user_package_id',
                        'label'   => 'Points',
                        'type'   => 'hidden',
                        'default'   => '',
                        'attributes'   => array(),
                        'rules'   => 'trim'
                    );
            
            $fields[ 'user_points' ] = array(
                        'table'   => $this->_table,
                        'name'   => 'user_points',
                        'label'   => 'Points',
                        'type'   => 'hidden',
                        'default'   => '',
                        'attributes'   => array(),
                        'rules'   => 'trim'
                    );

            $fields[ 'user_firstname' ] = array(
                        'table'   => $this->_table,
                        'name'   => 'user_firstname',
                        'label'   => 'First Name',
                        'type'   => 'readonly',
                        'default'   => '',
                        'attributes'   => array(),
                        'rules'   => 'required|trim'
                    );

            $fields[ 'user_lastname' ] = array(
                        'table'   => $this->_table,
                        'name'   => 'user_lastname',
                        'label'   => 'Last Name',
                        'type'   => 'readonly',
                        'default'   => '',
                        'attributes'   => array(),
                        'rules'   => 'trim'
                    );

            // $fields[ 'user_username' ] = array(
            //         'table'   => $this->_table,
            //         'name'   => 'user_username',
            //         'label'   => 'User Name',
            //         'type'   => 'text',
            //         'attributes'   => array(),
            //         'js_rules'   => 'required',
            //         'rules'   => 'required|strtolower|trim|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'username]'
            //     );
        

            $fields[ 'user_email' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_email',
                    'label'   => 'Email',
                    'type'   => 'readonly',
                    'attributes'   => array(),
                    'js_rules'   => 'required',
                    'rules'   => 'required|valid_email|strtolower|trim|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'email]'
                );

            $fields[ 'user_password' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_password',
                    'label'   => 'Password',
                    'type'   => 'password',
                    'default'   => '',
                   'attributes'   => array('additional'=>'readonly="readonly"'),
                    //'rules'   => 'required|trim|matches[retype]|md5'
                    'rules'   => 'required|trim|htmlentities|min_length[8]|max_length[100]'
                );

            $fields[ 'user_type' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_type',
                    'label'   => 'User Type',
                    'type'   => 'hidden',
                    'type_dt'   => 'dropdown',
                    'list_data'    => array(
                                    CONSUMERS_USER => "<span class=\"label label-primary\">Consumer</span>" ,  
                                    PROFESSIONALS_USER => "<span class=\"label label-success\">Professional</span>" ,  
                                    ORGANIZATION_USER => "<span class=\"label label-default\">Organization</span>" ,  
                                    BUSINESS_USER => "<span class=\"label label-warning\">Business</span>" ,  
                                    EXHIBITORS_USER => "<span class=\"label label-primary\">Exhibitors</span>" ,  
                                    VENDOR_USER => "<span class=\"label label-default\">Vendor</span>" ,  
                                    //BUSINESS_ADS_USER => "<span class=\"label label-danger\">Business Ads</span>" ,  
                                    ) ,
                    'default'   => '0',
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

        
            $fields[ 'user_email_verified_status' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_email_verified_status',
                    'label'   => 'IS Email<br /> verified?',
                    'type'   => ($this->uri->segment(3) == 'add') ? 'hidden' : 'switch',
                    'type_dt' => 'switch',
                     'list_data'    => array(
                                            0 => "<span class=\"label label-default\">Not-Verified</span>" ,  
                                            1 =>  "<span class=\"label label-primary\">Verified</span>"  
                                            ) ,
                    'default'   => 0,
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

            $fields[ 'user_term_agreed' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_term_agreed',
                    'label'   => 'IS Accept<br /> Term & Condition?',
                    'type'   => ($this->uri->segment(3) == 'add') ? 'hidden' : 'switch',
                    'type_dt' => 'switch',
                     'list_data'    => array(
                                            0 => "<span class=\"label label-default\">No</span>" ,  
                                            1 =>  "<span class=\"label label-primary\">Yes</span>"  
                                            ) ,
                    'default'   => 0,
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );

            // $fields[ 'user_is_online' ] = array(
            //         'table'   => $this->_table,
            //         'name'   => 'user_is_online',
            //         'label'   => 'Is Online?',
            //         'type'   => 'switch',
            //         'default'   => '1',
            //         'attributes'   => array(),
            //         'rules'   => 'trim'
            //     );
        
            $fields[ 'user_status' ] = array(
                    'table'   => $this->_table,
                    'name'   => 'user_status',
                    'label'   => 'Status?',
                    'type'   => 'switch',
                    'default'   => '1',
                    'attributes'   => array(),
                    'rules'   => 'trim'
                );
        }
        // IF User End


       

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }
}
?>