<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// image crud - PRODUCTS
$route['products/add']['GET'] = 'ProductController/new';
$route['products/add']['POST'] = 'ProductController/create';
$route['products']['GET'] = 'ProductController/index';

// file activity
$route['files/add']['GET'] = 'FilesController/new';
$route['files/add']['POST'] = 'FilesController/create';