<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = "home";

//admin
$route['admin'] = "admin";
$route['admin/(:any)'] = "admin/$1";


//frontend slugs
$route['dologin'] = "home/login";
$route['translate_uri_dashes'] = true;
$route['not-found'] = "home/notfound";



// Static Pages
// $route['terms-and-conditions'] = "cms/index/15";
// $route['privacy-policy'] = "cms/index/16";


$route['course-catalog'] = "course/index";
$route['course-detail/(:any)'] = "about_us/course_detail/$1";
//$route['course-detail/(:any)'] = "course/detail/$1";
$route['course-packages/(:any)'] = "course/course_package/$1";


$route['professions-detail/(:any)'] = "professions/detail/$1";
$route['requirements/search'] = "requirements/index";
$route['courses-overview'] = "home/search";

$route['product-detail/(:any)'] = "store/detail/$1";


$route['terms-and-conditions'] = "about_us/terms";
$route['privacy-policy'] = "about_us/policy";
$route['cookie-policy'] = "about_us/cookie";

$route['learning-journey'] = "about_us/learning";
$route['expert-tutorial'] = "about_us/expert";
$route['about-us'] = "about_us/index";

$route['cart'] = "cart/index";	
$route['step-1'] = "account/profile/tools";

//PACKAGE
// $route['package-payment-step-1'] = "package/order_view";
// $route['package-payment-step-2'] = "package/payment";
// $route['package-payment-final-step'] = "payment/stripe/stripe_payment";

$route['course-payment'] = "course/payment";
$route['package-payment'] = "course/payment";
// $route['payment-failure'] = "payment/stripe/fail";
// $route['payment-success'] = "payment/stripe/success";


$route['payment-failure'] = "payment/Squareup/payment_error";
$route['payment-success'] = "payment/Squareup/payment_success";




// Acount Area
$route['dashboard'] = "account/dashboard";
$route['account-area'] = "account/dashboard";
$route['login'] = "registration/login";
// $route['signup'] = "registration/login";
$route['signup'] = "registration";
$route['signup-contributor'] = "registration/contributor_signup";
$route['forgot-password'] = "registration/forgot_password";
$route['ajax-save-signup'] = "signup/index";
$route['account-area/profile/edit'] = "account/profile/index";
// $route['account-area/package-info'] = "account/profile/package_info";
$route['account-area/favorite-article'] = "account/profile/favorite_article";
$route['account-area/change-password'] = "account/profile/change_password";
$route['account-area/address-info'] = "account/profile/address_info";
$route['account-area/change-profile'] = "account/profile/about_us";
$route['account-area/expert-tutorial'] = "account/profile/expertTutorial";
//order history 
$route['account-area/order-history'] = "account/order";
$route['account-area/package-info'] = "account/package";
$route['account-area/enrolled-courses'] = "account/courses/index";
$route['account-area/lecture'] = "course/lectures";

$route['quiz-instruction/(:any)/(:any)/(:any)'] = "quiz/quiz_instruction/$1/$2/$3";
$route['quiz/(:any)/(:any)/(:any)'] = "quiz/quiz/$1/$2/$3";

$route['quiz-success/(:any)/(:any)'] = "quiz/success/$1/$2";
$route['certificate/(:any)/(:any)'] = "quiz/success/$1/$2";
$route['quiz-fail/(:any)/(:any)'] = "quiz/fail/$1/$2";
$route['completion-certificate/(:any)'] = "quiz/pdf_convert/$1";
$route['course-evaluation'] = "course/evaluation";

$route['course-detail-expert/(:any)'] = "account/profile/course_detail_expert/$1";
$route['expert-detail-tutorial/(:any)'] = "account/profile/expert_detail_tutorial";







// Products
// $route['rewards-products'] = "products/rewards";
// $route['products/(:any)'] = "products/index/$1";
// $route['product/detail/(:any)'] = "products/detail/$1";
// $route['products/rating'] = "products/rating";
