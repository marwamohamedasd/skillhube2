
@extends('web.layout')

@section('title')
   title: contact
@endsection


@section('main')


    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact</li>
                    </ul>
                    <h1 class="white-text">{{__('web.get in touch')}}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- contact form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h4>@lang('Send in message')</h4>
                  {{--  <form action="{{url('contact/message/send')}}" method="post">--}}
                    {{--                                        هنا لو عايز اطبق Ajax علي   الفورم ديه  اعمل ايه : في العادي  كنت بروح اتك علي زرار submit يروح ينفذ action اللي عندي  فانا حاليا حشيله واروح ابعت Ajax request        --}}
                    <form id="contact-form">
                        @csrf
                        {{--           not Ajax api               @include('web.pagination.message')--}}


                        @include('web.pagination.message-ajax')
                        <input class="input" type="text" name="name" placeholder="@lang('web.name')">
                        <input class="input" type="email" name="email" placeholder="@lang('web.email')">
                        <input class="input" type="text" name="subject" placeholder="@lang('web.subject')">
                        <textarea class="input" name="body" placeholder="@lang('web.msg')"></textarea>
                        <button  id="contact-form-btn" type="submit" class="main-button icon-button pull-right">@lang('web.Send in message')</button>
                    </form>
                </div>
            </div>
            <!-- /contact form -->

            <!-- contact information -->
            <div class="col-md-5 col-md-offset-1">
                <h4>@lang('web.contact info')</h4>
                <ul class="contact-details">
                    <li><i class="fa fa-envelope"></i>{{$sett->email}}</li>
                    <li><i class="fa fa-phone"></i>{{$sett->phone}}</li>
                </ul>

            </div>
            <!-- contact information -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->


@endsection
 {{-- اعمل اكسس لل Ajax اللي عندي  في forme --}}

@section('scripts')

    <script>
        $('#sucess-div').hide()
        $('#errors-div').hide()

        $('#contact-form-btn').click(function (e) {


            $('#sucess-div').hide()
            $('#errors-div').hide()
            $('#sucess-div').empty()
            $('#errors-div').empty()

            e.preventDefault()
     let formData= new FormData($('#contact-form')[0]);

    $.ajax({
        type: "Post",
        url: "{{url('contact/message/send')}}",
        data:formData ,
        contentType:false,
        processData:false,

        success: function (data) {
            $('#sucess-div').show()
           $('#sucess-div').text(data.sucess)

        },
        error: function (xhr, status , error)
        {

            $('#errors-div').show()


            $.each(xhr.responseJSON.errors,function (key ,item) {

                $('#errors-div').append("<p>"  + item + "<p>")

            });
        }
    });
})


    </script>

@endsection
