<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//user
$route['danh-muc/(:any)']['GET'] = 'IndexController/category/$1';
$route['thuong-hieu/(:any)']['GET'] = 'IndexController/brand/$1';
$route['san-pham/(:any)']['GET'] = 'IndexController/product/$1';
$route['dang-nhap']['GET'] = 'IndexController/login';
$route['cart']['GET'] = 'IndexController/cart';

//login admin
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

//product
$route['product/list']['GET'] = 'ProductController/index';
$route['product/store']['POST'] = 'ProductController/store';
$route['product/create']['GET'] = 'ProductController/create';
$route['product/edit/(:any)']['GET'] = 'ProductController/edit/$1';
$route['product/delete/(:any)']['GET'] = 'ProductController/delete/$1';
$route['product/update/(:any)']['POST'] = 'ProductController/update/$1';
