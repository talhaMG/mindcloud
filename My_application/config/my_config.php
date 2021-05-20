<?php
//Get already set config variables from other files.
$config = $this->config;

$config['title'] = ".:: MindCloud ::.";
$config['site_name'] = $config['title'];
$config['site_title'] = $config['site_name'];


//Set your own Configurations...
$config['site_assets_root'] = $config['base_url'] . "assets/";
$config['site_global_root'] = $config['site_assets_root'] . "global/";
$config['plugins_root'] = $config['site_global_root'] . "plugins/";
$config['site_global_images_root'] = $config['site_global_root'] . "images/";
$config['site_css_root'] = $config['site_assets_root'] . "css/";
$config['site_widgets_root'] = $config['site_assets_root'] . "widgets/";
$config['site_front_assets'] = $config['site_assets_root'] . "front_assets/";
$config['site_js_root'] = $config['site_assets_root'] . "js/";
$config['site_images_root'] = $config['site_assets_root'] . "images/";
$config['site_categories_images_root'] = $config['site_images_root'] . "categories/";
$config['site_brochures_root'] = $config['site_assets_root'] . "images/brochures/";


$config['ci_paginate'] = array();
$config['ci_paginate']['uri'] = "paginate";
$config['ci_paginate']['update_status_uri'] = "update_status";

// Store the Configuration from ABove for use in JS_CONFIG
$config['js_config'] = $config;

//Upload Roots
$config['site_upload_img_root'] = "assets/images/";

//Excel files uploads Root

//Maker Logos uploads  
$config['site_upload_default'] = "assets/uploads/";
$config['site_upload_brand'] = $config['site_upload_default']."brand/";
$config['site_upload_logo'] = $config['site_upload_default']."logo/";
$config['site_upload_category'] = $config['site_upload_default']."category/";
$config['site_upload_product'] = $config['site_upload_default']."product/";
$config['site_upload_season'] = $config['site_upload_default']."season/";
$config['site_upload_catalog'] = $config['site_upload_default']."catalog/";
$config['site_upload_client'] = $config['site_upload_default']."client/";
// Carousel banner folder path
$config['site_upload_banner'] = $config['site_upload_default']."banner/";
$config['site_upload_gallery'] = $config['site_upload_default']."gallery/";
$config['site_upload_cms_image'] = $config['site_upload_default']."cms/";
$config['site_upload_services'] = $config['site_upload_default']."services/";
$config['site_upload_user_photo'] = $config['site_upload_default']."user_info/";

//PHPExcel External Class
$config['PHPExcel_Path'] = $config['base_url']."assets/admin/PHPExcel/";

//Site LINKS
$config['site_portfolio'] = $config['base_url'] . "portfolio";

//Email Addresses.

//URL MASKS Configs
$config['_urls'] = array(
		'category_detail' => $config['base_url']."category/%s" ,
		'product_list' => $config['base_url']."product/list/%s" ,
		'product_detail' => $config['base_url']."product/%s" ,
);

$config[ 'carriers' ] = array( 1=> "Free Shipping" , 2 => "Pick From Store" , 3 => "Cash on Delivery"  ) ;

$config['currency'] = "$" ;
$config['currency_rate'] = "1.00" ;

// Default System Order Statuses
$config['order_status'] = array(
							'placed' => 1 ,
							'admin_placed' => 7 ,
							'transfer_detail_added' => 4 ,
							'twoco_authorized' => 5 ,
						  );


// TIMEZONE FOR DB - LEAVE EMPTY STRING IF NOT REQUIRED
if(ENVIRONMENT == 'production')
	define("MYSQL_TIME_ZONE" , "-4:00");
else
	define("MYSQL_TIME_ZONE" , "+5:00");

// TIMEZONE FOR PHP - LEAVE EMPTY STRING IF NOT REQUIRED
if(ENVIRONMENT == 'production')
	define("PHP_TIME_ZONE" , "America/New_York");
else
	define("PHP_TIME_ZONE" , "Asia/Karachi");


// S3 bucket details

define('AWS_S3_KEY', 'AKIAXQ4HYQNY7UR7HLO5');
define('AWS_S3_SECRET', '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');
define('AWS_S3_REGION', 'us-east-1');
define('AWS_S3_BUCKET', 'mindcloud-bucket');
define('AWS_S3_URL', 'http://s3.'.AWS_S3_REGION.'.amazonaws.com/'.AWS_S3_BUCKET.'/');


// define("FACTORY_TYPE" , 1);
// define("SUPPLIER_TYPE" , 2);
// define("FACTORY_USER_TYPE" , 3);

// GOOGLE MAP API
define("GOOGLE_MAP_API" , 'AIzaSyDWrjiqkT5yhtGtCnwf_5c6uzB6QzVDE28');  //CLIENTS KEYS

// define("GOOGLE_MAP_API" , 'AIzaSyAFDDM1xt3f7Ii-WLa4uiKANd-61pJlqWg');
// AIzaSyDa9MZajPrJAd34niHcVZpTtgRRHAz4M78

//GOOGLE Captcha credential
define("GOOGLE_CAPTCHA_SITE_KEY" , "6LdzYEwUAAAAAMwsWwFlo1NT5ctrggVL729aEYi0");
define("GOOGLE_CAPTCHA_SECRET_KEY" , "6LdzYEwUAAAAABMaIqrenrEa2xLq_ttoyKvLj3pR");

// YOUTUBE URLs MASK
define("YOUTUBE_IMG_MASK" , "http://img.youtube.com/vi/%s/mqdefault.jpg");
define("YOUTUBE_EMBED_MASK" , "http://www.youtube.com/embed/%s");
// CONSTANTS 

//Will be set from DB now.
//define("MAX_LEVEL" , 30);
//define("MAX_XP" , 100);

define("ACCESS_PUBLIC" , 1);
define("ACCESS_PRIVATE" , 2);

define("PERSISTANCE_PERMANENT" , 1);
define("PERSISTANCE_TEMPORARY" , 2);

define("TYPE_TOURNAMENT" , 1);
define("TYPE_PLAYOFFS" , 2);

define("INVITE_SENT" , 1);
define("INVITE_ACCEPTED" , 2);
define("INVITE_DENIED" , 0);

define("STATUS_ACTIVE" , 1);
define("STATUS_INACTIVE" , 0);
// Team forfeit.
define("YES" , 1);
define("NO" , 0);
// Team forfeit.
define("STATUS_DELETE" , 2);


//CART START
define("PAYMENT_MODE_IS_TEST" , true);
define("SHIPPING_CHARGES" , 0);
// define("BULK_DISCOUNT_PER" , 10);
// define("BULK_DISCOUNT_COUNT" , 3);

if(ENVIRONMENT == 'development') {
	// define("PAYPAL_CLIENT_ID" , 'AdvFue55W2wOjn-4fLKxWAa5jekG4NMdDYpr7Y0pkfEJDhpZz523lzlNbgYtGDSG-ybOPkCgjrj4A5ps');
	// define("PAYPAL_CLIENT_SCERET" , 'EEVha1mNKsJM95Ytkr_VGdbld1aiISu3IdMQSvagAyBG4NtD7P4JQC64E4SriOWODP8PaQD_uGwCFeuU');
	// define("PAYPAL_GATEWAY_URL" , "https://sandbox.paypal.com/cgi-bin/webscr" ) ;
	// define("PAYPAL_BUSINESS_EMAIL" , "devemail0909@gmail.com" ) ;
	// define("PAYPAL_CLIENT_ID" , 'AY4R0It0U4zZKdBea3E-mEbCQjtOj5OaK_ETAQvkpGsrhOPxryUSXb0sZqFF3XnskqIFL8j8LW3Yasbz');
	// define("PAYPAL_CLIENT_SCERET" , 'EK6qPm9H33tr6dVcaFwLIRIDtyadWCb-ZGmP2xkFTITCSg_NE5gFD2mbv3SIFirReKSV0vu6ssrCnpwF');
	// define("PAYPAL_GATEWAY_URL" , "https://sandbox.paypal.com/cgi-bin/webscr" ) ;
	// define("PAYPAL_BUSINESS_EMAIL" , "devemail0909@gmail.com" ) ;

	// Authorize.Net Merchant
	
	define("POST_URL", "https://test.authorize.net/gateway/transact.dll");
	define("API_LOGIN_ID", "324ueKrHK"); // 2Z99mQsSv9x
	define("TRANSACTION_KEY", "94X593qYKrxwtw86");
	define("TEST_MODE", TRUE);


	//For merchant Quickbook Start
	define('INTUIT_URL' , 'https://sandbox.api.intuit.com/quickbooks/v4/payments/charges');
	define('INTUIT_CLIENT_ID' , 'Q021SqSNU3gp0W3YRr3f2tri77QmuEtdxBz45paeEWFC7t14i5');
	define('INTUIT_CLIENT_SECRET' , 'VnTpbyXBdwuiOqtk42lWdDNaBh67FHxYDGN9Nzba');
	define('AUTHORIZATIONREQUESTURL' , 'https://appcenter.intuit.com/connect/oauth2');
	define('TOKENENDPOINTURL' , 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer');
	define('OAUTH_SCOPE' , 'com.intuit.quickbooks.payment');
	define('OPENID_SCOPE' , 'openid profile email phone address');
	define('OAUTH_REDIRECT_URI' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/OAuth2PHPExample.php');
	define('OPENID_REDIRECT_URI' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/OAuthOpenIDExample.php');
	define('MAINPAGE' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/index.php');
	define('REFRESHTOKENPAGE' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/index.php');
	//For merchant Quickbook End
}
else {
	if(PAYMENT_MODE_IS_TEST) {
		// Live website but use Sandbox Keys
		// define("PAYPAL_CLIENT_ID" , 'AY4R0It0U4zZKdBea3E-mEbCQjtOj5OaK_ETAQvkpGsrhOPxryUSXb0sZqFF3XnskqIFL8j8LW3Yasbz');
		// define("PAYPAL_CLIENT_SCERET" , 'EK6qPm9H33tr6dVcaFwLIRIDtyadWCb-ZGmP2xkFTITCSg_NE5gFD2mbv3SIFirReKSV0vu6ssrCnpwF');
		// define("PAYPAL_GATEWAY_URL" , "https://www.sandbox.paypal.com/cgi-bin/webscr" ) ;
		// define("PAYPAL_BUSINESS_EMAIL" , "devemail0909@gmail.com" ) ;

		// Authorize.Net Merchant
		define("POST_URL", "https://test.authorize.net/gateway/transact.dll");
		define("API_LOGIN_ID", "324ueKrHK"); // 2Z99mQsSv9x
		define("TRANSACTION_KEY", "94X593qYKrxwtw86");
		define("TEST_MODE", TRUE);

		//For merchant Quickbook Start
		define('INTUIT_URL' , 'https://sandbox.api.intuit.com/quickbooks/v4/payments/charges');
		define('INTUIT_CLIENT_ID' , 'Q021SqSNU3gp0W3YRr3f2tri77QmuEtdxBz45paeEWFC7t14i5');
		define('INTUIT_CLIENT_SECRET' , 'VnTpbyXBdwuiOqtk42lWdDNaBh67FHxYDGN9Nzba');
		define('AUTHORIZATIONREQUESTURL' , 'https://appcenter.intuit.com/connect/oauth2');
		define('TOKENENDPOINTURL' , 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer');
		define('OAUTH_SCOPE' , 'com.intuit.quickbooks.payment');
		define('OPENID_SCOPE' , 'openid profile email phone address');
		define('OAUTH_REDIRECT_URI' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/OAuth2PHPExample.php');
		define('OPENID_REDIRECT_URI' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/OAuthOpenIDExample.php');
		define('MAINPAGE' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/index.php');
		define('REFRESHTOKENPAGE' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/index.php');
		//For merchant Quickbook End
	}
	else {
		// Live website use Live Keys
		// define("PAYPAL_CLIENT_ID" , 'AS9TmehTwMdbRrKe3J8t9wcWMtVQcB1x9Zgo_bB0-Wh_cEdx_lTtSK2Oi1ymjkOm7Al5Kwqu8rtgHImb');
		// define("PAYPAL_CLIENT_SCERET" , 'EG3hAs25klmToP-NWRI9lhYAbc1kdcPQ0cDX74M6x_EGdBZ_fnGm5_Cmt2Rs8qavm605chfkynNR9cj6');

		// define("PAYPAL_GATEWAY_URL" , "https://www.paypal.com/cgi-bin/webscr" ) ;
		// define("PAYPAL_BUSINESS_EMAIL" , "sales@dexprotection.com" ) ;  //???
		// define("PAYPAL_BUSINESS_EMAIL" , "sales@dexprotection.com" ) ;

		// Authorize.Net Merchant
		define("POST_URL", "https://secure.authorize.net/gateway/transact.dll");
		define("API_LOGIN_ID", "4vG3448xMX82w9Y4");
		define("TRANSACTION_KEY", "66XhWm5ee");
		define("TEST_MODE", FALSE);

		//For merchant Quickbook Start
		define('INTUIT_URL' , 'https://api.intuit.com/quickbooks/v4/payments/charges');
		define('INTUIT_CLIENT_ID' , '');
		define('INTUIT_CLIENT_SECRET' , '');
		define('AUTHORIZATIONREQUESTURL' , 'https://appcenter.intuit.com/connect/oauth2');
		define('TOKENENDPOINTURL' , 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer');
		define('OAUTH_SCOPE' , 'com.intuit.quickbooks.payment');
		define('OPENID_SCOPE' , 'openid profile email phone address');
		define('OAUTH_REDIRECT_URI' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/OAuth2PHPExample.php');
		define('OPENID_REDIRECT_URI' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/OAuthOpenIDExample.php');
		define('MAINPAGE' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/index.php');
		define('REFRESHTOKENPAGE' , 'https://www.demowebdesignservices.com/oauth/OAuth2_PHP-master/OAuth_2/index.php');
		//For merchant Quickbook End
	}
}




if (ENVIRONMENT == 'development') {
    
    define('PAYPAL_ENVIRONMENT','sandbox');  //client Id
    define('PAYPAL_CLIENTID','AUmHB_5SuVcp75BKtDpmELANcg1XmEvFG8SvvuYQa-cngWOXSSmRfXBnt15_TGkcJtpsnFjMBzpxzE6F');  //client Id
	// SQUAREUP
// 	define("SQUARE_APPLICATION_ID" , "sandbox-sq0idp-ySiEsJj7JeGDEC0m1bA9zQ" ) ;
// 	define("SQUARE_ACCESS_TOKEN" , "sandbox-sq0atb-uhWDxv8BP5HsSBTUEkRQ9Q" ) ;	
	
	define("SQUARE_APPLICATION_ID" , "sandbox-sq0idb-gAMx9Un2o77qQHUBSQ-ZOw" ) ;
	define("SQUARE_ACCESS_TOKEN" , "EAAAEJv3GeIU-qZe8v5M04DkG3ww4rTGeQRgdINtf_oHNvhlnueVYFGZzezdSrsw" ) ;	
	define("SQUARE_APPLICATION_SECRET" , "sandbox-sq0csb-jJZuIK_ksyclJjIFf8Mh_wKvGHOw-VlQq-Y50pF2b2o" ) ;	
	define("SQUARE_URL" , "https://js.squareupsandbox.com/v2/paymentform" ) ;	

}elseif(ENVIRONMENT == 'testing')
{
    define('PAYPAL_ENVIRONMENT','sandbox');
    define('PAYPAL_CLIENTID','AUmHB_5SuVcp75BKtDpmELANcg1XmEvFG8SvvuYQa-cngWOXSSmRfXBnt15_TGkcJtpsnFjMBzpxzE6F');  //client Id
	// SQUAREUP
// 	define("SQUARE_APPLICATION_ID" , "sandbox-sq0idp-ySiEsJj7JeGDEC0m1bA9zQ" ) ;
// 	define("SQUARE_ACCESS_TOKEN" , "sandbox-sq0atb-uhWDxv8BP5HsSBTUEkRQ9Q" ) ;	

//     define("SQUARE_APPLICATION_ID" , "sandbox-sq0idp-R00z1BhMNLUPc4-Y6BmF9w" ) ;
// 		define("SQUARE_ACCESS_TOKEN" , "EAAAEG_drce3jgnkpPqhSNuSgCADR5aMjvflo6M_sn1M4PLjEX5hFtXvi2yb8hf8" ) ;	
// 		define("SQUARE_APPLICATION_SECRET" , "" ) ;	
// 		define("SQUARE_URL" , "https://js.squareup.com/v2/paymentform" ) ;
define("SQUARE_APPLICATION_ID" , "sandbox-sq0idb-gAMx9Un2o77qQHUBSQ-ZOw" ) ;
	define("SQUARE_ACCESS_TOKEN" , "EAAAEJv3GeIU-qZe8v5M04DkG3ww4rTGeQRgdINtf_oHNvhlnueVYFGZzezdSrsw" ) ;	
	define("SQUARE_APPLICATION_SECRET" , "sandbox-sq0csb-jJZuIK_ksyclJjIFf8Mh_wKvGHOw-VlQq-Y50pF2b2o" ) ;	
	define("SQUARE_URL" , "https://js.squareupsandbox.com/v2/paymentform" ) ;	

}else
{
    define('PAYPAL_ENVIRONMENT','production');
    define('PAYPAL_CLIENTID','');


}



if (ENVIRONMENT == 'development') {
    
	define('AMAZON_MERCHANT_ID','A1RX1ZEKJGE93B');  
    define('AMAZON_ACCESS_KEY','AKIAI5D4Z5GAWA3HD43A');  
    define('AMAZON_SECRET_KEY','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');  
    define('AMAZON_CLIENT_ID','amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a');  
    define('AMAZON_CLIENT_SECRET','2ea8275ac6a5dea978c43fae46ef33acc3741eebd11b36b8d8ac3cad524a99f5');  
    define('AMAZON_REGION','uk');  
    define('AMAZON_CURRENCY','GBP');  
    define('AMAZON_SANBOX',TRUE); 

}elseif(ENVIRONMENT == 'testing')
{
		// CLIENT CREDENTIALS
	define('AMAZON_MERCHANT_ID','A1RX1ZEKJGE93B');  
    define('AMAZON_ACCESS_KEY','AKIAI5D4Z5GAWA3HD43A');  
    define('AMAZON_SECRET_KEY','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');  
    define('AMAZON_CLIENT_ID','amzn1.application-oa2-client.12aacd6441274cf0a658552a4afc523a');  //elledev amazon account client ID
    define('AMAZON_CLIENT_SECRET','2ea8275ac6a5dea978c43fae46ef33acc3741eebd11b36b8d8ac3cad524a99f5');  
    define('AMAZON_REGION','uk');  
    define('AMAZON_CURRENCY','GBP');  
    define('AMAZON_SANBOX',TRUE); 

}else
{
	// CLIENT CREDENTIALS
	define('AMAZON_MERCHANT_ID','A1RX1ZEKJGE93B');  
    define('AMAZON_ACCESS_KEY','AKIAI5D4Z5GAWA3HD43A');  
    define('AMAZON_SECRET_KEY','');  
    define('AMAZON_CLIENT_ID','');  
    define('AMAZON_CLIENT_SECRET','');  
    define('AMAZON_REGION','uk');  
    define('AMAZON_CURRENCY','GBP');  
    define('AMAZON_SANBOX',FALSE);  
}

// STRIPE KEYS
// if (ENVIRONMENT == 'development') {
 

//     // define('STRIPE_PUBLISHABLE_KEY','pk_test_8ZdDLf80e4PcXdiSWP6GUSzJ');
//     // define('STRIPE_SECRET_KEY','sk_test_KqckVfv2AduSKKT5Hj39EKc2');  //secret key

//     define('STRIPE_PUBLISHABLE_KEY','pk_test_oc1wDcKb42C41jilh61hGmpj00jYA24pkc');  //public key
//     define('STRIPE_SECRET_KEY','sk_test_BZT93deYE5GqbWqLe7oF4N2f00hnEzfaEM');  //secret key
// }elseif(ENVIRONMENT == 'testing')
// {
// 	define('STRIPE_PUBLISHABLE_KEY','pk_test_oc1wDcKb42C41jilh61hGmpj00jYA24pkc');
//     define('STRIPE_SECRET_KEY','sk_test_BZT93deYE5GqbWqLe7oF4N2f00hnEzfaEM');  //secret key

// }else
// {
// 	// CLIENT KEYS
//     // define('STRIPE_PUBLISHABLE_KEY','pk_live_Sv2Hg9X36YNawm3sOQ1DqUXV');
//     // define('STRIPE_SECRET_KEY','sk_live_92xjVVuKkfVjDQDnAQsMeeAy');  //secret key
//       define('STRIPE_PUBLISHABLE_KEY','');
//     define('STRIPE_SECRET_KEY','');
// }

//CART END


// ORDER CONFIGS 
define("ORDER_NO_MASK" , "RZ-INV-%07d");

// PAYPAL CONFIGS
define("PAYMENT_ORDER_CANCEL_STATUS" , '2');
define("PAYMENT_ORDER_CANCEL_REASON" , 'Transaction Cancelled by User');

define("PAYMENT_ORDER_SUCCESS_STATUS" , '1');
define("PAYMENT_ORDER_SUCCESS_REASON" , 'Payment Successfully Transfered');

define("PAYMENT_ORDER_GIFT_STATUS" , '1');
define("PAYMENT_ORDER_GIFT_REASON" , 'Credits Gift By Admin');

define("PAYMENT_ORDER_ADMIN_REFUND_STATUS" , '8');
define("PAYMENT_ORDER_ADMIN_REFUND_REASON" , 'Reversed/Refunded by Admin');

define("PAYMENT_ORDER_COMPLETE_STATUS" , '3');
define("PAYMENT_ORDER_COMPLETE_REASON" , 'Transaction complete - Redirected from Payment Gateway');

define("PAYMENT_ORDER_PENDING_STATUS" , '0');
define("PAYMENT_ORDER_PENDING_REASON" , 'Transaction pending. User not yet visited Payment Gateway');




	
define("CONFIG_ADMIN" , 'admin' ) ;
define("CONFIG_SYSTEM" , 'system' ) ;

// SOCIAL MEDIA CONFIG ""
define("FB_APP_ID" , "");
define("FB_APP_SECRET" , "");





// 2CO Two Checkout Configs
define('TWO_CO_PUB_KEY', '') ;
define('TWO_CO_PRIVATE_KEY', '') ;
define('TWO_CO_SELLER_ID', "" ) ;
define('TWO_CO_ENVIRONMENT', 'sandbox') ;
define('TWO_CO_SSL', false ) ;

define('VENDOR', 1 ) ;
define('ADMIN', 1 ) ;
define('CONTACTUS_EMAIL', 'email_conatct_us_to' ) ;
define('CONTACTUS_SKYPE', 'skype_id' ) ;
define('CONTACTUS_FACEBOOK', 'facebook_id' ) ;
define('CONTACTUS_TWITTER', 'twitter_id' ) ;


// define("QUIZ_LIMIT" , 10);
// define("PASSING_AVG" , 50);
// $config['appId']   = '437437646454367';
// $config['secret']  = '1564932dd4a202a9dc8801ebf1e8f5f3';

// Google Map API
// define("GOOGLE_MAP_API","AIzaSyAOH5JuJbcKOamxc3iF8KJApYX5z49tdRU");

/*
* APP RELATED Config Setting
* Developer: Dalton Lambert
* Started: 04-July-2019
*/

// Users
define('NORMAL_USER',0);
define('CONTRIBUTOR_USER',1);

define('ARTICLE',1);
define('VIDEO_ARTICLE',2);

define('MSG_PAGING',10);

// Notification Message
//define('ERROR_EVENT_LIMIT','Your monthly event limit is over');



?>