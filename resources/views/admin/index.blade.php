@include('admin/layout/header')

<body>
	

	@include('admin/layout/navbar')

	@include('admin/layout/right_sidebar')

	@include('admin/layout/left_sidebar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
			<div class="title pb-20">
				<h2 class="h3 mb-0">Data Information</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<?php
						$Staff = DB::table('users')
						->where('user_type', '=', 'Staff' )
						->count();
						?>
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{$Staff}}</div>
								<div class="font-14 text-secondary weight-500">Total Staffs</div>
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
						$Approved = DB::table('leaves')
						->where('Status', '=', 1 )
						->count();
						?>
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{$Approved}}</div>
								<div class="font-14 text-secondary weight-500">Approved Leave</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<?php
						$Pending = DB::table('leaves')
						->where('Status', '=', 0 )
						->count();
						?>
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{$Pending}}</div>
								<div class="font-14 text-secondary weight-500">Pending Leave</div>
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
						$rejected = DB::table('leaves')
						->where('Status', '=', 2 )
						->count()
						?>
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">{{$rejected}} </div>
								<div class="font-14 text-secondary weight-500">Rejected Leave</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Department Heads</div>
							<div class="table-actions">
								<a title="VIEW" href="staff"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
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
											<div class="font-14 weight-600"> </div>
											<div class="font-12 weight-500" data-color="#b2b1b6"> </div>
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
							<div class="h5 mb-0">Staff</div>
							<div class="table-actions">
								<a title="VIEW" href="/admin/staff"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
							</div>
						</div>

						<div class="user-list">
							<?php $staff = App\Models\User::select(['FirstName', 'LastName','avatar','email','Department', 'Phonenumber', 'user_type'])->paginate(5); ?>
							@foreach ($staff as $item)
							@if ($item->user_type == 'Staff')
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
							@else
								
							@endif
							
							@endforeach
							
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">LATEST LEAVE APPLICATIONS</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">STAFF NAME</th>
								<th>LEAVE TYPE</th>
								<th>APPLIED DATE</th>
								<th>STATUS</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pending as $item)
							@if ($item->Status == '0')
							<tr>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="/uploads/avatars/{{$item->avatar}}" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600">{{$item->FirstName}} {{$item->LastName}}</div>
										</div>
									</div>
								</td>
								<td>{{$item->Leavetype}}</td>
								<td>{{ \Carbon\Carbon::parse($item->created_at)->format( 'd F Y')}}</td>
								<td> @if ($item->Status == '0')
									<span style="color: blue">Pending</span>
								@else
									
								@endif
								</td>
								<td>
									<div class="table-actions">
										<a title="VIEW" href="/admin/leave_details/{{$item->id}}"><i class="dw dw-eye" data-color="#265ed7"></i></a>	
									</div>
								</td>
							</tr> 
							@else
								
							@endif
							
							@endforeach
							
						</tbody>
					</table>
			   </div>
			</div>
		</div>
	</div>
	<!-- js -->

	@include('admin/layout/scripts')
</body>
</html>