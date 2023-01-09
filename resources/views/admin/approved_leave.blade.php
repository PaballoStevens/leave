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
                            <li class="breadcrumb-item active" aria-current="page">Approved Leave</li>
                        </ol>
                    </nav>
                </div>
        </div>
    </div>

    <div class="card-box mb-30">
        <div class="pd-20">
                <h2 class="text-blue h4">APPROVED LEAVE</h2>
            </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">STAFF NAME</th>
                        <th>LEAVE TYPE</th>
                        <th>APPLIED DATE</th>
                        <th>AMD. STATUS</th>
                        <th class="datatable-nosort">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approved as $item)
                    @if ($item->Status == '1')
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
                        <td> @if ($item->Status == '1')
                            <span style="color: green">Approved</span>
                        @else
                            
                        @endif
                        </td>
                        <td>
                            <div class="table-actions">
                                <a title="VIEW" href="leave_details/{{$item->id}}"><i class="dw dw-eye" data-color="#265ed7"></i></a>	
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