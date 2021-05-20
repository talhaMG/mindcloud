<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Shop_order extends MY_Controller {



    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "order_id,order_user_id,order_billing_fname,order_billing_lname,order_billing_email,order_status";
        // order_payment_status

        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);
        

        $this->dt_params['action'] = array(
										"hide_add_button" => true ,
                                        "hide" => false ,
                                        "show_delete" => false ,
                                        "show_edit" => false ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array(
											"add_btn" => '<a title="Edit" href="'.la('shop_order/invoice/').'%d/"'.
															' target="_blank"><button class="btn btn-icon-only green" '.
															'data-model="model_'.$this->table_name.'" data-pk="'.$itemId.'" '.'>'.
															'<i class="fa fa-money"></i></button></a>',
                                        	) ,
                                      );

        /*
        $this->_list_data['order_payment_status'] = array( 
                                        0 => "<span class=\"label label-default\">Not Approved</span>" ,  
                                        1 =>  "<span class=\"label label-primary\">Payment approved</span>"  ,
                                        2 =>  "<span class=\"label label-default\">Declined</span>"  ,
                                        3 =>  "<span class=\"label label-default\">Error</span>"  ,
                                        4 =>  "<span class=\"label label-default\">Held for Review</span>" ,
                                        11 =>  "<span class=\"label label-default\">Fruad Cause</span>",
                                    );

        $this->_list_data['order_delivery_status'] = array( 
                                        0 =>  "<span class=\"label label-process\">In Process</span>"  ,
                                        1 =>  "<span class=\"label label-primary\">New order</span>"  ,
                                        2 =>  "<span class=\"label label-success\">Shipped</span>"  ,
                                        3 =>  "<span class=\"label label-warning\">On Hold</span>"  ,
                                        4 =>  "<span class=\"label label-danger\">Denied</span>" ,
                                        5 =>  "<span class=\"label label-danger\">Reject</span>" ,
                                    );
		*/
         $this->form_params['action'] = array(
						        	'hide_save' => true,
						        	'hide_save_new' => hide
						    	);
         //debug($this->_list_data , 1);
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

        $this->_list_data['order_user_id'] = $this->model_user->get_user_list_active();
        // $this->_list_data['order_shipping_type'] = $this->model_shipping->find_all_list_active(array(),
        //     "shipping_name");

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		// Populating LISTDATA
		$type = $_GET['order-type'];
		$config['js_config']['paginate']['uri'] .= '?order-type='.$type;

		$_POST = $this->input->post(NULL, true);
	}
	

	// public function before_add_render(&$data)
	// {
	// 	$this->layout_data['bread_crumbs'] = array(
	// 										array(
	// 											"home/"=>"Home" , 
	// 											'admin/cms_page' => "Cms Page",
	// 											//$class_name."/add/" => "Add ".humanize($class_name),
	// 										)
	// 									);
	// 	return true;
	// }


	// Invoice view
	public function invoice($id=0,$data=array())
	{

		$this->layout_data['template_config']['show_toolbar'] = false ;
		$this->register_plugins(array(						
									"jquery-ui",
									"bootstrap",
									"bootstrap-hover-dropdown",
									"jquery-slimscroll",
									"uniform",
									"boots",
									"font-awesome",
									"simple-line-icons" ,
									"select2",
									"bootbox",
									"bootstrap-toastr",
									"fancyboxnew",
								));



		
		$vars['where']['order_id'] = $id;
		$d = $this->model_shop_order->get_data($vars);
		$vars = array();
		// $vars['fields'] = 'item_id as id , course.course_id as course_id , course.course_name as course_name,
		// item_qty as course_qty , item_rate as course_rate , item_price as course_price,item_serialize as item_serialize';
		$vars['where']['item_order_id'] = $id;
		// $vars['joins'][] = array('table'=>'course' , 
			// 'joint'=>'item_product_id = course.course_id AND course.course_status = 1');
		$data['items'] = $this->model_shop_item->get_data($vars);
		// debug($data['items']);
		$total_amount = 0;
		if(isset($data['items']) && array_filled($data['items']))
		{
			foreach($data['items'] as $item) {
				$total_amount += $item['item_price'];
			}
		}
		$data['billing_amount'] = $total_amount;

		/** Additional charges or discount etc*/
		$total_amount += $d[0]['order_shipping_amount'];
		$total_amount += $d[0]['order_tax_amount'];
		$total_amount -= $d[0]['order_discount_amount'];

		$data['total_invoice_amount'] = $total_amount;

		$data['data'] = $d[0];
		
		// debug($data['data']);

		$data[ 'id' ] = $id; 

		$vars = array();
		$vars['where']['logo_id'] = 1;
		$data['logo'] = $this->model_logo->find_one_active($vars);

		$payements = $this->model_shop_order->order_amount_breakup($total_amount);
		

		// LOVECUSTOMART
			$data['payement1'] = ($d[0]['order_downpayment'] > 0) ? price($d[0]['order_downpayment']) : price($payements[0]);
			$data['payement_date1'] = !empty($d[0]['order_downpayment_date']) ? csl_date($d[0]['order_downpayment_date'],'d-m-Y') : '';  //if filled then paid

		$data['payement_2'] = ($d[0]['order_remaining_payment'] > 0) ? price($d[0]['order_remaining_payment']) : price($payements[1]);
		$data['payement_date2'] = !empty($d[0]['order_partialpayment_date']) ? csl_date($d[0]['order_partialpayment_date'],'d-m-Y') : '';//if filled then paid
		// LOVECUSTOMART

			// LOVECUSTOMART ORDER TRAIL
			$or_param['where']['otrail_order_id'] = $id;
			$order_history = $this->model_order_trail->find_all($or_param);
			$data['order_history'] = $order_history;


			$or_paramd['where']['otrail_order_id'] = $id;
			$or_paramd['where']['otrail_payment_type'] = 'downpayment';
			$or_paramd['where']['otrail_status'] = 1;
			$or_paramd['where']['otrail_payment_status'] = 1;
			$order_downpayment = $this->model_order_trail->find_one($or_paramd);
			$data['order_downpayment'] = $order_downpayment;

			// debug($order_downpayment);

			$or_paramp['where']['otrail_order_id'] = $id;
			$or_paramp['where']['otrail_payment_type'] = 'partialpayment';
			$or_paramp['where']['otrail_status'] = 1;
			$or_paramp['where']['otrail_payment_status'] = 1;
			$order_partial = $this->model_order_trail->find_one($or_paramp);
			$data['order_partial'] = $order_partial;

			// debug($order_partial);
			// LOVECUSTOMART ORDER TRAIL ENDS

		// EMAIL LOGS
			// $mail = array();
			// $mail['where']['ml_order_id'] = $id;
			// $order_emails = $this->model_maillog->find_all($mail);
// 			debug($this->db->last_query(),1);
// 			debug($order_emails,1);
			$data['order_emails'] = $order_emails;
		// EMAIL LOGS ENDS
			
		//PAINTED PHOTOS
		// $paint = array();
		// $paint['where']['painting_order_id'] = $id;
		// $data['uploaded_painting'] = $this->model_painting->find_all($paint);
		//PAINTED PHOTOS


		// get fields data 
		$data['fields'] = $this->model_shop_order->get_fields();
		if (!empty($d[0]['order_discount_content'])) {
		$coupon_data = !empty($d[0]['order_discount_content']) ? unserialize($d[0]['order_discount_content']) : '';
		$data['coupon_data'] = $coupon_data['coupon']['info'];

		}
		

		$data['order_status'] = array('In process', 'New order' , 'Shipped' , 'On Hold' , 'Denied' , 'Reject');
		//debug($data , 1);
		$this->load_view("invoice" , $data);
	}


	// public function order_delivery_status_change()
	// {
	// 	if(isset($_POST) && array_filled($_POST))
	// 	{
	// 		$order_id = intval($_POST['order_id']);
	// 		$data = array();
	// 		$data['order_delivery_status'] = intval($_POST['order_delivery_status']);

	// 		$inserted_id = $this->model_shop_order->update_by_pk($order_id,$data);
	// 		//$result = $this->model_shop_order->save_order_status($data);
	// 		if($inserted_id)
	// 			echo true;
	// 		else
	// 			echo false;
	// 	}
	// }

	// edit-item
	public function edit_item($id, $item_id)
	{

		$this->layout_data['template_config']['show_toolbar'] = false ;
		$this->register_plugins(array(						
									"jquery-ui",
									"bootstrap",
									"bootstrap-hover-dropdown",
									"jquery-slimscroll",
									"uniform",
									"boots",
									"font-awesome",
									"simple-line-icons" ,
									"select2",
									"bootbox",
									"bootstrap-toastr",
									"fancyboxnew",
								));
		// $this->add_script('order_item_script.js','js');
	
		$data['id'] =  $id; //order item id
		$data['item_id'] =  $item_id; //order item id


		$vars['where']['order_id'] = $id;
		$d = $this->model_shop_order->get_data($vars);
		$vars = array();
		
		// $vars['joins'][] = array('table'=>'order_image' , 
		// 	'joint'=>'order_image.pi_product_id = shop_item.item_id',
		// 	'type' => 'left'
		// );
		$total_amount = 0;
		$items = $this->model_shop_item->find_by_pk($item_id);
		// debug($items);
		
		$option_data = unserialize($items['item_serialize']);
		$option_data = $option_data['product'];
		$data['option_data'] = $option_data;
		
		// debug($option_data);
	//ORDERPAGAE EDIT
		$data['subject_data'] = $this->model_subject->find_all_active();
		$data['subjects_size_data'] =$this->model_painting_size->get_subject_size($items['item_subject']);
		// debug($data['subjects_size_data']);
			// medium images
		$data['medium_data'] = $this->model_order_medium->get_subject_medium($items['item_subject']);
	
		$people = $this->model_people->get_people_sizes($items['item_painting_size_id']);
		$data['people_data'] = $people;
		// debug($people);
		$pets = $this->model_pets->get_pet_sizes($items['item_painting_size_id']);
		$data['pets_data'] = $pets;

		$frames = $this->model_frames->get_size_frames($items['item_size_id']);
		$data['frames_data'] = $frames;

    	$shipping = $this->model_shipping->find_all_active(); 
    	$data['shipping_data'] = $shipping;
		
	//ORDERPAGAE EDIT
		
		$oimg =array();
		$oimg['where']['pi_product_id'] = $item_id;
		$oimg['limit'] = 1;
		$images =$this->model_order_image->find_one($oimg);
		

		$data['item_image'] =  get_image($images['pi_image'],$images['pi_image_path']); 
		$data['items'] = $items;
		$data['data'] = $d[0];
		
		$data[ 'id' ] = $id; 

		$vars = array();
		$vars['where']['logo_id'] = 1;
		$data['logo'] = $this->model_logo->find_one_active($vars);

		$this->load_view("edit_item" , $data);
	}

	public function order_item_imgs()
	{
		if(isset($_POST) && array_filled($_POST))
		{
	
		 // $oimg =$this->model_shop_item->find_by_pk($_POST['itemid']);
		 $param['where']['pi_product_id'] = $_POST['itemid'];
		 $oimg =$this->model_order_image->find_all($param);
		
		$data['oimg'] = $oimg;
		echo json_encode(
          array("data"=>$this->load->view('admin/shop_order/_order_images', $data, true))
          );

		}
	}

public function ajax_statusEmail()  //ORDER STATUS
{
     
		if(array_filled($_POST))
		{
			
			$id =  $_POST['id'];
			$data['fields'] = 'order_status,order_billing_email,order_billing_fname,order_billing_lname,order_ondate,order_user_id';
			$up = $this->model_shop_order->find_by_pk($id,false,$data);
		
			// debug($up,1);
			$emaildata = array();
			$emaildata['msg'] =  $_POST['message'];
			$emaildata['user_email'] =  $up['order_billing_email'];
			$emaildata['subject'] =  $_POST['subject'];
			$emaildata['ordercurrent_status'] =  $this->model_shop_order->painting_status($up['order_status']);
			$emaildata['user'] = $up['order_billing_fname'].' '.$up['order_billing_lname'];
			$emaildata['ordercode'] = order_no($up['order_ondate'],$id,$up['order_user_id']);
			// debug($emaildata);
			
			//updating orstatus table (email log) 
			$or_param = array();
			$or_param['ml_order_id'] = $id;
			$or_param['ml_subject'] = $_POST['subject'];
			$or_param['ml_message'] = $_POST['message'];
			$or_param['ml_order_status'] = $up['order_status'];

					$this->model_maillog->set_attributes($or_param);
                    $inserted_id = $this->model_maillog->save();

			if ($data['order_status'] != 0 || $data['order_status'] !=3) {
				
					$this->model_email->order_status_notification($emaildata);
			}

			$array['status'] = true;
			$array_filled['msg'] = 'Send';		
			
		}
		else{
			$array['status'] = false;
			$array['msg'] = 'record couldn\'t Send';			
		}

		echo json_encode($array);
	}




	public function request_payment()  //ORDER STATUS
{
		
		if(array_filled($_POST))
		{
             // debug($_POST);
			
			$id =  $_POST['order_id'];
			$data['fields'] = 'order_status,order_billing_email,order_billing_fname,order_billing_lname,order_ondate,order_user_id';
			$up = $this->model_shop_order->find_by_pk($id,false,$data);
			
			// debug($up,1);
			$emaildata = array();
			$emaildata['msg'] =  'Your Order has been completed.Please complete your 80% of payment on the provided link.';
			$emaildata['user_email'] =  $up['order_billing_email'];
			$emaildata['subject'] =  "Partial Payement(Remaining)";
			$emaildata['link'] =  l('cart/payment').'?oid='.$id.'&code='.md5($id).'&payment-type=partialpayment'; 
			$emaildata['ordercurrent_status'] =  $this->model_shop_order->painting_status($up['order_status']);
			$emaildata['user'] = $up['order_billing_fname'].' '.$up['order_billing_lname'];
			$emaildata['ordercode'] = order_no($up['order_ondate'],$id,$up['order_user_id']);
			$emaildata['type'] = 2;
			// debug($emaildata);
			$rep['order_is_tc'] = 1;
			$this->model_shop_order->update_by_pk($id,$rep);

			if ($data['order_status'] != 0 || $data['order_status'] !=3) {
				
					$this->model_email->order_status_notification($emaildata);
			}

			$array['status'] = true;
			$array['msg'] = 'Send';		
			
		}
		else{
			$array['status'] = false;
			$array['msg'] = 'record couldn\'t Send';			
		}

		echo json_encode($array);
	}

	public function ajax_save_orderStatus()  //ORDER STATUS
	 {
	 	 // debug($_POST,1);
	 	 if(array_filled($_POST))
	 	 {
	 	 	 $data['order_status'] = $_POST['order_activity_status'];
	 	 	 $up = $this->model_shop_order->update_by_pk($_POST['order_id'],$data);
	 	 	 
	 	 	 $array['status'] = true;
	 	 	 $array_filled['msg'] = 'Saved';	 	 
	 	 	 
	 	 }
	 	 else{
	 	 	 $array['status'] = false;
	 	 	 $array['msg'] = 'record couldn\'t Saved';	 	 	 
	 	 }
	}

	public function ajax_save_orderNote()  //ORDER NOTE
	{
		// debug($_POST,1);
		if(array_filled($_POST))
		{
			
			$data['order_admin_note'] = $_POST['order_admin_note'];
			$up = $this->model_shop_order->update_by_pk($_POST['order_id'],$data);
			
			$array['status'] = true;
			$array_filled['msg'] = 'Saved';		
			
		}
		else{
			$array['status'] = false;
			$array['msg'] = 'record couldn\'t Saved';			
		}

		echo json_encode($array);
	}



 public function pdf_convert($id=''){

 	$this->model_shop_order->pdf_convert($id,1);
 	
    }


   // Order item edit

public function  painting_size_attr()
{
	$painting_size_id = $_POST['painting_size_id'];
	$subject_id = $_POST['subject_id'];
	$json_param = array();
	$sizedata =  $this->model_painting_size->find_by_pk_active($subject_id);		

	if ($painting_size_id > 0) {

			$select_pets = "";
					$pets = array();
					$pets = $this->model_pets->get_pet_sizes($painting_size_id);

					if (isset($pets) && array_filled($pets)) {
							foreach ($pets as $key => $value) {
								// psp_id bridge table id
								$shW = ($key==0) ? 'selected' : '';
									if ($value['psp_price'] > 0) {
									
									$select_pets.= "<option value='".$value['psp_id']."' data-price=".$value['psp_price']." ".$shW.">".$value['pets_name']."(+ ".price($value['psp_price']).") </option>"; 
								}else{
									$select_pets.= "<option value='".$value['psp_id']."' data-price=".$value['psp_price'].">".$value['pets_name']." </option>"; 
								}
							 }
						}

			$c = "";
			$people = array();
			$people = $this->model_people->get_people_sizes($painting_size_id);
			if (isset($people) && array_filled($people)) {
				foreach ($people as $key => $value) {
					$shW = ($key==0) ? 'selected' : '';
				if ($value['spp_price'] > 0) {  //bridge table id
					$select_people.= "<option value='".$value['spp_id']."' data-price=".$value['spp_price']." ".$shW.">".$value['people_name']."</option>"; 
				}else{
					$select_people.= "<option value='".$value['spp_id']."' data-price=".$value['spp_price'].">".$value['people_name']."(+ ".price($value['spp_price'])." ) </option>"; 
				}	
			}
				}



				// debug($_POST);
				// debug($painting_size_id);
				// debug($select_people);
				// debug($select_pets);
			$select_frames = "";
			$frames = array();
			// $frames = $this->model_frames->get_frames_sizes($painting_size_id);
			// debug($sizedata['ps_size_id']);
			$frames = $this->model_frames->get_size_frames($sizedata['ps_size_id']);
			
			// debug($frames);

			if (isset($frames) && array_filled($frames)) {
				
				$select_frames = "<option value=''>Select Framing</option>";
					
				foreach ($frames as $key => $value) {

					$select_frames.= "<option value='".$value['sf_id']."' data-price=".$value['sf_price'].">".$value['frames_name']."</option>";  //bridge table id
				$json_param['frame'] = 1;					

					 }
				}else
				{
				
				$select_frames = "For size ".html_entity_decode($sizedata['ps_name'])." we can not supply any kind of framing. The painting is delivered rolled up in a protective art tube.";
				$json_param['frame'] = 0;					
				}


			switch ($subject_id) {
				case 1:
					// $json_param['msg']['painting_size'] = $select;					
					$json_param['msg']['pets'] = "";	
				    $json_param['msg']['people'] = "";	
					$json_param['msg']['frames'] = $select_frames;					
					break;

				case 2:
					// $json_param['msg']['painting_size'] = $select;					
					$json_param['msg']['pets'] = $select_pets;	
				    $json_param['msg']['people'] = $select_people;	
					$json_param['msg']['frames'] = $select_frames;				
					break;

				case 3:
					// $json_param['msg']['painting_size'] = $select;					
					$json_param['msg']['pets'] = "";	
				     $json_param['msg']['people'] = $select_people;	
					$json_param['msg']['frames'] = $select_frames;					
					break;
				
				case 4:
					// $json_param['msg']['painting_size'] = $select;					
					 $json_param['msg']['pets'] = $select_pets;	
				     $json_param['msg']['people'] = "";	
					$json_param['msg']['frames'] = $select_frames;					
					break;

				default:
					
					break;
			}

				$json_param['status'] = true;
				$json_param['msg']['title'] = '';
				
				}else{

				$json_param['status'] = false;
				$json_param['msg']['title'] = '';
				$json_param['msg']['desc'] = 'Error Occured';

					}

			echo json_encode($json_param);

}

public function  ajax_update_items()
{   
	debug($_POST,1);	
	$data = $_POST['items'];
	$item_id = $_POST['item_id'];
	$this->model_shop_item->update_by_pk($item_id,$data);
	
	$order_id = $_POST['order_id'];
	//payment table	
			
			$json_param['status'] = true;
			$json_param['msg']['title'] = '';
			$json_param['msg']['desc'] = 'Updated Successfully.';
			echo json_encode($json_param);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
