<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer_Feedback;

class Customer_Feedback_Controller extends Controller
{
    public function send_feedback(Request $request){
        try {
            
            $data1 = $request->all();
            $data=array(
                'driver_id'=>$data1['driver_id'],
                'customer_id'=>$data1['customer_id'],
                'auto_no'=>$data1['auto_no'],
                'message'=>$data1['message'],
                'created_at'=>date('Y-m-d H:i:s'),
            );

            
            // dd($data);  
            $feedback = Customer_Feedback::insertGetId($data);

            if($feedback) {
            return response()->json(1);
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return response()->json(0);
        }
    }
}
