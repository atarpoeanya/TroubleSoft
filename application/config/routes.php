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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['uploads/error'] = 'errors/page_missing';

// UPLOADS NEED LOGIN ACCESS


// Main Pages Routing
$route['as'] = 'dashboard/transition_form_select';
// Form
$route['equipment'] = 'dashboard/tool_form';
$route['equipment_fmea'] = 'dashboard/tool_fmea';
// action on post
$route['equipment_fmea/(:num)'] = 'dashboard/post_tools/$type'; //surface level masking
$route['equipment/(:num)'] = 'dashboard/post_tools/$type';      //used on form action in the pages

$route['product'] = 'dashboard/productForm';

$route['dashboard'] = 'dashboard';

//Equipment editing
$route['editEquipment/(:num)'] = 'dashboard/edit_data_tool_view/$id';
$route['editEquipment_fmea/(:num)'] = 'dashboard/edit_data_tool_fmea_view/$id';

$route['edit_Equipment'] = 'dashboard/post_edit_data_tool';
$route['edit_Equipment_fmea'] = 'dashboard/post_edit_data_tool_fmea';


//Record Routing
$route['item/(:num)'] = 'dashboard/view_record_tool/$id';

$route['item_fmea/(:num)'] = 'dashboard/view_record_tool_fmea/$id';

