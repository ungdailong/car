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
$route['tu-van'] = "tuvan";
$route['tu-van/(:num)'] = "tuvan/index/$1";
$route['tu-van/chi-tiet/(:num)'] = "tuvan/chitiet/$1";
$route['tu-van/(:any)'] = "tuvan/typeTuvan/$1";
$route['tu-van/(:any)/(:num)'] = "tuvan/typeTuvan/$1/$2";

$route['xe-moi'] = "xemoi";
$route['xe-moi/(:num)'] = "xemoi/index/$1";
$route['xe-moi/chi-tiet/(:num)'] = "xemoi/chitiet/$1";

$route['xe-moi/(:any)/(:any)/(:num)'] = "xemoi/typeCar/$1/$2/$3";
$route['xe-moi/(:any)/(:num)'] = "xemoi/typeCar/$1/null/$2";
$route['xe-moi/(:any)/(:any)'] = "xemoi/typeCar/$1/$2/1";
$route['xe-moi/(:any)'] = "xemoi/typeCar/$1/null/1";


$route['xe-qua-su-dung'] = "xequasudung";
$route['xe-qua-su-dung/(:num)'] = "xequasudung/index/$1";
$route['xe-qua-su-dung/chi-tiet/(:num)'] = "xequasudung/chitiet/$1";

$route['xe-qua-su-dung/proven-exclusivity'] = "xequasudung/provenExclusivity";
$route['xe-qua-su-dung/(:any)/(:any)/(:num)'] = "xequasudung/typeCar/$1/$2/$3";
$route['xe-qua-su-dung/(:any)/(:num)'] = "xequasudung/typeCar/$1/null/$2";
$route['xe-qua-su-dung/(:any)/(:any)'] = "xequasudung/typeCar/$1/$2/1";
$route['xe-qua-su-dung/(:any)'] = "xequasudung/typeCar/$1/null/1";


$route['tin-tuc'] = "tintuc";
$route['tin-tuc/(:num)'] = "tintuc/index/$1";
$route['tin-tuc/chi-tiet/(:num)'] = "tintuc/chitiet/$1";



$route['lien-he'] = "lienhe";
$route['khuyen-mai'] = "khuyenmai";
$route['thong-tin-luu-y'] = "thongtincanluuy";
$route['chuongtrinhdinhcu/(:num)'] = "chuongtrinhdinhcu/index/$1";
$route['tintuc/(:num)'] = "tintuc/index/$1";
$route['thongtincanluuy/(:num)'] = "thongtincanluuy/index/$1";
//$route['search/(:any)'] = "search/index/$1";
//$route['search?keyword=(:any)'] = "search/index/$1";
$route['default_controller'] = "home";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */