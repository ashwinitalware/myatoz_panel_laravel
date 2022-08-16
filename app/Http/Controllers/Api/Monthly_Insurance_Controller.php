<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Add_Monthly_Insurance;
use Illuminate\Http\Request;

class Monthly_Insurance_Controller extends Controller
{
    public function get_monthly_insurance()
    {
        try {            
                
            $data = Add_Monthly_Insurance::where('deleted_at', NULL)->first();
            return response()->json($data);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
}
