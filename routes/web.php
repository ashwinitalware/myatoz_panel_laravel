<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::get('/', function () {
        session()->forget('login_data');
        return view('admin.login');
    });
    Route::post('admin_login', [App\Http\Controllers\Web\Admin_Login_Controller::class, 'admin_login'])->name('admin_login');

    // Route::get('dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('dashboard', [App\Http\Controllers\Web\Dashboard_Controller::class, 'dashboard'])->name('dashboard');
    Route::get('employee_payment/index', function () {
        return view('admin.employee_payment.index');
    });
    Route::get('report/index', function () {
        return view('admin.report.index');
    });
    //worthy
    Route::resource('area', 'App\Http\Controllers\Web\Area_Controller');
    Route::resource('city', 'App\Http\Controllers\Web\City_Controller');
    Route::resource('subscription', 'App\Http\Controllers\Web\Subscription_Controller');
    Route::resource('mode_of_payment', 'App\Http\Controllers\Web\Mode_Of_Payment_Controller');
    Route::resource('customer_registration', 'App\Http\Controllers\Web\Customer_Controller');
    Route::resource('monthly_insurance', 'App\Http\Controllers\Web\Monthly_Insurance_Controller');
    Route::get('e_pass/get_subscriptions', [App\Http\Controllers\Web\E_Pass_Controller::class, 'get_subscriptions'])->name('e_pass.get_subscriptions');
    Route::get('e_pass/get_subscription_detail', [App\Http\Controllers\Web\E_Pass_Controller::class, 'get_subscription_detail'])->name('e_pass.get_subscription_detail');
    Route::get('download_e_pass', [App\Http\Controllers\Web\E_Pass_Controller::class, 'download_e_pass'])->name('download_e_pass');
    Route::post('e_pass/get_customer_details', [App\Http\Controllers\Web\E_Pass_Controller::class, 'get_customer_details'])->name('e_pass.get_customer_details');
    Route::resource('e_pass', 'App\Http\Controllers\Web\E_Pass_Controller');
    Route::get('driver_registration/qr_code_driver', [App\Http\Controllers\Web\Driver_Controller::class, 'qr_code_driver'])->name('driver_registration.qr_code_driver');
    Route::get('driver_registration/changeStatus', [App\Http\Controllers\Web\Driver_Controller::class, 'changeStatus'])->name('driver_registration.changeStatus');
    Route::resource('driver_registration', 'App\Http\Controllers\Web\Driver_Controller');
    Route::post('driver_management/get_drivers', [App\Http\Controllers\Web\Driver_Management_Controller::class, 'get_drivers'])->name('driver_management.get_drivers');
    Route::post('driver_management/get_driver_details', [App\Http\Controllers\Web\Driver_Management_Controller::class, 'get_driver_details'])->name('driver_management.get_driver_details');
    Route::post('driver_management/get_area_details', [App\Http\Controllers\Web\Driver_Management_Controller::class, 'get_area_details'])->name('driver_management.get_area_details');
    Route::resource('driver_management', 'App\Http\Controllers\Web\Driver_Management_Controller');
    Route::resource('contactus', 'App\Http\Controllers\Web\Contact_Us_Controller');
    Route::resource('timeslot', 'App\Http\Controllers\Web\Timeslot_Controller');
    Route::resource('notes', 'App\Http\Controllers\Web\Notes_Controller');
    Route::resource('timetable', 'App\Http\Controllers\Web\Timetable_Controller');
    Route::resource('usermanagement', 'App\Http\Controllers\Web\User_Management_Controller');


//Reports
    Route::get('driver_login_logout_report', [App\Http\Controllers\Web\ReportController::class, 'driver_login_logout_report'])->name('driver_login_logout_report');

    Route::get('customers_subscription_details/{status}', [App\Http\Controllers\Web\ReportController::class, 'customers_subscription_details'])->name('customers_subscription_details');

    Route::get('current_rides', [App\Http\Controllers\Web\ReportController::class, 'current_rides'])->name('current_rides');

    Route::get('completed_rides', [App\Http\Controllers\Web\ReportController::class, 'completed_rides'])->name('completed_rides');

    Route::get('cancelled_rides', [App\Http\Controllers\Web\ReportController::class, 'cancelled_rides'])->name('cancelled_rides');
    Route::get('hideSubscription/{id}/{value}', [App\Http\Controllers\Web\Subscription_Controller::class, 'hideSubscription'])->name('hideSubscription');
    Route::get('customer_notifications', [App\Http\Controllers\Web\Customer_Controller::class, 'customer_notifications'])->name('customer_notifications');
    Route::post('sendNotificationToCustomers', [App\Http\Controllers\Web\Customer_Controller::class, 'sendNotificationToCustomers'])->name('sendNotificationToCustomers');

    Route::get('vehicle_type', [App\Http\Controllers\Web\Vehicle_Controller::class, 'vehicle_type'])->name('vehicle_type');

    Route::post('storeVehicleType', [App\Http\Controllers\Web\Vehicle_Controller::class, 'storeVehicleType'])->name('storeVehicleType');
    Route::get('deleteVehicleType/{id}', [App\Http\Controllers\Web\Vehicle_Controller::class, 'deleteVehicleType'])->name('deleteVehicleType');

    Route::get('vehicles', [App\Http\Controllers\Web\Vehicle_Controller::class, 'vehicles'])->name('vehicles');

    Route::post('storeVehicles', [App\Http\Controllers\Web\Vehicle_Controller::class, 'storeVehicles'])->name('storeVehicles');
    Route::get('deleteVehicle/{id}', [App\Http\Controllers\Web\Vehicle_Controller::class, 'deleteVehicle'])->name('deleteVehicle');

    