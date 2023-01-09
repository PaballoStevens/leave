<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaves;
use App\Models\User;
use Auth;
use DB;

class StaffController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;   
        $leaves = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->where('Leaves.empid', '=', $user->id )
        ->get(); 
        return view('staff/index', compact('leaves'));
    }

    public function apply_leave(){
        return view('staff/apply_leave');
    }

    public function leave_store(Request $request){
        $DF = date_create($request['FromDate']);
		$DT = date_create($request['ToDate']);

		$diff =  date_diff($DF , $DT );
		$num_days = (1 + $diff->format("%a"));
        $Av_leave = $request->input('Av_leave');
        $FromDate = strtotime($request->FromDate);
        $ToDate = strtotime($request->ToDate);
       if ($FromDate < $ToDate) {
        
        if ($Av_leave > $num_days) {
            $leaves = new Leaves;
            $leaves ->Leavetype = $request->input('Leavetype');
             $leaves ->ToDate = $request->input('ToDate');
            $leaves ->FromDate = $request->input('FromDate');
            $leaves ->Description = $request->input('Description');
            $leaves ->empid = $request->input('empid');
            $leaves ->num_days = $request->$num_days = (1 + $diff->format("%a"));
            $leaves ->save();
          return redirect()->back()->with('status','Your request has been successfully sent');
        }else {
            return redirect()->back()->with('error','You have requested more days than you have..');
        }
    } else {
        return redirect()->back()->with('error','Check your dates');
    }
       
        
    }

    public function leave_history() {
        $user = Auth::user();
        $user_id = $user->id;
        $leaves = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->where('Leaves.empid', '=', $user->id )
        ->get(); 
        return view('staff/leave_history', compact('leaves'));
    }

    public function staff_profile(){
        $user = Auth::user();
        $user_id = $user->id;
        $leaves = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->where('Leaves.empid', '=', $user->id )
        ->get();
        return view('staff/staff_profile', compact('leaves'));
    }

    public function view_leave($id){
        $leave = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->where('Leaves.id', '=', $id)
        ->get();
        foreach($leave as $leave)
       return view('staff/view_leave', compact('leave'));  
    }

    public function staff(){
        
       return view('Staff/view_staff');  
    }
    
}
