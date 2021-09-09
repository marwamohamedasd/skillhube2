<nav id="nav">
    <form id="logout-form" method="post" action="{{url('logout')}}" style="display: none">
        @csrf
    </form>
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="index.html">@lang('web.home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('web.cats') <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($cats as $cat)

                    <li><a href="{{url("categories/show/{$cat->id}")}}"> {{$cat->name() }}  </a></li>

                @endforeach
            </ul>
        </li>
        <li><a href="{{url('contact')}}">@lang('web.contact')</a></li>
        @guest
        <li><a href="{{url('login')}}">  {{__('web.signin')}}</a></li>
        <li><a href="{{url('register')}}"> {{__('web.signup')}}</a></li>
        @endguest
        @auth
            @if(\Illuminate\Support\Facades\Auth::user()->role->name =='student')
            <li><a  href="{{url('profile')}}"> {{__('web.profile')}}</a></li>
            @else
                <li><a  href="{{url('/dashboard')}}">{{__('web.dashboard')}}</a></li>

            @endif

            <li><a id="logout-link" href="#"> {{__('web.signout')}}</a></li>
        @endauth

        {{--    <input type="submit"  value="{{__('web.signout')}}">--}}




    @if(\Illuminate\Support\Facades\App::getLocale()== "ar")
            <li><a href="{{ url('lang/set/en') }}"> EN</a></li>

        @else
            <li><a href="{{ url('lang/set/ar') }}">ع</a></li>

        @endif
    </ul>
</nav>
