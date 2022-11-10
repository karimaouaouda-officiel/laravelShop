<header class="container-fluid" style="min-height: 100vh;">
    <x-main.guest.navbar />
    <div class="container-fluid row" style="min-height: 92vh;">
        <div class="log col-lg-5 d-flex justify-content-center align-items-center overflow-hidden" style="height: 90vh;">
            <img style="transform: scale(1.1);" src="{{asset('./media/logo.svg')}}" alt="logo for web sit header" class="w-100 h-100" />
        </div>
        <div class="col-lg-7 d-flex flex-column justify-content-center">
            <h1 class="display-5 fw-bold text-center">
                Welcome to <span class="text-light" style="white-space:nowrap"> Laravel-Shop </span>
            </h1>
            
            <h4 class="h2 fw-bold my-5 text-center">
                The best website to shop from <br />your confortable home
            </h4>

            <a href="{{route('register')}}" class="btn btn-danger border border-light text-white fw-bold" style="width: max-content;margin:0 auto">
                <i class="fa-solid fa-cart-shopping mx-2"></i>
                <span style="letter-spacing: 1px;">
                    start shopping now !
                </span>
            </a>
        </div>
    </div>
</header>