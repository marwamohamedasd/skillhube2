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

<div class="col-12 pb-3">
@include('admin.include.errors')

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Add new Exams </h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form method="post"  action="{{url("dashboard/exams/store")}}" enctype="multipart/form-data">
@csrf
<div class="card-body">

<div class="row">

<div class="col-6">
<div class="form-group">
<label >Name(en)</label>
<input type="text" class="form-control"  name="name_en">
</div>
</div>

<div class="col-6">
<div class="form-group">
<label >Name(ar)</label>
<input type="text" class="form-control"  name="name_ar">
</div>
</div>


<div class="form-group">
<label >descriprtion(en)</label>
<textarea  class="form-control" name="desc_en"> </textarea>
</div>


<div class="form-group">
<label >descriprtion(ar)</label>
<textarea  class="form-control" name="desc_ar"> </textarea>

</div>


<div class="col-6">

<div class="form-group">

<label> Skill</label>
<select class="custom-select form-control" id="edit-form-cat-id" name="skill_id">

@foreach($skills as $skill)

<option value="{{$skill->id}}"> {{$skill->name('en')}}  </option>

@endforeach

</select>


</div>

    <br>
<div class="col-12">

<div class="form-group">

<label> Image</label>

<div class="input-group">

<div class="custom-file">
<input type="file" class="custom-file-input" name="img">
<label class="custom-file-label"> choose file</label>

</div>

</div>

</div>


</div>






</div>





    <div class="row">

       <div class="col-4">

           <div class="form-group">

               <label>  Questions no</label>

               <input type="number" class="form-control" name="qestion_no">

           </div>

       </div>


        <div class="col-4">
            <div class="form-group">

                <label> diffculty</label>

                <input type="number" class="form-control" name="diffculty">

            </div>

        </div>


        <div class="col-4">
            <div class="form-group">

                <label> Duration(mins)</label>

                <input type="number" class="form-control" name="duration_mins">

            </div>

        </div>













    </div>







</div>
</div>
<!-- /.card-body -->

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{url()->previous()}}"class="btn btn-success">Back</a>
</div>
</form>
</div>






</div>

</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>




@endsection

