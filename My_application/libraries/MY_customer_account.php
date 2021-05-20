<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_cart Class
 * @author devemail0909@gmail.com devemail0909@gmail.com (devemail0909@gmail.com)
 * @package CI Cart extension . Add some own customizatoin - addons etc
 * Extends CI_cart with the following functionalities:
 *
 */

class MY_customer_account{

	//var $anchor_class		= 'button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small';

	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}

		log_message('debug', "Pagination Class Initialized");
	}


	public function get_sign_in_field()
	{
		
	}

}