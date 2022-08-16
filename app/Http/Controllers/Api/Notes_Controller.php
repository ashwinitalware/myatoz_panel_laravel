<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Notes;
use Illuminate\Support\Facades\DB;

class Notes_Controller extends Controller
{
    public function get_notes()
    {
        try {            
                
           $All_Notes = Add_Notes::where('deleted_at', NULL)->first();
           if($All_Notes)
           return response()->json(['data'=>$All_Notes,'status'=>200]);
           else
           return response()->json(['status'=>201]);
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
}
