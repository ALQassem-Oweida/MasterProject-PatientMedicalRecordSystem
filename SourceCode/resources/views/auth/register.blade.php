@extends('layouts.app')
@section('content')
    <style>
        body {
            background-color: white;
        }


        #app>main>section>div>div>div>div>div {

            box-shadow: 20px 20px 50px 10px rgba(83, 83, 83, 0.668);

        }

        .gradient-form {

            height: 100px;
            
        }

        .gradient-custom-2 {

            background: url('./images/loginside.jpg');
            object-fit: cover;
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>


    <section class="gradient-form bg-white" style="background-color: #eee;">
        <div class="container bg-white">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black mt-5 mb-5">
                        <div class="row g-0">

                            <div class="col-lg-4 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-2 p-md-5 mx-md-4">

                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="./images/logo.png" style="width: 185px;" alt="logo">

                                    </div><br>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="national_id"
                                                class="col-md-4 col-form-label text-md">{{ __('National ID') }}</label>

                                            <div class="col-md-6">
                                                <input id="national_id" type="text"
                                                    class="form-control @error('national_id') is-invalid @enderror"
                                                    name="national_id" value="{{ old('national_id') }}"
                                                    autocomplete="national_id" autofocus maxlength="10">

                                                @error('national_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone"
                                                class="col-md-4 col-form-label text-md">{{ __('Phone') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>

                                        <input id="role" type="hidden" name="role" value="2">

                                        <div class="form-outline mb-3">
                                            <input id="policy" type="checkbox" name="policy" required> by checking this
                                            box you agree to our <a href="/contactUs" target="_blanck">Privecy Policy </a>.
                                        </div>


                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer class="footer" style="border-top:solid 1px black"> 
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-6 text-start">
                    <p class="mb-0">
                        <a class="text-muted" href="{{ url('/') }}"><strong> <span style="color: #A5C422">
                                    M</span>EDICA</strong></a> &copy;
                    </p>
                </div>
                <div class="col-6 text-end">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="/contactUs" target="_blank">Contact Us</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection
