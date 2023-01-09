@extends('admin/layout/admin')

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Leave Type List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Leave Type</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Edit Leave Type</h2>
                        <section>
                            
                            <form name="edit" method="Post">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Leave Type</label>
                                        <input name="id" type="hidden" class="form-control" required="true" autocomplete="off" value="{{$leave->id}}">
                                        <input name="leavetype" type="text" class="form-control" required="true" autocomplete="off" value="{{$leave->LeaveType}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Leave Description</label>
                                        <textarea name="description" style="height: 5em;" class="form-control text_area" type="text">{{$leave->Description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input name="date_from" class="form-control" type="date" value="{{$leave->date_from}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input name="date_to" class="form-control" type="date" value="{{$leave->date_to}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 text-right">
                                <div class="dropdown">
                                   <input class="btn btn-primary" type="submit" value="UPDATE" name="edit" id="edit">
                                </div>
                            </div>
                           </form>
                        </section>
                    </div>
                </div>
                
                <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Leave Type List</h2>
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                <tr>
                                    <th class="table-plus">LEAVETYPE</th>
                                    <th class="table-plus">DESCRIPTION</th>
                                    <th table-plus>DATE RANGE</th>
                                    <th class="datatable-nosort">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $leaves = App\Models\leavetype::select(['id', 'leavetype','description', 'date_from', 'date_to'])->get(); ?>
                                    @foreach ($leaves as $item)
                                    <tr>
                                        <td>{{$item->leavetype}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->date_from}} - {{$item->date_to}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="/admin/leave_type/{{$item->id}}" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

</div>
@endsection