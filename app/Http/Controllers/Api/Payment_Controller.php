<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver_Daily_Meter_Details;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Razorpay\Api\Api;

class Payment_Controller extends Controller
{
    public function create_order_api(Request $request)
	{
		$api = new Api('rzp_live_t2BT3TW3K9wBZb', '8dBvwr6xj0d3KUf60F0L1RKW');
        //$api = new Api('rzp_test_partner_I9Vq1G7olyQmeg', 'iO9wHBLDrbkMW2jjO38IQITv');
		$order  = $api->order->create([
			'receipt' => 'order_rcptid_11',
			'amount'  => $request->amount * 100,
			'currency' => 'INR',
			'payment_capture' => 1,
		]);
		return response()->json($order->id);
	} 

	public function get_total_month_payment(Request $request)
	{
		if($request->date)
		{
			$date=$request->date;
		}
		else
		{
			$date=date('Y-m-d');
		}

			$driver_payment['months'] = Driver_Daily_Meter_Details::where('deleted_at', Null)
									->where('driver_id', $request->driver_id)
									->orderBy('login_day_date','DESC')
									->select('login_day_date',  DB::raw('YEAR(login_day_date) year, MONTH(login_day_date) month'))
									->groupBy('year','month')
									->get();

			$driver_payment['current_month']=date('M Y',strtotime($date));

			$driver_payment['total_amount'] = Driver_Daily_Meter_Details::where('deleted_at', Null)->whereMonth('login_day_date',date('m',strtotime($date)))->whereYear('login_day_date',date('Y',strtotime($date)))->where('driver_id', $request->driver_id)->sum('total_amount');
			$driver_payment['total_run_km'] = Driver_Daily_Meter_Details::where('deleted_at', Null)->whereMonth('login_day_date',date('m',strtotime($date)))->whereYear('login_day_date',date('Y',strtotime($date)))->where('driver_id', $request->driver_id)->sum('total_run_km');
			$driver_payment['this_month_rides'] = Driver_Daily_Meter_Details::with('driver_details')->where('deleted_at', Null)->whereMonth('login_day_date',date('m',strtotime($date)))->whereYear('login_day_date',date('Y',strtotime($date)))->where('driver_id', $request->driver_id)->latest()->get();
		
		if($driver_payment['this_month_rides'])
		{
		return response()->json(['data' => $driver_payment,'status'=>200]);	
		}
		else
		{
		return response()->json(['data' => $driver_payment,'status'=>201]);
		}


	}
}
