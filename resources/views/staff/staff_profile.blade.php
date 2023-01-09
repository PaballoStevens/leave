@extends('staff/layout/staff')

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="title">
						<h4>Profile</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="admin_dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Profile</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
				<div class="pd-20 card-box height-100-p">
					<div class="profile-photo">
						<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
						<img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="" class="avatar-photo">
						<form method="post" enctype="multipart/form-data">
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="weight-500 col-md-12 pd-5">
											<div class="form-group">
												<div class="custom-file">
													<input name="image" id="file" type="file" class="custom-file-input" accept="image/*" onchange="validateImage('file')">
													<label class="custom-file-label" for="file" id="selector">Choose file</label>		
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" name="update_image" value="Update" class="btn btn-primary">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<h5 class="text-center h5 mb-0">{{Auth::user()->FirstName}} {{Auth::user()->LastName}}</h5>
					<p class="text-center text-muted font-14">{{Auth::user()->DepartmentName}}</p>
					<div class="profile-info">
						<h5 class="mb-20 h5 text-blue">Contact Information</h5>
						<ul>
							<li>
								<span>Email Address:</span>
								{{Auth::user()->email}}
							</li>
							<li>
								<span>Phone Number:</span>
								{{Auth::user()->Phonenumber}}
							</li>
							<li>
								<span>My Role:</span>
								{{Auth::user()->user_type}}
							</li>
							<li>
								<span>Address:</span>
								{{Auth::user()->Address}}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
				<div class="card-box height-100-p overflow-hidden">
					<div class="profile-tab height-100-p">
						<div class="tab height-100-p">
							<ul class="nav nav-tabs customtab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Leave Records</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
								</li>
							</ul>
							<div class="tab-content">
								<!-- Timeline Tab start -->
								<div class="tab-pane fade show active" id="timeline" role="tabpanel">
									<div class="pd-20">
										@foreach ($leaves as $item)
										<div class="profile-timeline">
											<div class="timeline-month">
												<h5>{{ \Carbon\Carbon::parse($item->created_at)->format( 'd F Y')}}</h5>
											</div>
											<div class="profile-timeline-list">
												<ul>
													
													<li>
														<div class="date">{{$item->num_days}} Days</div>
														<div class="task-name"><i class="ion-ios-chatboxes"></i>{{$item->Leavetype}}</div>
														<p>{{$item->Description}}</p>

														<div class="task-time">
																@if ($item->Status == '1')
																 <span style="color: green">Approved</span>
																@elseif ($item->Status == '2')
																 <span style="color: red">Not Approved</span>
																@elseif($item->Status == '0')
																 <span style="color: blue">Pending</span>
																 @else

																@endif
															  
														</div>
													</li>	
												</ul>
											</div>
										
										</div>
										@endforeach
										
									</div>
								</div>
								<!-- Timeline Tab End -->
								<!-- Setting Tab start -->
								<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
									<div class="profile-setting">
										<form method="POST" enctype="multipart/form-data">
											<div class="profile-edit-list row">
												<div class="col-md-12"><h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4></div>

												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>First Name</label>
														<input name="fname" class="form-control form-control-lg" type="text" required="true" autocomplete="off" value="{{Auth::user()->FirstName}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>Last Name</label>
														<input name="lastname" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="{{Auth::user()->LastName}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>Email Address</label>
														<input name="email" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="{{Auth::user()->email}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>Phone Number</label>
														<input name="phonenumber" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="{{Auth::user()->Phonenumber}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>Date Of Birth</label>
														<input name="dob" class="form-control form-control-lg date-picker" type="text" placeholder="" required="true" autocomplete="off" value="{{Auth::user()->Dob}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>Gender</label>
														<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
														<option value="{{Auth::user()->Gender}}">{{Auth::user()->Gender}}</option>
															<option value="male">Male</option>
															<option value="female">Female</option>
														</select>
													</div>
												</div>
												<div class="weight-500 col-md-6">
													
													<div class="form-group">
														<label>Address</label>
														<input name="address" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="{{Auth::user()->Address}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label>Department</label>
														<select name="department" class="custom-select form-control" required="true" autocomplete="off">
															<?php $department = App\Models\Department::select(['DepartmentName', 'DepartmentShortName'])->get(); ?>
															<option value="{{Auth::user()->DepartmentName}}">{{Auth::user()->DepartmentName}}</option>
															@foreach ($department as $item)
															 <option value="{{$item->DepartmentShortName}}">{{$item->DepartmentShortName}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="weight-500 col-md-6">
													
													<div class="form-group">
														<label>Available Leave Days</label>
														<input class="form-control form-control-lg" type="text" required="true" autocomplete="off" readonly value="{{Auth::user()->Av_leave}}">
													</div>
												</div>
												<div class="weight-500 col-md-6">
													<div class="form-group">
														<label></label>
														<div class="modal-footer justify-content-center">
															<button class="btn btn-primary" name="new_update" id="new_update" data-toggle="modal">Save & &nbsp;Update</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- Setting Tab End -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<script type="text/javascript">
	var loader = function(e) {
		let file = e.target.files;

		let show = "<span>Selected file : </span>" + file[0].name;
		let output = document.getElementById("selector");
		output.innerHTML = show;
		output.classList.add("active");
	};

	let fileInput = document.getElementById("file");
	fileInput.addEventListener("change", loader);
</script>
<script type="text/javascript">
	 function validateImage(id) {
		var formData = new FormData();
		var file = document.getElementById(id).files[0];
		formData.append("Filedata", file);
		var t = file.type.split('/').pop().toLowerCase();
		if (t != "jpeg" && t != "jpg" && t != "png") {
			alert('Please select a valid image file');
			document.getElementById(id).value = '';
			return false;
		}
		if (file.size > 1050000) {
			alert('Max Upload size is 1MB only');
			document.getElementById(id).value = '';
			return false;
		}

		return true;
	}
</script>
@endsection

	
