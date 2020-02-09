<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url(app()->getLocale().'/home')}}" style="color:#777"><span style="font-size:15pt">&#9820;</span> Videoclub</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is(app()->getLocale().'/catalog') && ! Request::is(app()->getLocale().'/catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url(app()->getLocale().'/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            {{ __('Catalog') }}
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is(app()->getLocale().'/catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url(app()->getLocale().'/catalog/create')}}">
                            <span>&#10010</span> {{ __('Add Film') }}
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Language') }} <span class="caret"></span></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                        @if(Request::segment(3) == '')
                            <a class="dropdown-item" href="{{ url('en',Request::segment(2)) }}">{{ __('English') }}</a>
                            <a class="dropdown-item" href="{{ url('es',Request::segment(2)) }}">{{ __('Spanish') }}</a>
                        @elseif(Request::segment(4) == '')
                            <a class="dropdown-item" href="{{ url('en',Request::segment(2).'/'.Request::segment(3)) }}">{{ __('English') }}</a>
                            <a class="dropdown-item" href="{{ url('es',Request::segment(2).'/'.Request::segment(3)) }}">{{ __('Spanish') }}</a>
                        @elseif(Request::segment(5) == '')
                            <a class="dropdown-item" href="{{ url('en',Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4)) }}">{{ __('English') }}</a>
                            <a class="dropdown-item" href="{{ url('es',Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4)) }}">{{ __('Spanish') }}</a>
                        @endif
                        </div>
                    </li>
                    <li class="nav-item border-left">
                        <form action="{{ url(app()->getLocale().'/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item border-left">
                        <a href="{{ route('login', app()->getLocale()) }}"  class="nav-link" style="display:inline">
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                {{ __('Login') }}
                            </button>
                        </a>
                    </li>
                    <li class="nav-item border-left">
                        <a href="{{ route('register', app()->getLocale()) }}" class="nav-link" style="display:inline">
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                {{ __('Register') }}
                            </button>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Language') }} <span class="caret"></span></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route(Route::currentRouteName(), 'en') }}">{{ __('English') }}</a>
                            <a class="dropdown-item" href="{{ route(Route::currentRouteName(), 'es') }}">{{ __('Spanish') }}</a>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
