@extends('admin.master_admin')
@section('admin_content')
    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="card p-2">
            <div class="container">
                <div class="row">

                    {{-- add company treger --}}
                    <div class="col-12 col-md-12 col-lg-6">
                        <button data-bs-toggle="modal" data-bs-target="#addCompany" class="btn btn-info">Add a
                            Company</button>
                    </div>

                    {{-- Searche bar --}}
                    <div class="col-12 col-md-12 col-lg-6 d-flex justify-content-end">
                        <form action="/searchCompanyadmin" method="get">

                            <div class="form-group">
                                <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                    placeholder="Enter company name">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Insurance Companys</strong></h1>
        @if (Auth::check())
            <section class="team-section py-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <span class="d-flex justify-content-center">
                            {{ $InsuranceCo->links() }}
                        </span>
                        @foreach ($InsuranceCo as $company)
                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card border-0 shadow-lg  position-relative">
                                    <div class="card-body p-4">

                                        <div class="card-text">
                                            <h5 class="member-name mb-2 text-center text-primary font-weight-bold">
                                                <a href={{ $company->website }} target="_blank"
                                                    title="Go to Company Website">
                                                    <img src="/InsuranceCoimages/{{ $company->image }}" alt="file_img"
                                                        style="max-width: 100%;height: auto;">
                                                </a>
                                            </h5>
                                            <div class="mb-3 text-center fw-bold ">
                                                {{ $company->name }}<br>
                                                ({{ $company->foundation_year }})
                                            </div>

                                        </div>
                                    </div>
                                    <!--//card-body-->
                                    <div class="card-footer theme-bg-primary border-0 text-start">
                                        <ul class="social-list list-inline mb-0 mx-auto">
                                            <li class="list-inline-item">
                                                <i class="align-middle" data-feather="mail"></i> <span class="align-middle">

                                                    {{ $company->email }}

                                                </span>
                                            </li>
                                        </ul>
                                        <ul class="social-list list-inline mb-0 mx-auto">

                                            <li class="list-inline-item">
                                                <i class="align-middle" data-feather="phone"></i> <span
                                                    class="align-middle">

                                                    {{ $company->phone }}

                                                </span>
                                            </li>
                                        </ul>
                                        <ul class="social-list list-inline mb-0 mx-auto">
                                            <li class="list-inline-item">
                                                <i class="align-middle" data-feather="compass"></i> <span
                                                    class="align-middle">

                                                    {{ $company->address }}



                                                </span>
                                            </li>
                                        </ul>

                                        <div class="row d-flex justify-content-end py-3">
                                            {{-- Edit company treger --}}
                                            <button data-bs-toggle="modal" data-bs-target="#editCompany{{ $company->id }}"
                                                class="btn btn-info btn-sm col-4 col-md-4 col-lg-5">Edite</button>
                                            <form method="post" class="col-4 col-md-4 col-lg-5"
                                                action="{{ route('InsuranceCo.destroy', $company->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    onclick="return confirm('Are you sure you want to delet this company?')"
                                                    type="submit" class="btn btn-danger btn-sm">delete</button>
                                            </form>

                                        </div>

                                    </div>
                                    <!--//card-footer-->
                                </div>
                                <!--//card-->


                            </div>

                            <!-- Modal Edit Company-->
                            <div class="modal fade" id="editCompany{{ $company->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Edit {{ $company->name }} detales
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('InsuranceCo.update', $company->id) }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                @method('PATCH')

                                                <input type="hidden" name="hidden_img" value="{{ $company->image }}" />

                                                <div class="row mb-3">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" required autocomplete="name" autofocus
                                                            value="{{ $company->name }}">

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="email"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" required autocomplete="email"
                                                            value="{{ $company->email }}">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="website"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Company website') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="website" type="website"
                                                            class="form-control @error('website') is-invalid @enderror"
                                                            name="website" required autocomplete="website"
                                                            value="{{ $company->website }}">

                                                        @error('website')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="insurance_type"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Insurance type') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="insurance_type" type="text" class="form-control"
                                                            name="insurance_type" required
                                                            value="{{ $company->insurance_type }}">
                                                    </div>
                                                </div>




                                                <div class="row mb-3">
                                                    <label for="foundation_year"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Foundation year') }}</label>

                                                    <div class="col-md-6">
                                                        <input type="number" name="foundation_year" min="1900"
                                                            max="2100" step="1" id="foundation_year"
                                                            class="form-control" name="foundation_year" required
                                                            value="{{ $company->foundation_year }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password-confirm"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="address" type="text" class="form-control"
                                                            name="address" required value="{{ $company->address }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="phone"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="phone" type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            name="phone" required autocomplete="phone" autofocus
                                                            value="{{ $company->phone }}">

                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="image"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Logo') }}</label>

                                                    <div class="col-md-6">
                                                        <input type="file" name="image"
                                                            class="form-control @error('image') is-invalid @enderror"
                                                            name="image" autofocus value="{{ old('image') }}">

                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>





                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Update') }}
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>


                </div>

            </section>

    </div>
    @endif



    <!-- Modal add Company-->
    <div class="modal fade" id="addCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add a Company
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('InsuranceCo.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name" required
                                    autocomplete="name" autofocus value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" required
                                    autocomplete="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website"
                                class="col-md-4 col-form-label text-md-end">{{ __('Company website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="website"
                                    class="form-control @error('website') is-invalid @enderror" name="website" required
                                    autocomplete="website" value="{{ old('website') }}">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="insurance_type"
                                class="col-md-4 col-form-label text-md-end">{{ __('Insurance type') }}</label>

                            <div class="col-md-6">
                                <input id="insurance_type" type="text" class="form-control" name="insurance_type"
                                    required value="{{ old('insurance_type') }}">
                            </div>
                        </div>




                        <div class="row mb-3">
                            <label for="foundation_year"
                                class="col-md-4 col-form-label text-md-end">{{ __('Foundation year') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="foundation_year" min="1900" max="2100"
                                    step="1" id="foundation_year" class="form-control" name="foundation_year"
                                    required value="{{ old('foundation_year') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required
                                    value="{{ old('address') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                    autocomplete="phone" autofocus value="{{ old('phone') }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-end">{{ __('Company Logo') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" name="image" required
                                    autofocus value="{{ old('image') }}">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
