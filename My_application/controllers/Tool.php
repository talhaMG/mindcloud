<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tool extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	
        parent::__construct();
    }

    public function signup()
    {
        global $config;
        
        // SEO Module
        $this->plugin_seo();
        
        $this->layout_data['title'] = g('db.admin.site_title');
        $this->layout_data['title'] = g('db.admin.site_title')." | Sign Up";

        $concontent = $this->model_cms_page->get_page(3);
        $data['concont1'] = $concontent['child'][0];
        $data['concont2'] = $concontent['child'][1];
        $data['inner_banner'] = $this->model_inner_banner->find_by_pk(5);
            
        $this->load_view("signup",$data);

    }

    public function signin()
    {
        global $config;
        
        // SEO ModuleIn
        $this->plugin_seo();
        
        $this->layout_data['title'] = g('db.admin.site_title');
        $this->layout_data['title'] = g('db.admin.site_title')." | Sign In";

        $concontent = $this->model_cms_page->get_page(73);
        $data['cont1'] = $concontent['child'][0];
 
        $data['inner_banner'] = $this->model_inner_banner->find_by_pk(12);
            
        $this->load_view("signin",$data);
     }

    public function forgot()
    {
        global $config;
        
        // SEO ModuleIn
        $this->plugin_seo();
        
        $this->layout_data['title'] = g('db.admin.site_title');
        $this->layout_data['title'] = g('db.admin.site_title')." | Sign In";

        $concontent = $this->model_cms_page->get_page(73);
        $data['cont1'] = $concontent['child'][0];
 
        $data['inner_banner'] = $this->model_inner_banner->find_by_pk(12);
            
        $this->load_view("forgot",$data);
     }

 public function keycheck($id,$key)
{
    if($key == md5($id))
        {return true;}
    else    
        {return false;}
}

public function stepcheck($stepid,$tool_builderid)
{
    if ($tool_builderid > 0) {
    switch ($stepid) {
           // case 0:
           //  $url = l('step-one').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
           //  break;
        
        case 1:
            $url = l('step-two').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;
        
        case 2: 
            $url = l('step-three').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

        case 3: 
            $url = l('step-four').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 4: 
            $url = l('step-five').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;
   
            case 5: 
            $url = l('step-nine').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 6: 
            $url = l('step-ten').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;
            
            case 7: 
            $url = l('step-eleven').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 8: 
            $url = l('step-twelve').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 9: 
            $url = l('step-thirteen').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 10: 
            $url = l('step-fourteen').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

             case 11: 
            $url = l('step-fortysix').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 12: 
            $url = l('step-sixteen').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 13: 
            $url = l('step-seventeen').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 14: 
            $url = l('step-eighteen').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;


            case 15: 
            $url = l('step-fiftytwo').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 16: 
            $url = l('step-twenty').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 17: 
            $url = l('step-twentyone').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 18: 
            $url = l('step-twentytwo').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 19: 
            $url = l('step-fiftyone').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;


            case 20: 
            $url = l('step-twentyfour').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 21: 
            $url = l('step-twentyfive').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 22: 
            $url = l('step-twentysix').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

             case 23: 
            $url = l('step-twentyseven').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 24: 
            $url = l('step-twentyeight').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 25: 
            $url = l('step-twentynine').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 26: 
            $url = l('step-thirty').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;


            case 27: 
            $url = l('step-thirtyone').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;


            case 28: 
            $url = l('step-thirtytwo').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 29: 
            $url = l('step-thirtythree').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 30: 
            $url = l('step-thirtyfour').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

             case 31: 
            $url = l('step-thirtysix').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;
            
            case 32: 
            $url = l('step-thirtyseven').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 33: 
            $url = l('step-thirtyeight').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 34: 
            $url = l('step-forty').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 35: 
            $url = l('step-fortytwo').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 36: 
            $url = l('step-fortynine').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 37: 
            $url = l('step-fifty').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;
            
            case 38: 
            $url = l('step-fortytwo').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

             case 39: 
            $url = l('step-fortyfour').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;

            case 40: 
            $url = l('step-finish').'?query-id='.$tool_builderid.'&key='.md5($tool_builderid);
            break;
    
    //debug($url);

 
        default:
        break;
    }
    redirect($url);
  }
}


    public function ajax_steptwo()
    {
        
        if (isset($_POST)) {
              
                 $this->form_validation->set_rules('tool_builder[tool_builder_value_proposition]', 'Value Proposition', 'trim');

                if ($this->form_validation->run() == FALSE) {

                $this->json_param['status'] = false;
                $this->json_param['msg']['title'] = 'Error Occurred';
                $this->json_param['msg']['desc'] = validation_errors();
                 }
              else
              {
                $id = $_POST['id'];
                $data = array();
                $data = $_POST['tool_builder'];
                $data['tool_builder_step_id'] = 2;
                $this->model_tool_builder->update_by_pk($id,$data);

                $this->json_param['status'] = true;
                $this->json_param['msg']['title'] = 'Proceeding...';
                $this->json_param['msg']['desc'] = 'Go to Next Step';
              //  $this->json_param['msg']['url'] = l('step-1').'?query-id='.$id.'&key='.$_POST['key'];

              }
        }
            echo json_encode($this->json_param);

    }

     





 




}
