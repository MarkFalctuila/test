<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//link = controller
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user/login'] = 'user/login';
$route['dashboard'] = 'dashboard';
$route['user-login'] = 'user/logout';
$route['user/add-role'] = 'user/addRole';
$route['user/load-roles'] = 'user/loadRoles';
$route['user/add-user']= 'user/addUser';
$route['users/load-users']= 'user/loadUsers';


$route['registration'] = 'registration';

 