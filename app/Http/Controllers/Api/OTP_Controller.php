<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OTP_Controller extends Controller
{
    public function generate_otp(Request $request)
    {
        try {
            
            $otp=rand(100000,999999);
            // $otp=123456;
            $name='Sir/Mam';
            $msg='Dear Sir/Mam, Your otp is '.$otp.' Send by Myatoz';
            $msg=urlencode($msg);
            $to=$request->mobile_number;  
            $data="uname=habitm1&pwd=habitm1&senderid=MYTOZS&to=".$to."&msg=$msg&route=T&peid=1701164578297290556&tempid=1707164629304455949";
            $ch = curl_init('https://bulksms.webmediaindia.com/sendsms?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            return response()->json(['data'=>$otp,'status'=>200]);

            // all good
        } catch (\Exception $e) {
            return response()->json(['data'=>0,'status'=>201]);

        }
    }

}
