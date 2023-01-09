@extends('admin/layout/admin')

@section('content')

<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Department List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">Edit Department</h2>
                        <section>
                            <form name="edit_department" method="post">
                                @csrf
                                <input name="id" type="hidden" class="form-control" required="true" autocomplete="off" value="{{$department->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Department Name</label>
                                        <input name="departmentname" type="text" class="form-control" required="true" autocomplete="off" value="{{$department->departmentname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Department Short Name</label>
                                        <input name="departmentshortname" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase" value="{{$department->departmentshortname}}">
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
                        <h2 class="mb-30 h4">Department List</h2>
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                <tr>
                                    <th>SR NO.</th>
                                    <th class="table-plus">DEPARTMENT</th>
                                    <th>DEPART. SHORT NAME</th>
                                    <th class="datatable-nosort">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $department = App\Models\Department::select(['id','DepartmentName', 'DepartmentShortName'])->get(); ?>
                                    @foreach ($department as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->DepartmentName}}</td>
                                        <td>{{$item->DepartmentShortName}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="/admin/department/{{$item->id}}" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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