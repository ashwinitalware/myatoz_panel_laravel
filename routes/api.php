<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Area_Controller;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\City_Controller;
use App\Http\Controllers\Api\E_Pass_Controller;
use App\Http\Controllers\Api\Monthly_Insurance_Controller;
use App\Http\Controllers\Api\Subscription_Controller;
use App\Http\Controllers\Api\Booking_Ride_Controller;
use App\Http\Controllers\Api\OTP_Controller;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\Payment_Controller;
use App\Http\Controllers\Api\Customer_Feedback_Controller;
use App\Http\Controllers\Api\Contact_Us_Controller;
use App\Http\Controllers\Api\Driver_Daily_Meter_Controller;
use App\Http\Controllers\Api\Timetable_Controller;
use App\Http\Controllers\Api\Notes_Controller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Un-Authenticated Routes
Route::group(['middleware' => 'api',], function ($router) {

    //Login API Customer
    Route::post('login_customer', [UserController::class, 'login_customer']);
    //Login API Driver
    Route::post('login_driver', [DriverController::class, 'login_driver']);
    Route::get('driver_data', [DriverController::class, 'driver_data']);
    Route::get('all_driver_data', [DriverController::class, 'all_driver_data']);
    Route::get('check_user_id', [DriverController::class, 'check_user_id']);
	 Route::get('editdriver', [DriverController::class, 'editdriver']);
	Route::post('updatedriver', [DriverController::class, 'updatedriver']);
    Route::post('register_driver', [DriverController::class, 'register_driver']);
    Route::get('driver_detail_by_auto_no', [DriverController::class, 'driver_detail_by_auto_no']);
    Route::get('storeFcmTokenDriver', [DriverController::class, 'storeFcmTokenDriver']);


    Route::get('customer_data', [UserController::class, 'customer_data']);
	Route::get('edit_customer', [UserController::class, 'editcustomer']);
	Route::post('update_customer', [UserController::class, 'update_customer']);
    Route::post('register_customer', [UserController::class, 'register_customer']);
    Route::post('forget_password_customer', [UserController::class, 'forget_password_customer']);
    Route::get('get_nominee_details', [UserController::class, 'get_nominee_details']);
    Route::post('update_nominee_details', [UserController::class, 'update_nominee_details']);






    //To Show Area Table List
    Route::get('all_data_show_area', [Area_Controller::class, 'all_data_show_area']);
    //Add Area
    Route::post('add_area', [Area_Controller::class, 'add_area']);
    //Update Area
    Route::post('update_added_area', [Area_Controller::class, 'update_added_area']);
    //Delete Area
    Route::get('destroy_area', [Area_Controller::class, 'destroy_area']);

    //To Show City Table List
    Route::get('all_data_show_city', [City_Controller::class, 'all_data_show_city']);
    //Add City
    Route::post('add_city', [City_Controller::class, 'add_city']);
    //Update City
    Route::post('update_added_city', [City_Controller::class, 'update_added_city']);
    //Delete City
    Route::get('destroy_city', [City_Controller::class, 'destroy_city']);

    //To Show Subscription Table List
    Route::get('all_data_show_subscription', [Subscription_Controller::class, 'all_data_show_subscription']);
    //Add Subscription
    Route::post('add_subscription', [Subscription_Controller::class, 'add_subscription']);
    //Update Subscription
    Route::post('update_added_subscription', [Subscription_Controller::class, 'update_added_subscription']);
    //Delete Subscription
    Route::get('destroy_subscription', [Subscription_Controller::class, 'destroy_subscription']);
    //Check past subscription avail or not
    Route::get('check_subscription_avail', [Subscription_Controller::class, 'check_subscription_avail']);

    // E_Pass of Perticullar Customer
    Route::post('create_e_pass', [E_Pass_Controller::class, 'create_e_pass']);
    Route::get('get_customer_e_pass', [E_Pass_Controller::class, 'get_customer_e_pass']);
    Route::get('download_e_pass', [E_Pass_Controller::class, 'download_e_pass'])->name('download_e_pass');

    //Insurance
    Route::get('get_monthly_insurance', [Monthly_Insurance_Controller::class, 'get_monthly_insurance']);
    Route::get('create_order_api', [Payment_Controller::class, 'create_order_api']);

    //Booking Ride
    Route::post('booking_ride_by_driver', [Booking_Ride_Controller::class, 'booking_ride_by_driver']);
    Route::post('booking_ride_by_customer', [Booking_Ride_Controller::class, 'booking_ride_by_customer']);
    Route::post('booking_ride', [Booking_Ride_Controller::class, 'booking_ride']);
    Route::get('get_customer_ride_history', [Booking_Ride_Controller::class, 'get_customer_ride_history']);
    Route::get('get_ride_confirmed_by_driver', [Booking_Ride_Controller::class, 'get_ride_confirmed_by_driver']);
    Route::get('all_ride_today', [Booking_Ride_Controller::class, 'all_ride_today']);
    Route::post('confirm_drop', [Booking_Ride_Controller::class, 'confirm_drop']);
    Route::post('confirm_ride', [Booking_Ride_Controller::class, 'confirm_ride']);
    Route::post('confirm_ride_back', [Booking_Ride_Controller::class, 'confirm_ride_back']);
    Route::get('get_driver_ride_history', [Booking_Ride_Controller::class, 'get_driver_ride_history']);
    Route::post('cancle_ride', [Booking_Ride_Controller::class, 'cancle_ride']);
    Route::get('cancle_ride_by_customer', [Booking_Ride_Controller::class, 'cancle_ride_by_customer']);
    Route::get('driver_scan_booking', [Booking_Ride_Controller::class, 'driver_scan_booking']);




    //OTP
    Route::get('generate_otp', [OTP_Controller::class, 'generate_otp']);


    //Driver_Daily_Meter_Controller
    Route::post('login_meter_data', [Driver_Daily_Meter_Controller::class, 'login_meter_data']);
    Route::get('check_login_meter_details', [Driver_Daily_Meter_Controller::class, 'check_login_meter_details']);
    Route::post('logout_meter_data', [Driver_Daily_Meter_Controller::class, 'logout_meter_data']);
    Route::get('get_total_month_payment', [Payment_Controller::class, 'get_total_month_payment']);

   
    Route::post('send_feedback', [Customer_Feedback_Controller::class, 'send_feedback']);
    //Contact Us 
    Route::get('all_contactus_data', [Contact_Us_Controller::class, 'all_contactus_data']);
	Route::get('getTimeTable', [Timetable_Controller::class, 'getTimeTable']);

    //Notes
	Route::get('get_notes', [Notes_Controller::class, 'get_notes']);
    Route::get('storeCustomerFcm', [UserController::class, 'storeCustomerFcm']);
    
});