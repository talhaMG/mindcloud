<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Account.php");

class Advertisment extends MY_Controller_Account {

    /**
     * Achievements page
     *
     * @package		category
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;


        parent::__construct();

        $this->class_name = $this->router->fetch_class();
        $this->view_pre = 'account/'.$this->class_name.'/';

        $this->_list_data['advertisment_country'] = $this->model_ads_country->find_all_list_active(array(),"ads_country_name");
        $this->_list_data['advertisment_ucountry'] = $this->model_country->find_all_list_active(array(),"country");

        
    }


    // Listing/Data table page
    public function add($id='' , $data = array())
    {
        
        global $config;

        $this->add_script(array( 
            "account/jquery.validate.js" ,
            "account/form-validation-script.js",
            "account/tkd_script.js",
            "account/metronic.js",
            "account/quick-sidebar.js",
            "account/demo.js",
            "account/ui-alert-dialog-api.js",
            "account/layout.js",
        ) , "js" );

        $this->register_plugins("jquery-file-upload","bootstrap-switch",
            "select2",
            "bootbox"
        );
        $this->view_pre = 'account/account_area_theme/default/';

        if(isset($_POST) AND array_filled($_POST)) {
            $_POST['advertisment']['advertisment_user_id'] = $this->userid;
            
        }
        
        $this->form_params = array(
				"action" => array(
					"save_edit_attr" => "#tab_1" ,
					"hide_save" => true ,
					"hide_save_new" => true ,
					"hide_cancel" => true ,
				),
			);

        parent::add($id,$data);
    }

    public function before_add_render(&$data)
    {
        $data['form_fields']['advertisment']['advertisment_payment_status']['type'] = 'hidden';
        $data['form_fields']['advertisment']['advertisment_approve']['type'] = 'hidden';
        $data['form_fields']['advertisment']['advertisment_status']['type'] = 'hidden';

        // To access from Child Class
        if($data['id'] > 0){
            if(($data['form_data']['advertisment']['advertisment_user_id'] == $this->userid))
            {
                return true;
            }
            else {
                redirect(l('account/dashboard?msgtype=error&msg='.urlencode('Advertisment can\'t find, Please try again.')) , 'refresh');
            }
        }
        else {
            return true;
        }
    }

    public function add_redirect_success($id)
    {
        $this->account_current = "account/".$this->router->fetch_class('') .'/'.$this->router->fetch_method('') . "/";
        switch($_POST['submit'])
        {
            case "SaveNEdit":
                $path = $this->account_current.$id;
            break;
            case "SaveNNew":
                $path = $this->account_current;
            break;
            default:
                $path = "account/".$this->router->fetch_class('') .'/';
            break;
        }
        
        redirect($path."?msgtype=success&msg=".urlencode('Record updated successfuly.'), 'refresh');
        //return $id;
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
