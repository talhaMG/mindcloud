<?
class Model_email extends MY_Model {
  
    /**
     * TKD Email MODEL
     *
     * @package     Email Model
     * @author      devemail0909@gmail.com devemail0909@gmail.com (devemail0909@gmail.comdevemail0909@gmail.com.it@gmail.com)
     * @version     2.0
     * @since       2015 
     */

    private $to;
    private $from = 'dalton.developer@gmail.com';
    private $subject;
    private $msg;


    private $billingEmail = 'sales@sc.com';//'billing@chemco.com';
    private $customerSupportEmail = 'sales@sc.com';//'cs@chemco.com';
    private $salesEmail = 'sales@sc.com';//'sales@chemco.com';
    private $technicalEmail = 'sales@sc.com';//'technical@chemco.com';
    private $developerEmail = 'sales@sc.com';//'devemail0909@gmail.com';

    private $_template = 'default_template';//'query';

    function __construct()
    {
        parent::__construct();

        $this->to = $this->_set_to_email();
    }


    private function _set_to_email()
    {
        $this->load->model('model_config');
        
        $config_info = $this->model_config->find_by_pk(6);

        if(array_filled($config_info))
            return $config_info['config_value'];
        else
            return 'dalton.developer@gmail.com';
    }

    public function email($send_to ='' , $send_from ='' , $subject ='' ,  $msg ='')
    {
        if(ENVIRONMENT == 'development')
        {
            // echo $send_to . "<br />";
            // echo $send_from . "<br />";
            // echo $subject . "<br />";
            // echo $msg . "<br />";
            // die();
        }
        
        parent::email($send_to,$send_from,$subject,$msg);
    }

    #Generalize Emial
    public function custom_email($from,$to, $template, $title)
    {
        $this->load->library('email');
        //$this->email->initialize($config); // Add

        $db_to = g("db.admin.email_contact_us");
        $send_from = !empty($from) ? $from : $db_to;
        $send_to = $to;

        $message = $template;
        $title = !empty($title) ? $title : 'Notification - '.g("db.admin.email_contact_us");

        $this->email->from($send_from);
        $this->email->to($send_to);
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        //$this->email->protocol('smtp');
        $this->email->send();
    }


    #1- Contact us inquriy
    public function contactInquiry($data)
    {
        $this->from = isset($data['inquiry_email']) ? $data['inquiry_email'] : $this->from;
        $this->subject = isset($data['inquiry_heading']) ? $data['inquiry_heading'].' Inquiry' : 'Contact us Inqiury';

        $param = array();
        if(isset($data) && array_filled($data))
        {
            foreach($data as $kye=>$value)
            {
                $param['form_input'][$kye] = htmlentities(trim($value));
            }
            //for custom fields
            // $param['form_input']['Full Name'] = ucfirst(htmlentities(trim($data['inquiry_name'])));
            // $param['form_input']['Email'] = ucfirst(htmlentities(trim($data['inquiry_email'])));
            // $param['form_input']['Contact Number'] = ucfirst(htmlentities(trim($data['inquiry_phone'])));
            // $param['form_input']['Message'] = ucfirst(htmlentities(trim($data['inquiry_message'])));
            // $param['form_input']['Uploaded File'] = "<a href='".get_image($data['inquiry_image'],$data['inquiry_image_path'])."' download >Uploaded File</a>";

        }

        $param['title'] = 'Contact us Inquiry';
        $param['msg'] = 'Dear Admin,<br> <br>
                        We have received an inquiry in your website, detail is given below:<br><br>';

        unset($param['form_input']['inquiry_status']);
        $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        $this->email($this->to , $this->from , $this->subject , $this->msg);

        return true;
    }


    #2- Contact us inquriy
    public function subscribe_newsletter($id)
    {
        //$this->_template = 'default';
        $data = $this->model_newsletter->find_by_pk($id);
        
        $this->subject = g('site_title') . ' - Subscriber';
        
        $this->to =  $data['newsletter_email'];
        $name = (isset($data['newsletter_name']) AND !empty($data['newsletter_name'])) ? $data['newsletter_name'] : $this->to;
        $content = 'Congratulations! You have successfully subscribed.';

        $content = 'Dear '.$name.'<br />';
        $content .= 'Thanks for joining '.g('site_title').'<br />';
        $content .= 'Congratulations! You have successfully subscribed was made on '.date("m/d/Y g:i a").' <br />';
        $content .= 'Thanks again for joining'. g('site_title'). '.<br />';
        $content .= 'Happy working,<br />';
        $content .= 'The ' . g('site_title') . ' Team';

        $param['msg'] = $content;
        // echo $param['msg']; die();
        //$param['form_input']['comments'] = $content;

        $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        $this->email($this->to , $this->from , $this->subject , $this->msg);

        return true;
    }


   #3- Email Verification without token
    public function notification_register($id , $type='user')
    {
        //$this->subject = g('site_title') . ' - SUCCESSFUL REGISTRATION';
        $this->subject = 'Please complete your '.g('site_title').' account registration';
        $token = md5("REG-".$id."GEF");
        $data = $this->model_user->find_by_pk($id);

        $user_type = $this->model_user->find_user_type($data['user_type']);
        if($type == 'user')
        {
            // $this->from = $this->_set_to_email();
            // $this->to = $data['user_email'];
            
            $this->from = !empty(g('db.admin.email_contact_us')) ? g('db.admin.email_contact_us') : $this->customerSupportEmail;
            $this->to = !empty($data['user_email']) ? $data['user_email'] : $this->_set_to_email();

            $random = $data['user_token_number'];
            $url = g('base_url') . "signup/authentication/$id/?token=$token";


            $content = 'Thanks for joining '.g('site_title').'. We are ready to activate your account but want to verify your email 
                    address and the authenticity of your request first. Our records show the email of '.$data['user_email'].' 
                    registered for a '.g('site_title').' account on '.date("m/d/Y g:i a",strtotime($data['user_createdon'])).'<br /><br />';

            $content .= 'Please <a href="'.$url.'">click here</a> to confirm your intention to register on '.g('site_title').'.<br /><br />';
            $content .= 'Your confirmation enables you to access and utilize all features on '.g('site_title').'. 
                        If this activity occurred without your knowledge or permission, we would appreciate your notifying 
                        us at '.g('db.admin.email_contact_us').'<br /><br />';

           

            $param['msg'] = $content;
        }
        else {
            $this->from = $data['user_email'];
            $this->to = !empty(g('db.admin.email_contact_us')) ? g('db.admin.email_contact_us') : $this->customerSupportEmail;
            
            // $this->to = $this->_set_to_email();
            

            $param['title'] = 'User Detail';
            $content = 'Hey Admin, One '.$user_type.' has been registered in your website.';
            $param['msg'] = $content;
            $param['form_input']['firstname'] = htmlentities(trim($data['user_firstname']));
            $param['form_input']['lastname'] = htmlentities(trim($data['user_lastname']));
            $param['form_input']['email'] = htmlentities(trim($data['user_email']));
            $param['form_input']['status'] = ($data['user_status'] == 1 ? 'ACTIVE' : 'IN-ACTIVE');
        }
        
        $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
    
        // echo $this->from;
        // echo $this->to;
        // echo $this->msg;
        // echo $this->subject;
        // die();
        
        $this->email($this->to , $this->from , $this->subject , $this->msg);

        return true;
    }


    #4- Reset Password
    // RESET PASSWORD EMAIL
    public function reset_password($data)
    {
        $this->customerSupportEmail = g('db.admin.email_contact_us');
        // $this->form = $this->customerSupportEmail;

        $this->form = g('db.admin.email_contact_us');

        $name = $data['user_firstname'] . " " . $data['user_lastname'];
        $this->to = $data['user_email'];
        $token = "HYQ357".$data['user_id']."-354T";

        $encrypt_code = md5($token);
        $url = g('base_url') . "account/reset_password/index/{$encrypt_code}/?token={$token}";

        $content = "$name, <br />";
        $content .= 'We received a password reset request from '.$this->to.'. <br />';
        $content .= 'To reset your '.g('site_title').' account password please <a href="'.$url.'">click here</a> <br />';
        $content .= 'If this activity occurred without your knowledge or permission, we would appreciate your notifying us at '.$this->customerSupportEmail.'<br />';
        $content .= 'Thank you <br />' ;
        $content .= g('site_title') . ' Team';

       
        $param['msg'] = $content;

        
        $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);

        $this->subject = 'Please complete your '.g('site_title').' password reset request';
        
        parent::email($this->to , $this->form ,$this->subject, $this->msg);
        return true;
    }

    // public function product_inquiry_mail($id)
    // {
    //     $data = $this->model_product_inquiry->get_by_pk($id);
        
    //     $this->from = $this->customerSupportEmail;
    //     $this->to = $this->_set_to_email();
    //     $this->subject = 'Purchased Product Info ('.$data['product_name'].')';
        
    //     $param['title'] = 'Product Inquiry Detail';
    //     $content = 'Hey Admin, Product has been purchased in your website.<br />';
    //     $content .= 'Detail is given below.<br />';
    //     $content .= 'Product Name : ' . $data['product_name'] . "<br />";
    //     $content .= 'Product Points : ' . $data['product_price'] . "<br />";
    //     $content .= 'User Name : ' . $data['user_firstname'] . ' ' .$data['user_lastname'] . "<br />";
    //     $content .= 'User Email : ' . $data['user_email'] . "<br />";
    //     $content .= 'User Phone : ' . $data['pi_phone'] . "<br />";
    //     $content .= 'Subject : ' . $data['pi_subject'] . "<br />";
    //     $content .= 'Description : ' . $data['pi_message'] . "<br />";

    //     $param['msg'] = $content;


    //     $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
    //     $this->email($this->to , $this->from , $this->subject , $this->msg);

    //     return true;
    // }



    


    #2- Friend Request inquriy
    // public function send_friend_request($data , $type)
    // {
    //     $token = md5(FRIEND_REQUEST.$data['fr_bike_id']);
    //     $url = l('excel_file/index/'.$data['fr_bike_id']) . "?token={$token}";
        
    //     $this->subject = g('site_title').' Build File';//isset($data['fr_subject']) ? $data['fr_subject'].' (Bike Build to a Friend)' : 'Bike Build to a Friend';

    //     $param = array();
    //     if(isset($data) && array_filled($data))
    //     {
    //         $param['form_input']['bike'] = 'Seven Axiom SL';
    //         $param['form_input']['message'] = $data['fr_comment'];
    //         $param['form_input']['friend'] = $data['fr_friend_fname'] . " " . $data['fr_friend_lname'];
    //         $param['form_input']['friend_email'] = $data['fr_to_email'];
    //         $param['form_input']['your_email'] = $data['fr_from_email'];
    //         $param['form_input']['file'] = "To download the file from BikeTrik: <a href='{$url}'>Click Here</a>";


    //         //$param['form_input']['subject'] = $data['fr_subject'];

    //     }
        
    //     $param['title'] = 'Request Detail';

    //     if($type == 'sender')
    //     {
    //         $this->from = $this->customerSupportEmail;
    //         $this->to = isset($data['fr_from_email']) ? $data['fr_from_email'] : $this->from;

    //         $param['msg'] = 'Dear sender,<br> <br>
    //                     You have send a friend request for bike build, detail is given below:<br><br>';
    //     }
    //     else if($type == 'receiver')
    //     {
    //         $this->from = isset($data['fr_from_email']) ? $data['fr_from_email'] : $this->from;
    //         $this->to = isset($data['fr_to_email']) ? $data['fr_to_email'] : $this->from;

    //         $param['msg'] = 'Dear '.$param['form_input']['friend'].',<br> <br>';
    //         $param['msg'] .= 'A friend wanted to share their bike\'s build file with you.<br> <br>';
    //         $param['msg'] .=  'Contact the friend identified above if you have concerns or questions about the 
    //                             authenticity of this share. If you don’t know the friend listed or have confirmed 
    //                             that your friend didn’t initiate the share, we would appreciate your letting us know at '. $this->customerSupportEmail.'<br> <br>';
            
    //         // $param['msg'] = 'Dear '.$param['form_input']['friend_name'].',<br> <br>
    //         //             We have received the friend request for bike build, detail is given below:<br><br>';
    //     }
    //     else 
    //     {
    //         $this->from = isset($data['fr_from_email']) ? $data['fr_from_email'] : $this->from;
    //         $this->to = $this->to;

    //         $param['msg'] = 'Dear Admin,<br> <br>
    //             One user send a friend request for bike build, detail is given below:<br><br>';
    //     }
        
    //     $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
    //     $this->email($this->to , $this->from , $this->subject , $this->msg);

    //     return true;
    // }


    // Email Notification 
    //public function notification_register($to , $from = '', $type , $data)
    

    #5- Email Verification with TOKEN
    public function request_account_activate($user_id,$token)
    {
        $data = $this->model_user->find_by_pk($user_id);

        $this->to = $data['user_email'];
        $this->from = $this->customerSupportEmail;

        
        $encrypt_code = $token['ut_token'];
        $url = g('base_url') . "account/active_account/request/{$encrypt_code}/";


        $content = 'Thanks for joining '.g('site_title').'. We are ready to activate your account but want to verify your email address 
                    and the authenticity of your request first. Our records show the email of '.$this->to.' 
                    requested account activation on '.date("m/d/Y g:i a",strtotime($data['user_createdon'])).'<br /><br />';

        $content .= 'Please <a href="'.$url.'">click here</a> Verify Address and enter this token# <strong>'.$data['user_account_activate_token'].'</strong> to securely confirm your activation request.<br /><br />';

        $content .= 'If this activity occurred without your knowledge or permission, we would appreciate your notifying us at '.$this->customerSupportEmail.'<br /><br />';
        $content .='Thank you <br />';
        $contnetn .= 'Team '.g('site_title');

        
        
        $param['msg'] = $content;

        
        $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);

        $this->subject = 'Please complete your request for account activation with '.g('site_title');
        //$this->subject = g('site_title') . ' - Request account activate';

        parent::email($this->to , $this->from ,$this->subject, $this->msg);
        return true;
    }


    #5- PAYMENT NOTIFICATION FOR PACKGES
 public function subscription_notification($id,$type ="USER")
    {
         $id = intval($id);

        $invoice = $this->model_subscription->find_by_pk($id);
        
        // debug($invoice);

        $result = $invoice;
        // debug();
        $img = $this->model_logo->get_logo();
        // Company Letter Head
        $result['letter_head']['logo'] = get_image($img['logo_image'],$img['logo_image_path']);
        $result['letter_head']['name'] = g('db.admin.site_title');
        $result['letter_head']['address'] = g('db.admin.company_address');
        $result['letter_head']['uk_phone'] = g('db.admin.uk_phone');
        $result['letter_head']['us_phone'] = g('db.admin.us_phone');

        // debug($result['letter_head']);
        
        // Customer Info
        $result['customer_info']['name'] = ucfirst($invoice['subscription_firstname'].''.$invoice['subscription_lastname']);
        $result['customer_info']['phone'] =  $invoice['subscription_phone'];
        $result['customer_info']['email'] = $invoice['subscription_email'];
        $result['customer_info']['address']   = $invoice['subscription_address1'];

    $result['status']['payment_status']   = $this->model_subscription->get_payment_status($invoice['subscription_payment_status']);
        
             
          $result['amount_info']['total_amount'] = $invoice['subscription_amount'] ;  //package price


        $result['invoice_info']['no'] = $invoice['subscription_id'];
        $result['invoice_info']['date'] = date("M d,Y", strtotime($invoice['subscription_package_start'])); 
        $result['invoice_info']['invoice_amount'] = price($result['amount_info']['total_amount']);
        $result['invoice_info']['discount'] = $result['subscription_discount']."%";

        $result['package_info']['title'] = $invoice['subscription_package_name'] ;
        $result['package_info']['expireon'] = $invoice['subscription_package_expire'] ;
        $result['package_info']['startedon'] = $invoice['subscription_package_start'] ;
        

        // debug($result['invoice_info'], 1);  

        // 

      // $content = $this->load->view('_layout/email_template/payment_notification',$result,true);
      // $content = $this->load->view('_layout/email_template/payment_notification_admin',$result,true);
       
       $send_to = $this->_set_to_email();

        if($type == 'USER'){
            $send_to = $invoice['subscription_email'];
           $content = $this->load->view('_layout/email_template/package_subscription_notification',$result,true);}
        else{
            // $send_to = $this->_set_to_email();
            $send_to  = g('db.admin.email_contact_us');
            $content = $this->load->view('_layout/email_template/package_subscription_notification_admin',$result,true);
        }


        // $admin_email = g('db.admin.email_contact_us');
        $send_fromp = $this->salesEmail;
        $admin_email = (!empty(g('db.admin.email_contact_us'))) ?  g('db.admin.email_contact_us') : $send_fromp ;
        $send_from = (!empty($admin_email)) ?  $admin_email : $send_fromp ;


        $subject = g('db.admin.site_title').'Payment Acknowledgement';     
        // echo $send_to."<br/>";

        // echo $send_from."<br/>";
        // echo $subject."<br/>";
        // echo $content;
        // die();
        parent::email_structure($send_to , $send_from ,$subject, $content);
        return true;
    }


    #6- PAYMENT NOTIFICATION FOR ORDER
    // public function notification_invoice($id , $type = 'USER')
    // {
    //     $id = intval($id);

    //     $invoice = $this->model_shop_order->find_by_pk($id);
    //     $result = $invoice;
    //     // Company Letter Head
    //     $result['letter_head']['logo'] = $this->model_logo->get_logo();
    //     $result['letter_head']['name'] = g('site_title');
    //     $result['letter_head']['address'] = g('db.admin.company_address');
    //     $result['letter_head']['phone'] = g('db.admin.company_phone');

    //     // Customer Info
    //     $result['customer_info']['name'] = ucfirst($invoice['order_billing_fname'] . ' ' . $invoice['order_billing_lname']);
    //     $result['customer_info']['address'] = $invoice['order_billing_address'];
    //     $result['customer_info']['phone'] = $invoice['order_billing_phone'];
    //     $result['customer_info']['email'] = $invoice['order_billing_email'];


    //     $items = $this->model_shop_item->find_by_order_id($id);
    //     $sub_total = 0;
    //     if(isset($items) AND array_filled($items)) {
    //         $result['items_info']['heading'] = array('Item','Qty','Amount');

    //         foreach($items as $item) {
    //             $unserialize = unserialize($item['item_serialize']);
    //             $size = isset($unserialize['options']['cart_additional']['size']) ? $unserialize['options']['cart_additional']['size'] : '';
    //             $color = isset($unserialize['options']['cart_additional']['color_name']) ? $unserialize['options']['cart_additional']['color_name'] : '';

    //             $sub_total += $item['item_price'];
    //             $item_name = $item['item_product_name']."<span><br />Color: $color</span>";
    //             $result['items_info']['item'][] = array(
    //                                 $item_name,
    //                                 $item['item_qty'],
    //                                 // price($item['item_rate']),
    //                                 price($item['item_price']),
    //                                 );
    //         }
    //     }

    //     // Amount Info
    //     $result['amount_info']['sub_total'] = $sub_total;
    //     $result['amount_info']['shipping_charges'] = $invoice['order_shipping_amount'];
    //     $result['amount_info']['tax'] = $invoice['order_tax_amount'];
    //     $result['amount_info']['discount'] = $invoice['order_discount_amount'];
    //     $total_amount = ($result['amount_info']['sub_total']+$result['amount_info']['shipping_charges']+$result['amount_info']['tax'])-$result['amount_info']['discount'];
    //     $result['amount_info']['total_amount'] = $total_amount;

    //     // Invoice Info
    //     // debug($invoice);
    //     $result['invoice_info']['no'] = order_no($id);
    //     // $result['invoice_info']['payer'] = $invoice['order_paypal_ipn_track_id'];
    //     $result['invoice_info']['payment_method'] = $invoice['order_payment_type'];
    //     $result['invoice_info']['date'] = date("M d,Y", strtotime($invoice['order_ondate']));
    //     $result['invoice_info']['invoice_amount'] = price($total_amount);


    //     $content = $this->load->view('_layout/email_template/email_template2',$result,true);
        
    //     if($type == 'USER')
    //         $send_to = $invoice['order_billing_email'];
    //     else
    //         $send_to = $this->_set_to_email();
        

    //     $send_from = $this->salesEmail;

    //     $subject = 'Payment Acknowledgment';

    //     $this->to = $send_to;
    //     $this->from = $send_from;
    //     $this->subject = $subject;
    //     $this->msg = $content;
    // // echo $this->msg;
    // // die();
    //     parent::email($this->to , $this->from ,$this->subject, $this->msg);
        
    //     return true;
    // }


    #PACKAGE EXPIRATUION ALERT
    //original method      
     // public function membership_expire_alert($expire_membership =" ")
     // {
     //    // debug($expire_membership);
     //    // $result['customer_info'] =  $expire_membership;

     //    $result['logo'] = $this->model_logo->get_logo();

     //    $result['letter_head']['name'] = g('site_name');
     //    $result['letter_head']['address'] = g('db.admin.address');
     //    $result['letter_head']['phone'] = g('db.admin.phone');
    
    
     //    // Customer Info
     //    $result['customer_info']['name'] = ucfirst($expire_membership['subscription_firstname'].''.$expire_membership['subscription_lastname']);
     //    $result['customer_info']['phone'] =  $expire_membership['subscription_phone'];
     //    $result['customer_info']['email'] = $expire_membership['subscription_email'];


     //    $result['package_info']['title'] = $expire_membership['subscription_package_name'] ;
     //    $result['package_info']['expireon'] = $expire_membership['subscription_package_expire'] ;
     //    $result['package_info']['startedon'] = $expire_membership['subscription_package_start'] ;

     //   $content = $this->load->view('_layout/email_template/expiration_alert',$result,true);
       
     //    $send_to  = $expire_membership['subscription_email'];

     //    //$admin_email = g('db.admin.email');
     //    $send_fromp = $this->salesEmail;
     //    $admin_email = (!empty(g('db.admin.email_contact_us'))) ?  g('db.admin.email_contact_us') : $send_fromp ;
     //    $send_from = (!empty($admin_email)) ?  $admin_email : $send_fromp ;


     //    $subject = g('db.admin.site_title').' Subscribtion Expired';     

     //    // echo $send_to."<br/>";

     //    // echo $send_from."<br/>";
     //    // echo $subject."<br/>";
     //    // echo $content;
     //    // die();

     //    parent::email_structure($send_to , $send_from ,$subject, $content);
     //    return true;

     // }    

    // FOR ADVERTISMENT  EXPIRATION  (JOBSDOLLAR)
      public function membership_expire_alert($expire_membership =" ")
     {
        // debug($expire_membership);
        // $result['customer_info'] =  $expire_membership;

        $logo =  $this->model_logo->get_logo();
        $result['logo'] = get_image($logo['logo_image'],$logo['logo_image_path']);


        $result['letter_head']['name'] = g('site_name');
        $result['letter_head']['address'] = g('db.admin.address');
        $result['letter_head']['phone'] = g('db.admin.phone');
    
    
        // Customer Info
        $result['customer_info']['name'] = ucfirst($expire_membership['advertisment_firstname'].''.$expire_membership['advertisment_lastname']);
        $result['customer_info']['phone'] =  $expire_membership['advertisment_phone'];
        $result['customer_info']['email'] = $expire_membership['advertisment_email'];


        $result['package_info']['title'] = $expire_membership['advertisment_package_name'] ;
        $result['package_info']['expireon'] = $expire_membership['advertisment_package_expire'] ;
        $result['package_info']['startedon'] = $expire_membership['advertisment_package_start'] ;

       $content = $this->load->view('_layout/email_template/expiration_alert',$result,true);
       
        $send_to  = $expire_membership['advertisment_email'];

        //$admin_email = g('db.admin.email');
        $send_fromp = $this->salesEmail;
        $admin_email = (!empty(g('db.admin.email_contact_us'))) ?  g('db.admin.email_contact_us') : $send_fromp ;
        $send_from = (!empty($admin_email)) ?  $admin_email : $send_fromp ;


        $subject = g('db.admin.site_title').' Subscribtion Expired';     

        // echo $send_to."<br/>";

        // echo $send_from."<br/>";
        // echo $subject."<br/>";
        // echo $content;
        // die();

        parent::email_structure($send_to , $send_from ,$subject, $content);
        return true;

     }  

         // FOR ADVERTISMENT  SUBSCRIPTION
      public function advertisment_notification($expire_membership =" ",$type)
     {
        // debug($expire_membership);
        // $result['customer_info'] =  $expire_membership;

        $logo =  $this->model_logo->get_logo();
        $result['logo'] = get_image($logo['logo_image'],$logo['logo_image_path']);


        $result['letter_head']['name'] = g('site_name');
        $result['letter_head']['address'] = g('db.admin.address');
        $result['letter_head']['phone'] = g('db.admin.phone');
    
    
        // Customer Info
        $result['customer_info']['name'] = ucfirst($expire_membership['advertisment_firstname'].''.$expire_membership['advertisment_lastname']);
        $result['customer_info']['phone'] =  $expire_membership['advertisment_phone'];
        $result['customer_info']['email'] = $expire_membership['advertisment_email'];


        $result['package_info']['title'] = $expire_membership['advertisment_package_name'] ;
        $result['package_info']['expireon'] = $expire_membership['advertisment_package_expire'] ;
        $result['package_info']['startedon'] = $expire_membership['advertisment_package_start'] ;
        $result['package_info']['area'] =$expire_membership['advertisment_address'];
        $result['package_info']['miles'] =$expire_membership['advertisment_miles'];
        $result['type'] = $type;

        $result['invoice_info']['invoice_amount'] = price($expire_membership['advertisment_price']);

       $content = $this->load->view('_layout/email_template/advertisment_notification',$result,true);
       


            if ($type == 'USER') 
            {
        $send_to  = $expire_membership['advertisment_email'];
        $send_fromp = $this->salesEmail;
        $admin_email = (!empty(g('db.admin.email_contact_us'))) ?  g('db.admin.email_contact_us') : $send_fromp ;
        $send_from = (!empty($admin_email)) ?  $admin_email : $send_fromp ;
        
            }else{

        $send_to  = g('db.admin.email_contact_us');
        $send_from = $expire_membership['advertisment_email'];

            }
        

        $subject = g('db.admin.site_title').' - Advertisment Subscribtion';     

        // echo $send_to."<br/>";
        // echo $send_from."<br/>";
        // echo $subject."<br/>";
        // echo $content;
        // die();

        parent::email_structure($send_to , $send_from ,$subject, $content);
        return true;

     }  




    #SUBSCRITION NOTIFICATION FOR ADMIN
     //      public function package_expire_admin_notification($expire_membership =" ")
     // {

        
     //    // debug($expire_membership);
     //    // $result['customer_info'] =  $expire_membership;

     //    $result['logo'] = $this->model_logo->get_logo();


     //    $result['letter_head']['name'] = g('site_name');
     //    $result['letter_head']['address'] = g('db.admin.address');
     //    $result['letter_head']['phone'] = g('db.admin.phone');
    
     //    //table heading
     //    $result['heading'] = array("User Name","Email", "Package","Expired On", "Package Cost");
     //    $result['expired_subscriptions'] = $expire_membership;
     //   $content = $this->load->view('_layout/email_template/admin_subscription_expire',$result,true);
       
     //    $send_to  = g('db.admin.email');

     //    //$admin_email = g('db.admin.email');
     //    $send_fromp = $this->salesEmail;
     //    $admin_email = (!empty(g('db.admin.email_contact_us'))) ?  g('db.admin.email_contact_us') : $send_fromp ;
     //    $send_from = (!empty($admin_email)) ?  $admin_email : $send_fromp ;


     //    $subject = g('title').' Place Expired Subscribtions';     

     //    // echo $send_to."<br/>";

     //    // echo $send_from."<br/>";
     //    // echo $subject."<br/>";
     //    // echo $content;
     //    // die();

     //    parent::email_structure($send_to , $send_from ,$subject, $content);
     //    return true;

     // }
    public function package_expire_admin_notification($expire_membership =" ")
     {
        

        $logo =  $this->model_logo->get_logo();
        $result['logo'] = get_image($logo['logo_image'],$logo['logo_image_path']);


        $result['letter_head']['name'] = g('site_name');
        $result['letter_head']['address'] = g('db.admin.address');
        $result['letter_head']['phone'] = g('db.admin.phone');
    
        //table heading
        $result['heading'] = array("User Name","Email", "Package","Expired On", "Package Cost");
        $result['expired_subscriptions'] = $expire_membership;
       $content = $this->load->view('_layout/email_template/admin_subscription_expire',$result,true);
       
        $send_to  = g('db.admin.email_contact_us');

        //$admin_email = g('db.admin.email');
        $send_fromp = $this->salesEmail;
        $admin_email = (!empty(g('db.admin.email_contact_us'))) ?  g('db.admin.email_contact_us') : $send_fromp ;
        $send_from = (!empty($admin_email)) ?  $admin_email : $send_fromp ;


        $subject = g('title').'Expired Subscribtions';     

        // echo $send_to."<br/>";

        // echo $send_from."<br/>";
        // echo $subject."<br/>";
        // echo $content;
        // die();

        parent::email_structure($send_to , $send_from ,$subject, $content);
        return true;

     }

    # - JOB APPLICATION NOTIFICATION   //FOR JOBSDOLLAR (to admin)
    public function notify_job_applied($userid,$job_id,$type="ADMIN")
    {
        
        // $data = $this->model_newsletter->find_by_pk($id);
        $param = array();
        $param['fields'] = "jobs_id,jobs_name,user_id,user_email,jobs_organization";
        $param['joins'][] = array(
        "table"=>"user" , 
        "joint"=>"user.user_id = jobs.jobs_user_id"
          ); 
        $job_info = $this->model_jobs->get_approved_job_by_id($job_id,$param);

        $user_param  = array();
        $user_param['fields'] = "user_id,user_email,ui_profile_image2,ui_profile_image_path,user_firstname,user_lastname"; 
        $applied_userdata = $this->model_user->find_by_pk_active($userid,false,$user_param);

        $this->from = !empty(g('db.admin.email_contact_us')) ? g('db.admin.email_contact_us') : $this->from;
        $this->subject = g('site_title') . ' - Notification';

        $name = $type;
    if ($type == "ADMIN")
     {
        $this->to =  g('db.admin.email_contact_us');
    
        $content = 'Dear '.$name.'<br />';
        $content .= 'User has applied for the job.The details are below.';
        $content .= '<ul>
            <li>Job-ID : <span>'.$job_info["jobs_id"].'</span></li>
            <li>Job Title : <span>'.$job_info["jobs_name"].'</span></li>
            <li>Job Organization : <span>'.$job_info["jobs_organization"].'</span></li>
            <li>Job Posted BY: <span>'.$job_info["user_email"].'</span></li>
            <li>Job Posted On: <span>'.$job_info["jobs_createdon"].'</span></li>
        </ul>';
        $content .= 'Applicant Details <br />';
        $content .= '<ul>
            <li>User-ID : <span>'.$applied_userdata["user_id"].'</span></li>
            <li>User Email : <span>'.$applied_userdata["user_email"].'</span></li>
        </ul>';
        $content .= 'Regards,<br />';
        $content .= 'The ' . g('site_title') . ' Team';

        $param['msg'] = $content;           
     }else{

        $this->to =  $job_info["user_email"];  // job posted by
    
        $content = 'Dear '.$name.'<br />';
        $content .= 'An Applicant has applied for the job.The details are below.<br />';
        $content .= 'Job Details <br />';
        $content .= '<ul>
            <li>Job-ID : <span>'.$job_info["jobs_id"].'</span></li>
            <li>Job Title : <span>'.$job_info["jobs_name"].'</span></li>
            <li>Job Organization : <span>'.$job_info["jobs_organization"].'</span></li>
            <li>Job Posted BY: <span>'.$job_info["user_email"].'</span></li>
            <li>Job Posted On: <span>'.$job_info["jobs_createdon"].'</span></li>
        </ul>';
        $content .= 'Applicant Details <br />';
        $content .= '<ul>
            <li>User : <span>'.$applied_userdata["user_firstname"].' '.$applied_userdata["user_lastname"].'</span></li>
            <li>Email : <span>'.$applied_userdata["user_email"].'</span></li>
            <li>Resume : <span>
            <a href="'.get_image($applied_userdata["ui_profile_image2"],$applied_userdata["ui_profile_image_path"]).'" download >'.$applied_userdata["ui_profile_image2"].'</a></span>
            </li></ul>';
        $content .= 'Regards,<br />';
        $content .= 'The ' . g('site_title') . ' Team';
        $content .= '<br />Contact us:'.g('db.admin.email_contact_us');

        $param['msg'] = $content;           

     }        
     

        // echo $param['msg']; die();
        // $param['form_input']['comments'] = $content;

        $this->msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        $this->email($this->to , $this->from , $this->subject , $this->msg);

        return true;
    }

 #6- PAYMENT NOTIFICATION FOR ORDER
    public function notification_invoice($id , $type = 'USER')
    {
        $id = intval($id);

        $invoice = $this->model_shop_order->find_by_pk($id);
        $result = $invoice;
        // Company Letter Head
        $result['letter_head']['logo'] = $this->model_logo->get_logo();
        $result['letter_head']['name'] = g('site_title');
        $result['letter_head']['address'] = g('db.admin.company_address');
        $result['letter_head']['phone'] = g('db.admin.company_phone');

        // Customer Info
        $result['customer_info']['name'] = ucfirst($invoice['order_billing_fname'] . ' ' . $invoice['order_billing_lname']);
        $result['customer_info']['address'] = $invoice['order_billing_address'];
        $result['customer_info']['phone'] = $invoice['order_billing_phone'];
        $result['customer_info']['email'] = $invoice['order_billing_email'];


        $items = $this->model_shop_item->find_by_order_id($id);
        $sub_total = 0;
        if(isset($items) AND array_filled($items)) {
            $result['items_info']['heading'] = array('Item','Qty','Amount');

            foreach($items as $item) {
                $unserialize = unserialize($item['item_serialize']);
                $size = isset($unserialize['options']['cart_additional']['size']) ? $unserialize['options']['cart_additional']['size'] : '';
                $color = isset($unserialize['options']['cart_additional']['color_name']) ? $unserialize['options']['cart_additional']['color_name'] : '';

                $sub_total += $item['item_price'];
                $item_name = $item['item_product_name']."<span><br />Color: $color</span>";
                $result['items_info']['item'][] = array(
                                    $item_name,
                                    $item['item_qty'],
                                    // price($item['item_rate']),
                                    price($item['item_price']),
                                    );
            }
        }

        // Amount Info
        $result['amount_info']['sub_total'] = $sub_total;
        $result['amount_info']['shipping_charges'] = $invoice['order_shipping_amount'];
        $result['amount_info']['tax'] = $invoice['order_tax_amount'];
        $result['amount_info']['discount'] = $invoice['order_discount_amount'];
        $total_amount = ($result['amount_info']['sub_total']+$result['amount_info']['shipping_charges']+$result['amount_info']['tax'])-$result['amount_info']['discount'];
        $result['amount_info']['total_amount'] = $total_amount;

        // Invoice Info
        // debug($invoice);
        $result['invoice_info']['no'] = order_no($id);
        // $result['invoice_info']['payer'] = $invoice['order_paypal_ipn_track_id'];
        $result['invoice_info']['payment_method'] = $invoice['order_payment_type'];
        $result['invoice_info']['date'] = date("M d,Y", strtotime($invoice['order_ondate']));
        $result['invoice_info']['invoice_amount'] = price($total_amount);


        $content = $this->load->view('_layout/email_template/email_template2',$result,true);
        
        if($type == 'USER')
            $send_to = $invoice['order_billing_email'];
        else
            $send_to = $this->_set_to_email();
        

        $send_from = $this->salesEmail;

        $subject = 'Payment Acknowledgment';

        $this->to = $send_to;
        $this->from = $send_from;
        $this->subject = $subject;
        $this->msg = $content;
    // echo $this->msg;
    // die();
        parent::email($this->to , $this->from ,$this->subject, $this->msg);
        
        return true;
    }





    // public function payment_response_email($order_id , $type = 'USER')
    // {
    //     $id = intval($order_id);

    //     $order_data = $this->model_shop_order->find_by_pk($id);

    //     $param['order_note'] = $order_data['order_shipping_order_description'];


    //         ADD SHIPPING AMOUNT
    //     $param['order_tax'] = $order_data['order_tax_amount'];

    //     $param['order_discount'] = $order_data['order_discount_amount'];
    //     $param['discount_amount'] = $param['order_discount']; // just for extra use

    //     $param['order_shipping_amount'] = $order_data['order_shipping_amount'];
    //     $param['shipping_amount'] = $param['order_shipping_amount'];// just for extra use
 
        
    //     $param['type'] = $type;

    //         ADD USER EMAIL ID's
    //     $user_email[] = $order_data['order_billing_email'];
    //     $user_email[] = $order_data['order_shipping_email'];
    //     $param['user_email'] = implode(",", array_unique($user_email));
        
    //         GET EMAIL FROM SAVE IN DB
    //     $db_param = array();
    //     $db_param['where_string'] = 'config_id = 6';
    //     $admin_email = $this->model_config->find_all_list_active($db_param , 'config_value');

    //     $param['inquiry_email'] = $admin_email[6];
    //     $param['business_email'] = $admin_email[6];
        
    //         SOME TYPE WISE DATA
    //     if($type == 'USER'){
    //         $param['name'] = $order_data['order_billing_fname'] . ' ' . $order_data['order_billing_lname'];
            
    //         $param['email'] = $param['user_email'];
    //     }
    //     else{
    //         $param['name'] = 'Admin';

    //         $param['email'] = $confirmation_email;
    //     }
        
        
    //         CUSTOMER BILLING ADDRESS
        
    //     $param['billing_address'] = $order_data['order_billing_address'];

    //     if(!empty($order_data['order_billing_city']))
    //         $param['billing_address'] .= ', ' . $order_data['order_billing_city'];

    //     if(!empty($order_data['order_billing_state']))
    //         $param['billing_address'] .= ' ' . $order_data['order_billing_state'];

    //     if(!empty($order_data['order_billing_zip_code']))
    //         $param['billing_address'] .= ' ' . $order_data['order_billing_zip_code'];


    //     $fields = $this->model_shop_order->get_fields('order_payment_status');
    //     $param['payment_status'] = $fields['list_data'][$order_data['order_payment_status']];
        
    //     $param['order_no'] = order_no($id);



    //     // GET ORDER ITEM
    //     $oi_param['where']['item_order_id'] = $id;
    //     $order_item = $this->model_shop_item->find_all($oi_param);
        
        

    //     $i=1;
    //     $total_invoice_amount = 0; 
    //     foreach($order_item as $order_item_value)
    //     {
    //         $param['product'][$i]['product_name'] = $order_item_value['item_product_name'];
            
    //         $param['product'][$i]['product_qty'] = $order_item_value['item_qty'];
            
    //         $param['product'][$i]['product_rate'] = $order_item_value['item_rate'];

    //         $param['product'][$i]['product_total'] = $order_item_value['item_price'];
            
    //         $total_invoice_amount += $order_item_value['item_price'];
            
    //         $i++;
    //     }


    //     $param['test_mode'] = ($order_data['order_is_sandbox']== 1) ? true : false;
    //     $param['order_total'] = $total_invoice_amount;

    //     $result['total_order_amount'] = ($param['order_total']+$param['order_tax']+$param['order_shipping_amount'])-($param['discount_amount']);


    //     $result['data'] = $param;



    //     $content = $this->load->view('_layout/email_template/email_template',$result,true);
        

    //     if($type == 'USER') {
    //         $send_to = $order_data['order_billing_email'];
    //         $send_from = $this->salesEmail;
    //     }
    //     else {
    //         $send_to = $this->salesEmail;
    //         $send_from = $order_data['order_billing_email'];
    //     }

    //     $subject = 'Order Acknowledgement';

    //     parent::email($send_to , $send_from ,$subject, $content);
        
    //     return true;
    // }



  
}
?>