    <!-- ================================= Header
    -->
    <header class="header header-transparent">
        <nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
            <div class="container-fluid">
                <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a class="navbar-brand" href="{{ url("/")}}">
                <img class="img-fluid" src="images/log.png" alt="logo">
                </a>
                <div class="navbar-collapse collapse d-md-flex">
                    {{-- Left Side --}}
                    <ul class="nav navbar-nav me-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ url("/")}}"  role="button"  aria-haspopup="true" aria-expanded="false">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/about")}}"  role="button"  aria-haspopup="true" aria-expanded="false">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/joblist")}}"  role="button"  aria-haspopup="true" aria-expanded="false">Job List</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/contacts")}}"  role="button"  aria-haspopup="true" aria-expanded="false">Contact Us</a>
                        </li>

                        {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Employer <i class="fas fa-chevron-down fa-xs"></i>
                        </a>

                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Candidates <i class="fas fa-chevron-down fa-xs"></i>
                        </a>

                        </li> --}}
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   @if (Auth::user()->role=='employer')
                                   <a class="dropdown-item" href="{{ route('employer.dashboard') }}">
                                    {{ __('Dashboard') }}
                                    </a>
                                   @elseif(Auth::user()->role=='candidate')
                                   <a class="dropdown-item" href="{{ route('candidate.dashboard') }}">
                                    {{ __('Dashboard') }}
                                    </a>
                                   @else
                                   <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    {{ __('Dashboard') }}
                                    </a>
                                   @endif


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <!--=================================
    Header -->
