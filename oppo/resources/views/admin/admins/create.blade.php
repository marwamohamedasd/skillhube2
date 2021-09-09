@extends('admin.layout')


@section('main')




    !-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Exams</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Admins</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Add new admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

            @include('admin.include.errors')
        <form method="post" action="{{url("dashboard/admins/store")}}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control"  name="email">
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label > Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group">
                    <label > choose role</label>

                    <select class="custom-select form-control" name="role_id">
                        @foreach($roles as $role)

                        <option value="{{$role->id}}" >  {{$role->name}}</option>

                        @endforeach
                    </select>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary">back</a>
            </div>
        </form>
    </div>












@endsection
