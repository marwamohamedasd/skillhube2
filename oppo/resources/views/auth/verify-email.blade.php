@extends('web.layout')


@section('title')
    vertication email
@endsection




@section('main')

    <div class="alert alert-success">


        A verication email send sucessfly , please check your inbox

    </div>


    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">


                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <form method="post" action="{{url('email/verification-notification')}}">

                            @csrf
                            <button type="submit" class="main-button icon-button pull-right"> Resend email</button>



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
