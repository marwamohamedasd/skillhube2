@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Edite new question</h1>
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
<h3 class="card-title">Exam  edit questions</h3>
</div>


<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"> Edite question</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
    @include('admin.include.errors')
<form method="post"  action="{{url("dashboard/exams/update-questions/{$exam->id}/{$ques->id}") }}" >

@csrf
<div class="card-body">



<div class="row">

<div class="col-6">
<div class="form-group">
<label > title </label>
<input type="text" class="form-control"  name="title" value="{{$ques->title}}">
</div>
</div>




<div class="col-6">
<div class="form-group">
<label >Right Answer</label>
<input type="number"  min="1" max="4" class="form-control"  name="right_answer" value="{{$ques->right_answer}}">
</div>
</div>


<div class="col-6">
<div class="form-group">
<label >option 1</label>
<input type="text" class="form-control"  name="option_1" value="{{$ques->option_1}}">

</div>
</div>


<div class="col-6">
<div class="form-group">
<label >option 2</label>
<input type="text" class="form-control"  name="option_2" value="{{$ques->option_2}}">

</div>
</div>


<div class="col-6">
<div class="form-group">
<label >option 3</label>
<input type="text" class="form-control"  name="option_3" value="{{$ques->option_3}}">

</div>
</div>



<div class="col-6">
<div class="form-group">
<label >option 4</label>
<input type="text" class="form-control"  name="option_4" value="{{$ques->option_4}}">

</div>
</div>




</div>
<hr>

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
