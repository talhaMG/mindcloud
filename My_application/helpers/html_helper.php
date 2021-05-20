<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter HTML Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/html_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Heading
 *
 * Generates an HTML heading tag.  First param is the data.
 * Second param is the size of the heading tag.
 *
 * @access	public
 * @param	string
 * @param	integer
 * @return	string
 */








if( ! function_exists("product_list_html") )
{
	function product_list_html($products=array() , $view = "product/front_list" )
	{
		global $config;
		$CI = &get_instance();

		if(is_array($products) && count($products))
		{
			foreach ($products as $prd) {

				if($prd['pi_image_thumb'])
					$data['img_url'] = Links::img($prd['pi_image_path'],$prd['pi_image_thumb']) ;
				else
					$data['img_url'] = $config['site_global_images_root'] . 'no-image-thumb.png' ;

				$data['prd_link'] = Links::product_detail($prd['product_slug'] ); 
				$data['prd'] = $prd ;

            	$returhtml .= $CI->load->view( $view , $data , true);
			}
		}
		else
			return '<li>No Products Currently Available.</li>' ;

		return $returhtml;
	}
}

// Common helpler is not so common anymore.
if( ! function_exists("create_modal_html") )
{
	function create_modal_html($modals="" , $title="", $body="" , $form_attr = "", $show_btns = true)
	{
		global $config;
		$CI = & get_instance();
		ob_start();
		?>
			<div class="modal <?=$modals?>_modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<form class="<?=$modals?>_form" <?=$form_attr?> >
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title"><?=$title?></h4>
							</div>
							<div class="modal-body">
								<?=$body?>
							</div>
							<?if($show_btns){?>
							<div class="modal-footer">
								<? /* <button type="button" class="btn blue submit">Save</button> */?>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
							<?}?>
						</div>
						<!-- /.modal-content -->
					</form>
				</div>
				<!-- /.modal-dialog -->
			</div>
		<?
		$html = ob_get_clean();
		$CI->layout_data['modals'][] = $html;
	}
}

// Generates Options tags
if ( ! function_exists('generate_options_html') )
{
	function generate_options_html( $list_data , $value = null ,$first_empty = true ) 
	{
		$html = $first_empty ? "<option value=\"\">SELECT</option>" : "" ;

		if(is_array($list_data))
		foreach ($list_data as $key => $val) {
			if(is_array($value))
				$selected = inside_array($key, $value) ? "selected" : "" ;
			else
				$selected = (isset($value) && $key ==  $value) ? "selected" : "" ;
			$html .= "<option value=\"$key\" $selected >$val</option>";
		}
		return $html;
	}
}


// Generates Group Checkboxes
if ( ! function_exists('generate_checkbox_group') )
{
	function generate_checkbox_group( $params ) 
	{
		/*
		* @params: Needs to be an array.
					-name (req) ; Name.
					-list_data (req) ; key value pair of options.
					-value : Checked Value:  Can have an array or a single value
					-select_all (bool) ; A checkbox that will check all options.
		*/
		extract( $params );
		$html  = '<div class="checkbox_group">';
		if($select_all)
			$html .= '<div class="enclosure chkbxgrp">
						<input type="checkbox" id="'.$name.'-select_all" class="cbgroup_select_all">
						<label for="'.$name.'-select_all">All</label> 
				  	  </div>' ;

		if(is_array($list_data))
		foreach ($list_data as $key => $val) {
			if(is_array($value))
				$checked = inside_array($key, $value) ? "checked" : "" ;
			else
				$checked = (isset($value) && $key ==  $value) ? "checked" : "" ;
			$html .= "<div class=\"enclosure chkbxgrp\">
						<input type=\"checkbox\" 
						value=\"$key\" id=\"$name-$key\" 
						$checked name=\"$name\" 
						class=\"cbgroup_box\"
						/>
						<label for=\"$name-$key\">$val</label>
					  </div>";
		}
		$html .= '</div>';
		return $html;
	}
}


// Generates Group Checkboxes
if ( ! function_exists('generate_radio_group') )
{
	function generate_radio_group( $params ) 
	{
		/*
		* @params: Needs to be an array.
					-name (req) ; Name.
					-list_data (req) ; key value pair of options.
					-value : Checked Value:  Can have an array or a single value
					-select_all (bool) ; A radio that will check all options.
					-additional; Additional attributes , like required, data-id="aaa"
		*/
		extract( $params );
		$html  = '<div class="radio_group">';
		
		if(is_array($list_data))
		foreach ($list_data as $key => $val) {
			if(is_array($value))
				$checked = inside_array($key, $value) ? "checked" : "" ;
			else
				$checked = (isset($value) && $key ==  $value) ? "checked" : "" ;
			$html .= "<div class=\"enclosure radio\">
						<input type=\"radio\" 
						value=\"$key\" id=\"$name-$key\" 
						$checked name=\"$name\" 
						class=\"cbgroup_box\"
						$additional
						/>
						<label for=\"$name-$key\">$val</label>
					  </div>";
		}
		$html .= '</div>';
		return $html;
	}
}







/* End of file html_helper.php */
/* Location: ./system/helpers/html_helper.php */