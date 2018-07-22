<header class="bg-light mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
        <a class="navbar-brand" id="logo-top" href="{{route('index')}}">
            <div class="float-left icon-logo-part">
                <img src="{{asset('images/logo-pw.png')}}" alt="logo">
            </div>
            <div class="float-left text-logo-part">
                Q&A
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            
            <ul class="navbar-nav ml-auto">
                @if(auth()->user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name()}}
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">View Your Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('auth.logout')}}">Logout</a>
                    </div>
                </li>
                </ul>
                @else
                @include('public.user.modals.login')
                @include('public.user.modals.register')

                <li class="nav-item">
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#loginModal">
                        Login
                    </button>
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#registerModal">
                        Register
                    </button>
                </li>
            </ul>
            @endif
        </div>
        
    </nav>
    <div id="submenu">
        <div class="fluid-container">
            
            <div data-toggle="collapse" class="d-block d-md-none px-2 text-light" data-target="#servicesMenu">
                <small>Open</small>
            </div>
            
            <nav id="servicesMenu" class="nav d-md-flex collapse">
                <li class="nav-item">
                    <a href="#" class="nav-link">Q&A</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">Weather</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Videos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Finances</a>
                </li>
            </nav>
        </div>
    </div>
</header>