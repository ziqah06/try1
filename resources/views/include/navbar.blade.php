<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">{{config('app.name','Ziqablog') }}</a>
        <button class="navbar-toggler" type="button" datatoggle="collapse" data-target="#navbarCollapse" ariacontrols="navbarCollapse" aria-expanded="false" arialabel="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/service">Service</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="/posts">Blog</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="nav-link" href="/posts/create">Create Post</a>
                </li>
                    
            </ul> 
        </div-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent"><!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/service">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar --> 
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else 
                        <li class="nav-item dropdown"> 
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->name }} 
                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdownmenu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/home">Dashboard</a>
                                <a class="dropdown-item" href="{{route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

        
