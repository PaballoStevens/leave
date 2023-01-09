@extends('staff/layout/staff')

@section('content')
<div class="pd-ltr-20">
	<div class="row pb-10">
		<a href="/staff/apply_leave" class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<div class="card-box height-100-p widget-style3">
				<div class="d-flex flex-wrap">
					<div class="widget-data">
						<div class="weight-700 font-24 text-dark">Apply Leave</div>
						<div class="font-14 text-secondary weight-500"></div>
					</div>
					<div class="widget-icon">
						<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
					</div>
				</div>
			</div>
		</a>
		<a href="/staff/leave_history" class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<div class="card-box height-100-p widget-style3">
				<div class="d-flex flex-wrap">
					<div class="widget-data">
						
						<div class="weight-700 font-24 text-dark">Leave History</div>
						<div class="font-14 text-secondary weight-500"></div>
					</div>
					<div class="widget-icon">
						<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
					</div>
				</div>
			</div>
		</a>
	</div>
	
	<div class="row">
		<div class="col-lg-4 col-md-6 mb-20">
			<div class="card-box height-100-p pd-20 min-height-200px">
				<div class="d-flex justify-content-between pb-10">
					<div class="h5 mb-0">Unit Leaders</div>
					<div class="table-actions">
						<a title="VIEW" href="staff.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
					</div>
				</div>
				<div class="user-list">
					<ul>
						<li class="d-flex align-items-center justify-content-between">
							<div class="name-avatar d-flex align-items-center pr-2">
								<div class="avatar mr-2 flex-shrink-0">
									<img src="" class="border-radius-100 box-shadow" width="50" height="50" alt="">
								</div>
								<div class="txt">
									<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"></span>
									<div class="font-14 weight-600"></div>
									<div class="font-12 weight-500" data-color="#b2b1b6"></div>
								</div>
							</div>
							<div class="font-12 weight-500" data-color="#17a2b8"></div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 mb-20">
			<div class="card-box height-100-p pd-20 min-height-200px">
				<div class="d-flex justify-content-between">
					<div class="h5 mb-0">Leave Days Remaining</div>
					<div class="table-actions">
						<a title="VIEW" href="/Staff"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
					</div>
				</div>
				@if (Auth::user()->Av_leave > 0)
				<h1 style="text-align: center; color:green;margin-top: 15px;">{{Auth::user()->Av_leave}} Days <span> Remaining</span></h1>
				@else
				<h1 style="text-align: center; color:red">{{Auth::user()->Av_leave}} Days <span> Remaining</span></h1>
				@endif
                
			</div>
		</div>
		<div class="col-lg-4 col-md-6 mb-20">
			<div class="card-box height-100-p pd-20 min-height-200px">
				<div class="d-flex justify-content-between">
					<div class="h5 mb-0">Staff</div>
					<div class="table-actions">
						<a title="VIEW" href="/Staff/view_staff"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
					</div>
				</div>

				<div class="user-list">
					<?php $staff = App\Models\User::select(['id','FirstName', 'LastName','avatar','email','Department', 'Phonenumber', 'user_type'])->paginate(3); ?>
					@foreach ($staff as $item)
					@if ($item->user_type == 'Staff')
					@if ($item->id == Auth::user()->id)
					<ul>
						<li class="d-flex align-items-center justify-content-between">
					<div class="name-avatar d-flex align-items-center pr-2">
						<div class="avatar mr-2 flex-shrink-0">
							<img src="/uploads/avatars/{{$item->avatar}}" class="border-radius-100 box-shadow" width="50" height="50" alt="">
						</div>
						<div class="txt">
							<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">{{$item->Department}}</span>
							<div class="font-14 weight-600">Me</div>
						</div>
					</div>
					<div class="font-12 weight-500" data-color="#17a2b8">{{$item->email}}</div>
				</li>
					</ul>
					@else
					<ul>
						<li class="d-flex align-items-center justify-content-between">
					<div class="name-avatar d-flex align-items-center pr-2">
						<div class="avatar mr-2 flex-shrink-0">
							<img src="/uploads/avatars/{{$item->avatar}}" class="border-radius-100 box-shadow" width="50" height="50" alt="">
						</div>
						<div class="txt">
							<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">{{$item->Department}}</span>
							<div class="font-14 weight-600">{{$item->FirstName}} {{$item->LastName}}</div>
							<div class="font-12 weight-500" data-color="#b2b1b6">{{$item->Phonenumber}}</div>
						</div>
					</div>
					<div class="font-12 weight-500" data-color="#17a2b8">{{$item->email}}</div>
				</li>
					</ul>
					@endif
					
					@else
						
					@endif
					
					@endforeach
					
				</div>
			</div>
		</div>
	</div>

	<div class="card-box mb-30">
		<div class="pd-20">
			<h2 class="text-blue h4">LEAVE HISTORY</h2>
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
							  <a title="VIEW" href="/staff/view_leave/{{$result->id}}" data-color="#265ed7"><i class="icon-copy dw dw-eye"></i></a>
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
	
