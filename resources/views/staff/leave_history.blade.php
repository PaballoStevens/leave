@extends('staff/layout/staff')

@section('content')
<div class="pd-ltr-20">
	<div class="title pb-20">
		<h2 class="h3 mb-0">Leave Breakdown</h2>
	</div>
	<div class="row pb-10">
		<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<div class="card-box height-100-p widget-style3">
              <?php 
				$all = DB::table('users')
                 ->join('Leaves', 'users.id', '=' , 'Leaves.empid')
				 ->where('Leaves.empid', '=', Auth::user()->id)
				 ->count();
				?>
				
				<div class="d-flex flex-wrap">
					<div class="widget-data">
						<div class="weight-700 font-24 text-dark">{{$all}}</div>
						<div class="font-14 text-secondary weight-500">All Applied Leave</div>
					</div>
					<div class="widget-icon">
						<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<div class="card-box height-100-p widget-style3"> 
				<?php
				$status=1; 
				$Approve = DB::select('select L.empid,L.Status from leaves L Join users where L.empid = users.id AND L.Status = 1');
				$Approved = count($Approve);
				?>
				<div class="d-flex flex-wrap">
					<div class="widget-data">
						
						<div class="weight-700 font-24 text-dark">{{$Approved}}</div>
						<div class="font-14 text-secondary weight-500">Approved</div>
					</div>
					<div class="widget-icon">
						<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<div class="card-box height-100-p widget-style3">
				<?php
				$pending = DB::select('select L.empid,L.Status from leaves L Join users where L.empid = users.id AND L.Status = 0');
				$Pending = count($pending);
				?>
				<div class="d-flex flex-wrap">
					<div class="widget-data">
						<div class="weight-700 font-24 text-dark">{{$Pending}}</div>
						<div class="font-14 text-secondary weight-500">Pending</div>
					</div>
					<div class="widget-icon">
						<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<div class="card-box height-100-p widget-style3">

				<?php
				$Reject = DB::select('select L.empid,L.Status from leaves L Join users where L.empid = users.id AND L.Status = 2');
				$Rejected = count($Reject);
				?>

				<div class="d-flex flex-wrap">
					<div class="widget-data">
						<div class="weight-700 font-24 text-dark">{{$Rejected}}</div>
						<div class="font-14 text-secondary weight-500">Rejected</div>
					</div>
					<div class="widget-icon">
						<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card-box mb-30">
		<div class="pd-20">
			<h2 class="text-blue h4">ALL MY LEAVE</h2>
		</div>
		<div class="pb-20">
			<table class="data-table table stripe hover nowrap">
				<thead>
					<tr>
						<th class="table-plus">LEAVE TYPE</th>
						<th>DATE FROM</th>
						<th>DATE TO</th>
						<th>NO. OF DAYS</th>
						<th>ADM. STATUS</th>
						<th class="datatable-nosort">ACTION</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($leaves as $result)
					<tr>
						<td>{{$result->Leavetype}}</td>
						<td>{{$result->FromDate}}</td>
						<td>{{$result->ToDate}}</td>
						<td>{{$result->num_days}}</td>
						<td>@if ($result->Status == '1')
							<span style="color: green">Approved</span>
						@elseif($result->Status == '2')
							<span style="color: red">Not Approved</span>
						@elseif($result->Status == '0')
							<span style="color: blue">Pending</span>
						@else
							
						@endif
							 
						  </td>
						 <td>
							<div class="table-actions">
							  <a title="VIEW" href="view_leave/{{$result->id}}" data-color="#265ed7"><i class="icon-copy dw dw-eye"></i></a>
							</div>
						 </td>
				  </tr>
					@endforeach
					 
				</tbody>
			</table>
	   </div>
	</div>
</div>

@endsection
		
	