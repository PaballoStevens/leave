@extends('staff/layout/staff')

@section('content')

		<div class="pb-20">	
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Leave Application</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Apply for Leave</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				
				<div class="row pb-10">
					<div class="col-xl-3 col-lg-3 col-md-6 mb-30">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{Auth::user()->Av_leave}}</div>
									<div class="font-14 text-secondary weight-500">Available Leave Days</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
                @if (session('status'))
				     <h3 style="color:green; font-weight: bold ; text-align:center">{{ session('status') }}</h3>
					 <br>
				@elseif(session('error'))
				     <h3 style="color:red; font-weight: bold ; text-align:center">{{ session('error') }}</h3>
					 <br>
				@else
					
				@endif
				<div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Staff Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="apply_leave">
							@csrf
							<section>
								@if (Auth::user()->user_type == 'Staff')
									
											<input name="empid" type="hidden" class="form-control wizard-required" required="true" readonly autocomplete="off" value="{{Auth::user()->id}}">
											<input name="Av_leave" type="hidden" class="form-control wizard-required" required="true" readonly autocomplete="off" value="{{Auth::user()->Av_leave}}">
								@else
									<h1>Error</h1>
								@endif
								@if (Auth::user()->Av_leave > 0)
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Leave Type :</label>
											<select name="Leavetype" class="custom-select form-control" required="true" autocomplete="off">
												<?php $leave_type = App\Models\leavetype::select(['leavetype'])->get(); ?>
											<option >Select leave type...</option>
											@foreach ($leave_type as $item)
											 <option value="{{$item->leavetype}}">{{$item->leavetype}}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Start Leave Date :</label>
											<input name="FromDate" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>End Leave Date :</label>
											<input name="ToDate" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Reason For Leave :</label>
											<textarea id="textarea1" name="Description" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"></textarea>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" type="submit" data-toggle="modal">Apply&nbsp;Leave</button>
											</div>
										</div>
									</div>
								</div>
								@else
									<h4 style="text-align: center;color:red">You have 0 days Remaining</h4>
								@endif
								
							</section>
						</form>
					</div>
				</div>

			</div>
			
		</div>

	
@endsection