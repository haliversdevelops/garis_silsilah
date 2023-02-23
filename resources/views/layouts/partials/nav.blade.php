<nav class="navbar navbar-expand-lg bg-info d-flex">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand mb-0 text-white" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <!-- Collapsed Hamburger --> 
        </div>
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav item-active ml-auto" style="border-radius:50px">
                <!-- Authentication Links -->
                <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?';?>
                
                @if (Auth::guest())
                    <a href="{{ route('login') }}" class="btn btn btn-info btn-md" style="border-radius:15px; margin-right: 5px">{{ __('app.signin') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-info btn-md" style="border-radius:15px; margin-right: 5px">{{ __('app.signup') }}</a>
                @else
                    <li class="dropdown">
                        <a class="btn btn btn-info dropdown-toggle text-white" data-toggle="dropdown" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
                            @if (is_system_admin(auth()->user()))
                                <li><a class="dropdown-item" href="{{ route('backups.index') }}">{{ __('backup.list') }}</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('profile') }}">{{ __('app.my_profile') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('password_change') }}">{{ __('auth.change_password') }}</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
                    <a class="btn btn-info dropdown-toggle text-white" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('app.languange') }}
                        <span class="caret"></span>          
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item" href="{{ url(url()->current() . $mark . 'lang=en') }}">{{ __('app.english') }}</a></li>
                        <li><a class="dropdown-item" href="{{ url(url()->current() . $mark . 'lang=id') }}">{{ __('app.indonesian') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>