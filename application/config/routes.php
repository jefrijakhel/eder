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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home/main'] = 'home/main';
$route['home/login'] = 'home/login';
$route['home/auth'] = 'home/login_proccess';
$route['home/cart'] = 'home/cart';
$route['home/check'] = 'home/check';
$route['home/pay'] = 'home/pay';
$route['home/success'] = 'home/success';
$route['home/logout'] = 'home/logout';

$route['order'] = 'home/order';
$route['update'] = 'home/update';
$route['checkout'] = 'home/checkout';
$route['status'] = 'home/status';
$route['getTransactionMakanan'] = 'dapur/getTransaksiMakanan';
$route['getTransactionMinuman'] = 'dapur/getTransaksiMinuman';
$route['getT'] = 'dapur/getT';
$route['proses-order'] = 'dapur/proses';
$route['close-order/(:any)'] = 'dapur/close/$1';
$route['getMeja'] = 'kasir/getMeja';

$route['employee'] = 'login';
$route['employee/auth'] = 'login/auth';
$route['employee/logout'] = 'login/logout';

$route['employee/kasir'] = 'kasir';
$route['employee/dapur'] = 'dapur';
$route['employee/manager'] = 'manager';

$route['dapur/list-pesanan'] = 'dapur/listpesanan';
$route['dapur/belanja'] = 'dapur/belanja';
$route['dapur/add-belanja'] = 'dapur/addbelanja';
$route['dapur/detail-belanja/(:any)'] = 'dapur/detailbelanja/$1';
$route['kasir/open'] = 'kasir/open';
$route['close-table'] = 'kasir/close';

$route['manager/dashboard'] = 'manager/dashboard';
$route['manager/gaji'] = 'manager/gaji';
$route['manager/gaji/detail/(:any)'] = 'manager/detailgaji/$1';
$route['manager/list-belanja'] = 'manager/listbelanja';
$route['manager/list-belanja/detail/(:any)'] = 'manager/detailbelanja/$1';
$route['manager/tambah-penggajian'] = 'manager/tambahgaji';

$route['manager/post-gaji'] = 'manager/postgaji';
$route['dapur/post-belanja'] = 'dapur/postbelanja';

$route['dapur/update-harga'] = 'dapur/updateharga';

$route['manager/approvebelanja/(:any)'] = 'manager/approve/$1';

$route['submit-feedback'] = 'home/submitfeedback';

$route['manager/feedback']  = 'manager/feedback';
$route['order-close-auto'] = 'dapur/closeauto';

$route['manage-menu'] = 'manager/menu';
$route['manage-menu/add'] = 'manager/addmenu';
$route['manage-menu/update/(:any)'] = 'manager/updatemenu/$1';
$route['manage-menu/delete/(:any)'] = 'manager/deletemenu/$1';
$route['manage-menu/post'] = 'manager/postmenu';
$route['manage-menu/put'] = 'manager/putmenu';

$route['manage-karyawan'] = 'manager/karyawan';
$route['manage-karyawan/add'] = 'manager/addkaryawan';
$route['manage-karyawan/update/(:any)'] = 'manager/updatekaryawan/$1';
$route['manage-karyawan/delete/(:any)'] = 'manager/deletekaryawan/$1';
$route['manage-karyawan/post'] = 'manager/postkaryawan';
$route['manage-karyawan/put'] = 'manager/putkaryawan';

$route['manage-meja'] = 'manager/meja';
$route['manage-meja/add'] = 'manager/addmeja';
$route['manage-meja/update/(:any)'] = 'manager/updatemeja/$1';
$route['manage-meja/delete/(:any)'] = 'manager/deletemeja/$1';
$route['manage-meja/post'] = 'manager/postmeja';
$route['manage-meja/put'] = 'manager/putmeja';
