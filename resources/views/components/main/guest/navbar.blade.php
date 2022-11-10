<nav class="navbar navbar-expand-lg" style="min-height: 8vh;background:#ff5200;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="#">
            LaravelShop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-75 justify-content-around">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>

            <a href="{{route('register')}}" class="btn btn-danger border border-light text-white fw-bold" style="width: max-content;margin:0 auto">
                <i class="fa-solid fa-cart-shopping mx-2"></i>
                <span style="letter-spacing: 1px;">
                    start shopping now !
                </span>
            </a>
        </div>
    </div>
</nav>