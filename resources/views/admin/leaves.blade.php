@extends('admin/layout/admin')

@section('content')
<div class="pd-ltr-20">
    <div class="page-header">
        <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Leave Portal</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Leave</li>
                        </ol>
                    </nav>
                </div>
        </div>
    </div>

    <div class="card-box mb-30">
        <div class="pd-20">
                <h2 class="text-blue h4">ALL LEAVE APPLICATIONS</h2>
            </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">STAFF NAME</th>
                        <th>LEAVE TYPE</th>
                        <th>APPLIED DATE</th>
                        <th>ADM. STATUS</th>
                        <th class="datatable-nosort">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaves as $item)
                    @if ($item->user_type == 'Staff')
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
                        @elseif ($item->Status == '1')
                        <span style="color: green">Approved</span>
                        @elseif ($item->Status == '2')
                        <span style="color: red">Rejected</span>
                        @else
                            
                        @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="/admin/leave_details/{{$item->id}}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="/admin/{{$item->id}}"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
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
@endsection

	