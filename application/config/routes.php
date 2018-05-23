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
$route['default_controller'] = 'vitrine/index';
$route['section/(:num)/(:num)'] = 'vitrine/section/$1/$2';
$route['contact'] = 'vitrine/contact';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'sessions/login';
$route['logout'] = 'sessions/destroy';

$route['user/new'] = 'user/new_user';

$route['products'] = 'product/index';
$route['products/new'] = 'product/create';
$route['products/(:num)/show'] = 'product/show/$1';
$route['products/(:num)'] = 'product/update/$1';
$route['product/(:num)'] = 'product/destroy/$1';


$route['categories'] = 'category/index';
$route['categories/new'] = 'category/create';
$route['categories/(:num)/show'] = 'category/show/$1';
$route['categories/(:num)'] = 'category/update/$1';
$route['categorie/(:num)'] = 'category/destroy/$1';

$route['sub_categories'] = 'SubCategory/index';
$route['sub_categories/new'] = 'SubCategory/create';
$route['sub_categories/(:num)/show'] = 'SubCategory/show/$1';
$route['sub_categories/(:num)'] = 'SubCategory/update/$1';
$route['sub_categorie/(:num)'] = 'SubCategory/destroy/$1';

$route['users'] = 'user/index';
$route['users/new'] = 'user/new_user';
$route['user/(:num)'] = 'user/destroy/$1';
