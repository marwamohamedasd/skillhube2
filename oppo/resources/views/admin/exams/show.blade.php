@extends('admin.layout')


@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">{{$exam->name('en')}}</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{url("dashboard/exams")}}">Exams</a></li>

    <li class="breadcrumb-item active">{{$exam->name('en')}}</li>
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


          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Exam details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                  <table class="table table-sm">
                      <thead>
                      <tr>
                          <th>Name(en)</th>
                          <th>Nmae(ar)</th>
                          <th>description (en) </th>
                          <th>description (ar) </th>
                          <th> Skill </th>

                          <th>Image </th>

                          <th>Question_no </th>

                          <th>difficulty </th>
                          <th>Duration(mins) </th>
                          <th>Active </th>




                      </tr>
                      </thead>
                      <tbody>
                      <tr>

                          <td>
                              {{$exam->name('en')}}
                          </td>

                          <td>
                              {{$exam->name('ar')}}
                          </td>

                          <td>
                              {{$exam->desc('en')}}
                          </td>


                          <td>
                              {{$exam->desc('ar')}}
                          </td>


                          <td>
                              {{$exam->skill->name('en')}}

                          </td>


                          <td>
                              <img src="{{asset("uploads/$exam->img")}}"  height="50px" alt="">

                          </td>
                          <td>
                              {{$exam->qestion_no}}

                          </td>

                          <td>
                              {{$exam->diffculty}}

                          </td>
                          <td>
                              {{$exam->duration_mins}}

                          </td>
                          <td>
                              @if($exam->active)

                                  <span class="bage bg-success">yes</span>

                              @else
                                  <span class="bage bg-danger">No</span>


                              @endif

                          </td>



                      </tr>

                      </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>


<a href="{{url("dashboard/exams/show-questions/$exam->id")}}" class="btn btn-sm  btn-success"> show question</a>
<a href="{{url()->previous()}}"  class="btn- btn-sm btn-primary"> Back</a>








      </div>



</div>
</div>




</div>










@endsection
