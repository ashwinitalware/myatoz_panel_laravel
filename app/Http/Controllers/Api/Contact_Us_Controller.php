<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Contact_Us;
use Illuminate\Support\Facades\DB;

class Contact_Us_Controller extends Controller
{
    public function all_contactus_data()
    {
        try {            
                
            $data = Add_Contact_Us::where('deleted_at', NULL)->get();
           
            return response()->json(['data'=>$data,'status'=>200]);
            
        } catch (Exception $e) {
            
            return response()->json(['status'=>201]);
        }
    }
}
