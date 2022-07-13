<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dang-nhap'] = 'IndexController/login';
$route['checkout'] = 'IndexController/checkout';
$route['error'] = 'IndexController/error';
$route['blog'] = 'IndexController/blog';
$route['blog-single'] = 'IndexController/blogSingle';
$route['cart'] = 'IndexController/cart';
$route['contact-us'] = 'IndexController/contactUs';
$route['product-details'] = 'IndexController/productDetails';
$route['send-email'] = 'IndexController/sendMail';
$route['shop'] = 'IndexController/shop';

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
