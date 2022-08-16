<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Notes;
use Illuminate\Support\Facades\DB;

class Notes_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.notes') == 1)
            {        
           $All_Notes = Add_Notes::where('deleted_at', NULL)->get();
           
            return view('admin.notes.index', compact('All_Notes'));

        }
        else
        return redirect('/');
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
    public function store(Request $request)
    {

        $validator = $request->validate([
            'english_notes' => 'required',
            'hindi_notes' => 'required',
           
        ]);
        

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'english_notes'=>$data1['english_notes'],
                'hindi_notes'=>$data1['hindi_notes'],
                'created_at'=>date('Y-m-d H:i:s')
            );

            
            // dd($data);  
            $notes = Add_Notes::insertGetId($data);
            //dd($area);
            if($notes) {
                return redirect("notes")->with('success', 'Notes successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("notes")->with('error', 'Notes not added successfully');

        }
    }

    public function edit($id){
        if(session()->get('login_data.notes') == 1)
            {   
    	$notes = Add_Notes::findOrFail($id);
    
        return view('admin.notes.edit', compact('notes'));
            }
            else
            return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'english_notes' => 'required',
            'hindi_notes' => 'required',
           
        ]);
        
        $notes = Add_Notes::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $notesUpdated = $notes->update($data);
            if($notesUpdated) {
                
                return redirect("notes")->with('success', 'Notes updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("notes")->with('error', 'Notes not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }
    public function destroy($id)
    {
        try
            {
                $data = Add_Notes::find($id)->delete();
                return redirect("notes")->with('success', 'Notes deleted successfully');
            } 
        catch (\Exception $e) 
            {
                return redirect("notes")->with('error', 'Notes not deleted successfully');
            } 
    }
}
