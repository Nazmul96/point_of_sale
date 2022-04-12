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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$login_info=$this->session->userdata('login_info');
// echo '<pre>';
// print_r($login_info);


//admin------
$route['admin_login'] = 'AdminController/login';
$route['dashboard'] = 'AdminController/dashbaord';//"""""dashboard load here"""""
$route['admin_logged'] = 'AdminController/admin';
$route['admin_logout'] = 'AdminController/admin_logout';
$route['admin_profile'] = 'AdminController/admin_profile';
$route['profile_image_update'] = 'AdminController/profile_image_update';
$route['admin_personal_info'] = 'AdminController/admin_personal_info';
$route['admin_password_change'] = 'AdminController/admin_password_change';
$route['admin_password_update'] = 'AdminController/admin_password_update';

// user------------
$route['user_roles_index'] = 'UserrolesController/user_roles_index'; 
$route['user_role_insert'] = 'UserrolesController/user_role_insert';
$route['delete_user/(.+)'] = 'UserrolesController/delete_user/$1';
$route['edit_user/(.+)'] = 'UserrolesController/edit_user/$1';
$route['user_update'] = 'UserrolesController/user_update';

//roles------------
$route['roles_index'] = 'RolesController/roles_index';
$route['roles_insert'] = 'RolesController/roles_insert';
$route['edit_roles/(.+)'] = 'RolesController/edit_roles/$1';
$route['roles_update'] = 'RolesController/roles_update';
$route['delete_roles/(.+)'] = 'RolesController/delete_role/$1';

// Estimate---------------
$route['estimates'] = 'Welcome/estimates'; 
$route['estimates_add'] = 'Welcome/estimates_add'; 
//client----
$route['client_registration'] = 'ClientController/client_registration';//for client registration
$route['client_registration_insert'] = 'ClientController/client_registration_insert';
$route['client_index'] = 'ClientController/index';
$route['client_insert'] = 'ClientController/insert';
$route['delete_client/(.+)'] = 'ClientController/delete/$1';
$route['edit_client/(.+)'] = 'ClientController/edit/$1';
$route['client_update'] = 'ClientController/update';
$route['view_client/(.+)'] = 'ClientController/view/$1';
$route['client_invoices/(.+)'] = 'ClientController/client_invoices/$1';
    //client index for ajax datatable--------------
    $route['client_index_datatable'] = 'ClientController/client_index_datatable';
//products------
$route['product_index'] = 'ProductController/product_index';
$route['product_insert'] = 'ProductController/insert';      
$route['delete_product/(.+)'] = 'ProductController/delete/$1';
$route['edit_product/(.+)'] = 'ProductController/edit/$1';
$route['product_update/(.+)'] = 'ProductController/update/$1';

//Categories-----
$route['category_index'] = 'CategoryController/category_index'; 
$route['category_insert'] = 'CategoryController/insert';
$route['delete_category/(.+)'] = 'CategoryController/delete/$1';
$route['edit_category/(.+)'] = 'CategoryController/edit/$1';
$route['category_update'] = 'CategoryController/update';

//Invoices-------
$route['invoice_index'] = 'InvoiceController/invoice_index';
$route['get_product_details'] = 'InvoiceController/get_product_details';
$route['invoice_insert'] = 'InvoiceController/invoice_insert';
$route['delete_invoices/(.+)'] = 'InvoiceController/delete_invoices/$1';
$route['view_invoices/(.+)'] = 'InvoiceController/view_invoices/$1';
$route['edit_invoices/(.+)'] = 'InvoiceController/edit_invoices/$1';
$route['invoice_update/(.+)'] = 'InvoiceController/invoice_update/$1';
$route['download_invoice/(.+)'] = 'InvoiceController/download_invoice/$1';
    //Invoices for datatable------------
    $route['invoice_index_datatable'] = 'InvoiceController/invoice_index_datatable';

//payments-------
$route['add_payment/(.+)'] = 'PaymentController/add_payment/$1';
$route['invoice_payment_insert'] = 'PaymentController/payment_insert';
$route['payment_index'] = 'PaymentController/payment_index';
$route['delete_payment/(.+)'] = 'PaymentController/delete_payment/$1';
$route['payment_edit/(.+)'] = 'PaymentController/payment_edit/$1';
$route['payment_update/(.+)'] = 'PaymentController/payment_update/$1';


//Reports---------
$route['payment_summary'] = 'ReportController/payment_summary';
$route['client_statement'] = 'ReportController/client_statement';
$route['invoice_report'] = 'ReportController/invoice_report';

//settings------
$route['setting_index'] = 'SettingController/setting_index';
$route['general_update'] = 'SettingController/general_update';
          //email
          $route['email_setup'] = 'SettingController/email_setup';
          $route['email_setup_update'] = 'SettingController/email_setup_update';
         //payment-----
          $route['payment_method'] = 'SettingController/payment_method';
          $route['payment_insert'] = 'SettingController/payment_insert';
          $route['all_payment_data'] = 'SettingController/all_payment';
          $route['payment_stting_delete'] = 'SettingController/payment_stting_delete';
          $route['payment_setting_edit'] = 'SettingController/payment_setting_edit';
          $route['payment_setting_update'] = 'SettingController/payment_setting_update';

          //invoice_setting 
          $route['invoice_setting'] = 'SettingController/invoice_setting_index';
          $route['invoice_setting_update'] = 'SettingController/invoice_setting_update';

          //Tax setting------
          $route['tax_setting'] = 'SettingController/tax_setting_index';
          $route['tax_insert'] = 'SettingController/tax_insert';
          $route['all_tax_data'] = 'SettingController/all_tax_data';
          $route['tax_stting_delete'] = 'SettingController/tax_stting_delete';
          $route['tax_setting_edit'] = 'SettingController/tax_setting_edit';
          $route['tax_update'] = 'SettingController/tax_update';

          //Notification setting--------
          $route['notification_index'] = 'SettingController/notification_index';
          $route['notification_edit'] = 'SettingController/notification_edit';
          $route['notification_update'] = 'SettingController/notification_update';


//Cron Controller-------------for status change unpaid and partially paid to overdue
$route['cron_index'] = 'Cron_Controller/cron_index';
$route['invoice_payment_reminder'] = 'Cron_Controller/invoice_payment_reminder';
//forgot password controll work------------
$route['forgot_password'] = 'ForgotpasswordController/forgot_password_index';
$route['reset_password'] = 'ForgotpasswordController/reset_password';
$route['reset_password_url/(.+)'] = 'ForgotpasswordController/reset_password_done/$1';
$route['reset_password_update'] = 'ForgotpasswordController/reset_password_update';



