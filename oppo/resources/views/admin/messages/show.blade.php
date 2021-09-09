@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
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


<div class="row">
<div class="col-12">
<div class="card">

<!-- /.card-header -->
<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">

<tbody>
<tr>

<th> Name </th>
<td>{{$message->name}}</td>

</tr>

<tr>
<th> Email</th>

<td>{{$message->email}}</td>
</tr>

<tr>
<th> subject </th>

<td>{{$message->subject ?? "..."}}</td>

</tr>

<tr>
<th> Body </th>

<td>{{$message->body}} </td>


</tr>


</tbody>
</table>

</div>
<!-- /.card-body -->

<div class="card-body p-0">

@include('admin.include.errors')
<form method="post" action="{{url("dashboard/messages/response/{$message->id}")}}"  enctype="multipart/form-data">
@csrf
<div class="card-body">
<div>
    Send Response
</div>
    <br>

<div class="form-group">
<label > Title </label>
<input type="text" class="form-control" name="title">
</div>
<div class="form-group">
<label >Body</label>
    <textarea class="form-control" rows="5" name="body"></textarea>
</div>

</div>
<!-- /.card-body -->

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{url()->previous()}}" class="btn btn-secondary">back</a>
</div>
</form>













</div>







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
