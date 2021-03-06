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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'public/home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'public/home/index';
$route['public/materi'] = "public/materi/index";
$route['public'] = 'public/home/index';
$route['public/materi/(:any)'] = "public/materi/index/$1";
$route['public/materi/(:any)/(:any)'] = "public/materi/index/$1/$2";
$route['public/materi/(:any)/(:any)/(:any)'] = "public/materi/index/$1/$2/$3";
$route['public/penelitian/tahun/(:num)/hal/(:num)'] = "public/penelitian/index/$1/$2";
$route['public/penelitian/hal/(:num)/tahun/(:num)'] = "public/penelitian/index/$2/$1";

$route['public/penelitian/hal'] = "public/penelitian/index/0/1";
$route['public/penelitian/hal/(:num)'] = "public/penelitian/index/0/$1";

$route['public/penelitian/tahun/(:num)'] = "public/penelitian/index/$1/0";
$route['public/penelitian/tahun/(:num)/hal'] = 'public/penelitian/index/$1/1/';
$route['public/curhat'] = "public/Curhat/index/hal/1";
//$route['public/curhat/detail/(:any)'] = 'public/Curhat/index/detail/$1';
$route['public/curhat/tambah'] = "public/Curhat/index/tambah";

$route['public/curhat/hal'] = "public/Curhat/index/hal/1";
$route['public/curhat/hal/(:num)'] = "public/Curhat/index/hal/$1";
$route['admin/posting'] = 'admin/posting/index/';




// $route['materi/(:any)'] = 'public/materi/index/$1';
// $route['materi/(:any)/(:any)'] = 'public/materi/index/$1/$2';
// $route['materi/(:any)/(:any)/(:any)'] = 'public/materi/index/$1/$2/$3';
