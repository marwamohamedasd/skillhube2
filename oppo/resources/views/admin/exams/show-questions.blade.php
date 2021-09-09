@extends('admin.layout')


@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">{{$exam->name('en')}}  Questions</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{url("dashboard/exams")}}">Exams</a></li>

    <li class="breadcrumb-item"><a href="{{url("dashboard/exams/show/$exam->id")}}"> {{$exam->name('en')}}</a></li>

    <li class="breadcrumb-item active">Questions </li>

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

<div class="col-12 pb-3">
<div class="card">
<div class="card-header">
<h3 class="card-title">Exam questions </h3>
</div>
<!-- /.card-header -->
<div class="card-body p-0">
<table class="table table-sm">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th> Options</th>
<th> RightAnswers </th>
<th> Actions </th>






</tr>
</thead>
<tbody>
@foreach($exam->question as $ques)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td >{{$ques->title}}</td>
        <td >
            {{$ques->option_1}} |<br>
            {{$ques->option_2}} |<br>
            {{$ques->option_3}} |<br>
            {{$ques->option_4}} |<br>




        </td>
        <td >

            {{$ques->right_answer}}

        </td>

         <td>

             <a href="{{url("dashboard/exams/edit-questions/$exam->id/$ques->id")}}" class="btn btn-dark">
                 <i class="fas fa-edit"></i>
             </a>

         </td>

       {{---
        <td>

            <a  href="{{url("dashboard/exams/edit/$exam->id")}}" class="btn btn-sm btn-primary " >
                <i class="fas fa-edit"></i>

            </a>
            <a  href="{{url("dashboard/exams/show/$exam->id")}}" class="btn btn-sm btn-primary " >
                <i class="fas fa-eye"></i>

            </a>

            <a  href="{{url("dashboard/exams/show/$exam->id/questions")}}" class="btn btn-sm btn-success " >
                <i class="fas fa-question"></i>

            </a>

            <a href="{{url("dashboard/exams/delete/$exam->id")}}" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
            </a>
            <a href="{{url("dashboard/exams/toggle/$exam->id")}}" class="btn btn-sm btn-secondary">
                <i class="fas fa-toggle-on"></i>
            </a>


        </td>

        --}}
    </tr>
@endforeach
</tbody>
</table>

</div>
<!-- /.card-body -->
</div>


<a href="{{url()->previous()}}"  class="btn- btn-sm btn-secondary">Back</a>



<a href="{{url("dashboard/exams")}}"  class="btn- btn-sm btn-danger">  Back to all exams </a>






</div>


</div>



</div>
</div>




</div>










@endsection
