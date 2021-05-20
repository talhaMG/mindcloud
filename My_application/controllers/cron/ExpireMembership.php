<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExpireMembership extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    // public function Expire()
    // {
    //     $date = date("Y-m-d",strtotime("-1 days"));
    
    //     $data = $this->model_subscription->getExpireMembership($date);
    //     // debug($data);

    //     if(isset($data) AND array_filled($data)) {
    //         foreach($data as $value) {
    //             // Update user
    //             // $this->model_user->update_by_pk($value['subscription_user_id'],array('user_package_status'=>0));
    //             $this->model_subscription->update_by_pk($value['subscription_user_id'],array('subscription_status'=>0));

    //     // debug($value);
    //             // Email Notification k product Expire
    //             $this->model_email->package_expire_notification($value);
    //         }

    //         // Admin Notification
    //         // $this->model_email->package_expire_admin_notification($data);
    //     }

    //     return true;
    // }

    public function Expire()
    {
        $date = date("Y-m-d",strtotime("-1 days"));
        
    
        $data = $this->model_advertisment->getExpireMembership($date);

// debug($data);
        if(isset($data) AND array_filled($data)) {
            foreach($data as $value) {
                
                // DEACTIVATE USER SUBSCRIPTION
                $this->model_advertisment->update_by_pk($value['advertisment_id'],array('advertisment_id'=>0));
                if (ENVIRONMENT != 'development') {
                    // Email Notification k product Expire
                $this->model_email->package_expire_notification($value);
                }
                
            }
        if (ENVIRONMENT != 'development') {
            // Admin Notification
            $this->model_email->package_expire_admin_notification($data);
        }
        }

        return true;
    }

}
