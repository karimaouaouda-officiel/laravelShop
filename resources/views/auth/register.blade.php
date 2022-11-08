<x-template.guest>

    {{-- This is a comment from laravel --}}
    <div class="controle-fluid py-2">
        <h1 class="display-6 fw-bold text-light text-center" style="text-transform: uppercase;letter-spacing:2px">
            Join us !
        </h1>
    </div>

    {{-- the conteiner of regijster form --}}

    <div class="conteiner-fluid py-2 px-1 px-md-3 px-lg-5 mt-4">
        <div class="w-100 bg-danger rounded bg-light py-3 form-container" style="min-height: 80vh;">
            <form class="w-100 m-0 form-floating">
                <div class="w-100 row">
                    <div class="personal-info p-2 col-lg-6  px-lg-5 border-end">
                        <div class="w-100 py-2 text-center">
                            <h2 class="text-primary h3">
                                Personal informations
                            </h2>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded" id="fname" placeholder="first name">
                            <label for="fname"> <i class="fas fa-user"></i> first name</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="text" class="form-control rounded" id="fname" placeholder="first name">
                            <label for="fname"> <i class="fas fa-user"></i> last name</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Algeria</option>
                                <option value="1">Morocco</option>
                                <option value="2">Tunisie</option>
                                <option value="3">Libinon</option>
                            </select>
                            <label for="floatingSelect">select your country</label>
                        </div>
                        <span class="fw-bold mt-4 d-block">
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
                    </div>
                    <div class="personal-info p-2 col-lg-6  px-lg-5 border-end">
                        <div class="w-100 py-2 text-center">
                            <h2 class="text-primary h3">
                                Contact informations
                            </h2>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">
                                <i class="fas fa-envelope"></i>
                                Email address
                            </label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Algeria</option>
                                <option value="1">Morocco</option>
                                <option value="2">Tunisie</option>
                                <option value="3">Libinon</option>
                            </select>
                            <label for="floatingSelect">select your country</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="text" class="form-control rounded" id="fname" placeholder="first name">
                            <label for="fname"> <i class="fas fa-phone"></i> phone number</label>
                        </div>
                        <span class="fw-bold mt-4 d-block">
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
                    </div>
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