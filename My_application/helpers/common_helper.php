<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Muhammad devemail0909@gmail.com Khan * Muhammad.devemail0909@gmail.com@tradekey.com
 * @copyright	Copyright (c) 2014 TKDigitals.com.
 * @since		Version 1.0
 */

// ------------------------------------------------------------------------
/**

 */

if ( ! function_exists('pre'))
{
	function pre() {
		$args = func_get_args();

		echo "<pre>";
		foreach($args AS $ar)
			print_r($ar);
		die ;
	}
}

if ( ! function_exists('end_script'))
{
	function end_script($message) {
		echo $message;
		exit() ;
	}
}

if ( ! function_exists('end_script_json'))
{
	function end_script_json($arr) {
		$arr = is_array( $arr ) ? json_encode( $arr ) : $arr ;
		end_script( $arr ) ;
	}
}

if ( ! function_exists('debug'))
{
	function debug($param,$exit = 0)
	{
		echo "<pre>";print_r($param);echo "</pre>";
		if($exit)
			exit;
	}
}

if ( ! function_exists('prevar'))
{
	function prevar($params) {
		var_dump($params);die;
	}
}

// Check if Array is filled or empty 
if ( ! function_exists('array_filled'))
{
	function array_filled($array=array()) {
		return (is_array($array) && count($array));
	}
}

// Return array with same keys as values.
if ( ! function_exists('array_value_as_key'))
{
	function array_value_as_key($array=array()) {

		$return = array() ;
		foreach ($array as $value) {
			$return[ $value ] = $value ;
		}
		return $return;
	}
}

// Check if Array is filled or empty 
if ( ! function_exists('nl_to_list'))
{
	function nl_to_list($str="" , $start_li = "<li>", $end_li="</li>") {

		return '<ul>'.$start_li.preg_replace("/([\n]+)/", $end_li.$start_li , $str).$end_li.'</ul>';
	}
}

// Check if Array is filled or empty 
if ( ! function_exists('nl_to_br'))
{
	function nl_to_br($str="") {

		return preg_replace("/([\n]+)/", "</br>", $str);
	}
}

// Check if Array is filled or empty 
if ( ! function_exists('prepare_value'))
{
	function prepare_value($str="" , $funcs) {
		$func_array = explode("|", $funcs) ;
		foreach ($func_array as $fn) {
			if(function_exists($fn))
				$str = $fn($str);
		}
		return $str;
	}
}

// Hidden debug - For LIVE use. 
// Protects you site cosmetics while doing all the dirty work in commented HTMLs
if ( ! function_exists('live_debug'))
{
	function live_debug($params) {
		echo "<!--LIVE DEBUGGER>"; var_dump($params) ; echo"-->";
	}
}

// Checks if the view you are dreaming for really exists in reality
if ( ! function_exists('view_exists'))
{
	function view_exists($view,$class="") {

		$view_path = APPPATH."views/".$view;
		if(@file_exists($view_path.".php"))
		{
			return $view;
		}
		else
		{
			return str_replace($class."/", "default/", $view);
		}
	}
}



// This cutting-edge technology has the ability to cut through any string. 
// Just try it out if it's too good to be believed.
if ( ! function_exists('truncate'))
{
	function truncate( $text = "" , $limit = 150 ) {
		
		return ( strlen($text) > $limit ) ? ( substr($text, 0, $limit) . "..." ) : $text ;

	}
}

// Occasional JavaScript redirect.
if ( ! function_exists('redirect_script'))
{
	function redirect_script( $path ) {
		
		global $config;
		ob_clean();
		ob_start();
		echo '<script>window.location="'.$config['base_url'].$path.'";</script>';
		exit();

	}
}

// Occasional not_found redirect.
if ( ! function_exists('not_found'))
{
	function not_found( $msg ) {
		
		redirect("404?error=".urlencode($msg));
		exit();

	}
}

// If Array has an element --- IN_ARRAY.
if ( ! function_exists('inside_array'))
{
	function inside_array( $needle, $hey_stack ) 
	{
		return is_array($hey_stack) && in_array($needle, $hey_stack) ;
	}
}

// Innovate Payment - Signature verification
if ( ! function_exists('SignData'))
{
	function SignData($post_data,$secretKey,$fieldList) 
	{
		$signatureParams = explode(',', $fieldList);
		$signatureString = $secretKey;
		foreach ($signatureParams as $param) {
			if (array_key_exists($param, $post_data)) {
				$signatureString .= ':' . trim($post_data[$param]);
			} else {
				$signatureString .= ':';
			}
		}
		return sha1($signatureString);
	}
}

if ( ! function_exists('csl_date'))
{
	function csl_date($date,$format="d M, Y h:i:sA") 
	{
		return date($format,strtotime($date));
	}
}
// This returns Discount value. The prices must be in BASE Currency . ie. $
if ( ! function_exists('discount_text'))
{
	function discount_text( $discount_rate , $discount_type = "value" , $currency = "$" , $currency_rate = "1.00" , $prep_currency = true ) 
	{
		if($discount_type == "percent")
			return $prep_currency ? $discount_rate . "%" : $discount_rate ;
		else
		{
			return price($discount_rate , $currency , $currency_rate , $prep_currency) ;
		}
		 
			
	}
}

// This returns Discount value. The prices must be in BASE Currency . ie. $
if ( ! function_exists('discount_value'))
{
	function discount_value( $discount_rate , $discount_type = "value" , $price = 0 ) 
	{
		$discount_rate = floatval($discount_rate) ;
		$price = floatval($price) ;
		
		if($discount_type == 'percent') 
		{
			$discount_rate = ( $price * $discount_rate ) / 100 ;
		}
			
		return $discount_rate ;
	}
}

// This returns price w.r.t to currencies provided in the parameter
if ( ! function_exists('price'))
{
	function price( $price,$currency="$" , $currency_rate = "1.00" , $prep_currency = true ) 
	{
		if(!$currency_rate)
			$currency_rate = 1.00 ;
		
		$price = number_format($price / $currency_rate , 0 ) ;
		return $prep_currency ? ( $currency . "" . $price ) : $price ;
	}
}

// This returns price from currency provided to Base Currency : PKR
if ( ! function_exists('price_reverse'))
{
	function price_reverse( $price,$currency="$" , $currency_rate = "1.00" , $prep_currency = true ) 
	{
		$price = number_format($price * $currency_rate , 2 ) ;
		return $prep_currency ? ( $currency . " " . $price ) : $price ;
	}
}

// This one is to return Price formatted w.r.t default Currency setup in session
if ( ! function_exists('price_default'))
{
	function price_default( $price, $prep_currency = false ) 
	{
		global $config;
		return price( $price ,  $config[ 'currency' ] ,  $config[ 'currency_rate' ] , $prep_currency ) ;
	}
}

if ( ! function_exists('get_xp_level'))
{
	function get_xp_level($xp_gained = 0) 
	{
		return intval($xp_gained % MAX_XP );
	}
}

if ( ! function_exists('get_user_level'))
{
	function get_user_level($xp_gained = 0) 
	{
		$level = sprintf("%02d",floor($xp_gained / MAX_XP) + 1 );
		return $level>MAX_LEVEL ? MAX_LEVEL : $level ; 
	}
}

if ( ! function_exists('can_register'))
{
	function can_register($user_data = array(),$registration_cost=0) 
	{
		return ( $user_data['credits_total']-$user_data['credits_consumed'] >= intval($registration_cost) ) ; 
	}
}

if ( ! function_exists('label_encode'))
{
	function label_encode($text = '') 
	{
		return ucfirst(preg_replace("/([-_]+)/", " ", $text)) ; 
	}
}

if ( ! function_exists('recursive_array') )
{
	function recursive_array( $data , $children, $second=false) 
	{
		
		foreach ($data as $key => $row) {

			$data[$row['category_id']] = $row ;
			$data[$key]['children'] = array() ;

			if( isset($children[$row['category_id']]) && is_array($children[$row['category_id']]))
				$data[$row['category_id']]['children'] = recursive_array($children[$row['category_id']] , $children , true )  ;
			else
				return $data;
			return $data;
		}
	}
}

if ( ! function_exists('is') )
{
	function is( $variable ) 
	{
		
		return isset($variable) && $variable ;
	}
}

if ( ! function_exists('has_value') )
{
	function has_value( $needle, $haystack ) 
	{
		if(is_array($haystack))
			return in_array($needle, $haystack);
		else
			return $needle == $haystack;
	}
}

if ( ! function_exists('to_bit') )
{
	function to_bit( $is_addon ) 
	{
		return $is_addon ? 1 : 0 ;
	}
}

if( ! function_exists('order_mask') )
{
	function order_mask($id=0)
	{
		return sprintf(ORDER_NO_MASK , $id) ;
	}
}

if( ! function_exists('g') )
{
	function g($var="")
	{
		global $config; 
		if($var)
			$var = explode(".", $var);
		$return = $config;
		//debug($return);die();
		while( is_array($var) && count($var) )
		{
			$return = $return[ array_shift($var) ];
		}

		return $return ;
	}
}

/** 
* Image url
**/
if( ! function_exists('get_image') )
{
	function get_image($image_name,$image_path)
	{
		global $config; 

		if(empty($image_name))
			return $config['base_url'].'assets/global/images/imgnotfound.jpg';
		else
			return $config['base_url'].$image_path.$image_name;
	}
}

if( ! function_exists('get_image_thumb') )
{
	function get_image_thumb($image_name,$image_path)
	{
		global $config; 
		return $config['base_url'].$image_path.'thumb/'.$image_name;
	}
}

if( ! function_exists('get_global_image') )
{
	function get_global_image($image_name)
	{
		global $config; 
		return $config['base_url'].'assets/global/images/'.$image_name;
	}
}


/*
* Array Intersect working in Cross.  
* @params : flip_second -- 
* 					Flip second array and then intersect. 
*					Or flip first and then intersect
*/
if ( ! function_exists('array_intersect_cross') )
{
	function array_intersect_cross( $array1, $array2 , $flip_second = true ) 
	{
		if(!$array1 || !$array2)
			return false;
		
		if($flip_second)
			$array2 = array_flip($array2);
		else
			$array1 = array_flip($array1);

		$array1 = array_intersect($array1, $array2);
		
		return $flip_second ? $array1 : array_flip($array1) ;
	}
}

if ( ! function_exists('main_category_url') )
{
	function main_category_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('main-category/' . $slug);
		return $url;
	}
}


if ( ! function_exists('department_url') )
{
	function department_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('department/' . $slug);
		return $url;
	}
}

if ( ! function_exists('forum_url') )
{
	function forum_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('forum-topic/' . $slug);
		return $url;
	}
}


if ( ! function_exists('category_url') )
{
	function category_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('category/' . $slug);
		return $url;
	}
}


if ( ! function_exists('course_url') )
{
	function course_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('course/' . $slug);
		return $url;
	}
}


if ( ! function_exists('course_detail_url') )
{
	function course_detail_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('course/detail/' . $slug);
		return $url;
	}
}


if ( ! function_exists('test_url') )
{
	function test_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('course/test/' . $slug);
		return $url;
	}
}

if ( ! function_exists('download_url') )
{
	function download_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('course/download/' . $slug);
		return $url;
	}
}


if ( ! function_exists('product_url') )
{
	function product_url( $slug ) 
	{
		$url = l('products/' . $slug);
		return $url;
	}
}


if ( ! function_exists('product_detail_url') )
{
	function product_detail_url( $slug ) 
	{
		$url = l('product/detail/' . $slug);
		return $url;
	}
}


if ( ! function_exists('service_detail_url') )
{
	function service_detail_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('service/detail/' . $slug);
		return $url;
	}
}


if ( ! function_exists('post_url') )
{
	function post_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('post/' . $slug);
		return $url;
	}
}




if ( ! function_exists('bike_detail_url') )
{
	function bike_detail_url( $slug ) 
	{
		$slug = str_replace(" ", "-", $slug);
		$url = l('bike/detail/' . $slug);
		return $url;
	}
}


// if ( ! function_exists('activities_url') )
// {
// 	function activities_url( $slug ) 
// 	{
// 		$slug = str_replace(" ", "-", $slug);
// 		$url = l('activities/' . $slug);
// 		return $url;
// 	}
// }

// if ( ! function_exists('activitie_url') )
// {
// 	function activitie_url( $slug ) 
// 	{
// 		$slug = str_replace(" ", "-", $slug);
// 		$url = l('activity/' . $slug);
// 		return $url;
// 	}
// }


if ( ! function_exists('view_normal') )
{
	function view_normal($param , $vars = array(), $return = FALSE)
	{
		$ci =& get_instance();
		$ci->load->view($param , $vars , $return);
	}
}


	if ( ! function_exists('sku') )
	{
		function sku($param){
			$ci =& get_instance();
			$siu = "PS" . intval($param);
			return $siu;
		}
	}

	if ( ! function_exists('order_no') )
	{
		function order_no($param)
		{
			$order_no = "INV-000$param";
			return $order_no;
		}
	}

	if ( ! function_exists('order_no_encrypt') )
	{
		function order_no_encrypt($id)
		{
			// $order_no = "INV-000$param";
			// return $order_no;
			return md5('F!5#iN@#l_^$'.$id);
		}
	}

	if ( ! function_exists('encrypt_param') )
	{
		function encrypt_param($id)
		{
			// return md5('F!5#iN@#l_^$'.$id);
			$pkid = "Ds0W9o010".$id."01eTz25Sfs";
			return $pkid;
		}
	}

	if ( ! function_exists('decrypt_param') )
	{
		function decrypt_param($pid)
		{
			
		$id = str_replace("%Ds0W9o010"," ", $pid);
        $id = str_replace("01eTz25%Sfs"," ", $id);
			return $id;
		}
	}


	if ( ! function_exists('total_invoice_amount') )
	{
		function total_invoice_amount($order_amount = 0, $shipping_amount = 0 , $discount_amount = 0)
		{
			$amount = $order_amount + $shipping_amount - $discount_amount;
			return $amount;
		}
	}



	if ( ! function_exists('weight') )
	{
		function weight($param)
		{
			$ci =& get_instance();

			$weight = number_format($param,2) . " kg";

			return $weight;
		}
	}


	if ( ! function_exists('cart_code') )
	{
		function cart_code($param)
		{
			//$ci =& get_instance();

			return md5('cart_@$!S' . $param);
		}
	}

	if ( ! function_exists('calc_tax') )
	{
		function calc_tax($price , $percentage)
		{
			return $price*$percentage/100;	
		}
	}


	if ( ! function_exists('delivery_method') )
	{
		function delivery_method($status)
		{
			switch ($status) {
				case 1:
					$var = 'Free Delivery';
					break;
				case 2:
					$var = 'Pick up';
					break;
				case 3:
					$var = 'Delivery';
					break;
				default:
					$var = 'Delivery';
			}

			return $var;
		}
	}

	if ( ! function_exists('order_status') )
	{
		function order_status($status)
		{
			switch ($status) {
				case 1:
					$var = 'New Order';
					break;
				case 2:
					$var = 'Shipped Order';
					break;
				case 3:
					$var = 'On Hold';
					break;
				case 4:
					$var = 'Denied';
					break;
				case 5:
					$var = 'Reject';
					break;
				default:
					$var = 'In process';
			}

			return $var;
		}
	}

	if ( ! function_exists('secureLink') )
	{
		function secureLink($url , $secure = false){
			$link = '';
			$link .= ($secure == true) ? 'https://' : 'http://';
			$link .= preg_replace('#^https?://#', '', $url);
			return $link;
		}
	}


	if ( ! function_exists('stock') )
	{
		function stock($status){
			
			switch ($status) {
				case 1:
					return '<strong style="color:green">AVAILABLE</strong>';
					break;
				
				default:
					return '<strong style="color:red">OUT OF STOCK</strong>';
					break;
			}
		}
	}


	if ( ! function_exists('cool') )
	{
		function cool($title , $tag = 'span'){
			
			$heading = explode(' ', $title);
			$heading_center = floor(count($heading)/2);

			$var = '';
			$here = false;
			foreach($heading as $k => $hd) {
				if($k == $heading_center) {
					$here = true;
					$var .= '<'.$tag.'>';
				}

				$var .= $hd . " ";
			}

			if($here)
				$var .= '</'.$tag.'>';

			return $var;

			// old one
			//return str_replace(" ", "-", strtolower($title));
		}
	}



	if ( ! function_exists('registeration_no') )
	{
		function registeration_no($id){
			
			return "REG-CEU-".date('Y').'-'.date('m').'-'. str_pad($id, 4, '0', STR_PAD_LEFT);
		}
	}



	if ( ! function_exists('short_text') )
	{
		function short_text( $text , $limit=1000 ) 
		{
			$var = '';

			$content = strip_tags(html_entity_decode($text));
			
			$var = substr($content, 0 , $limit);
			if(strlen($content) > $limit)
				$var .= '....';

			//debug($var , 1);
			return ucfirst($var);
		}
	}


	if ( ! function_exists('mydate') )
	{
		function mydate($date , $format = 'USA')
		{
			switch ($format) {
				case 'USA':
					return date("m/d/Y" , strtotime($date));
					break;
				
				default:
					return date("M/D/Y" , strtotime($date));
					break;
			}
		}
	}

	if ( ! function_exists('theme_date') )
	{
		function theme_date($date)
		{
			return date("M d, Y" , strtotime($date));
		}
	}


	if ( ! function_exists('humanTiming') )
	{
		function humanTiming ($time)
		{

		    $time = strtotime($time);
		    $time = time() - $time; // to get the time since that moment
		    $time = ($time<1)? 1 : $time;
		    $tokens = array (
		        31536000 => 'year',
		        2592000 => 'month',
		        604800 => 'week',
		        86400 => 'day',
		        3600 => 'hour',
		        60 => 'minute',
		        1 => 'second'
		    );

		    foreach ($tokens as $unit => $text) {
		        if ($time < $unit) continue;
		        $numberOfUnits = floor($time / $unit);
		        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		    }

		}
	}

	/*
		time_elapsed_string FOR 
		4 months ago
		4 months, 2 weeks, 3 days, 1 hour, 49 minutes, 15 seconds ago
	*/
	function time_elapsed_string($datetime, $full = false)
	{
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);
	    
	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}



	function time_difference($start_date,$end_date)
	{
	    $now = new DateTime($end_date);
	    $ago = new DateTime($start_date);
	    $diff = $now->diff($ago);
	    
	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }
	    $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string):'just now';
	}


	if ( ! function_exists('social_widgets') )
	{
		function social_widgets($link)
		{
			// $var = '<a target=\'_blank\' href="https://twitter.com/home?status='.urlencode($link).'"><img src="'.i('').'tw.png" alt="" width="" class="tts"></a>
   //            <a target=\'_blank\' href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($link).'"><img src="'.i('').'fb.png" alt="" width="" class="tts"></a>
   //            <a target=\'_blank\' href="https://plus.google.com/share?url='.urlencode($link).'"><img src="'.i('').'gp.png" alt="" width="" class="tts"></a>
   //            <a target=\'_blank\' href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//plus.google.com/share?url='.urlencode($link).'&title=&summary=&source="><img src="'.i('').'link.png" alt="" width=""></a>
   //            <a target=\'_blank\' href="mailto:'.g('email_conatct_us_to').'?&subject=share+post&body=Share%20this%20link%20'.urlencode($link).'"><img src="'.i('').'mess.png" alt="" width=""></a>';

				$var = '<li><a class="twitter" target=\'_blank\' href="https://twitter.com/home?status='.urlencode($link).'">
						<i class="fa fa-twitter" aria-hidden="true"></i></a><li>
              <li><a class="facebook" target=\'_blank\' href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($link).'">
              <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
             
              <li><a class="pinterest" target=\'_blank\' href="http://pinterest.com/pin/create/link/?url='.urlencode($link).'">
              <i class="fa fa-pinterest" aria-hidden="true"></i></a></li>

              <li><a class="emailto" target=\'_blank\' href="mailto:'.g('email_conatct_us_to').'?&subject=share+post&body=Share%20this%20link%20'.urlencode($link).'"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
	
			return $var;
		}
	}

	// Generate text fancy box popup
	if ( ! function_exists('fancybox_description') )
	{
		function fancybox_description($text , $limit = 100 , $id = '')
		{
			$id = (empty($id)) ? md5(time()) : $id;
			$var = short_text($text , $limit);
			if(strlen($text) > $limit) {
				$var .= "<a class=\"fancybox-inline\" href=\"#{$id}\">Read More</a>";
				$var .= "<div style=\"display:none\">";
				$var .= "<div id=\"{$id}\">".html_entity_decode($text)."</div>";
				$var .= "</div>";
			}
			
			return $var;              
		}
	}



	if ( ! function_exists('km_to_miles') )
	{
		function km_to_miles($km)
		{
			return number_format($km*0.621 , 2 );
		}
	}


	// Encrypt User Password Start
if(!function_exists('string_encrypt'))
{
    function string_encrypt($input)
    {
        $cryptKey     = 'e01c9261bf1626d678acdc44f1e06826';
        $pass_encoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5($cryptKey), $input, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return($pass_encoded);
    }
}
// Encrypt User Password End

// Decrypt User Password Start
if(!function_exists('string_decrypt'))
{
    function string_decrypt($input)
    {
        $cryptKey    = 'e01c9261bf1626d678acdc44f1e06826';
        $pass_decode = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode($input), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return $pass_decode;
    }
}
// Decrypt User Password End


// if(!function_exists('string_decrypt'))
// {
// 	function my_simple_crypt( $string, $action = 'e' ) {
// 	    // you may change these values to your own
// 	    $secret_key = 'my_simple_secret_key';
// 	    $secret_iv = 'my_simple_secret_iv';
	 
// 	    $output = false;
// 	    $encrypt_method = "AES-256-CBC";
// 	    $key = hash( 'sha256', $secret_key );
// 	    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
// 	    if( $action == 'e' ) {
// 	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
// 	    }
// 	    else if( $action == 'd' ){
// 	        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
// 	    }
	 
// 	    return $output;
// 	}
// }


if(!function_exists('social_video_embed'))
{
    function social_video_embed($url)
    {
    	$is_yt = (strpos($url , 'youtube') ? true : false);
    	$is_dm = (strpos($url , 'dailymotion') ? true : false);
    	$is_fb = (strpos($url , 'facebook') ? true : false);
    	$is_v = (strpos($url , 'vimeo') ? true : false);

        if($is_yt) {
    		$video_link = str_replace("watch?v=", "embed/", $url);
    	}
    	elseif($is_dm) {
    		$video_link = "//".$url;
    	}
    	elseif ($is_fb) {
    		$fbv = explode("/", $url);
    		$video_link = "http://www.facebook.com/video/embed?video_id=".$fbv[5];
    	}
    	elseif ($is_v) {
    		$vv = explode("/", $url);
    		$video_link = "https://player.vimeo.com/video/".$vv[3];
    	}
    	else
    		$video_link = $url;

    	return $video_link;
    }
}

// if(!function_exists('numhash'))
// {
//     function numhash($n)
//     {
// 		$original = $n;
// 		$secure = base64_encode($original).rand(100,999);
// 		return $unsecure = $secure;//substr($secure,3);
//     }
// }


/* End of file path_helper.php */
/* Location: ./system/helpers/path_helper.php 
 */  