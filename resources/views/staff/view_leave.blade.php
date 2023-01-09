@extends('staff/layout/staff')

@section('content')
<style>
	input[type="text"]
	{
	    font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	.btn-outline:hover {
	  color: #fff;
	  background-color: #524d7d;
	  border-color: #524d7d; 
	}

	textarea { 
		font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	textarea.text_area{
        height: 8em;
        font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
      }

	</style>

<div class="pd-ltr-20">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>LEAVE DETAILS</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leave</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Leave Details</h4>
                    <p class="mb-20"></p>
                </div>
            </div>
            
                 
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Full Name</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="{{$leave->FirstName}} {{$leave->LastName}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Email Address</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="{{$leave->email}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Gender</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="{{$leave->Gender}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Phone Number</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="{{$leave->Phonenumber}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Leave Type</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="{{$leave->Leavetype}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Applied Date</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="{{ \Carbon\Carbon::parse($leave->created_at)->format( 'd F Y')}}">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Applied No. of Days</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly name="num_days" value="{{$leave->num_days}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Available No. of Days</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly name="v_leave" value="{{$leave->Av_leave}} ">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Leave Period</b></label>
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="{{$leave->FromDate}} - {{$leave->ToDate}}">
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                        <label style="font-size:16px;" class="col-sm-12 col-md-2 col-form-label"><b>Leave Reason</b></label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name=""class="form-control text_area" readonly type="text">{{$leave->Description}}</textarea>
                        </div>
                </div>
                <div class="form-group row">
                        <label style="font-size:16px;" class="col-sm-12 col-md-2 col-form-label"><b>Waiting Remarks</b></label>
                        <div class="col-sm-12 col-md-10">
                            @if ($leave->AdminRemark == ""):
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value=" Waiting for Approval">
                            @else
                            <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="{{$leave->AdminRemark}}">
                            @endif
                              
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                           <label style="font-size:16px;"><b>Action Taken Date</b></label>
                             @if ($leave->AdminRemarkDate == "")
                             <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="NA">
                             @else
                             <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="{{$leave->AdminRemarkDate}}">
                             @endif
                              
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label style="font-size:16px;"><b>Leave Status From Admin</b></label>
                              @if ($leave->Status == '1')
                              <input type="text" style="color: green;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="Approved"> 
                              @elseif($leave->Status == '2')
                              <input type="text" style="color: red; font-size: 16px;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="Rejected">
                              @elseif($leave->Status == '0')
                              <input type="text" style="color: blue;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="Pending">
                              @else
                                  
                              @endif
                              
                        </div>
                    </div>
                   
                    <div class="col-md-3">
                        <div class="form-group">
                            <label style="font-size:16px;"><b></b></label>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-primary" id="action_take" data-toggle="modal" data-target="#success-modal">Take&nbsp;Action</button>
                            </div>
                        </div>
                    </div>
                    
                    <form action="/admin/leave_details" method="post">
                        @csrf
                          <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center font-18">
                                        <h4 class="mb-20">Leave take action</h4>
                                        <input type="hidden" name="id" value="{{$leave->id}}"/>
                                        <select name="Status" required class="custom-select form-control">
                                            <option value="">Choose your option</option>
                                                  <option value="1">Approved</option>
                                                  <option value="2">Rejected</option>
                                        </select>

                                        <div class="form-group">
                                            <label></label>
                                            <textarea id="textarea1" name="AdminRemark" class="form-control" required placeholder="Description" length="300" maxlength="300"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="Av_leave" value="{{$leave->Av_leave}}">
                                    <input type="hidden" name="num_days" value="{{$leave->num_days}}">
                                    <input type="hidden" name="empid" value="{{$leave->empid}}"> 
                                </div>
                            </div>
                        </div>
                      </form>
                </div>
        </div>

    </div>
</div>  
@endsection


