<nav class="navbar navbar-expand-lg" style="min-height: 8vh;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="{{route('home')}}">
            LaravelShop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-75 justify-content-around">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('about')}}">about us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('discover')}}">discover</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">contact us</a>
                </li>
                
            </ul>

            @if(Auth::check())

            <div class=" dropdown">
                <button class="btn btn-danger border-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    options
                </button>
                <ul class="dropdown-menu">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>
                    <li><a href="{{ route('dashboard') }}" class="dropdown-item" href="#">
                            dashboard
                        </a></li>
                    <li><a href="{{ route('profile.show') }}" class="dropdown-item" href="#">
                            update profile
                        </a></li>

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-dropdown-link class="text-danger fw-bold" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </ul>
            </div>

            @else
            <a href="{{route('register')}}" class="btn btn-light border border-secondary text-primary fw-bold" style="width: max-content;margin:0 auto">
                <i class="fa-solid fa-cart-shopping mx-2"></i>
                <span style="letter-spacing: 1px;">
                    start shopping now !
                </span>
            </a>
            @endif
        </div>
    </div>
</nav>