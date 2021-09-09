@extends('admin.layout')

@section('main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Skills</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Skills</li>
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

                    <div class="col-12">


                        <div class="card-header">
                            <h3 class="card-title">All Skills</h3>

                            <div class="card-tools">


                                <button  type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                                    Add New Skills
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name (en)</th>
                                    <th>Name(ar)</th>
                                    <th> Img</th>
                                    <th> categories</th>

                                    <th> Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($skills as $skill)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$skill->name('en')}}</td>
                                        <td >{{$skill->name('ar')}}</td>
                                        <td >  <img src="{{asset("uploads/$skill->img")}}"  height="50px" alt="">

                                        </td>
                                        <td >{{$skill->cat->name('en')}}</td>
                                        <td>
                                            @if($skill->active)
                                                <span class="badge bg-success">yes</span>
                                            @else
                                                <span class="badge bg-danger">NO</span>

                                            @endif
                                        </td>
                                        <td>

                                            <button  type="button" class="btn btn-sm btn-primary edit-btn" data-id="{{$skill->id}}" data-name-en="{{$skill->name('en')}}"  data-name-ar="{{$skill->name('ar')}}"  data-img="{{$skill->img}}"   data-cat-id="{{$skill->cat_id}}"   data-toggle="modal" data-target="#edit-modal">
                                                <i class="fas fa-edit"></i>

                                            </button>

                                            <a href="{{url("dashboard/skills/delete/$skill->id")}}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="{{url("dashboard/skills/toggle/$skill->id")}}" class="btn btn-sm btn-secondary">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex my-3  justify-content-center">
                                {{$skills->links()}}
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    {{-- form create--}}}
    <!-- /.content-wrapper -->
    <div class="modal fade show" id="add-modal" style="display: none; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD new</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                @include('admin.include.errors')
                <form id="add-form" action="{{url('dashboard/skills/store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name(en)</label>
                                    <input type="text" name="name_en" class="form-control" >
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12>">

                                <div class="form-group">
                                    <label >Name(ar)</label>
                                    <input type="text"  name="name_ar" class="form-control" id="edit-form-name-ar"  >
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12>">
                                <div class="form-group">
                                    <label > CAtegory</label>
                                    <select class="custom-select form-control-border" name="cat_id" >
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name('en')}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" form="add-form" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{--Form edite --}}

    <div class="modal fade show" id="edit-modal" style="display: none; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edite</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                @include('admin.include.errors')

                <form id="edit-form" action="{{url('dashboard/skills/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit-form-id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name(en)</label>
                                    <input type="text" name="name_en" class="form-control"  id="edit-form-name-en">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12>">

                                <div class="form-group">
                                    <label >Name(ar)</label>
                                    <input type="text"  name="name_ar" class="form-control" id="edit-form-name-ar"  >
                                </div>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12>">
                                <div class="form-group">
                                    <label > CAtegory</label>
                                    <select class="custom-select form-control-border" id="edit-form-cat-id" name="cat_id" >
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name('en')}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                        </div>

                    </div>






                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </form>





            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>





@endsection


@section('scripts')



    <script>

        $('.edit-btn').click(function () {

            let id =$(this).attr('data-id')

            let nameEN=$(this).attr('data-name-en')
            let nameAr=$(this).attr('data-name-ar')
            let Image=$(this).attr('data-img')
            let catid =$(this).attr('data-cat-id')



            $('#edit-form-id').val(id)

            $('#edit-form-name-en').val(nameEN)

            $('#edit-form-name-ar').val(nameAr)
            // $('#edit-form-name-ar').val(Image)
            $('#edit-form-cat-id').val(catid)




        })



    </script>
@endsection
