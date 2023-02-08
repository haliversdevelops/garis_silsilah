<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right" style="display:flex;align-items:center">
                <!-- Authentication Links -->
                <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?';?>
                
                @if (Auth::guest())
                    <a href="{{ route('login') }}" class="btn btn-default btn-sm" style="margin-right: 5px">{{ __('app.signin') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-default btn-sm" style="margin-right: 5px">{{ __('app.signup') }}</a>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if (is_system_admin(auth()->user()))
                                <li><a href="{{ route('backups.index') }}">{{ __('backup.list') }}</a></li>
                            @endif
                            <li><a href="{{ route('profile') }}">{{ __('app.my_profile') }}</a></li>
                            <li><a href="{{ route('password_change') }}">{{ __('auth.change_password') }}</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('app.languange') }}
                        <span class="caret"></span>          
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a href="{{ url(url()->current() . $mark . 'lang=en') }}">{{ __('app.english') }}</a></li>
                        <li><a href="{{ url(url()->current() . $mark . 'lang=id') }}">{{ __('app.indonesian') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>