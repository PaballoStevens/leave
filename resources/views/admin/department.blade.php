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
                                <li class="breadcrumb-item active" aria-current="page">Department Module</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 pt-10 height-100-p">
                        <h2 class="mb-30 h4">New Department</h2>
                        <section>
                            <form action="department" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Department Name</label>
                                        <input name="departmentname" type="text" class="form-control" required="true" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Department Short Name</label>
                                        <input name="departmentshortname" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 text-right">
                                <div class="dropdown">
                                   <input class="btn btn-primary" type="submit" value="REGISTER" name="add" id="add">
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
                                <?php $department = App\Models\Department::select(['id','DepartmentName', 'DepartmentShortName'])->get(); ?>
                                <tbody>
                                    @foreach ($department as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->DepartmentName}}</td>
                                        <td>{{$item->DepartmentShortName}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="edit_department/{{$item->id}}" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                                <a href="department/{{$item->id}}" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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