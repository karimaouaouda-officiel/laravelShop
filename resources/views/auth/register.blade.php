<x-template.guest>
    <x-main.guest.navbar/>

    {{-- This is a comment from laravel --}}
    <div class="controle-fluid py-2">
        <h1 class="display-6 fw-bold text-primary text-center" style="text-transform: uppercase;letter-spacing:2px">
            Join us !
        </h1>
    </div>


    {{-- we will log the errors in alert if need to --}}


    @if($errors->any())

    @php
    $arr = array();
    @endphp

    @foreach($errors as $error)
    array_push($arr , $error);
    @endforeach
    <script>
        var errors = @php print_r($arr);
        @endphp



        console.log(errors)

        alert(errors)
    </script>
    @endif

    {{-- the conteiner of regijster form --}}

    <div class="conteiner-fluid py-2 px-2 px-md-3 px-lg-5 mt-4">
        <div class="w-100 bg-danger rounded bg-light py-3 form-container" style="min-height: 80vh;">
            <form class="w-100 m-0 form-floating" method="post" action="{{route('register')}}">
                @csrf

                <input type="hidden" value="{{request()->get('role') ?? 'client'}}" name="role">
                <div class="w-100 row m-0">
                    <div class="personal-info p-2 col-lg-6  px-lg-5 border-end">
                        <div class="w-100 py-2 text-center">
                            <h2 class="text-primary h3">
                                Personal informations
                            </h2>
                        </div>
                        <div class="form-floating">
                            <input name="firstname" type="text" class="form-control rounded" id="fname" placeholder="first name">
                            <label for="fname"> <i class="fas fa-user"></i> first name</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="text" name="lastname" class="form-control rounded" id="lname" placeholder="first name">
                            <label for="fname"> <i class="fas fa-user"></i> last name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">
                                <i class="fas fa-envelope"></i>
                                Email address
                            </label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" name="password" class="form-control rounded" id="pass" placeholder="password">
                            <label for="pass"> <i class="fas fa-lock"></i> password</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" name="password_confirmation" class="form-control rounded" id="pass" placeholder="first name">
                            <label for="pass"> <i class="fas fa-lock"></i> password confirmation</label>
                        </div>
                        <!--<span class="fw-bold mt-4 d-block">
                            tour date of birth :
                        </span>
                        <div class="row w-100 m-0">
                            <div class="col-3 text-center">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control rounded" id="dob" placeholder="first name">
                                    <label for="dob">dd</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control rounded" id="mob" placeholder="first name">
                                    <label for="mob">mm</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control rounded" id="yob" placeholder="first name">
                                    <label for="yob">yyyy</label>
                                </div>
                            </div>
                        </div>
-->
                    </div>

                    @if(request()->get('role') == "seller")
                    <div class="personal-info p-2 col-lg-6  px-lg-5 border-end">
                        <div class="w-100 py-2 text-center">
                            <h2 class="text-primary h3">
                                Contact informations
                            </h2>
                        </div>
                        <div class="form-floating">
                            <select name="country" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Algeria</option>
                                <option value="1">Morocco</option>
                                <option value="2">Tunisie</option>
                                <option value="3">Libinon</option>
                            </select>
                            <label for="floatingSelect">select your country</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="number" name="phone_number" class="form-control rounded" id="phone" placeholder="first name">
                            <label for="fname"> <i class="fas fa-phone"></i> phone number</label>
                        </div>

                        <div class="w-100 mt-5 text-center py-2 border-top">
                            already registered ? <a class="nav-link" href="{{route('login')}}">Login</a>
                        </div>
                    </div>

                    @else

                    <div class=" col-lg-6 h-100">
                        <img class="w-100" style="max-height: 60vh;" src="{{asset('./media/reg.svg')}}" alt="">
                        <div class="py-2 px-3 text-center">
                            <p class="h6">
                                already have an account? <a class="text-primary" href="{{route('login')}}">Login</a> now
                            </p>
                            <p class="h6">
                                want to register a a buyer? <a class="text-primary" href="{{route('register' , ['role'=>'seller' ?? 'client'])}}">click here</a>
                            </p>
                        </div>
                    </div>

                    @endif
                </div>
                <div class="w-100 d-flex justify-content-center py-2">
                    <button class="btn btn-primary" style="letter-spacing: 1.5px;text-transform:uppercase">
                        register now !
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-template.guest>



<!--<x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
                                -->