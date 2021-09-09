@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Message table</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active">Messages</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
<div class="container-fluid">
<div class="row">

<div class="col-12">

<div class="card-header">
<h3 class="card-title">All messages</h3>

<div class="card-tools">

<!--
<a   href="{{url('dashboard/admins/create')}}" class="btn btn-sm btn-primary" >
Add New Admins
</a>
-->

<div class="row">
<div class="col-12">
<div class="card">

<!-- /.card-header -->
<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Suject</th>

<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($messages as $message)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$message->name}}</td>
<td>{{$message->email}}</td>
<td>{{$message->subject ?? "..."}} </td>

<td>


<a href="{{url("dashboard/messages/show/$message->id")}}" class=" btn btn-sm btn-success">

<i class="fas fa-eye"></i>
</a>

</td>


</tr>
@endforeach

</tbody>
</table>

    <div class="d-flex my-3 justify-content-center" >
{{$messages->links()}}
    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>








</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>

</div>

@endsection
