<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Department;
use App\Models\leavetype;
use App\Models\leaves;
use App\Models\User;
use DB;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() {
        $pending = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->get(); 
        
        return view('/admin/index', compact('pending'));
    }
       /* staff */
    public function view_staff(){
        return view('/admin/staff');
    }

     /* Department */
    public function add_department(){
        $department = Department::select(['id', 'DepartmentName', 'DepartmentShortName'])->get();
        return view('/admin/department', compact('department'));
       
    }

    public function department_store(Request $request) {
        Department::create($request->except('_token'));
        return redirect()->back()->with('status','User was successfully added');
    }

    public function department_edit($id) {
        $department = Department::find($id);
       return view('/admin/edit_department', compact('department'));
    }

    public function department_update(Request $request) {
        $id = $request->input('id');
        $departmentname = $request->input('departmentname');
        $departmentshortname = $request->input('departmentshortname');
        
        DB::update("update departments set departmentname = '$departmentname', departmentshortname = '$departmentshortname' where id = '$id'");
        return redirect()->back()->with('status','Post was successfully Updated');
    }

    public function department_delete($id) {
        $department = Department::find($id);
        $department_id = $department->id;
        DB::table('departments')->where('id', '=', $department->id)->delete();
        return redirect()->back()->with('status','Post was successfully delete');
    }




    /*Leaves */
    public function leaves(){
        $leaves = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->get(); 
        return view('/admin/leaves', compact('leaves'));
        
    }

    /**Leave_Type */

    public function leave_type(){
        $leavetype = leavetype::select(['id','leavetype','description','date_from', 'date_to'])->get();
        return view('/admin/leave_type', compact('leavetype'));
    }
    
    public function leave_store(Request $request){
        leavetype::create($request->except('_token'));
        return redirect()->back()->with('status','User was successfully added');
    }

    public function leave_edit($id) {
        $leave = leavetype::find($id);
       return view('/admin/edit_leave_type', compact('leave'));
    }

    public function leave_update(Request $request) {
        $id = $request->input('id');
        $leavetype = $request->input('leavetype');
        $description = $request->input('description');
        $date_from = $request->input('date_to');
        $date_to = $request->input('date_to');
        
        DB::update("update leavetypes set leavetype = '$leavetype', description = '$description', date_from = '$date_from', date_to = '$date_to' where id = '$id'");
        return redirect()->back()->with('status','Leave was successfully Updated');
    }

    public function leave_delete($id) {
        $leave = leavetype::find($id);
        $leave_id = $leave->id;
        DB::table('leavetypes')->where('id', '=', $leave->id)->delete();
        return redirect()->back()->with('status','Leave was successfully delete');
    }
    

    /**Pending Leaves  */
    public function pending_leave(){
        $pending = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->get(); 
        return view('/admin/pending_leave', compact('pending'));
    }

    /**Approved Leaves */
    public function approved_leave(){
        $approved = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->get(); 
        return view('/admin/approved_leave', compact('approved'));
    }

    /**Rejected Leaves */
    public function rejected_leave(){
        $rejected = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->get();
        return view('/admin/rejected_leave' , compact('rejected'));
    }

    /**Leave_details */
    public function leave_details($id){
        $leave = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->where('Leaves.id', '=', $id)
        ->get();
        foreach($leave as $leave)

       return view('/admin/leave_details', compact('leave'));
    }

    public function leave_details_update(Request $request){
        $current = Carbon::now();
        
        $id = $request->input('id');
        $Status = $request->input('Status');
        $AdminRemark = $request->input('AdminRemark');
        $AdminRemarkDate = $request->$current = Carbon::now();

        DB::update("update leaves set Status = '$Status', AdminRemark = '$AdminRemark' , AdminRemarkDate = '$AdminRemarkDate' where id = '$id'");

        if ($Status =='1') {
            $Av_leave = $request->input('Av_leave');
            $num_days = $request->input('num_days');
            $empid = $request->input('empid');
            $REMLEAVE = $Av_leave - $num_days;
            DB::update("update users set Av_leave = '$REMLEAVE' where id = '$empid'");
        } else {
            # code...
        } 
        if($Status =='1'){
            $email = $request->input('email'); 
            $name = $request->input('name');
            $details = [
           'title' => 'Geekulcha',
           'body' =>  $name,
           ];
      
          \Mail::to($email)->send(new \App\Mail\ApprovedMail($details));
      
        }elseif($Status =='2'){
            $email = $request->input('email'); 
            $name = $request->input('name');
            $Dear = 'Dear';
            $details = [
           'title' => 'Geekulcha',
           'body' => $name,
           ];
      
          \Mail::to($email)->send(new \App\Mail\RejectedMail($details));
      
        }else{

        }
        
      return redirect()->back()->with('status','Leave_details were successfully Updated');
     
    }

    
}
