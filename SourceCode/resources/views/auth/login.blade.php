@extends('layouts.app')
@section('content')
    <style>
        body {
            background-color: white;
           
        }

        #app>main>section>div>div>div>div>div>div {

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


    <section class="gradient-form bg-white" style="background-color: #eee; mb-3">

        <div class="container   bg-white">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black mt-5 mb-1">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <img src="./images/logo.png" style="width: 185px;" alt="logo">

                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-outline ">
                                            <label class="form-label" for="form2Example11">ID</label>
                                            <input id="national_id" type="text" maxlength="10"
                                                class="form-control @error('national_id') is-invalid @enderror"
                                                name="national_id" value="{{ old('national_id') }}" 
                                                autocomplete="national_id" autofocus />
                                            @error('national_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                 autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>





                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit" class="btn btn-primary mb-3">
                                                {{ __('Login') }}
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">

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
