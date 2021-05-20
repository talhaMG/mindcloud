<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Account.php");

class Article extends MY_Controller_Account {

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

        $this->_list_data['a_category_id'] = $this->model_category->find_all_list_active(
            array('where_string'=>'category_parent_id <= 1')
            ,"category_name");
        
    }


    // Listing/Data table page
    public function index()
    {
        $this->register_plugins(array("datatables2"));

        $this->view_pre = 'account/account_area_theme/default/';
        $class_name = $this->class_name;//$this->router->class;
        $model_name = "model_".$class_name;
        $model_obj = $this->$model_name ;


        $data['user_id'] = $this->userid;
        $data['class'] = $class_name;
        $data['model'] = $model_obj;
        $data['title'] = humanize($this->class_name).' Management';
        $data['add_link'] = l('account/'.$this->class_name.'/add/');

        // Data Script
        $data['datatable'] = $this->model_article->get_data_by_user_id($this->userid,ARTICLE);
        $data['heading'] = array('a_id','a_category_id','a_name','a_status');
        $this->_list_data['a_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );
        


        $this->load_view("datatable" , $data);

    }


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
            $_POST['article']['a_user_id'] = $this->userid;
        }

        parent::add($id,$data);
    }

    public function before_add_render(&$data)
    {
        // FOR CHILD META TAG HIDDEN START
        //if($data['form_data']['cms_page']['cms_page_page'] > 1)
        if(1==1)
        {
            $data['form_fields']['article']['a_user_id']['type'] = 'hidden';
            $data['form_fields']['article']['a_user_id']['type'] = 'hidden';
        }
        // FOR CHILD META TAG HIDDEN END

        // To access from Child Class
        if($data['id'] > 0){
            if(($data['form_data']['article']['a_user_id'] == $this->userid) AND ($data['form_data']['article']['a_type_id'] == ARTICLE)) {
                return true;
            }
            else {
                redirect(l('account/dashboard?msgtype=error&msg='.urlencode('Article can\'t find, Please try again.')) , 'refresh');
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
        return $id;
    }



    // Delete Music
    public function delete_music()
    {
        if(isset($_POST) AND array_filled($_POST))
        {
            $id = intval($_POST['id']);

            $this->model_article->update_by_pk($id,array('conference_status' => 2));

            $json_param['status'] = true;
            echo json_encode($json_param);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
