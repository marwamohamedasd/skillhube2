@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Add new exam</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active">Exams</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@include('admin.include.message')


<!-- Main content -->
<div class="content">

<div class="container-fluid">
<div class="row">


<div class="card">
<div class="card-header">
<h3 class="card-title">Exam questions</h3>
</div>


<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"> add new question</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form method="post"  action="{{url("dashboard/exams/store-questions/{$exam_id}") }}" >

@csrf
<div class="card-body">

@for($i=1 ; $i<=$questions_no ; $i++)

<h5> Questions {{$i}}</h5>

<div class="row">

<div class="col-6">
<div class="form-group">
<label > title </label>
<input type="text" class="form-control"  name="titles[]">
</div>
</div>




<div class="col-6">
<div class="form-group">
<label >Right Answer</label>
<input type="text" class="form-control"  name="right_answer">
</div>
</div>


<div class="col-6">
<div class="form-group">
<label >option 1</label>
<input type="text" class="form-control"  name="option_1s[]">

</div>
</div>


<div class="col-6">
<div class="form-group">
<label >option 2</label>
<input type="text" class="form-control"  name="option_2s[]">

</div>
</div>


<div class="col-6">
<div class="form-group">
<label >option 3</label>
<input type="text" class="form-control"  name="option_3s[]">

</div>
</div>



<div class="col-6">
<div class="form-group">
<label >option 4</label>
<input type="text" class="form-control"  name="option_4s[]">

</div>
</div>




</div>
<hr>
@endfor
</div>
<!-- /.card-body -->

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>

</div>

</div>
</div>
</div>



















@endsection
