@extends('staff/layout/staff')

@section('content')
<div class="pd-ltr-20">
    <div class="title pb-20">
        <h2 class="h3 mb-0"></h2>
    </div>
    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <?php 
				$total = DB::table('users')
				 ->count()
				?>
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{$total}}</div>
                        <div class="font-14 text-secondary weight-500">Total Employees</div>
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
				$staff = DB::table('users')
                ->where('user_type', '=', 'Staff')
				 ->count()
				?>

                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{$staff}}</div>
                        <div class="font-14 text-secondary weight-500">Staffs</div>
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
				$hod = DB::table('users')
                ->where('user_type', '=', 'HOD')
				 ->count()
				?>

                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{$hod}}</div>
                        <div class="font-14 text-secondary weight-500">Department Heads</div>
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
				$admin = DB::table('users')
                ->where('user_type', '=', 'admin')
				 ->count()
				?>

                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{$admin}}</div>
                        <div class="font-14 text-secondary weight-500">Administrators</div>
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
                <h2 class="text-blue h4">ALL EMPLOYEES</h2>
            </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">FULL NAME</th>
                        <th>EMAIL</th>
                        <th>Phonenumber</th>
                        <th>DEPARTMENT</th>
                        <th>POSITION</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $staff =  App\Models\User::select(['id','FirstName', 'LastName', 'email', 'avatar','Department','user_type','Av_leave'])->get();
                    ?>
                    @foreach ($staff as $item)
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
                        <td>{{$item->email}}</td>
                        <td>{{$item->Phonenumber}}</td>
                        <td>{{$item->Department}}</td>
                        <td>{{$item->user_type}}</td>
                    </tr> 
                    @endforeach
                      
                </tbody>
            </table>
       </div>
    </div>
</div>
@endsection