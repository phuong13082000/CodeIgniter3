<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['login']['GET'] = 'LoginController/index';
$route['login-user']['POST'] = 'LoginController/login';

//dashboard
$route['dashboard']['GET'] = 'DashboardController/index';
$route['logout']['GET'] = 'DashboardController/logout';

//brand
$route['brand/list']['GET'] = 'BrandController/index';
$route['brand/store']['POST'] = 'BrandController/store';
$route['brand/create']['GET'] = 'BrandController/create';
$route['brand/edit/(:any)']['GET'] = 'BrandController/edit/$1';
$route['brand/delete/(:any)']['GET'] = 'BrandController/delete/$1';
$route['brand/update/(:any)']['POST'] = 'BrandController/update/$1';

//category
$route['category/list']['GET'] = 'CategoryController/index';
$route['category/store']['POST'] = 'CategoryController/store';
$route['category/create']['GET'] = 'CategoryController/create';
$route['category/edit/(:any)']['GET'] = 'CategoryController/edit/$1';
$route['category/delete/(:any)']['GET'] = 'CategoryController/delete/$1';
$route['category/update/(:any)']['POST'] = 'CategoryController/update/$1';
