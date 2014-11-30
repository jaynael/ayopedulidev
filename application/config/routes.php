<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "index";
$route['notfound404'] = 'notfound404';
$route['404_override'] = 'notfound404';
$route['aksi/create'] = 'aksi/create';
$route['aksi/view/(:any)'] = 'aksi/view/$1';
$route['aksi/category/(:any)'] = 'aksi/category/$1';
$route['aksi'] = 'aksi';
$route['aksi/(:any)'] = 'aksi/$1';
$route['aksi/save'] = 'aksi/save';
$route['aksi/savelogin'] = 'aksi/savelogin';
$route['profile/view/(:any)'] = 'profile/view/$1';
$route['profile/myprofile/(:any)'] = 'profile/myprofile/$1';
$route['myprofile'] = 'profile/myprofile';
$route['register'] = 'register';
$route['register/new_user'] = 'register/new_user';
$route['login'] = 'login';
$route['about'] = 'about';
$route['faq'] = 'faq';
$route['tim'] = 'tim';
$route['runforcharity'] = 'runforcharity';
//$route['(:any)'] = 'aksi/view/$1';

//login-logout
$route['login/verifylogin'] = 'login/verifylogin';
$route['home/logout'] = 'home/logout';
$route['profile/do_login'] = 'profile/do_login';
$route['profile/logout'] = 'profile/logout';
$route['profile/register'] = 'profile/register';

//ROute DOnasi
$route['donasi/nonlog'] = 'donasi/nonlog';
$route['donasi/donlogin'] = 'donasi/donlogin';
$route['donasi/update'] = 'donasi/update';
$route['donasi/cancel'] = 'donasi/cancel';
$route['donasi/update/(:any)'] = 'donasi/update/$1';

//Route Home
$route['home'] = 'home';
$route['home/redeem'] = 'home/redeem';
$route['home/redeem/history'] = 'home/redeemhistory';
$route['home/aksi/'] = 'home/aksi';
$route['home/aksi/saya'] = 'home/aksimy';
$route['home/aksi/:num'] = 'home/aksi/$1'; 
$route['home/aksi/(:any)'] = 'home/aksidetail/$1';
$route['home/donasi/history'] = 'home/donasihistory';
$route['home/new_act/step1'] = 'home/new_act';
$route['home/new_act/step2'] = 'home/new_act2';
$route['home/new_act/step3'] = 'home/new_act3';
$route['home/new_act/step4'] = 'home/new_act4';
//$route['home/edit_act/step2/'] = 'home/edit_act2';
$route['home/edit_act/step1/(:any)'] = 'home/edit_act/$1';
$route['home/edit_act/step2/(:any)'] = 'home/edit_act2/$1';
$route['home/edit_act/step3/(:any)'] = 'home/edit_act3/$1';
$route['home/edit_act/step4/(:any)'] = 'home/edit_act4/$1';
$route['home/editprofile/(:any)'] = 'home/editprofile/$1';
//$route['home/editaksi/(:any)'] = 'home/editaksi/$1';
//$route['home/updateaksi/(:any)'] = 'home/updateaksi/$1';

//ROute Volunteer
$route['volunteer/new_volunteer'] = 'volunteer/new_volunteer';

//admin
$route['atur/admin'] = 'atur/admin';
$route['atur/admin/donasi'] = 'atur/admin/donasi';
$route['atur/login'] = 'atur/login';
$route['atur/logout'] = 'atur/logout';
$route['atur/verifylogin'] = 'atur/verifylogin';
$route['atur/adddonasi'] = 'atur/adddonasi';
$route['atur/adddonasiaksi/(:any)'] = 'atur/adddonasiaksi/$1';
$route['atur/viewaksi/(:any)'] = 'atur/viewaksi/$1';

//Partner
$route['partner/join_partner'] = 'partner/join_partner';
$route['partner/register'] = 'partner/register';
$route['partner'] = 'partner';
$route['partner/home'] = 'partner/home';
$route['partner/home/(:any)'] = 'partner/home/$1';
$route['partner/new_product'] = 'partner/new_product';
$route['partner/login'] = 'partner/login';
$route['partner/logout'] = 'partner/logout';
$route['partner/verifylogin'] = 'partner/verifylogin';
$route['partner/new_promo'] = 'partner/new_promo';
$route['partner/insert_promo'] = 'partner/insert_promo';
$route['partner/new_support'] = 'partner/new_support';

//add
$route['sangkur'] = 'sangkur';

//add
$route['savemugo'] = 'savemugo';

//redeem
$route['redeem/poin'] = 'redeem/poin';
$route['redeem/voucher/(:any)'] = 'redeem/voucher/$1';



/* End of file routes.php */
/* Location: ./application/config/routes.php */